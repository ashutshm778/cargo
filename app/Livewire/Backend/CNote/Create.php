<?php

namespace App\Livewire\Backend\CNote;

use App\Models\CNote;
use Livewire\Component;
use App\Models\CNoteDetail;

class Create extends Component
{

    public $from,$to;

    public function mount(){
        $c_note = CNote::latest()->first();
        if(!empty($c_note)){
            $this->from = $c_note->to + 1;
        }else{
            $this->from =101;
        }

    }

    public function render()
    {
        return view('livewire.backend.c-note.create');
    }

    public function store(){
        $from=$this->from;
        $this->validate([
            'from' => 'required|numeric',
            'to' => [
            'required',
            'numeric',
            function ($attribute, $value, $fail) use ($from) {
                if ($value < $from) {
                    $fail('The "to" value must be greater than  "from" value.');
                }
            },
        ],
        ]);

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
