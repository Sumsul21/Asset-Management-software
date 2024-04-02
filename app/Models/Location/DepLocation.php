<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepLocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'location_name',
        'contact_perName',
        'contact_phNumber',
        'store_code',
        'address',
        'description',
        'status',
        'user_id',
    ];
}
