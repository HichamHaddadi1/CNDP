@extends('layouts.admin')


@section('admin_content')

<div class="container">
<h2 class="m-3">Streamers</h2>
@if (Session::get('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif
      @if (Session::get('errorsUnique'))
      <div class="alert alert-danger mt-3" role="alert">
        {{ Session::get('errorsUnique') }}
      </div>
      @endif
<table class="table table-hover">
<div class="search mb-3">
<form action="{{ route('search_users') }}" method="GET">
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
        <th scope="col">Username</th>
        <th scope="col">Full name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Language</th>
        <th scope="col">Created at</th>
        <th scope="col">Options</th>
      </tr>
    </thead>

    <tbody>
       
        @foreach ($streamers as $streamer )
        @if($streamer->role == 2  && $streamer->status == 'Pending')
          <tr>
       @csrf
         
            
            <td>{{ $streamer->name }}</td>
            <td>{{ $streamer->fname . " " . $streamer->lname }}</td>
            <td>{{ $streamer->email }}</td>
            <td>{{ $streamer->gender }}</td>
            <td>{{ $streamer->language }}</td>
            <td>{{ $streamer->created_at }}</td>
            <td colspan="2">
            @if($streamer->status == 'Pending')
            <a class="btn btn-success btn-sm" href="{{ route('admin_verify_streamer' , [$streamer->id,'v'])}}"><i class="fas fa-check fa-sm"></i> Verify</a>
            <a class="btn btn-danger btn-sm" href="{{ route('admin_verify_streamer' , [$streamer->id,'d'])}}"><i class="fas fa-times fa-sm"></i> Deny</a>
            @endif  
              </td>
            </tr>
            @endif
        @endforeach
        
    </tbody>
    

  </table>
  <span class="pagination justify-content-center" >
    {{$streamers->render()}}
    </span>
</div>



  @endsection