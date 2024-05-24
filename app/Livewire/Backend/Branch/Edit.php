<?php

namespace App\Livewire\Backend\Branch;

use App\Models\Branch;
use App\Models\Pincode;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name,$branch_code,$phone,$email,$gst,$state,$city,$pincode,$address;
    public $serving_pincode=[];
    public $hidden_id;
    public $type;

    function mount($id)
    {
        $this->edit($id);
    }

    public function render()
    {
        return view('livewire.backend.branch.edit')->layout('components.backend.layouts.app');
    }

    public function edit($id){
        $this->hidden_id=$id;
        $branch = Branch::find($id);
        $this->name=$branch->name;
        $this->branch_code= $branch->branch_code;
        $this->phone=$branch->phone;
        $this->email = $branch->email;
        $this->gst = $branch->gst;
        $this->state = $branch->state;
        $this->city =  $branch->city;
        $this->pincode = $branch->pincode;
        $this->address = $branch->address ;
        $this->serving_pincode= json_decode($branch->serving_pincode);
        $this->type=$branch->type;
    }

    public function update(){

        $this->validate([
            'name'=>'required',
            'branch_code'=>'required|unique:branches,id,'.$this->hidden_id,
            'email' => 'required|unique:branches,id,'.$this->hidden_id,
            'phone' => 'required',
        ]);
        $branch = Branch::find($this->hidden_id);
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
        $branch->type=$this->type;
        $branch->save();

        $this->redirect('/admin/branch', navigate: true);

    }

    public function getPincodeData(){
        $pincode =Pincode::where('pincode', $this->pincode)->first();
        $this->state= $pincode->state;
        $this->city= $pincode->city;
    }

}
