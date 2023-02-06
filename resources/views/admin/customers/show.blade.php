@extends('admin.layouts.app')
@section('body')
<!-- Quick Actions -->
<div class="row items-push">
    <div class="col-6">
      <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
        <div class="block-content py-5">
          <div class="fs-3 fw-semibold mb-1">
            <i class="fa fa-pencil-alt"></i>
          </div>
          <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
            Edit Customer
          </p>
        </div>
      </a>
    </div>
    <div class="col-6">
      <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
        <div class="block-content py-5">
          <div class="fs-3 fw-semibold text-danger mb-1">
            <i class="fa fa-times"></i>
          </div>
          <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
            Remove Customer
          </p>
        </div>
      </a>
    </div>
  </div>
  <!-- END Quick Actions -->

            <!-- User Info -->
            <div class="block block-rounded">
                <div class="block-content text-center">
                  <div class="py-4">
                    <div class="mb-3">
                      <img class="img-avatar img-avatar96" src="assets/media/avatars/avatar15.jpg" alt="">
                    </div>
                    <h1 class="fs-lg mb-0">
                      {{$customer->name}}
                    </h1>
                    <p class="text-muted">
                      <i class="fa fa-award text-warning me-1"></i>
                      Premium Customer
                    </p>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <!-- Billing Address -->
                      <div class="block block-rounded block-bordered">
                        <div class="block-header border-bottom">
                          <h3 class="block-title fs-lg mb-0">Billing Address</h3>
                        </div>
                        <div class="block-content">
                          <address class="fs-sm">
                            {{$customer->address}}<br><br>
                            <i class="fa fa-phone"></i> {{$customer->phone}}<br>
                            <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{$customer->email}}</a>
                          </address>
                        </div>
                      </div>
                      <!-- END Billing Address -->
                    </div>
                    
                  </div>
                </div>
                <div class="block-content bg-body-light text-center">
                  <div class="row items-push text-uppercase">
                    <div class="col-6 col-md-6">
                      <div class="fw-semibold text-dark mb-1">Orders</div>
                      <a class="link-fx fs-3" href="javascript:void(0)">{{$orders->count()}}</a>
                    </div>
                    <div class="col-6 col-md-6">
                      <div class="fw-semibold text-dark mb-1">Orders Value</div>
                      <a class="link-fx fs-3" href="javascript:void(0)">R</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END User Info -->

          <!-- Past Orders -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Past Orders (5)</h3>
            </div>
            <div class="block-content">
              <div class="table-responsive">
                <table class="table table-borderless table-striped table-vcenter">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 100px;">ID</th>
                      <th class="d-none d-sm-table-cell text-center">Submitted</th>
                      <th class="d-none d-md-table-cell text-center">Products</th>
                      <th>Status</th>
                      <th>Delivery Address</th>
                      <th class="d-none d-sm-table-cell text-end">Value</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($orders as $order)
                        {{-- @if(is_object($order->orderItems())) --}}
                         {{-- <p>{{$order->orderItems()->sid}}</p> --}}
                          {{-- @foreach($order->orderItems as $orderItem)
                            <p>{{$orderItem->name}}</p>
                          @endforeach --}}
                        {{-- @else
                          <p>Method Failure</p>
                        @endif --}}
                    <tr>
                      <td class="text-center fs-sm">
                        <a class="fw-semibold" href="be_pages_ecom_order.html">
                          ORD{{$order->order_nr}}                  </a>
                      </td>
                      <td class="d-none d-sm-table-cell text-center fs-sm">{{$order->created_at}}</td>
                      <td class="d-none d-md-table-cell text-center fs-sm">
                        <a class="fw-semibold" href="javascript:void(0)">
                          {{$itemsCount[$order->sid]}}</a>
                      </td>
                      <td>
                        <span class="badge bg-success">{{$order->status}}</span>
                      </td>
                      <td class="d-none d-sm-table-cell text-center fs-sm">{{$order->delivery_address}}</td>
                      <td class="text-end d-none d-sm-table-cell fs-sm">
                        <strong>R{{$order->total}}</strong>
                      </td>
                      <td class="text-center fs-sm">
                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_product_edit.html">
                          <i class="fa fa-fw fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                          <i class="fa fa-fw fa-times text-danger"></i>
                        </a>
                      </td>
                    </tr>
                    @empty
                        <tr>
                            <p>User hasn't made any orders yet...</p>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- END Past Orders -->

@endsection