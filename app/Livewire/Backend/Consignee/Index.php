<?php

namespace App\Livewire\Backend\Consignee;

use Livewire\Component;
use App\Models\Consignor;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $list = Consignor::where('id', '>', 0);
        $list=$list->paginate(10);
        return view('livewire.backend.consignee.index',compact('list'));
    }
}
