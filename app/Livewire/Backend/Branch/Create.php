<?php

namespace App\Livewire\Backend\Branch;

use App\Models\Branch;
use App\Models\Pincode;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name,$branch_code,$phone,$email,$gst,$state,$city,$pincode,$address;
    public $serving_pincode=[];
    public $type;




    public function render()
    {
        return view('livewire.backend.branch.create')->layout('components.backend.layouts.app');
    }

    public function store(){
        $this->validate([
            'name'=>'required',
            'branch_code'=>'required|unique:branches,branch_code',
            'email' => 'required|unique:branches,email',
            'phone' => 'required',
        ]);
        $branch = new Branch;
        $branch->name = $this->name;
        $branch->branch_code = $this->branch_code;
        $branch->phone = $this->phone;
        $branch->email = $this->email;
        $branch->gst = $this->gst;
        $branch->state = $this->state;
        $branch->city = $this->city;
        $branch->pincode = $this->pincode;
        $branch->address = $this->address;
        $branch->serving_pincode=json_encode($this->serving_pincode);
        $branch->save();

        $this->redirect('/admin/branch', navigate: true);

    }

    public function getPincodeData(){
        $pincode =Pincode::where('pincode', $this->pincode)->first();
        $this->state= $pincode->state;
        $this->city= $pincode->city;
    }

}
