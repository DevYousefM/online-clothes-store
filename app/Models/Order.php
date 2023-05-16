<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "email",
        "phone_number",
        'address',
        "product_img",
        "product_title",
        "user_type",
        "qtn",
        'product_id',
        'user_id',
        'payment_status',
        'order_status',
        'shipment_code',
        'total_price',
    ];
}
