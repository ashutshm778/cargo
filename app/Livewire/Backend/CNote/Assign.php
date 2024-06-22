<?php

namespace App\Livewire\Backend\CNote;

use App\Models\CNote;
use Livewire\Component;
use App\Models\CNoteDetail;
use Illuminate\Support\Facades\DB;

class Assign extends Component
{

    public $from,$to,$branch,$max_to,$hidden_id,$assign_type,$assign_to;

    function mount($id){
        $this->hidden_id=$id;
        $c_note=CNote::find($id);
        $c_note_details=CNoteDetail::where('c_no_id',$c_note->id)->whereNull('assign_to')->orderBy('id','asc')->first();
        $c_note_details_max_no=CNoteDetail::where('c_no_id',$c_note->id)->whereNull('assign_to')->orderBy('id','desc')->first();
        if(!empty($c_note_details->c_no)){
          $this->from = $c_note_details->c_no;
        }
        if(!empty($c_note_details_max_no->c_no)){
          $this->max_to = $c_note_details_max_no;
        }
    }

    public function render()
    {
        $list=DB::table('c_note_details')
        ->select('assign_no','assign_to','assign_type', DB::raw('MIN(c_no) as smallest_c_no'), DB::raw('MAX(c_no) as largest_c_no'))
        ->whereNotNull('assign_no')
        ->groupBy('assign_no')
        ->get();
        return view('livewire.backend.c-note.assign',compact('list'));
    }

    public function store(){

        $from=$this->from;
        $max=$this->max_to;
        $this->validate([
            'branch' => 'required',
            'from' => 'required|numeric',
            'to' => [
            'required',
            'numeric',
            function ($attribute, $value, $fail) use ($from,$max) {
                if ($value < $from) {
                    $fail('The "to" value must be greater than  "from" value.');
                }
                if ($value > $max) {
                    $fail("The 'to' value must not exceed the maximum value of $max.");
                }
            },
        ],
        ]);
        $assign_no=uniqid();
        for($i=$this->from;$i<=$this->to;$i++){

            $c_no_detail=CNoteDetail::where('c_no',$i)->first();
            $c_no_detail->assign_type='branch';
            $c_no_detail->assign_to=$this->branch;
            $c_no_detail->assign_no=$assign_no;
            $c_no_detail->status=1;
            $c_no_detail->save();

        }

        $this->redirect('/admin/c_note/assign/'.$this->hidden_id, navigate: true);
    }





}
