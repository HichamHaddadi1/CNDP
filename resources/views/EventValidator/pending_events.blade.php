@extends('EventValidator.EV_layout')



@section('validator_content')
<div class="container">
<table class="table table-hover">

    <thead>
      <tr>
  
        <th scope="col">Seminar Theme</th>
        <th scope="col">Starts At</th>
        <th scope="col">Ending At</th>
        <th scope="col">Owner</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($events as $event )
      @if($event->isVerified == 'Pending')
      <tr>  
      
      <td>{{ $event->event_theme }}</td>
      <td>{{ str_replace('00:', '',$event->starting_at) }}</td>
      <td>{{ str_replace('00:', '',$event->ending_at) }}</td>
      <td>{{ str_replace(str_split('"[]'),'', App\Models\User::where('id' , '=' , $event->id_user)->pluck('name') ) }}</td>
      <td colspan="2">
        {{-- <a class="btn btn-success btn-sm" href=""><i class="fas fa-pen fa-sm"></i> Edit</a> --}}
      <a  class="btn btn-success btn-sm" href="{{ route('verify_event' , [$event->id,'v'])}}"><i class="fas fa-check"></i> Validate SEMINARS</a>
        <a class="btn btn-danger btn-sm" href="{{ route('verify_event' , [$event->id,'d'])}}"><i class="fas fa-times"></i> Deny SEMINARS</a>
      </td>
    </tr>
    @endif
   
      @endforeach
  </tbody>

  </table>
   {{-- <span class="pagination justify-content-center" >
    {{$events->links()}}
    </span> --}}


  </div>
@endsection