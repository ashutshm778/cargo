<?php

namespace App\Livewire\Backend\Staff;

use App\Models\Admin;
use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name,$email,$password,$role,$branch;

    public function render()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        $branches = Branch::all();
        return view('livewire.backend.staff.create',compact('roles','branches'))->layout('components.backend.layouts.app');
    }

    public function save(){

        $this->validate([
            'name' => 'required',
            'branch' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $staff = new Admin;
        $staff->name = $this->name;
        $staff->email = $this->email;
        $staff->password =Hash::make($this->password);
        $staff->branch_id=$this->branch;
        $staff->code=substr($this->name, 0, 1).rand(11111,99999);
        $staff->save();
        $staff->assignRole($this->role);


        session()->flash('success', 'Staff successfully store.');
        $this->redirect('/admin/staff', navigate: true);

    }
}
