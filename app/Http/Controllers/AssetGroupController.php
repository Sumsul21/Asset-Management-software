<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssetGroup;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;

class AssetGroupController extends Controller
{
    public function index(){
        $asset = AssetGroup::latest()->get();
       return view('layouts.pages.asset_group.index',compact('asset'));
    }


    public function create() {
        $data =User::orderBy('id','DESC')->where('status', 1)->get();
        return view('layouts.pages.asset_group.create', compact('data'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'group_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = new AssetGroup();
        $data->group_name  = $request->group_name;
        $data->group_code  = $request->group_code;
        $data->description = $request->description;
        $data->status      = $request->status;
        $data->is_delete   = '1';
        $data->user_id     = Auth::user()->id;
        $data->save();
        
        $notification = array('messege' => 'Asset Group Save Successfully.', 'alert-type' => 'success');

        return redirect()->route('asset_group.index')->with($notification);
    }

    public function edit($id)
    {
        $data = AssetGroup::find($id);
        $users = User::latest()->get();
        return view('layouts.pages.asset_group.edit', compact('data', 'users'));
    }

    public function update(Request $request, $id)
    {
        $data = AssetGroup::find($id);
        $data->group_name  = $request->group_name;
        $data->group_code  = $request->group_code;
        $data->description = $request->description;
        $data->status      = $request->status;
        $data->is_delete   = '1';
        $data->user_id     = Auth::user()->id;
        $data->save();
        
        $notification = array('messege' => 'Asset Group Save Successfully.', 'alert-type' => 'success');

        return redirect()->route('asset_group.index')->with($notification);
    }

    public function show( $id)
    {
        // $data = AssetGroup::with('user')->find($id);
        $data = AssetGroup::find($id);
        // dd($data);
        return view('layouts.pages.asset_group.show', compact('data'));
    }

    public function getEmployeeCode(Request $request)
    {
        $employeeCode = User::where('id', $request->userId)->first();
        return response()->json($employeeCode);
    }

    
}
