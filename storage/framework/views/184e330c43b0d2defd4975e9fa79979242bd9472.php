

<?php $__env->startSection('viewer_content'); ?>
<style>

#nav_schedule{
  background-color: #2f589e;
}
.clander-container{
 
max-width: 100%;
max-height: 50%;
margin-top: 0;
margin-right: 5%;
margin-left: 5%;
}
.event_info {
  max-width: 50%;
  margin-left: 5%;
  margin-top: 2%;
}
@media  screen and (max-width: 600px) {
  .fc-header-title h2{
  font-size: 10px;
  padding: 5px;
}

.fc-header-left span {
  font-size: 10px;
  
}

.fc-header-right span{
   font-size: 10px;
}
.clander-container {
  max-height: 10%;
max-width: 90%;
margin-left: 20px;
margin-bottom: 10%;
}
.event_info {
  min-width:90%; 
  margin-left:5%; 
  margin-top:1%;
}
}
</style>
<div class="event_info "style="">
  <h3 class="display-4">Event Schedule</h3>
  <div class="alert alert-info p-3 ">
  <p class="text-muted h3">All the events are listed here , and you can have access to all of them and be part of <strong>CNDP</strong>  community</p>
  </div>
 

</div>
<div class=" clander-container" style="" >

  

  <div class="modal fade" id="schedule-edit" tabindex='-1'>
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header bg-info">
              <h4 class="modal-title ml-auto " style="color:white;">Event Informations</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
          <div class="form-group">
        <div class="row mb-3">
          <div class="col">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="event-title" readonly>
          </div>
          <div class="col">
              <label for="title">Presenter</label>
              <input type="text" class="form-control" id="event-presenter" readonly>
          </div>
          </div>
          <div class="form-group">
              <label for="start">Start</label>
              <input type="text" class="form-control" id="event-start" readonly>
          </div>
          <div class="form-group mb-5" >
              <label for="end">End</label>
              <input type="text" class="form-control" id="event-end"readonly>
          </div>
          <!-- <div class="form-group">
          <label for="invite-link">Invite Link <span class="text-muted" id="copy"></span></label>
          <input type="text" class="form-control" id="invite-link" onclick="myFunction()" value="" readonly>
          </div> -->
        
          <div class="form-group ">
            <a href="" class="btn btn-outline-primary btn-md form-control" id="invite-link"><i class="fas fa-door-open"></i>&nbsp Join Meeting</a>
            <?php if(!Auth::check()): ?>
            <a href="<?php echo e(route('userRegister')); ?>" class="btn btn-outline-primary btn-md form-control"><i class="fas fa-user-plus"></i>&nbsp Register</a>
            <?php endif; ?>
          <div class="text-center alert alert-info justify-content-center" id="msg_warning"></div>
          </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
             
          </div>
      </div>
    </div>
    </div>
    </div>

    <div id="calendar" class="" style=""></div>

</div>
    
   

    
    
    <script>
        function myFunction() {
      /* Get the text field */
      var copyText = document.getElementById("invite-link");
    
      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
       /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText.value);
      document.getElementById("copy").innerHTML = "<span class='text-success'>Copied to clipboard</span>";
      /* Alert the copied text */
    //   alert("Copied the text: " + copyText.value);
    }
    </script>
    <script>
      $.getJSON("/adminev/", function(result) {
    var options = $("#dropdown");
    //don't forget error handling!
    
    // $.each(result, function(item) {
    //   console.log(result[item]);
    //   console.log(result[item]['user'][0]['name']);
    //     options.append($("<option />").val(result).text(result[item]['user'][0]['name']));
    //     $("option").val(function(idx, val) {
    //     $(this).siblings('[value="'+ val +'"]').remove();
    //     });
        
    // });
});
    </script>
    <script>
    
      $(document).ready(function () {
    
             
    
            var SITEURL = "<?php echo e(url('/')); ?>";
    
            $.ajaxSetup({
    
              headers: {
    
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    
              }
              
              
            });
            $("#dropdown").on("change", function(event) {
              console.log(jQuery("#dropdown option:selected").text());
              var filterKey = jQuery("#dropdown option:selected").text();
              var array = $.getJSON("/adminev");
         
            });
 
          
            var calendar = $('#calendar').fullCalendar({
          
              header: {
              left: 'today,month,agendaWeek,agendaDay',
              center: 'title',
              right: 'prevYear,prev,next,nextYear'
            },
                   
                events: SITEURL + "/adminev",
                
                displayEventTime: true,
                
                eventColor: '#'+Math.floor(Math.random()*16777215).toString(16),
    
                eventTextColor:'#ffffff',
    
                eventRender: function(event, el) {

               

                },
                eventClick: function(event){
                //console.log(event);
                //console.log(event.user[0]['fname'] , event.user[0]['lname']);
                var room_id = event.id_room;
                //console.log(room_id);
                
                var url = `<?php echo e(route('join')); ?>/${room_id}`;
                $('#invite-link').attr('href' , url);
                $('#event-title').val(event.title);
              
                $('#event-presenter').val(event.user[0]['fname'] +' '+  event.user[0]['lname']);
                $('#event-start').val(event.start.toISOString().replace('T' , " at ").replace(':00' , ""));
                $('#event-end').val(event.end.toISOString().replace('T' , " at ").replace(':00' , ""));
             //console.log(event.end.toISOString().replace('T' , " at ").replace(':00' , ""));
              var d=new Date();    
              var enddate=event.end;
              var sysDate=d.getTime();
          
            var res=sysDate-enddate;
           
            if(res>0)
            {
               $('#invite-link').hide();
               $('#msg_warning').text('Event Expired');
            }
            else
            {
              $('#invite-link').show();
              $('#msg_warning').hide();
            }
                $("#schedule-edit").modal();
               
                },
                
                // eventClick: function(event) {
                //     $("#exampleModal").modal("show");
                // },
                selectable: true,
                tooltip :true,
                selectHelper: true,
            });
           console.log(calendar);
            
      });
  
    </script>
    <script>
      function CheckPastDate() {
       
      }
    </script>

    <script>
      new ClipboardJS('.btn');
    </script>


    

    





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Seminaire-CNDP\resources\views/Viewer/viewer_schedule.blade.php ENDPATH**/ ?>