<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Hamcrest\Type\IsObject;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Discount;

class BMCartController extends Controller
{
    public function add_to_cart(Request $request){

        // dd($request);

        // Cart::add($request->product_id, $request->product_name, $request->quantity, $request->price, $request->weight);
        Cart::add(
            $request->product_id, 
            $request->product_name, 
            $request->quantity, 
            $request->price, 
            $request->weight);

        return redirect()->route('shop.index')->with('success', $request->product_name . ' added to Cart successfully');
        // return view('shop_front.cart');
    }

    public function index(){

        $cart = Cart::content();
        $cartArray = $cart->toArray();
        $decimals = 2;
        $decimalSeparator = ".";
        $thousandSeparator = " ";
        $priceTotalBeforeDiscountTax = Cart::priceTotal($decimals, $decimalSeparator, $thousandSeparator);
        $subtotal = Cart::subtotal($decimals, $decimalSeparator, $thousandSeparator);
        $tax = Cart::tax($decimals, $decimalSeparator, $thousandSeparator);
        $total = Cart::total($decimals, $decimalSeparator, $thousandSeparator);
        // dd($priceTotalBeforeDiscountTax);
        // dd($cart->toArray());
        return view('shop_front.cart', compact('cart', 'cartArray', 'priceTotalBeforeDiscountTax', 'subtotal', 'tax', 'total'));
    }

    public function update(Request $request){
        foreach ($request->quantity as $cartItemID => $quantity){
            // dd($cartItemID);
            Cart::updateOrCreate($cartItemID, $quantity);
        }

        $cart = Cart::content();
        $cartArray = $cart->toArray();
        $decimals = 2;
        $decimalSeparator = ".";
        $thousandSeparator = " ";
        $priceTotalBeforeDiscountTax = Cart::priceTotal($decimals, $decimalSeparator, $thousandSeparator);
        $subtotal = Cart::subtotal($decimals, $decimalSeparator, $thousandSeparator);
        $tax = Cart::tax($decimals, $decimalSeparator, $thousandSeparator);
        $total = Cart::total($decimals, $decimalSeparator, $thousandSeparator);
        // dd($priceTotalBeforeDiscountTax);
        // dd($cart->toArray());
        return view('shop_front.cart', compact('cart', 'cartArray', 'priceTotalBeforeDiscountTax', 'subtotal', 'tax', 'total'));

    }

    public function checkout(){
        
    }
}