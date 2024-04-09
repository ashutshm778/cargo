<?php

namespace App\Livewire\Backend\Booking;

use Livewire\Component;
use App\Models\BookingLog;

class BookingLogLivewire extends Component
{
    public function render()
    {
        if(auth()->guard("admin")->user()->id==1){
            $booking_logs = BookingLog::where('id', '>', 0)->with(['branch_data','booking_data']);
        }else{
            $booking_logs = BookingLog::where('id', '>', 0)->where('branch_id',auth()->guard("admin")->user()->branch_id)->with(['branch_data','booking_data']);
        }
        $booking_logs=$booking_logs->paginate(10);
        return view('livewire.backend.booking.booking-log',compact('booking_logs'));
    }
}
