<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking;
use Livewire\Component;
use App\Models\Consignee;
use App\Models\Consignor;
use App\Models\BookingLog;
use Livewire\WithPagination;
use App\Models\BookingProduct;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingProductBarcode;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $branch_id, $delivery_address, $from, $to, $consignor_phone, $consignor, $consignee_phone, $consignee, $consignor_gstin, $consignee_gstin, $booking_no, $value,$date;
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
    public $hidden_id;
    public $eway_bill_no;


    function mount($id)
    {
        $this->edit($id);

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
        if(!empty($this->qty[$i])){
            unset($this->qty[$i]);
            unset($this->no_of_pack[$i]);
            unset($this->product[$i]);
            unset($this->unit[$i]);
            unset($this->weight[$i]);
            unset($this->frieght_charge[$i]);
        }
    }

    public function render()
    {
        return view('livewire.backend.booking.edit')->layout('components.backend.layouts.app');
    }

    public function edit($id)
    {
        $this->hidden_id=$id;
        $booking=Booking::find($id);
        $this->bill_no=$booking->bill_no;
        $this->branch_id=$booking->branch_id;
        $this->from = $booking->from;
        $this->to = $booking->to;
        $this->date = $booking->date;
        $this->delivery_address=$booking->delivery_address;

        $this->consignor=$booking->consignor;
        $this->consignor_phone=$booking->consignor_phone;
        $this->consignee=$booking->consignee;
        $this->consignee_phone=$booking->consignee_phone;
        $this->consignor_gstin=$booking->consignor_gstin;
        $this->consignee_gstin=$booking->consignee_gstin;

        $this->consignee_id=Consignee::where('phone',$booking->consignee_phone)->first()->id;
        $this->consigner_id=Consignor::where('phone',$booking->consignor_phone)->first()->id;



        $this->booking_no =  $booking->booking_no;
        $this->insurance = $booking->insurance;
        $this->b_charges = $booking->b_charges;
        $this->other_charges = $booking->other_charges;
        $this->tax = $booking->tax;

        $this->status = $booking->payment_status;
        $this->value = $booking->value;
        // $booking->description=$this->description;
        $this->total = $booking->total;
        foreach ($booking->booking_product as $key => $value) {
            $this->add($key);

            $this->product[$key] = $value->product ;
            $this->qty[$key] = $value->qty;
            $this->weight[$key] = $value->weight;
            $this->unit[$key] = $value->unit;
            $this->no_of_pack = $value->no_of_pack;
            $this->frieght_charge[$key] =  $value->freight_charges;
        }


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
        $consignee= Consignee::where('phone',$this->consignee_phone)->first();
        $this->consignee=$consignee->name;
        $this->consignee_gstin=$consignee->gstin;
        $this->consignee_id=$consignee->id;
    }

    public function get_consigner_details(){
        $consigner= Consignor::where('phone',$this->consignor_phone)->first();
        $this->consignor=$consigner->name;
        $this->consignor_gstin=$consigner->gstin;
        $this->consigner_id=$consigner->id;
    }

    public function update(){

        $this->validate([
            'booking_no' => 'unique:bookings,id,'.$this->hidden_id,
            'bill_no' => 'required|unique:bookings,id,'.$this->hidden_id,
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
        $booking=Booking::find($this->hidden_id);
        $booking->branch_id=$this->branch_id;
        $booking->added_by=Auth::guard('admin')->user()->id;
        $booking->bill_no=$this->bill_no;
        $lastBooking = Booking::latest()->first(); // Retrieve the last entry from the database



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




        $booking->insurance=$this->insurance;
        $booking->b_charges=$this->b_charges;
        $booking->other_charges=$this->other_charges;
        $booking->tax=$this->tax;

        $booking->payment_status=$this->status;
        $booking->value=$this->value;
        // $booking->description=$this->description;
        $booking->total=$this->total;
        $booking->save();

        foreach ($booking->booking_product as $key => $value) {

            $booking_product =BookingProduct::find($value->id);
            $booking_product->booking_id=$booking->id;
            $booking_product->no_of_pack=$this->no_of_pack[$key];
            $booking_product->product=$this->product[$key];
            $booking_product->unit=$this->unit[$key];
            $booking_product->weight=$this->weight[$key];
            $booking_product->qty=$this->qty[$key];
            $booking_product->freight_charges=$this->frieght_charge[$key];
            $booking_product->save();

        }

        $this->redirect('/admin/booking/show/'.$booking->id, navigate: true);
    }

}
