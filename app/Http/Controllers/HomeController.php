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

    public function get_all_status(){
        return [
            'NDR','DELIVERED'
        ];
    }

    public function get_all_remark_ndr(){
        return [
            "TOPAY / COD / CLEARANCE / PENALTY AMOUNT NOT READY",
            "REFUSED TO PAY COD / TOPAY AMOUNT">"REFUSED TO PAY COD / TOPAY AMOUNT",
            "RECEIVER RESCHEDULED DELIVERY DATE">"RECEIVER RESCHEDULED DELIVERY DATE",
             "POLITICAL DISTURBANCE / BANDH /STRIKE (UNS)",
             "PARTIAL DELIVERED",
             "OUT OF DELIVERY AREA (ODA)",
             "OFFICE/INWARD CLOSED OR DOOR LOCKED / TIME OVER",
            "NO SERVICE",
            "NO ENTRY / RESTRICTED AREA MISROUTE",
             "LATE ARRIVAL OF LOAD",
            "INWARD CLOSED / BANK TIME OVER",
            "EWAY BILL DISPUTE / WITHOUT GST INVOICE DECLARATION",
             "DETAINED BY GOVERNMENT / SALES TAX/AIRPORT AUTHORITY",
             "DELIVERY ISSUE DUE TO HEAVY RAIN / NATURAL CALAMITY",
             "CONTACT NAME/DEPT NOT MENTIONED / NO SUCH PERSON",
             "CONSIGNOR / AGENT REQUESTED TO HOLD",
            "CONSIGNMENT LOST",
             "CONSIGNEE WILL COLLECT FROM OFFICE",
             "CONSIGNEE OUT OF STATION OR NOT AVAILABLE",
             "CONSIGNEE NOT RESPONDING TO PHONE COMPANY/PERSON SHIFTED",
             "ADDRESS NOT FOUND / IN-COMPLETE / REQUIRE PHONE NO",
             "OTHER"
        ];
    }

    public function get_all_remark_delivered(){
        return [
           "SIGNATURE",
           "SIGN WITH STAMP",
           "DROP IN BOX",
           "DROP DELIVERY",
           "SELF RECIVE",
           "COMPANY STAMP",
           "OTHER"
        ];
    }

}
