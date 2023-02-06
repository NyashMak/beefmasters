@extends('admin.layouts.app')
@section('body')
    <!-- Page Content -->
    <div class="content content-full content-boxed">
      <div class="block block-rounded">
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
          <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input hidden type="number" name="is_customer" value="0">
            <!-- User Profile -->
            <h2 class="content-heading pt-0">
              <i class="fa fa-fw fa-user-circle text-muted me-1"></i> Create User Profile
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
                  <input type="text" class="form-control" id="username" name="name" placeholder="Enter your fullname.." value="">
                </div>
                <div class="mb-4">
                  <label class="form-label" for="dm-profile-edit-email">Email Address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email.." value="">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="dm-profile-edit-email">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number.." value="">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="dm-profile-edit-address">Address</label>
                    <input type="text" class="form-control" id="addres" name="address" placeholder="Enter your address.." value="">
                </div>
                <div class="mb-4">
                  <label class="form-label" for="dm-profile-edit-job-title">User Role</label>
                  <select type="text" class="form-control" id="user_role" name="role" placeholder="Select User Role..">
                    <option disabled selected>--Click To Select--</option>
                    <option value="super_admin">Super Administrator</option>
                    <option value="admin">Administrator</option>
                    <option value="sales">Sales</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- END User Profile -->

            <!-- Change Password -->
            <h2 class="content-heading pt-0">
              <i class="fa fa-fw fa-asterisk text-muted me-1"></i> Set Password
            </h2>
            <div class="row push">
              <div class="col-lg-4">
                <p class="text-muted">
                  Changing your sign in password is an easy way to keep your account secure.
                </p>
              </div>
              <div class="col-lg-8 col-xl-5">
                <div class="row mb-4">
                  <div class="col-12">
                    <label class="form-label" for="dm-profile-edit-password-new">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                </div>
              </div>
            </div>
            <!-- END Change Password -->
            <!-- Submit -->
            <div class="row push">
              <div class="col-lg-8 col-xl-5 offset-lg-4">
                <div class="mb-4">
                  <button type="submit" class="btn btn-alt-primary">
                    <i class="fa fa-check-circle opacity-50 me-1"></i> Create Profile
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

@endsection