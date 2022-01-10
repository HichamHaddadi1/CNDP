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
          <a class="btn btn-success btn-sm" href="{{ route('update.verify_Room' , [$room->id,'v'])}}"><i class="fas fa-check fa-sm"></i> Verify</a>
          <a class="btn btn-danger btn-sm" href="{{ route('update.verify_Room' , [$room->id,'d'])}}"><i class="fas fa-times"></i> Deny</a>
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

 @endsection
