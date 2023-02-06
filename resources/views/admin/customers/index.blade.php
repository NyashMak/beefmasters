@extends('admin.layouts.app')
@section('body')
<!-- Quick Overview -->
<div class="row items-push">
    <div class="block-header block-header-default">
        <h3 class="block-title">All Customers</h3>
    </div>
    <div class="block-content bg-body-dark">
        <!-- Search Form -->
        <form action="be_pages_ecom_orders.html" method="POST" onsubmit="return false;">
          <div class="mb-4">
            <input type="text" class="form-control form-control-alt" id="dm-ecom-orders-search" name="dm-ecom-orders-search" placeholder="Search all customers..">
          </div>
        </form>
        <!-- END Search Form -->
      </div>
      <div class="block-content">
        <!-- All Orders Table -->
        <div class="table-responsive">
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
          <table class="table table-borderless table-striped table-vcenter fs-sm">
            <thead>
              <tr>
                <th class="text-center" style="width: 100px;">Name</th>
                <th class="d-none d-sm-table-cell text-center">Email</th>
                <th>Phone</th>
                <th class="d-none d-xl-table-cell">Address</th>
                <th class="d-none d-xl-table-cell text-center">Created On</th>
                <th class="d-none d-sm-table-cell text-end">Value</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($customers as $customer)
                <tr>
                  <td class="text-center">
                    <a class="fw-semibold" href="be_pages_ecom_order.html">
                      <strong>{{$customer->name}}</strong>
                    </a>
                  </td>
                  <td class="d-none d-sm-table-cell text-center">{{$customer->email}}</td>
                  <td class="fs-base">
                      <span class="badge rounded-pill bg-success">{{$customer->phone}}</span>
                  </td>
                  <td class="d-none d-xl-table-cell">
                    <span class="badge rounded-pill bg-success">{{$customer->address}}</span>
                  </td>
                  <td class="d-none d-xl-table-cell text-center">
                    <span class="badge rounded-pill bg-success">{{$customer->created_at}}</span>
                  </td>
                  <td class="d-none d-sm-table-cell text-end">
                    <strong>R</strong>
                  </td>
                  <td class="text-center fs-base">
                    <a class="btn btn-sm btn-alt-secondary" href="{{route('show-customer',[$customer->sid])}}">
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
        <!-- END All Orders Table -->
  
        <!-- Pagination -->
        <nav aria-label="Photos Search Navigation">
          <ul class="pagination justify-content-end mt-2">
            <li class="page-item">
              <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                Prev
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="javascript:void(0)">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="javascript:void(0)">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="javascript:void(0)">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="javascript:void(0)">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="javascript:void(0)" aria-label="Next">
                Next
              </a>
            </li>
          </ul>
        </nav>
        <!-- END Pagination -->
      </div>
</div>
@endsection