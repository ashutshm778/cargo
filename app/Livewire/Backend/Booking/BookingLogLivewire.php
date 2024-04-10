<?php

namespace App\Livewire\Backend\Booking;

use Livewire\Component;
use App\Models\BookingLog;

class BookingLogLivewire extends Component
{
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
            $booking_logs = BookingLog::where('id', '>', 0)->with(['branch_data','booking_data']);
        }else{
            $booking_logs = BookingLog::where('id', '>', 0)->where('branch_id',auth()->guard("admin")->user()->branch_id)->with(['branch_data','booking_data']);
        }
        $query = $this->applySearch($booking_logs);
        $booking_logs=$query->paginate(10);
        return view('livewire.backend.booking.booking-log',compact('booking_logs'));
    }
}
