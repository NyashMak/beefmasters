@extends('shop_front.layouts.app')
@section('body')
@if(Session::has('success'))
<div class="alert alert-success mx-auto">
    {{Session::get('success')}}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger mx-auto">
    <ul>
   @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
     @endforeach
   </ul>
</div>
@endif
<?php

 ?>
        <!-- ========================  Main header ======================== -->

        <section class="main-header" style="background-image:url(assets/butcher/images/gallery-2.jpg)">
            <header>
                <div class="container text-center">
                    <h2 class="h2 title">Checkout : Delivery</h2>
                    <ol class="breadcrumb breadcrumb-inverted">
                        <li><a href="index.html"><span class="icon icon-home"></span></a></li>
                        <li><a href="checkout-1.html">Cart items</a></li>
                        <li><a class="active" href="checkout-2.html">Delivery</a></li>
                        <li><a href="checkout-3.html">Payment</a></li>
                        <li><a href="checkout-4.html">Receipt</a></li>
                    </ol>
                </div>
            </header>
        </section>

        <!-- ========================  Checkout ======================== -->

        <section class="checkout">
            <div class="container">

                <header class="hidden">
                    <h3 class="h3 title">Checkout - Step 2</h3>
                </header>

                <!-- ========================  Cart navigation ======================== -->

                <div class="clearfix">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="checkout-1.html" style="font-weight:bold; color: white;" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Back to cart</a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="checkout-3.html" style="font-weight:bold; color: white;" class="btn lab-btn"><span class="icon icon-cart"></span> Go to payment</a>
                        </div>
                    </div>
                </div>

                <!-- ========================  Delivery ======================== -->

                <div class="section-wrapper">

                    <div class="note-block">
                        <div class="row">

                            <!-- === left content === -->

                            <div class="col-md-6">

                                <!-- === login-wrapper === -->

                                <div class="login-wrapper">

                                    <div class="white-block">

                                        <!--signin-->

                                        <div class="login-block login-block-signin">

                                            <div class="h4">Sign in <a href="javascript:void(0);" class="btn lab-btn btn-xs btn-register pull-right">create an account</a></div>

                                            <hr />

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" value="" class="form-control" placeholder="User ID">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="password" value="" class="form-control" placeholder="Password">
                                                    </div>
                                                </div>

                                                <div class="col-xs-6">
                                                    <span class="checkbox">
                                                        <input type="checkbox" id="checkBoxId3">
                                                        <label for="checkBoxId3">Remember me</label>
                                                    </span>
                                                </div>

                                                <div class="col-xs-6 text-right">
                                                    <a href="#" style="font-weight:bold; color: white;" class="btn lab-btn">Login</a>
                                                </div>
                                            </div>
                                        </div> <!--/signin-->
                                        <!--signup-->

                                        <div class="login-block login-block-signup">
                                            <div class="h4">Order Details</div>
                                            <hr />
                                            <input hidden type="number" name="is_customer" value="1">
                                            <div class="row">
                                                {{-- <form action="{{route('register_user')}}" method="POST">
                                                @csrf --}}
                                                <form id="distance_form">
                                                <input hidden type="number" name="is_customer" value="1">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input disabled name="first_name" type="text" value="{{$first_name}}" class="form-control" placeholder="First name: *">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input disabled name="last_name" type="text" value="{{$last_name}}" class="form-control" placeholder="Last name: *">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" id="from_places" placeholder="Enter Origin"/>
                                                        <input id="origin" name="origin" required="" type="hidden" value="53 Gie Road, West Riding, Cape Town"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >Phone Number</label>
                                                        <input disabled id="to_places" name="to_places" value="" class="form-control" placeholder="Enter a Phone Number: *">
                                                        <input id="destination" type="hidden" name="destination">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label >Delivering To</label>
                                                        <input disabled id="to_places" name="to_places" value="{{$deliveryAddress}}" class="form-control" placeholder="Enter a Location: *">
                                                        <input id="destination" type="hidden" name="destination">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label >Additional Instructions</label>
                                                        <textarea disabled id="note" name="note" value="" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    {{-- <button type="submit" class="btn lab-btn btn-block">Create account</button> --}}
                                                    <input type="submit" class="btn lab-btn" style="font-weight:bold; color: white;" value="Add Instructions" class="btn btn-primary">
                                                </div>
                                                </form>
                                            </div>
                                        </div> <!--/signup-->
                                    </div>
                                </div> <!--/login-wrapper-->
                            </div> <!--/col-md-6-->
                            <!-- === right content === -->

                            <div class="col-md-6">

                                <div class="white-block">
                                    <div class="h4">Important to note</div>
                                    <hr />
                                    {{-- <span class="checkbox">
                                        <input type="radio" id="deliveryId1" name="deliveryOption">
                                        <label for="deliveryId1">Delivery 1-3 Days - <strong>$50,00</strong></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" id="deliveryId2" name="deliveryOption">
                                        <label for="deliveryId2">Fast delivery - <strong>$199,00</strong></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" id="deliveryId3" name="deliveryOption">
                                        <label for="deliveryId3">Pick up in the store - <strong>Free</strong></label>
                                    </span>
                                    <hr /> --}}

                                    <div class="clearfix">
                                        <ul>
                                            <li>Free Delivery is awarded if your purchase is more than R300 and the delivery address falls within a 10km radius from our store</li>
                                            <li>A delivery fee is charged your delivery location exceeds 10km from our store</li>
                                            <li>We do not deliver to an address that is outside a 25km radius from our store. Customers will have to collect their order from our store</li>
                                        </ul>
                                        <p><strong>Challenges:</strong></p>
                                        <ul>
                                            <li>Deliveries will only be done between 08:00AM and 06:00PM during week days</li>
                                            <li>On Saturdays, deliveries will done between 08:00AM and 03:00PM</li>
                                            <li>There will be no deliveries on Sundays and Public Holidays</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- ========================  Cart wrapper ======================== -->

                <div class="cart-wrapper">
                    <!--cart header -->

                    <div class="cart-block cart-block-header clearfix">
                        <div>
                            <span>Product</span>
                        </div>
                        <div>
                            <span>&nbsp;</span>
                        </div>
                        <div>
                            <span>Quantity</span>
                        </div>
                        <div class="text-right">
                            <span>Price</span>
                        </div>
                    </div>

                    <!--cart items-->

                    @if($cart)
                    @foreach($cart as $cartItem)
                    <div class="clearfix">
                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="{{asset('assets/butcher/images/product-3.png')}}" alt="" /></a>
                            </div>
                            <div class="title">
                                <div class="h4"><a href="product.html">{{$cartItem->name}}</a></div>
                                <div>{{$cartItem->name}}</div>
                            </div>
                            <div class="quantity">
                                <strong>{{$cartItem->qty}}</strong>
                            </div>
                            <div class="price">
                                <span class="final h3">{{$cartItem->subtotal}} <span><small>// Include discount</small></span></span>
                                <span class="discount">{{$cartItem->subtotal}} // Price before discount</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                    <!--cart prices -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Discount 15%</strong>
                            </div>
                            <div>
                                @if($discount)
                                <span>R {{$discount}}</span>
                                @else
                                <span>R 0.00</span>
                                @endif
                            </div>
                        </div>

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Delivery</strong>
                            </div>
                            <div>
                                @if($deliveryFee)
                                <span>{{$deliveryFee}}</span>
                                @else
                                <span>R 0,00</span>
                                @endif
                            </div>
                        </div>

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>VAT</strong>
                            </div>
                            <div>
                                <span>R {{$tax}}</span>
                            </div>
                        </div>
                    </div>

                    <!--cart final price -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Promo code included!</strong>
                            </div>
                            <div>
                                {{-- <div class="h2 title">R {{$subtotal}}</div> --}}
                                <div class="h2 title">R {{$total}}</div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ========================  Cart navigation ======================== -->

                <div class="clearfix">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="checkout-1.html" style="font-weight:bold; color: white;" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Back to cart</a>
                        </div>
    
    {{-- Payfast Form --}}
    <div class="col-xs-6 text-right">
        <form action="https://sandbox.payfast.co.za/eng/process" method="POST">
            @csrf

            {{-- Merchant Details --}}
            <input type="hidden" name="merchant_id" value="10028272">
            <input type="hidden" name="merchant_key" value="abonw8bat2nsd">
            <input type="hidden" name="return_url" value="https://www.example.com/success">
            <input type="hidden" name="cancel_url" value="https://www.example.com/cancel">
            <input type="hidden" name="notify_url" value="https://www.example.com/notify">

            {{-- Customer Details --}}
            <input type="hidden" name="name_first" value="{{$first_name}}">
            <input type="hidden" name="name_last" value="{{$last_name}}">
            <input type="hidden" name="email_address" value="{{$email}}">
            <input type="hidden" name="cell_number" value="{{$phone}}"> 

            {{-- Transaction Details --}}
            <input type="hidden" name="m_payment_id" value="01AB">
            <input type="hidden" name="amount" value="{{$total}}">
            <input type="hidden" name="item_name" value="{{$orderSID}}">
            <input type="hidden" name="item_description" value="{{$orderSID}}">
            <input type="hidden" name="custom_int1" value="2">
            <input type="hidden" name="custom_str1" value="{{$deliveryFee}}">

            {{-- Transaction Options --}}
            <input type="hidden" name="email_confirmation" value="1">
            {{-- <input type="hidden" name="confirmation_address" value="lmakwavarara@rocketmail.com">  --}}

            {{-- Payment Option --}}
            <input type="hidden" name="payment_method" value="cc">

            {{-- Security Signature --}}
            <input type="hidden" name="signature" value=""> 
            
    
            <button type="submit" style="font-weight:bold; color: white;" class="btn lab-btn"><span class="icon icon-cart"></span> Go to payment</button>
        </form>
    </div>
    {{-- End of Payfast Form --}}
                    </div>
                </div>


            </div> <!--/container-->

        </section>


               
<!--/wrapper-->


    <!--JS files-->
