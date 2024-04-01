<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Milon\Barcode\DNS1D;
use App\Models\Consignee;
use App\Models\Consignor;
use App\Models\BookingLog;
use Illuminate\Http\Request;
use App\Models\BookingProduct;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingProductBarcode;
use Illuminate\Support\Facades\Validator;

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

        $dateRange = explode('-', $request->get('daterange'));

        if (!empty($request->get('daterange'))) {
            $start_date = Carbon::parse($dateRange[0])->toDateString();
            $end_date = Carbon::parse($dateRange[1])->toDateString();
        }

        $branch = Booking::where('id', '>', 0);
        $total = $branch->count();

        $totalFilter = Booking::where('id', '>', 0);
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('name', 'like', '%' . $searchValue . '%');
        }
        if (!empty($request->get('daterange'))) {
            $totalFilter = $totalFilter->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
        }
        if (!empty($request->get('branch_id'))) {
            $totalFilter = $totalFilter->where('branch_id', $request->get('branch_id'));
        }
        $totalFilter = $totalFilter->count();


        $arrData = Booking::where('id', '>', 0);
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('name', 'like', '%' . $searchValue . '%');
        }
        if (!empty($request->get('daterange'))) {
            $arrData = $arrData->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
        }
        if (!empty($request->get('branch_id'))) {
            $arrData = $arrData->where('branch_id', $request->get('branch_id'));
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

       $validator =  Validator::make($request->all(), [
        'booking_no' => 'required|unique:bookings',
        'bill_no' => 'required|unique:bookings'
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    } else {

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
            $consigner->phone=$request->consignor_phone;
            $consigner->gstin=$request->consignor_gstin;
            $consigner->full_address='';
            $consigner->pincode='';
            $consigner->save();
        }else{
            $consigner= Consignor::find($request->consignor_id);
        }


        $input=$request->all();
        $booking=new Booking;
        $booking->branch_id=$request->branch_id;
        $booking->added_by=Auth::guard('admin')->user()->id;
        $booking->bill_no=$request->bill_no;
        $booking->tracking_code='TRACK'.rand(1111,9999);
        $booking->from=$request->from;
        $booking->to=$request->to;
        $booking->date=$request->date;
        $booking->edd=$request->date;


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

            for($i=1;$i<=$value;$i++){
                $booking_product_barcode=new BookingProductBarcode;
                $booking_product_barcode->booking_product_id=$booking_product->id;
                $booking_product_barcode->barcode=$booking->bill_no.$i;
                $booking_product_barcode->save();
            }

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
    }

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
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'booking_no' => [
                'required',
                Rule::unique('bookings')->ignore($id),
            ],
            'bill_no' => [
                'required',
                Rule::unique('bookings')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
        $booking= Booking::find($id);
        $input=$request->all();
       // dd($input);
        $booking->branch_id=$request->branch_id;
        $booking->added_by=Auth::guard('admin')->user()->id;
        // $booking->from=$request->from;
        // $booking->to=$request->to;
        $booking->date=$request->date;
        $booking->edd=$request->date;
        // $booking->consignor=$request->consignor;
        // $booking->consignee=$request->consignee;
        // $booking->consignor_gstin=$request->consignor_gstin;
        // $booking->consignee_gstin=$request->consignee_gstin;
        // $booking->consignee_gstin=$request->consignee_gstin;
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
    public function booking_status_model(Request $request){
        $booking=Booking::find($request->id);
        return view('backend.booking.status_model',compact('booking'));
    }
    public function booking_status_update(Request $request){
        //dd($request->all());
        $booking=Booking::find($request->id);
        $booking->status=$request->status;
        $booking->save();

        $booking_log=new BookingLog;
        $booking_log->booking_id=$booking->id;
        $booking_log->branch_id=$booking->branch_id;
        $booking_log->tracking_code=$booking->tracking_code;
        $booking_log->user_id=$booking->added_by;
        $booking_log->source='web';
        $booking_log->action=$request->status;
        $booking_log->status=$request->status;
        if(!empty($request->remarks)){
         $booking_log->description=$request->remarks;
        }
        if(!empty($request->remark)){
            $booking_log->description=$request->remark;
           }
        $booking_log->save();

        return redirect()->back();

    }

    public function booking_barcode($id){
          $booking_product=BookingProduct::find($id);
          $booking=Booking::find($booking_product->booking_id);
          $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
          $barcode = $generator->getBarcode($booking->bill_no, $generator::TYPE_CODE_128);
          $booking_product_barcode=BookingProductBarcode::where('booking_product_id',$booking_product->id)->get();
          return view('backend.booking.booking_barcode',compact('booking_product','booking','barcode','booking_product_barcode'));
    }

    public function mainifestation_list()
    {
        return view('backend.booking.mainifestation_list');
    }

    public function get_mainifestation_list(Request $request)
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

        $dateRange = explode('-', $request->get('daterange'));

        if (!empty($request->get('daterange'))) {
            $start_date = Carbon::parse($dateRange[0])->toDateString();
            $end_date = Carbon::parse($dateRange[1])->toDateString();
        }

        $branch = Booking::where('id', '>', 0);
        $total = $branch->count();

        $totalFilter = Booking::where('id', '>', 0);
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('name', 'like', '%' . $searchValue . '%');
        }
        if (!empty($request->get('daterange'))) {
            $totalFilter = $totalFilter->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
        }
        if (!empty($request->get('branch_id'))) {
            $totalFilter = $totalFilter->where('branch_id', $request->get('branch_id'));
        }
        $totalFilter = $totalFilter->count();


        $arrData = Booking::where('id', '>', 0);
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('name', 'like', '%' . $searchValue . '%');
        }
        if (!empty($request->get('daterange'))) {
            $arrData = $arrData->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
        }
        if (!empty($request->get('branch_id'))) {
            $arrData = $arrData->where('branch_id', $request->get('branch_id'));
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

    public function delivery()
    {
        return view('backend.booking.delivery');
    }

    public function get_delivery(Request $request)
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

        $dateRange = explode('-', $request->get('daterange'));

        if (!empty($request->get('daterange'))) {
            $start_date = Carbon::parse($dateRange[0])->toDateString();
            $end_date = Carbon::parse($dateRange[1])->toDateString();
        }

        if(auth()->guard("admin")->user()->id==1){
            $branch = Booking::where('id', '>', 0);
        }else{
          $branch = Booking::where('to',3);
        }
        $total = $branch->count();

        if(auth()->guard("admin")->user()->id==1){
         $totalFilter = Booking::where('id', '>', 0);
        }else{
         $totalFilter = Booking::where('to',3);
        }
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('name', 'like', '%' . $searchValue . '%');
        }
        if (!empty($request->get('daterange'))) {
            $totalFilter = $totalFilter->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
        }
        if (!empty($request->get('branch_id'))) {
            $totalFilter = $totalFilter->where('branch_id', $request->get('branch_id'));
        }
        $totalFilter = $totalFilter->count();

        if(auth()->guard("admin")->user()->id==1){
            $arrData = Booking::where('id', '>', 0);
        }else{
             $arrData = Booking::where('to',3);
        }
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('name', 'like', '%' . $searchValue . '%');
        }
        if (!empty($request->get('daterange'))) {
            $arrData = $arrData->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
        }
        if (!empty($request->get('branch_id'))) {
            $arrData = $arrData->where('branch_id', $request->get('branch_id'));
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

    public function booking_log()
    {
        return view('backend.booking.log');
    }

    public function get_booking_log(Request $request)
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

        $dateRange = explode('-', $request->get('daterange'));

        if (!empty($request->get('daterange'))) {
            $start_date = Carbon::parse($dateRange[0])->toDateString();
            $end_date = Carbon::parse($dateRange[1])->toDateString();
        }
        $branch =  BookingLog::with(['branch_data','booking_data']);
        $total = $branch->count();

        $totalFilter = BookingLog::where('id', '>', 0);
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('name', 'like', '%' . $searchValue . '%');
        }
        if (!empty($request->get('daterange'))) {
            $totalFilter = $totalFilter->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
        }
        if (!empty($request->get('branch_id'))) {
            $totalFilter = $totalFilter->where('branch_id', $request->get('branch_id'));
        }
        $totalFilter = $totalFilter->count();


        $arrData = BookingLog::where('id', '>', 0)->with(['branch_data','booking_data']);
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('name', 'like', '%' . $searchValue . '%');
        }
        if (!empty($request->get('daterange'))) {
            $arrData = $arrData->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
        }
        if (!empty($request->get('branch_id'))) {
            $arrData = $arrData->where('branch_id', $request->get('branch_id'));
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


}
