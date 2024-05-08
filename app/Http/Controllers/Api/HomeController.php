<?php

namespace App\Http\Controllers\Api;




use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingLog;
use Illuminate\Http\Request;
use App\Models\BookingProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\BookingProductBarcode;
use Illuminate\Support\Facades\Validator;
use App\Models\BookingPrductPackageBarcodeLog;


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
            if (Hash::check($request->password, $data->password)) {
                $data->access_token =  $data->createToken('MyApp')->plainTextToken;
                $data->getAllPermissions();
                return $data;
            } else {
                $valid->getMessageBag()->add('password', 'Wrong Password');
                return response()->json(['error' => $valid->errors(), 'status' => '401'], 401);
            }
        }
    }

    public function home()
    {
        $booking_log = BookingLog::where('user_id', Auth::guard('api')->user()->id)->with('branch_data')->get();
        return response()->json([
            'booking_log' => $booking_log,
            'success' => true,
            'status' => 200
        ]);
    }

    public function booking_log()
    {
        $booking_log = BookingLog::where('user_id', Auth::guard('api')->user()->id)->with('branch_data')->get();

        return response()->json([
            'booking_log' => $booking_log,
            'success' => true,
            'status' => 200
        ]);
    }

    public function get_booking(Request $request)
    {

        $booking = Booking::where('bill_no', $request->scanner_data)->with('booking_product')->first();
        if (!empty($booking->id)) {
            return response()->json([
                'booking_data' => $booking,
                'success' => true,
                'status' => 200
            ]);
        } else {
            return response()->json(['error' => 'Please Scan Barcode', 'status' => '401'], 401);
        }
    }

    public function booking_scan_update(Request $request)
    {
        // dd($request->all());

        $booking = Booking::find($request->booking_id);
        if (($booking->status == 'dispatched') && (Auth::guard('api')->user()->branch_id == $booking->branch_id)) {
            return response()->json(['error' => 'Package Already Dispatched', 'status' => '401'], 401);
        }

        if ($booking->status == 'dispatched') {
            if ($request->is_dispatch==1) {

                if (!empty(BookingLog::where('branch_id', Auth::guard('api')->user()->branch_id)->where('tracking_code', $booking->tracking_code)->where('status', 'arrived')->first()->id)) {

                    if (empty(BookingLog::where('branch_id', Auth::guard('api')->user()->branch_id)->where('tracking_code', $booking->tracking_code)->where('status', 'dispatched')->first()->id)) {
                    $booking_log = new BookingLog;
                    $booking_log->booking_id = $booking->id;
                    $booking_log->branch_id = Auth::guard('api')->user()->branch_id;
                    $booking_log->tracking_code = $booking->tracking_code;
                    $booking_log->user_id = Auth::guard('api')->user()->id;
                    $booking_log->source = 'app';
                    $booking_log->action = 'Package Dispatched From';
                    $booking_log->status = 'dispatched';
                    $booking_log->description = $request->description;
                    $booking_log->save();
                }else{
                    return response()->json(['error' => 'Package Already Dispatched', 'status' => '401'], 401);

                }
              }else{
                return response()->json(['error' => 'Package is not arrived in your branch', 'status' => '401'], 401);
              }
            }else{
            if (empty(BookingLog::where('branch_id', Auth::guard('api')->user()->branch_id)->where('tracking_code', $booking->tracking_code)->where('status', 'arrived')->first()->id)) {
                $booking_log = new BookingLog;
                $booking_log->booking_id = $booking->id;
                $booking_log->branch_id = Auth::guard('api')->user()->branch_id;
                $booking_log->tracking_code = $booking->tracking_code;
                $booking_log->user_id = Auth::guard('api')->user()->id;
                $booking_log->source = 'app';
                $booking_log->action = 'Package Arrived At';
                $booking_log->status = 'arrived';
                $booking_log->description = $request->description;
                $booking_log->save();
            }else{
                return response()->json(['error' => 'Package Already Arrived', 'status' => '401'], 401);
            }
        }

            return response()->json([
                'message' => 'Data Updated Successfully',
                'success' => true,
                'status' => 200
            ]);
        }

        if (($booking->status == 'order_created') && (Auth::guard('api')->user()->branch_id == $booking->branch_id)) {

            if ($request->is_dispatch) {
                $booking_log = new BookingLog;
                $booking_log->booking_id = $booking->id;
                $booking_log->branch_id = Auth::guard('api')->user()->branch_id;
                $booking_log->tracking_code = $booking->tracking_code;
                $booking_log->user_id = Auth::guard('api')->user()->id;
                $booking_log->source = 'app';
                $booking_log->action = 'Package Dispatched From';
                $booking_log->status = 'dispatched';
                $booking_log->description = $request->description;
                $booking_log->save();

                $booking->status = 'dispatched';
                $booking->save();


                return response()->json([
                    'message' => 'Data Updated Successfully',
                    'success' => true,
                    'status' => 200
                ]);
            }else{
                return response()->json(['error' => 'Created Order Can not be Arrived.', 'status' => '401'], 401);
            }
        }
        return response()->json(['error' => 'Package Is Not Dispatched By Origin', 'status' => '401'], 401);

    }

    public function product_package_barcode_scan(Request $request)
    {


        $booking_product_barcode = BookingProductBarcode::where('barcode', $request->package_barcode)->first();
        if (!empty($booking_product_barcode->id)) {
            $booking_product = BookingProduct::find($booking_product_barcode->booking_product_id);
            $booking = Booking::find($booking_product->booking_id);
            $booking_product_barcodes = BookingProductBarcode::where('booking_product_id', $booking_product_barcode->booking_product_id)->get();

            $booking_product_package_barcode_log = BookingPrductPackageBarcodeLog::where('booking_id', $booking->id)->where('branch_id', Auth::guard('api')->user()->branch_id)->where('booking_product_id', $booking_product->id)->where('booking_product_barcode_id', $booking_product_barcode->id)->where('user_id', Auth::guard('api')->user()->id)->first();
            if (empty($booking_product_package_barcode_log->id)) {
                $booking_product_package_barcode_log = new BookingPrductPackageBarcodeLog;
            }

            $booking_product_package_barcode_log->booking_id = $booking->id;
            $booking_product_package_barcode_log->branch_id = Auth::guard('api')->user()->branch_id;
            $booking_product_package_barcode_log->booking_product_id = $booking_product->id;
            $booking_product_package_barcode_log->booking_product_barcode_id = $booking_product_barcode->id;
            $booking_product_package_barcode_log->user_id = Auth::guard('api')->user()->id;
            $booking_product_package_barcode_log->tracking_code = $booking->tracking_code;
            $booking_product_package_barcode_log->source = 'app';
            $booking_product_package_barcode_log->action = 'barcode_scan';
            $booking_product_package_barcode_log->status = 1;
            $booking_product_package_barcode_log->description = 'barcode scan';
            $booking_product_package_barcode_log->save();


            $scan_barcodes = BookingPrductPackageBarcodeLog::where('booking_id', $booking->id)->where('branch_id', Auth::guard('api')->user()->branch_id)->where('booking_product_id', $booking_product->id)->where('user_id', Auth::guard('api')->user()->id)->get();
            return response()->json([
                'message' => 'Data Scan Successfully',
                'booking_product_barcodes' => $booking_product_barcodes,
                'booking_product' => $booking_product,
                'booking' => $booking,
                'scan_barcodes' => $scan_barcodes,
                'status' => 200
            ]);
        } else {
            return response()->json(['error' => 'Please Sacn Package Barcode', 'status' => '401'], 401);
        }
    }

    public function getUserProfile(Request $request)
    {
        $user_data = Admin::where('id', Auth::guard('api')->user()->id)->first(['name', 'email', 'branch_id']);

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

            Admin::where('id', Auth::guard('api')->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return response()->json([
                'message' => 'Profile Updated Successfully',
                'status' => '200'
            ], 200);
        }
    }

    public function get_assign_delivery(Request $request)
    {

        $booking =  Booking::where('assign_to',Auth::guard('api')->user()->id)->with(['branch_from','branch_to'])->where('assign_to','!=','')->orderBy('id','desc')->get();

            return response()->json([
                'assign_list' => $booking,
                'success' => true,
                'status' => 200
            ]);

    }

    public function assign_delivery_status_update(Request $request){

        $booking=Booking::find($request->booking_id);
        if(!empty($booking->id)){
        $booking->status=$request->status;
        $booking->save();

        $booking_log=new BookingLog;
        $booking_log->booking_id=$booking->id;
        $booking_log->branch_id= Auth::guard('api')->user()->branch_id;
        $booking_log->tracking_code=$booking->tracking_code;
        $booking_log->user_id=auth()->guard("api")->user()->id;
        $booking_log->source='app';
        $booking_log->action=$request->status;
        $booking_log->status=$request->status;
        if(!empty($request->remarks)){
         $booking_log->description=$request->remarks;
        }
        $booking_log->save();

        return response()->json([
            'message' => 'Status Updated Successfully',
            'status' => '200'
        ], 200);

     }else{
        return response()->json(['error' => 'Invalid Id', 'status' => '401'], 401);
     }
    }
}
