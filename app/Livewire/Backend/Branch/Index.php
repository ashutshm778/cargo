<?php

namespace App\Livewire\Backend\Branch;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $branches = Branch::where('id', '>', 0);
        $branches=$branches->paginate(10);
        return view('livewire.backend.branch.index',compact('branches'))->layout('components.backend.layouts.app');
    }
}
