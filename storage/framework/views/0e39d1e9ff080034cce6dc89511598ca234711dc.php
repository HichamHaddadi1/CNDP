
<?php $__env->startSection('viewer_content'); ?>


  <div class="container mt-5 w-50 p-3 ">
  <?php if(Session::get('errorsUnique')): ?>
            <div class="alert-danger text-center mb-3 p-3 " >
                          <strong id="msg_err"><?php echo e(Session::get('errorsUnique')); ?> </strong> 
                          </div>   
              <?php endif; ?>
    <?php if(auth()->user()): ?>
    <form method="POST" action="<?php echo e(route('join_stream' ,$id)); ?>"  id="redirect" name="redirect">
        <?php echo csrf_field(); ?>
        <!-- <div class="form-group">
          <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo e(Auth::user()->name); ?>" readonly="readonly">
        </div> -->
        <!-- <div class="form-group">
          <input type="text" class="form-control" name="code" id="exampleInputPassword1" placeholder="Enter Access Code">
        </div> -->
      <span class="alert alert-warning" id="warning">
        Redirecting ...
      </span>
        <button type="submit" class="btn btn-primary" hidden>Submit</button>
      </form>
      <?php else: ?>
      <div class="alert alert-danger">
        you must be logged in to join meeting , click<a href="<?php echo e(route('login')); ?>" target='_blank'> Here </a>to login  
      </div>
      <?php endif; ?>
      </div>
      <script>
        var msg_err=$('#msg_err').text();
      console.log(msg_err);
       window.onload=function()
       {   if(msg_err=="")
            {
              
       window.setTimeout(function() { document.redirect.submit(); }, 2500);
             }
             else
             {
              $('#warning').hide();
             }
        };
      
      </script>
      <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BBB_origin\BBB_DEMO\resources\views/user_join.blade.php ENDPATH**/ ?>