<?php

namespace App\Livewire\Backend\Pincode;

use App\Models\Pincode;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public  $state, $city, $pincode;
    public $hidden_id;

    public function render()
    {
        $pincodes = Pincode::where('id', '>', 0);
        $pincodes = $pincodes->paginate(20);

        return view('livewire.backend.pincode.index', compact('pincodes'))->layout('components.backend.layouts.app');
    }

    public function store()
    {
        $this->validate([
            'pincode' => 'required|unique:pincodes',
            'city' => 'required',
            'state' => 'required',
        ]);

        $pincode = new Pincode;
        $pincode->pincode = $this->pincode;
        $pincode->city = $this->city;
        $pincode->state = $this->state;
        $pincode->save();

        $this->resetInputFields();
    }

    public function resetInputFields(){
        $this->pincode='';
        $this->city='';
        $this->state='';
        $this->hidden_id='';
    }

    public function edit($id){

        $this->hidden_id=$id;

        $pincode =Pincode::find($id);
        $this->pincode=$pincode->pincode;
        $this->city=$pincode->city;
        $this->state=$pincode->state;
    }

    public function update()
    {
        $this->validate([
            'pincode' => 'required|unique:pincodes,id,'.$this->hidden_id,
            'city' => 'required',
            'state' => 'required',
        ]);

        $pincode = Pincode::find($this->hidden_id);
        $pincode->pincode = $this->pincode;
        $pincode->city = $this->city;
        $pincode->state = $this->state;
        $pincode->save();

        $this->resetInputFields();
    }

    public function delete($id){
        $pincode =Pincode::find($id);
        $pincode->delete();
    }


}
