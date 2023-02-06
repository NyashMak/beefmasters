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
          <form action="{{route('users.update', [$user->sid])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input hidden type="number" name="is_customer" value="0">
            <!-- User Profile -->
            <h2 class="content-heading pt-0">
              <i class="fa fa-fw fa-user-circle text-muted me-1"></i> {{$user->name}}'s Profile
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
                  <input type="text" class="form-control" id="username" name="name" placeholder="Enter your fullname.." value="{{$user->name}}">
                </div>
                <div class="mb-4">
                  <label class="form-label" for="dm-profile-edit-email">Email Address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email.." value="{{$user->email}}">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="dm-profile-edit-email">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number.." value="{{$user->phone}}">
                  </div>
                <div class="mb-4">
                  <label class="form-label" for="dm-profile-edit-job-title">User Role</label>
                  <select type="text" class="form-control" id="user_role" name="role" placeholder="Select User Role..">
                    <option @if($user->role == 'super_admin') selcted @endif value="super_admin">Super Administrator</option>
                    <option @if($user->role == 'admin') selcted @endif value="admin">Administrator</option>
                    <option @if($user->role == 'sales') selcted @endif value="sales">Sales</option>
                  </select>
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
                  <input type="password" class="form-control" id="current_password" name="current_password" value="{{$user->password}}">
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
                  <button type="submit" class="btn btn-alt-primary">
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

@endsection