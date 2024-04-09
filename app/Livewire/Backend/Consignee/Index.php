<?php

namespace App\Livewire\Backend\Consignee;

use Livewire\Component;
use App\Models\Consignor;

class Index extends Component
{
    public function render()
    {
        $list = Consignor::where('id', '>', 0);
        $list=$list->paginate(10);
        return view('livewire.backend.consignee.index',compact('list'));
    }
}
