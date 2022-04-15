@extends('layouts.viewer_layout')

@section('viewer_content')
<body>
  <link rel="stylesheet" href="\css\contactstylemain.css">
    <div class="container">
      
      <div class="row">
        
        <div class="col-lg-5 col-xl-5 mx-auto">
          <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div class="card-img-left d-none d-md-flex">
              <!-- Background image for card set in CSS! -->

               
            </div>
            <div class="card-body p-2 p-sm-3">
            @if ( Session::get('errorsUnique'))
            <div class="alert-danger text-center mb-3 p-3 " >
                          <strong>{{Session::get('errorsUnique')}} </strong> 
                          </div>   
              @endif
              
            
              <h1 class="card-title text-center mb-3 fw-normal fs-5">Login</h1>
             
              <form method="POST" action="{{ route('login')}}">
                @csrf
              
                <div class="form-floating mb-2">
                  <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email">
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                  <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-grid mb-2">
                  <button class="btn btn-primary btn-login fw-bold text-uppercase " type="submit">Login</button>
                </div>
                <hr class="my-4"> 
                <div class="d-flex">
              <div class="col">
                <a class="d-block text-center mt-2 text-uppercase color-red" href="{{route('join_us')}}">Not a member yet ? Sign Up</a>
                </div>
                <div class="offset-0 border-left pl-2"></div>
                <div class="col">
                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-uppercase" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </div>
               </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
@endsection
