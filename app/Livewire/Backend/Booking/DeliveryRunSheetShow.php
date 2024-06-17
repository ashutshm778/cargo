<?php

namespace App\Livewire\Backend\Booking;

use Livewire\Component;
use App\Models\DeliveryRunSheet;

class DeliveryRunSheetShow extends Component
{

    public $drs_id;

    function mount($id){
        $this->drs_id=$id;
    }

    public function render()
    {
        $data = DeliveryRunSheet::find($this->drs_id);
        return view('livewire.backend.booking.delivery-run-sheet-show',compact('data'));
    }

}
