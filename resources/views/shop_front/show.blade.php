@extends('shop_front.layouts.app')
@section('body')    
<style>
    .cart-weight{
    width: 90%;
    height: 38px;
    border: 1px solid #f0f0f0;
    color: #716c80;
    outline: none;
    -webkit-appearance: none;
    z-index: 1;
    background: transparent;
    padding-left: 20px;
    margin-bottom: 20px;
    font-size: 14px;
    }
</style>

        <!-- Page Header Section Start Here -->
        <section class="page-header bg_img padding-tb" style="background-image: url({{asset('assets/butcher/images/banner/bg-images/bm_banner_01.png')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-header-content-area">
                    <h4 class="ph-title">{{$product->name}}</h4>
                </div>
            </div>
        </section>
        <!-- Page Header Section Ending Here -->
		
		<!-- Shop Page Section start here -->		            
        <section class="shop-single padding-tb pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-12 sticky-widget">
                        <div class="product-details" style="background-color: white;">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12">
                                    <div class="product-thumb">
                                        <div class="swiper-container gallery-top">
                                            <div class="swiper-wrapper">
                                                {{-- Loop of pictures to start here --}}
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img src="{{asset('assets/butcher/images/product/single/top/01.png')}}" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img src="{{asset('assets/butcher/images/product/single/top/01.png')}}" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="shop-navigation d-flex flex-wrap">
                                                <div class="shop-nav shop-slider-prev"><i class="icofont-simple-left"></i></div>
                                                <div class="shop-nav shop-slider-next"><i class="icofont-simple-right"></i></div>
                                            </div>
                                        </div>
                                        <div class="swiper-container gallery-thumbs">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img src="{{asset('assets/butcher/images/product/01.jpg')}}" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img src="{{asset('assets/butcher/images/product/02.jpg')}}" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="post-content">
                                        <h4>{{$product->name}}</h4>
                                        <p class="rating">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            (3 review)
                                        </p>
                                        <h4>
                                            R{{$product->price}} /kg
                                        </h4>
                                        <h5>
                                            Product Description
                                        </h5>
                                        <p>
                                            {{$product->description}}
                                        </p>
                                        <form method="GET" action="{{route('cart')}}">
                                            <input hidden type="number" name="product_id" value="{{$product->id}}">
                                            <input hidden type="number" name="price" value="{{$product->price}}">
                                            <div>
                                                <label for="weight">Weight</label>
                                                <input class="cart-weight" type="number" name="weight" value="" placeholder="kg/s">                                  
                                            </div>
                                            
                                            <div class="cart-plus-minus">                                                
                                                <div class="dec qtybutton">-</div>
                                                <input class="cart-plus-minus-box" type="number" name="quantity" value="1" >
                                                <div class="inc qtybutton">+</div>
                                            </div>
                    
                                            <div class="discount-code">
                                                <label for="">Discount Code</label>
                                                <input type="text" name="discount_code" placeholder="Enter Discount Code">
                                            </div>
                                            <button type="submit">Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review">
                            <ul class="agri-ul review-nav">
                                <li class="desc" data-target="description-show">Description</li>
                                <li class="rev active" data-target="review-content-show">Reviews 4</li>
                            </ul>
                            <div class="review-content review-content-show">
                                <div class="review-showing">
                                    <ul class="agri-ul content">
                                        <li style="background-color: white;">
                                            <div class="post-thumb">
                                                <img src="{{asset('assets/butcher/images/team/01.jpg')}}" alt="shop">
                                            </div>
                                            <div class="post-content">
                                                <div class="entry-meta">
                                                    <div class="posted-on">
                                                        <a href="#">Britney Doe</a>
                                                        <p>Posted on December 25, 2017 at 6:57 am</p>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="entry-content">
                                                    <p>Enthusiast build innovativ initiatives before lonterm high-impact awesome theme seo psd porta monetize covalent leadership after without resource.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li style="background-color: white;">
                                            <div class="post-thumb">
                                                <img src="{{asset('assets/butcher/images/team/02.jpg')}}" alt="shop">
                                            </div>
                                            <div class="post-content">
                                                <div class="entry-meta">
                                                    <div class="posted-on">
                                                        <a href="#">Jonathan Doe</a>
                                                        <p>Posted on December 25, 2017 at 6:57 am</p>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="entry-content">
                                                    <p>Enthusiast build innovativ initiatives before lonterm high-impact awesome theme seo psd porta monetize covalent leadership after without resource.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li style="background-color: white;">
                                            <div class="post-thumb">
                                                <img src="{{asset('assets/butcher/images/team/03.jpg')}}" alt="shop">
                                            </div>
                                            <div class="post-content">
                                                <div class="entry-meta">
                                                    <div class="posted-on">
                                                        <a href="#">Mack Zucky</a>
                                                        <p>Posted on December 25, 2017 at 6:57 am</p>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="entry-content">
                                                    <p>Enthusiast build innovativ initiatives before lonterm high-impact awesome theme seo psd porta monetize covalent leadership after without resource.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li style="background-color: white;">
                                            <div class="post-thumb">
                                                <img src="{{asset('assets/butcher/images/team/04.jpg')}}" alt="shop">
                                            </div>
                                            <div class="post-content">
                                                <div class="entry-meta">
                                                    <div class="posted-on">
                                                        <a href="#">Jordi Albae</a>
                                                        <p>Posted on December 25, 2017 at 6:57 am</p>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="entry-content">
                                                    <p>Enthusiast build innovativ initiatives before lonterm high-impact awesome theme seo psd porta monetize covalent leadership after without resource.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="client-review" style="background-color: white;">
                                        <div class="review-form">
                                            <div class="review-title">
                                                <h5>Add a Review</h5>
                                            </div>
                                            <form action="action" class="row">
                                                <div class="col-md-4 col-12">
                                                    <input type="text" name="name" placeholder="Full Name">
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <input type="text" name="email" placeholder="Email Adress">
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="rating">
                                                        <span class="rating-title">Your Rating : </span>
                                                        <div class="rating">
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <textarea rows="8" placeholder="Type Here Message"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button class="defult-btn" type="submit">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <div class="post-item">
                                        <div class="post-thumb">
                                            <img src="{{asset('assets/butcher/images/product/01.jpg')}}" alt="shop">
                                        </div>
                                        <div class="post-content">
                                            <ul class="agri-ul">
                                                <li>
                                                    Donec non est at libero vulputate rutrum.
                                                </li>
                                                <li>
                                                    Morbi ornare lectus quis justo gravida semper.
                                                </li>
                                                <li>
                                                    Pellentesque aliquet, sem eget laoreet ultrices.
                                                </li>
                                                <li>
                                                    Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.
                                                </li>
                                                <li>
                                                    Donec a neque libero.
                                                </li>
                                                <li>
                                                    Pellentesque aliquet, sem eget laoreet ultrices.
                                                </li>
                                                <li>
                                                    Morbi ornare lectus quis justo gravida semper..
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Page Section ending here -->
        
@endsection