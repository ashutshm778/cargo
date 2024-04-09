<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking;
use Livewire\Component;

class Delivery extends Component
{
    public function render()
    {
        if(auth()->guard("admin")->user()->id==1){
            $deliveries = Booking::where('id', '>', 0)->with(['branch_from','branch_to']);
        }else{
          $deliveries = Booking::where('to',Auth::guard('admin')->user()->branch_id)->with(['branch_from','branch_to']);
        }
        $deliveries=$deliveries->paginate(10);
        return view('livewire.backend.booking.delivery',compact('deliveries'));
    }
}
