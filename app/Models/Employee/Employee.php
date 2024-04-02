<?php

namespace App\Models\Employee;

use App\Models\Department\Department;
use App\Models\Location\DepLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_name',
        'emp_code',
        'emp_desig',
        'cont_number',
        'email',
        'date_of_birth',
        'emp_gender',
        'nid_no',
        'blood_group',
        'status',
        'user_id',
        'dept_id',
        'loc_id',
    ];

    public function deptName()
    {
        return $this->belongsTo(Department::class,'dept_id','id');
    }
    public function locName()
    {
        return $this->belongsTo(DepLocation::class,'loc_id','id');
    }

}
