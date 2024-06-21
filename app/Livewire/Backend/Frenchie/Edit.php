<?php

namespace App\Livewire\Backend\Frenchie;

use App\Models\Pincode;
use Livewire\Component;
use App\Models\Franchise;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name,$frenchie_code,$phone,$email,$gst,$state,$city,$pincode,$address;
    public $serving_pincode=[];
    public $type;
    public $branch_id;
    public $hidden_id;

    function mount($id)
    {
        $this->edit($id);
    }

    public function render()
    {
        return view('livewire.backend.frenchie.edit');
    }

    public function edit($id){
        $this->hidden_id=$id;
        $frenchie = Franchise::find($id);
        $this->name=$frenchie->name;
        $this->frenchie_code= $frenchie->frenchie_code;
        $this->branch_id= $frenchie->branch_id;
        $this->phone=$frenchie->phone;
        $this->email = $frenchie->email;
        $this->gst = $frenchie->gst;
        $this->state = $frenchie->state;
        $this->city =  $frenchie->city;
        $this->pincode = $frenchie->pincode;
        $this->address = $frenchie->address ;
        $this->serving_pincode= json_decode($frenchie->serving_pincode);
    }

    public function update(){

        $this->validate([
            'name'=>'required',
            'frenchie_code'=>'required|unique:franchises,id,'.$this->hidden_id,
            'email' => 'required|unique:franchises,id,'.$this->hidden_id,
            'phone' => 'required',
        ]);
        $frenchie = Franchise::find($this->hidden_id);
        $frenchie->name = $this->name;
        $frenchie->frenchie_code = $this->frenchie_code;
        $frenchie->branch_id=$this->branch_id;
        $frenchie->phone = $this->phone;
        $frenchie->email = $this->email;
        $frenchie->gst = $this->gst;
        $frenchie->state = $this->state;
        $frenchie->city = $this->city;
        $frenchie->pincode = $this->pincode;
        $frenchie->address = $this->address;
        $frenchie->serving_pincode=json_encode($this->serving_pincode);
        $frenchie->save();

        $this->redirect('/admin/frenchies', navigate: true);

    }

    public function getPincodeData(){
        $pincode =Pincode::where('pincode', $this->pincode)->first();
        $this->state= $pincode->state;
        $this->city= $pincode->city;
    }
}
