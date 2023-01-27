<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Hamcrest\Type\IsObject;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Models\User;
use App\Models\User_Address;
use App\Models\User_Payment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Discount;
use Hash;
use DB; use Mail; use Sentinel; use Activation; use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        $cartArray = $cart->toArray();
        $decimals = 2;
        $decimalSeparator = ".";
        $thousandSeparator = " ";
        $priceTotalBeforeDiscountTax = Cart::priceTotal($decimals, $decimalSeparator, $thousandSeparator);
        $subtotal = Cart::subtotal($decimals, $decimalSeparator, $thousandSeparator);
        $tax = Cart::tax($decimals, $decimalSeparator, $thousandSeparator);
        $total = Cart::total($decimals, $decimalSeparator, $thousandSeparator);
        return view('shop_front.auth.login', compact('cart', 'subtotal', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request){

        // Add Validation

        // dd($request);
        $user = User::where('email', $request->email)->first();
        $name = explode(' ', $user->name);
        $first_name = $name[0];
        $last_name = $name[1];

        if (is_object($user)){
            if (Hash::check($request->password, $user->password)) {
                //Authorize user
                Auth::login($user, $remember = true);

                $deliveryAddress = '';
                $deliveryFee = 'Enter Address First';

                //Get Cart Content
                $cart = Cart::content();
                $cartArray = $cart->toArray();
                $decimals = 2;
                $decimalSeparator = ".";
                $thousandSeparator = " ";
                $priceTotalBeforeDiscountTax = Cart::priceTotal($decimals, $decimalSeparator, $thousandSeparator);
                $subtotal = Cart::subtotal($decimals, $decimalSeparator, $thousandSeparator);
                $tax = Cart::tax($decimals, $decimalSeparator, $thousandSeparator);
                $discount = Cart::discount();
                $total = Cart::total($decimals, $decimalSeparator, $thousandSeparator);

                $shipping = 0;
                $data = array();
                $passPhrase = 'beefmasterstest';

                return view('shop_front.cart', compact('cart', 'cartArray', 'priceTotalBeforeDiscountTax', 'subtotal', 'tax', 'total', 'discount', 'shipping', 'first_name', 'last_name', 'deliveryAddress', 'deliveryFee'));
            }
            else{
                //The password is incorrect
                return redirect()->route('login')->with('error','The email address or the password is incorrect. Please enter correct details to proceed');
            }
        }
        else{
            //The user doesnt exist
            return redirect()->route('login')->with('error','The email address or the password is incorrect. Please enter correct details to proceed');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = Cart::content();
        $cartArray = $cart->toArray();
        $decimals = 2;
        $decimalSeparator = ".";
        $thousandSeparator = " ";
        $priceTotalBeforeDiscountTax = Cart::priceTotal($decimals, $decimalSeparator, $thousandSeparator);
        $subtotal = Cart::subtotal($decimals, $decimalSeparator, $thousandSeparator);
        $tax = Cart::tax($decimals, $decimalSeparator, $thousandSeparator);
        $total = Cart::total($decimals, $decimalSeparator, $thousandSeparator);
        return view('shop_front.auth.register', compact('cart', 'subtotal', 'total'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // dd($request);
        //         $this->validate($request,[
        //             'first_name'=>'required',
        //             'last_name'=>'required',
        //             'email'=>'required|unique',
        //             'password'=>'required',
        //             'address'=>'required'
        //         ]);
        // dd('validation failed');
        $user = new User();
        $user->name = $request->first_name.' '. $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_customer = 1;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->sid = Str::uuid()->toString();
        $result = $user->save();

                if($result){
                    //Before redirecting back to login save the user's address
                    return redirect()->route('login')->with('success','Account created successfully. Login to proceed with your order');
                }
                else{
                    return redirect()->route('register-user')->with('error', 'There was an error creating this account. Please contact the administrator');
                }
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
