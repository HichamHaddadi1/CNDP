@extends('layouts.viewer_layout')

@section('viewer_content')
<!-- Add IntroJs styles -->

<link rel="stylesheet" href="\css\live_home.css">
<link rel="stylesheet" href="\css\circleElements.css">
<link rel="stylesheet" href="\css\viewerHome.css">
<style>
@import  url('https://fonts.googleapis.com/css2?family=Zen+Kurenaido&display=swap');
#nav_home{
  background-color: #2f589e;
}
.img_circle_logo {
    position: absolute;
    width: 290px;
    left: 310px;
    margin-top: 90px;
}
.swiper_wrraper {
  position: relative;
  border-radius: 20px;
  max-width: 500px;
  height: auto;
}
/* .swiper_wrraper{
  right: 10%;
  top: 380%;
  position: absolute;
  display: inline-block;
  margin: 10px;
  background-color: #fff;
  -webkit-box-shadow: 1px 2px 8px .5px rgba(0,0,0,0.48);
  box-shadow: 1px 1px 8px .5px rgba(0,0,0,0.48);
  border-radius: 20px;
  width: 550px;
  height: auto;

} */
.swiper_header{
  padding: 30px;
  border-radius:20px 20px 0px 0px;
  box-shadow: 1px 1px 9px .1px rgba(0,0,0,0.48);
}
.swiper_header h2{
  text-transform: uppercase;
font-weight: bolder;
font-family: 'Zen Kurenaido', sans-serif;
}

.swiper_bottom{

  font-family: 'Zen Kurenaido', sans-serif;
  color: white;
  padding: 20px;
   border-radius:0px 0px 20px 20px;
  background-color:/*rgb(46, 74, 255) */ #3372ab;
  height: auto;
}
/********************************************************/
.swiper_bottom p{
  font-size:23px ;
  text-transform: capitalize;
}
.img_swiper_for_home{
  /* width: 20px;
 position: absolute;*/
  right:0%;
  top: 0%;
}
.img_swiper_calander{
 /* width: 10%;
   position: absolute;*/
   right:0%;
  top: 0%;
}
.img_swiper_chat{
  /* width: 10%;
  position: absolute;*/
  right:0%;
  top: 0%;
}
.img_swiper_events{
  /*width:10%;
   position: absolute;*/
   right:0%;
  top: 0%;}
.img_swiper_meeting_video{
 /* width: 10%;
   position: absolute;*/
   right:0%;
  top: 0%;
}
.img_swiper_meeting_room{
    /*width: 10%;*/
  /*position: absolute;*/
  right:0%;
  top: 0%;
}
.btn_join_us{
  position: absolute;
  right: 150px;
  top: 60%;
}
@media screen and (max-width: 810px) {
  #tutorial{
    display: none;
  }
  .btn_join_us {
  position: absolute;
  right: 105px;
  top: 60%;
}
  .swiper_wrraper{
  position:relative;
  top:80px;
  margin-left:221px;
  right: 10%;
  display: inline-block;
  border-radius: 20px;
  width: 550px;
  height: auto;
  margin-bottom: 100px;
  }
  .platform_info{
    margin: 5em 0em 0em -5em;
  }
  #body{
    clip-path: polygon(0 0, 100% 0%, 100% 100%, 0 100%, 0% 50%);
  }
  .footer-04
    {
      clip-path: polygon(0 0, 100% 0%, 100% 100%, 0 100%, 0% 50%);
    }
    .img_circle_logo {
  position: absolute;
  width: 200px;
  left: 120px;
  margin-top: 70px;
}
}
@media screen and (max-width: 600px) {
  #tutorial{
    display: none;
  }
  .btn_join_us {
    position: absolute;
  top: 80%;
  right: 80px;
}

  .swiper_wrraper{
    position: relative;
    top: 80px;
    right: 0%;
    height: auto;
    margin-bottom: 100px;
    margin-left: 120px;

  }
  .platform_info{
    margin: 5em 0em 0em -5em;
    }
  #body{
    clip-path: polygon(0 0, 100% 0%, 100% 100%, 0 100%, 0% 50%);
    }
    .footer-04
    {
      clip-path: polygon(0 0, 100% 0%, 100% 100%, 0 100%, 0% 50%);
    }

}
/*********************************************************************/
/***********************************************/
/*******************************/
.div_certified{

 background: white;
 margin: 40px;
 border-radius: 0 0 10px 10px;
}
.certified_header{
 margin: -25px;
 border-radius: 10px;
 padding: 15px;
 padding-left: 90px;
}
.certified_header img{
  width: 145px;
  display: block;
  margin-top: 9px;
}
.certified_body{
 margin-top:10px;
 color: black;
 padding:20px;
 font-size: 13px;
 text-align: justify;

}
.certified_body h2{
font-weight: bold;
}
#master01{
  background-color: #ED5351;
}
#expert01{
  background-color:#5D6AB0 ;
}
#user01{
  background-color: #2FAAA5;
}

.btn_join_us ul{
  list-style: none;
  padding: 5px;
}

.platform_desc p{
 font-size: 20px;
  color:black;
}
.present_ul{
  font-size: 17px;
  color: #3b3b3b
}
.platform_desc{
  margin-top:80px;
}
@media screen and (max-width: 600px) {
  .data_events{
  margin-top: 0%;
}

}
.service-section .icon-box {
	margin-bottom: 20px;
	padding: 30px;
	border-radius: 6px;
	background-color: #f8f9fa;
}
.service-section .icon-box:hover .service-title a {
	color: #41A1FD;
}
.service-section .icon-box .service-icon {
	float: left;
	color: #41A1FD;
	font-size: 40px;
  max-width: 50px;
}
.service-section .icon-box .service-title {
	margin-left: 70px;
	font-weight: 700;
	margin-bottom: 15px;
	font-size: 18px;
	line-height: 1.2;
}
.service-section .icon-box .service-title a {
	color: #556270;
	transition: 0.3s;
	text-decoration: none;
}
.service-section .icon-box .service-para {
	margin-left: 70px;
	line-height: 24px;
	font-size: 14px;
}
.service-section .service-main-heading {
	color: #556270;
	padding: 0;
	margin-bottom: 20px;
	line-height: 1;
	font-size: 60px;
	font-weight: 600;
}
.live_list{
  top: 20vh;
  left: 30vw;
}

</style>

<div  id="body">
  <!--IFRAME FACEBOOOK-->
  <div class="container my-auto col-4 mt-10 live_list">
    <div class="list-group">
     
      @forelse($seminars as $ev)
               
      <span data-toggle="tooltip" data-placement="top" title="Join Seminar" class="list-group-item list-group-item-action text-center">
      {{$ev->event_theme}}  
      <a href="{{route('join',['id'=>$ev->id_room ,'_id'=>Crypt::encrypt('$event->id')])}}" class="btn_1 btn btn-primary float-right text-center"> 
      <i class="fas fa-play text-end"></i> 
      </a>
      </span>
      @if ($loop->index  == 5)
          @break
      @endif

 @empty
<span class="list-group-item list-group-item-action active ">
  No Data  <i class="fas fa-play text-end"></i> 
</span>
@endforelse
    
<a href="{{url('/schedule')}}" class="text-center list-group-item list-group-item-action active">
  View More 
</a>
    </div>
    
  </div>
{{-- <div class="container row div_live" >
   @if(!Auth::check())
   <a id="tutorial" class=""><i class="fas fa-chalkboard-teacher"></i>Start a Tutorial</a>
   @endif
   

  @php
    $i=0;
    $j=0;
  @endphp
  <div class="col-lg data_events">
        @foreach ($events as $event)
        @php
          $date_soon=\Carbon\Carbon::create($event->starting_at);
        @endphp
        @if ($i==0 && $event->event_statue==true /*&& \Carbon\Carbon::now()->diffInHours($event->ending_at)<=4 */&& $event->isVerified=="Verified" && \Carbon\Carbon::now()->lte($event->ending_at))
        @php
          $i++;
          $j++;
        @endphp
       <!-- @if(Bigbluebutton::isMeetingRunning($event->id_room) == false)
         $event->event_statue = 1;
         $event->update();
       @endif -->
      
      <div class="col container text-align-center">
      <div class="blog-card" style="-webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
        <div class="meta">
          <div class="photo" style="background-image: url(/upload/{{$event->avatar}})"></div>
          <ul class="details">
            @if($event->event_statue == 1)
            <li class="author">{{$event->name}}</li>
            <li class="date">{{$date_soon->toFormattedDateString()}}</li>
            <li class="tags">
            </li>
            @endif
          </ul>
        </div>
        <div class="description">
          <h1 style="color:white;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;max-width: 40%"><span class="fas fa-broadcast-tower" style="color:#2f589e;"></span> {{$event->event_theme}}</h1>
          <h2> ON AIR</h2>
          <p> {{$event->event_desc}}</p>
          <p>
            <p class="card-text text-center">
              <div class='timer' id='{{$event->id}}' data-date='{{\Carbon\Carbon::parse($event->ending_at)->isoFormat('MMMM D YYYY, h:mm:ss a')/*->diff(\Carbon\Carbon::now())*/}}'>
                {{
                    \Carbon\Carbon::parse($event->starting_at)->isoFormat('h:mm:ss a')/*->diff(\Carbon\Carbon::now())->format('%H:%I:%S')*/
                }}
              </div>
          </p>
          <p class="read-more">
            <a class="btnstyle" href="{{ route('join' , $event->id_room)}}" style="color:#fff;">Join Now</a>
          </p>

        </div>
      </div>
    </div>
    
      @elseif ($i==0 && $event->event_statue==false && \Carbon\Carbon::now()->lte($event->starting_at) && $event->isVerified=="Verified" && \Carbon\Carbon::now()->diffInHours($event->starting_at)<=10)
      @php
      $i++;
      $j++;
    @endphp

      <div class="blog-card">
        <div class="meta">
          <div class="photo" style="background-image: url(/upload/{{$event->avatar}});height:100%;width:100%;"></div>
          <ul class="details">
            <li class="author"><a href="#">{{$event->name}}</a></li>
            <li class="date">{{$date_soon->toFormattedDateString()}}</li>
          </ul>
        </div>
        <div class="description">
          <h1 style="max-width: 40%;color:white;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;" class="f-w-600">{{$event->event_theme}}</h1>
          <h2><i class="fas fa-stopwatch"></i>Starting Soon</h2>
          <p style="word-wrap: break-word;width: 300px;"> {{$event->event_desc}}</p>
          <p class="card-text text-center">
            <div class='timer' id='{{$event->id}}' data-date='{{\Carbon\Carbon::parse($event->starting_at)->isoFormat('MMMM D YYYY, h:mm:ss a')/*->diff(\Carbon\Carbon::now())*/}}'>
              {{
                  \Carbon\Carbon::parse($event->starting_at)->isoFormat('h:mm:ss a')/*->diff(\Carbon\Carbon::now())->format('%H:%I:%S')*/
              }}
            </div>
          </p>
          <p class="read-more">
            <a class="btnstyle first_button" href="{{route('viewer_events')}}" style="color:#fff;">View More</a>
          </p>
        </div>
  </div>
     @endif
     @php
       $j=$i;
     @endphp
      @endforeach
   
      @if($j==0)
      @php
       $i++;
       $j++;
      @endphp
      <div class="col-lg blog-card combacklater">
       <div class="description">
         <h1 style="color:white;" class="f-w-600">No Live Streams at this Moment</h1>
         <h2><i class="fas fa-stopwatch"></i>Comeback Later</h2>
         <p class="read-more">
           <a class="btnstyle first_button" href="{{route('viewer_events')}}" style="color:#fff;">View More</a>
         </p>
       </div>
      </div>
     @endif
   
</div> --}}
    <div class="row btn_join_us">
      <ul class="btn-group-vertical">

        {{-- <li><a href="{{route('register')}}" class="btn-group btnstyle2" style="color: #fff">Register as a Seminarist</a></li> --}}



  
      </ul>
    </div>
  </div>
  </div>

</div>
@php
  $l=1;
@endphp
<!--**************************************-->

<!--**************************************-->
<div class="platform_desc container">
  <h1 style="color: #2f589e;font-weight: bolder;text-align: center;font-size: 50px;text-transform: capitalize">Presentation</h1>
  <p>
    This Platform is another achievement of the CNDP for an innovative and creative integration of Information and Communication Technologies, the CNDP Seminars Platform has come to enrich the scope of the comission's work., and to enable the organization seminars of :
  <ul class="present_ul container">
    <li>Strengthening the skills of learners on various topics of their academic courses</li>
    <li>Strengthening the skills of teachers and various pedagogical bodies by calling upon and with the participation of Moroccan and international expertise</li>
    <li>Continuous training and development of various pedagogical bodies on various topics  </li>
  </ul>
  </p>
  </div>
  <!--//////////////////////////////////////////////////////////////////-->

  <section class="service-section py-5">
    <div class="container">
      <div class="row justify-content-center py-3">
        <div class="col-md-8 col-12 text-center">
          <p class="service-main-heading">Features</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-6 col-12">
          <div class="icon-box">
            {{-- <i class="fa fa-briefcase "></i> --}}
            <img src="\img\icon\Audio.png" class="service-icon">
            <p class="service-title"><a href="#">Audio</a></p>
            <p class="service-para">Users of Chrome and FireFox browsers will benefit from high-quality, low-latency WebRTC audio. (Users of other browsers will seamlessly use Flash-based audio.)</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">

            <img src="\img\icon\Breakout Rooms.png" class="service-icon">
            <p class="service-title"><a href="#">Breakout Rooms</a></p>
            <p class="service-para">You can group and place viewers into breakout rooms (full Tamkine Platform sessions) for give number of minutes for increased collaboration.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">

            <img src="\img\icon\chat.png" class="service-icon">
            <p class="service-title"><a href="#">Chat</a></p>
            <p class="service-para">You can interact with viewers through public and private chat.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">
            <img src="\img\icon\Emoji.png" class="service-icon">
            <p class="service-title"><a href="#">Emoji</a></p>
            <p class="service-para">viewers can raise hand and use emoji icons for feedback.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">
            <img src="\img\icon\polling.png" class="service-icon">
            <p class="service-title"><a href="#">Polling</a></p>
            <p class="service-para">You can poll viewers anytime to increase engagement.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">
            <img src="\img\icon\Presentation.png" class="service-icon">
            <p class="service-title"><a href="#">Presentation</a></p>
            <p class="service-para">You can upload any PDF presentation or MS office document. The Platform keeps everyone in sync with your current slide, zoom, pan, annotations, and mouse pointer.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">
            <img src="\img\icon\Record.png" class="service-icon">
            <p class="service-title"><a href="#">Record and Playback</a></p>
            <p class="service-para">Your sessions can be recorded for later playback by viewers.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">
            <img src="\img\icon\Screen-reader.png" class="service-icon">
            <p class="service-title"><a href="#">Screen Reader</a></p>
            <p class="service-para">viewers with visual disabilities can use JAWS screen reader to interact with Tamkine Platform.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">
            <img src="\img\icon\Screen-sharing.png" class="service-icon">
            <p class="service-title"><a href="#">Desktop Sharing</a></p>
            <p class="service-para">You can broadcast your desktop for all users to see (requires latest version of Java for presenter only).</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">
            <img src="\img\icon\webcam.png" class="service-icon">
            <p class="service-title"><a href="#">Web Cam</a></p>
            <p class="service-para">Multiple users can share their webcam at the same time. There is no built-in limit on the number of simultaneously active webcams.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">
            <img src="\img\icon\whiteboard.png" class="service-icon">
            <p class="service-title"><a href="#">Whiteboard</a></p>
            <p class="service-para">The whiteboard controls let you annotate key parts of your presentation.</p>
          </div>
        </div>


        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">
            <img src="\img\icon\live.png" class="service-icon">
            <p class="service-title"><a href="#">Live Captioning</a></p>
            <p class="service-para">
              You can enter live captions for viewers. These captions will later appear as subtitles in recordings.
              </p>
          </div>
        </div>
      </div>
    </div>
  </section>

<!--**************************************-->
{{--
<div class="platform_info row">
  <img  class="img_circle_logo" src="\img\home_circle\TamkineCercle.png" alt="">
<ul class='col-xl circle-container'>
  <li id="click_calander"><img  src='\home_icons\calander.png'>
  <ul class="ul_sub"><li class="li_sub">Calendar</li></ul>
  </li>
  <li id="click_chat"><img class="img_chat" src='\home_icons\CHAT.png'>
    <ul class="ul_sub"><li class="li_sub">Chat</li></ul>
  </li>
  <li id="click_events"><img class="img_events" src='\home_icons\events.png'>
    <ul class="ul_sub"><li class="li_sub">Events</li></ul>
  </li>
  <li id="click_meeting_room"><img class="img_meeting_room" src='\home_icons\meeting-room.png'>
    <ul class="ul_sub"><li class="li_sub">Meeting Room</li></ul>
  </li>
  <li id="click_meeting_video"><img class="img_meeting_room" src='\home_icons\meetings.png'>
    <ul class="ul_sub"><li class="li_sub">Meetings & Video Webinars</li></ul>
  </li>
  <li id="click_for_home"><img src='\home_icons\tamkine_home.png'>
    <ul class="ul_sub"><li class="li_sub">Tamkine For Home</li></ul>
  </li>
</ul>
<div class="swiper_wrraper col-8">
  <!--TAMKINE FOR HOME-->
  <div class="swiper_for_home" >
      <div class="swiper_header row">
        <h2 class="col">Tamkine For Home</h2>
        <img class="img_swiper_for_home col-4" src="\home_icons\tamkine_home.png">
      </div>
      <div class="swiper_bottom row">
        <p>
          bring all the functionalities to the comfort of your home, without the need of going out to the office
        </p>
      </div>
  </div>

  <!--TAMKINE EVENTS-->
  <div class="swiper_events">
    <div class="swiper_header row">
      <h2 class="col">Events</h2>
      <img class="img_swiper_events col-4" src="\img\home_circle\event.png">
    </div>
    <div class="swiper_bottom row">
      <p>
        Events where everyone can participate and share or acquire knowledge with our experts
      </p>
    </div>
  </div>
  <!--TAMKINE MEETING & VIDEO WEBINARS-->
  <div class="swiper_meeting_video">
    <div class="swiper_header row">
      <h2 class="col">MEETINGS & VIDEO WEBINARS</h2>
      <img class="img_swiper_meeting_video col-5" src="\home_icons\meetings.png">
    </div>
    <div class="swiper_bottom row">
      <p>
          Online meetings where we gather experts in different fields to share their knowledge and experiences and help participants
      </p>
    </div>
  </div>
  <!--TAMKINE CALANDER-->
  <div class="swiper_calander">
    <div class="swiper_header row">
      <h2 class="col">CALENDAR</h2>
      <img src="\home_icons\calander.png" alt="" class="img_swiper_calander col-4">
    </div>
    <div class="swiper_bottom row">
      <p>
        Public calendar that shows all the events happening in the platform with the option to join
      </p>
    </div>
  </div>

  <!--TAMKINE CHAT-->
  <div class="swiper_chat" >
    <div class="swiper_header row">
      <h2 class="col">CHAT</h2>
      <img class="img_swiper_chat col-4" src="\home_icons\CHAT.png">
    </div>
    <div class="swiper_bottom row">
      <p>
        The possibilty to chat with all the attendees in a public meeting or in a private session , as long as the meeting is running
      </p>
    </div>
  </div>

    <!--TAMKINE MEETING ROOM-->
    <div class="swiper_meeting_room">
      <div class="swiper_header row">
        <h2 class="col">MEETING ROOM</h2>
        <img class="img_swiper_meeting_room col-4" src="\img\home_circle\Tamkine_rooms.png">
      </div>
      <div class="swiper_bottom row">
        <p>
          we offers virtual rooms that can hold events as in real life
        </p>
      </div>
    </div>
</div>
</div> --}}

<!--*****************************************************************************************************************************************************-->
<!--**************************************-->
<!--**************************************-->
<!-------------------------------------------------------Section Live small cards----------------------------------------->
{{--
<section id="section_soon" class="cards-wrapper">
  <div class="live_h2" >
    <h2>Live</h2>
  </div>
  <div class="container owl-carousel">
   @foreach ($events as $event)
  @if($event->event_statue==true && \Carbon\Carbon::now()->diffInHours($event->ending_at)<=4 && $event->isVerified=="Verified")
   <div class="card-grid-space">
   @php
     $l=0;
   @endphp
    <a class="card" href="{{ route('join' , $event->id_room)}}" style="background-image: url(/upload/{{$event->avatar}});">
      <div>
        <div class="live-dot"></div>
        <h1>{{$event->name}}</h1>
        <p>{{$event->event_desc}}</p>
        <div class="date">{{$date_soon->toFormattedDateString()}}</div>
        <div class="tags">
          <div class="tag">Join Now</div>
        </div>
      </div>
    </a>
  </div>

  @endif
   @endforeach
  </div>
  @if($l==1)
  <div class="card_no_stream">
  <a class="card" href="{{ route('viewer_events')}}" style="background-color: black">
    <div>
      <h1>No Live Streams</h1>
      <div class="tag">View More</div>
    </div>
  </a>
  </div>
  @php
    $l++;
  @endphp
  @endif
</section> --}}


<!-- section -->

<section id="clients" class="clients section mb-4" >
  {{-- <div class="certified_container text_align_center">
    <div class="certified ">
      <h2 style="color:#2f589e;font-weight: bolder;">Our Certifications</h2>
    <div class="certified_container row">
      <div class="div_certified col shadow">
        <div class="certified_header" id="user01">
            <img src="\img\icon\IconUser.png" alt="user icon">
        </div>
        <div class="certified_body">
          <h2>User</h2>
            <p>This is the first level of training and certification on the Tamkine tutoring platform. It is issued to teachers after they have completed several hours of training and learned how to use the platform correctly without needing assistance. Still, the certified teacher does not have the expertise and required training to successfully tutor others to use the platform. </p>
        </div>

      </div>


      <div class="div_certified col shadow">
        <div class="certified_header" id="master01">
            <img src="\img\icon\IconMaster.png" alt="master icon">
        </div>
        <div class="certified_body">
          <h2>Master</h2>
            <p> Having access to this second level of training and to the corresponding certificate is not possible without obtaining the User certificate. The Tamkine Master Certificate represents the second level of teacher training and certification on the Tamkine Tutoring Platform; it reflects teachers' mastery, their ability to provide assistance and coaching during their first contact with the Platform.
            </p>
        </div>
      </div>
      <div class="div_certified col shadow">
        <div class="certified_header" id="expert01">
            <img src="\img\icon\IconExpert.png" alt="expert icon">
        </div>
        <div class="certified_body">
          <h2>Expert</h2>
            <p>Having access to this third level of training and to the corresponding certificate is in turn conditioned by obtaining the Master's degree. The Tamkine Expert Certificate represents the third level of training and certification on the Tamkine Tutoring Platform; it translates total expertise on the components of the Platform, the ability to make suggestions for improvement, and above all, the ability to organize and deliver training and certification sessions to teachers applying for the first two levels. </p>
        </div>
      </div>
    </div>
</div>
</div> --}}

{{-- <div class="container partners">
      <div class="section-title heading_s1 full">
          <h2 style="color:#2f589e;font-weight: bolder;">Our Partners</h2>
      </div>


  <div class="titres_par text-center">
      <button class="b tous btn-par btn-active" type="*">All</button>
      <button class="b type1 btn-par border-left" type="media">Media</button>
      <button class="b type2 btn-par border-left" type="partenaire-academique">Academic Partners</button>
      <button class="b tous btn-par border-left" type="organisme-fondation-instituts">Organization - Foundation - Institutes</button>
  </div> <!--fin titres -->

  <br>
      <div class="owl-carousel clients-carousel" id="tous-par">
          <img  class="partners_img" src="{{ asset('/img/partners/01.png') }}" alt="Assabah" style=" background: transparent;" >
          <img class="partners_img"  src="{{ asset('/img/partners/02.png') }}" alt="Fondation Orange"  >
          <img class="partners_img"  src="{{ asset('/img/partners/03.png') }}" alt="Laser Rs"  >
          <img class="partners_img"  src="{{ asset('/img/partners/04.png') }}" alt="OCP"  >
          <img class="partners_img"  src="{{ asset('/img/partners/05.jpeg') }}" alt="RAINBOW"  >
          <img class="partners_img"  src="{{ asset('/img/partners/06.png') }}" alt="Atlantic Radio"  >
          <img class="partners_img"  src="{{ asset('/img/partners/07.png') }}" alt="Fondation Orange"  >
          <img class="partners_img"  src="{{ asset('/img/partners/08.png') }}" alt="Hit Radio"  >
          <img class="partners_img"  src="{{ asset('/img/partners/09.png') }}" alt="azawan"  >
          <img class="partners_img"  src="{{ asset('/img/partners/10.png') }}" alt="2M"  >
          <img class="partners_img"  src="{{ asset('/img/partners/11.png') }}" alt="Assabah"  >
          <img class="partners_img"  src="{{ asset('/img/partners/12.png') }}" alt="Fondation Orange"  >
          <img class="partners_img"  src="{{ asset('/img/partners/13.png') }}" alt="Laser Rs"  >
          <img class="partners_img"  src="{{ asset('/img/partners/14.png') }}" alt="OCP"  >
          <img class="partners_img"  src="{{ asset('/img/partners/15.png') }}" alt="RAINBOW"  >
          <img class="partners_img"  src="{{ asset('/img/partners/16.png') }}" alt="SDCC"  >
          <img class="partners_img"  src="{{ asset('/img/partners/17.png') }}" alt="Atlantic Radio"  >
          <img class="partners_img"  src="{{ asset('/img/partners/18.png') }}" alt="Economiste"  >
          <img class="partners_img"  src="{{ asset('/img/partners/19.png') }}" alt="Hit Radio"  >
          <img class="partners_img"  src="{{ asset('/img/partners/20.png') }}" alt="azawan"  >
          <img class="partners_img"  src="{{ asset('/img/partners/21.jpg') }}" alt="2M"  >
          <img class="partners_img"  src="{{ asset('/img/partners/22.png') }}" alt="Assabah"  >
          <img class="partners_img"  src="{{ asset('/img/partners/23.png') }}" alt="Fondation Orange"  >
          <img class="partners_img"  src="{{ asset('/img/partners/24.png') }}" alt="Laser Rs"  >
          <img class="partners_img"  src="{{ asset('/img/partners/25.png') }}" alt="OCP"  >
      </div>
      <div class="owl-carousel clients-carousel justify-content-center" id="media">
        <img src="{{ asset('/img/partners/07.png') }}" alt="Fondation Orange"  >
        <img src="{{ asset('/img/partners/21.jpg') }}" alt="Assabah"  >
        <img src="{{ asset('/img/partners/27.png') }}" alt="Laser Rs"  >
      </div>
      <div class="owl-carousel clients-carousel" id="partenaire-academique">
          <img src="{{ asset('/img/partners/11.png') }}" alt="SDCC"  >
          <img src="{{ asset('/img/partners/16.png') }}" alt="Fondation Orange"  >
          <img src="{{ asset('/img/partners/17.png') }}" alt="RAINBOW"  >
      </div>
      <div class="owl-carousel clients-carousel" id="ofi">
        <img src="{{ asset('/img/partners/14.png') }}" alt="SDCC"  >
        <img src="{{ asset('/img/partners/28.png') }}" alt="SDCC"  >
        <img src="{{ asset('/img/partners/26.png') }}" alt="SDCC"  >
    </div>
  </div> --}}
</div>
</section>
<!-- end section -->

<script>
$(document).ready(function() {
$('.owl-carousel').owlCarousel({
        items:4,
        rewind:true,
        margin:200,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        animateOut: 'fadeOut',
        responsive:{
        0:{
            items:2
        },
        700:{
            items:2
        },
        1000:{
            items:4
        }
    }
});
});

/******************************************************/

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
            test.innerHTML = "";
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

  $("#tous-par").css("display",'block');
    $("#media").css("display",'none');
    $("#partenaire-academique").css("display",'none');
    $("#ofi").css("display",'none');
  $(this).addClass("btn-active shadow");
    $('.btn-par').removeClass("btn-active shadow");
$('button.b[type]').click(function () {
  // var type=document.querySelectorAll('button.b[type]');
  //   let table= [];
  //   type.forEach(function(t) {
  //     table.push(t.getAttribute('type'));
  //   })
  var type = $(this).attr('type');
  if(type=="*"){
    $("#tous-par").css("display",'block');
    $("#media").css("display",'none');
    $("#partenaire-academique").css("display",'none');
    $("#ofi").css("display",'none');
  }

  else if(type=="media"){
    $("#media").css("display",'block');
    $("#partenaire-academique").css("display",'none');
    $("#tous-par").css("display",'none');
    $("#ofi").css("display",'none');
  }

  else if(type=="partenaire-academique"){
    $("#partenaire-academique").css("display",'block');
    $("#media").css("display",'none');
    $("#tous-par").css("display",'none');
    $("#ofi").css("display",'none');
  }

  else if(type=="organisme-fondation-instituts"){
    $("#ofi").css("display",'block');
    $("#partenaire-academique").css("display",'none');
    $("#media").css("display",'none');
    $("#tous-par").css("display",'none');
  }

})


</script>
@if(!Auth::check())
<script>
$('#tutorial').click(function(){

introJs().setOptions({
  steps: [{
    title: 'Welcome 👋',
    intro: 'Would you like to Explore our Platform?',
    position:'auto'
  },
  {
    element:document.querySelector('.join_us_l'),
    title:'Join Us',
    intro:'You can be Part of our Community as a User or a Seminarist',
    position:'auto'
  },

  {
    title:'Our Latest Live Event',
    element: document.querySelector('.data_events'),
    intro: 'Here you can Find or Join our Trend Events',
    position:'auto'

  }
  ,

  {
    title:'Our Latest Live Event',
    element: document.querySelector('.btn_join_us'),
    intro: 'Here is a quick step to be part of our community by signing up as a user or a seminarist',
    position:'auto'

  },
  {
    title:'Information',
    element: document.querySelector('#click_for_home'),
    intro: 'hover the Icons for more information about the platform',
    position:'auto'
  }

,{
  element:document.querySelector('.partners'),
  title:'Partners',
  intro:'Partners of our Foundation',
  position:'auto'
}

  ]
}).start();
});
</script>
@endif
<script>
  $(document).ready(function(){

    $('.swiper_calander').css("display",'none');
    $('.swiper_events').css("display",'none');
    $('.swiper_meeting_room').css("display",'none');
    $('.swiper_meeting_video').css("display",'none');
    $('.swiper_chat').css("display",'none');
    $('.swiper_for_home').css("display",'none');

  $('#click_for_home').hover(function(){

    $('.swiper_calander').css("display",'none').hide();
    $('.swiper_events').css("display",'none').hide();
    $('.swiper_meeting_room').css("display",'none').hide();
    $('.swiper_meeting_video').css("display",'none').hide();
    $('.swiper_chat').css("display",'none').hide();
    $('.swiper_for_home').fadeIn();

  });

$('#click_calander').hover(function(){

    $('.swiper_events').css("display",'none').hide();
    $('.swiper_meeting_room').css("display",'none').hide();
    $('.swiper_meeting_video').css("display",'none').hide();
    $('.swiper_chat').css("display",'none').hide();
    $('.swiper_for_home').css("display",'none').hide();
    $('.swiper_calander').fadeIn();

  });

  $('#click_chat').hover(function(){

    $('.swiper_calander').css("display",'none').hide();
    $('.swiper_events').css("display",'none').hide();
    $('.swiper_meeting_room').css("display",'none').hide();
    $('.swiper_meeting_video').css("display",'none').hide();
    $('.swiper_chat').fadeIn();
    $('.swiper_for_home').css("display",'none').hide();

  });

  $('#click_events').hover(function(){

    $('.swiper_calander').css("display",'none').hide();
    $('.swiper_events').fadeIn();
    $('.swiper_meeting_room').css("display",'none').hide();
    $('.swiper_meeting_video').css("display",'none').hide();
    $('.swiper_chat').css("display",'none').hide();
    $('.swiper_for_home').css("display",'none').hide();

  });




$('#click_meeting_room').hover(function(){

    $('.swiper_calander').css("display",'none').hide();
    $('.swiper_events').css("display",'none').hide();
    $('.swiper_meeting_room').fadeIn();
    $('.swiper_meeting_video').css("display",'none').hide();
    $('.swiper_chat').css("display",'none').hide();
    $('.swiper_for_home').css("display",'none').hide();

  });


  $('#click_meeting_video').hover(function(){

      $('.swiper_calander').css("display",'none').hide();
      $('.swiper_events').css("display",'none').hide();
      $('.swiper_meeting_room').css("display",'none').hide();
      $('.swiper_meeting_video').fadeIn();
      $('.swiper_chat').css("display",'none').hide();
      $('.swiper_for_home').css("display",'none').hide();
  });



  });
</script>
@endsection
