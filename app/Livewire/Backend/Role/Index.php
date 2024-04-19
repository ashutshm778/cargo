<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $hidden_id, $name,$permission;


    public function render()
    {
        $list = Role::orderBy('id', 'desc')->paginate(10);
        return view('livewire.backend.role.index',compact('list'))->layout('components.backend.layouts.app');
    }

    public function delete($id)
    {
       Role::destroy($id);
    }
}
