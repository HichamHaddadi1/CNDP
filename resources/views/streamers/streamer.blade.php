<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CNDP</title>
    <link rel="icon" href="{{ asset('/img/favicons/orientation-tamkine-32x32.png') }}" type="favicon/png" sizes="32x32">
    <link rel="icon" href="{{ asset('/img/favicons/orientation-tamkine-192x192.png') }}" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('/img/favicons/orientation-tamkine-180x180.png') }}" sizes="180x180">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.3/fullcalendar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



<!-- FullCalendar -->

 <link rel="stylesheet" href="\profile_css\profile.css">

 <!-- scripts -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.3/fullcalendar.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>
<!-- tempusdominus- -->
<!-- end scripts -->

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- Messages Dropdown Menu -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route( 'logout')}}" class="nav-link">Logout  <i class="fas fa-sign-out-alt"></i></a>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link" target="_blank">
      <img src="\img\cndp-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-4" style="opacity: .8">
      <span class="brand-text font-weight-light"> &nbsp;
      </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 ml-n2 d-flex">
        <div class="image">
        @if(!empty(auth()->user()->avatar))
                                <div class="m-b-25"> <img src="/upload/{{Auth::user()->avatar}}" alt="avatar" class="img-radius" style="border-radius: 50% ; width:50px ; height:50px ;object-fit: cover;
          object-position: center;"> </div>
                              @else
                              <div class="m-b-25"> <img src="/img/default-icon.png" alt="avatar" class="img-radius" style="border-radius: 50% ; width:50px ; height:50px ;object-fit: cover;
          object-position: center;" > </div>
                              @endif
        </div>
        <div class="info">

          <a href="{{url('streamer/profile')}}" class="d-block" style="text-decoration: none">{{Auth::user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ url('streamer/rooms') }}" class="nav-link active">
              <i class="nav-icon fas fa-door-open"></i>
              <p>
                Room
              </p>
            </a>
            <a href="{{ url('streamer/events') }}" class="nav-link active">
              <i class="nav-icon fas fa-bolt"></i>
              <p>
                Seminars
              </p>
            </a>
            <a href="{{ url('streamer/planning') }}" class="nav-link active">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                      Planning
                </p>
              </a>
              <a href="{{ url('streamer/recordings') }}" class="nav-link active">
              <i class="nav-icon fas fa-microphone-alt"></i>
                <p>
                      Recordings
                </p>
              </a>
              {{-- <a href="{{ url('streamer/presentation') }}" class="nav-link active">
                <i class="nav-icon fas fa-file-powerpoint"></i>
                <p>
                  Presentation
                </p>
              </a> --}}
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <main>
   @yield('streamer_content')
    </main><!-- /.content -->
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->

    <!-- Default to the left -->
    <strong>Copyright &copy; {{Carbon\Carbon::now()->format('Y')}} <a href="https://tamkine.org/en/" target="_blank">Tamkine Technologies</a>.</strong> All rights reserved.
  </footer>
</div>

<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src={{ asset('dist\js\adminlte.min.js') }}></script>
<script>
  new ClipboardJS('.btn');
</script>
<script>

  $(document).ready(function(){
    $('.editBtn').click( function(){
     var id = $(this).data('id');
      //var _token = $('input[name="_token"]').val();
      $.ajax({
      url: '/event/'+id+'/edit/',
      method:"GET",
      success:function (result){
        console.log(result.event.event_theme);

        $('#EditEvent').modal('show');
        // console.log(result.event.event_theme);//.val(result.event.event_theme);
        RoomNameUpdate.value=result.event.event_theme;
        startingUpdate.value=result.event.starting_at;
        EndingUpdate.value=result.event.ending_at;
        DescUpdate.value=result.event.event_desc;

        specialURL.href = "";
        specialURL.href +="/"+result.event.id;

        updateForm.action = "";
        updateForm.action +="/"+result.event.id;



        }
      })
    })
});
</script>
</body>
</html>
