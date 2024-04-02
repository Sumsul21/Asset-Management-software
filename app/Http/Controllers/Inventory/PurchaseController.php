<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\AssetDetails;
use App\Models\AssetGroup;
use App\Models\AssetType;
use App\Models\Department\Department;
use App\Models\Location\DepLocation;
use Illuminate\Http\Request;
use App\Models\Inventory\Purchase;
use App\Models\Inventory\PurchaseDetails;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;

class PurchaseController extends Controller
{
    public function index(){

        $item_group = AssetDetails::with('assetType','assetGroup')->orderBy('id', 'desc')->latest()->get();
        // dd($item_group);
        $group = AssetGroup::where('status', 1)->get();
        $supplier = Supplier::where('status', 1)->get();
        $department = Department::where('status', 1)->get();
        $location = DepLocation::where('status', 1)->get();
        // dd($dept, $loc);
        $data    =  Purchase::with('purchaseDetails','supName','deptName','locName')->orderBy('id', 'desc')->latest()->get();
        // dd($data);
        return view('layouts.pages.inventory.index',compact('supplier','item_group','data','group','department','location'));
    }

    public function store(Request $request)
    {
        $purchase_codes = Helper::IDGenerator(new Purchase, 'inv_no', 5, 'INV-NO'); /* Generate id */


        $pur_id=$request->pur_id;
        if(isset($pur_id)){
            $storePurchase = Purchase::findOrFail($pur_id);
        }else{
            $validator = Validator::make($request->all(), [
                'inv_date' => 'required',
                'supplier_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $storePurchase = new Purchase();
            $storePurchase->inv_no = $purchase_codes;
        }
        $storePurchase->inv_date = $request->inv_date;
        $storePurchase->remarks = $request->remarks;
        $storePurchase->status = 0;
        $storePurchase->supplier_id = $request->supplier_id;
        $storePurchase->dept_id = $request->dept_id;
        $storePurchase->loc_id = $request->loc_id;
        $storePurchase->user_id = Auth::user()->id;
        $storePurchase->save();

        if (isset($request->moreFile[0]['item_id']) && !empty($request->moreFile[0]['item_id'])) {
            foreach($request->moreFile as $item){
                $data = new PurchaseDetails();
                $data->asset_details_id = $item['item_id'];
                $data->qty = $item['qty'];
                $data->rcv_qty = 0;
                $data->price = $item['price'];

                $data->status = 1;
                if(isset($pur_id)){
                    $data->purchase_id = $pur_id;
                }else{
                    $data->purchase_id = $storePurchase->id;
                }
                $data->user_id = Auth::user()->id;
                $data->save();
            }
        }
        if (isset($request->editFile[0]['item_id']) && !empty($request->editFile[0]['item_id'])) {
            foreach($request->editFile as $item){
                $data = PurchaseDetails::findOrFail($item['id']);

                $data->asset_details_id = $item['item_id'];
                $data->qty = $item['qty'];
                $data->rcv_qty = 0;
                $data->price = $item['price'];

                $data->status = 1;
                if(isset($pur_id)){
                    $data->purchase_id = $pur_id;
                }else{
                    $data->purchase_id = $storePurchase->id;
                }
                $data->user_id = Auth::user()->id;
                $data->save();
            }
        }
        if(isset($pur_id)){
            $purchase = Purchase::where('id', $pur_id)->first();
        }else{
            $purchase = Purchase::where('id', $storePurchase->id)->first();
        }
        $mastSupplier = $purchase->mastSupplier;
        $purchaseDetails = $purchase->purchaseDetails;

        $total = 0;
        foreach ($purchaseDetails as $key => $value) {
            $total += $value->qty * $value->price;
        }

        return response()->json([
            'storePurchase'   => $storePurchase,
            'purchase'        => $purchase,
            'supplier'        => $mastSupplier,
            'total'           => $total,
        ]);


    }

    public function edit(Request $request)
    {
        $supplier=Supplier::where('status', 1)->get();
        $department=Department::where('status', 1)->get();
        // dd($department);
        $location=DepLocation::where('status', 1)->get();


        $purchase_details = PurchaseDetails::where('purchase_id', $request->id)

        ->join('asset_details', 'asset_details.id', 'purchase_details.asset_details_id')
        ->join('asset_groups', 'asset_groups.id', 'asset_details.ast_grp_id')
        ->join('asset_types', 'asset_types.id', 'asset_details.ast_typ_id')
        ->join('purchases', 'purchases.id', 'purchase_details.purchase_id')
        ->select('purchase_details.*','asset_details.id as item_rg_id','asset_details.asset_name','asset_groups.group_name','asset_groups.id as item_groups_id','asset_types.type_name','asset_types.id as item_types_id')
        ->get();
        // dd($purchase_details);

        // $purchase_details =PurchaseDetails::with('mastItemRegister','purchase')->where('purchase_id', 1)->get();
        $data = Purchase::where('id', $request->id)->first();
        // dd($data);
        return response()->json([
            'data' => $data,
            'suppliers' =>  $supplier,
            'departments'=>$department,
            'locations'=>$location,
            'purchase_details' => $purchase_details,
        ]);
    }


    public function inv_purchase_destroy($id)
    {
        $data=PurchaseDetails::find($id);
        $data->delete();
        return response()->json('success');
    }

    /*=====================================
     *  Ajax Use Call Data
     *=====================================
     */
    public function getPartNumber(Request $request)
    {
        // $data = AssetDetails::where('ast_typ_id', $request->part_id)->with('assetType')->get();
        // dd($data);
        $data = AssetType::where('ast_grp_id', $request->part_id)->with('assetGroup')->get();
        // dd($data);
        return view('layouts.pages.inventory.load-part-number',compact('data'));
    }
    public function getPartNo(Request $request)
    {
        $anotherField = AssetDetails::where('ast_typ_id', $request->part_id)->get();
        return view('layouts.pages.inventory.load_asset_name',compact('anotherField'));
    }

    public function getEditPartNo(Request $request)
    {
        $data = AssetType::where('ast_grp_id', $request->part_id)->get();
        // dd($data);
        return response()->json($data);
    }

    public function getDeleteMaster(Request $request)
    {
        $data=Purchase::find($request->id);
        $data->delete();
        return response()->json('success');
    }

    /**========================================
     * Purchase Approve
     * =======================================
     */

    function purchase_approve_list() {
        $data = Purchase::where('status', 0)->get();
        // dd($data);
        return view('layouts.pages.inventory.purchase_approve',compact('data'));
    }

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

        $notification=array('messege'=>'Purchase Approve successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function decline($id){
        $data = Purchase::findOrFail($id);
        $data->status = 2;
        $data->save();

        $notification=array('messege'=>'Canceled successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
