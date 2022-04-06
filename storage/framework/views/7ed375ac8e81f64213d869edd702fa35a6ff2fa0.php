


<?php $__env->startSection('streamer_content'); ?>

<style> 
  .link_guide{
color:rgb(39, 39, 39) !important;
   }
   .link_guide:hover{
color:rgb(90, 30, 255) !important;
   }
  </style>

<div class="container">
  <div class="alert alert-info alert-dismissible fade show" role="alert" style="text-transform: capitalize">
    <strong>Note : </strong> here you can find your paste and upcoming SEMINARS, if it's empty go create one at  ><b><span ><a style="color: rgb(37, 37, 37)" class="link_guide" href="<?php echo e(url('streamer/rooms')); ?>"> <i class="nav-icon fas fa-door-open"></i> Rooms</a></span></b> > then create your first Seminar <b> <span class="link_guide"> <a style="color: rgb(37, 37, 37)" class="link_guide" href="<?php echo e(url('streamer/events')); ?>"><i class="nav-icon fas fa-bolt"></i> SEMINARS</a></span></b>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<div class="response"></div>

<div id='calendar'></div>  

</div>

<div class="modal fade" id="schedule-edit" tabindex='-1'>
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
          <h4 class="modal-title ml-auto">Seminar Informations</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <div class="form-group">

      <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="event-title" readonly="readonly">
      </div>
      <div class="row mb-3">
      <div class="col">
          <label for="start">Starting at</label>
          <input type="text" class="form-control" id="event-start" readonly="readonly">
      </div>
      <div class="col">
          <label for="end">Ending at</label>
          <input type="text" class="form-control" id="event-end" readonly="readonly">
      </div>
    </div>
      <div class="form-group">
    <label for="invite-link">Invite Link <span class="text-muted" id="copy"></span></label>
      <input type="text" class="form-control" id="invite-link" onclick="myFunction()" value="" readonly>
      </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
         
      </div>
  </div>
</div>
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
  $('#schedule-edit').on('hidden.bs.modal', function () {
    document.getElementById("copy").innerHTML = "<span class='text-success'></span>";
  });
  document.getElementById("copy").innerHTML = "<span class='text-success'>Copied to clipboard</span>";
  /* Alert the copied text */
//   alert("Copied the text: " + copyText.value);
}
</script>
<script>

  $(document).ready(function () {
        var SITEURL = "<?php echo e(url('/')); ?>";

        $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

        });

 

        var calendar = $('#calendar').fullCalendar({
             
            editable: true,

            events: SITEURL + "/test",
            
            header: {
              left: 'today,month,agendaWeek,agendaDay',
              center: 'title',
              right: 'prevYear,prev,next,nextYear'
            },
              
          

            eventColor: '#'+Math.floor(Math.random()*16777215).toString(16),

            eventRender: function (event, element, view) {

                if (event.allDay === 'true') {

                    event.allDay = true;

                } else {

                    event.allDay = false;

                }

            },

            eventClick: function(event){
            console.log(event.id_room);
            var room_id = event.id_room;
            console.log(room_id);
            var url = `<?php echo e(route('join')); ?>/${room_id}`;
            $('#invite-link').val(url);
            $('#event-title').val(event.title);
            $('#event-start').val(event.start.toISOString().replace('T' , " at ").replace(':00' , ""));
            $('#event-end').val(event.end.toISOString().replace('T' , " at ").replace(':00' , ""));
            
            $("#schedule-edit").modal();

            },

            selectable: true,


        });

  });

 

</script>
<script>
  new ClipboardJS('.btn');
</script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('streamers.streamer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Seminaire-CNDP\resources\views/streamers/planning.blade.php ENDPATH**/ ?>