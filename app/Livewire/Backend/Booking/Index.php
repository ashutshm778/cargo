<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if(auth()->guard("admin")->user()->id==1){
            $bookings = Booking::where('id', '>', 0)->with(['branch_from','branch_to']);
        }else{
            $bookings = Booking::where('id', '>', 0)->where('branch_id',auth()->guard("admin")->user()->branch_id)->with(['branch_from','branch_to']);
        }
        $bookings=$bookings->paginate(10);
        return view('livewire.backend.booking.index',compact('bookings'))->layout('components.backend.layouts.app');
    }
}
