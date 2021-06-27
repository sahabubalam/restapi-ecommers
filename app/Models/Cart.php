<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'pro_id',
        'user_id',
        'pro_name',
        'pro_quantity',
        'color',
        'size',
        'pro_price',
        'sub_total',
    ];
}
