<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $hidden_id, $name,$permission=[];

    public function mount($id){
        $this->hidden_id = $id;
        $this->edit($id);
    }

    public function edit($id){

        $data = Role::find($this->hidden_id);
        $permission =  DB::table('role_has_permissions')->where('role_id',$this->hidden_id)->get()->pluck('permission_id');


        foreach($permission as $p){
            $this->permission[$p]=$p;
        }

        $this->name = explode('_',$data->name)[0];



    }

    public function render()
    {
        $permissionParent = Permission::groupBy('parent_name')->get();
        return view('livewire.backend.role.edit',compact('permissionParent'))->layout('components.backend.layouts.app');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);

        try {
            $role = Role::find($this->hidden_id);
            $role->name = $this->name;
            $role->guard_name='admin';
            $role->save();
            $role->syncPermissions($this->permission);



            $this->resetInputFields();
            session()->flash('success', 'Role successfully updated.');
            $this->redirect('/admin/role', navigate: true);

        } catch (\Exception  $e) {


        }
    }

    public function resetInputFields()
    {
        $this->hidden_id = null;
        $this->name = null;
        $this->permission = null;
    }

}
