<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MastWorkStation extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_name',
        'contact_number',
        'location',
        'description',
        'status',
        'user_id',
    ];
}
