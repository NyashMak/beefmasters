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

class BMProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('shop_id', 1)->get();
        $products = Product::all();
        $cart = Cart::content();
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
        // }
        // dd($cart);
        return view ('shop_front.shop-page', compact('categories', 'products', 'cart', 'subtotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        $cart = Cart::content();
        $decimals = 2;
        $decimalSeparator = ".";
        $thousandSeparator = " ";
        $priceTotalBeforeDiscountTax = Cart::priceTotal($decimals, $decimalSeparator, $thousandSeparator);
        $subtotal = Cart::subtotal($decimals, $decimalSeparator, $thousandSeparator);
        $tax = Cart::tax($decimals, $decimalSeparator, $thousandSeparator);
        $total = Cart::total($decimals, $decimalSeparator, $thousandSeparator);

        return view ('shop_front.show', compact('product', 'cart', 'subtotal', 'tax', 'total'));
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