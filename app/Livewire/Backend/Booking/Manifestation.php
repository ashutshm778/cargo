<?php

namespace App\Livewire\Backend\Booking;

use Carbon\Carbon;
use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\BookingMExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Manifestation extends Component
{

    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search,$branch,$startDate,$endDate,$mf_no,$awb_no;

    public $awb_no_list=[];

    function mount(){
        $this->mf_no=auth()->guard("admin")->user()->branch_data->branch_code.rand(111111,999999);
        $this->branch=auth()->guard("admin")->user()->branch_id;
    }

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
        // if(auth()->guard("admin")->user()->id==1){
        //     $bookings = Booking::where('id', '>', 0)->with(['branch_from','branch_to'])->orderBy('id','desc');
        // }else{
        //     $bookings = Booking::where('id', '>', 0)->where('branch_id',auth()->guard("admin")->user()->branch_id)->with(['branch_from','branch_to'])->orderBy('id','desc');
        // }
        // if($this->branch){
        //     $bookings=$bookings->where('branch_id',$this->branch);
        //  }
        //  if($this->startDate && $this->endDate)
        //  {
        //      $da1=$this->startDate;
        //      $da2=$this->endDate;
        //      $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
        //      $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();
        //      $bookings = $bookings->whereBetween('created_at', [$startDate, $endDate]);
        //  }
        // $query = $this->applySearch($bookings);
        // $bookings=$query->paginate(10);
        return view('livewire.backend.booking.manifestation');
    }

    public function fileExport()
    {
        if(auth()->guard("admin")->user()->id==1){
            $bookings = Booking::where('id', '>', 0)->with(['branch_from','branch_to'])->orderBy('id','desc');
        }else{
            $bookings = Booking::where('id', '>', 0)->where('branch_id',auth()->guard("admin")->user()->branch_id)->with(['branch_from','branch_to'])->orderBy('id','desc');
        }
        if($this->branch){
            $bookings=$bookings->where('branch_id',$this->branch);
         }
         if($this->startDate && $this->endDate)
         {
             $da1=$this->startDate;
             $da2=$this->endDate;
             $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
             $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();
             $bookings = $bookings->whereBetween('created_at', [$startDate, $endDate]);
         }
        $query = $this->applySearch($bookings);
        $bookings=$query->get()->pluck('id');

        return Excel::download(new BookingMExport($bookings), 'booking_m-report.xlsx');
    }

    public function add_fields(){
        if(!empty($this->awb_n)){
          array_push($this->awb_no_list,$this->awb_no);
        }
        $this->awb_no='';
    }

}
