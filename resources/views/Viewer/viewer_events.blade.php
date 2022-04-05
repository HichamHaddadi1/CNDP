@extends('layouts.viewer_layout')

@section('viewer_content')
<link rel="stylesheet" href="\css\contactstylemain.css">
<style>
  #nav_events{
  background-color: #2f589e;
}
  .timer span
{
    color:#fff;
    font-family: 'Electrolize', sans-serif;
    font-weight: bolder;
    font-size: 20px;
    background-color: #2f589e;
    border-radius: 3px;
    width: auto;
    height: auto;
    padding: 4px;
    margin:2px;
}
#online{
  width: 100%;
  height: 100%;
  padding-left: 5em;
  padding-top:.5em;
  padding-bottom: 1.9em;
  /*background-color: #6F92F2;
  clip-path: polygon(100% 0, 100% 85%, 0 100%, 0 0);*/
}
#starting_soon{
   width: 100%;
  height: 100%;
  padding-left: 5em;
  
  padding-bottom: 1.9em;
 /* background-color: #6F92F2;
 clip-path: polygon(100% 0, 100% 100%, 0 100%, 0 14%);*/
}
#later{
  width: 100%;
  height: 100%;
  padding-left: 5em;
  
  padding-bottom: 1.9em;
}
</style>
<link rel="stylesheet" href="\css\Eventcards.css">
<div class="">
<!---->
<div id="online" class="container">
<h6 class="shadow-sm mb-1 rounded" id="h4_live"><i class="fas fa-broadcast-tower" style="color: white"></i>
    LIVE</h6>
<div class="owl-carousel">  
    @php
      $i=0;
      $j=0;
      $n=0;
    @endphp
    @foreach($users_rooms as $v)
    @if($v->event_statue==true &&\Carbon\Carbon::now()->lte($v->ending_at) && $v->isVerified=="Verified")
  
    
     
        <div class="card-grid-space">
          @php
            $l=0;
          @endphp
           <a class="card1" href="{{ route('join' , [$v->id_room,Crypt::encrypt($v->id)])}}" style="background-image: url(/upload/{{$v->avatar}});">
             <div>
               <div class="live-dot"></div>
               <h1>{{$v->name}}</h1>
               <p>{{$v->event_desc}}</p>
               <!--<div class="date">{--{$date_soon->toFormattedDateString()}--}</div>-->
               <div class="tags">
                 <div class="tag">Ending In
                  <div class='timer' id='{{$v->id}}' data-date='{{\Carbon\Carbon::parse($v->ending_at)->isoFormat('MMMM D YYYY, h:mm:ss a')/*->diff(\Carbon\Carbon::now())*/}}'>
                    {{
                        \Carbon\Carbon::parse($v->starting_at)->isoFormat('h:mm:ss a')/*->diff(\Carbon\Carbon::now())->format('%H:%I:%S')*/
                    }}
                  </div>
                 </div>
               </div>
             </div>
           </a>
         </div>
        @php
              $i++;
        @endphp
        @endif 
        @endforeach
    </div> 
</div>
  

@if($i==0)
    <div class="container card text-center" id="data_empty">
      <div class="card-body">
        <h4 class="card-title">No Live Streams at this Moment </h4>
        <h5 class="card-subtitle mb-2 text-muted">Comeback Later</h5>
      </div>
    </div>
@endif
<!--STARTTING SOON-->

<div id="starting_soon" class="container">
  <h6 class="shadow-sm mb-1 rounded" id="h4_soon"><i class="far fa-clock" style="color: white"></i>
   STREAMING SOON</h6>
  <div class="owl-carousel">
      @foreach($users_rooms as $v)
      @php
      $date_soon=\Carbon\Carbon::create($v->starting_at);
      @endphp
      @if(\Carbon\Carbon::now()->lte($v->starting_at) && $v->event_statue==false && \Carbon\Carbon::now()->diffInHours($v->starting_at)<24 && $v->isVerified=="Verified")
      <div class="card-grid-space">
   
        <a class="shadow card1" href="" style="background-image: url(/upload/{{$v->avatar}});">
          <div>
            
            <h1>{{$v->name}}</h1>
            <p>{{$v->event_desc}}</p>
            <div class="date">{{$date_soon->toFormattedDateString()}}</div>
            <div class="tags">
              <div class="tag">Starting In 
                 <div class='timer' id='{{$v->id}}' data-date='{{\Carbon\Carbon::parse($v->starting_at)->isoFormat('MMMM D YYYY, h:mm:ss a')/*->diff(\Carbon\Carbon::now())*/}}'>
              {{
                  \Carbon\Carbon::parse($v->starting_at)->isoFormat('h:mm:ss a')/*->diff(\Carbon\Carbon::now())->format('%H:%I:%S')*/
              }}
            </div>
          </div>
              
            </div>
            
          
         
          </div>
        </a>
      </div>
        
          @php
           $j++;
          @endphp
      @endif
      @endforeach
</div>
</div>
@if($j==0)
      <div class="container card text-center" id="data_empty">
        <div class="card-body">
          <h4 class="card-title">There is no Live Streams Happening Anytime Soon</h4>
          <h5 class="card-subtitle mb-2 text-muted">Comeback Later</h5>
        </div>
      </div>
      @endif
<!--***********************MONTHLY***********************-->

<div id="later" class="container">
  <h6 class="shadow-sm mb-1 rounded" id="h4_later">
    <i class="fas fa-clock" style="color: white">
   </i> LATER
  </h6>
  <div class="owl-carousel">
      @foreach($users_rooms as $v)
      @php
      $date_soon=\Carbon\Carbon::create($v->starting_at);
      @endphp
      @if(\Carbon\Carbon::now()->lte($v->starting_at) && \Carbon\Carbon::now()->diffInHours($v->starting_at)>24 && $v->isVerified=="Verified")
      <!--<div class="card shadow mb-5 bg-white rounded" style="width: 18rem;" style="text-align: center">
        <span class="later"><i class='fas fa-dot-circle' style="color:rgba(82, 82, 82, 0.623)"></i>
          OFFLINE</span>       
        <img id="card_img" class="rounded mx-auto d-block" src="/upload/{{$v->avatar}}"/>
          <div class="card-body ">
            <h5 class="card-title text-center">{{$v->name}}</h5>
            <p class="card-text text-left">{{$v->room_desc}}</p>
            <p class="card-text text-left">{{$v->event_theme}}</p>
            <p class="card-text" id="plus_tard_statue">Later</p>
          </div>
      </div> -->
      <div class="card-grid-space">
   
         <a class="shadow card1" href="" style="background-image: url(/upload/{{$v->avatar}});">
           <div>
             
             <h1>{{$v->name}}</h1>
             <p>{{$v->event_desc}}</p>
             <div class="date">{{$date_soon->toFormattedDateString()}}</div>
             <div class="tags">
               <div class="tag">Later</div>
             </div>
           </div>
         </a>
       </div>
      @php
        $n++;
      @endphp
      @endif
      @endforeach
     
    </div>
  </div>

  @if ($n==0)
  <div class="container card text-center mb-5" id="data_empty">
    <div class="card-body">
      <h4 class="card-title">There is no Live Streams Happening Soon </h4>
      <h5 class="card-subtitle mb-2 text-muted">Comeback Later</h5>
    </div>
  </div>
  @endif
</div>

<!--SCRIPT-->
  <script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
        items:4,
        rewind:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        animateOut: 'fadeOut',
        nav:true,
        navText : ["<i class='fas fa-arrow-circle-left' id='nav_text1'></i>","<i class='fas fa-arrow-circle-right' id='nav_text2'></i>"],        
        responsive:{
        0:{
            items:1
        },
        700:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

    });

 
var createCountdown = function (id, date) {
        let test = document.getElementById(id);
        var countDownDate = new Date(test.dataset.date).getTime();

        var x = setInterval(function () {
          var now = new Date().getTime();
          var distance = countDownDate - now;

          var hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
          );
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          test.innerHTML =`<span>${hours < 10 ? `0${hours}` : hours}</span><span>${minutes < 10 ? `0${minutes}` : minutes}</span><span>${seconds < 10 ? `0${seconds}` : seconds}</span> `;
          if (distance < 0) {
            clearInterval(x);
            test.innerHTML = "SOON";
          }
        }, 1000);
      };
      var allCounters = document.querySelectorAll(".timer"),
        arrayIntervals = [];

      allCounters.forEach(function (counter) {
        createCountdown(counter.getAttribute("id"), counter.dataset.date);
      });
    // USE PHP TO MAKE THIS ARRAY
    // POPULATE IT WITH OBJECTS THAT LOOK LIKE THIS
    // { id: "countdown-6", date: "2014-07-01" }

 
    $(window).on('load', function(){
        new WOW().init(); 
    });
    
  </script>
@endsection