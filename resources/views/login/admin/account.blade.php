@extends('layouts.admin')

@section('content')

@if($message = Session::get('success'))
@endif
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('accounts') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Accounts</span></a>
      </li>
      <hr class="sidebar-divider">
      
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="/template/ruangadmin/img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">{{$user->username}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('viewprofile') }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="{{ route('updatepassword') }}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Accounts</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Accounts</li>
            </ol>
          </div>

          <div class="row mb-3">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                    <form action="{{route('admin.validate_admin_registration')}}" method="POST">
                        @csrf
                        @if(Session::has('success'))
                        <div class="alert alert-primary" role="alert">
                            {!!session('success')!!}
                        </div>
                        @endif
                        <div class="row g-0">
                        <div class="col-xl-12">
                            <div class="card-body p-md-3 text-black">
                            <h5 class="mb-2 small-text text-uppercase">Registration form</h5>
                            <div class="row">
                                <div class="col-md-4 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="firstname" id="form3Example1m" class="form-control" value="{{ old('firstname') }}" />
                                    <label class="form-label" for="form3Example1m">First name</label>
                                    @if($errors->has('firstname'))
                                    <p class="text-danger"><small>{{ $errors->first('firstname') }}</small></p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="middlename" id="form3Example1n" class="form-control" value="{{ old('middlename') }}"/>
                                    <label class="form-label" for="form3Example1n">Middle name</label>
                                </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="surname" id="form3Example1n" class="form-control" value="{{ old('surname') }}"/>
                                    <label class="form-label" for="form3Example1n">Surname</label>
                                    @if($errors->has('surname'))
                                    <p class="text-danger"><small>{{ $errors->first('surname') }}</small></p>
                                    @endif
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="email" name="email" id="form3Example1m1" class="form-control" value="{{ old('email') }}"/>
                                    <label class="form-label" for="form3Example1m1">Email</label>
                                    @if($errors->has('email'))
                                    <p class="text-danger"><small>{{ $errors->first('email') }}</small></p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="username" id="form3Example1n1" class="form-control" value="{{ old('username') }}"/>
                                    <label class="form-label" for="form3Example1n1">Username</label>
                                    @if($errors->has('username'))
                                    <p class="text-danger"><small>{{ $errors->first('username') }}</small></p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="password" name="password" id="form3Example1m1" class="form-control" />
                                    <label class="form-label" for="form3Example1m1">Password</label>
                                    @if($errors->has('password'))
                                    <p class="text-danger"><small>{{ $errors->first('password') }}</small></p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="password" name="password_confirmation" id="form3Example1n1" class="form-control" />
                                    <label class="form-label" for="form3Example1n1">Re-Password</label>
                                    @if($errors->has('password_confirmation'))
                                    <p class="text-danger"><small>{{ $errors->first('password_confirmation') }}</small></p>
                                    @endif
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="contact" id="form3Example1m" class="form-control" onkeypress='validate(event)' minlegth="11" maxlength="12" value="{{ old('contact') }}"/>
                                    <label class="form-label" for="form3Example1m">Contact Number</label>
                                    @if($errors->has('contact'))
                                    <p class="text-danger"><small>{{ $errors->first('contact') }}</small></p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="date" name="birthday" id="dt" class="form-control" value="{{ old('birthday') }}"/>
                                    <label class="form-label" for="form3Example1n">Birthday</label>
                                    @if($errors->has('birthday'))
                                    <p class="text-danger"><small>{{ $errors->first('birthday') }}</small></p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="street" id="form3Example1m" class="form-control" value="{{ old('street') }}"/>
                                    <label class="form-label" for="form3Example1m">Street</label>
                                    <br>
                                    @if($errors->has('street'))
                                    <p class="text-danger"><small>{{ $errors->first('street') }}</small></p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="barangay" id="form3Example1n" class="form-control" value="{{ old('barangay') }}"/>
                                    <label class="form-label" for="form3Example1n">Barangay</label>
                                    @if($errors->has('barangay'))
                                    <p class="text-danger"><small>{{ $errors->first('barangay') }}</small></p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="city" id="form3Example1n" class="form-control" value="{{ old('city') }}"/>
                                    <label class="form-label" for="form3Example1n">City</label>
                                    @if($errors->has('city'))
                                    <p class="text-danger"><small>{{ $errors->first('city') }}</small></p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="province" id="form3Example1n" class="form-control" value="{{ old('province') }}"/>
                                    <label class="form-label" for="form3Example1n">Province</label>
                                    @if($errors->has('province'))
                                    <p class="text-danger"><small>{{ $errors->first('province') }}</small></p>
                                    @endif
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                <select class="select form-control" name="gender">
                                    <option value="" disabled value selected>Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                    @if($errors->has('gender'))
                                    <p class="text-danger"><small>{{ $errors->first('gender') }}</small></p>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-4">
                                <select class="select form-control" name="role">
                                    <option value="" disabled value selected>User Role</option>
                                    <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>User</option>
                                    <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Manager</option>
                                    <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Admin</option>
                                </select>
                                    @if($errors->has('role'))
                                    <p class="text-danger"><small>{{ $errors->first('role') }}</small></p>
                                    @endif
                                </div>
                            </div>

                            <div class="d-flex justify-content-center pt-3">
                                <button type="submit" class="btn btn-warning ms-2">Create Account</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script></span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script>
   document.getElementById('dt').max = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0];
</script>
  <script>
    function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
    // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
  </script>
@endsection