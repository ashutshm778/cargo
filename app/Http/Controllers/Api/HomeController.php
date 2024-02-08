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

            $credentials = request(['email', 'password']);
            if (!Auth::guard('admin')->attempt($credentials)) {
                $valid->getMessageBag()->add('password', 'Password wrong');
                return response()->json(['error' => $valid->errors(), 'status' => '401'], 401);
            }
            Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], !empty($request->remember) ? true : false);
            $data = Admin::where('email', $request->email)->first();
            $data->access_token =  $data->createToken('MyApp')->plainTextToken;
            return $data;
        }
    }

    public function home(){
        dd(Auth::guard('admin')->user());
        $booking_log = BookingLog::where('user_id',Auth::guard('admin')->user()->id)->get();

        return response()->json([
            'booking_log' => $booking_log,
            'success' => true,
            'status' => 200
        ]);
    }


}
