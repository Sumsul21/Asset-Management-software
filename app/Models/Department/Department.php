<?php

namespace App\Models\Department;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'dept_name',
        'description',
        'dept_head',
        'status',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
