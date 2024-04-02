<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Depreciation;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;

class DepreciationController extends Controller
{
    public function index(){
        $dep_det = Depreciation::all();
        // dd($dep_det);
        return view("layouts.pages.dep_name.index", compact("dep_det"));
    }

    public function create(){
        $data =User::orderBy('id','DESC')->where('status', 1)->get();
        return view("layouts.pages.dep_name.create",compact('data'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = new Depreciation();
        $data->name       = $request->name;
        $data->duration	  = $request->duration;
        $data->percentage = $request->percentage;
        $data->life_time  = $request->life_time;
        $data->auto_cal   = $request->auto_cal;
        $data->status     = $request->status;
        $data->is_delete  = '1';
        $data->user_id    = Auth::user()->id;
        $data->save();

        $notification = array('messege' => 'Depreciation Save Successfully.', 'alert-type' => 'success');

        return redirect()->route('dep_name.index')->with($notification);
    }

    public function show($id){
        $data = Depreciation::find($id);
        // dd($data);
        return view('layouts.pages.dep_name.show',compact('data'));
    }

    public function edit($id){
        $data = Depreciation::find($id);

        return view('layouts.pages.dep_name.edit',compact('data'));
    }

    public function update(Request $request, $id){

        $data = Depreciation::find($id);
        $data->name       = $request->name;
        $data->duration	  = $request->duration;
        $data->percentage = $request->percentage;
        $data->life_time  = $request->life_time;
        $data->auto_cal   = $request->auto_cal;
        $data->status     = $request->status;
        $data->is_delete  = '1';
        $data->user_id    = Auth::user()->id;
        $data->save();

        $notification = array('messege' => 'Depreciation Updated Successfully.', 'alert-type' => 'success');

        return redirect()->route('dep_name.index', compact('data'))->with($notification);
    }
}
