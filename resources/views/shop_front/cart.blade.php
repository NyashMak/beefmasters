@extends('shop_front.layouts.app')
@section('body')
        <!-- Page Header Section Start Here -->
        <section class="page-header bg_img padding-tb">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-header-content-area">
                    <h4 class="ph-title">Beef Masters' Shopping Cart</h4>
                </div>
            </div>
        </section>
        <!-- Page Header Section Ending Here -->
		
        <!-- Shop Cart Page Section start here -->		            
	    <div class="shop-cart padding-tb pb-0">
            <div class="container">
                <div class="section-wrapper">
                   @livewire('products-table')
                    <div class="cart-bottom">

                        <div class="shiping-box">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="calculate-shiping">
                                        <h4>Calculate Delivery</h4>
                                        <form id="distance_form">
                                            <div class="outline-select">
                                                    <input type="hidden" class="form-control" id="from_places" placeholder="Enter Origin"/>
                                                    <input id="origin" name="origin" required="" type="hidden" value="53 Gie Road, West Riding, Cape Town"/>
                                                    <br>
                                            </div> <br>
                                            <div class="outline-select">
                                                <label>Enter destination to see if you qaulify for free delivery</label>
                                                <input class="form-control" id="to_places" placeholder="Enter Destination"/>
                                                <input id="destination" name="destination" required="" type="hidden"/><br>
                                                <button onclick="getCurrentPosition()">Set Current Location</button>
                                            </div><br>
                                            <div>
                                            <input type="hidden" class="form-control" id="travel_mode" name="travel_mode" value="DRIVING"/>
                                            </div>
                                            <input value="Find" type="submit" class="lab-btn" style="border: none; border-radius: 5px; color: white;"/>
                                        </form>
                                    </div>
                                    <div class="row" style="padding-top: 20px;">
                                        <div class="container">
                                           <p id="in_mile"></p>
                                           <p id="in_kilo"></p>
                                           <p id="duration_text"></p>
                                        </div>
                                     </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="cart-overview"><h4>Cart Totals</h4>
                                        <form method="POST" action="{{route('update-cart')}}">
                                            @csrf
                                            <ul>
                                                <li>
                                                    <span class="pull-left">Cart Subtotal</span>
                                                    <p id="subtotal" class="pull-right"> {{$subtotal}}</p>
                                                </li>
                                                <li>
                                                    <span class="pull-left">Delivery</span>
                                                    <input type="hidden" id="delivery" name="delivery" style="border: none" class="pull-right"/>
                                                    @isset($_GET['delivery']){
                                                        <input id="show_delivery" name="show_delivery" style="border: none"  class="pull-right"/>
                                                    }
                                                    @else
                                                        <input id="show_delivery" name="show_delivery" style="border: none" value="Enter Destination First" class="pull-right"/>
                                                    
                                                    @endif
                                                </li>
                                                <li>
                                                    <span class="pull-left">Order Total</span>
                                                    <p class="pull-right">R {{$total}}</p>
                                                </li>
                                            </ul>
                                            <input style="margin-top: 30px; border: none; border-radius: 5px; color: white;" class="lab-btn" type="submit" value="Update Cart">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="cart-checkout-box">
                            <form class="cart-checkout">
                                @csrf
                                <input type="submit" value="Update Cart">
                            </form>
                            <form method="GET" action="{{route('checkout')}}" class="cart-checkout">
                                <input type="submit" value="Proceed to Checkout">
                            </form>
                        </div>
                        <div class="cart-checkout-box">
                            <form action="/" class="coupon">
                                <input type="submit" value="Apply Coupon">
                                <input type="text" name="coupon" placeholder="Coupon Code..." class="cart-page-input-text">
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Cart Page Section ending here -->
@endsection