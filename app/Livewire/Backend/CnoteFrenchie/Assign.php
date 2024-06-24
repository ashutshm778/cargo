<?php

namespace App\Livewire\Backend\CnoteFrenchie;

use Livewire\Component;
use App\Models\CNoteDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CNoteFrenchiesDetail;

class Assign extends Component
{
    public $from,$to,$branch,$max_to,$hidden_id,$start_r,$end_r;

    function mount($id, $start_range, $end_range){
        $this->hidden_id=$id;
        $this->hidden_id = $id;
        $this->start_r = $start_range;
        $this->end_r = $end_range;
    }

    public function render()
    {
        $list=DB::table('c_note_frenchies_details')
        ->select('assign_no','assign_to','assign_type', DB::raw('MIN(c_no) as smallest_c_no'), DB::raw('MAX(c_no) as largest_c_no'))
        ->whereNotNull('assign_no')
        ->where('c_no_id',$this->hidden_id)
        ->groupBy('assign_no')
        ->get();
        return view('livewire.backend.cnote-frenchie.assign',compact('list'));
    }

    public function store(){
        $from=$this->from;
        $start=$this->start_r;
        $max=$this->end_r;
        $this->validate([
            'branch' => 'required',
            'from' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($from,$start,$max) {
                    if ($value < $start) {
                        $fail('The "from" value must be greater than or equal to start value of '.$start);
                    }
                    if ($value > $max) {
                        $fail("The 'to' value must not exceed the maximum value of $max.");
                    }
                },
            ],
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
            $c_no_fren_detail=new CNoteFrenchiesDetail;
            $c_no_fren_detail->c_no=$i;
            $c_no_fren_detail->c_no_id=$c_no_detail->c_no_id;
            $c_no_fren_detail->assign_type='frenchies';
            $c_no_fren_detail->assign_to=$this->branch;
            $c_no_fren_detail->assign_no=$assign_no;
            $c_no_fren_detail->status=1;
            $c_no_fren_detail->save();

        }

    }

}
