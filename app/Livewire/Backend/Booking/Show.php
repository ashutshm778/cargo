<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking;
use Livewire\Component;
use Picqer\Barcode\BarcodeGeneratorHTML;

class Show extends Component
{
    public $booking_id;

    function mount($id)
    {
        $this->booking_id=$id;
    }
    public function render()
    {
        $booking=Booking::find($this->booking_id);
        $generator = new BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($booking->bill_no, $generator::TYPE_CODE_128);
        return view('livewire.backend.booking.show',compact('booking','barcode'));
    }
}
