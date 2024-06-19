<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TrackBooking extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $awb_no;

    public function render()
    {
        $data = Booking::where('bill_no',$this->awb_no)->first();
        return view('livewire.backend.booking.track-booking',compact('data'));
    }

    public function get_track_data(){

    }
}
