<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    public function index(){
        $sup_det = Supplier::latest()->get();
        // dd($sup_det);
        return view('layouts.pages.supplier.index',['supplier_det' => $sup_det]);
    }

    public function create(Request $request){
        
        $data =User::orderBy('id','DESC')->where('status', 1)->get();
        return view('layouts.pages.supplier.create',compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sup_name' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        
        $data =  new Supplier();
        
        $data->sup_name          = $request->sup_name;
        $data->supplier_phNumber = $request->supplier_phNumber;
        $data->supplier_address	 = $request->supplier_address;
        $data->email             = $request->email;
        $data->fax               = $request->fax;
        $data->web_address       = $request->web_address;
        $data->contact_perName   = $request->contact_perName;
        $data->contact_phNumber  = $request->contact_phNumber;
        $data->designation       = $request->designation;
        $data->credit_limit      = $request->credit_limit;
        $data->status            = $request->status;
        $data->user_id           = Auth::user()->id;
        $data->save();

        $notification = array('messege' => 'Supplier Details Save Successfully.', 'alert-type' => 'success');
        return redirect()->route('supply_name.index', compact('data'))->with($notification);

    }

    public function show($id){
        $data = Supplier::find($id);
        // dd($data);
        return view('layouts.pages.supplier.show',compact('data'));
    }

    public function edit($id){
        $data = Supplier::find($id);

        return view('layouts.pages.supplier.edit',compact('data'));
    }
    public function update(Request $request, $id){

        $data = Supplier::find($id);
        $data->sup_name     = $request->sup_name;
        $data->supplier_phNumber = $request->supplier_phNumber;
        $data->supplier_address	 = $request->supplier_address;
        $data->email             = $request->email;
        $data->fax               = $request->fax;
        $data->web_address       = $request->web_address;
        $data->contact_perName   = $request->contact_perName;
        $data->contact_phNumber  = $request->contact_phNumber;
        $data->designation       = $request->designation;
        $data->credit_limit      = $request->credit_limit;
        $data->status            = $request->status;
        $data->user_id           = Auth::user()->id;
        $data->save();


        $notification = array('massage' => 'Supplier Information Updated Successfully.', 'alert-type' => 'success');

        return redirect()->route('supply_name.index')->with($notification);
    }

}
