<?php

namespace App\Livewire\Backend\Consigner;

use Livewire\Component;
use App\Models\Consignee;

class Index extends Component
{
    public function render()
    {
        $list = Consignee::where('id', '>', 0);
        $list=$list->paginate(10);
        return view('livewire.backend.consigner.index',compact('list'));
    }
}
