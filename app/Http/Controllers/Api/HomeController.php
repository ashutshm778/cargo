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

}
