<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking;
use Livewire\Component;
use App\Models\Consignee;
use App\Models\Consignor;
use App\Models\Franchise;
use App\Models\BookingLog;
use App\Models\CNoteDetail;
use Livewire\WithPagination;
use App\Models\BookingProduct;
use Illuminate\Support\Facades\DB;
use App\Models\CNoteFrenchiesDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingProductBarcode;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $branch_id, $delivery_address, $from, $to, $consignor_phone,  $consignee_phone, $consignor_gstin, $consignee_gstin, $booking_no, $value,$date,$frenchies_id;
    public $no_of_pack = [];
    public $product = [];
    public $unit = [];
    public $qty = [];
    public $weight = [];
    public $frieght_charge = [];
    public $insurance=0, $b_charges=0, $other_charges=0, $tax=0, $total, $status;

    public $name, $phone, $gstin, $address, $pincode;
    public $i = 0;
    public $inputs = [];
    public $consigner_id,$consignee_id;
    public $bill_no;
    public $eway_bill_no;

    public $consignor= '';
    public $consignors = [];

    public $consignee='';
    public $consignees = [];

    public $tags = [];
    public $barcodes = [];

    function mount()
    {
        $this->no_of_pack[1]=1;
        $this->weight[1]=0;
        $this->add($this->i);
        $this->date = date('Y-m-d');
        if(auth()->guard('admin')->user()->id != 1){
            // $this->branch_id = auth()->guard('admin')->user()->branch_id;
            // $this->from = auth()->guard('admin')->user()->branch_id;
        }
    }

    public function rules()
    {
        return [
            'tags' => 'required|array|min:' . $this->no_of_pack[1]. '|max:' . $this->no_of_pack[1],
            'tags.*' => 'string|max:255',
            'barcodes' => 'required|array|min:' . $this->no_of_pack[1]. '|max:' . $this->no_of_pack[1],
            'barcodes.*' => [
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (DB::table('booking_product_barcodes')->where('barcode', $value)->exists()) {
                        $fail('The ' . $attribute . ' must be unique in the booking barcode table.');
                    }
                },
            ],
        ];
    }

    public function updatedTags()
    {
        $this->validate();
        $total=0;
        foreach($this->tags as $tag){
           $total = $total+$tag;
        }
        $this->weight[1]=$total;
    }

    public function updatedbarcodes()
    {
        $this->validate();
        $total=0;
        foreach($this->tags as $tag){
           $total = $total+$tag;
        }
        $this->weight[1]=$total;
    }



    public function updatedConsignor()
    {

        // Check if the search query contains at least two words
        if (strlen($this->consignor)>=2) {
            // Fetch consignors from the database based on the search query
            $this->consignors = Consignor::where('name', 'like', '%' . $this->consignor . '%')->get();
        } else {
            $this->consignors = [];
        }
    }

    public function updatedConsignee()
    {

        // Check if the search query contains at least two words
        if (strlen($this->consignee)>=2) {
            // Fetch consignors from the database based on the search query
            $this->consignees = Consignee::where('name', 'like', '%' . $this->consignee . '%')->get();
        } else {
            $this->consignees = [];
        }
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);

    }

    public function remove($i, $value)
    {
        unset($this->inputs[$i]);
        unset($this->qty[$i]);
        unset($this->no_of_pack[$i]);
        unset($this->product[$i]);
        unset($this->unit[$i]);
        unset($this->weight[$i]);
        unset($this->frieght_charge[$i]);
    }

    public function render()
    {
        return view('livewire.backend.booking.create')->layout('components.backend.layouts.app');
    }

    public function openConsginee()
    {
        $this->resetInputFields();
        $this->dispatch('showConignee');
    }

    public function closeConsginee()
    {
        $this->resetInputFields();
        $this->dispatch('hideConignee');
    }

    public function openConsginer()
    {
        $this->resetInputFields();
        $this->dispatch('showConsigner');
    }

    public function closeConsginer()
    {
        $this->resetInputFields();
        $this->dispatch('hideConsigner');
    }


    public function consignee_store()
    {
        $this->validate([
            'name' => 'required|unique:consignees',

        ]);

        $consigner = new Consignee;
        $consigner->name = $this->name;
        $consigner->phone = $this->phone;
        $consigner->gstin = $this->gstin;
        $consigner->full_address = $this->address;
        $consigner->pincode = $this->pincode;
        $consigner->save();

        $this->closeConsginee();
    }

    public function consigner_store()
    {
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

        $this->closeConsginer();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->phone = '';
        $this->gstin = '';
        $this->address = '';
        $this->pincode = '';
        $this->resetValidation();
    }

    public  function cal_total_amount()
    {

        $totalAmount = 0;
        foreach ($this->frieght_charge as $f_charge) {

            $totalAmount = $totalAmount + $f_charge;
        }

        $total_amount = $this->insurance + $this->b_charges + $this->tax + $this->other_charges + $totalAmount;
        $this->total = $total_amount;
    }

    public function get_consignee_details(){
        $consignee= Consignee::where('name',$this->consignee)->first();
        if(!empty($consignee->id)){
        $this->consignee=$consignee->name;
        $this->consignee_gstin=$consignee->gstin;
        $this->consignee_id=$consignee->id;
        }
    }

    public function get_consigner_details(){
        $consigner= Consignor::where('name',$this->consignor)->first();
        if(!empty($consigner->id)){
        $this->consignor=$consigner->name;
        $this->consignor_gstin=$consigner->gstin;
        $this->consigner_id=$consigner->id;
        }
    }

    public function store(){
        $this->updatedTags();
        $this->validate([
            'bill_no' => 'required|unique:bookings',
            'branch_id' => 'required',
            'from' => 'required',
            'to' => 'required',
            'consignee' => 'required',
            'consignor' => 'required',
            'status' => 'required',
        ]);

        if($this->value >= 50000){

            $this->validate([
                'eway_bill_no' => 'required'
            ]);
        }

        if(empty($this->consignee_id)){
            $consignee= new Consignee;
            $consignee->name=$this->consignee;
            $consignee->phone=$this->consignee_phone;
            $consignee->gstin=$this->consignee_gstin;
            $consignee->full_address='';
            $consignee->pincode='';
            $consignee->save();
        }else{
            $consignee= Consignee::find($this->consignee_id);
        }


        if(empty($this->consigner_id)){
            $consigner= new Consignor;
            $consigner->name=$this->consignor;
            $consigner->phone=$this->consignor_phone;
            $consigner->gstin=$this->consignor_gstin;
            $consigner->full_address='';
            $consigner->pincode='';
            $consigner->save();
        }else{
            $consigner= Consignor::find($this->consigner_id);
        }


        $input=$this->all();
        $booking=new Booking;
        $booking->branch_id=$this->branch_id;
        $booking->frenchies_id=$this->frenchies_id;
        $booking->added_by=Auth::guard('admin')->user()->id;
        $booking->bill_no=strtoupper($this->bill_no);
        $lastBooking = Booking::latest()->first(); // Retrieve the last entry from the database

        if ($lastBooking) {
            // Extract the serial part of the tracking code and increment it
            $lastSerial = intval(substr($lastBooking->tracking_code, 5));
            $newSerial = $lastSerial + 1;
        } else {
            // If no previous entry exists, start with 1111
            $newSerial = 1111;
        }
        $booking->tracking_code='TRACK'.$newSerial;

        $booking->from=$this->from;
        $booking->to=$this->to;
        $booking->date=$this->date;
        $booking->edd=$this->date;
        $booking->delivery_address=$this->delivery_address;
        $booking->eway_bill_no=$this->eway_bill_no;
        $booking->consignor=$consigner->name;
        $booking->consignor_phone=$consigner->phone;
        $booking->consignee=$consignee->name;
        $booking->consignee_phone=$consignee->phone;
        $booking->consignor_gstin=$consigner->gstin;
        $booking->consignee_gstin=$consignee->gstin;



        $booking->booking_no=$this->booking_no;
        $booking->insurance=$this->insurance;
        $booking->b_charges=$this->b_charges;
        $booking->other_charges=$this->other_charges;
        $booking->tax=$this->tax;
        $booking->status='order_created';
        $booking->payment_status=$this->status;
        $booking->value=$this->value;
        // $booking->description=$this->description;
        $booking->total=$this->total;
        $booking->save();

        foreach ($this->no_of_pack as $key => $value) {

            $booking_product = new BookingProduct;
            $booking_product->booking_id=$booking->id;
            $booking_product->no_of_pack=$value;
            $booking_product->product=$this->product[$key];
            $booking_product->unit=$this->unit[$key];
            $booking_product->qty=$this->qty[$key];
            $booking_product->freight_charges=$this->frieght_charge[$key];
            $booking_product->save();

            $total_weight=0;
            for($i=1;$i<=$value;$i++){
                $booking_product_barcode=new BookingProductBarcode;
                $booking_product_barcode->booking_product_id=$booking_product->id;
                $booking_product_barcode->barcode=$this->barcodes[$i-1];
                $booking_product_barcode->weight=$this->tags[$i-1];
                $booking_product_barcode->status=0;
                $booking_product_barcode->save();
                $total_weight=$total_weight+$this->tags[$i-1];
            }

            $booking_product->weight=$total_weight;
            $booking_product->save();

        }

        $booking_log=new BookingLog;
        $booking_log->booking_id=$booking->id;
        $booking_log->branch_id= Auth::guard('admin')->user()->id==1? $booking->branch_id :Auth::guard('admin')->user()->branch_id;
        $booking_log->tracking_code=$booking->tracking_code;
        $booking_log->user_id=auth()->guard("admin")->user()->id;
        $booking_log->source='web';
        $booking_log->action='Order Created';
        $booking_log->status='order_created';
        $booking_log->description=$booking->description;
        $booking_log->save();

        $this->redirect('/admin/booking/show/'.$booking->id, navigate: true);
    }

    public function get_c_no_details(){

        $this->branch_id = '';
        $this->from = '';
        $this->frenchies_id='';

        $c_note_details=CNoteDetail::where('c_no',$this->bill_no)->first();
        if (auth()->guard("admin")->user()->id == 1) {
         if(!empty($c_note_details->id)){
            if($c_note_details->assign_type=='branch'){

                    $this->branch_id = $c_note_details->assign_to;
                    $this->from = $c_note_details->assign_to;
                }

            }
        }else{
            if(!empty($c_note_details->assign_to)){
                if (auth()->guard("admin")->user()->branch_id == $c_note_details->assign_to) {
                    if($c_note_details->assign_type=='branch'){


                        $c_note_frenchies_details=CNoteFrenchiesDetail::where('c_no',$this->bill_no)->first();
                        if(!empty($c_note_frenchies_details->id)){

                            $frenchies=Franchise::where('id',$c_note_frenchies_details->assign_to)->first();
                            $this->frenchies_id=$frenchies->id;

                            $this->branch_id = $c_note_details->assign_to;
                            $this->from = $c_note_details->assign_to;

                        }

                        if (empty(auth()->guard("admin")->user()->frenchies_id)) {
                            $this->branch_id = $c_note_details->assign_to;
                            $this->from = $c_note_details->assign_to;
                        }
                    }
                }else{
                    $this->branch_id = '';
                    $this->from = '';
                }
             }
         }
       }



}

