<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;


class BranchController extends Controller
{
     function __construct() {
        $this->middleware('permission:branch-list|branch-create|branch-edit|branch-delete,admin', ['only' => ['index','store']]);
        $this->middleware('permission:branch-create,admin', ['only' => ['create','store']]);
        $this->middleware('permission:branch-edit,admin', ['only' => ['edit','update']]);
        $this->middleware('permission:branch-delete,admin', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.branch.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_branch(Request $request)
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


        $branch = Branch::where('id', '>', 0);
        $total = $branch->count();

        $totalFilter = Branch::where('id', '>', 0);
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('name', 'like', '%' . $searchValue . '%');
        }
        $totalFilter = $totalFilter->count();


        $arrData = Branch::where('id', '>', 0);
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName, $columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('name', 'like', '%' . $searchValue . '%')->orwhere('phone', 'like', '%' . $searchValue . '%')->orwhere('email', 'like', '%' . $searchValue . '%')->orwhere('branch_code', 'like', '%' . $searchValue . '%');
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

    public function create()
    {
        return view('backend.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'branch_code'=>'required|unique:branches,branch_code',
            'email' => 'required|unique:branches,email',
            'phone' => 'required',
        ]);
        $branch = new Branch;
        $branch->name = $request->name;
        $branch->branch_code = $request->branch_code;
        $branch->phone = $request->phone;
        $branch->email = $request->email;
        $branch->gst = $request->gst;
        $branch->state = $request->state;
        $branch->city = $request->city;
        $branch->pincode = $request->pincode;
        $branch->address = $request->address;
        $branch->serving_pincode=json_encode($request->serving_pincode);
        $branch->save();

        return redirect()->route('branch.index')->with('success', 'Branch Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('backend.branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required|unique:branches,email,'.$branch->id,
            'phone' => 'required',
        ]);
        $branch->name = $request->name;
        $branch->branch_code = $request->branch_code;
        $branch->phone = $request->phone;
        $branch->email = $request->email;
        $branch->gst = $request->gst;
        $branch->state = $request->state;
        $branch->city = $request->city;
        $branch->pincode = $request->pincode;
        $branch->address = $request->address;
        $branch->serving_pincode=json_encode($request->serving_pincode);
        $branch->save();

        return redirect()->route('branch.index')->with('success', 'Branch Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
