<?php

namespace App\Models\Inventory;

use App\Models\AssetDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'qty',
        'price',
        'rcv_qty',
        'status',
        'purchase_id',
        'asset_details_id',
        'user_id',
    ];


    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    public function assetDetails()
    {
        return $this->belongsTo(AssetDetails::class);
    }
}
