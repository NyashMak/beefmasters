<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class BMCartController extends Controller
{
    public function store(Request $request){

        dd($request);

        // Cart::add($request->product_id, $request->product_name, $request->quantity, $request->price, $request->weight);
        Cart::add($request->product_id, $request->product_name, $request->quantity, $request->price, $request->weight);
    }
}