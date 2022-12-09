<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    public $table = 'order_item';
    use HasFactory;
    protected $fillable = [
        'sid',
        'shop_id',
        'order_id',
        'product_id',
        'quantity'
        
    ];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function order_item(){
        return $this->belongsTo(Order_Item::class);
    }

    public function product(){
        return $this->hasOne(Product::class);
    }
}