<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Booking;
use App\Models\Pincode;
use App\Models\Consignee;
use App\Models\Consignor;
use App\Models\ResourceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function dashboard(Request $request)
    {
        $branch = Branch::get()->count();
        $booking = Booking::get()->sum('total');
        $total_order = Booking::get()->count();
        $total_staff = Admin::where('id','>',0)->get()->count();
        $total_consigner=Consignor::get()->count();
        $total_consignee=Consignee::get()->count();
        return view('backend.dashboard',compact('branch','booking','total_order','total_staff','total_consigner','total_consignee'));
    }

    public function adminLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('backend.auth.login');
    }

    public function attemptLogin(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'email' => 'required|exists:admins',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], !empty($request->remember) ? true : false)) {
                return redirect()->route('admin.dashboard')->with('success', 'You Have Successfully Login!');
            }
            $validator->getMessageBag()->add('password', 'Wrong Password');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('success', 'You Have Successfully Logout!');
    }

    public function change_theme(Request $request)
    {
        $mode =  session()->get('theme_mode');
        if ($mode == 'light-theme') {
            session()->put('theme_mode', 'dark-theme');
        }
        if ($mode == 'dark-theme') {
            session()->put('theme_mode', 'light-theme');
        }
    }

    public function user_log(Request $request)
    {
        return view('backend.user_log');
    }

    public function get_user_log(Request $request)
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


        $branch = ResourceLog::where('id', '>', 0);
        $total = $branch->count();

        $totalFilter = ResourceLog::where('id', '>', 0);
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('name', 'like', '%' . $searchValue . '%');
        }
        $totalFilter = $totalFilter->count();


        $arrData = ResourceLog::where('id', '>', 0)->with('user');
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('name', 'like', '%' . $searchValue . '%')->orwhere('phone', 'like', '%' . $searchValue . '%')->orwhere('email', 'like', '%' . $searchValue . '%');
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

    public function pincode_list(Request $request)
    {
        $pincodes = Pincode::where('status', 'active')->where('pincode', 'like', $request->key . '%')->groupBy('pincode')->get();

        $data = array();

        foreach ($pincodes as $pincode) {
            $data[] = array("id" => $pincode->pincode, "text" => $pincode->pincode);
        }

        return json_encode($data);
    }

    public function get_pincode(Request $request)
    {
        $pincode = Pincode::where('status', 'active')->where('pincode', $request->pincode)->first();
        return $pincode;
    }

    public function consigner(Request $request)
    {
        return view('backend.consigner');
    }

    public function get_consigner(Request $request)
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


        $branch = Consignor::where('id', '>', 0);
        $total = $branch->count();

        $totalFilter = Consignor::where('id', '>', 0);
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('name', 'like', '%' . $searchValue . '%');
        }
        $totalFilter = $totalFilter->count();


        $arrData = Consignor::where('id', '>', 0);
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('name', 'like', '%' . $searchValue . '%')->orwhere('phone', 'like', '%' . $searchValue . '%')->orwhere('email', 'like', '%' . $searchValue . '%');
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

    public function consigner_create(Request $request)
    {
        return view('backend.consigner_create');
    }

    public function consigner_store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'phone' => 'required|unique:consignors',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

        $consigner= new Consignor;
        $consigner->name=$request->name;
        $consigner->phone=$request->phone;
        $consigner->gstin=$request->gstin;
        $consigner->full_address=$request->address;
        $consigner->pincode=$request->pincode;
        $consigner->save();

        if(!empty($request->from)){
            return back();
        }
    }
        return redirect()->route('admin.consigner');

    }

    public function get_consigner_data(Request $request){
        $consigner= Consignor::where('phone',$request->phone)->first();
        return $consigner;
    }

    public function consigner_edit(Request $request,$id)
    {
        $consigner= Consignor::find($request->id);
        return view('backend.consigner_edit',compact('consigner'));
    }

    public function consigner_update(Request $request)
    {
        $consigner= Consignor::find($request->id);
        $consigner->name=$request->name;
        $consigner->phone=$request->phone;
        $consigner->gstin=$request->gstin;
        $consigner->full_address=$request->address;
        $consigner->pincode=$request->pincode;
        $consigner->save();

        return redirect()->route('admin.consigner');
    }

    public function consignee(Request $request)
    {
        return view('backend.consignee');
    }

    public function get_consignee(Request $request)
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


        $branch = Consignee::where('id', '>', 0);
        $total = $branch->count();

        $totalFilter = Consignee::where('id', '>', 0);
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('name', 'like', '%' . $searchValue . '%');
        }
        $totalFilter = $totalFilter->count();


        $arrData = Consignee::where('id', '>', 0) ;
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('name', 'like', '%' . $searchValue . '%')->orwhere('phone', 'like', '%' . $searchValue . '%')->orwhere('email', 'like', '%' . $searchValue . '%');
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


    public function get_consignee_data(Request $request){
        $consignee= Consignee::where('phone',$request->phone)->first();
        return $consignee;
    }

    public function consignee_create(Request $request)
    {
        return view('backend.consignee_create');
    }

    public function consignee_store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'phone' => 'required|unique:consignees',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
        $consigner= new Consignee;
        $consigner->name=$request->name;
        $consigner->phone=$request->phone;
        $consigner->gstin=$request->gstin;
        $consigner->full_address=$request->address;
        $consigner->pincode=$request->pincode;
        $consigner->save();

        if(!empty($request->from)){
            return back();
        }
    }

        return redirect()->route('admin.consignee');

    }

    public function consignee_edit(Request $request,$id)
    {
        $consignee= Consignee::find($request->id);
        return view('backend.consignee_edit',compact('consignee'));
    }

    public function consignee_update(Request $request)
    {
        $consigner= Consignee::find($request->id);
        $consigner->name=$request->name;
        $consigner->phone=$request->phone;
        $consigner->gstin=$request->gstin;
        $consigner->full_address=$request->address;
        $consigner->pincode=$request->pincode;
        $consigner->save();

        return redirect()->route('admin.consignee');
    }


}
