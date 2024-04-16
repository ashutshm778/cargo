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

    public $search;

    public function updatedSearch(){
        $this->resetPage();
    }

    public function applySearch($query){
        $search=$this->search;
        return $this->search===''?$query:$query->where(function ($q) use ($search) {
            $q->where('name','like','%'.$search.'%');
        });
    }

    public function render()
    {
        $branches = Branch::where('id', '>', 0);
        $query = $this->applySearch($branches);
        $branches=$query->paginate(10);
        return view('livewire.backend.branch.index',compact('branches'))->layout('components.backend.layouts.app');
    }
}
