<?php

namespace App\Livewire\Backend\Consigner;

use Livewire\Component;
use App\Models\Consignor;

class Edit extends Component
{
    public $name, $phone, $gstin, $address, $pincode;
    public $hidden_id;

    function mount($id)
    {
        $this->edit($id);
    }


    public function render()
    {
        return view('livewire.backend.consigner.edit');
    }

    public function edit($id){
        $this->hidden_id=$id;
        $consigner = Consignor::find($id);
        $this->name = $consigner->name ;
        $this->phone =  $consigner->phone;
        $this->gstin = $consigner->gstin ;
        $this->address = $consigner->full_address;
        $this->pincode = $consigner->pincode ;

    }

    public function update(){
        $this->validate([
            'name' => 'required|unique:consignors,id,'.$this->hidden_id,
        ]);

        $consigner = Consignor::find($this->hidden_id);
        $consigner->name = $this->name;
        $consigner->phone = $this->phone;
        $consigner->gstin = $this->gstin;
        $consigner->full_address = $this->address;
        $consigner->pincode = $this->pincode;
        $consigner->save();

        $this->redirect('/admin/consigner', navigate: true);
    }

}
