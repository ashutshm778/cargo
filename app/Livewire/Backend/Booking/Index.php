<?php

namespace App\Livewire\Backend\Booking;

use Carbon\Carbon;
use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\BookingExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Index extends Component
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
            $q->where('bill_no', 'like', '%' . $search . '%');
        });
    }


    public function render()
    {
        if (auth()->guard("admin")->user()->id == 1) {
            $bookings = Booking::where('id', '>', 0)->with(['branch_from', 'branch_to'])->orderBy('id', 'desc');
        } else {
            $bookings = Booking::where('id', '>', 0)->where('branch_id', auth()->guard("admin")->user()->branch_id)->with(['branch_from', 'branch_to'])->orderBy('id', 'desc');
        }
        if (!empty(auth()->guard("admin")->user()->frenchies_id)) {
            $bookings = $bookings->where('frenchies_id', auth()->guard("admin")->user()->frenchies_id);
        }

        if ($this->branch) {
            $bookings = $bookings->where('branch_id', $this->branch);
        }
        if ($this->startDate && $this->endDate) {
            $da1 = $this->startDate;
            $da2 = $this->endDate;
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();
            $bookings = $bookings->whereBetween('created_at', [$startDate, $endDate]);
        }
        $query = $this->applySearch($bookings);
        $bookings = $query->paginate(10);
        return view('livewire.backend.booking.index', compact('bookings'))->layout('components.backend.layouts.app');
    }

    public function fileExport()
    {
        if (auth()->guard("admin")->user()->id == 1) {
            $bookings = Booking::where('id', '>', 0)->with(['branch_from', 'branch_to'])->orderBy('id', 'desc');
        } else {
            $bookings = Booking::where('id', '>', 0)->where('branch_id', auth()->guard("admin")->user()->branch_id)->with(['branch_from', 'branch_to'])->orderBy('id', 'desc');
        }

        if ($this->branch) {
            $bookings = $bookings->where('branch_id', $this->branch);
        }
        if ($this->startDate && $this->endDate) {
            $da1 = $this->startDate;
            $da2 = $this->endDate;
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();
            $bookings = $bookings->whereBetween('created_at', [$startDate, $endDate]);
        }
        $query = $this->applySearch($bookings);
        $bookings = $query->get()->pluck('id');

        return Excel::download(new BookingExport($bookings), 'booking-report.xlsx');
    }
}
