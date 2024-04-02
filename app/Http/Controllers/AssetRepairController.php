<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetRepair;
use App\Models\AssetTransection;
use App\Models\User;
use Validator;
use Auth;

class AssetRepairController extends Controller
{
    public function index(){
        $repair = AssetRepair::with('assetTransaction')->latest()->get();
        // dd($repair);
        return view('layouts.pages.asset_repair.index',compact('repair'));
    }


    public function create() {
         $transaction = AssetTransection::all();
        //  dd($transaction);
         $data =User::orderBy('id','DESC')->where('status', 1)->get();
        //  dd($data);
         return view('layouts.pages.asset_repair.create', compact('data','transaction'));
    }

    public function store(Request $request){
         $validator = Validator::make($request->all(), [
             'repair_date' => 'required',
             'repair_amount' => 'required',
         ]);
         if ($validator->fails()) {
             return response()->json(['errors' => $validator->errors()], 422);
         }

         $data = new AssetRepair();

         $data->repair_amount = $request->repair_amount;
         $data->repair_date = $request->repair_date;
         $data->repair_details = $request->repair_details;
         $data->status = '0';
         $data->asset_transactions_id = $request->asset_transactions_id;
         $data->user_id = Auth::user()->id;
         $data->save();

         $notification = array('messege' => 'Asset Repair Save Successfully.', 'alert-type' => 'success');

         return redirect()->route('ast_repair.index')->with($notification);
     }

     public function edit($id)
    {
        $transaction = AssetTransection::all();
        $data = AssetRepair::find($id);
        $users = User::latest()->get();

        return view('layouts.pages.asset_repair.edit', compact('data', 'users','transaction'));
    }

    public function update(Request $request, $id)
    {
        $data = AssetRepair::find($id);
         $data->repair_date = $request->repair_date;
         $data->repair_details = $request->repair_details;
         $data->repair_amount = $request->repair_amount;
         $data->asset_transactions_id = $request->asset_transactions_id;
         $data->user_id = Auth::user()->id;
         $data->save();

        $notification = array('messege' => 'Asset Repair Update Successfully.', 'alert-type' => 'success');

        return redirect()->route('ast_repair.index')->with($notification);
    }

    public function show($id)
    {
        $transaction = AssetTransection::all();
        $data = AssetRepair::find($id);
        // dd($transaction);
        return view('layouts.pages.asset_repair.show', compact('data','transaction'));
    }

    public function getAssetTranInfo(Request $request)
    {

        $data = AssetTransection::where('asset_transections.id', $request->type_id)
        ->join('asset_details', 'asset_details.id', 'asset_transections.asset_details_id')
        ->join('asset_groups', 'asset_groups.id', 'asset_details.ast_grp_id')
        ->join('asset_types', 'asset_types.id', 'asset_details.ast_typ_id')
        ->select('asset_transections.*','asset_details.asset_name','asset_types.type_name','asset_types.id as item_types_id', 'asset_groups.group_name', 'asset_groups.id as item_groups_id')
        ->first();

        // dd($data);

        return response()->json([
            'data' => $data,
        ]);
    }

    function ast_repair_approve() {
        $data = AssetRepair::where('status', 0)->get();
        return view('layouts.pages.asset_repair.repair_approve',compact('data'));
    }

    public function repair_approve($id)
    {
        $data = AssetRepair::findOrFail($id);
        $data->status = 1;
        $data->save();

        $notification=array('messege'=>'Leave approve successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function decline($id){
        $data = AssetRepair::findOrFail($id);
        $data->status = 2;
        $data->save();

        $notification=array('messege'=>'Canceled successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
