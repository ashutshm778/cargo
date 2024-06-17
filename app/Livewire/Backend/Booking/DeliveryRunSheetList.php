<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Admin;
use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DeliveryRunSheet;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DeliveryRunSheetList extends Component
{

    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatedSearch(){
        $this->resetPage();
    }

    public function applySearch($query){
        $search=$this->search;
        return $this->search===''?$query:$query->where(function ($q) use ($search) {
            $q->where('drs_no','like','%'.$search.'%');
        });
    }

    public function render()
    {
        $list = DeliveryRunSheet::where('id', '>', 0);
        $query = $this->applySearch($list);
        $list=$query->paginate(10);
        return view('livewire.backend.booking.delivery-run-sheet-list',compact('list'));
    }


    public function downloadPdf($id)
    {
        $list = DeliveryRunSheet::find($id);
        $pdf = Pdf::loadView('livewire.backend.booking.pdf',compact('list'));
        return response()->streamDownload(function () use($pdf) {
            echo  $pdf->stream();
        }, 'drs.pdf');
    }
}
