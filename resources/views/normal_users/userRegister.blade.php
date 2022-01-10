@extends('layouts.viewer_layout')
@section('viewer_content')
   
    <!-- Google Font: Source Sans Pro -->
    <!-- Font Awesome Icons -->
    <!-- Theme style -->
    <style>
        body {
                background: #ffffff;
            }
        .h2_stream{
            font-weight: bold;
            color:#2f589e;
        }
    </style>
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
  <div class="container">
      <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
          @csrf
          <h2 class="text-center h2_stream">Join a Stream</h2>
      <div class="row jumbotron shadow-lg">
          <div class="col-sm-6 form-group">
              <label for="name-f">First Name</label>
              <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" id="fname" placeholder="Enter your first name." >
              @error('fname')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="col-sm-6 form-group">
              <label for="name-l">Last name</label>
              <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" id="lname" placeholder="Enter your last name." >
              @error('lname')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="col-sm-6 form-group">
              <label for="name-l">Username</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please choose a username." >
              @error('username')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="col-sm-6 form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your email." >
              @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="col-sm-6 form-group">
              <label for="address-1">Address Line-1</label>
              <input type="address" class="form-control" name="address" id="address" placeholder="Locality/House/Street no." >
              @error('address')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          </div>
          <div class="col-sm-6 form-group">
              <label for="gender">Gender</label>
              <select id="gender" name="gender" id="gender" class="form-control browser-default custom-select @error('gender') is-invalid @enderror">
              <option value="male">Male</option>
              <option value="female">Female</option>
          </select>
          @error('gender')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
         
          <div class="col-sm-6 form-group">
                <label for="pass">Password</label>
                <input type="Password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" id="pass" placeholder="Enter your password." >
                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="col-sm-6 form-group">
                <label for="pass2">Confirm Password</label>
                <input type="Password" name="password_confirmation" id="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="pass2" placeholder="Re-enter your password." >
                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        
            <div class="col-sm-6 form-group">
                <label for="avatar">Avatar</label>
   
                <input type="file" name="image" id="file" class="form-control @error('image') is-invalid @enderror" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        
          <div class="col-sm-12">
              <input type="checkbox" class="form-check d-inline @error('check') is-invalid @enderror" id="checkbox" name="check"><label for="chb" class="form-check-label" required>&nbsp; I accept all terms and conditions.
              </label>
              @error('check')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          
          <div class="col-sm-12 form-group mb-0">
             <button class="btn btn-primary float-right">Submit</button>
          </div>
          
      </div>
      </form>
  </div>

  
@endsection