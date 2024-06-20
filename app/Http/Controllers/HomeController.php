<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Career;
use App\Models\ContactUs;
use App\Models\Franchise;
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

    public function contact_us(Request $request)
    {

        $contact = new ContactUs;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        return back()->with('success', 'Enquiry Send  Successfully');
    }

    public function career(Request $request)
    {

        $career = new Career;
        $career->name = $request->name;
        $career->email = $request->email;
        $career->phone = $request->phone;
        $career->company_name = $request->company_name;
        $career->post_name = $request->post_name;
        if($request->resume != null){
            $file_photo = time().rand().'.'.$request->resume->getClientOriginalExtension();
            $request->resume->move(public_path('resume'), $file_photo);
            $src= "public/resume/".$file_photo;
            $career->resume = $file_photo;
        }
        $career->message = $request->message;
        $career->save();
        return back()->with('success', 'Career Enquiry Send  Successfully');
    }

    public function franchise(Request $request)
    {

        $franchise = new Franchise;
        $franchise->name = $request->name;
        $franchise->company_name = $request->company_name;
        $franchise->phone = $request->phone;
        $franchise->email = $request->email;
        $franchise->services = $request->services;
        $franchise->location = $request->location;
        $franchise->message = $request->message;
        $franchise->save();
        return back()->with('success', 'Franchise Enquiry Send  Successfully');
    }



}
