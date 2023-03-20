@extends('layouts.user')

@section('content')
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user') }}">
        <div class="sidebar-brand-text mx-3">User</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('user') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
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
                <a class="dropdown-item" href="{{ route('vuprofile') }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="{{ route('uchangepassword') }}">
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('user') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <div class="content">
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <div class="card card-user">
                    <div class="card-body">
                        <div class="author mb-2">
                        <a href="#">
                            <img class="img-fluid rounded-circle border border-dark" src="/template/ruangadmin/img/boy.png" alt="responsive images">
                        </a>
                        </div>
                        <p class="description text-center">
                        <strong>{{$user->firstname}} {{$user->middlename}} {{$user->surname}}</strong><br>
                        User
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                    
                        <form action="{{route('updateuser', $user->id)}}" method="POST">
                          @csrf
                          @method('PUT')
                          @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                              {!!session('success')!!}
                            </div>
                          @endif
                        <div class="row">
                            <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Username" value="{{$user->username}}" disabled="">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="firstname" placeholder="Company" value="{{$user->firstname}}">
                                @if($errors->has('firstname'))
                                  <p class="text-danger"><small>{{ $errors->first('firstname') }}</small></p>
                                @endif
                            </div>
                            </div>
                            <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" name="middlename" placeholder="Last Name" value="{{$user->middlename}}">
                            </div>
                            </div>
                            <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="surname" placeholder="Last Name" value="{{$user->surname}}">
                                @if($errors->has('surname'))
                                  <p class="text-danger"><small>{{ $errors->first('surname') }}</small></p>
                                @endif
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" class="form-control" name="contact" placeholder="Contact Number" value="{{$user->contact}}">
                                @if($errors->has('contact'))
                                  <p class="text-danger"><small>{{ $errors->first('contact') }}</small></p>
                                @endif
                            </div>
                            </div>
                            <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Street</label>
                                <input type="text" class="form-control" name="street" placeholder="Street" value="{{$user->street}}">
                                @if($errors->has('street'))
                                  <p class="text-danger"><small>{{ $errors->first('street') }}</small></p>
                                @endif
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Barangay</label>
                                <input type="text" class="form-control" name="barangay" placeholder="Barangay" value="{{$user->barangay}}">
                                @if($errors->has('barangay'))
                                  <p class="text-danger"><small>{{ $errors->first('barangay') }}</small></p>
                                @endif
                            </div>
                            </div>
                            <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" placeholder="City" value="{{$user->city}}">
                                @if($errors->has('city'))
                                  <p class="text-danger"><small>{{ $errors->first('city') }}</small></p>
                                @endif
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Province</label>
                                <input type="text" class="form-control" name="province" placeholder="Barangay" value="{{$user->province}}">
                                @if($errors->has('province'))
                                  <p class="text-danger"><small>{{ $errors->first('province') }}</small></p>
                                @endif
                            </div>
                            </div>
                            <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>City</label>
                                <input type="date" class="form-control" name="birthday" value="{{$user->birthday}}">
                                @if($errors->has('birthday'))
                                  <p class="text-danger"><small>{{ $errors->first('birthday') }}</small></p>
                                @endif
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                            <div class="form-group">
                            <select class="form-control" name="gender">
                                <option value="option_select" disabled selected>Gender</option>     
                                <option value="male" @if($user->gender == 'male') selected : selected @endif>Male</option>  
                                <option value="female" @if($user->gender == 'female') selected : selected @endif>Female</option>
                                <option value="other" @if($user->gender == 'other') selected : selected @endif>Other</option>
                            </select>
                              @if($errors->has('gender'))
                                <p class="text-danger"><small>{{ $errors->first('gender') }}</small></p>
                              @endif
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                            <button type="submit" name="updateprofile" class="btn btn-primary btn-round">Update Profile</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
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
                  <a href="{{ route('logout')}}" class="btn btn-primary">Logout</a>
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

@endsection
