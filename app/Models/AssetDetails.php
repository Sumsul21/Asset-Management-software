<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetDetails extends Model
{
    use HasFactory;
    protected $fillable = [

       'asset_code',
       'initial',
       'code_length',
       'asset_name',
       'part_no',
       'description',
       'ast_grp_id',
       'ast_typ_id',
       'user_id',
       'dep_id',

    ] ;

    public function assetGroup()
    {
        return $this->belongsTo(AssetGroup::class,'ast_grp_id');
    }
    public function assetType()
    {
        return $this->belongsTo(AssetType::class,'ast_typ_id');
    }
    public function depName()
    {
        return $this->belongsTo(Depreciation::class,'dep_id');
    }

}
