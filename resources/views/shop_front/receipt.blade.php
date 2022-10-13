@extends('shop_front.layouts.app')
@section('body')
        <!-- ========================  Main header ======================== -->

        <section class="main-header" style="background-image:url(assets/butcher/images/gallery-2.jpg)">
            <header>
                <div class="container text-center">
                    <h2 class="h2 title">Checkout</h2>
                    <ol class="breadcrumb breadcrumb-inverted">
                        <li><a href="index.html"><span class="icon icon-home"></span></a></li>
                        <li><a href="checkout-1.html">Cart items</a></li>
                        <li><a href="checkout-2.html">Delivery</a></li>
                        <li><a href="checkout-3.html">Payment</a></li>
                        <li><a class="active" href="checkout-4.html">Receipt</a></li>
                    </ol>
                </div>
            </header>
        </section>

        <!-- ========================  Checkout ======================== -->

        <section class="checkout">
            <div class="container">

                <header class="hidden">
                    <h3 class="h3 title">Checkout - Step 4</h3>
                </header>

                <!-- ========================  Cart navigation ======================== -->

                <div class="clearfix">
                    <div class="row">
                        <div class="col-xs-6">
                            <span class="h2 title">Your order is completed!</span>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a onclick="window.print()" class="btn lab-btn"><span class="icon icon-printer"></span> Print</a>
                        </div>
                    </div>
                </div>

                <!-- ========================  Payment ======================== -->

                <div class="cart-wrapper">

                    <div class="note-block">

                        <div class="row">
                            <!-- === left content === -->

                            <div class="col-md-6">

                                <div class="white-block">

                                    <div class="h4">Shipping info</div>

                                    <hr />

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Name</strong> <br />
                                                <span>John Doe</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Email</strong><br />
                                                <span>johndoe@company.com</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Phone</strong><br />
                                                <span>+122 523 352</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Zip</strong><br />
                                                <span>94107</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>City</strong><br />
                                                <span>San Francisco, California</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Address</strong><br />
                                                <span>795 Folsom Ave, Suite 600</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Company name</strong><br />
                                                <span>Mobel Inc</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Company phone</strong><br />
                                                <span>+122 333 6665</span>
                                            </div>
                                        </div>

                                    </div>

                                </div> <!--/col-md-6-->

                            </div>

                            <!-- === right content === -->

                            <div class="col-md-6">
                                <div class="white-block">

                                    <div class="h4">Order details</div>

                                    <hr />

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Order no.</strong> <br />
                                                <span>52522-63259226</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Transaction ID</strong> <br />
                                                <span>2265996</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Order date</strong> <br />
                                                <span>06/30/2017</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Shipping arrival</strong> <br />
                                                <span>07/30/2017</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="h4">Payment details</div>

                                    <hr />

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Transaction time</strong> <br />
                                                <span>06/30/2017 at 00:59</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Amount</strong><br />
                                                <span>$ 1259,00</span>
                                            </div>
                                        </div>

                                        

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Cart details</strong><br />
                                                <span>**** **** **** 5446</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>Items in cart</strong><br />
                                                <span>4</span>
                                            </div>
                                        </div>

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

                    <div class="clearfix">
                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="assets/butcher/images/product-1.png" alt="" /></a>
                            </div>
                            <div class="title">
                                <div class="h4"><a href="product.html">Green corner</a></div>
                                <div>Green corner</div>
                            </div>
                            <div class="quantity">
                                <strong>1</strong>
                            </div>
                            <div class="price">
                                <span class="final h3">$ 1.998</span>
                                <span class="discount">$ 2.666</span>
                            </div>
                        </div>

                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="assets/butcher/images/product-2.png" alt="" /></a>
                            </div>
                            <div class="title">
                                <div class="h4"><a href="product.html">Green corner</a></div>
                                <div>Green corner</div>
                            </div>
                            <div class="quantity">
                                <strong>1</strong>
                            </div>
                            <div class="price">
                                <span class="final h3">$ 1.998</span>
                                <span class="discount">$ 2.666</span>
                            </div>
                        </div>

                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="assets/butcher/images/product-3.png" alt="" /></a>
                            </div>
                            <div class="title">
                                <div class="h4"><a href="product.html">Green corner</a></div>
                                <div>Green corner</div>
                            </div>
                            <div class="quantity">
                                <strong>1</strong>
                            </div>
                            <div class="price">
                                <span class="final h3">$ 1.998</span>
                                <span class="discount">$ 2.666</span>
                            </div>
                        </div>

                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="assets/butcher/images/product-3.png" alt="" /></a>
                            </div>
                            <div class="title">
                                <div class="h4"><a href="product.html">Green corner</a></div>
                                <div>Green corner</div>
                            </div>
                            <div class="quantity">
                                <strong>1</strong>
                            </div>
                            <div class="price">
                                <span class="final h3">$ 1.998</span>
                                <span class="discount">$ 2.666</span>
                            </div>
                        </div>
                    </div>

                    <!--cart prices -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Discount 15%</strong>
                            </div>
                            <div>
                                <span>$ 159,00</span>
                            </div>
                        </div>

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Shipping</strong>
                            </div>
                            <div>
                                <span>$ 30,00</span>
                            </div>
                        </div>

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>VAT</strong>
                            </div>
                            <div>
                                <span>$ 59,00</span>
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
                                <div class="h2 title">$ 1259,00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================  Cart navigation ======================== -->

                <div class="clearfix">
                    <div class="row">
                        <div class="col-xs-6">
                            <span class="h2 title">Your order is completed!</span>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a onclick="window.print()" class="btn lab-btn"><span class="icon icon-printer"></span> Print</a>
                        </div>
                    </div>
                </div>

            </div> <!--/container-->

        </section>
@endsection