@extends('EventValidator.EV_layout')



@section('validator_content')
<style>
  .room_desc{
    width: 250px;
    max-width: 250px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
  }
  </style>
  <div class="container">
  <h2 class="m-3">Pending Requests</h2>
  @if (Session::get('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Room Name</th>
        <th scope="col">Room Description</th>
        <th scope="col">User</th>
        <th scope="col">Max Viewers</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
      @if($rooms->count() > 0)

        @foreach ($rooms as $room )

        @if($room->verified == 'Pending')
        <tr>

            <td>{{ $room->room_name }}</td>
            <td class="room_desc">{{ $room->room_desc }}</td>
            <td>{{ $room->user->name }}</td>
            <td>{{ $room->max_viewers }}</td>
        <td colspan="2">
          <a id="{{$room->id}}" data-toggle="modal" data-target="#VerifyModal" class="btn btn-success btn-sm btn_verify" href=""><i class="fas fa-check fa-sm"></i> Verify</a>
          <a id="{{$room->id}}" data-toggle="modal" data-target="#DenyModal" class="btn btn-danger btn-sm btn_deny" href="{{ route('update.verify_Room' , [$room->id,'d'])}}"><i class="fas fa-times"></i> Deny</a>
        </td>
      </tr>
      @endif
        @endforeach
      @if($room->verified != 'Pending' )
      <div class="alert alert-primary" role="alert">
        There is no rooms to approve at the moment .
      </div>
      @endif
      @endif
    </tbody>

  </table>
  <span>
    {{-- {{$rooms->links()}} --}}
  </span>
</div>
<div class="modal fade " id="VerifyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verify Room</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure u wanna Verify this Room?
      </div>
      <div class="modal-footer">
      
        <a style="color:white" type="button" class="btn btn-success btn_c_v">Confirm Verification</a>
        <a style="color:white" type="button" class="btn btn-info btn_cancel">Cancel</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade " id="DenyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deny Room</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure u wanna Deny this Room?
      </div>
      <div class="modal-footer">
      
        <a style="color:white" type="button" class="btn btn-danger btn_c_d">Confirm Denying</a>
        <a style="color:white" type="button" class="btn btn-info btn_cancel">Cancel</a>
      </div>
    </div>
  </div>
</div>

<script>
  // btn validate
    $('.btn-close ,.btn_cancel').click(function(){
      $('#VerifyModal').modal('hide');
      $('#DenyModal').modal('hide');    
    });
      $('.btn_verify').click(function(){
          var room_id= $(this).attr("id");
        //console.log(room_id);
          var str='{{ route("update.verify_Room" , [":id","v"])}}';
          str= str.replace(':id',room_id);
          $('#VerifyModal').modal('show');
          $('.btn_c_v').attr('href',str);
      });
  </script>


<script>
  // btn validate
      $('.btn_deny').click(function(){
          var event_id= $(this).attr("id");
        //console.log(room_id);
          var str='{{ route("verify_event" , [":id","d"])}}';
          str= str.replace(':id',event_id);
          $('#DenyModal').modal('show');
          $('.btn_c_d').attr('href',str);
      });
  </script>
@endsection
