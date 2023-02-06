<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Order_Detail;
use App\Models\User;

class Order_Item extends Model
{
    public $table = 'order__items';
    use HasFactory;
    protected $fillable = [
        'sid',
        'name',
        'price',
        'quantity',
        'weight',
        'discount',
        'tax',
        'order_id'
        
    ];

    public function orderDetails(){
        return $this->belongsTo(Order_Detail::class, 'order_id');
    }

}