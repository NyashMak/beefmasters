		<!--search area-->
		<div class="search-input">
			<div class="search-close">
				<i class="icofont-close-circled"></i>
			</div>
			<form>
				<input type="text" name="text" placeholder="Search Heare">
				<button class="search-btn" type="submit">
					<i class="icofont-search-2"></i>
				</button>
			</form>
		</div>
		<!-- search area -->
		
		<!-- Mobile Menu Start Here -->
		<div class="mobile-menu transparent-header">
			<nav class="mobile-header">
				<div class="header-logo">
					<a href="index.html"><img src="{{asset('assets/butcher/images/logo/01.png')}}" alt="logo"></a>
				</div>
				<div class="header-bar">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</nav>
			<nav class="mobile-menu">
				<div class="mobile-menu-area">
					<div class="mobile-menu-area-inner">
						<ul class="lab-ul">
							<li class="active">
								<a href="{{route('home')}}">Home</a>
							</li>
							<li><a href="{{route('about')}}">About</a></li>
							<li>
								<a href="#">Pages</a>
								<ul class="lab-ul">
									<li><a href="team.html">Team Membar</a></li>
									<li><a href="faq-page.html">Faq Page</a></li>
									<li><a href="404.html">404 Page</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Blog</a>
								<ul class="lab-ul">
									<li><a href="blog.html">Blog Right Sidebar</a></li>
									<li><a href="blog-ls.html">Blog left Sidebar</a></li>
									<li><a href="blog-single.html">Blog Details</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Shop</a>
								<ul class="lab-ul">
									<li><a href="product-page.html">Products Page</a></li>
									<li><a href="product-single.html">Products Details</a></li>
									<li><a href="cart-page.html">Cart Page</a></li>
								</ul>
							</li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<!-- Mobile Menu Ending Here -->

		<!-- desktop menu start here -->
		<header class="header-section transparent-header">
			<div class="header-bottom">
				<div class="header-area">
					<div class="container">
						<div class="primary-menu">
							<div class="main-area w-100">
								<div class="main-menu d-flex flex-wrap align-items-center justify-content-center w-100">
									<ul class="lab-ul">
										<li class="active">
											<a href="{{route('home')}}">Home</a>
										</li>
										<li><a href="{{route('about')}}">About</a></li>
									</ul>
									<div class="logo px-4" >
										<a href="index.html"><img src="{{asset('assets/butcher/images/logo/')}}" alt="logo"></a>
									</div>
									<ul class="lab-ul">
										<li>
											<a href="{{route('shop.index')}}">Shop</a>
										</li>
										<li><a href="{{route('contact')}}">Contact</a></li>
									</ul>
									<ul class="lab-ul search-cart">
										<li>
											<div class="cart-option">
												<i class="icofont-cart-alt"></i>
												<div class="cart-content">
													@if($cart)
														@foreach($cart as $cartItem)													
														<div class="cart-item">
															<div class="cart-img">
																<a href="#"><img src="{{asset('assets/butcher/images/shop/01.jpg')}}" alt="cart"></a>
															</div>
															<div class="cart-des">
																<a href="#">{{$cartItem->name}}</a>
																<p>R {{$cartItem->price}} <span><small style="color: brown">subtotal: R{{$cartItem->price*$cartItem->qty}}</small></span></p>
															</div>
															<div class="cart-btn">
																<a href="#"><i class="icofont-close-circled"></i></a>
															</div>
														</div>
														@endforeach
													@else
													<div class="cart-item">
														<p>Cart Empty</p>
													</div>
													@endif
													<div class="cart-bottom">														
														<div class="cartsubtotal">
															@isset($subtotal)
															<p>Total: <b class="float-right">R {{$subtotal}}</b></p>
															@else
															<p>Total: <b class="float-right">R 0.00</b></p>
															@endif
															<div class="cart-action">
															</div>
															<a href="{{route('view-cart')}}" class="lab-btn"><span>View Cart</span></a>
															<a href="#" class="lab-btn"><span>Check Out</span></a>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="search-option">
												<i class="icofont-search-2"></i>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
        <!-- desktop menu ending here -->
