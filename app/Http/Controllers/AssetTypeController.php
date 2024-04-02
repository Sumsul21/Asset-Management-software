<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssetGroup;
use App\Models\AssetType;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AssetTypeController extends Controller
{
    
    public function index(){
        $data = AssetType::with('assetGroup')->orderBy('ast_grp_id', 'asc')->get();
        // dd($data);
        return view('layouts.pages.asset_type.index', compact('data'));
    }

    public function create(){

        $grp_name = AssetGroup::orderBy('group_name','ASC')->get();
        // dd($grp_name);
        return view('layouts.pages.asset_type.create', compact('grp_name'));
    }

    public function store(Request $request)
    {
        $validated=$request -> validate([
            'type_name'=> 'required|max:255',
            'type_code'=> 'required|max:255',
        ]);
        $data = new AssetType();
        $data->type_name = $request->type_name;
        $data->type_code = $request->type_code;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->ast_grp_id = $request->ast_grp_id;
        $data->user_id = Auth::user()->id;
        $data->save();
        $notification = array('messege' => 'Item Type Data Save Successfully.', 'alert-type' => 'success');
        return redirect()->route('asset_type.index', compact('data'))->with($notification);
    }

    public function edit($id){
        $data = AssetType::find($id);
        $grp_name = AssetGroup::all();
        // dd($grp_name);
        return view('layouts.pages.asset_type.edit', compact('data', 'grp_name'));
    }

    public function update(Request $request, $id)
    {
        $data = AssetType::find($id);
        $data->type_name = $request->type_name;
        $data->type_code = $request->type_code;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->ast_grp_id = $request->ast_grp_id;
        $data->user_id = Auth::user()->id;
        $data->save();
        $notification = array('messege' => 'Item Type Updated Successfully.', 'alert-type' => 'success');
        return redirect()->route('asset_type.index', compact('data'))->with($notification);
    }

    public function show($id){

        $data = AssetType::find($id);
        // dd($data);
        return view('layouts.pages.asset_type.show', compact('data'));
    }

}
