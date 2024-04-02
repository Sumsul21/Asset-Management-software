<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MastUnit;

class MastItemRegister extends Model
{
    use HasFactory;
    protected $fillable = [
        'box_code',
        'gulf_code',
        'part_no',
        'description',
        'box_qty',
        'price',
        'image',
        'mast_item_category_id',
        'bar_code',
        'user_id',
        'mast_item_group_id',
        'unit_id',
    ];

    public function unit()
    {
        return $this->hasOne(MastUnit::class,'id', 'unit_id');
    }
}
