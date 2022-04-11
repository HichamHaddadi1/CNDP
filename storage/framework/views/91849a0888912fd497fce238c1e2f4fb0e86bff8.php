

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
  <h3 class="display-4">Seminars Schedule</h3>
  <div class="alert alert-info p-3 ">
  <p class="text-muted h3">All the Seminars are listed here , and you can have access to all of them and be part of <strong>CNDP</strong> community</p>
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
            <input type="hidden" id="room_id">
            <input type="hidden" id="event_id">
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
           
            <?php if(!Auth::check()): ?>
            <a href="<?php echo e(route('userRegister')); ?>" class="btn btn-outline-primary btn-md form-control"><i class="fas fa-user-plus"></i>&nbsp Register</a>
            <?php else: ?>
        <div class="text-center" id="appliedbtn" style="display: none">
            <button type="button" class="btn btn-lg btn-success" disabled>Applied <i class="fas fa-check"></i></button>
        </div>
        <br>
       <div class="text-center" id="joinbtn" style="display: none">
          <a id="invite-link" href="" class="btn btn-lg btn-primary form-control"><i class="fas fa-door-open"></i>&nbsp Join Seminar</a>
       </div>
            <button type="submit" class="btn btn-info btn-md form-control"  id="apply_event">&nbsp Apply </button>

        
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
     const room_id = $('#room_id'),event_id =$('#event_id');
      $('#apply_event').click(function(){
        $('#apply_event').show();
        console.log(event_id.val());
      $.ajax({

      url: '/schedule/'+room_id.val()+'/'+event_id.val(),
      method:"GET",
      processData: false,
      contentType: false,
      dataType: 'json',
     
      success:function (result){
        if (result.status == 0) {
         
          // $('#apply_event').hide();
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text:result.message ,
           
            });
            $('#joinbtn').show();
          } else if (result.status == 1) {
           
            Swal.fire(
                   'Applied',
                   'Successfully',
                   'success'
                 );
                 $('#joinbtn').show();
          } else if(result.status == 2)
          {
            Swal.fire({
              icon: 'info',
              title: 'Max attendees',
              text:result.message ,
           
            })
            $('#joinbtn').hide();
          }
      }
});
      });
    </script>
    
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
 
                 /******************************************************************************************/
 //CheckPastDate dec2hex :: Integer -> String
// i.e. 0-255 -> '00'-'ff'
function dec2hex (dec) {
              return dec.toString(16).padStart(2, "0")
            }

            // generateId :: Integer -> String
            function generateId (len) {
              var arr = new Uint8Array((len || 40) / 2)
              window.crypto.getRandomValues(arr)
              return Array.from(arr, dec2hex).join('')
            }


/******************************************************************************************/  
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
                //console.log(room_id);
                //console.log(event);
                if( $('#msg_warning').text() == 'Event Expired')
                {
                  $('#apply_event').hide();
                }
                else
                {
                  $('#apply_event').show();
                }
                $.ajax({
                    url: '/check/'+event.id_room+'/'+event.id_event,
                    method:"GET",
                    processData: false,
                    contentType: false,
                    dataType: 'json',

                    success:function (result){
                    if (result.status == 0) {
                        $('#appliedbtn').show();
                        $('#apply_event').hide();
                        $('#joinbtn').show();
                      } else if (result.status == 1) {
                        $('#appliedbtn').hide();
                        $('#apply_event').show();
                        $('#joinbtn').hide();
                      } 
                    }
                    });
  /*FIll the inputs*/
                var room_id = event.id_room;
             
                var url = `<?php echo e(route('join')); ?>/${room_id}/${event.id_event}/${generateId()}`;
                $('#invite-link').attr('href' , url);
                $('#event-title').val(event.title);
                $('#room_id').val(event.id_room);
                $('#event_id').val(event.id_event);
                $('#event-presenter').val(event.user[0]['fname'] +' '+  event.user[0]['lname']);
                $('#event-start').val(event.start.toISOString().replace('T' , " at ").replace(':00' , ""));
                $('#event-end').val(event.end.toISOString().replace('T' , " at ").replace(':00' , ""));
                 /*applied logic*/
               

             //console.log(event.end.toISOString().replace('T' , " at ").replace(':00' , ""));
              var d=new Date();    
              var enddate=event.end;
              var sysDate=d.getTime();
          
            var res=sysDate-enddate;
           
            if(res>0)
            {
               $('#invite-link').hide();
               $('#msg_warning').show();
               $('#msg_warning').text('Event Expired');
               $('#apply_event').hide();
            }
            else
            {
              $('#invite-link').show();
              $('#msg_warning').hide();
              $('#apply_event').show();
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
           //console.log(calendar);
            
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
<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Seminaire-CNDP\resources\views/Viewer/viewer_schedule.blade.php ENDPATH**/ ?>