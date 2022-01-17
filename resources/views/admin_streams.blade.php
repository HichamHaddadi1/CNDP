@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <h3 class="m-3">Seminars</h3>
@if (Session::get('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif
      <table class="table table-hover">

    <thead>
      <tr>
        <th scope="col">Seminar Theme</th>
        <th scope="col">Starts At</th>
        <th scope="col">Ending At</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($events as $event )
    
          <tr>  
      
      <td>{{ $event->event_theme }}</td>
      <td>{{ $event->starting_at }}</td>
      <td>{{ $event->ending_at }}</td>
      <td>{{ $event->isVerified }}</td>
      
      <td colspan="2">
        @if($event->isVerified == 'Verified')
        <a class="btn btn-danger btn-sm" href="{{route('delete.event' , $event->id)}}"><i class="fas fa-trash"></i> Delete</a>
        <a class="btn btn-primary btn-sm" href="{{ route('admin.rooms_start' , $event->id_room)}}"><i class="fa fa-play fa-sm"></i> Start Room</a>
        @endif
      </td>
      
    </tr>
      
      @endforeach
  </tbody>

  </table>


  
{{-- Edit Event and update  --}}
  <form id="adminEventUpdate" action="admin/streams/" method="GET">
    @csrf
  <div class="modal fade" id="EditEventAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
      <div class="form-row">
      
      
      <div class="modal-body mx-3">
        <div class="md-form">
        </div>
      </div>
    </div>
{{-- First Row END --}}
      <div class="modal-body mx-3">
        <div class="md-form mb-3">
            <label data-error="wrong" data-success="right" for="orangeForm-email">Seminar Theme</label>
            <input type="text" id="RoomNameUpdate" name="event_themeUpdate" class="form-control validate"   >
        </div>
        <div class="time-picker">   
            <div class="form-group row">
                <div class="md-orm ">
                  <label class="col-form-label text-right">Start at</label>
                  <input type="text" id="startingUpdate" name="starting_at_Update" autocomplete="off" value="" class="form-control form-control-solid datetimepicker-input" id="kt_datetimepicker_5" placeholder="Select date & time"  data-toggle="datetimepicker" data-target="#kt_datetimepicker_5" onfocusout="checkDates()" />
                  <span for="end" id="start_error_update" class="text-danger error-text start_error_update"></span>
                </div>
                
            <div class="md-orm ">
                  <label class="col-form-label text-right">End at</label>
                  <input type="text" id="EndingUpdate" name="ending_at_Update" autocomplete="off" value="" class="form-control form-control-solid datetimepicker-input" id="kt_datetimepicker_4" placeholder="Select date & time"  data-toggle="datetimepicker" data-target="#kt_datetimepicker_4"   />
            </div>   
        </div>
        
        <div class="md-form "> 
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Seminar Description</label>
            {{-- <input type="text" id="RoomDesc" class="form-control validate"> --}}
            <textarea name="event_desc_Update" id="DescUpdate" class="form-control validate" cols="30" rows="6"  ></textarea>
        </div>
      <div class="modal-footer d-flex justify-content-center">
        <a id='specialURL' href="admin/streams/">   <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save Changes</button></a>
      </div>
    </div>
  </div>
</div>
</div>
</form>
</div>

  @endsection