@extends('EventValidator.EV_layout')



@section('validator_content')

<div class="container">
  @if (Session::get('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('success') }}
      </div>
      
@endif
@if (Session::get('deny'))
<div class="alert alert-success mt-3" role="alert">
  {{ Session::get('deny') }}
</div>

@endif
<table class="table table-hover">

    <thead>
      <tr>
  
        <th scope="col">Seminar Theme</th>
        <th scope="col">Starts At</th>
        <th scope="col">Ending At</th>
        <th scope="col">Owner</th>
        <th scope="col">Create at</th>
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
      <td>{{ $event->created_at }}</td>
      <td colspan="2">
        {{-- <a class="btn btn-success btn-sm" href=""><i class="fas fa-pen fa-sm"></i> Edit</a> --}}
      <a  class="btn btn-success btn-sm" href="{{ route('verify_event' , [$event->id,'v'])}}"><i class="fas fa-check"></i> Validate Seminar</a>
        <a class="btn btn-danger btn-sm" href="{{ route('verify_event' , [$event->id,'d'])}}"><i class="fas fa-times"></i> Deny Seminar</a>
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