<!DOCTYPE html>

<html>

<head>

  <title>Laravel Fullcalender Add/Update/Delete Event Example Tutorial - Tutsmake.com</title>

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.3/fullcalendar.css">

<body>

 

  <div class="container">

      <div class="response"></div>

      <div id='calendar'></div>  

  </div>

  <div class="modal fade" id="schedule-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Your Schedule</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Schedule Name:</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Save Your Schedule</button>
            </div>
        </div>
    </div>
</div>
 



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.3/fullcalendar.min.js"></script>



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

            displayEventTime: true,

            editable: true,

            eventRender: function (event, element, view) {

                if (event.allDay === 'true') {

                    event.allDay = true;

                } else {

                    event.allDay = false;

                }

            },

            eventClick: function(event){
            
                $('.modal-body').html(event.title);
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

 

  function displayMessage(message) {

    $(".response").html(""+message+"");

    setInterval(function() { $(".success").fadeOut(); }, 1000);

  }

</script>
</body>

</html><?php /**PATH C:\xampp\htdocs\BBB_Project\BBB_DEMO\resources\views/fullcalendar.blade.php ENDPATH**/ ?>