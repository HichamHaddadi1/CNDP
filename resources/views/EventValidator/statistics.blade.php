@extends('EventValidator.EV_layout')

@section('validator_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container text-center">
 <div class="row text-center">

    <div class=" m-4 info-box bg-success col">
        <span class="info-box-icon"><i class="fa-solid fa-door-closed"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Rooms Created</span>
          <span class="info-box-number">{{$total_rooms_created}}</span>
        </div>
    </div>
      
    <div class=" m-4 info-box bg-info col">
        <span class="info-box-icon"><i class="fa-solid fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Number of users</span>
          <span class="info-box-number">{{$total_users}}</span>
        </div>
    </div>

    <div class=" m-4 info-box bg-primary col">
        <span class="info-box-icon"><i class="fa-solid fa-calendar-check"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Seminars Created</span>
          <span class="info-box-number">{{$total_events}}</span>
        </div>
    </div>
    {{-- <div class=" m-4 info-box bg-warning col">
        <span class="info-box-icon"><i class="far fa-flag"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Bookmarks</span>
          <span class="info-box-number">410</span>
        </div>
    </div> --}}

 </div>
@php
    $col="col-6"
@endphp
      <div class="row">
        <div class="{{$col}}">
          <div class="card" >
          
            <div class="card-body ">
              <h3 class="card-title"> <strong>List of all Seminars</strong> </h3>
              <p class="card-text"> </p>
              <a href="{{url('/validator/events')}}" class="btn btn-primary btn-block">See Seminars</a>
            </div>
          </div>
        </div>

        <div class="{{$col}}">
          <div class="card">
          
            <div class="card-body ">
              <h3 class="card-title"> <strong>List of all Rooms</strong> </h3>
              <p class="card-text"> </p>
              <a href="{{url('/validator/rooms')}}" class="btn btn-primary btn-block">See Rooms</a>
            </div>
          </div>
        </div>
        
        <div class="{{$col}}">
          <div class="card" >
          
            <div class="card-body ">
              <h3 class="card-title"> <strong>List of all Seminarists</strong> </h3>
              <p class="card-text"> </p>
              <a href="{{url('/validator/seminarists')}}" class="btn btn-primary btn-block">See Seminarists</a>
            </div>
          </div>
        </div>
       

      </div>

</div>









@endsection