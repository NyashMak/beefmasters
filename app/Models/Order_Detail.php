<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\User;

class Order_Detail extends Model
{
    public $table = "order__details";
    use HasFactory;

    protected $fillable = [
        'sid',
        'subtotal',
        'discount',
        'tax',
        'delivery',
        'delivery_date',
        'total',
        'user_id',
        'delivery_address',
        'paid',
        'order_nr'
    ];
}
