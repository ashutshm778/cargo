<?php

namespace App\Livewire\Backend\Staff;

use App\Models\Admin;
use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name,$email,$password,$role,$branch;
    public $hidden_id;

    public function mount($id){
        $this->hidden_id = $id;
        $this->edit($id);
    }

    public function edit($id){
        $data = Admin::find($id);
        $userRole = $data->roles->pluck('name')->all();

        $this->name = $data->name;
        $this->email = $data->email;
        $this->branch = $data->branch_id;;
        $this->role = $userRole;
    }

    public function render()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        $branches = Branch::all();
        return view('livewire.backend.staff.edit',compact('roles','branches'))->layout('components.backend.layouts.app');
    }

    public function update(){

        $this->validate([
            'name' => 'required',
            'branch' => 'required',
            'email' => 'required|email|unique:admins,email,'.$this->hidden_id,
            'role' => 'required'
        ]);

        $staff = Admin::find($this->hidden_id);
        $staff->name = $this->name;
        $staff->email = $this->email;
        if(!empty($this->password)){
         $staff->password =Hash::make($this->password);
        }
        $staff->branch_id=$this->branch;
        $staff->save();
        $staff->assignRole($this->role);


        session()->flash('success', 'Staff successfully updated.');
        $this->redirect('/admin/staff', navigate: true);

    }
}
