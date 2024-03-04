<?php

namespace App\Http\Controllers;

use App\Models\Pincode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PincodeController extends Controller
{
    function __construct() {
        $this->middleware('permission:pincode-list|pincode-create|pincode-edit|pincode-delete,admin', ['only' => ['index','store']]);
        $this->middleware('permission:pincode-create,admin', ['only' => ['create','store']]);
        $this->middleware('permission:pincode-edit,admin', ['only' => ['edit','update']]);
        $this->middleware('permission:pincode-delete,admin', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $pincodes = Pincode::where('id', '>', 0);
        if (!empty($request->q)) {
            $pincodes = $pincodes->where('pincode', 'like', '%' . $request->q);
        }
        $pincodes = $pincodes->paginate(20);
        return view('backend.pincode', compact('pincodes'));
    }

    public function updatePincodeStatus(Request $request)
    {
        $pincode = Pincode::findOrFail($request->id);
        $pincode->status = $request->status;
        if ($pincode->save()) {
            return 1;
        }
        return 0;
    }

    public function store(Request $request)
    {
        if (!empty($request->id)) {

            $validator =  Validator::make($request->all(), [
                'pincode' => 'required|unique:pincodes',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {


            $pincode = Pincode::find($request->id);
            $pincode->pincode = $request->pincode;
            $pincode->city = $request->city;
            $pincode->state = $request->state;
            $pincode->save();
            }
        } else {

            $validator =  Validator::make($request->all(), [
                'pincode' => 'required|unique:pincodes',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $pincode = new Pincode;
                $pincode->pincode = $request->pincode;
                $pincode->city = $request->city;
                $pincode->state = $request->state;
                $pincode->save();
            }
        }


        return redirect()->route('admin.pincode');
    }

    public function edit(Request $request, $id)
    {
        $pincode = Pincode::find($id);
        $pincodes = Pincode::where('id', '>', 0);
        if (!empty($request->q)) {
            $pincodes = $pincodes->where('pincode', 'like', '%' . $request->q);
        }
        $pincodes = $pincodes->paginate(20);
        return view('backend.pincode', compact('pincode', 'pincodes'));
    }

    public function delete($id)
    {
        $pincode = Pincode::destroy($id);
        return back();
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
}
