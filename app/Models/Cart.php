<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'product_price',
        'product_title',
        'product_percent',
        'product_img',
        'product_description',
        'quantity',
        'total_price'
    ];
}
