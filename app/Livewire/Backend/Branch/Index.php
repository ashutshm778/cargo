<?php

namespace App\Livewire\Backend\Branch;

use App\Models\Branch;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $branches = Branch::where('id', '>', 0);
        $branches=$branches->paginate(10);
        return view('livewire.backend.branch.index',compact('branches'))->layout('components.backend.layouts.app');
    }
}
