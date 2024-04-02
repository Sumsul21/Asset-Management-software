<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssetGroup;

class AssetType extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_name',
        'type_code',
        'description',
        'status',
        'is_delete',
        'user_id',
        'ast_grp_id',
    ];

    public function assetGroup()
    {
        return $this->belongsTo(AssetGroup::class,'ast_grp_id','id');
    }
}
