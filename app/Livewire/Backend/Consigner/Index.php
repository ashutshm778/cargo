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
        $list = Consignee::where('id', '>', 0);
        $query = $this->applySearch($list);
        $list=$query->paginate(10);
        return view('livewire.backend.consigner.index',compact('list'));
    }
}
