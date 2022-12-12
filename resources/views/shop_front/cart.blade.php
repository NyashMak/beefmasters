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
                    <div class="cart-top">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cartArray)
                                @foreach($cartArray as $cartItem)
                                <tr style="background-color: white;">
                                    <td class="product-item">
                                        <div class="p-thumb">
                                            <a href="#"><img src="assets/butcher/images/product/01.jpg" alt="product"></a>
                                        </div>
                                        <div class="p-content">
                                            <a href="#">{{$cartItem['name']}}</a>
                                        </div>
                                    </td>
                                    <td>{{$cartItem['price']}}</td>
                                    <td>
                                        <div class="cart-plus-minus">
                                            <div class="dec qtybutton">-</div>
                                            <input class="cart-plus-minus-box" type="text" name="quantity" value="{{$cartItem['qty']}}">
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                    </td>
                                    <td>{{$cartItem['subtotal']}}</td>
                                    <td>
                                        <a href="#"><img src="assets/butcher/images/del.png" alt="product"></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-bottom">
                        <div class="cart-checkout-box">
                            <form action="/" class="coupon">
                                <input type="text" name="coupon" placeholder="Coupon Code..." class="cart-page-input-text">
                                <input type="submit" value="Apply Coupon">
                            </form>
                            <form method="GET" action="{{route('checkout')}}" class="cart-checkout">
                                <input type="submit" value="Update Cart">
                                <input type="submit" value="Proceed to Checkout">
                            </form>
                        </div>
                        <div class="shiping-box">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="calculate-shiping">
                                        <h4>Calculate Shipping</h4>
                                        <div class="outline-select">
                                            <select>
                                                <option value="volvo">United Kingdom (UK)</option>
                                                <option value="saab">Bangladesh</option>
                                                <option value="saab">Pakisthan</option>
                                                <option value="saab">India</option>
                                                <option value="saab">Nepal</option>
                                            </select>
                                            <span class="select-icon"><i class="icofont-caret-down"></i></span>
                                        </div>
                                        <div class="outline-select shipping-select">
                                            <select>
                                                <option value="volvo">State/Country</option>
                                                <option value="saab">Dhaka</option>
                                                <option value="saab">Benkok</option>
                                                <option value="saab">Kolkata</option>
                                                <option value="saab">Kapasia</option>
                                            </select>
                                            <span class="select-icon"><i class="icofont-caret-down"></i></span>
                                        </div>
                                        <input type="text" name="coupon" placeholder="Postcode/ZIP" class="cart-page-input-text"/>	
                                        <button type="submit" class="lab-btn"><span>Update Total</span></button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="cart-overview">
                                        <h4>Cart Totals</h4>
                                        <ul>
                                            <li>
                                                <span class="pull-left">Cart Subtotal</span>
                                                <p class="pull-right">$ 0.00</p>
                                            </li>
                                            <li>
                                                <span class="pull-left">Shipping and Handling</span>
                                                <p class="pull-right">Free Shipping</p>
                                            </li>
                                            <li>
                                                <span class="pull-left">Order Total</span>
                                                <p class="pull-right">$ 2940.00</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Cart Page Section ending here -->
@endsection