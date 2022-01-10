
<?php $__env->startSection('viewer_content'); ?>
<style>
  .btn_{
    margin-left:60px;
    border-width: 3px;
    
  }
</style>
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
          <?php if($errors->has('txtName')): ?>
          <span class="text-danger" role="alert">
              <strong><?php echo e($errors->first('txtName')); ?></strong>
          </span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <input type="text" class="form-control mb-3" placeholder="Your Name" name="txtName" >
      <?php if($errors->has('code')): ?>
      <span class="text-danger" role="alert">
          <strong><?php echo e($errors->first('code')); ?></strong>
      </span>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <input type="text" class="form-control mb-3" name="code" id="code" placeholder="Access Code" >
      <div class="row">
      <button type="submit" class="form-control btn-primary text-uppercase text-primary btn_ <?php echo e(!Auth::check() ? "col-md-5" : ""); ?>"> Join </button>
      <?php if(!Auth::check()): ?>
      <a href="<?php echo e(route('userRegister')); ?>" class="form-control btn_ btn-primary text-uppercase text-primary text-center col-md-5">Register</a>   
      <?php endif; ?>  
      </div>            
    </div>
        
      </form>
      
      

    </div>
      <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\plateforme-seminaire\resources\views/user_join.blade.php ENDPATH**/ ?>