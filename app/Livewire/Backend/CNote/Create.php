<?php

namespace App\Livewire\Backend\CNote;

use App\Models\CNote;
use Livewire\Component;
use App\Models\CNoteDetail;

class Create extends Component
{

    public $from,$to;

    public function render()
    {
        return view('livewire.backend.c-note.create');
    }

    public function store(){

        $c_note = new CNote;
        $c_note->from=$this->from;
        $c_note->to=$this->to;
        $c_note->save();

        for($i=$c_note->from;$i<=$c_note->to;$i++){

            $c_no_detail=new CNoteDetail;
            $c_no_detail->c_no_id=$c_note->id;
            $c_no_detail->c_no=$i;
            $c_no_detail->save();

        }

        $this->redirect('/admin/c_note', navigate: true);


    }
}
