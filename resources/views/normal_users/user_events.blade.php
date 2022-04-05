@extends('normal_users.user_layout')

@section('user_content')



<div class="container">
<h2 class="m-3">Events Schedule</h2>
<div class="response"></div>

<div id='calendar'></div>  

</div>

<div class="modal fade" id="schedule-edit" tabindex='-1'>
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-info">
          <h4 class="modal-title ml-auto">Seminars Informations</h4>
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
      <div class="form-group">
          <label for="end">End</label>
          <input type="text" class="form-control" id="event-end"readonly>
      </div>
      <!-- <div class="form-group">
    <label for="invite-link">Invite Link <span class="text-muted" id="copy"></span></label>
      <input type="text" class="form-control" id="invite-link" onclick="myFunction()" value="" readonly>
      </div> -->
      <div class="form-group ">
        <a href="" class="btn btn-outline-primary btn-md form-control  " id="invite-link"><i class="fas fa-door-open"></i>&nbsp Join Meeting</a>
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
  document.getElementById("copy").innerHTML = "<span class='text-success'>Copied to clipboard</span>";
  /* Alert the copied text */
//   alert("Copied the text: " + copyText.value);
}
</script>

<script>

  $(document).ready(function () {

         

        var SITEURL = "{{url('/')}}";

        $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

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

          
            editable: true,

            events: SITEURL + "/adminev",
            
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
            console.log(event);
            console.log(event.user[0]['fname'] , event.user[0]['lname']);
            var room_id = event.id_room;
            console.log(room_id);
            var url = `{{route('join')}}/${room_id}/${generateId()}`;
            $('#invite-link').attr('href' , url);
            $('#event-title').val(event.title);
            $('#event-presenter').val(event.user[0]['fname'] +' '+  event.user[0]['lname']);
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

@endsection