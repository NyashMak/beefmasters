<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Beef Masters</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Mobile Web-app fullscreen -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
	
		<!-- Meta tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/butcher/images/x-icon/01.png')}}">

		<link rel="stylesheet" href="{{asset('assets/butcher/css/animate.css')}}">
		<link rel="stylesheet" href="{{asset('assets/butcher/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/butcher/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/butcher/css/icofont.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/butcher/css/lightcase.css')}}">
		<link rel="stylesheet" href="{{asset('assets/butcher/css/swiper.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/butcher/css/style.css')}}">

		<link rel="icon" href="favicon.ico">

    <!--CSS styles-->
    <link rel="stylesheet" media="all" href="{{asset('assets/butcher/css/bootstrap.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/butcher/css/animate.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/butcher/css/font-awesome.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/butcher/css/furniture-icons.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/butcher/css/linear-icons.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/butcher/css/magnific-popup.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/butcher/css/owl.carousel.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/butcher/css/ion-range-slider.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/butcher/css/theme.css')}}" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

	@livewireStyles

	</head>

	<body>

		<!-- scrollToBottom start here -->
		{{-- <a href="#" class="scrollToBottom"><i class="icofont-swoosh-down"></i><span class="pluse_1"></span><span class="pluse_2"></span></a> --}}
		<!-- scrollToBottom ending here -->
		
		@include('shop_front.layouts.navbar')
        @yield('body')

		@include('shop_front.layouts.footer')

		<!-- scrollToTop start here -->
		<a href="#" class="scrollToTop"><i class="icofont-swoosh-up"></i><span class="pluse_1"></span><span class="pluse_2"></span></a>
		<!-- scrollToTop ending here -->

		
		<script src="{{asset('assets/butcher/js/jquery.js')}}"></script>
		<script src="{{asset('assets/butcher/js/fontawesome.min.js')}}"></script>
		<script src="{{asset('assets/butcher/js/waypoints.min.js')}}"></script>
		<script src="{{asset('assets/butcher/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/butcher/js/wow.min.js')}}"></script>
		<script src="{{asset('assets/butcher/js/swiper.min.js')}}"></script>
		<script src="{{asset('assets/butcher/js/jquery.countdown.min.js')}}"></script>
		<script src="{{asset('assets/butcher/js/jquery.counterup.min.js')}}"></script>
		<script src="{{asset('assets/butcher/js/isotope.pkgd.min.js')}}"></script>
		<script src="{{asset('assets/butcher/js/lightcase.js')}}"></script>
        <script src="{{asset('assets/butcher/js/functions.js')}}"></script>

		<script src="{{asset('assets/butcher/js/jquery.min.js')}}"></script>
		<script src="{{asset('assets/butcher/js/jquery.bootstrap.js')}}"></script>
		<script src="{{asset('assets/butcher/js/jquery.magnific-popup.js')}}"></script>
		<script src="{{asset('assets/butcher/js/jquery.owl.carousel.js')}}"></script>
		<script src="{{asset('assets/butcher/js/jquery.ion.rangeSlider.js')}}"></script>
		<script src="{{asset('assets/butcher/js/jquery.isotope.pkgd.js')}}"></script>
		<script src="{{asset('assets/butcher/js/main.js')}}"></script>

		<script type="text/javascript">
			
		</script>

		@livewireScripts
	</body>
</html>