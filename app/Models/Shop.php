<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Shop extends Model
{
    public $table = "shops";
    use HasFactory;
      protected $fillable = [
        'sid',
        'name',
        'description'
    ];

    public function category(){
        return $this->hasMany(Category::class);
    }
}