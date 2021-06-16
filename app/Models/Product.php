<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_description',
        'short_description',
        'regular_price',
        'sale_price',
        'featured',
        'quantity',
        'category_id',
        'discount',
        'status',
        'color_id',
        'size_id',
        'photo',

    ];
}
