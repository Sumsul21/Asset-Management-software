<?php

namespace App\Models\Withdrawal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;
    protected $fillable = [
        'withdrawal_data',
        'sang_data',
        'end_data',
        'allocation_to',
        'allocation_from',
        'remark',
        'asset_transections_id',
        'departments_id',
        'master_locations_id',
        'employees_id',
        'user_id'
    ];
}
