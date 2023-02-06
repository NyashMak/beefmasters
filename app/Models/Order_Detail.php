<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_Item;
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
        'order_nr',
        'status'
    ];

    public function orderItems(){ 
        return $this->hasMany(Order_Item::class, 'order_id');
    }
}
