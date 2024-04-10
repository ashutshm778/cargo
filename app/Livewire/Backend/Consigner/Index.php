<?php

namespace App\Livewire\Backend\Consigner;

use Livewire\Component;
use App\Models\Consignee;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $list = Consignee::where('id', '>', 0);
        $list=$list->paginate(10);
        return view('livewire.backend.consigner.index',compact('list'));
    }
}
