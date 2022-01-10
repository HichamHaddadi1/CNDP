

<?php $__env->startSection('admin_content'); ?>



<div class="container">
<h2 class="m-3">Events Schedule</h2>
<div class="response"></div>

<div id='calendar'></div>  

</div>

<div class="modal fade" id="schedule-edit" tabindex='-1'>
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
          <h4 class="modal-title ml-auto">Event Informations</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <div class="form-group">

      <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="event-title" >
      </div>
      <div class="form-group">
          <label for="start">start</label>
          <input type="text" class="form-control" id="event-start" >
      </div>
      <div class="form-group">
          <label for="end">end</label>
          <input type="text" class="form-control" id="event-end">
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

            events: SITEURL + "/adminev",
            
            header: {
              left: 'today,month,agendaWeek,agendaDay',
              center: 'title',
              right: 'prevYear,prev,next,nextYear'
            },
              
            displayEventTime: true,
            
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
            



            // eventClick: function(event) {
            //     $("#exampleModal").modal("show");
            // },

            selectable: true,
            tooltip :true,
            selectHelper: true,


           

            

 

        });

        
  });

 

</script>
<script>
  new ClipboardJS('.btn');
</script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BBB_Project\BBB_DEMO\resources\views/admin_planning.blade.php ENDPATH**/ ?>