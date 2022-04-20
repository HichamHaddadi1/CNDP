@extends('layouts.viewer_layout')


@section('viewer_content')
<link rel="stylesheet" href="\css\joinus.css">
<link rel="stylesheet" href="\css\contactstylemain.css">
<style>
  .nav-link{
    color:white;
  }

</style>
<section class="wrapper">
    <div class="container text-center">
    
    <div class="row">
   <div class="col-md-4 left_card"><div class="card text-white card-has-bg " style="background-image:url('/img/student.jpg');">
           <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech,street" alt="">
          <div class="card-img-overlay d-flex flex-column">
           
           <div class="card-body">
             <!-- <small class="card-meta mb-2">Become A</small>
              <h4 class="card-title mt-0 "><a class="text-white" herf="#">Viewer</a></h4>-->
              <p>You are a student, a parent or a teacher please click on register as a user and fill in the form to create an account in order to  follow and be up to date of all the seminars via the  calendar of your profile</p>
            </div>
            <div class="card-footer">
              <a href="{{route('userRegister')}}" class="nav-link btn btn-primary" style="font-size: 12px"> Register as User </a>
            </div>
          </div>
        </div></div>
     

       <div class="col-md-4 right_card"><div class="card text-white card-has-bg click-col" style="background-image:url('/img/teacher.jpg');">
           <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tree,nature" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
          <div class="card-img-overlay d-flex flex-column">
           <div class="card-body">
             <!-- <small class="card-meta mb-2">Become A</small>
              <h4 class="card-title mt-0 "><a class="text-white" herf="#">Streamer</a></h4>-->
             <p>To share your expertise with those who need it, and benefit from all the features of  this platform to organize your seminars in the best possible way,, please click on register as a  seminarist and  fill in the  form</p>
            </div>
            <div class="card-footer">
              <a href="{{route('register')}}" class="nav-link btn btn-primary" style="font-size: 12px"> Register as Seminarist </a>
            </div>
          </div>
        </div></div>
   
    
  </div>
    
  </div>
  </section>



@endsection