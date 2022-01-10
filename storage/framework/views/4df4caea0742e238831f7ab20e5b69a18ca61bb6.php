

<?php $__env->startSection('viewer_content'); ?>

<style>
 .prev-nav{
  color:white;
  position: absolute;
  top:35%;
  left:0;
  background-color:#5757b8c4;
  font-size:30px ;
  margin-left:10px;
  border-radius:8px ;
  padding: 10px;
}
  .next-nav{
  color:white;
  position: absolute;
  top:35%;
  right:0;
  background-color:#5757b8c4 ;
  font-size:30px ;
  margin-right:10px;
  border-radius:8px ;
  padding: 10px;
}
#owl-demo .item img{
    display: block;
    width: 100%;
    max-height: 40vw;
}

.float_p{
    color: white;
    border-radius: 5px;
    background-color: #5757b8c4;
    text-align: center;
    top: 15%;
    left:25%;
    padding: 10px;
    position: absolute;
    width: 50%;
}
.nav-btn{
      height: 47px;
      position: absolute;
      width: 26px;
      cursor: pointer;
      top: 100px !important;
  }
.owl-prev.disabled,
.owl-next.disabled
  {
    pointer-events: none;
    opacity: 0.2;
  }

.prev-slide
  {
      background: url(nav-icon.png) no-repeat scroll 0 0;
      left: -33px;
  }
.next-slide
  {
      background: url(nav-icon.png) no-repeat scroll -24px 0px;
      right: -33px;
  }
  .owl-carousel .prev-slide:hover
  {
     background-position: 0px -53px;
  }
  .owl-carousel .next-slide:hover{
    background-position: -24px -53px;
  }
.img_partners
  {
    scale: 60%;
    width: 5%;
  }
  #h4_parters{
  border-radius: 5px;
  font-size: 18px;
  margin-left:39%;
  }
  
.home_body{
  margin-top:100px;
  background-color:#ffffff;
  /*box-shadow:0px 0px 30px  150px  #1F1A17;*/
  width: 100%;
}
#body{
  background-color: #1A2238;
 clip-path: ellipse(100% 100% at 50% 0%);
}
.live_section{
  padding: 10px;
  background-color:#ffffff;
}
.div_live {
    color: white;
    margin-left: 20%;
    margin-bottom: 50px;
    width: fit-content;
    font-size: 1em;
    overflow: hidden;
    padding: 40px;
}
.btn_watch{
  margin-top:20px;
  margin-left:50px ;
  text-decoration: none;
  color:white;
  padding: 10px;
  background-color: #1f1a1781;
  transition: all .35s;
}

.btn_watch:hover{
  color:white;
  background-color: #FF6A3D;
}

#online_content
{
  margin-left:15vw;
}
#live_img{
  
  width: 200px;
  height: 200px;
  object-fit: cover;
}
.stream_title{
  width: 8rem;
  display: inline;
  text-align: center;
  text-transform: uppercase;
  font-weight: bold;

}
.clients-carousel img
{
  filter: grayscale(100%);
}
.clients-carousel img:hover{
  filter: grayscale(0%);
}

.icon_live{
  position: absolute;
  width:60px;
  margin-top: -215px;
}
.b{
  border-style: none;
  padding: 10px;
  font-size: 12px;
  background-color: #1A2238;
  color:white;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 2px;
  border-radius: 2px;
  
}
.b:hover{
  background-color: #FF6A3D;
}
.stream_content{
/*padding-right:40px;*/
}
.certified_img{
  width: 100%;
}
.icon_soon{
  margin-top:-215px; 
  width: 45px;
  position: absolute;
}
</style> 
<div id="body">
  
  <div class="div_live">
  <?php
    $i=0;
    $j=0;
  ?>
    <div class="">
      <div class="owl-carousel1">
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $i=$loop->index;
        ?>
        <?php if($i==0 && $event->event_statue==true && \Carbon\Carbon::now()->diffInHours($event->starting_at)<=4): ?>
      
      <div class="float-left">
        <img class="d-block" id="live_img" src="\storage\images\<?php echo e($event->id_user); ?>\<?php echo e($event->avatar); ?>" alt="">
        <img class="icon_live" src="\img\icon\live.png">
      </div>
      <div  id="online_content">
        <div class="stream_content">
          <!--<h4 class="card-title">Small card</h4>-->
          <span class="stream_p"><?php echo e($event->name); ?></span>
          <span class="stream_title">| On Now</span>
         
          <p class="stream_p"><?php echo e($event->event_theme); ?></p>
          <p class="card-text">
           
           <span class='timer' id='<?php echo e($event->id); ?>' data-date='<?php echo e(\Carbon\Carbon::parse($event->ending_at)->isoFormat('MMMM D YYYY, h:mm:ss a')/*->diff(\Carbon\Carbon::now())*/); ?>'>
             <?php echo e(\Carbon\Carbon::parse($event->ending_at)->isoFormat('h:mm:ss a')/*->diff(\Carbon\Carbon::now())->format('%H:%I:%S')*/); ?>

          </span> 
            </p>
          <br>
          <a href="#" class="btn_watch t">Watch Live</a>
        </div>
      </div>
      <?php elseif($j==0 && $event->event_statue==false && $i==0): ?>
      <br>
      <br>
      <br>
      <div class="float-left">
        <img class="d-block" id="live_img" src="\storage\images\<?php echo e($event->id_user); ?>\<?php echo e($event->avatar); ?>" alt="">
        <img class="icon_soon" src="\img\icon\soon.png">
      </div>
      <div  id="online_content">
        <div class="stream_content">
          <!--<h4 class="card-title">Small card</h4>-->
          <span class="stream_title">Starting Soon</span>
          <span class="stream_p"><?php echo e($event->event_theme); ?></span>
        
          <br>
          <!--<a href="#" class="btn_watch t">Watch Live</a>-->
        </div>
      </div>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  </div>
</div>



<!-- section -->
<section id="clients" class="container clients section mb-4">
  <div class="container text_align_center">
    <div class="certified">
      <h2 style="color:#1A2238;font-weight: bolder;">Our Certifications</h2>
    <div class="my-slider">
      <div> <img class="certified_img" src="\img\certified\StanExpert.png" alt="Expert"> </div>
      <div> <img class="certified_img" src="\img\certified\StanMaster.png" alt="Master"> </div>
      <div> <img class="certified_img" src="\img\certified\StanUser.png" alt="User"> </div>
    </div>
</div>
      <div class="section-title heading_s1 full mt-5">
          <h2 style="color:#1A2238;font-weight: bolder;">Our Partners</h2>
      </div>
  </div>

  <div class="titres_par text-center">
      <button class="b tous btn-par btn-active" type="*">All</button>
      <button class="b type1 btn-par border-left" type="media">Media</button>
      <button class="b type2 btn-par border-left" type="partenaire-academique">Academic Partners</button>
      <button class="b tous btn-par border-left" type="organisme-fondation-instituts">Organization - Foundation - Institutes</button>
  </div> <!--fin titres -->  <br>
      <div class="owl-carousel clients-carousel" id="tous-par">
          <img src="<?php echo e(asset('/img/partners/01.png')); ?>" alt="Assabah" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/02.png')); ?>" alt="Fondation Orange" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/03.png')); ?>" alt="Laser Rs" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/04.png')); ?>" alt="OCP" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/05.jpeg')); ?>" alt="RAINBOW" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/06.png')); ?>" alt="Atlantic Radio" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/07.png')); ?>" alt="Fondation Orange" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/08.png')); ?>" alt="Hit Radio" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/09.png')); ?>" alt="azawan" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/10.png')); ?>" alt="2M" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/11.png')); ?>" alt="Assabah" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/12.png')); ?>" alt="Fondation Orange" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/13.png')); ?>" alt="Laser Rs" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/14.png')); ?>" alt="OCP" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/15.png')); ?>" alt="RAINBOW" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/16.png')); ?>" alt="SDCC" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/17.png')); ?>" alt="Atlantic Radio" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/18.png')); ?>" alt="Economiste" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/19.png')); ?>" alt="Hit Radio" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/20.png')); ?>" alt="azawan" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/21.jpg')); ?>" alt="2M" width="60" height="75"> 
          <img src="<?php echo e(asset('/img/partners/22.png')); ?>" alt="Assabah" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/23.png')); ?>" alt="Fondation Orange" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/24.png')); ?>" alt="Laser Rs" width="60" height="75"> 
          <img src="<?php echo e(asset('/img/partners/25.png')); ?>" alt="OCP" width="60" height="75">
      </div>
      <div class="owl-carousel clients-carousel" id="media">
        <img src="<?php echo e(asset('/img/partners/07.png')); ?>" alt="Fondation Orange" width="60" height="75">
        <img src="<?php echo e(asset('/img/partners/21.jpg')); ?>" alt="Assabah" width="60" height="75"> 
        <img src="<?php echo e(asset('/img/partners/27.png')); ?>" alt="Laser Rs" width="60" height="75">
      </div>
      <div class="owl-carousel clients-carousel" id="partenaire-academique">
          <img src="<?php echo e(asset('/img/partners/11.png')); ?>" alt="SDCC" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/16.png')); ?>" alt="Fondation Orange" width="60" height="75">
          <img src="<?php echo e(asset('/img/partners/17.png')); ?>" alt="RAINBOW" width="60" height="75">
      </div>
      <div class="owl-carousel clients-carousel" id="ofi">
        <img src="<?php echo e(asset('/img/partners/14.png')); ?>" alt="SDCC" width="60" height="75">
        <img src="<?php echo e(asset('/img/partners/28.png')); ?>" alt="SDCC" width="60" height="75">
        <img src="<?php echo e(asset('/img/partners/26.png')); ?>" alt="SDCC" width="60" height="75">
    </div>
  </div>
</section>
<!-- end section -->

<script>
    $(document).ready(function() {
 
     
$('.owl-carousel').owlCarousel({
        items:6,
        rewind:true,
        loop:true,
        margin:40,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        animateOut: 'fadeOut',
        responsive:{
        0:{
            items:1
        },
        700:{
            items:2
        },
        1000:{
            items:6
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
            test.innerHTML = "STARTING SOON";
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

var slider = tns({
    container: '.my-slider',
    slider:'page',
    autoplayDirection:'forward',
    items: 3,
    mouseDrag: true,
    swipeAngle: true,
    rewind:true,
    theme:'bootsrap',
    speed: 400,
    autoplay:true,
    responsive: {
      640: {
        edgePadding: 20,
        //gutter: 20,
      },
      700: {
        gutter: 30
      },
      900: {
        items: 3
      }
    }
  });
  slider.play();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BBB_Project\BBB_DEMO\resources\views/viewer/viewer_home.blade.php ENDPATH**/ ?>