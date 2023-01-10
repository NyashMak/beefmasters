<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public $table = "discounts";

    use HasFactory;
      protected $fillable = [
        'sid',
        'name',
        'description',
        'amount',
        'discount_percent',
        'voucher_number',
        'active'
    ];
}
