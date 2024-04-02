<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Purchase;
use App\Models\PurchaseDetNo;
use Illuminate\Http\Request;
use App\Models\Inventory\PurchaseDetails;
use Illuminate\Support\Facades\View;
use Validator;
use Auth;

class PurchaseDetPartNoController extends Controller
{
    public function index($type)
    {
        // $data = PurchaseDetNo::all();
        $data = Purchase::where('status', 1)->with('purchaseDetails:id,purchase_id,rcv_qty,qty')->get();

        return view('layouts.pages.det_part_no.index', compact('data','type'));
    }

    public function create($type)
    {
        $pur_name = Purchase::all();
        return view('layouts.pages.det_part_no.create',compact('pur_name','type'));
    }

    public function store(Request $request){

        if (isset($request->moreFile[0]['serial_no']) && !empty($request->moreFile[0]['serial_no'])) {

            foreach ($request->moreFile as $item) {
                $serialNumber = $item['serial_no'];
                $exists = PurchaseDetNo::where('serial_no', $serialNumber)->exists();
                if ($exists) {
                    return response()->json(['error' => 'Serial number already exists.'], 422);
                }
            }

            foreach ($request->moreFile as $item) {
                $data = new PurchaseDetNo();
                $data->serial_no         = $item['serial_no'];
                $data->part_no           = $request->part_no;
                $data->reg_date           = $request->reg_date;
                $data->status            = '1';
                $data->purchase_id       = $request->purchase_id;
                $data->asset_details_id  = $request->asset_details_id;
                $data->user_id           = Auth::user()->id;
                $data->save();
            }

            //___________Purchase Update
            $purchaseDetails = PurchaseDetails::findOrFail($request->purchase_details_id);
            $purchaseDetails->rcv_qty = $request->rcv_qty;
            $purchaseDetails->save();


            return response()->json(['success' => 'Data saved successfully.']);
        }
    }


    public function details(Request $request, $id, $type){

        $details = Purchase::find($type);

        if (!$details) {
            return redirect()->back()->with('error', 'Purchase not found.');
        }

        $data = PurchaseDetails::where('purchase_details.purchase_id', $type) // Use $type instead of $request->id
            ->join('purchases', 'purchases.id', 'purchase_details.purchase_id')
            ->join('asset_details', 'asset_details.id', 'purchase_details.asset_details_id')
            ->join('asset_groups', 'asset_groups.id', 'asset_details.ast_grp_id')
            ->join('asset_types', 'asset_types.id', 'asset_details.ast_typ_id')
            ->select('purchase_details.*', 'purchases.inv_no', 'purchases.inv_date', 'asset_details.part_no', 'asset_types.type_name', 'asset_groups.group_name')
            ->get();
            // dd($data);

        $purchase = Purchase::where('purchases.id', $type) // Use $type instead of $request->id
            ->join('suppliers', 'suppliers.id', 'purchases.supplier_id')
            ->select('purchases.*', 'suppliers.sup_name')
            ->first();
            // dd($purchase);

        return view('layouts.pages.det_part_no.details', compact('details', 'data', 'purchase', 'type'));
    }


    // public function submit(Request $request){
    //     $validatedData = $request->validate([
    //         'serial_no' => 'required', // Add any other validation rules you need
    //     ]);

    //     $data = new PurchaseDetNo();
    //     $data->part_no           = $request->part_no;
    //     $data->serial_no         = $request->serial_no;
    //     $data->status            = '0';
    //     $data->purchase_id       = '1';
    //     $data->asset_details_id  = '1';
    //     $data->user_id           = Auth::user()->id;
    //     // dd($data);
    //     $data->save();

    //     return response()->json(['success' => true, 'message' => 'Data saved successfully']);
    // }

    public function getPurchaseApproveDetails(Request $request)
    {
        $data = PurchaseDetails::where('purchase_details.purchase_id', $request->id)
        ->join('purchases', 'purchases.id', 'purchase_details.purchase_id')
        ->join('asset_details', 'asset_details.id', 'purchase_details.asset_details_id')
        ->join('asset_groups', 'asset_groups.id', 'asset_details.ast_grp_id')
        ->join('asset_types', 'asset_types.id', 'asset_details.ast_typ_id')
        ->select('purchase_details.*','purchases.inv_no','purchases.inv_date','asset_details.asset_name','asset_types.type_name','asset_groups.group_name')
        ->get();
        // dd($data);

        $purchase = Purchase::where('purchases.id', $request->id)
        ->join('suppliers', 'suppliers.id', 'purchases.supplier_id')
        ->select('purchases.*','suppliers.sup_name')
        ->first();
        // dd($purchase);
        return response()->json([
            'data' => $data,
            'purchase' => $purchase,
        ]);
    }

    public function approve_purchase($id)
    {
        $data = Purchase::findOrFail($id);
        $data->status = 1;
        $data->save();

        $notification=array('message'=>'Leave approve successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function decline($id){
        $data = Purchase::findOrFail($id);
        $data->status = 2;
        $data->save();

        $notification=array('message'=>'Canceled successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function checkSerialNumber(Request $request){
        $serialNumber = $request->input('serial_no');
        $exists = PurchaseDetNo::where('serial_no', $serialNumber)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function getPurchaseDetails(Request $request)
    {
        $data = PurchaseDetails::where('purchase_details.status', 1)->where('purchase_details.id', $request->id)
        ->join('purchases', 'purchases.id', 'purchase_details.purchase_id')
        ->join('asset_details', 'asset_details.id', 'purchase_details.asset_details_id')
        ->join('asset_groups', 'asset_groups.id', 'asset_details.ast_grp_id')
        ->join('asset_types', 'asset_types.id', 'asset_details.ast_typ_id')
        ->select('purchase_details.*', 'purchases.inv_no', 'purchases.inv_date', 'asset_details.part_no', 'asset_types.type_name', 'asset_groups.group_name')
        ->first();
        // dd($data);
        return response()->json($data);
    }
}
