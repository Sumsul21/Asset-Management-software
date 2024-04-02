<?php

namespace App\Models\Inventory;

use App\Models\Department\Department;
use App\Models\Location\DepLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
class Purchase extends Model
{
    use HasFactory;
    protected $fillable=[
        'inv_date',
        'inv_no',
        'vat',
        'tax',
        'supplier_id',
        'dept_id',
        'loc_id',
        'status',
        'is_parsial',
        'remarks',
        'user_id',
    ];

    public function supName()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetails::class, 'purchase_id');
    }

    public function deptName(){
        return $this->belongsTo(Department::class,'dept_id');
    }

    public function locName(){
        return $this->belongsTo(DepLocation::class,'loc_id');
    }
}
