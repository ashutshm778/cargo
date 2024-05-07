<?php

namespace App\Livewire\Backend\Booking;

use Carbon\Carbon;
use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AssignDelivery extends Component
{

    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search,$branch,$startDate,$endDate;
    public $deivery_status_id,$status,$remark;

    public function updatedSearch(){
        $this->resetPage();
    }

    public function applySearch($query){
        $search=$this->search;
        return $this->search===''?$query:$query->where(function ($q) use ($search) {
            $q->where('tracking_code','like','%'.$search.'%');
        });
    }

    public function render()
    {
        if(auth()->guard("admin")->user()->id==1){
            $deliveries = Booking::where('id', '>', 0)->with(['branch_from','branch_to'])->where('assign_to','!=','')->orderBy('id','desc');
        }else{
          $deliveries = Booking::where('assign_to',Auth::guard('admin')->user()->id)->with(['branch_from','branch_to'])->where('assign_to','!=','')->orderBy('id','desc');
        }
        if($this->branch){
            $deliveries=$deliveries->where('branch_id',$this->branch);
         }
         if($this->startDate && $this->endDate)
         {
             $da1=$this->startDate;
             $da2=$this->endDate;
             $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
             $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();
             $deliveries = $deliveries->whereBetween('created_at', [$startDate, $endDate]);
         }
        $query = $this->applySearch($deliveries);

        $deliveries=$query->paginate(10);
        return view('livewire.backend.booking.assign-delivery',compact('deliveries'));
    }
}
