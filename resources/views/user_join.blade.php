@extends('layouts.viewer_layout')
@section('viewer_content')
<style>
     .btn_{
       margin-left:40px;
       border-width: 3px;
     }
    .btn_f{
        width: 96%;
        margin-left: 2%;
    }
    .showme {
       display: none;
       margin-left: 8px;
       text-transform: none;
       text-align: justify !important;
    }
    .showhim:hover .showme {
        display: block;
        font-size: 11px;
        width: auto;
        font-weight: 600;

        background-color: #182c7d;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        /* Position the tooltip */
        position: absolute;
        z-index: 9999;
        padding: 6px 20px;
        max-width: 60%;
    }
</style>
<div class="container border rounded border-primary mt-5 w-40 p-3 col-md-6">
  <div class="text-center">
  <h3 class="text-primary  text-uppercase mt-3 ">Welcome </h3>
  <h5 class="text-muted">Enter the required informations to join the Seminar</h5>
  </div>

    {{-- @if(auth()->user()) --}}
    <form method="POST" action="{{route('join_stream' ,[$id,$event_id])}}"  id="redirect" name="redirect">
        @csrf
{{--
      <span class="alert alert-warning" id="warning">
        Redirecting ...
      </span> --}}
      <div class="container w-40 p-3 ">
        @if (Session::get('errorsUnique'))
        <div class="alert-danger text-center mb-3 p-3">
                      <strong id="msg_err">{{Session::get('errorsUnique')}} </strong>
                      </div>
          @endif
          @if($errors->has('txtName'))
         
          <span class="text-danger" role="alert">
              <strong>{{ $errors->first('txtName') }}</strong>
          </span>
          @enderror
          @if(Auth::check())
         
              <input type="text" class="form-control mb-3" placeholder="{{Auth::user()->name}}" name="txtName" value="{{Auth::user()->name}}" readonly >
              @else
              <input type="text" class="form-control mb-3" placeholder="your Name" name="txtName" >
          @endif
        {{-- @if($errors->any())
        {{dd($errors)}}
        @endif --}}
      @if($errors->has('code'))
     
      <span class="text-danger" role="alert">
          <strong>{{ $errors->first('code') }}</strong>
      </span>
      @enderror
      
      <input type="text" class="form-control mb-3" name="code" id="code" placeholder="Access Code" >
        <div class="row">
            <button type="submit" class="form-control btn-primary text-uppercase text-primary {{ !Auth::check() ? "btn_ col-md-5" : "btn_f" }} showhim"> Join <div class="showme">You can directly join the ongoing seminar by clicking on join after having entered your name and the access code to the seminar's virtual room that you would have received with the invitation or via email. </div></button>
            @if(!Auth::check())
               <a href="{{route('userRegister')}}" class="form-control btn-primary text-uppercase text-primary text-center col-md-5 showhim btn_">Register <div class="showme">You can join the ongoing seminar by creating your own account, which will allow us to identify you everytime you join a seminar on our platform, and to notify you about the latest seminars and conferences.</div></a>
            @endif
        </div><!-- fin row -->
     </div>
        {{-- <button type="submit" class="btn btn-primary" hidden>Submit</button> --}}
      </form>
      {{-- @else
      <div class="alert alert-danger">
        you must be logged in to join meeting , click<a href="{{route('login')}}" target='_blank'> Here </a>to login
      </div>
      @endif --}}
      {{-- <script>
        var msg_err=$('#msg_err').text();
      console.log(msg_err);
       window.onload=function()
       {   if(msg_err=="" && )
            {

       window.setTimeout(function() { document.redirect.submit(); }, 2500);
             }
             else
             {
              $('#warning').hide();
             }
        };

      </script> --}}

    </div>
      @endsection
