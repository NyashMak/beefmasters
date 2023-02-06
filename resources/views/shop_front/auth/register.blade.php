<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>BeefMasters</title>

    <meta name="description" content="BeefMasters">
    <meta name="author" content="Nyasha Makwavarara">
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
                <div class="col-md-8 order-md-1 bg-body-extra-light">
                  <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                    <!-- Header -->
                    <div class="mb-2 text-center">
                      <a class="link-fx fw-bold fs-1" href="index.html">
                        <span style="color: brown">BeefMasters</span>
                      </a>
                      <p class="text-uppercase fw-bold fs-sm text-muted">New Account</p>
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

                    <form  action="{{route('create-user')}}" method="POST">
                      @csrf
                      <div class="mb-4">
                        <input required type="text" class="form-control form-control-alt" id="first_name" name="first_name" placeholder="First Name">
                        <span class='text-danger'>@error('name') {{$message}}@enderror</span>
                      </div>
                      <div class="mb-4">
                        <input required type="text" class="form-control form-control-alt" id="last_name" name="last_name" placeholder="Last Name">
                        <span class='text-danger'>@error('name') {{$message}}@enderror</span>
                      </div>
                      <div class="mb-4">
                        <input required type="email" class="form-control form-control-alt" id="email" name="email" placeholder="Email">
                        <span class='text-danger'>@error('name') {{$message}}@enderror</span>
                      </div>
                      <div class="mb-4">
                        <input required type="password" class="form-control form-control-alt" id="password" name="password" placeholder="Password">
                        <span><small style="color:red"> * Please save this password somewhere safe! *</small></span>
                        <span class='text-danger'>@error('name') {{$message}}@enderror</span>
                      </div>
                      <div class="mb-4">
                        <input required type="text" class="form-control form-control-alt" id="phone" name="phone" placeholder="Enter Phone Number">
                        <span class='text-danger'>@error('name') {{$message}}@enderror</span>
                      </div>
                      <div class="mb-4">
                        <input required type="address" class="form-control form-control-alt" id="address" name="address" placeholder="Enter Address">
                        <span class='text-danger'>@error('name') {{$message}}@enderror</span>
                      </div>
                      <div class="mb-4">
                        <button type="submit" class="btn w-100 btn-hero btn-success">
                          <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Register
                        </button>
                      </div>
                    </form>
                    <div class="mb-4">
                      <button class="btn w-100 btn-hero btn-warning">
                        <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> <a href="">Login</a>
                      </button>
                    </div>
                    <!-- END Sign In Form -->
                  </div>
                </div>
                <div class="col-md-4 order-md-0 bg-primary-dark-op d-flex align-items-center">
                  <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                    <div class="d-flex">
                      {{-- <a class="flex-shrink-0 img-link me-3" href="javascript:void(0)">
                        <img class="img-avatar img-avatar-thumb" src="{{asset('assets/admin/media/avatars/avatar12.jpg')}}" alt="">
                      </a> --}}
                      <div class="flex-grow-1">
                        <p class="text-white fw-semibold mb-1">
                          It seems you do not have an account with us. To continue to with your order you must register your account first.
                        </p>
                      </div>
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
