<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allocation\Allocation;
use App\Models\AssetTransection;
use Validator;
use App\Models\Withdrawal\Withdrawal;
use Auth;

class WithdrawalController extends Controller
{
    public function index(){
        $allo = Allocation::with('astCode','empLoyee')->get();
        $asset_code = AssetTransection::all();
        // dd($ast_code);
        return view('layouts.pages.withdrawal.index', compact('allo','asset_code'));
    }

    public function getAllocationDetails(Request $request)
    {
        $data = Allocation::where('allocations.id', $request->id)
            ->join('asset_transections', 'asset_transections.id', 'allocations.asset_transections_id')
            ->join('employees', 'employees.id', 'allocations.employees_id')
            ->select('allocations.*','asset_transections.asset_code','asset_transections.end_date','employees.emp_name')
            ->first();
            // dd($data);

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'withdrawal_data' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = new Withdrawal();
        $data->withdrawal_data = $request->withdrawal_data;
        $data->sang_date = $request->sang_date;
        $data->end_date = $request->end_date;
        $data->remarks = $request->remarks;
        $data->asset_transections_id = $request->asset_transections_id;
        $data->departments_id = $request->departments_id;
        $data->master_locations_id = $request->master_locations_id;
        $data->employees_id = $request->employees_id;
        $data->status = '0';
        $data->user_id = Auth::user()->id;
        $data->save();

        $notification = array('messege' => 'Asset Withdrawal Save Successfully.', 'alert-type' => 'success');
        return redirect()->route('asset_withdrawal.index')->with($notification);
    }



}
