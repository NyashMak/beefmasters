@extends('shop_front.layouts.app')
@section('body')

<!-- Icons & Stylesheets -->
<link rel="shortcut icon" href="{{asset('assets/admin/media/favicons/favicon.png')}}">
<link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/admin/media/favicons/favicon-192x192.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/admin/media/favicons/apple-touch-icon-180x180.png')}}">

<link rel="stylesheet" id="css-main" href="{{asset('assets/admin/css/dashmix.min.css')}}">
<!-- <link rel="stylesheet" id="css-theme" href="assets/butcher/css/themes/xwork.min.css"> -->
<!-- END Icons & Stylesheets -->


<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-image" style="background-image: url({{asset('assets/butcher/images/banner/bg-images/bm_banner_01.png')}});">
        <div class="bg-black-25">
          <div class="content content-full">
            <div class="py-5 text-center">
              <br><br><br><br>
            </div>
          </div>
        </div>
      </div>
      <!-- END Hero -->

<!-- Page Content -->
<div class="content content-full content-boxed">
    <div class="block block-rounded">
      <div class="block-content">
          @if(Session::has('success'))
            <div class="alert alert-success mx-auto">
                {{Session::get('success')}}
            </div>
          @endif
          @if(Session::has('error'))
              <div class="alert alert-success mx-auto">
                  {{Session::get('error')}}
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
        <form action="{{route('update-profile', [Auth::user()->sid])}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <input hidden type="number" name="is_customer" value="1">
          <!-- User Profile -->
          <h2 class="content-heading pt-0">
            <i class="fa fa-fw fa-user-circle text-muted me-1"></i> {{Auth::user()->name}}'s Profile
          </h2>
          <div class="row push">
            <div class="col-lg-4">
              <p class="text-muted">
                Your account’s vital info. Your username will be publicly visible.
              </p>
            </div>
            <div class="col-lg-8 col-xl-5">
              <div class="mb-4">
                <label class="form-label" for="dm-profile-edit-username">Full Name</label>
                <input type="text" class="form-control" id="username" name="name" placeholder="Enter your fullname.." value="{{Auth::user()->name}}">
              </div>
              <div class="mb-4">
                <label class="form-label" for="dm-profile-edit-email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email.." value="{{Auth::user()->email}}">
              </div>
              <div class="mb-4">
                  <label class="form-label" for="dm-profile-edit-email">Phone Number</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number.." value="{{Auth::user()->phone}}">
              </div>
              <div class="mb-4">
                <label class="form-label" for="dm-profile-edit-address">Billing Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address.." value="{{Auth::user()->address}}">
              </div>
            </div>
          </div>
          <!-- END User Profile -->

          <!-- Change Password -->
          <h2 class="content-heading pt-0">
            <i class="fa fa-fw fa-asterisk text-muted me-1"></i> Change Password
          </h2>
          <div class="row push">
            <div class="col-lg-4">
              <p class="text-muted">
                Changing your sign in password is an easy way to keep your account secure.
              </p>
            </div>
            <div class="col-lg-8 col-xl-5">
              <div class="mb-4">
                <label class="form-label" for="dm-profile-edit-password">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password" value="{{Auth::user()->password}}">
              </div>
              <div class="row mb-4">
                <div class="col-12">
                  <label class="form-label" for="dm-profile-edit-password-new">New Password</label>
                  <input type="password" class="form-control" id="new_password" name="new_password" value="">
                </div>
              </div>
            </div>
          </div>
          <!-- END Change Password -->
          <!-- Submit -->
          <div class="row push">
            <div class="col-lg-8 col-xl-5 offset-lg-4">
              <div class="mb-4">
                <button type="submit" class="btn btn-alt-danger">
                  <i class="fa fa-check-circle opacity-50 me-1"></i> Update Profile
                </button>
              </div>
            </div>
          </div>
          <!-- END Submit -->
        </form>
      </div>
    </div>
  </div>
  <!-- END Page Content -->
</main>
<!-- END Main Container -->



<script src="{{asset('assets/admin/js/dashmix.app.min.js')}}"></script>

<!-- jQuery (required for jQuery Sparkline plugin) -->
<script src="{{asset('assets/admin/js/lib/jquery.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{asset('assets/admin/js/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/chart.js/chart.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{asset('assets/admin/js/pages/be_pages_dashboard_v1.min.js')}}"></script>

<!-- Page JS Helpers (jQuery Sparkline plugin) -->
<script>Dashmix.helpersOnLoad(['jq-sparkline']);</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
@endsection