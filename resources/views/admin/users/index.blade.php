@extends('admin.layouts.app')
@section('body')
<!-- Quick Overview -->
<div class="row items-push">
  <div class="col-6 col-lg-6">
    <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="{{route('categories.create')}}">
      <div class="block-content py-5">
        <div class="fs-3 fw-semibold text-success mb-1">
          <i class="fa fa-plus"></i>
        </div>
        <p class="fw-semibold fs-sm text-success text-uppercase mb-0">
          Create New User
        </p>
      </div>
    </a>
  </div>
  <div class="col-6 col-lg-6">
    <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="">
      <div class="block-content py-5">
        <div class="fs-3 fw-semibold text-primary mb-1">
          <i >{{$users->count()}}</i>
        </div>
        <p class="fw-semibold fs-sm text-primary text-uppercase mb-0">
          Users
        </p>
      </div>
    </a>
  </div>
    <div class="block-header block-header-default">
        <h3 class="block-title">All Users</h3>
    </div>
    <div class="block-content bg-body-dark">
        <!-- Search Form -->
        <form action="be_pages_ecom_orders.html" method="POST" onsubmit="return false;">
          <div class="mb-4">
            <input type="text" class="form-control form-control-alt" id="dm-ecom-orders-search" name="dm-ecom-orders-search" placeholder="Search all users..">
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
                <th class="d-none d-sm-table-cell text-end">Role</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
            @isset($users)
              @foreach($users as $user)
                <tr>
                  <td class="text-center">
                    <a class="fw-semibold" href="be_pages_ecom_order.html">
                      <strong>{{$user->name}}</strong>
                    </a>
                  </td>
                  <td class="d-none d-sm-table-cell text-center">{{$user->email}}</td>
                  <td class="d-none d-sm-table-cell text-start">{{$user->phone}}</td>
                  <td class="d-none d-sm-table-cell text-start">{{$user->address}}</td>
                  <td class="d-none d-sm-table-cell text-center">{{$user->created_at}}</td>
                  <td class="d-none d-sm-table-cell text-end">
                    <strong>{{$user->role}}</strong>
                  </td>
                  <td class="text-center fs-base">
                    <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                      <a class="btn btn-sm btn-alt-secondary" href="{{route('users.show', [$user->sid])}}">
                        <i class="fa fa-fw fa-eye"></i>
                      </a>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                      <form action="{{route('users.destroy', [$user->sid])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-alt-secondary">
                          <i class="fa fa-fw fa-times text-danger"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            @else
            <tr>
                <p>No Users have been registered yet!</p>
            </tr>
            @endif
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