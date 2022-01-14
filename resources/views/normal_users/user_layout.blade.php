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
    <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <link rel="stylesheet" href="/dist/css/adminlte.min.css">
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
      
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.3/fullcalendar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs75muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="bootstrap-datetimepicker.min.css">
  <!-- FullCalendar -->

    <link rel="stylesheet" href="\profile_css\profile.css">

  <!-- scripts -->
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.3/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>


<!-- end scripts -->

<style>
  .btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 18px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
    color :white;
}

</style>
  </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
       --}}
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
  <aside class="main-sidebar sidebar-dark-primary elevation-5">
    <!-- Brand Logo -->
    <a href="{{route('viewer_home')}}" class="brand-link" target="_blank">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-normal">Tamkine</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
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
          
          <a href="{{url('user/profile')}}" class="d-block" style="text-decoration: none">{{Auth::user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ url('user/events') }}" class="nav-link active">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                SEMINARS Calendar 
              </p>
            </a>
           
            <a href="{{ url('/contact') }}" class="nav-link active">
              <i class="nav-icon fas fa-question"></i>
              <p>
                Ask For Help
              </p>
            </a>
           
          
              
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
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div>
         
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <main>
   @yield('user_content')
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
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="https://tamkine.org/en/" target="_blank">Tamkine</a>.</strong> All rights reserved.
  </footer>
</div>
<script>


</script>
<!-- ./wrapper -->

</body>
</html>
