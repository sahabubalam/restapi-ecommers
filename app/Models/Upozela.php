<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upozela extends Model
{
    use HasFactory;
    protected $fillable = [
        'upozela_name',
    ];
}
