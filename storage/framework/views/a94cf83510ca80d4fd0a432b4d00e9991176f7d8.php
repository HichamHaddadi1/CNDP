

<?php $__env->startSection('viewer_content'); ?>
<body>
  <link rel="stylesheet" href="\css\contactstylemain.css">
    <div class="container">
      
      <div class="row">
        
        <div class="col-lg-5 col-xl-5 mx-auto">
          <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div class="card-img-left d-none d-md-flex">
              <!-- Background image for card set in CSS! -->

               
            </div>
            <div class="card-body p-2 p-sm-3">
            <?php if( Session::get('errorsUnique')): ?>
            <div class="alert-danger text-center mb-3 p-3 " >
                          <strong><?php echo e(Session::get('errorsUnique')); ?> </strong> 
                          </div>   
              <?php endif; ?>
              
            
              <h1 class="card-title text-center mb-3 fw-normal fs-5">Login</h1>
             
              <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
              
                <div class="form-floating mb-2">
                  <label for="email">Email</label>
                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" autocomplete="email">
                    
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-floating mb-2">
                  <label for="password">Password</label>
                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="current-password">
                    
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="d-grid mb-2">
                  <button class="btn btn-primary btn-login fw-bold text-uppercase " type="submit">Login</button>
                </div>
                <hr class="my-4"> 
                <div class="d-flex">
              <div class="col">
                <a class="d-block text-center mt-2 text-uppercase color-red" href="<?php echo e(route('join_us')); ?>">Not a member yet ? Sign Up</a>
                </div>
                <div class="offset-0 border-left pl-2"></div>
                <div class="col">
                <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link text-uppercase" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Forgot Your Password?')); ?>

                                    </a>
                                <?php endif; ?>
                                </div>
               </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BBB_Project\BBB_DEMO\resources\views/auth/login.blade.php ENDPATH**/ ?>