<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetNo extends Model
{
    use HasFactory;

    protected $fillable = [

        'part_no',
        'serial_no',
        'status',
        'reg_date',
        'purchase_id',
        'asset_details_id',
        'user_id'
    ];

}

