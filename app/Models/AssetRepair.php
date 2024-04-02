<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssetTransection;

class AssetRepair extends Model
{
    use HasFactory;
    protected $fillable = [

        'repair_amount',
        'repair_date',
        'repair_details',
        'status',
        'asset_transactions_id',
        'user_id',

    ];
    public function assetTransaction(){

        return $this->belongsTo(AssetTransection::class,'asset_transactions_id');
    }
}
