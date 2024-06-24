<?php

namespace App\Livewire\Backend\CnoteFrenchie;

use App\Models\CNote;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $list=DB::table('c_note_details')
        ->select('id','assign_no','assign_to','assign_type', DB::raw('MIN(c_no) as smallest_c_no'), DB::raw('MAX(c_no) as largest_c_no'))
        ->whereNotNull('assign_no')
        ->where('assign_type','branch')
        ->where('assign_to',auth()->guard("admin")->user()->branch_id)
        ->groupBy('assign_no')
        ->get();
        return view('livewire.backend.cnote-frenchie.index',compact('list'));
    }
}
