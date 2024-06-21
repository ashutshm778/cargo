<?php

namespace App\Livewire\Backend\Frenchie;

use App\Models\Pincode;
use Livewire\Component;
use App\Models\Franchise;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name,$frenchie_code,$phone,$email,$gst,$state,$city,$pincode,$address;
    public $serving_pincode=[];
    public $type;
    public $branch_id;

    public function render()
    {
        return view('livewire.backend.frenchie.create');
    }

    public function store(){
        $this->validate([
            'name'=>'required',
            'frenchie_code'=>'required|unique:franchises,frenchie_code',
            'email' => 'required|unique:franchises,email',
            'phone' => 'required',
        ]);
        $frenchie = new Franchise;
        $frenchie->name = $this->name;
        $frenchie->frenchie_code = $this->frenchie_code;
        $frenchie->branch_id = $this->branch_id;
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
