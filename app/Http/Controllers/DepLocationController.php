<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Location\DepLocation;
use Validator;
use Auth;

class DepLocationController extends Controller
{
    public function index(){

        $location = DepLocation::latest()->get();
        // dd($sup_det);
        return view('layouts.pages.location.index',compact('location'));
    }

    public function create(Request $request){

        $data = User::orderBy('id','DESC')->where('status', 1)->get();
        return view('layouts.pages.location.create',compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location_name' => 'required',
            'contact_perName' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $data =  new DepLocation();

        $data->location_name     = $request->location_name;
        $data->contact_perName   = $request->contact_perName;
        $data->contact_phNumber	 = $request->contact_phNumber;
        $data->store_code        = 1;
        $data->address           = $request->address;
        $data->description       = $request->description;
        $data->status            = $request->status;
        $data->user_id           = Auth::user()->id;
//        dd($data);
        $data->save();

        $notification = array('messege' => 'Supplier Details Save Successfully.', 'alert-type' => 'success');
        return redirect()->route('dept_loc.index', compact('data'))->with($notification);

    }

    public function show($id){
        $data = DepLocation::find($id);
        // dd($data);
        return view('layouts.pages.location.show',compact('data'));
    }

    public function edit($id){
        $data = DepLocation::find($id);

        return view('layouts.pages.location.edit',compact('data'));
    }

    public function update(Request $request, $id){

        $data = DepLocation::find($id);
        $data->location_name     = $request->location_name;
        $data->contact_perName   = $request->contact_perName;
        $data->contact_phNumber	 = $request->contact_phNumber;
        $data->store_code        = 1;
        $data->address           = $request->address;
        $data->description       = $request->description;
        $data->status            = $request->status;
        $data->user_id           = Auth::user()->id;
        $data->save();


        $notification = array('massage' => 'Supplier Information Updated Successfully.', 'alert-type' => 'success');

        return redirect()->route('dept_loc.index')->with($notification);
    }


}
