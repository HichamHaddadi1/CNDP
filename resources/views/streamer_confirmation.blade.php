@extends('layouts.viewer_layout')
@section('viewer_content')




<div class="container d-flex justify-content-center align-items-center mt-5">
	

  <div class="img">
@if(Auth::user()->role ==2 && Auth::user()->status == 'Pending')
       <div class="alert alert-danger mt-3" role="alert">
               Wait until your account is verified , you will receive an email !
            </div>
            @elseif(Auth::user()->status == 'verified')
            <div class="alert alert-success mt-3" role="alert">
              Your account is verified click here to access your dashboard <a href="{{route('streamer.profile')}}" class="btn btn-success">Dashboard</a>
            </div>
            @else
            <div class="alert alert-danger mt-3" role="alert">
              Your account is Denied , Contact the site administraion for more infos 
            </div>
        @endif
</div>

	
</div>
@endsection




