<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depreciation extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "duration",
        "percentage",
        "life_time",
        "auto_cal",
        "description",
        "status",
        "is_delete",
        "user_id",
    ] ;

    
}
