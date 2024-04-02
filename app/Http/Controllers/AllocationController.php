<?php

namespace App\Http\Controllers;

use App\Models\Allocation\Allocation;
use App\Models\AssetTransection;
use App\Models\Department\Department;
use App\Models\Employee\Employee;
use App\Models\Location\DepLocation;
use Illuminate\Http\Request;
use Auth;

class AllocationController extends Controller
{
    public function index(){
        $allo = Allocation::with('astCode','empLoyee')->get();
        // dd($allo);
        return view('layouts.pages.allocation.index',compact('allo'));
    }

    public function create(){
        $ast_code = AssetTransection::all();
        $employees = Employee::where('status', 1)->get();
        // dd($ast_loc);
        return view('layouts.pages.allocation.create', compact('ast_code','employees'));
    }

    public function store(Request $request){
        $validated=$request -> validate([
            'asset_transections_id'=> 'required',
        ]);

        $data = new Allocation();
        $data->sang_date = $request->sang_date;
        $data->dept_id = $request->dept_id;
        $data->asset_transections_id = $request->asset_transections_id;
        $data->loc_id = $request->loc_id;
        $data->employees_id = $request->employees_id;
        $data->remarks = $request->remarks;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();


        $notification = array('messege' => 'Allocation Added Successfully.', 'alert-type' => 'success');
        return redirect()->route('allocation.index', compact('data'))->with($notification);
    }

    public function getEmployeeDetails(Request $request){

        $employee = Employee::with('deptName','locName')->where('id',$request->employee_id)->first();
        return response()->json($employee);
    }

    public function show($id){

        $data = Allocation::find($id);
        // dd($data);
        return view('layouts.pages.allocation.show',compact('data'));
    }

    public function edit($id){
        $data = Allocation::find($id);
        $ast_code = AssetTransection::all();
        $emplys = Employee::all();
        // dd($emplys);
        return view('layouts.pages.allocation.edit',compact('data','ast_code','emplys'));
    }

    public function update(Request $request, $id){

        $data = Allocation::find($id);
        $data->sang_date             = $request->sang_date;
        $data->dept_id               = $request->dept_id;
        $data->asset_transections_id = $request->asset_transections_id;
        $data->loc_id                = $request->loc_id;
        $data->employees_id          = $request->employees_id;
        $data->remarks               = $request->remarks;
        $data->status                = '1';
        $data->user_id               = Auth::user()->id;
        $data->save();

        $notification = array('messege' => 'Allocation Updated Successfully.', 'alert-type' => 'success');
        return redirect()->route('allocation.index', compact('data'))->with($notification);
    }

    public function editEmployeeDetails(Request $request){

        $employee = Employee::with('deptName','locName')->where('id',$request->employee_id)->first();
        return response()->json($employee);
    }

}
