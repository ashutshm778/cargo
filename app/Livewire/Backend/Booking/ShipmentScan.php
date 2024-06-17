<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking;
use Livewire\Component;
use App\Models\Manifest;
use App\Models\BookingLog;
use App\Models\BookingProduct;
use App\Models\ShipmentInScan;
use App\Models\ManifestDetails;
use App\Models\ShipmentInScanDetail;
use App\Models\BookingProductBarcode;

class ShipmentScan extends Component
{

    public $mf_no,$from_branch,$total_weight,$total_pc,$awb_no;

    public $awb_no_list=[];
    public $total_barcode_to_scan=[];
    public $scan_barcode=[];
    public $not_scan_barcode=[];
    public $message='';
    public $date_array=[];
    public $time_array=[];

    public function render()
    {
        return view('livewire.backend.booking.shipment-in-scan');
    }

    public function get_mf_no_detail(){

        $manifest=Manifest::where('mf_no',$this->mf_no)->where('forward_to',auth()->guard("admin")->user()->branch_id)->first();
        if(!empty($manifest->id)){
        $this->from_branch=$manifest->forward_from;
        $this->total_weight=$manifest->weight;
        $this->total_pc= count($manifest->manifestList);

        foreach($manifest->manifestList as $bookingProduct){
            if(!in_array($bookingProduct->packet,$this->total_barcode_to_scan)){
                array_push($this->total_barcode_to_scan,$bookingProduct->packet);
                }
            }
        }else{
            $this->message='Not Forward To Your Branch';
        }

    }

    public function add_fields(){
        $booking_product_barcode = ManifestDetails::where('packet', $this->awb_no)->where('forward_to',auth()->guard("admin")->user()->branch_id)->first();
        if (!empty($booking_product_barcode->id)) {

                if(!in_array($this->awb_no,$this->awb_no_list)){
                    array_push($this->awb_no_list,$this->awb_no);
                    array_push($this->date_array,date('Y-m-d'));
                    array_push($this->time_array,date('H:i:s'));
                }
                $this->awb_no='';
        }else{
            $this->awb_no='';
            $this->message='Not Forward To Your Branch';
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

            if(!in_array($data,$this->scan_barcode)){
                array_push($this->scan_barcode,$data);
            }
         }

         $this->not_scan_barcode = array_diff($this->total_barcode_to_scan, $this->scan_barcode);
    }

    public function store(){
        $this->message='';
        $this->forward();
        $this->validate([
            'mf_no' => 'required|unique:shipment_in_scans',
        ]);


        if(count($this->not_scan_barcode)==0){

            $manifest=Manifest::where('mf_no',$this->mf_no)->where('forward_to',auth()->guard("admin")->user()->branch_id)->first();

            $shipment = new ShipmentInScan;
            $shipment->forward_from = $manifest->forward_from;
            $shipment->forward_to=$manifest->forward_to;
            $shipment->date=date('Y-m-d');
            $shipment->mf_no=$this->mf_no;
            $shipment->weight=$manifest->weight;
            $shipment->save();


         foreach($this->scan_barcode as $key=> $data_barcode){
            $data=ManifestDetails::where('packet',$data_barcode)->first();
            if(!empty($data->id)){

                $shipment_detail=new ShipmentInScanDetail;
                $shipment_detail->shipment_in_scan_id=$shipment->id;
                $shipment_detail->entry_date=$this->date_array[$key];
                $shipment_detail->entry_time=$this->time_array[$key];
                $shipment_detail->packet=$data->packet;
                $shipment_detail->origin=$data->origin;
                $shipment_detail->destination=$data->destination;
                $shipment_detail->awb_no=$data->awb_no;
                $shipment_detail->mf_no=$this->mf_no;
                $shipment_detail->weight=$data->weight;
                $shipment_detail->eway_no='';
                $shipment_detail->enter_by=auth()->guard("admin")->user()->code;
                $shipment_detail->forward_from=$data->forward_from;
                $shipment_detail->forward_to=$data->forward_to;
                $shipment_detail->date=date('Y-m-d');
                $shipment_detail->save();


            }

         }

         foreach(ShipmentInScanDetail::where('shipment_in_scan_id',$shipment->id)->groupBy('awb_no')->get() as $data){

            $booking=Booking::where('bill_no',$data->awb_no)->first();

            $booking_log = new BookingLog;
            $booking_log->booking_id = $booking->id;
            $booking_log->branch_id = auth()->guard("admin")->user()->branch_id;
            $booking_log->tracking_code = $booking->tracking_code;
            $booking_log->user_id = auth()->guard("admin")->user()->id;
            $booking_log->source = 'app';
            $booking_log->action = 'Package Arrived At '.$shipment->forwardTo->name.' from '.$shipment->forwardFrom->name;
            $booking_log->status = 'arrived';
            $booking_log->description = '';
            $booking_log->save();

            $booking->status = 'arrived-at-'.$shipment->forwardTo->name;
            $booking->save();

            }

        $this->redirect('/admin/shipment_in_scan', navigate: true);
       }else{
            $this->message='Please Scan All Left Barcode';
       }
    }
}
