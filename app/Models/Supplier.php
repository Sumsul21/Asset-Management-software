<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'sup_name',
        'contact_person',
        'email',
        'phone_number',
        'address',
        'status',
        'user_id',
    ];
}
