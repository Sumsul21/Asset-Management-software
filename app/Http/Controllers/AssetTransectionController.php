<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssetTransection;
use App\Models\AssetDetails;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Str;

class AssetTransectionController extends Controller
{
    public function index(){

        $transaction = AssetTransection::latest()->get();
        return view("layouts.pages.asset_transaction.index",compact('transaction'));
    }

    public function create(){

        $asset_details = AssetDetails::with('assetGroup', 'assetType')->orderBy('id', 'desc')->latest()->get();
        // dd($asset_details);
        $data = User::orderBy('id', 'DESC')->where('status', 1)->get();

        return view("layouts.pages.asset_transaction.create", compact('data', 'asset_details'));
    }


    public function store(Request $request){
        $this->validate($request,[
            "rfid_num"=> "required",
            "book_value"=> "required",
            "org_value"=> "required",
        ]);

        $data = new AssetTransection();
        $data->rfid_num = $request->rfid_num;
        $data->book_value = $request->book_value;
        $data->asset_code = $request->asset_code;
        $data->org_value = $request->org_value;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->serial_no = $request->serial_no;
        $data->part_no = $request->part_no;
        $data->asset_details_id ='1';
        $data->dep_id = '1';
        $data->user_id = Auth::user()->id;
        $data->save();

        $notification = array('messege' => 'Asset Transaction Save Successfully.', 'alert-type' => 'success');

        return redirect()->route('ast_trans.index')->with($notification);
    }

    public function edit($id){
        $data = AssetTransection::with('assetDetails')->find($id);
        // dd($data);
        $users= User::latest()->get();
        return view('layouts.pages.asset_transaction.edit',compact('data','users'));

    }

    public function update(Request $request,$id){
        $data = AssetTransection::find($id);
        $data->rfid_num = $request->rfid_num;
        $data->user_id = Auth::user()->id;
        $data->save();

        $notification = array('messege' => 'Asset Transaction update Successfully.', 'alert-type' => 'success');

        return redirect()->route('ast_trans.index')->with($notification);
    }

    public function show($id){
        $data = AssetTransection::find($id);
        return view('layouts.pages.asset_transaction.show',compact('data'));
    }

}
