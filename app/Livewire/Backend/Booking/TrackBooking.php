<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking;
use App\Models\DeliveryRunSheetDetail;
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
        compressImage('https://prashantcargo.com/public/frontend/drs_signature/667677e697f79.jpg','https://prashantcargo.com/public/frontend/drs_signature/667677e697f79.jpg', 75);
        $data = Booking::where('bill_no',$this->awb_no)->first();
        $delivery_run_sheet_detail=DeliveryRunSheetDetail::where('bill_no',$this->awb_no)->first();
        return view('livewire.backend.booking.track-booking',compact('data','delivery_run_sheet_detail'));
    }

    public function get_track_data(){

    }
}
