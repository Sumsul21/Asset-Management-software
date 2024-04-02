<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetTransection extends Model
{
    use HasFactory;
    protected $fillable = [
        "rfid_num",
        "asset_code",
        "book_value",
        "org_value",
        "start_date",
        "end_date",
        "serial_no",
        "part_no",
        "user_id",
        "asset_details_id",
        "dep_id",
    ];

    public function assetDetails(){

        return $this->belongsTo(AssetDetails::class,'asset_details_id');
    }

    public function depreciation(){

        return $this->belongsTo(Depreciation::class,'dep_id');
    }

}
