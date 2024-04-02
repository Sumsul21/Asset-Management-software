<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\AssetDetailsController;
use App\Http\Controllers\AssetGroupController;
use App\Http\Controllers\AssetTypeController;
use App\Http\Controllers\AssetTransectionController;
use App\Http\Controllers\AssetRepairController;



use App\Http\Controllers\DepLocationController;
use App\Http\Controllers\DepreciationController;
use App\Http\Controllers\Inventory\PurchaseController;
use App\Http\Controllers\PurchaseDetPartNoController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MovementController;

use App\Http\Controllers\Admin\BackViewController;

//---Master Data
use App\Http\Controllers\Master\MastDepartmentController;
use App\Http\Controllers\Master\MastDesignationController;
use App\Http\Controllers\Master\MastEmployeeCategoryController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard')->middleware('auth');
Route::get('/coming_soon', function () {return view('coming_soon');})->name('coming_soon')->middleware('auth');

//==================// Location //==================//
Route::get('/location', [LocationController::class, 'index'])->name('location');
Route::get('/get-districts', [LocationController::class, 'getDistricts'])->name('get_districts');
Route::get('/get-upazila', [LocationController::class, 'getUpazilas'])->name('get_upazila');
Route::get('/get-thana', [LocationController::class, 'getThanas'])->name('get_thana');


//____________________// START \\_________________//
Route::middleware([ 'auth:sanctum','verified','member', config('jetstream.auth_session')])->group(function () {
    Route::get('/dashboard', [BackViewController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
});


Route::group(['middleware' => ['auth']], function(){
    //------ Employee
    Route::resource('employee', EmployeeController::class);

});

Route::group(['middleware' => ['auth']], function(){
    //------ Master Data
    Route::resource('mast_department', MastDepartmentController::class);
    Route::resource('mast_designation', MastDesignationController::class);
    Route::resource('must_employee_category', MastEmployeeCategoryController::class);
});
Route::group(['middleware' => ['auth']], function(){
    //------ Master Data
    Route::resource('asset_group', AssetGroupController::class);

    Route::post('asset_group/store', [AssetGroupController::class, 'store'])->name('asset_group.store');
    Route::get('get/employee_code', [AssetGroupController::class, 'getEmployeeCode'])->name('get_employee_code');

    Route::resource('asset_type', AssetTypeController::class);
    Route::post('asset_type/store', [AssetTypeController::class, 'store'])->name('asset_type.store');

    Route::resource('asset_details', AssetDetailsController::class);
    Route::post('asset_details/store', [AssetDetailsController::class,'store'])->name('asset_details.store');

    Route::get('get-asset-type', [AssetDetailsController::class,'getAssetType'])->name('get-asset-type');
    Route::get('edit-asset-type', [AssetDetailsController::class,'editAssetType'])->name('edit-asset-type');
    Route::get('get-asset-details-code', [AssetDetailsController::class,'getAssetDetailsCode'])->name('get-asset-details-code');
    Route::get('edit-asset-details-code', [AssetDetailsController::class,'editAssetDetailsCode'])->name('edit-asset-details-code');
    Route::get('get-life-time', [AssetDetailsController::class,'getLifeTime'])->name('get-life-time');

    Route::get('/getCombinedData',[AssetDetailsController::class,'getCombinedData'])->name('get-combined-data');

    // ?========== Depreciation ==========\\\

    Route::resource('dep_name',DepreciationController::class);
    Route::post('depreciation/store', [DepreciationController::class,'store'])->name('depreciation.store');

    // =====Ast Trans====\\
    Route::get('get-all-asset-codes', [AssetTransectionController::class,'getDetailsCode'])->name('get-all-asset-codes');

    route::resource('ast_trans', AssetTransectionController::class);
    Route::post('ast_trans/store', [AssetTransectionController::class,'store'])->name('ast_trans.store');

    // =====Repair====\\
    Route::resource('ast_repair',AssetRepairController::class);
    // Route::post('ast_repair', [AssetRepairController::class,'store'])->name('ast_repair.store');
    Route::get('get-asset-tran-info', [AssetRepairController::class,'getAssetTranInfo'])->name('get-asset-tran-info');

    // ===== Approve Repair====\\

    Route::get('ast_repair_approve', [AssetRepairController::class,'ast_repair_approve'])->name('ast_repair_approve.index');
    Route::PATCH('ast_repair/approve/{id}', [AssetRepairController::class, 'repair_approve'])->name('ast_repair.approve');
    Route::PATCH('ast_repair/canceled/{id}', [AssetRepairController::class, 'decline'])->name('ast_repair.canceled');

    Route::resource('supply_name',SupplierController::class);

    Route::post('supply_name/store', [SupplierController::class,'store'])->name('supply_name.store');



     // ?========== Purchase ==========\\\

    Route::get('/purchase/index', [PurchaseController::class,'index'])->name('purchase.index');

    Route::post('/purchase/store', [PurchaseController::class, 'store'])->name('inv_purchase.store');

    Route::get('purchase/edit',[PurchaseController::class,'edit'])->name('inv_purchase_edit');

    Route::delete('inv_purchase/destroy/{id}', [PurchaseController::class, 'inv_purchase_destroy'])->name('inv_purchase.destroy');
    Route::get('/get-delete-master/purchase',[PurchaseController::class,'getDeleteMaster'])->name('getDelete-master-purchase');


    Route::get('/get-part-id',[PurchaseController::class,'getPartNumber'])->name('get-part-id');
    Route::get('/get-part-number',[PurchaseController::class,'getPartNo'])->name('get-part-number');
    Route::get('get/edit-part-id',[PurchaseController::class,'getEditPartNo'])->name('edit-part-id');


    // //   purchase_det_part_no ///

    Route::get('/det_part_no/cat_id={cat_id}', [PurchaseDetPartNoController::class,'index'])->name('det_part_no');
    Route::get('/create/cat_id={cat_id}', [PurchaseDetPartNoController::class,'create'])->name('create.part_no');
    Route::post('/store', [PurchaseDetPartNoController::class, 'store'])->name('det_part_no.store');
    Route::get('inv/get-purchase/approve/details', [PurchaseDetPartNoController::class, 'getPurchaseApproveDetails'])->name('get_purchase_approve_details');

    // //   SL-No & Part_No ///

    Route::get('/details/{type}/{cat_id}/', [PurchaseDetPartNoController::class, 'details'])->name('details');
    // Route::post('/store/part_sl_no', [PurchaseDetPartNoController::class, 'submit'])->name('part_sl_no.store');

    //ajax code for increment numbre.....
    Route::get('inv/get-purchase/details', [PurchaseDetPartNoController::class, 'getPurchaseDetails'])->name('get_purchase_details');
    Route::get('inv/check-serial-number', [PurchaseDetPartNoController::class, 'checkSerialNumber'])->name('checkSerialNumber');


    Route::PATCH('inv_purchase/approve/{id}', [PurchaseDetPartNoController::class, 'approve_purchase'])->name('inv_purchase.approve');
     Route::PATCH('inv_purchase/canceled/{id}', [PurchaseDetPartNoController::class, 'decline'])->name('inv_purchase.canceled');
     Route::get('inv_purchase/approve_list', [PurchaseDetPartNoController::class, 'purchase_approve_list'])->name('inv_purchase_approve.create');



     //--Purchase Approve
     Route::get('inv_purchase/approve_list', [PurchaseController::class, 'purchase_approve_list'])->name('inv_purchase_approve.create');
     Route::PATCH('inv_purchase/approve/{id}', [PurchaseController::class, 'approve_purchase'])->name('inv_purchase.approve');
     Route::PATCH('inv_purchase/canceled/{id}', [PurchaseController::class, 'decline'])->name('inv_purchase.canceled');
     Route::get('inv/get-purchase/approve/details', [PurchaseController::class, 'getPurchaseApproveDetails'])->name('get_purchase_approve_details');


     // //   Department ///

     Route::resource('dep_det',DepartmentController::class);

     ///  Dept Location  /////

     Route::resource('dept_loc',DepLocationController::class);

     // Movement /////
     Route::resource('movement',MovementController::class);

    Route::get('get-movement-data', [MovementController::class,'getMovement'])->name('get-movement-data');


    // Allocation ////
    Route::resource('allocation', AllocationController::class);
    Route::get('/get-employee-details', [AllocationController::class,'getEmployeeDetails'])->name('get-employee-details');
    Route::get('/edit-employee-details', [AllocationController::class,'editEmployeeDetails'])->name('edit-employee-details');

    // Asset Withdrwal ////
    Route::resource('asset-withdraw', WithdrawalController::class);
    Route::get('/asset-withdrawal', [WithdrawalController::class, 'index'])->name('asset_withdrawal.index');
    Route::post('/asset-withdrawal', [WithdrawalController::class, 'store'])->name('ast_withdrawal.store');
    Route::get('get_allocation_details',[WithdrawalController::class,'getAllocationDetails'])->name('get_allocation_details');
});

