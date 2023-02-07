<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Inventory;
use App\Models\Order_Item;
use Hamcrest\Type\IsObject;
use App\Models\Order_Detail;
use App\Models\User_Address;
use App\Models\User_Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use DB; use Mail; use Sentinel; use Activation; use Validator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

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
        return view('shop_front.home', compact('cart', 'subtotal'));
    }

    public function profile()
    {
        $cart = Cart::content();
        if (is_object($cart)) {
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

        // Get User Info
        $customer = Auth::user();

        // Get User Orders
        $orders = Order_Detail::where('user_id', $customer->sid)->get();
       
        foreach($orders as $order){
            $products[$order->sid] = Order_Item::where('order_id', $order->sid)->get();
            $itemsCount[$order->sid] = $products[$order->sid]->count();
        }

        return view('shop_front.account.profile', compact('cart', 'subtotal', 'customer', 'orders', 'products', 'itemsCount'));
    }

    public function showProfile(){
        $cart = Cart::content();
        if (is_object($cart)) {
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
        return view('shop_front.account.show',compact('cart', 'subtotal'));
    }

    public function updateProfile(Request $request, $id)
    {
        //Get user
        $customer = User::where('sid', $id)->first();

        //Update User Profile
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->password = $request->new_password;
        $result = $customer->save();

        if ($result){
            return redirect()->route('profile')->with('success', 'Your profile has been updated');
        } else{
            return redirect()->back()->with('error', 'An error occured while updating your profile');
        }
    }
    
}
