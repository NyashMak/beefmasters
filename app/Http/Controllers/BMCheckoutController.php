<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Hamcrest\Type\IsObject;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Discount;

class BMCheckoutController extends Controller
{
  public function index(Request $request) {

        dd($request);

    // 1. Update Cart
    
    // 2. Show Updated Cart Details on Checkout Form

    // $request->product_id, 
    // $request->product_name, 
    // $request->quantity, 
    // $request->price, 
    // $request->weight

        return view('shop_front.checkout');
  }    
}
