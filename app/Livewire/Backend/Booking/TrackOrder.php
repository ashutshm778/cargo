<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking;
use Livewire\Component;

class TrackOrder extends Component
{
    public $booking_id;

    function mount($id)
    {
        $this->booking_id=$id;
    }

    public function render()
    {
        $booking=Booking::find($this->booking_id);
        return view('livewire.backend.booking.track-order',compact('booking'));
    }
}
