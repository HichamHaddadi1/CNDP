@extends('layouts.admin')


@section('admin_content')
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
<h2 class="m-3">room_descStreamers Rooms</h2>
@if (Session::get('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif
<table class="table table-hover">
 {{-- Search Box --}}
 <div class="search mb-3">
<form action="{{ route('search_room_admin') }}" method="GET">
 <div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <div class="input-group">
      <input type="search" id="search" name="search" class="form-control" placeholder="Search ">
      <button type="submit" class="btn btn-outline-primary">search</button>
    </div>
  </div>
</div>
</form>
</div>
    <thead>
      <tr>
        <th scope="col">Room Name</th>
        <th scope="col">Room Description</th>
        <th scope="col">User</th>
        <th scope="col">Access Code</th>
        <th scope="col">Room Statue</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($rooms as $room )
        @if($room->verified == 'verified')
        
        <tr>  
        <td>{{ $room->room_name }}</td>
        <td class="room_desc">{{ $room->room_desc }}</td>
        <td>{{ $room->user->name }}</td>
        @if($room->viewer_pw == '')
        <td>No key for this room</td>
        @else
        <td>{{ $room->viewer_pw }}</td>
        @endif
        @if(\Bigbluebutton::isMeetingRunning($room->id.'cmp') == false)
        <td><img src="https://img.icons8.com/emoji/48/000000/red-circle-emoji.png" style="width: 10px; height:10px;" /> Offline</td>
        @else
        <td><img src="https://img.icons8.com/emoji/48/000000/green-circle-emoji.png" style="width: 10px; height:10px;" /> Online</td>
        @endif
         
        <td colspan="3">
          <a class="btn btn-primary btn-sm" href="{{ route('admin.rooms_start' , $room->id)}}"><i class="fa fa-play fa-sm"></i> Start Room</a>
          <button class="btn btn-primary btn-sm" style="color: white" data-clipboard-text="{{ route('join' , $room->id)}}">
            Copy Link
           </button> 
       <a  href="{{ route('delete.room' , $room->id)}}"><button class="btn btn-primary btn-sm" style="background-color: #dc3545">Delete Room</button></a>
        </td>
        
      </tr>
      @endif
     @endforeach   
   
  
    </tbody>
  
  </table>
  
    <span class="pagination justify-content-center" >
    {{$rooms->links()}}
    </span>


 
    </div>

<script>
  new ClipboardJS('.btn');
</script>




  @endsection