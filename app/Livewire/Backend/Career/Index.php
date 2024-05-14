<?php

namespace App\Livewire\Backend\Career;

use App\Models\Career;
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
        $list = Career::where('id', '>', 0);
        $query = $this->applySearch($list);
        $list=$query->paginate(10);
        return view('livewire.backend.career.index',compact('list'))->layout('components.backend.layouts.app');
    }
}
