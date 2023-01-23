<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Hamcrest\Type\IsObject;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Models\User;
use App\Models\User_Address;
use App\Models\User_Payment;
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
                $this->validate($request,[
                    'first_name'=>'required',
                    'last_name'=>'required',
                    'email'=>'required|unique',
                    'password'=>'required',
                    'address'=>'required'
                ]);
        dd('validation failed');
                request()->request->add(['name'=> $request->first_name.' '.$request->last_name]);
                request()->request->add(['is_customer'=>1]);
                $input = $request->all();
                User::create($input);

                $user = User::where('email', '=', $request->email)->first();

                if(is_object($user)){
                    return redirect()->back()->with('success','Account created successfully');
                }
                dd($user);
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
}
