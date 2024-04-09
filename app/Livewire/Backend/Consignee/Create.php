<?php

namespace App\Livewire\Backend\Consignee;

use Livewire\Component;
use App\Models\Consignee;

class Create extends Component
{
    public $name, $phone, $gstin, $address, $pincode;

    public function render()
    {
        return view('livewire.backend.consignee.create');
    }

    public function store(){

        $this->validate([
            'name' => 'required',
            'phone' => 'required|unique:consignees',
        ]);

        $consigner = new Consignee;
        $consigner->name = $this->name;
        $consigner->phone = $this->phone;
        $consigner->gstin = $this->gstin;
        $consigner->full_address = $this->address;
        $consigner->pincode = $this->pincode;
        $consigner->save();

        $this->redirect('/admin/consignee', navigate: true);

    }
}
