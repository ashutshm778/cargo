<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.index');
    }

    public function track_order(Request $request){
        $booking=Booking::where('bill_no',$request->bill_no)->first();
        return view('frontend.track_order',compact('booking'));
    }

}
