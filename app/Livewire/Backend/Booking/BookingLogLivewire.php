<?php

namespace App\Livewire\Backend\Booking;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\BookingLog;
use Livewire\WithPagination;
use App\Exports\BookingLogExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BookingLogLivewire extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search,$branch,$startDate,$endDate;

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
            $booking_logs = BookingLog::where('id', '>', 0)->with(['branch_data','booking_data'])->orderBy('id','desc');
        }else{
            $booking_logs = BookingLog::where('id', '>', 0)->where('branch_id',auth()->guard("admin")->user()->branch_id)->with(['branch_data','booking_data'])->orderBy('id','desc');
        }
        if($this->branch){
            $booking_logs=$booking_logs->where('branch_id',$this->branch);
         }
         if($this->startDate && $this->endDate)
         {
             $da1=$this->startDate;
             $da2=$this->endDate;
             $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
             $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();
             $booking_logs = $booking_logs->whereBetween('created_at', [$startDate, $endDate]);
         }
        $query = $this->applySearch($booking_logs);
        $booking_logs=$query->paginate(10);
        return view('livewire.backend.booking.booking-log',compact('booking_logs'));
    }

    public function fileExport()
    {
        if(auth()->guard("admin")->user()->id==1){
            $booking_logs = BookingLog::where('id', '>', 0)->with(['branch_data','booking_data'])->orderBy('id','desc');
        }else{
            $booking_logs = BookingLog::where('id', '>', 0)->where('branch_id',auth()->guard("admin")->user()->branch_id)->with(['branch_data','booking_data'])->orderBy('id','desc');
        }
        if($this->branch){
            $booking_logs=$booking_logs->where('branch_id',$this->branch);
         }
         if($this->startDate && $this->endDate)
         {
             $da1=$this->startDate;
             $da2=$this->endDate;
             $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
             $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();
             $booking_logs = $booking_logs->whereBetween('created_at', [$startDate, $endDate]);
         }
        $query = $this->applySearch($booking_logs);
        $bookings=$query->get()->pluck('id');

        return Excel::download(new BookingLogExport($bookings), 'booking_log-report.xlsx');
    }
}
