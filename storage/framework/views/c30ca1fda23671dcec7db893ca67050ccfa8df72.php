

<?php $__env->startSection('viewer_content'); ?>
<!-- Add IntroJs styles -->

<link rel="stylesheet" href="\css\live_home.css">
<link rel="stylesheet" href="\css\circleElements.css">
<link rel="stylesheet" href="\css\viewerHome.css">
<style>
@import    url('https://fonts.googleapis.com/css2?family=Zen+Kurenaido&display=swap');
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
@media  screen and (max-width: 810px) {
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
@media  screen and (max-width: 600px) {
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
@media  screen and (max-width: 600px) {
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
  top: 25vh;
  
}

</style>

<div  id="body">
  <!--IFRAME FACEBOOOK-->
  <div class="container my-auto col-5  live_list">
    <div class="list-group">
     
      <?php $__empty_1 = true; $__currentLoopData = $seminars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
               
      <span data-toggle="tooltip" data-placement="top" title="Join Seminar" class="m-1 list-group-item list-group-item-action text-center">
      <?php echo e($ev->event_theme); ?>  
      <a href="<?php echo e(route('join',['id'=>$ev->id_room ,'_id'=>Crypt::encrypt('$event->id')])); ?>" class="btn_1 btn btn-primary float-right text-center"> 
      <i class="fas fa-play text-end"></i> 
      </a>
      </span>
      <?php if($loop->index  == 5): ?>
          <?php break; ?>
      <?php endif; ?>

 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<span class=" m-1 list-group-item list-group-item-action active  text-center">
  No Data 
</span>
<?php endif; ?>
    
<a href="<?php echo e(url('/schedule')); ?>" class="m-1 text-center list-group-item list-group-item-action active">
  View More 
</a>
    </div>
    
  </div>
<div class="container row div_live" >
   <?php if(!Auth::check()): ?>
   <a id="tutorial" class=""><i class="fas fa-chalkboard-teacher"></i>Start a Tutorial</a>
   <?php endif; ?>
   

</div> 
    <div class="row btn_join_us">
      <ul class="btn-group-vertical">

        



  
      </ul>
    </div>
  </div>
  </div>

</div>
<?php
  $l=1;
?>
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
            
            <img src="\img\icon\Audio.png" class="service-icon">
            <p class="service-title"><a href="#">Audio</a></p>
            <p class="service-para">Users of Chrome and FireFox browsers will benefit from high-quality, low-latency WebRTC audio. (Users of other browsers will seamlessly use Flash-based audio.)</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-12 mt-4 mt-md-0">
          <div class="icon-box">

            <img src="\img\icon\Breakout Rooms.png" class="service-icon">
            <p class="service-title"><a href="#">Breakout Rooms</a></p>
            <p class="service-para">You can group and place viewers into breakout rooms (full CNDP Platform sessions) for give number of minutes for increased collaboration.</p>
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
            <p class="service-para">viewers with visual disabilities can use JAWS screen reader to interact with CNDP Platform.</p>
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


<!--*****************************************************************************************************************************************************-->
<!--**************************************-->
<!--**************************************-->
<!-------------------------------------------------------Section Live small cards----------------------------------------->



<!-- section -->

<section id="clients" class="clients section mb-4" >
  


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
<?php if(!Auth::check()): ?>
<script>
$('#tutorial').click(function(){

introJs().setOptions({
  steps: 
  [{
    title: 'Welcome 👋',
    intro: 'Would you like to Explore our Platform?',
    position:'auto'
  },
  {
    element:document.querySelector('.join_us_l'),
    title:'Join Us',
    intro:'You can be Part of our Community as a Seminarist',
    position:'auto'
  },
  // {
  //   title:'Our Latest Live Event',
  //   element: document.querySelector('.live_list'),
  //   intro: 'Here you can Find or Join our Trend Seminars',
  //   position:'auto'
  // }
  // ,
  // {
  //   title:'Our Latest Live Event',
  //   element: document.querySelector('.btn_join_us'),
  //   intro: 'Here is a quick step to be part of our community by signing up as a user or a seminarist',
  //   position:'auto'
  // },
  // {
  //   title:'Information',
  //   element: document.querySelector('#click_for_home'),
  //   intro: 'hover the Icons for more information about the platform',
  //   position:'auto'
  // }
]
}).start();
});
</script>
<?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Seminaire-CNDP\resources\views/Viewer/viewer_home.blade.php ENDPATH**/ ?>