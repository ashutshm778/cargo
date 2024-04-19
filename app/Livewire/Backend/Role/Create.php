<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $hidden_id, $name,$permission=[];

    public function render()
    {
        $permissionParent = Permission::groupBy('parent_name')->get();
        return view('livewire.backend.role.create',compact('permissionParent'))->layout('components.backend.layouts.app');
    }

    public function store()
    {

        $this->validate([
            'name' => 'required|unique:roles,name'
        ]);


            $role = new Role;
            $role->name = $this->name;
            $role->guard_name='admin';
            $role->save();

            $role->syncPermissions(array_map('intval', $this->permission));

            session()->flash('success', 'Role successfully store.');
            $this->redirect('/admin/role', navigate: true);


    }

    public function resetInputFields()
    {
        $this->hidden_id = null;
        $this->name = null;
        $this->permission = null;
    }
}
