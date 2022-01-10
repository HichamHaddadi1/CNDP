
<?php $__env->startSection('viewer_content'); ?>

<div class="container border rounded border-primary mt-5 w-40 p-3">
  <div class="text-center">
  <h3 class="text-primary  text-uppercase mt-3 ">Welcome </h3> 
  <h5 class="text-muted">Enter the required informations to join the event</h5>
  </div>
 
    
    <form method="POST" action="<?php echo e(route('join_stream' ,$id)); ?>"  id="redirect" name="redirect">
        <?php echo csrf_field(); ?>

      <div class="container w-40 p-3 ">
        <?php if(Session::get('errorsUnique')): ?>
        <div class="alert-danger text-center mb-3 p-3 " >
                      <strong id="msg_err"><?php echo e(Session::get('errorsUnique')); ?> </strong> 
                      </div>   
          <?php endif; ?>
      <input type="text" class="form-control mb-3" placeholder="Your Name" name="txtName">
      <input type="text" class="form-control mb-3" name="code" id="code" placeholder="Access Code">
      <button type="submit" class="form-control btn-primary text-uppercase text-primary"> Join </button>

    </div>
        
      </form>
      
      

    </div>
      <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\BBB_DEMO\resources\views/user_join.blade.php ENDPATH**/ ?>