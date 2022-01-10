
<?php $__env->startSection('viewer_content'); ?>

<div class="container border rounded border-primary mt-5 w-40 p-3">
  <div class="text-center">
  <h3 class="text-primary  text-uppercase mt-3 ">Welcome </h3> 
  <h5 class="text-muted">Enter the required informations to join the event</h5>
  </div>
 
    <?php if(auth()->user()): ?>
    <form method="POST" action="<?php echo e(route('join_stream' ,$id)); ?>"  id="redirect" name="redirect">
        <?php echo csrf_field(); ?>

      <div class="container w-40 p-3 ">
        <?php if(Session::get('errorsUnique')): ?>
        <div class="alert-danger text-center mb-3 p-3 " >
                      <strong id="msg_err"><?php echo e(Session::get('errorsUnique')); ?> </strong> 
                      </div>   
          <?php endif; ?>
      <input type="text" class="form-control mb-3" placeholder="<?php echo e(Auth::user()->name); ?>" readonly>
      <input type="text" class="form-control mb-3" name="code" id="code" placeholder="Access Code">
      <button type="submit" class="form-control btn-primary text-uppercase text-primary"> Join </button>

    </div>
        
      </form>
      <?php else: ?>
      <div class="alert alert-danger">
        you must be logged in to join meeting , click<a href="<?php echo e(route('login')); ?>" target='_blank'> Here </a>to login  
      </div>
      <?php endif; ?>
      

    </div>
      <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BBB_Project\BBB_DEMO\resources\views/user_join.blade.php ENDPATH**/ ?>