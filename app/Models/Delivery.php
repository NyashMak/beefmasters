<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public $table = "delivery";
    use HasFactory;
    protected $fillable = [
        'sid',
        'shop_id',
        'order_id',
        'description'
    ];
    
}