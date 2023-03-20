@extends('layouts.layout')

@section('content')

@if($message = Session::get('success'))
@endif
<h1>copy and paste all the changes on the updated project here</h1>
<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <form action="{{route('login.validate_registration')}}" method="POST">
            @csrf
              <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="../img/register-img.jpg"
                  alt="Sample photo" class="img-fluid"
                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-3 text-black">
                  <h3 class="mb-2 text-uppercase">Registration form</h3>
                  <div class="row">
                    <div class="col-md-4 mb-1">
                      <div class="form-outline">
                        <input type="text" name="firstname" id="form3Example1m" class="form-control" />
                        <label class="form-label" for="form3Example1m">First name</label>
                        @if($errors->has('firstname'))
                          <p class="text-danger"><small>{{ $errors->first('firstname') }}</small></p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-4 mb-1">
                      <div class="form-outline">
                        <input type="text" name="middlename" id="form3Example1n" class="form-control" />
                        <label class="form-label" for="form3Example1n">Middle name</label>
                      </div>
                    </div>
                    <div class="col-md-4 mb-1">
                      <div class="form-outline">
                        <input type="text" name="surname" id="form3Example1n" class="form-control" />
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
                        <input type="email" name="email" id="form3Example1m1" class="form-control" />
                        <label class="form-label" for="form3Example1m1">Email</label>
                        @if($errors->has('email'))
                          <p class="text-danger"><small>{{ $errors->first('email') }}</small></p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6 mb-1">
                      <div class="form-outline">
                        <input type="text" name="username" id="form3Example1n1" class="form-control" />
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
                        <input type="text" name="contact" id="form3Example1m" class="form-control" onkeypress='validate(event)' minlegth="11" maxlength="12" />
                        <label class="form-label" for="form3Example1m">Contact Number</label>
                        @if($errors->has('contact'))
                          <p class="text-danger"><small>{{ $errors->first('contact') }}</small></p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6 mb-1">
                      <div class="form-outline">
                        <input type="date" name="birthday" id="dt" class="form-control" />
                        <label class="form-label" for="form3Example1n">Birthday</label>
                        @if($errors->has('birthday'))
                          <p class="text-danger"><small>{{ $errors->first('birthday') }}</small></p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6 mb-1">
                      <div class="form-outline">
                        <input type="text" name="street" id="form3Example1m" class="form-control" />
                        <label class="form-label" for="form3Example1m">Street</label>
                        <br>
                        @if($errors->has('street'))
                          <p class="text-danger"><small>{{ $errors->first('street') }}</small></p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6 mb-1">
                      <div class="form-outline">
                        <input type="text" name="barangay" id="form3Example1n" class="form-control" />
                        <label class="form-label" for="form3Example1n">Barangay</label>
                        @if($errors->has('barangay'))
                          <p class="text-danger"><small>{{ $errors->first('barangay') }}</small></p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6 mb-1">
                      <div class="form-outline">
                        <input type="text" name="city" id="form3Example1n" class="form-control" />
                        <label class="form-label" for="form3Example1n">City</label>
                        @if($errors->has('city'))
                          <p class="text-danger"><small>{{ $errors->first('city') }}</small></p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6 mb-1">
                      <div class="form-outline">
                        <input type="text" name="province" id="form3Example1n" class="form-control" />
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
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                      </select>
                        @if($errors->has('gender'))
                          <p class="text-danger"><small>{{ $errors->first('gender') }}</small></p>
                        @endif
                    </div>
                  </div>

                  <div class="d-flex justify-content-end pt-3">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="{{route('login')}}"
                class="link-danger">Login</a></p>
                    <button type="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

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