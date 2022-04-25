@extends('EventValidator.EV_layout')



@section('validator_content')
<style>
  .div_export {
  background-color: white;
  padding: 30px;
  margin: 30px;
  
  }
</style>
<div class="div_export shadow p-3 mb-5 rounded text-center">
  

        <a href="/export/{{$room_id}}" class="btn btn-info" type="submit">
          <i class="fas fa-cloud-download-alt"></i>  Export Excel
        </a>
    
</div>
<table class="table table-striped table-info text-center">
    <thead>
      <tr>
        <th>Owner</th>
        <th>Seminar Theme</th>
        <th scope="col">Started at</th>
        <th scope="col">Ended at</th>
        <th scope="col">Participants Joined</th>
      </tr>
    </thead>
    <tbody>
        @forelse($history as $hr)
      <tr >
        <td>{{$hr->name}}</td>
        <td>{{$hr->event_theme}}</td>
        <td>{{$hr->start_date}}</td>
        <td>{{$hr->end_date}}</td>
        <td>{{$hr->nb_participants.' / '.$hr->max_viewers }}</td>
      </tr>
       @empty
       <td colspan="5" class="text-center">
       no history for this Room
       </td>
       @endforelse
    </tbody>

  </table>
   <span class="pagination justify-content-center" >
        {{$history->links()}}
   </span> 

@endsection