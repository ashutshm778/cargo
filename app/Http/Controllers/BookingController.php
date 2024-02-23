<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Milon\Barcode\DNS1D;
use App\Models\BookingLog;
use Illuminate\Http\Request;
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
        $start                 =         $request->get("start"); // where to start next records for pagination
        $rowPerPage         =         $request->get("length"); // How many recods needed per page for pagination

        $orderArray        =         $request->get('order');
        $columnNameArray     =         $request->get('columns'); // It will give us columns array

        $searchArray         =         $request->get('search');
        $columnIndex         =         $orderArray[0]['column'];  // This will let us know,
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
        dd($request->all());
        $booking=new Booking;
        $booking->branch_id=1;
        $booking->added_by=Auth::guard('admin')->user()->id;
        $booking->bill_no=$request->bill_no;
        $booking->tracking_code='TRACK'.rand(1111,9999);
        $booking->from=$request->from;
        $booking->to=$request->to;
        $booking->date=$request->date;
        $booking->consignor=$request->consignor;
        $booking->consignee=$request->consignee;
        $booking->consignor_gstin=$request->consignor_gstin;
        $booking->consignee_gstin=$request->consignee_gstin;
        $booking->consignee_gstin=$request->consignee_gstin;
        $booking->booking_no=$request->booking_no;
        $booking->product=$request->product;
        $booking->weight=$request->weight;
        $booking->freight=$request->freight;
        $booking->freight_charges=$request->freight_charges;
        $booking->insurance=$request->insurance;
        $booking->b_charges=$request->b_charges;
        $booking->other_charges=$request->other_charges;
        $booking->no_of_pack=$request->no_of_pack;
        $booking->tax=$request->tax;
        $booking->status='order_created';
        $booking->value=$request->value;
        $booking->description=$request->description;
        $booking->total=$request->freight_charges+$request->insurance+$request->b_charges+$request->other_charges+$request->tax;
        $booking->save();

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
        $booking->branch_id=1;
        $booking->bill_no=$request->bill_no;
        $booking->from=$request->from;
        $booking->to=$request->to;
        $booking->date=$request->date;
        $booking->consignor=$request->consignor;
        $booking->consignee=$request->consignee;
        $booking->consignor_gstin=$request->consignor_gstin;
        $booking->consignee_gstin=$request->consignee_gstin;
        $booking->consignee_gstin=$request->consignee_gstin;
        $booking->booking_no=$request->booking_no;
        $booking->product=$request->product;
        $booking->weight=$request->weight;
        $booking->freight=$request->freight;
        $booking->freight_charges=$request->freight_charges;
        $booking->insurance=$request->insurance;
        $booking->b_charges=$request->b_charges;
        $booking->other_charges=$request->other_charges;
        $booking->no_of_pack=$request->no_of_pack;
        $booking->tax=$request->tax;
        $booking->value=$request->value;
        $booking->description=$request->description;
        $booking->total=$request->freight_charges+$request->insurance+$request->b_charges+$request->other_charges+$request->tax;
        $booking->save();

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
}
