<?php

namespace App\Http\Controllers;

use App\Models\Department\Department;
use App\Models\Employee\Employee;
use App\Models\Location\DepLocation;
use App\Models\Movement\Movement;
use Illuminate\Http\Request;
use App\Models\AssetRepair;
use App\Models\AssetTransection;
use App\Models\User;
use Validator;
use Auth;

class MovementController extends Controller
{
    public function index(){
        $movement = Movement::with('assetTransaction.assetDetails','departMents')->get();
        // dd($movement);
        return view('layouts.pages.movement.index',compact('movement'));
    }
    public function create(){
        $transaction = AssetTransection::all();
        $department  = Department::all();
        $location  = DepLocation::all();
        $employee  = Employee::where('status', 1)->get();
        //  dd($employee);
        $data =User::orderBy('id','DESC')->where('status', 1)->get();
        return view('layouts.pages.movement.create', compact('data','transaction','department','location','employee'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
          'mov_date' =>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = new Movement;
        $data->mov_date              = $request->mov_date;
        $data->asset_transections_id = $request->asset_transections_id;
        $data->emp_id                = $request->emp_id;
        $data->departments_id        = $request->departments_id;
        $data->locations_id          = $request->locations_id;
        $data->asset_details_id      = 1;
        $data->remarks               = $request->remarks;
        $data->status                = '0';
        $data->user_id               = Auth::user()->id;
        $data->save();
        return redirect()->route('movement.index')->with('success','Movement Added Successfully');
    }
    public function getMovement(Request $request)
    {
       $data = AssetTransection::where('asset_transections.id', $request->type_id)
       ->join('asset_details','asset_details.id','asset_transections.asset_details_id')
       ->join('purchase_details','purchase_details.asset_details_id','asset_details.id')
       ->join('purchases', 'purchases.id', 'purchase_details.purchase_id')
       ->join('departments', 'departments.id', 'purchases.dept_id')
       ->join('dep_locations', 'dep_locations.id','purchases.loc_id')
       ->join('asset_groups', 'asset_groups.id', 'asset_details.ast_grp_id')
       ->join('asset_types', 'asset_types.id', 'asset_details.ast_typ_id')
       ->select('asset_transections.*','asset_details.asset_name','departments.dept_name','dep_locations.location_name','asset_types.type_name','asset_groups.group_name')
       ->first();
    //    dd($data);

        return response()->json([
        'data' => $data,
        ]);

    }

    public function edit($id){
        $transaction = AssetTransection::all();
        $department  = Department::all();
        $location  = DepLocation::all();
        $employee = Employee::all();
        //  dd($location);
        $data = Movement::find($id);
        return view('layouts.pages.movement.edit',compact('transaction', 'data', 'department', 'location','employee'));
    }

    public function update(Request $request, $id)
    {
        $data = Movement::find($id);
         $data->mov_date = $request->mov_date;
         $data->asset_transections_id = $request->asset_transections_id;
         $data->emp_id                = $request->emp_id;
         $data->departments_id = $request->departments_id;
         $data->locations_id = $request->locations_id;
         $data->asset_details_id = 1;
         $data->remarks = $request->remarks;
         $data->status = '0';
         $data->user_id = Auth::user()->id;
         $data->save();

        $notification = array('messege' => 'Movement Update Successfully.', 'alert-type' => 'success');

        return redirect()->route('movement.index')->with($notification);
    }

    public function show($id){
        $data = Movement::find($id);
        $transaction = AssetTransection::all();
        // dd($data);
        return view('layouts.pages.movement.show',compact('data','transaction'));
    }
}
