<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;

class BMHomeController extends Controller
{
    public function index (){
        $shops = Shop::all();
        
        if (count($shops)!= 2){
            if (Shop::where('name','Butcher')->first() == ""){       
                $butcher = new Shop;
                $butcher->sid = Str::uuid()->toString();
                $butcher->name = 'Butcher';
                $butcher->save();           
            }
    
            if (Shop::where('name','Farm')->first() == ""){           
                $farm = new Shop;
                $farm->sid = Str::uuid()->toString();
                $farm->name = 'Farm';
                $farm->save();           
            }

            $cart = Cart::content();
            Cart::setGlobalTax(15);
            $decimals = 2;
            $decimalSeparator = ".";
            $thousandSeparator = " ";
            $priceTotalBeforeDiscountTax = Cart::priceTotal($decimals, $decimalSeparator, $thousandSeparator);
            $subtotal = Cart::subtotal($decimals, $decimalSeparator, $thousandSeparator);
            $tax = Cart::tax($decimals, $decimalSeparator, $thousandSeparator);
            $total = Cart::total($decimals, $decimalSeparator, $thousandSeparator);
            // if(is_object($cart)){
            //     $cart = $cart->toArray();
            // } else {
            //     $cart = [];
            //     // $cart['id'] = 0;
                
            // }

            // dd('HERE');
            return view('shop_front.home', compact('cart'));
        }
        $cart = Cart::content();
        if(is_object($cart)){
            // $cart = $cart->toArray();
            Cart::setGlobalTax(15);
            $decimals = 2;
            $decimalSeparator = ".";
            $thousandSeparator = " ";
            $priceTotalBeforeDiscountTax = Cart::priceTotal($decimals, $decimalSeparator, $thousandSeparator);
            $subtotal = Cart::subtotal($decimals, $decimalSeparator, $thousandSeparator);
            $tax = Cart::tax($decimals, $decimalSeparator, $thousandSeparator);
            $total = Cart::total($decimals, $decimalSeparator, $thousandSeparator);
            // dd($subtotal);
        } else {
            dd('No Cart');
            // $cart = [];
            // $cart['id'] = 0;
            $cart = new Cart();
            $subtotal = 0;
            dd($subtotal);
        }
        // dd($subtotal);
        // dd($cart);
        return view('shop_front.home', compact('cart', 'subtotal'));
    }
}
