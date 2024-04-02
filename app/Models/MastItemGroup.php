<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MastItemGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'part_name',
        'description',
        'status'
    ];
}
