<?php

namespace App\Http\Controllers\Api;




use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{


public function login(Request $request){


        $valid = Validator::make($request->all(), [
            'email' => 'required|exists:admins',
            'password' => 'required',
        ]);
        if ($valid->fails()) {
            return response()->json(['error' => $valid->errors(), 'status' => '401'], 401);
        } else {

            $credentials = request(['email', 'password']);
            if (!Auth::guard('admin')->attempt($credentials)){
                $valid->getMessageBag()->add('password', 'Password wrong');
                return response()->json(['error'=>$valid->errors(), 'status' =>'401'],401);
            }
            $data = Admin::where('email', $request->email)->first();
            $data->access_token =  $data->createToken('MyApp')->plainTextToken;
            return $data;
        }

  }

}
