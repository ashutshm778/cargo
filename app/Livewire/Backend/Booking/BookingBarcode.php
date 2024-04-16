<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking;
use Livewire\Component;
use App\Models\BookingProduct;
use App\Models\BookingProductBarcode;

class BookingBarcode extends Component
{
    public $hidden_id;

    function mount($id)
    {
        $this->hidden_id=$id;
    }

    public function render()
    {
        $booking_product=BookingProduct::find($this->hidden_id);
        $booking=Booking::find($booking_product->booking_id);
        $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($booking->bill_no, $generator::TYPE_CODE_128);
        $booking_product_barcode=BookingProductBarcode::where('booking_product_id',$booking_product->id)->get();
        return view('livewire.backend.booking.booking-barcode',compact('booking_product','booking','barcode','booking_product_barcode'));
    }
}
