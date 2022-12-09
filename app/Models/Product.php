<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Inventory;

class Product extends Model
{
    public $table = "products";
    use HasFactory;
    protected $fillable = [
        'sid',
        'shop_id',
        'category_id',
        'name',
        'description',
        'price',
        'inventory_id',
        'discount_id',
    ];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}