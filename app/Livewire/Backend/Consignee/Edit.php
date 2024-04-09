<?php

namespace App\Livewire\Backend\Consignee;

use Livewire\Component;
use App\Models\Consignee;

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
        return view('livewire.backend.consignee.edit');
    }

    public function edit($id){
        $this->hidden_id=$id;
        $consignee = Consignee::find($id);
        $this->name = $consignee->name ;
        $this->phone =  $consignee->phone;
        $this->gstin = $consignee->gstin ;
        $this->address = $consignee->full_address;
        $this->pincode = $consignee->pincode ;

    }

    public function update(){

        $this->validate([
            'name' => 'required',
            'phone' => 'required|unique:consignees,id,'.$this->hidden_id,
        ]);

        $consigner = Consignee::find($this->hidden_id);
        $consigner->name = $this->name;
        $consigner->phone = $this->phone;
        $consigner->gstin = $this->gstin;
        $consigner->full_address = $this->address;
        $consigner->pincode = $this->pincode;
        $consigner->save();

        $this->redirect('/admin/consignee', navigate: true);

    }
}
