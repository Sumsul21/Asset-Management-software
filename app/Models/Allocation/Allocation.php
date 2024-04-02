<?php

namespace App\Models\Allocation;

use App\Models\AssetTransection;
use App\Models\Employee\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'sang_date',
        'end_date',
        'status',
        'remarks',
        'dept_id',
        'asset_transections_id',
        'loc_id',
        'employees_id',
        'user_id'
    ];

    public function astCode(){

        return $this->belongsTo(AssetTransection::class,'asset_transections_id','id');
    }

    public function empLoyee(){
        return $this->belongsTo(Employee::class,'employees_id','id');
    }
}
