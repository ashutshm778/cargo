<?php

namespace App\Livewire\Backend\Booking;

use Carbon\Carbon;
use App\Models\Booking;
use Livewire\Component;
use App\Models\BookingLog;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AssigneDeliveryExport;
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

    public function openConsginee($id)
    {
        $this->deivery_status_id=$id;
        $this->resetInputFields();
        $this->dispatch('showDeliveryStatus');
    }

    public function hideDeliveryStatus()
    {
        $this->resetInputFields();
        $this->dispatch('hideDeliveryStatus');
    }

    public function resetInputFields()
    {
        $this->resetValidation();
    }

    public function booking_status_update(){
        //dd($request->all());
        $booking=Booking::find($this->deivery_status_id);
        $booking->status=$this->status;
        $booking->save();

        $booking_log=new BookingLog;
        $booking_log->booking_id=$booking->id;
        $booking_log->branch_id= Auth::guard('admin')->user()->id==1? $booking->branch_id :Auth::guard('admin')->user()->branch_id;
        $booking_log->tracking_code=$booking->tracking_code;
        $booking_log->user_id=auth()->guard("admin")->user()->id;
        $booking_log->source='web';
        $booking_log->action=$this->status;
        $booking_log->status=$this->status;
        if(!empty($this->remarks)){
         $booking_log->description=$this->remarks;
        }
        $booking_log->save();

        $this->hideDeliveryStatus();
    }

    public function fileExport()
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
        $bookings=$query->get()->pluck('id');

        return Excel::download(new AssigneDeliveryExport($bookings), 'assigned_delivery-report.xlsx');
    }
}