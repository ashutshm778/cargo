<?php

namespace App\Livewire\Backend\Consigner;

use Livewire\Component;
use App\Models\Consignor;

class Create extends Component
{
    public $name, $phone, $gstin, $address, $pincode;

    public function render()
    {
        return view('livewire.backend.consigner.create');
    }

    public function store(){
        $this->validate([
            'name' => 'required|unique:consignors',
        ]);

        $consigner = new Consignor;
        $consigner->name = $this->name;
        $consigner->phone = $this->phone;
        $consigner->gstin = $this->gstin;
        $consigner->full_address = $this->address;
        $consigner->pincode = $this->pincode;
        $consigner->save();

        $this->redirect('/admin/consigner', navigate: true);
    }
}
