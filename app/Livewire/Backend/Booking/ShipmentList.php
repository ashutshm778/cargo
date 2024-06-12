<?php

namespace App\Livewire\Backend\Booking;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ShipmentInScan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShipmentList extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search, $branch, $startDate, $endDate;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function applySearch($query)
    {
        $search = $this->search;
        return $this->search === '' ? $query : $query->where(function ($q) use ($search) {
            $q->where('mf_no', 'like', '%' . $search . '%');
        });
    }


    public function render()
    {
        if (auth()->guard("admin")->user()->id == 1) {
            $list = ShipmentInScan::where('id', '>', 0)->orderBy('id', 'desc');
        } else {
            $list = ShipmentInScan::where('forward_to',auth()->guard("admin")->user()->branch_id)->orderBy('id', 'desc');
        }


        if ($this->startDate && $this->endDate) {
            $da1 = $this->startDate;
            $da2 = $this->endDate;
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();
            $list = $list->whereBetween('created_at', [$startDate, $endDate]);
        }
        $query = $this->applySearch($list);
        $list = $query->paginate(10);
        return view('livewire.backend.booking.shipment-list',compact('list'));
    }
}
