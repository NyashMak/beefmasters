@extends('shop_front.layouts.app')
@section('body')      
        <!-- Page Header Section Start Here -->
        <section class="page-header bg_img padding-tb" style="background-image: url(assets/butcher/images/banner/bg-images/bm_banner_01.png);">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-header-content-area">
                    <h4 class="ph-title">All Products</h4>
                </div>
            </div>
        </section>
        <!-- Page Header Section Ending Here -->
		
        <!-- shop page Section Start Here -->
        <div class="shop-page padding-tb">
            <div class="container" style="background-color: white;">
                <div class="section-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-12">
                            <article>
                                <div class="shop-title d-flex flex-wrap justify-content-between">
                                    <p>Showing 01 - 12 of 139 Results</p>
                                    <div class="product-view-mode">
                                        <a class="active" data-target="grids"><i class="icofont-ghost"></i></a>
                                        <a data-target="lists"><i class="icofont-listing-box"></i></a>
                                    </div>
                                </div>

                                <div class="shop-product-wrap grids row justify-content-center">
                                    @if($products)
                                    @foreach($products as $product)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <img src="{{asset('assets/butcher/images/product/02.jpg')}}" alt="shope">
                                                <div class="product-action-link">
                                                    <a href="" data-rel="lightcase"><i class="icofont-eye"></i></a>
                                                    <a href="#"><i class="icofont-heart-alt"></i></a>
                                                    <a href="{{route('shop.show', $product->id)}}"><i class="icofont-cart-alt"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h6><a href="#">{{$product->name}}</a></h6>
                                                <h6>R{{$product->price}}</h6>
                                            </div>
                                        </div>
                                        <div class="product-list-item">
                                            <div class="product-thumb">
                                                <img src="{{asset('assets/butcher/images/product/02.jpg')}}" alt="shope">
                                                <div class="product-action-link">
                                                    <a href="{{asset('assets/butcher/images/product/02.jpg')}}" data-rel="lightcase"><i class="icofont-eye"></i></a>
                                                    <a href="#"><i class="icofont-heart-alt"></i></a>
                                                    <a href="{{route('shop.show', $product->id)}}"><i class="icofont-cart-alt"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h6><a href="{{route('shop.show', $product->id)}}">{{$product->name}}</a></h6>
                                                <h6>
                                                    R{{$product->price}}
                                                </h6>
                                                <p>
                                                    {{$product->description}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                        <div>No Products available</div>
                                    @endif
                                </div>
                                
                                <div class="paginations">
                                    <ul class="lab-ul d-flex flex-wrap justify-content-center">
                                        <li>
                                            <a href="#">1</a>
                                        </li>
                                        <li class="d-none d-sm-block">
                                            <a href="#">2</a>
                                        </li>
                                        <li class="d-none d-sm-block">
                                            <a href="#">3</a>
                                        </li>
                                        <li>
                                            <a class="dot">...</a>
                                        </li>
                                        <li class="d-none d-sm-block">
                                            <a href="#">9</a>
                                        </li>
                                        <li class="d-none d-sm-block">
                                            <a href="#">10</a>
                                        </li>
                                        <li>
                                            <a href="#">11</a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <div class="col-lg-3 col-md-7 col-12">
                            <aside>
                                <div class="widget widget-search">
                                    <div class="widget-header">
                                        <h5>Search keywords</h5>
                                    </div>
                                    <form action="/" class="search-wrapper">
                                        <input type="text" name="s" placeholder="Your Search...">
                                        <button type="submit"><i class="icofont-search-2"></i></button>
                                    </form>
                                </div>

                                <div class="widget widget-category">
                                    <div class="widget-header">
                                        <h5>All Categories</h5>
                                    </div>
                                    <div class="widget-wrapper">
                                        <ul class="lab-ul shop-menu">   
                                            @if($categories)      
                                                @foreach($categories as $category)                                  
                                                <li><a href="#0">{{$category->name}}</a>
                                                    <ul class="lab-ul shop-submenu">
                                                        @if($products)
                                                            @foreach($products as $product)
                                                                @if($product->category_id == $category->id)
                                                                <li><a href="#">{{$product->name}}</a></li>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </li>
                                                @endforeach
                                            @endif
                                            
                                        </ul>
                                    </div>
                                </div>
            
                                <div class="widget widget-post">
                                    <div class="widget-header">
                                        <h5>Latests Products</h5>
                                    </div>
                                    <ul class="lab-ul widget-wrapper">
                                        <li class="d-flex flex-wrap justify-content-between">
                                            <div class="post-thumb">
                                                <a href="blog-single.html"><img src="{{('assets/butcher/images/product/01.jpg')}}" alt="product"></a>
                                            </div>
                                            <div class="post-content">
												<a href="blog-single.html"><h6>Conveniently utilize premier metho.</h6></a>
                                                <p>04 February 2019</p>
                                            </div>
										</li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop page Section ENding Here -->
@endsection
