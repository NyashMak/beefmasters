@extends('admin.layouts.app')
@section('body')
<!-- Quick Overview -->
 <div class="row items-push">
    <div class="col-6 col-lg-3">
      <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
        <div class="block-content py-5">
          <div class="item rounded-circle bg-xeco-lighter mx-auto mb-3">
            <i class="fa fa-check text-xeco-dark"></i>
          </div>
          <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
            ORD.01852
          </p>
        </div>
      </a>
    </div>
    <div class="col-6 col-lg-3">
      <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
        <div class="block-content py-5">
          <div class="item rounded-circle bg-xeco-lighter mx-auto mb-3">
            <i class="fa fa-check text-xeco-dark"></i>
          </div>
          <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
            Payment
          </p>
        </div>
      </a>
    </div>
    <div class="col-6 col-lg-3">
      <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
        <div class="block-content py-5">
          <div class="item rounded-circle bg-xsmooth-lighter mx-auto mb-3">
            <i class="fa fa-sync fa-spin text-xsmooth-dark"></i>
          </div>
          <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
            Packaging
          </p>
        </div>
      </a>
    </div>
    <div class="col-6 col-lg-3">
      <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
        <div class="block-content py-5">
          <div class="item rounded-circle bg-body mx-auto mb-3">
            <i class="fa fa-times text-muted"></i>
          </div>
          <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
            Delivery
          </p>
        </div>
      </a>
    </div>
  </div>
  <!-- END Quick Overview -->

  <!-- Products -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Products</h3>
    </div>
    <div class="block-content">
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
      <div class="table-responsive">
        <table class="table table-borderless table-striped table-vcenter fs-sm">
          <thead>
            <tr>
              <th class="text-center" style="width: 100px;">ID</th>
              <th>Product Name</th>
              <th class="text-center">Stock</th>
              <th class="text-center">Qty</th>
              <th class="text-end" style="width: 10%;">Unit Cost</th>
              <th class="text-end" style="width: 10%;">Price</th>
            </tr>
          </thead>
          <tbody>
            @if($order_items)
                @foreach($order_items as $order_item)   
                    <tr>
                        <td class="text-center"><a href="be_pages_ecom_product_edit.html"><strong>IID.{{$order_item->id}}</strong></a></td>
                        <td><a href="{{route('products.show', [$order_item->name])}}"><strong>{{$order_item->name}}</strong></a></td>
                      
                        <td class="text-center">59</td>   

                        <td class="text-center"><strong>{{$order_item->quantity}}</strong></td>

                        @foreach($products as $product)
                            @if($product->name == $order_item->name)
                                <td class="text-end">R {{$product->price}}</td>
                            @endif
                        
                        @endforeach

                        <td class="text-end">R {{$order_item->price}}</td>
                    </tr>

                @endforeach
             
            @else
                <tr>
                    <div>
                        <p>There are no items on this order</p>
                    </div>
                </tr>
            
            @endif

            <tr>
                <td colspan="5" class="text-end"><strong>Delivery Fee:</strong></td>
                <td class="text-end">{{$order->delivery}}</td>
              </tr>
            <tr>
              <td colspan="5" class="text-end"><strong>Total Price:</strong></td>
              <td class="text-end">R{{$order->total}}</td>
            </tr>
            <tr>
              <td colspan="5" class="text-end"><strong>Total Paid:</strong></td>
              @if($order->paid == 1)
                <td class="text-end">R{{$order->total}}</td>
              @else
                <td class="text-end" style="color: red">Cancelled Order</td>
              @endif
            </tr>
            <tr class="table-active">
              <td colspan="5" class="text-end text-uppercase"><strong>Total Due:</strong></td>
              @if($order->paid == 1)
              <td class="text-end"><strong>R0,00</strong></td>
              @else
              <td class="text-end"><strong>R{{$order->total}}</strong></td>
              @endif
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- END Products -->

  <!-- Customer -->
  <div class="row">
    <div class="col-sm-6">
      <!-- Billing Address -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Billing Address</h3>
        </div>
        <div class="block-content">
          <div class="fs-4 mb-1">{{$customer->name}}</div>
          <address class="fs-sm">
            {{$customer->address}}<br><br>
            <i class="fa fa-phone"></i> {{$customer->phone}}<br>
            <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{$customer->email}}</a>
          </address>
        </div>
      </div><br><br>
      <!-- END Billing Address -->
    </div>
    <div class="col-sm-6">
      <!-- Shipping Address -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Delivery Address</h3>
        </div>
        <div class="block-content">
          <div class="fs-4 mb-1">{{$customer->name}}</div>
          <address class="fs-sm">
            {{$order->delivery_address}}<br><br>
            <i class="fa fa-phone"></i>{{$customer->phone}}<br>
            <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{$customer->email}}</a>
          </address>

          
        </div><hr>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Order Status</h3>
            </div>
            <div class="block-content">
            <form class="form-group" action="{{route('orders.update', [$order->sid])}}" method="POST">
                @csrf
                @method('PUT')
                <select style="font-weight:bolder; color" name="status" class="bg-xeco-lighter form-control"style="border-radius: 5px" class="fs-sm" name="" id="">
                    <option @if($order->status == 'For Delivery') selected @endif value="For Delivery">For Delivery</option>
                    <option @if($order->status == 'Collect in-store') selected @endif value="Collect in-store">Collect in-store</option>
                    <option @if($order->status == 'Delivered') selected @endif value="Delivered">Delivered </option>
                    <option @if($order->status == 'Collected') selected @endif value="Collected">Collected</option>
                </select><br>
                <button class="btn btn-warning" style="border-radius:5px;" type="submit" name="submit">Update Status</button><br><br>
            </form>
            </div>
        </div>
      </div>
      <!-- END Delivery Address -->
    </div>
  </div>
  <!-- END Customer -->

  <!-- Log Messages -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Log Messages</h3>
    </div>
    <div class="block-content">
      <div class="table-responsive">
        <table class="table table-borderless table-striped table-vcenter fs-sm">
          <tbody>
            <tr>
              <td class="fs-base" style="width: 80px;">
                <span class="badge bg-primary">Order</span>
              </td>
              <td style="width: 220px;">
                <span class="fw-semibold">January 17, 2020 - 18:00</span>
              </td>
              <td>
                <a href="javascript:void(0)">Support</a>
              </td>
              <td class="text-success"><strong>Order Completed</strong></td>
            </tr>
            <tr>
              <td class="fs-base">
                <span class="badge bg-primary">Order</span>
              </td>
              <td>
                <span class="fw-semibold">January 17, 2020 - 17:36</span>
              </td>
              <td>
                <a href="javascript:void(0)">Support</a>
              </td>
              <td class="text-warning"><strong>Preparing Order</strong></td>
            </tr>
            <tr>
              <td class="fs-base">
                <span class="badge bg-success">Payment</span>
              </td>
              <td>
                <span class="fw-semibold">January 16, 2020 - 18:10</span>
              </td>
              <td>
                <a href="javascript:void(0)">John Parker</a>
              </td>
              <td class="text-success"><strong>Payment Completed</strong></td>
            </tr>
            <tr>
              <td class="fs-base">
                <span class="badge bg-danger">Email</span>
              </td>
              <td>
                <span class="fw-semibold">January 16, 2020 - 10:35</span>
              </td>
              <td>
                <a href="javascript:void(0)">Support</a>
              </td>
              <td class="text-danger"><strong>Missing payment details. Email was sent and awaiting for payment before processing</strong></td>
            </tr>
            <tr>
              <td class="fs-base">
                <span class="badge bg-primary">Order</span>
              </td>
              <td>
                <span class="fw-semibold">January 15, 2020 - 14:59</span>
              </td>
              <td>
                <a href="javascript:void(0)">Support</a>
              </td>
              <td>All products are available</td>
            </tr>
            <tr>
              <td class="fs-base">
                <span class="badge bg-primary">Order</span>
              </td>
              <td>
                <span class="fw-semibold">January 15, 2020 - 14:29</span>
              </td>
              <td>
                <a href="javascript:void(0)">John Parker</a>
              </td>
              <td>Order Submitted</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- END Log Messages -->
  @endsection