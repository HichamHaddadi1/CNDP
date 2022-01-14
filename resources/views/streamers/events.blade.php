@extends('streamers.streamer')

@section('streamer_content')
<style>
  .link_guide{
color:rgb(39, 39, 39) !important;
   }
   .link_guide:hover{
color:rgb(90, 30, 255) !important;
   }

   /************* Partager *************/
#exampleModal .modal {
    background-image: linear-gradient(rgb(35, 79, 71) 0%, rgb(36, 121, 106) 100.2%)
}

#exampleModal .modal-title {
    font-weight: 900
}

#exampleModal .modal-content {
    border-radius: 13px
}

#exampleModal .modal-body {
    color: #3b3b3b
}

#exampleModal .img-thumbnail {
    border-radius: 33px;
    width: 61px;
    height: 61px
}

#exampleModal .fab:before,  #exampleModal .fas:before{
    position: relative;
    top: 13px
}

#exampleModal .smd {
    width: 200px;
    font-size: small;
    text-align: center
}

#exampleModal .modal-footer {
    display: block
}

#exampleModal .ur {
    border: none;
    background-color: #e6e2e2;
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px
}

#exampleModal .cpy {
    border: none;
    background-color: #e6e2e2;
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
    cursor: pointer
}

#exampleModal button.focus,
#exampleModal button:focus {
    outline: 0;
    box-shadow: none !important
}

#exampleModal .ur.focus,
#exampleModal .ur:focus {
    outline: 0;
    box-shadow: none !important
}

#exampleModal .message {
    font-size: 11px;
    color: #ee5535
}

#exampleModal .modal-header {
    background-color: white;
}

#exampleModal a {
    color: black;
}
.copy-text {
  position: relative;
  background: #fff;
  border-radius: 10px;
  display: flex;
}
.copy-text input.text {
  padding: 5px;
  font-size: 14px;
  color: #555;
  outline: none;
  width: 100%;
  border: 2px solid #e4e7ea;
  border-radius: 7px;
}
.copy-text button {
  padding: 10px;
  background: #5784f5;
  color: #fff;
  font-size: 18px;
  border: none;
  outline: none;
  border-radius: 10px;
  cursor: pointer;
}

.copy-text button:active {
  background: #809ce2;
}
.copy-text button:before {
  content: "Copied";
  position: absolute;
  top: -45px;
  right: 0px;
  background: #5c81dc;
  padding: 8px 10px;
  border-radius: 20px;
  font-size: 15px;
  display: none;
}
.copy-text button:after {
  content: "";
  position: absolute;
  top: -20px;
  right: 25px;
  width: 10px;
  height: 10px;
  background: #5c81dc;
  transform: rotate(45deg);
  display: none;
}
.copy-text.active button:before,
.copy-text.active button:after {
  display: block;
}
footer {
  position: fixed;
  height: 50px;
  width: 100%;
  left: 0;
  bottom: 0;
  background-color: #5784f5;
  color: white;
  text-align: center;
}
footer p {
  margin: revert;
  padding: revert;
}
  </style>
<div class="container">
  <div class="alert alert-info alert-dismissible fade show" role="alert" style="text-transform: capitalize">
     <strong>Note :</strong> Make sure you have created your room before creating your first event, go back to ><b><span ><a style="color: rgb(37, 37, 37)" class="link_guide" href="{{ url('streamer/rooms') }}"> <i class="nav-icon fas fa-door-open"></i> Rooms</a></span></b>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@if (Session::get('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif
  <div class="btn mb-4 mr-4" style="float: right">
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-plus"></i> Add Event</button>
  </div>
  <form action="{{ route('search_event_streamer') }}" method="GET">
    <div class="row">
     <div class="col-lg-4 col-lg-offset-4">
       <div class="input-group">
         <input type="search" id="search" name="search" class="form-control" placeholder="Search ">
         <button type="submit" class="btn btn-outline-primary">search</button>
       </div>
     </div>
   </div>
   </form>
   <table class="table table-hover">

    <thead>
      <tr>
        <th scope="col">Event Theme</th>
        <th scope="col">Starts at</th>
        <th scope="col">End at</th>
        <th scope="col">State</th>
        <th scope="col" style="text-align: center;">Actions</th>
      </tr>
    </thead>
    <tbody>
    
      @foreach ($events as $event )
    
      @if ($event->id_user == Auth::user()->id)
        <tr>
            <td>{{ $event->event_theme }}</td>
            <td>{{ str_replace('00:', '',$event->starting_at) }}</td>
            <td>{{ str_replace('00:', '',$event->ending_at)  }}</td>
            <td>{{ $event->isVerified}}</td>
            <td colspan="2" class="text-center">
              @if(\Carbon\Carbon::now()->lte($event->starting_at))
                @if($event->isVerified!='Pending' && $event->isVerified!='Denied')
                    <a class="btn btn-primary btn-sm" href="{{ route('streamers.event_start' , [$event->id_room , $event->id ])}}"><i class="fa fa-play fa-sm"></i> Start Room</a>
                    <button  class="btn btn-success btn-sm editBtn" data-id="{{ $event->id }}"><i class="fas fa-pen"></i>Edit Event</button>
                    <button class="btn btn-primary btn-sm" style="color: white" data-clipboard-text="{{ route('join' , $event->id_room)}}">
                        Copy Link
                    </button>
                    <button type="button" class="btn btn-warning btn-sm link_id" data-toggle="modal" id="{{$loop->index}}" data-target="#exampleModal"> Share link&nbsp;<i class="fas fa-share-alt"></i> </button>
                @endif
                @if($event->isVerified !='Pending' )
                    <a class="btn btn-danger btn-sm" href="{{route('delete.event' , $event->id)}}"><i class="fas fa-trash"></i> Delete</a>
                @endif
                @else
                   <small style="color:green;"> Event Expired</small>
                @endif
            </td>
        </tr>
      @endif
    

      @endforeach
  </tbody>

  </table>
   <span class="pagination justify-content-center" >
    {{$events->links()}}
    </span>
 
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Create Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

          <form action="{{ route('streamers.events_add')}}" method="POST" id="create_form">
            @csrf
            {{ csrf_field() }}
            <div class="row">
            <div class="col">
              <div class="modal-body mx-3">
                <div class="md-form">
                    <label data-error="wrong" data-success="right" for="orangeForm-email">User</label>
                    <input type="text" id="UserName" name="UserName" class="form-control validate" value="{{Auth::user()->name}}" readonly  >
                </div>
              </div>
              </div>
              <div class="col">
              <div class="modal-body mx-3">
                <div class="md-form">
                    <label data-error="wrong" data-success="right" for="orangeForm-email">Room</label>
                    <select class="form-control validate" name="id_room" aria-label="Default select example">
                      {{-- <option selected>Select a Room Please</option> --}}
                      @foreach ($rooms as $room )
                      @if ($room->id_user == Auth::user()->id)
                          <option value="{{$room->id}}">{{ $room->room_name}}</option>
                      @endif

                      @endforeach
                    </select>
                </div>
              </div>
              </div>
            </div>
            <div class="modal-body mx-3">
          <div class="md-form mb-3">
            <label data-error="wrong" data-success="right" for="orangeForm-email">Event Theme</label>
            <input type="text" id="RoomName" name="event_theme" class="form-control @error('event_theme') is-invalid @enderror" >
           @error('event_theme')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>

        <div class="time-picker">


            <div class="row">
              <div class="col">
                <div class="md-orm ">
                  <label class="col-form-label text-right">Start at</label>
                  <input type="text" id="starting_at" name="starting_at" autocomplete="off" class="form-control @error('starting_at') is-invalid @enderror form-control-solid datetimepicker-input" id="kt_datetimepicker_5" placeholder="Select date & time"  data-toggle="datetimepicker" data-target="#kt_datetimepicker_5" onfocusout="checkDates()" />
                  @error('starting_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="col">
            <div class="md-orm ">
                  <label class="col-form-label text-right">End at</label>
                  <input type="text"  id="ending_at" name="ending_at" autocomplete="off" class="form-control @error('ending_at') is-invalid @enderror form-control-solid datetimepicker-input" id="kt_datetimepicker_4" placeholder="Select date & time"  data-toggle="datetimepicker" data-target="#kt_datetimepicker_4"  onfocusout="compareDates()" />
                  @error('ending_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
        </div>


        </div>
        <div class="md-form ">
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Event Description</label>
            <textarea name="event_desc" id="event_desc" class="form-control @error('event_desc') is-invalid @enderror" cols="30" rows="6"  maxlength="300" ></textarea>

            @error('event_desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="countArea">

                    </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button id="submit" class="btn btn-info">Create Event</button>
        </div>



      </div>


  </div>
</div>
</div>
</form>

<!-- {{-- Edit Event and update  --}} -->
  <form id="updateForm" action="streamer/events/" method="GET">
    @csrf
  <div class="modal fade" id="EditEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
{{-- First Row Start --}}
      <div class="row">
    <div class="col">
      <div class="modal-body mx-3">
        <div class="md-form">
            <label data-error="wrong" data-success="right" for="orangeForm-email">User</label>
            <input type="text" id="UserName" name="UserName" class="form-control validate" value="{{Auth::user()->name}}" readonly  >
        </div>
      </div>
      </div>
      <div class="col">
      <div class="modal-body mx-3">
        <div class="md-form">
            <label data-error="wrong" data-success="right" for="orangeForm-email">Room</label>
            <select class="form-control validate" name="id_room" aria-label="Default select example" readonly>
              {{-- <option selected>Select a Room Please</option> --}}
              @foreach ($rooms as $room )
              @if ($room->id_user == Auth::user()->id)
                  <option value="{{$room->id}}" >{{ $room->room_name}}</option>
              @endif
              @endforeach
            </select>
        </div>
      </div>
      </div>

    </div>
{{-- First Row END --}}
      <div class="modal-body mx-3">
        <div class="md-form mb-3">
            <label data-error="wrong" data-success="right" for="orangeForm-email">Event Theme</label>
            <input type="text" id="RoomNameUpdate" name="event_themeUpdate" class="form-control validate"   >
        </div>

        <div class="time-picker">
            <div class="row">
              <div class="col">
                <div class="md-orm ">
                  <label class="col-form-label text-right">Start at</label>
                  <input type="text" id="startingUpdate" name="starting_at_Update" autocomplete="off" value="" class="form-control form-control-solid datetimepicker-input" id="kt_datetimepicker_5" placeholder="Select date & time"  data-toggle="datetimepicker" data-target="#kt_datetimepicker_6" onfocusout="checkDates()" />
                  <span for="end" id="start_error_update" class="text-danger error-text start_error_update"></span>
                </div>
                </div>
                <div class="col">
            <div class="md-orm ">
                  <label class="col-form-label text-right">End at</label>
                  <input type="text" id="EndingUpdate" name="ending_at_Update" autocomplete="off" value="" class="form-control form-control-solid datetimepicker-input" id="kt_datetimepicker_4" placeholder="Select date & time"  data-toggle="datetimepicker" data-target="#kt_datetimepicker_6"   />
            </div>
            </div>
             </div>
        </div>
        <div class="md-form ">
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Event Description</label>
            {{-- <input type="text" id="RoomDesc" class="form-control validate"> --}}
            <textarea name="event_desc_Update" id="DescUpdate" class="form-control validate " cols="30" rows="6" maxlength="300" ></textarea>
          <div id="countL1"></div>
        </div>
      <div class="modal-footer d-flex justify-content-center">
        <a id='specialURL' href="streamer/events/"><button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save Changes</button></a>
      </div>

      </div>
  </div>
</div>
</div>

</form>
</div>
 <!--Model pour partage-->
    <!--Model pour partage-->
    <?php
      if(isset($event))
    $url = new \ImLiam\ShareableLink(route('join' , $event->id_room), "Lien d'événement (".$event->event_theme.") commencer le ".str_replace('00:', '',$event->starting_at)." et terminer le ".str_replace('00:', '',$event->ending_at)." est: ");
  
   
   ?> 
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content col-12">
                <div class="modal-header">
                    <h5 class="modal-title">Partager</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                @if(isset($url))
                <div class="modal-body">
                    <div class="icon-container1 d-flex">
                        <!-- Twitter -->
                        <div class="smd">
                            <a href='{{  $url->twitter}}' target='_blank'>
                                <i class=" img-thumbnail fab fa-twitter fa-2x" style="color:#4c6ef5;background-color: aliceblue"></i>
                                <p>Twitter</p>
                            </a>
                        </div>
                        <!-- Facebook -->
                        <div class="smd">
                            <a href='{{  $url->facebook}}' target='_blank'>
                               <i class="img-thumbnail fab fa-facebook fa-2x" style="color: #3b5998;background-color: #eceff5;"></i>
                               <p>Facebook</p>
                            </a>
                        </div>
                        <!-- linkedin -->
                        <div class="smd">
                            <a href='{{ $url->linkedin}}' target='_blank'>
                               <i class="img-thumbnail fab fa-linkedin-in fa-2x" style="color: #2379aa;background-color: #eceff5;"></i>
                               <p>linkedin</p>
                            </a>
                        </div>
                    </div>
                    <div class="icon-container2 d-flex">
                        <!-- whatsapp -->
                        <div class="smd">
                            <a href='{{  $url->whatsapp}}' target='_blank'>
                                <i class="img-thumbnail fab fa-whatsapp fa-2x" style="color: #25D366;background-color: #cef5dc;"></i>
                                <p>Whatsapp</p>
                            </a>
                        </div>
                        <!-- Telegram -->
                        <div class="smd">
                            <a href='{{ $url->telegram}}' target='_blank'>
                              <i class="img-thumbnail fab fa-telegram fa-2x" style="color: #4c6ef5;background-color: aliceblue"></i>
                              <p>Telegram</p>
                            </a>
                        </div>
                        <!-- E-mail -->
                        <div class="smd">
                            <a href="mailto:?subject=Lien de partage du salle :&amp;body=Check out this site" title="Lien de partage du salle :" target='_blank'>
                                <i class="img-thumbnail fas fa-envelope fa-2x" style="color: #6c6e71;background-color: #eceff5;"></i>
                                <p>E-mail</p>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                {{-- <div class="modal-footer"> <label style="font-weight: 600">Copy Link <span class="message"></span></label><br />
                  
                    <div class="copy-text">
                        <input type="text" class="text dataLink" value="{{route('join' , $event->id_room)}}" readonly/>
                        <button id="data_clipboard" data-clipboard-text="{{ route('join' , $event->id_room)}}"><i class="far fa-clone"></i></button>
                        {{-- <button class="btn btn-primary btn-sm" style="color: white" data-clipboard-text="{{ route('join' , $event->id_room)}}">
                          Copy Link
                      </button> --}}

                    </div>
                </div> 
            </div>
        </div>
    </div>


<script>
  $('#event_desc').unbind('keyup change input paste').bind('keyup change input paste',function(e){
    var $this = $(this);
    var val = $this.val();
    var valLength = val.length;
    $('.countArea').attr("style","color:red");
    var maxCount = $this.attr('maxlength');
    console.log(maxCount);
   $('.countArea').text(valLength+"/"+maxCount);
    if(valLength>maxCount){
        $this.val($this.val().substring(0,maxCount));
    }
});
</script>

<script>
  $("#starting_at").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
});
$("#ending_at").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
});
  $("#startingUpdate").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
});
$("#EndingUpdate").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
});
</script>
<!-- {{-- <script src="{{ asset('main.js') }}"></script> --}} -->
<script>
  function compareDates() {
    var events = {!! json_encode($events->toArray()) !!};
    var startDate = new Date($('#starting_at').val());
    var endDate = new Date($('#ending_at').val());

    if (endDate < startDate)
    {
      // alert('End date shoud be greater than start date')
      document.getElementById("end_error").textContent = "End date shoud be greater than start date";
      console.log("error");
    }
    else
    {
      document.getElementById("end_error").textContent = "";
      console.log('all good')
    }
    // console.log(events.starting_at)
    }

/* this*/
 $('input:submit').click(function(e)
{
  if(!$.validate())
  e.preventDefault();
});
  function checkDates() {
    var events = {!! json_encode($events->toArray()) !!};
    var startDate = new Date($('#starting_at').val());
    var endDate = new Date($('#ending_at').val());
    let t1 = startDate.toISOString();
    let isUnique = true;

     events.forEach(function (ev) {

      let d1 = new Date(ev.starting_at);
      const t2 = d1.toISOString();

      if (t1 == t2) {
        isUnique = false;
      }
      });
      if(!isUnique)
      {
        console.log(document.querySelector("#start_error"));
        document.getElementById("start_error").textContent = "Already Exist";
      }
      else{
        document.getElementById("start_error").textContent = "";
      }
      }
</script>
<script>
  new ClipboardJS('.btn');
</script>
<script>
  $('.link_id').on('click',function(){

   
  });
</script>
@endsection
