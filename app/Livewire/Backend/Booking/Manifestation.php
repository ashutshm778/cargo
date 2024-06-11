<?php

namespace App\Livewire\Backend\Booking;

use Carbon\Carbon;
use App\Models\Booking;
use Livewire\Component;
use App\Models\Manifest;
use Livewire\WithPagination;
use App\Models\BookingProduct;
use App\Exports\BookingMExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\BookingProductBarcode;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Manifestation extends Component
{

    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search,$branch,$date,$mf_no,$awb_no,$branch_to;

    public $awb_no_list=[];
    public $total_barcode_to_scan=[];
    public $scan_barcode=[];
    public $not_scan_barcode=[];
    public $message='';
    public $date_array=[];
    public $time_array=[];

    function mount(){
        $this->mf_no=auth()->guard("admin")->user()->branch_data->branch_code.rand(111111,999999);
        $this->branch=auth()->guard("admin")->user()->branch_id;
        $this->date=date('Y-m-d');
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function applySearch($query){
        $search=$this->search;
        return $this->search===''?$query:$query->where(function ($q) use ($search) {
            $q->where('tracking_code','like','%'.$search.'%');
        });
    }

    public function render()
    {
        // if(auth()->guard("admin")->user()->id==1){
        //     $bookings = Booking::where('id', '>', 0)->with(['branch_from','branch_to'])->orderBy('id','desc');
        // }else{
        //     $bookings = Booking::where('id', '>', 0)->where('branch_id',auth()->guard("admin")->user()->branch_id)->with(['branch_from','branch_to'])->orderBy('id','desc');
        // }
        // if($this->branch){
        //     $bookings=$bookings->where('branch_id',$this->branch);
        //  }
        //  if($this->startDate && $this->endDate)
        //  {
        //      $da1=$this->startDate;
        //      $da2=$this->endDate;
        //      $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
        //      $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();
        //      $bookings = $bookings->whereBetween('created_at', [$startDate, $endDate]);
        //  }
        // $query = $this->applySearch($bookings);
        // $bookings=$query->paginate(10);
        return view('livewire.backend.booking.manifestation');
    }

    public function fileExport()
    {
        if(auth()->guard("admin")->user()->id==1){
            $bookings = Booking::where('id', '>', 0)->with(['branch_from','branch_to'])->orderBy('id','desc');
        }else{
            $bookings = Booking::where('id', '>', 0)->where('branch_id',auth()->guard("admin")->user()->branch_id)->with(['branch_from','branch_to'])->orderBy('id','desc');
        }
        if($this->branch){
            $bookings=$bookings->where('branch_id',$this->branch);
         }
         if($this->startDate && $this->endDate)
         {
             $da1=$this->startDate;
             $da2=$this->endDate;
             $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
             $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();
             $bookings = $bookings->whereBetween('created_at', [$startDate, $endDate]);
         }
        $query = $this->applySearch($bookings);
        $bookings=$query->get()->pluck('id');

        return Excel::download(new BookingMExport($bookings), 'booking_m-report.xlsx');
    }

    public function add_fields(){
        $booking_product_barcode = BookingProductBarcode::where('barcode', $this->awb_no)->first();

        if (!empty($booking_product_barcode->id)) {
            $booking_product = BookingProduct::find($booking_product_barcode->booking_product_id);
            $booking = Booking::find($booking_product->booking_id)->where('from',auth()->guard("admin")->user()->branch_id)->first();
            if(!empty($booking->id)){
                if(!in_array($this->awb_no,$this->awb_no_list)){
                array_push($this->awb_no_list,$this->awb_no);
                array_push($this->date_array,date('Y-m-d'));
                array_push($this->time_array,date('H:i:s'));

                }
                $this->awb_no='';
            }
        }
        $this->forward();
    }

    public function remove($value)
    {
        $key=array_keys($this->awb_no_list, $value, true);
        unset($this->awb_no_list[$key[0]]);
        $this->total_barcode_to_scan=[];
        $this->scan_barcode=[];
        $this->not_scan_barcode=[];


        $this->forward();

    }

    public function forward(){

        foreach($this->awb_no_list as $data){
            $bookingProductBarcode=BookingProductBarcode::where('barcode',$data)->first();
            foreach(BookingProductBarcode::where('booking_product_id',$bookingProductBarcode->booking_product_id)->get() as $bookingProduct){
            if(!in_array($bookingProduct->barcode,$this->total_barcode_to_scan)){
                array_push($this->total_barcode_to_scan,$bookingProduct->barcode);
                }
            }
            if(!in_array($data,$this->scan_barcode)){
                array_push($this->scan_barcode,$data);
            }
         }

         $this->not_scan_barcode = array_diff($this->total_barcode_to_scan, $this->scan_barcode);
         if(count($this->not_scan_barcode)==0){
           $this->message='';
         }
    }

    public function store(){
        $this->message='';
        $this->forward();
        $this->validate([
            'branch_to' => 'required',
            'date' => 'required',
        ]);
        if(count($this->not_scan_barcode)==0){
        foreach($this->scan_barcode as $key=> $data){

            $bookingProductBarcode=BookingProductBarcode::where('barcode',$data)->first();

            if(empty(Manifest::where('packet',$bookingProductBarcode->barcode)->first()->id)){
                $manifest=new Manifest;
                $manifest->entry_date=$this->date_array[$key];
                $manifest->entry_time=$this->time_array[$key];
                $manifest->packet=$bookingProductBarcode->barcode;
                $manifest->origin=$bookingProductBarcode->bookingProductData->bookingData->from;
                $manifest->awb_no=$bookingProductBarcode->bookingProductData->bookingData->to;
                $manifest->mf_no=$this->mf_no;
                $manifest->weight=$bookingProductBarcode->weight;
                $manifest->eway_no='';
                $manifest->enter_by='';
                $manifest->forward_from=$this->branch;
                $manifest->forward_to=$this->branch_to;
                $manifest->date=$this->date;
                $manifest->save();
            }

        }

        $this->redirect('/admin/mainifestation', navigate: true);
       }else{
            $this->message='Please Scan All Left Barcode';
       }

    }

}
