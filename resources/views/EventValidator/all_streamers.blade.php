@extends('EventValidator.EV_layout')



@section('validator_content')
<div class="container">
<h3 class="m-3">Users</h3>
@if (Session::get('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif

      <table class="table table-hover">
  <div class="search mb-3">

</div>
    <thead>
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Full name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Language</th>
        <th scope="col">Created at</th>
        <th scope="col">Role</th>
        
      </tr>
    </thead>

    <tbody>
        @foreach ($all_users as $one_user )
        @if ($one_user->id != Auth::user()->id && $one_user->role !=4)
       @csrf
        <tr>

            <td>{{ $one_user->name }}</td>
            <td>{{ $one_user->fname . " " . $one_user->lname }}</td>
            <td>{{ $one_user->email }}</td>
            <td>{{ $one_user->gender }}</td>
            <td>{{ $one_user->language }}</td>
            <td>{{ $one_user->created_at }}</td>
            @if ($one_user->role == 2)
            <td class="bg-secondary bg-gradient">Streamer </td>
            @endif
            @if ($one_user->role == 3)
            <td class="bg-info bg-opacity-25" >Normal User </td>
            @endif
            {{-- <td colspan="2">
                <a class="btn btn-danger btn-sm" href="{{ route('delete.user' , $one_user->id)}}"><i class="fas fa-times"></i> Delete</a>
              </td> --}}
        @endif

        @endforeach
    </tbody>

  </table>
  <span class="pagination justify-content-center" >
    {{$all_users->links()}}
  </span>
</div>



  @endsection
