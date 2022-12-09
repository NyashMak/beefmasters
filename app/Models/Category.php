<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class Category extends Model
{
    public $table = "categories";
    use HasFactory;
      protected $fillable = [
        'sid',
        'shop_id',
        'name',
        'description'
    ];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}