<?php

namespace App\Livewire\Backend;

use Carbon\Carbon;
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

        $month_names = [];
        $month_numbers = [];
        $years=[];

// Set the initial date to the beginning of the current month
$initial_date = Carbon::now()->startOfMonth();

foreach( range( -11, 0 ) AS $i ) {
    $month_name = $initial_date->copy()->addMonths($i)->format('M-Y');
    $month_number = $initial_date->copy()->addMonths($i)->format('m');
    $month_year = $initial_date->copy()->addMonths($i)->format('Y');
    array_push($month_names, $month_name);
    array_push($month_numbers, $month_number);
    array_push($years, $month_year);
}

$total_sale=[];
$total_booking=[];

foreach($month_numbers as $key => $month_number)
{
    $sale = Booking::whereMonth('created_at','=', $month_number)->whereYear('created_at', '=', $years[$key])->get()->sum('total');
    array_push($total_sale,$sale);

    $bookings = Booking::whereMonth('created_at','=', $month_number)->whereYear('created_at', '=', $years[$key])->get()->count();
    array_push($total_booking,$bookings);

}

        return view('livewire.backend.dashboard',compact('branch','booking','total_order','total_staff','total_consigner','total_consignee','month_names','total_sale','total_booking'))->layout('components.backend.layouts.app');
    }
}
