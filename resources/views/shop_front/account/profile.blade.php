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
    <div class="bg-image" style="background-image: url('assets/butcher/images/banner/bg-images/bm_banner_01.png');">
      <div class="bg-black-25">
        <div class="content content-full">
          <div class="py-5 text-center">
            {{-- <a class="img-link" href="be_pages_generic_profile.html">
              <img class="img-avatar img-avatar96 img-avatar-thumb" src="assets/media/avatars/avatar10.jpg" alt="">
            </a> --}}
            <br><br><br>
            <h1 class="fw-bold my-2 text-white">{{$customer->name}}</h1>
            <a href="{{route('show-profile')}}">
                <button type="button" class="btn btn-danger m-1">
                <i class="fa fa-fw fa-user-edit opacity-50 me-1"></i> Edit Profile
                </button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content content-full content-boxed">
      <!-- Latest Posts -->
      <h2 class="content-heading">
        <i class="si si-note me-1"></i> Latest Orders
      </h2>
      <div class="block-content">
        <!-- All Orders Table -->
        <div class="table-responsive">
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
          <table class="table table-borderless table-striped table-vcenter fs-sm">
            <thead>
              <tr>
                <th class="text-center" style="width: 100px;">ID</th>
                <th class="d-none d-sm-table-cell text-center">Submitted</th>
                <th>Status</th>
                <th class="d-none d-xl-table-cell text-center">Products</th>
                <th class="d-none d-sm-table-cell text-end">Value</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
                <tr>
                  <td class="text-center">
                    <a class="fw-semibold" href="be_pages_ecom_order.html">
                      <strong>ORD{{$order->order_nr}}</strong>
                    </a>
                  </td>
                  <td class="d-none d-sm-table-cell text-center">{{$order->created_at}}</td>
                  <td class="fs-base">
                    @if($order->status == 'Cancelled')
                      <span class="badge rounded-pill bg-danger">Canceled</span>
                    @elseif($order->status == 'For Collection')
                      <span class="badge rounded-pill bg-warning">For Collection</span>
                    @elseif($order->status == 'For Delivery')
                      <span class="badge rounded-pill bg-info">For Delivery</span>
                    @elseif($order->status == 'Collected')
                      <span class="badge rounded-pill bg-success">Collected</span>
                    @elseif($order->status == 'Delivered')
                      <span class="badge rounded-pill bg-success">Delivered</span>
                    @endif
                  </td>
                  <td class="d-none d-xl-table-cell text-center">
                      <a class="fw-semibold" href="">{{$itemsCount[$order->sid]}}</a>
                  </td>
                  <td class="d-none d-sm-table-cell text-end">
                    <strong>R</strong>
                  </td>
                  <td class="text-center fs-base">
                    <a class="btn btn-sm btn-alt-secondary" href="">
                      <i class="fa fa-fw fa-eye"></i>
                    </a>
                    <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                      <i class="fa fa-fw fa-times text-danger"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      <div class="text-end">
        <button type="button" class="btn btn-alt-danger">
          Check out more <i class="fa fa-arrow-right ms-1"></i>
        </button>
      </div>
      <!-- END Latest Posts -->
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