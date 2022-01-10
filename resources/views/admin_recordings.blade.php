@extends('layouts.admin')

@section('admin_content')

  <div class="container">
  <h2 class="m-3">Recordings</h2>
<table class="table table-hover">
@if (Session::get('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif

      <thead>
  <tr>
  <th style="width: 2%;">#</th>
  <th style="width: 5%; text-align: center;">Type</th>
  <th style="width: 5%; text-align: center;">Participants</th>
  <th style="width: 15%; text-align: center;">Actions</th>
  </tr>
</thead>
    <tbody>
    
  @foreach($recs as $rec)
   
    <tr>  
        {{-- <td style="text-align: center;">{{$rec['metadata']['meetingName']}}</td> --}}
        <td style="text-align: center;">{{$rec['name']}}</td>
        <td style="text-align: center;">{{$rec['playback']['format']['type']}}</td>
        <td style="text-align: center;">{{$rec['participants']}}</td> 
        <td style="text-align: center;">
        <a class="btn btn-success btn-sm" href="{{$rec['playback']['format']['url']}}" target="_blank"><i class="fa fa-play fa-sm"></i> View Recording</a> 
        <a class="btn btn-danger btn-sm" href="{{route('streamer.delete.recordigns' ,$rec['recordID'] )}}"><i class="fa fa-times fa-sm"></i> Delete Recording</a>
        </td>
    </tr>
  @endforeach
 

</tbody>
  
  </table>
  </div>

  @endsection