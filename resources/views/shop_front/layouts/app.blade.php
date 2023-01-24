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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	{{-- <script defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE&region=za&libraries=places"></script> --}}

	<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiDGvDii1PsXu8eLpcssGsmlj_0PPbf4U&region=za&libraries=places"></script>

	

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

		<script >
			$(function () {
			var origin, destination, map;
	
			
			var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
	
			google.maps.event.addListener(from_places, 'place_changed', function () {
					var from_place = from_places.getPlace();
					var from_address = from_place.formatted_address;
					$('#origin').val(from_address);
					window.origin = from_address;
				});
	
			
			var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));
	
			google.maps.event.addListener(to_places, 'place_changed', function () {
					var to_place = to_places.getPlace();
					var to_address = to_place.formatted_address;
					$('#destination').val(to_address);
					$('#set_address').val(to_address);
					window.destination = to_address;
				});
	
	
			window.travel_mode = 'DRIVING';
			// var origin = from_address;
			// var destination = to_address;
	
	
			// init or load map
			function initMap() {
	
				var myLatLng = {
					lat: 20.5937,
					lng: 78.9629
				};
				map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: myLatLng,});
			}
	
			function setDestination() {
				var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
				var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));
	
				google.maps.event.addListener(from_places, 'place_changed', function () {
					var from_place = from_places.getPlace();
					var from_address = from_place.formatted_address;
					$('#origin').val(from_address);
				});
	
				google.maps.event.addListener(to_places, 'place_changed', function () {
					var to_place = to_places.getPlace();
					var to_address = to_place.formatted_address;
					$('#destination').val(to_address);
				});
			}
	
					// add input listeners
					google.maps.event.addDomListener(window, 'load', function (listener) {
				// setDestination();
				initMap();
			});
	
			function displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay) {
				directionsService.route({
					origin: origin,
					destination: destination,
					travelMode: travel_mode,
					avoidTolls: true
				}, function (response, status) {
					if (status === 'OK') {
						directionsDisplay.setMap(map);
						directionsDisplay.setDirections(response);
					} else {
						directionsDisplay.setMap(null);
						directionsDisplay.setDirections(null);
						alert('Could not display directions due to: ' + status);
					}
				});
			}
	
			// calculate distance , after finish send result to callback function
			function calculateDistance(travel_mode, origin, destination) {
	
				var DistanceMatrixService = new google.maps.DistanceMatrixService();
				DistanceMatrixService.getDistanceMatrix(
					{
						origins: [origin],
						destinations: [destination],
						travelMode: google.maps.TravelMode[travel_mode],
						unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
						// unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
						avoidHighways: false,
						avoidTolls: false
					}, save_results);
			}
	
			// save distance results
			function save_results(response, status) {
	
				if (status != google.maps.DistanceMatrixStatus.OK) {
					$('#result').html(err);
				} else {
					var origin = response.originAddresses[0];
					var destination = response.destinationAddresses[0];
					if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
						$('#result').html("Sorry , not available to use this travel mode between " + origin + " and " + destination);
					} else {
						var distance = response.rows[0].elements[0].distance;
						var duration = response.rows[0].elements[0].duration;
						var distance_in_kilo = distance.value / 1000; // the kilo meter
						var distance_in_mile = distance.value / 1609.34; // the mile
						var duration_text = duration.text;
						appendResults(distance_in_kilo, distance_in_mile, duration_text);
						sendAjaxRequest(origin, destination, distance_in_kilo, distance_in_mile, duration_text);
					}
				}
			}
	
			// append html results
			function appendResults(distance_in_kilo, distance_in_mile, duration_text) {
				$("#result").removeClass("hide");
				$('#in_mile').html(" Distance in Mile: <span class='badge badge-pill badge-secondary'>" + distance_in_mile.toFixed(2) + "</span>");
				$('#in_kilo').html("Distance in KM: <span class='badge badge-pill badge-secondary'>" + distance_in_kilo.toFixed(2) + "</span>");
				$('#duration_text').html("Duration: <span class='badge badge-pill badge-success'>" + duration_text + "</span>");

				var subtotal = document.getElementById('subtotal');
				var subtotalText = subtotal.textContent;
				var cleanAddress = document.getElementById('set_address');
				var set_address = cleanAddress.value;
				console.log(set_address);
				if (distance_in_kilo > 10 && distance_in_kilo < 25 && subtotalText > 300){
					var delivery = document.getElementById('delivery');
					var show_delivery = document.getElementById('show_delivery');
					var cartDeliveryFee = document.getElementById('cartDeliveryFee');
					var cartDeliveryAddress = document.getElementById('cartDeliveryAddress');

					cartDeliveryAddress.setAttribute('value', set_address);
					cartDeliveryFee.setAttribute('value', 150);
					delivery.setAttribute('value',150);
					show_delivery.setAttribute('value',150);
				}
				else if(distance_in_kilo < 10 && subtotalText < 300){
					var delivery = document.getElementById('delivery');
					var show_delivery = document.getElementById('show_delivery');
					var cartDeliveryFee = document.getElementById('cartDeliveryFee');
					var cartDeliveryAddress = document.getElementById('cartDeliveryAddress');

					cartDeliveryAddress.setAttribute('value', set_address);
					cartDeliveryFee.setAttribute('value', 'Collect in-store');
					delivery.setAttribute('value','Collect in-store');
					show_delivery.setAttribute('value','Collect in-store');
				}
				else if(distance_in_kilo < 10 && subtotalText > 300){
					var delivery = document.getElementById('delivery');
					var show_delivery = document.getElementById('show_delivery');
					var cartDeliveryFee = document.getElementById('cartDeliveryFee');
					var cartDeliveryAddress = document.getElementById('cartDeliveryAddress');

					cartDeliveryAddress.setAttribute('value', set_address);
					cartDeliveryFee.setAttribute('value', 'Free Delivery');
					delivery.setAttribute('value','Free Delivery');
					show_delivery.setAttribute('value','Free Delivery');
				}
				else if(distance_in_kilo > 10 && distance_in_kilo < 25 && subtotalText < 300){
					var delivery = document.getElementById('delivery');
					var show_delivery = document.getElementById('show_delivery');
					var cartDeliveryFee = document.getElementById('cartDeliveryFee');
					var cartDeliveryAddress = document.getElementById('cartDeliveryAddress');

					cartDeliveryAddress.setAttribute('value', set_address);
					cartDeliveryFee.setAttribute('value', 150);
					delivery.setAttribute('value',150);
					show_delivery.setAttribute('value',150);
				}
				else if(distance_in_kilo < 25 && subtotalText < 300){
					var delivery = document.getElementById('delivery');
					var show_delivery = document.getElementById('show_delivery');
					var cartDeliveryFee = document.getElementById('cartDeliveryFee');
					var cartDeliveryAddress = document.getElementById('cartDeliveryAddress');

					cartDeliveryAddress.setAttribute('value', set_address);
					cartDeliveryFee.setAttribute('value', 'Collect in-store');
					delivery.setAttribute('value','Collect in-store');
					show_delivery.setAttribute('value','Collect in-store');
				}
				else if(distance_in_kilo > 25){
					var delivery = document.getElementById('delivery');
					var show_delivery = document.getElementById('show_delivery');
					var cartDeliveryFee = document.getElementById('cartDeliveryFee');
					var cartDeliveryAddress = document.getElementById('cartDeliveryAddress');

					cartDeliveryAddress.setAttribute('value', set_address);
					cartDeliveryFee.setAttribute('value', 'Collect in-store');
					delivery.setAttribute('value','Collect in-store');
					show_delivery.setAttribute('value','Collect in-store');
				}
			}
	
			// send ajax request to save results in the database
	
	
			// on submit  display route ,append results and send calculateDistance to ajax request
			$('#distance_form').submit(function (e) {
				e.preventDefault();
				var origin = $('#origin').val();
				var destination = $('#destination').val();
				var travel_mode = $('#travel_mode').val();
				var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
				var directionsService = new google.maps.DirectionsService();
			   displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay);
				calculateDistance(travel_mode, origin, destination);
			});
	
		});
	
		// get current Position
		function getCurrentPosition() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(setCurrentPosition);
			} else {
				alert("Geolocation is not supported by this browser.")
			}
		}
	
		// get formatted address based on current position and set it to input
		function setCurrentPosition(pos) {
			var geocoder = new google.maps.Geocoder();
			var latlng = {lat: parseFloat(pos.coords.latitude), lng: parseFloat(pos.coords.longitude)};
			geocoder.geocode({ 'location' :latlng  }, function (responses) {
				console.log(responses);
				if (responses && responses.length > 0) {
					$("#origin").val(responses[1].formatted_address);
					$("#from_places").val(responses[1].formatted_address);
					//    console.log(responses[1].formatted_address);
				} else {
					alert("Cannot determine address at this location.")
				}
			});
		}
		  </script>

		@livewireScripts
	</body>
</html>