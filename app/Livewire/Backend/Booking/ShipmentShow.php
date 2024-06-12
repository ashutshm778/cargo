<?php

namespace App\Livewire\Backend\Booking;

use App\Models\ShipmentInScan;
use Livewire\Component;

class ShipmentShow extends Component
{
    public $shipment_id;

    function mount($id)
    {
        $this->shipment_id=$id;
    }

    public function render()
    {
        $shipment=ShipmentInScan::find($this->shipment_id);
        return view('livewire.backend.booking.shipment-show',compact('shipment'));
    }
}
