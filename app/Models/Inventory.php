<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public $table = "inventories";
    use HasFactory;
    protected $fillable = [
        'sid',
        'quantity',
    ];
}