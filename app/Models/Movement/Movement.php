<?php

namespace App\Models\Movement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssetTransection;
use App\Models\Department\Department;
use App\Models\Location\DepLocation;
use App\Models\Employee\Employee;

class Movement extends Model
{
    use HasFactory;
    protected $fillable = [
        'mov_date',
        'asset_transections_id',
        'departments_id',
        'locations_id',
        'asset_details_id',
        'emp_id',
        'user_id',
        'status',
        'remarks',
    ];

    public function assetTransaction(){

        return $this->belongsTo(AssetTransection::class,'asset_transections_id');
    }
    public function departMents(){

        return $this->belongsTo(Department::class,'departments_id');
    }
    public function locaTion(){
        return $this->belongsTo(DepLocation::class,'locations_id');
    }
    public function empName(){
        return $this->belongsTo(Employee::class,'emp_id');
    }
}
