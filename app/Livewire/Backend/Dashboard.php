<?php

namespace App\Livewire\Backend;

use App\Models\Admin;
use App\Models\Branch;
use App\Models\Booking;
use Livewire\Component;
use App\Models\Consignee;
use App\Models\Consignor;

class Dashboard extends Component
{
    public function render()
    {
        $branch = Branch::get()->count();
        $booking = Booking::get()->sum('total');
        $total_order = Booking::get()->count();
        $total_staff = Admin::where('id','>',0)->get()->count();
        $total_consigner=Consignor::get()->count();
        $total_consignee=Consignee::get()->count();
        return view('livewire.backend.dashboard',compact('branch','booking','total_order','total_staff','total_consigner','total_consignee'))->layout('components.backend.layouts.app');
    }
}
