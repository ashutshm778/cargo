<?php

namespace App\Livewire\Backend\Report;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Booking;
use Livewire\Component;
use App\Models\Consignee;
use App\Models\Consignor;

class BranchReport extends Component
{

    public $branch,$startDate,$endDate;



    public function render()
    {





        if($this->startDate && $this->endDate)
        {
            $da1=$this->startDate;
            $da2=$this->endDate;
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $booking = Booking::where('branch_id',$this->branch)->whereBetween('created_at', [$startDate, $endDate])->get()->sum('total');
            $total_order = Booking::where('branch_id',$this->branch)->whereBetween('created_at', [$startDate, $endDate])->get()->count();
            $total_staff = Admin::where('branch_id',$this->branch)->where('id', '>', 1)->whereBetween('created_at', [$startDate, $endDate])->get()->count();
            $total_deliveries = Booking::where('to',$this->branch)->with(['branch_from','branch_to'])->whereBetween('created_at', [$startDate, $endDate])->get()->count();

        }else{

            $booking = Booking::where('branch_id',$this->branch)->get()->sum('total');
            $total_order = Booking::where('branch_id',$this->branch)->get()->count();
            $total_staff = Admin::where('branch_id',$this->branch)->where('id', '>', 1)->get()->count();
            $total_deliveries = Booking::where('to',$this->branch)->with(['branch_from','branch_to'])->get()->count();

        }

        return view('livewire.backend.report.branch-report',compact('booking','total_order','total_staff','total_deliveries'));
    }
}
