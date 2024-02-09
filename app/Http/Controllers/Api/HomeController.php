<?php

namespace App\Http\Controllers\Api;




use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{


    public function login(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'email' => 'required|exists:admins',
            'password' => 'required',
        ]);
        if ($valid->fails()) {
            return response()->json(['error' => $valid->errors(), 'status' => '401'], 401);
        } else {

            $data = Admin::where('email', $request->email)->first();
            $data->access_token =  $data->createToken('MyApp')->plainTextToken;
            return $data;
        }
    }

    public function home(){
        $booking_log = BookingLog::where('user_id',Auth::guard('api')->user()->id)->get();

        return response()->json([
            'booking_log' => $booking_log,
            'success' => true,
            'status' => 200
        ]);
    }

    public function booking_log(){
        $booking_log = BookingLog::where('user_id',Auth::guard('api')->user()->id)->get();

        return response()->json([
            'booking_log' => $booking_log,
            'success' => true,
            'status' => 200
        ]);
    }

    public function get_booking(Request $request){
        $booking = Booking::where('bill_no',$request->scanner_data)->get();

        return response()->json([
            'booking_data' => $booking,
            'success' => true,
            'status' => 200
        ]);
    }

    public function booking_scan_update(Request $request){
        dd($request->all());

        $booking=Booking::find($request->branch_id);


        if($booking->status=='dispatched'){
            if(empty(BookingLog::where('branch_id',Auth::guard('api')->user()->branch_id)->where('tracking_code',$booking->tracking_code)->where('status','arrived')->first()->id)){
                $booking_log=new BookingLog;
                $booking_log->booking_id=$booking->id;
                $booking_log->branch_id=Auth::guard('api')->user()->branch_id;
                $booking_log->tracking_code=$booking->tracking_code;
                $booking_log->user_id=Auth::guard('api')->user()->id;
                $booking_log->source='app';
                $booking_log->action='Package Arrived At';
                $booking_log->status='arrived';
                $booking_log->description=$request->description;
                $booking_log->save();
            }
            if(empty(BookingLog::where('branch_id',Auth::guard('api')->user()->branch_id)->where('tracking_code',$booking->tracking_code)->where('status','dispatched')->first()->id)){
                $booking_log=new BookingLog;
                $booking_log->booking_id=$booking->id;
                $booking_log->branch_id=Auth::guard('api')->user()->branch_id;
                $booking_log->tracking_code=$booking->tracking_code;
                $booking_log->user_id=Auth::guard('api')->user()->id;
                $booking_log->source='app';
                $booking_log->action='Package Dispatched From';
                $booking_log->status='dispatched';
                $booking_log->description=$request->description;
                $booking_log->save();
            }
            return response()->json([
                'message' => 'Data Updated Successfully',
                'success' => true,
                'status' => 200
            ]);
        }
        if(($booking->status=='order_created') && (Auth::guard('api')->user()->branch_id==$booking->branch_id)){

                $booking->status='dispatched';
                $booking->save();

                $booking_log=new BookingLog;
                $booking_log->booking_id=$booking->id;
                $booking_log->branch_id=Auth::guard('api')->user()->branch_id;
                $booking_log->tracking_code=$booking->tracking_code;
                $booking_log->user_id=Auth::guard('api')->user()->id;
                $booking_log->source='app';
                $booking_log->action='Package Dispatched From';
                $booking_log->status='dispatched';
                $booking_log->description=$request->description;
                $booking_log->save();

                return response()->json([
                    'message' => 'Data Updated Successfully',
                    'success' => true,
                    'status' => 200
                ]);

        }
        return response()->json([
            'message' => 'Package Is Not Dispatched By Origin',
            'success' => true,
            'status' => 200
        ]);
    }

    public function getUserProfile(Request $request)
    {
        $user_data = Admin::where('id', Auth::guard('api')->user()->id)->with('branch')->first(['name','email','branch_id']);

        return response()->json([
            'user_data' => $user_data,
            'status' => '200'
        ], 200);
    }

    public function updateUserProfile(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'email' => 'required|unique:admins,email,' .  Auth::guard('api')->user()->id
        ]);
        if ($valid->fails()) {
            return response()->json(['error' => $valid->errors(), 'status' => '401'], 401);
        } else {
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $name = rand() . time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/public/frontend/user_profile');
                $image->move($destinationPath, $name);
            }

            Admin::where('id',Auth::guard('api')->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return response()->json([
                'message' => 'Profile Updated Successfully',
                'status' => '200'
            ], 200);
        }
    }

}
