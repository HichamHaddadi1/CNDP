<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo e(asset('/img/favicons/orientation-tamkine-32x32.png')); ?>" type="favicon/png" sizes="32x32">
  <link rel="icon" href="<?php echo e(asset('/img/favicons/orientation-tamkine-192x192.png')); ?>" sizes="192x192">
  <link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('/img/favicons/orientation-tamkine-180x180.png')); ?>" sizes="180x180">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <title>Tamkine</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.css">
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.39.0/build/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="bootstrap-datetimepicker.min.css">
<script src="bootstrap-datetimepicker.min.js"></script>


    
   
    
    <link rel="stylesheet" href="\profile_css\profile.css">
  </head>

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
      
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- Messages Dropdown Menu -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(route( 'logout')); ?>" class="nav-link">Logout  <i class="fas fa-sign-out-alt"></i></a>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('index')); ?>" class="brand-link" target="_blank">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Tamkine</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 ml-n2 d-flex">
        <div class="image">
        <?php if(!empty(auth()->user()->avatar)): ?>
                                <div class="m-b-25"> <img src="/upload/<?php echo e(Auth::user()->avatar); ?>" alt="avatar" class="img-radius" style="border-radius: 50% ; width:50px ; height:50px ;object-fit: cover;
          object-position: center;"> </div>
                              <?php else: ?>
                              <div class="m-b-25"> <img src="img/default-icon.png" alt="avatar" class="img-radius" style="border-radius: 50% ; width:50px ; height:50px ;object-fit: cover;
          object-position: center;" > </div>
                              <?php endif; ?>
        </div>
        <div class="info">
          
            <a href="<?php echo e(url('admin/profile')); ?>" class="d-block"><?php echo e(Auth::user()->name); ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?php echo e(url('admin/pending')); ?>" class="nav-link active">
                <i class="nav-icon fas fa-clipboard-check"></i>
                <p>
                      Room requests <span class="badge badge-dark" style="color:red;"><?php echo e($pending); ?></span>
                  
                </p>
              </a>
              <a href="<?php echo e(url('admin/events_req')); ?>" class="nav-link active">
                <i class="nav-icon fa fa-clock"></i>
                <p>
                  Pending Events <span class="badge badge-dark" style="color:red;"><?php echo e($pending_events); ?></span>
                </p>
              </a>
              <a href="<?php echo e(url('admin/streamers')); ?>" class="nav-link active">
                <i class="nav-icon fas fa-video"></i>
                <p>
                      Streamers Requests <span class="badge badge-dark" style="color:red;"><?php echo e($streamers_requests); ?></span>
                </p>
              </a>
              <a href="<?php echo e(url('admin/users')); ?>" class="nav-link active">
                <i class="nav-icon fas fa-user"></i>
                <p>
                      Users
                </p>
              </a>
              
              <a href="<?php echo e(url('admin/rooms')); ?>" class="nav-link active">
                <i class="nav-icon fas fa-door-open"></i>
                  <p>
                    Rooms
                  </p>
                </a>
                <a href="<?php echo e(url('admin/recordings')); ?>" class="nav-link active">
                  <i class="nav-icon fas fa-microphone-alt"></i>
                  <p>
                        Recordings
                  </p>
                </a>
                <a href="<?php echo e(url('admin/planning')); ?>" class="nav-link active">
                  <i class="nav-icon fas fa-calendar"></i>
                  <p>
                        Events Calendar
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
   <?php echo $__env->yieldContent('admin_content'); ?>
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
  
//   $('#ModalDelete').on('show.bs.modal', function (event) {
//      var button = $(event.relatedTarget);
//      // console.log(button);
//       var modal = ('#ModalDelete');
//       var room_id = button.attr('data-roomid');
//       modal.find('.modal-body #room_id').val(room_id);
//       modal.modal('show');
// })


</script>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

<!-- Bootstrap 4 -->
<script src=<?php echo e(asset('css\bootstrap\js\bootstrap.bundle.min.js')); ?>></script>
<!-- AdminLTE App -->
<script src=<?php echo e(asset('dist\js\adminlte.min.js')); ?>></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.js"></script>


<script>
  new ClipboardJS('.btn');
</script>
<script>
  // $(document).ready(function(){
  //   $('.editBtn').click( function(){
  //     $('#EditEvent').modal('show');


      // var id = $(this).data('id');
      // var _token = $('input[name="_token"]').val();
      // $.ajax({
      // url: 'http://localhost:8000/event/'+id+'/edit/',
      // method:"GET",
      // success:function (result){
      //   console.log(result)
        
      //       }
      // })
    // })
 
  // });
  $(document).ready(function(){
    $('.editBtn').click( function(){
      


      var id = $(this).data('id');
      //var _token = $('input[name="_token"]').val();
      $.ajax({
      url: '/admin/streams/'+id+'/edit/',
      method:"GET",
      
      success:function (result){
        console.log(result.event.event_theme);
        
        $('#EditEventAdmin').modal('show');
        // var x = document.getElementById("RoomName");
        // console.log(x);
        // x.value = result.event.event_theme;

        // console.log(result.event.event_theme);//.val(result.event.event_theme);
        RoomNameUpdate.value=result.event.event_theme;
        startingUpdate.value=result.event.starting_at;
        EndingUpdate.value=result.event.ending_at;
        DescUpdate.value=result.event.event_desc;

        specialURL.href = "";
        specialURL.href +="/"+result.event.id;

        adminEventUpdate.action = "";
        adminEventUpdate.action +="/"+result.event.id;
        
        
        
        }
      })
    })
});
</script>

</body>
</html>
<?php /**PATH C:\Users\Tamkin\Desktop\plateforme-seminaire\resources\views/layouts/admin.blade.php ENDPATH**/ ?>