
<?php $__env->startSection('viewer_content'); ?>

<style>
	#nav_contactus{
  background-color: #FF6A3D;
}
</style>


<div class="container d-flex justify-content-center align-items-center mt-5">
	
	<!-- // SVG
					from: https://www.freepik.com/free-vector/new-message-concept-landing-page_5777076.htm 
  -------------------------------------------------------------
  -- Note: need to use inline svg to manipulate its components
  ------------------------------------------------------------>

  <div class="img">
   <!-- <img src="\img\logoAcademy.png" alt="alt" class="contact-img">-->
</div>
<form action="<?php echo e(route('contact.send')); ?>" method="POST">
      <?php echo csrf_field(); ?>
	<?php if(Session::get('success')): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo e(Session::get('success')); ?>

      </div>
      <?php endif; ?>
		<h1 class="title text-center mb-4" style="color:#1A2238;font-weight:bold;">Contact Us</h1>
	  
		<div class="container ">
			<!-- Name -->
			<div class="text-danger text-left color-red">All fields are required</div>
			<div class="form-group position-relative">
				<label for="formName" class="d-block">
				</label>
				<input type="text" id="formName" name="name" class="form-control form-control-lg thick <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Name" >
				<?php $__errorArgs = ['name'];
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

			<!-- E-mail -->
			<div class="form-group position-relative">
				<label for="formEmail" class="d-block">
				</label>
				<input type="email" id="formEmail" name="email" class="form-control form-control-lg thick <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="E-mail" >
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
			<div class="form-group position-relative">
				<label for="ForSubject" class="d-block">
				</label>
				<input type="text" id="ForSubject" name="subject" class="form-control form-control-lg thick <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Subject" >
				<?php $__errorArgs = ['subject'];
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
			<!-- Message -->
			<div class="form-group message">
				
				<textarea id="formMessage" name="message" class="form-control form-control-lg <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" cols="30" rows="4" placeholder="Message" style="display:block;" ></textarea>
				
				<div class="text-muted text-right">Max Characters 255</div>
				
				<?php $__errorArgs = ['message'];
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
		
			<!-- Submit btn -->
			<div class="text-center">
				<button type="submit" class="btn btn-primary send_btn" tabIndex="-1">Send message</button>
			</div>
		</div>
	</form>
	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BBB_origin\BBB_DEMO\resources\views/Viewer/viewer_contact_us.blade.php ENDPATH**/ ?>