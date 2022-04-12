@extends('EventValidator.EV_layout')



@section('validator_content')
<div class="container">
  @if (Session::get('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('success') }}
      </div>
  @elseif(Session::get('deny'))
      <div class="alert alert-danger mt-3" role="alert">
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
        <th scope="col">Created at</th>
        <th scope="col">is Verified</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($events as $event )
      <tr>
      <td>{{ $event->event_theme }}</td>
      <td>{{ str_replace('00:', '',$event->starting_at)  }}</td>
      <td>{{ str_replace('00:', '',$event->ending_at)   }}</td>
      <td>{{ str_replace(str_split('"[]'),'', App\Models\User::where('id' , '=' , $event->id_user)->pluck('name') ) }}</td>
      <td>{{ $event->created_at }}</td>
      <td>{{ $event->isVerified }}</td>
      <td colspan="2">
        {{-- {{ route('verify_event' , [$event->id,'v'])}} --}}
        {{-- <a class="btn btn-success btn-sm" href=""><i class="fas fa-pen fa-sm"></i> Edit</a> --}}
        @if($event->isVerified == 'Denied')
      <a  id="{{$event->id}}" class="btn btn-success btn-sm btn_validate" style="color:white"><i class="fas fa-check"></i> Validate Seminar</a>
      @elseif($event->isVerified == 'Verified')
        <a id="{{$event->id}}" class="btn btn-danger btn-sm btn_deny_seminar" style="color:white"><i class="fas fa-times"></i> Deny Seminar</a>
        @endif
      </td>
    </tr>
      @endforeach
  </tbody>

  </table>
   <span class="pagination justify-content-center" >
    {{$events->links()}} 
    </span>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="DenyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deny Seminar Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you wanna deny this Seminar?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger btn_deny">Deny</a>
        <button type="button" class="btn btn-secondary btn_close" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ValidateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Validate Seminar Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you wanna Validate this Seminar?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-success btn_c_validate">Validate</a>
        <button type="button" class="btn btn-secondary btn_close" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

  </div>
  {{-- {{ route('verify_event' , [$event->id,'v'])}} --}}
  <script>
  
      $('.btn-close ,.btn_close').click(function(){
        $('#DenyModal').modal('hide');
      });
        $('.btn_deny_seminar').click(function(){
            var event_id= $('.btn_deny_seminar').attr("id");
          
            var str='{{route("verify_event",[":id","d"])}}';
            str= str.replace(':id',event_id);
            $('#DenyModal').modal('show');
            $('.btn_deny').attr('href',str);
        });
  </script>

    <script>
        $('.btn-close ,.btn_close').click(function(){
          $('#ValidateModal').modal('hide');
        });
          $('.btn_validate').click(function(){
              var event_id= $('.btn_validate').attr("id");
              var str='{{route("verify_event",[":id","v"])}}';
              str= str.replace(':id',event_id);
              $('#ValidateModal').modal('show');
              $('.btn_c_validate').attr('href',str);
          });
      </script>
@endsection
