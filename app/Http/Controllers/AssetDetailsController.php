<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssetDetails;
use App\Models\AssetGroup;
use App\Models\AssetType;
use App\Models\Depreciation;
use Illuminate\Http\Request;
use Auth;

class AssetDetailsController extends Controller
{
    public function index(){
        $assetDetails = AssetDetails::with('assetGroup', 'assetType')->get();
        return view('layouts.pages.asset_details.index', compact('assetDetails'));
    }

    public function create(Request $request){

        $ast_grp  = AssetGroup::all();
        $dep_name = Depreciation::all();
        // dd($dep_name);

        return view('layouts.pages.asset_details.create',compact('ast_grp','dep_name'));
    }

    public function store(Request $request)
    {

        $validated=$request -> validate([
            'asset_name'=> 'required|max:255',

        ]);

        $data = new AssetDetails();
        $data->asset_code  = $request->asset_code;
        $data->initial     = '1';
        $data->code_length = $request->code_length;
        $data->part_no     = $request->part_no;
        $data->asset_name  = $request->asset_name;
        $data->description = $request->description;
        $data->ast_grp_id  = $request->ast_grp_id;
        $data->ast_typ_id  = $request->ast_typ_id;
        $data->dep_id      = $request->dep_id;
        $data->user_id     = Auth::user()->id;
        $data->save();

        $notification = array('messege' => 'Asset Details Save Successfully.', 'alert-type' => 'success');
        return redirect()->route('asset_details.index', compact('data'))->with($notification);
    }

    public function show($id){

        $data = AssetDetails::find($id);
        return view('layouts.pages.asset_details.show',compact('data'));
    }

    public function edit($id){

        $data      = AssetDetails::find($id);
        // dd($data);
        $grp_name  = AssetGroup::all();
        // dd($grp_name);
        $grp_type  = AssetType::all();
        $dep_name = Depreciation::all();
        // dd($depr_name);
        return view('layouts.pages.asset_details.edit',compact('id','data','grp_name','grp_type','dep_name'));
    }

    public function update(Request $request, $id){

        $data = AssetDetails::find($id);
        $data->asset_code  = $request->asset_code;
        $data->initial     = '1';
        $data->code_length = $request->code_length;
        $data->asset_name  = $request->asset_name;
        $data->part_no     = $request->part_no;
        $data->description = $request->description;
        $data->ast_grp_id  = $request->ast_grp_id;
        $data->ast_typ_id  = $request->ast_typ_id;
        $data->dep_id      = $request->dep_id;
        $data->user_id     = Auth::user()->id;
        $data->save();

        $notification = array('messege' => 'Item Details Updated Successfully.', 'alert-type' => 'success');
        return redirect()->route('asset_details.index', compact('data'))->with($notification);
    }

    public function getAssetType(Request $request)
    {
        $assetType = AssetType::where('ast_grp_id',$request->type_id)->get();
        return view('layouts.pages.asset_details.load_asset_type',compact('assetType'));
    }

    public function editAssetType(Request $request)
    {
        $assetType = AssetType::where('ast_grp_id',$request->type_id)->get();
        return view('layouts.pages.asset_details.edit_asset_type',compact('assetType'));
    }


    public function getAssetDetailsCode(Request $request)
    {
        $code = AssetType::with('assetGroup')->where('id',$request->type_id)->first();
        $group = $code->assetGroup->group_code;
        $type = $code->type_code;
        $codeDetails = $group."-".$type;
        return response()->json($codeDetails);
    }
    public function editAssetDetailsCode(Request $request)
    {
        $code = AssetType::with('assetGroup')->where('id',$request->type_id)->first();
        $group = $code->assetGroup->group_code;
        $type = $code->type_code;
        $codeDetails = $group."-".$type;
        return response()->json($codeDetails);
    }

    public function getLifeTime(Request $request)
    {
        // dd($request->all());

        $data = Depreciation::where('id', $request->type_id)
        ->select('life_time')
        ->first();

        // dd($data);
        return response()->json([
            'data' => $data,
        ]);
    }



}
