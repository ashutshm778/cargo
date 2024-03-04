<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Milon\Barcode\DNS1D;
use App\Models\Consignee;
use App\Models\Consignor;
use App\Models\BookingLog;
use Illuminate\Http\Request;
use App\Models\BookingProduct;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.booking.index');
    }

    public function get_booking(Request $request)
    {

        $draw                 =         $request->get('draw'); // Internal use
        $start                =         $request->get("start"); // where to start next records for pagination
        $rowPerPage           =         $request->get("length"); // How many recods needed per page for pagination

        $orderArray           =         $request->get('order');
        $columnNameArray      =         $request->get('columns'); // It will give us columns array

        $searchArray          =         $request->get('search');
        $columnIndex          =         $orderArray[0]['column'];  // This will let us know,
        // which column index should be sorted
        // 0 = id, 1 = name, 2 = email , 3 = created_at

        $columnName         =         $columnNameArray[$columnIndex]['data']; // Here we will get column name,
        // Base on the index we get

        $columnSortOrder     =         $orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue         =         $searchArray['value']; // This is search value


        $branch = Booking::where('id', '>', 0);
        $total = $branch->count();

        $totalFilter = Booking::where('id', '>', 0);
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('name', 'like', '%' . $searchValue . '%');
        }
        $totalFilter = $totalFilter->count();


        $arrData = Booking::where('id', '>', 0);
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('name', 'like', '%' . $searchValue . '%');
        }


        $arrData = $arrData->get();

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $totalFilter,
            "data" => $arrData,
        );

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());

        if(empty($request->consignee_id)){
            $consignee= new Consignee;
            $consignee->name=$request->consignee;
            $consignee->phone=$request->consignee_phone;
            $consignee->gstin=$request->consignee_gstin;
            $consignee->full_address='';
            $consignee->pincode='';
            $consignee->save();
        }else{
            $consignee= Consignee::find($request->consignee_id);
        }


        if(empty($request->consignor_id)){
            $consigner= new Consignor;
            $consigner->name=$request->consignor;
            $consigner->phone=$request->consignee_phone;
            $consigner->gstin=$request->consignor_gstin;
            $consigner->full_address='';
            $consigner->pincode='';
            $consigner->save();
        }else{
            $consigner= Consignor::find($request->consignee_id);
        }


        $input=$request->all();
        $booking=new Booking;
        $booking->branch_id=1;
        $booking->added_by=Auth::guard('admin')->user()->id;
        $booking->bill_no=$request->bill_no;
        $booking->tracking_code='TRACK'.rand(1111,9999);
        $booking->from=$request->from;
        $booking->to=$request->to;
        $booking->date=$request->date;



        $booking->consignor=$consigner->name;
        $booking->consignee=$consignee->name;
        $booking->consignor_gstin=$consigner->gstin;
        $booking->consignee_gstin=$consignee->gstin;



        $booking->booking_no=$request->booking_no;
        $booking->insurance=$request->insurance;
        $booking->b_charges=$request->b_charges;
        $booking->other_charges=$request->other_charges;
        $booking->tax=$request->tax;
        $booking->status='order_created';
        $booking->payment_status=$request->status;
        $booking->value=$request->value;
        $booking->description=$request->description;
        $booking->total=$request->total;
        $booking->save();

        foreach($input['no_of_pack'] as $key=>$value){

            $booking_product = new BookingProduct;
            $booking_product->booking_id=$booking->id;
            $booking_product->no_of_pack=$value;
            $booking_product->product=$input['product'][$key];
            $booking_product->unit=$input['unit'][$key];
            $booking_product->weight=$input['weight'][$key];
            $booking_product->qty=$input['qty'][$key];
            $booking_product->freight_charges=$input['frieght_charge'][$key];
            $booking_product->save();
        }

        $booking_log=new BookingLog;
        $booking_log->booking_id=$booking->id;
        $booking_log->branch_id=$booking->branch_id;
        $booking_log->tracking_code=$booking->tracking_code;
        $booking_log->user_id=$booking->added_by;
        $booking_log->source='web';
        $booking_log->action='Order Created';
        $booking_log->status='order_created';
        $booking_log->description=$booking->description;
        $booking_log->save();

        return redirect()->route('booking.index')->with('success', 'Booking Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($booking->bill_no, $generator::TYPE_CODE_128);

        return view('backend.booking.show', compact('barcode','booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('backend.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $input=$request->all();
       // dd($input);
        $booking->branch_id=1;
        $booking->added_by=Auth::guard('admin')->user()->id;
        $booking->from=$request->from;
        $booking->to=$request->to;
        $booking->date=$request->date;
        $booking->consignor=$request->consignor;
        $booking->consignee=$request->consignee;
        $booking->consignor_gstin=$request->consignor_gstin;
        $booking->consignee_gstin=$request->consignee_gstin;
        $booking->consignee_gstin=$request->consignee_gstin;
        $booking->insurance=$request->insurance;
        $booking->b_charges=$request->b_charges;
        $booking->other_charges=$request->other_charges;
        $booking->tax=$request->tax;
        $booking->status='order_created';
        $booking->value=$request->value;
        $booking->description=$request->description;
        $booking->total=$request->total;
        $booking->save();

        foreach($input['booking_product_id'] as $key=>$value){

            $booking_product = BookingProduct::find($value);
            $booking_product->booking_id=$booking->id;
            $booking_product->no_of_pack=$value;
            $booking_product->unit=$input['unit'][$key];
            $booking_product->weight=$input['weight'][$key];
            $booking_product->qty=$input['qty'][$key];
            $booking_product->freight_charges=$input['frieght_charge'][$key];
            $booking_product->save();
        }

        return redirect()->route('booking.index')->with('success', 'Booking Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function payment_receipt($id){
        $booking=Booking::find($id);
        return view('backend.booking.payment_receipt',compact('booking'));
    }
    public function track_order($id){
        $booking=Booking::find($id);
        return view('backend.track_order',compact('booking'));
    }

}
