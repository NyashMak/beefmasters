<?php

namespace App\Http\Controllers;

use App\Models\Order_Detail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Hamcrest\Type\IsObject;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Discount;
use App\Models\Order_Item;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order_Detail::all();
        $customers = User::all();
        $order_items = Order_Item::all();
        return view('admin.orders.index', compact('orders', 'customers', 'order_items'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_Detail  $order_Detail
     * @return \Illuminate\Http\Response
     */
    public function show(Order_Detail $order_Detail, $id)
    {
        // dd($id);
        $order = Order_Detail::where('sid', $id)->first();
        // dd($order);
       
        if(is_object($order)){
            $products = Product::all();
            $customer = User::where('sid', $order->user_id)->first();
            $order_items = Order_Item::where('order_id', $order->sid)->get();
            return view('admin.orders.show', compact('order', 'order_items', 'customer', 'products'));
        }
        else{
            redirect()->back()->with('error', 'Something went wrong with this order');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_Detail  $order_Detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_Detail $order_Detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order_Detail  $order_Detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_Detail $order_Detail, $order_id)
    {
        // dd($request);
        $order = Order_Detail::where('sid', $order_id)->first();
        $order->status = $request->status;
        $order->save();
        
        return redirect()->back()->with('success', 'Order Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_Detail  $order_Detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_Detail $order_Detail)
    {
        //
    }
}