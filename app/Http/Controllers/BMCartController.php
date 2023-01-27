<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hamcrest\Type\IsObject;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Discount;
use App\Models\Order_Detail;
use App\Models\Order_Item;

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

        $deliveryAddress = "";
        $deliveryFee = "";
        
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
        return view('shop_front.cart', compact('cart', 'cartArray', 'priceTotalBeforeDiscountTax', 'subtotal', 'tax', 'total', 'deliveryAddress', 'deliveryFee'));
    }

    public function update(Request $request){
        // foreach ($request->quantity as $cartItemID => $quantity){
        //     // dd($cartItemID);
        //     Cart::updateOrCreate($cartItemID, $quantity);
        // }

        // dd($request);
        $deliveryFee = $request->delivery;
        $deliveryAddress = $request->set_address;
        if ($deliveryAddress == null){
            $deliveryAddress = 'Collect in-store';
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
        if ($deliveryFee == 'Free Delivery'){
            $total = $total + 0;
            return view('shop_front.cart', compact('cart', 'cartArray', 'priceTotalBeforeDiscountTax', 'subtotal', 'tax', 'total', 'deliveryFee', 'deliveryAddress' ));
        }
        if ($deliveryFee == 'Collect in-store'){
            $total = $total + 0;
            return view('shop_front.cart', compact('cart', 'cartArray', 'priceTotalBeforeDiscountTax', 'subtotal', 'tax', 'total', 'deliveryFee', 'deliveryAddress'));
        }
        if ($deliveryFee != 'Collect in-store' && $deliveryFee != 'Free Delivery'){
            $deliveryFee = $deliveryFee+0;
            $total = $total + $deliveryFee;
            return view('shop_front.cart', compact('cart', 'cartArray', 'priceTotalBeforeDiscountTax', 'subtotal', 'tax', 'total', 'deliveryFee', 'deliveryAddress'));
        }
        return view('shop_front.cart', compact('cart', 'cartArray', 'priceTotalBeforeDiscountTax', 'subtotal', 'tax', 'total'));

    }

    public function checkout(Request $request){
        // dd($request);
        $deliveryAddress = $request->delivery_address;
        $deliveryFee = $request->delivery_fee;
        // dd($deliveryFee);
        $total = $request->total;
        if ($deliveryFee == 'Free Delivery'){
            $deliveryFee = 'Free Delivery';
        }
        if ($deliveryFee == 'Collect in-store'){
            $deliveryFee = null;
        }
        if ($deliveryFee == null){
            $deliveryAddress = 'Collect-in-store';
            $deliveryFee = 0;
        }
        if (!is_string($deliveryFee)){
            $deliveryFee = $deliveryFee + 0;
        }

        //Get Logged In User Details
        $user = Auth::user();
        $full_name = explode(' ',$user->name);
        $first_name = $full_name[0];
        $last_name = $full_name[1];
        $phone = $user->phone;
        $email = $user->email;

        //Get Cart Details
        $cart = Cart::content();
        $cartArray = $cart->toArray();
        $decimals = 2;
        $decimalSeparator = ".";
        $thousandSeparator = " ";
        $priceTotalBeforeDiscountTax = Cart::priceTotal($decimals, $decimalSeparator, $thousandSeparator);
        $subtotal = Cart::subtotal($decimals, $decimalSeparator, $thousandSeparator);
        $tax = Cart::tax($decimals, $decimalSeparator, $thousandSeparator);
        $discount = Cart::discount();
        $totalExDelivery = Cart::total($decimals, $decimalSeparator, $thousandSeparator);

        //Create Order record
        $order = new Order_Detail();
        $orderSID = Str::uuid()->toString();
        $order->sid = $orderSID;
        $order->subtotal = $subtotal;
        $order->discount = $discount;
        $order->tax = $tax;
        $order->delivery = $deliveryFee;
        $order->delivery_address = $deliveryAddress;
        $order->total = $request->total;
        $order->user_id = Auth::user()->sid;
        $result = $order->save();
        

        if ($result){
            // dd($cartArray);
            $newOrder = Order_Detail::where('sid', $orderSID)->first();
            $orderID = $newOrder->sid;
            $orderNr = '#' . str_pad($newOrder->id + 1, 8, "0", STR_PAD_LEFT);
            $newOrder->order_nr = $orderNr;
            $newOrder->save();
            $paymentSuccessful = route('successful');
            // dd($paymentSuccessful);
            // $paymentSuccessful = route('successful', [
            //     'firstname' => $first_name,
            //     'order_nr' => $orderNr,
            //     'total' => $total
            // ]);
            // $paymentSuccessful = route('successful', [$first_name, $orderNr, $total]);
            $paymentCancelled = route('cancelled', [
                'firstname' => $first_name,
                'order_nr' => $orderNr,
                'total' => $total
            ]);
            
            // dd($paymentSuccessful);
            // Create order list records
            foreach ($cartArray as $cartItem){
                $orderItem = new Order_Item();
                $orderItem->sid = Str::uuid()->toString();
                $orderItem->name = $cartItem['name'];
                $orderItem->price = $cartItem['price'];
                $orderItem->quantity = $cartItem['qty'];
                $orderItem->order_id = $orderID;
                $orderItem->save();
            }
            $order_items = Order_Item::where('order_id', $orderID)->get();
            // dd($order_items);
        }

        // $successful = urlencode(route('successful'));
        // dd($successful);


        $data = array();
        $passPhrase = 'beefmasterstest';
        // function generateSignature($data, $passPhrase = null) {
        //     // Create parameter string
        //     $pfOutput = '';
        //     foreach( $data as $key => $val ) {
        //         if($val !== '') {
        //             $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
        //         }
        //     }
        //     // Remove last ampersand
        //     $getString = substr( $pfOutput, 0, -1 );
        //     if( $passPhrase !== null ) {
        //         $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
        //     }
        //     return md5( $getString );
        // }

        // $data['name_first'] = 'Nyasha';
        // $data['name_last'] = 'Makwa';
        // $data['email_address'] = 'lmakwavarara@rocketmail.com';
        // $data['cell_number'] = '0823456789';
        
        

        // $signature = generateSignature( $data, $passPhrase );
        // dd($signature);

        return view('shop_front.checkout', compact('cart', 'cartArray', 'priceTotalBeforeDiscountTax', 'subtotal', 'tax', 'total', 'discount', 'deliveryFee', 'deliveryAddress', 'order_items', 'first_name', 'last_name', 'email', 'phone', 'orderSID', 'orderNr', 'paymentSuccessful', 'paymentCancelled'));
    }
}