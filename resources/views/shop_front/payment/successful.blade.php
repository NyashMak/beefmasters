<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>BeefMasters</title>

    <meta name="description" content="BeefMasters">
    <meta name="author" content="Wellprune Digital">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="BeefMasters">
    <meta property="og:site_name" content="BeefMasters">
    <meta property="og:description" content="BeefMasters Butchery">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('assets/admin/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/admin/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/admin/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="{{asset('assets/admin/css/dashmix.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
  </head>
  <body>
    <div id="page-container">

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="row g-0 justify-content-center bg-body-dark">
          <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
            <!-- Sign In Block -->
            <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" style="background-image: url({{asset('assets/admin/media/photos/photo20@2x.jpg')}});">
              <div class="row g-0">
                <div class="col-md-12 order-md-1 bg-body-extra-light">
                  <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                    <!-- Header -->
                    <div class="mb-2 text-center">
                      <a class="link-fx fw-bold fs-1" href="index.html">
                        <span style="color: brown">Congratulations {{Auth::user()->name}}!!!</span>
                      </a>
                      <p class="text-uppercase fw-bold fs-sm text-muted">We have recieved your order.</p>
                    </div>
                    <!-- END Header -->

                    <div>
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
                      
                    </div>

                    {{-- <form  action="{{route('login-user')}}" method="POST">
                      @csrf --}}
                      <div class="mb-4">
                        <label for="total">Order Number</label>
                        <input disabled type="text" class="form-control form-control-alt" id="order_nr" name="order_nr" value="{{$order_nr}}">
                        {{-- <input disabled style="border:none;" type="text" class="form-control form-control-alt" id="order_nr" name="order_nr" value=""> --}}
                      </div>
                      <div class="mb-4">
                        <label for="total">Amount Paid</label>
                        <input disabled type="text" class="form-control form-control-alt" id="order_nr" name="order_nr" value="R {{$total}}">
                        {{-- <input disabled style="border:none;" type="text" class="form-control form-control-alt" id="total" name="total" value=""> --}}
                      </div>
                      <div class="mb-4">
                        <p>For any further information please email us <span style="color: blue;">admin@beefmasters</span> or call/whatsapp on +27655446578</p>
                      </div>
                      <div class="mb-4">
                        <a href="{{route('home')}}">
                        <button class="btn w-100 btn-hero btn-success">
                            <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Back To Shop
                        </button>
                        </a>
                      </div>
                    {{-- </form> --}}
                    <!-- END Sign In Form -->
                  </div>
                </div>
                </div>
              </div>
            </div>
            <!-- END Sign In Block -->
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
      Dashmix JS
    
      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{asset('assets/admin/js/dashmix.app.min.js')}}"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="{{asset('assets/admin/js/lib/jquery.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('assets/admin/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('assets/admin/js/pages/op_auth_signin.min.js')}}"></script>
  </body>
</html>
