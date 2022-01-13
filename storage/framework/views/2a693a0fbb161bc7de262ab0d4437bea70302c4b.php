
<?php $__env->startSection('viewer_content'); ?>




<div class="container d-flex justify-content-center align-items-center mt-5">
	

  <div class="img">
<?php if(Auth::user()->role ==2 && Auth::user()->status == 'Pending'): ?>
       <div class="alert alert-danger mt-3" role="alert">
               Wait until your account is verified , you will receive an email !
            </div>
            <?php elseif(Auth::user()->status == 'verified'): ?>
            <div class="alert alert-success mt-3" role="alert">
              Your account is verified click here to access your dashboard <a href="<?php echo e(route('streamer.profile')); ?>" class="btn btn-success">Dashboard</a>
            </div>
            <?php else: ?>
            <div class="alert alert-danger mt-3" role="alert">
              Your account is Denied , Contact the site administraion for more infos 
            </div>
        <?php endif; ?>
</div>

	
</div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Seminaire-CNDP\resources\views/streamer_confirmation.blade.php ENDPATH**/ ?>