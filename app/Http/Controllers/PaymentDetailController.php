<?php

namespace App\Http\Controllers;

use App\Models\Payment_Detail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
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

class PaymentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Payment_Detail  $payment_Detail
     * @return \Illuminate\Http\Response
     */
    public function show(Payment_Detail $payment_Detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment_Detail  $payment_Detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment_Detail $payment_Detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment_Detail  $payment_Detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment_Detail $payment_Detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment_Detail  $payment_Detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment_Detail $payment_Detail)
    {
        //
    }

    public function successful (){

        // dd('Found the Successful Route');
        $user = Auth::user();
        if ($user){
            $user_id = $user->sid;
            $name = explode(' ',$user->name);
            $first_name = $name[0];
            $last_name = $name[1];
    
            $latestOrder = Order_Detail::where('user_id', $user_id)->orderBy('created_at','DESC')->first();
            $order_nr = $latestOrder->order_nr;
            $total = $latestOrder->total;
    
            // Mark the order as Paid
            $latestOrder->paid = 1;
            $latestOrder->save();
    
            return view('shop_front.payment.successful', compact('first_name','order_nr','total'));
        }

    }

    public function cancel($first_name,$order_nr,$total){
        $user = Auth::user();
        if ($user){
            $user_id = $user->sid;
            $name = explode(' ',$user->name);
            $first_name = $name[0];
            $last_name = $name[1];
    
            $latestOrder = Order_Detail::where('user_id', $user_id)->orderBy('created_at','DESC')->first();
            $order_nr = $latestOrder->order_nr;
            $total = $latestOrder->total;
    
            // Mark the order as Unpaid
            $latestOrder->paid = 0;
            $latestOrder->save();
    
            return view('shop_front.payment.cancel', compact('first_name','order_nr','total'));
        }
    }

    public function notify (){
        // echo 'Payment of New Order Successful', compact('first_name', 'order_nr', 'total');
    }
}