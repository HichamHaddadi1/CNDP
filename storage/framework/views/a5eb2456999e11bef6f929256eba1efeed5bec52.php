
<?php $__env->startSection('viewer_content'); ?>
<style>
     .btn_{
       margin-left:40px;
       border-width: 3px;
     }
    .btn_f{
        width: 96%;
        margin-left: 2%;
    }
    .showme {
       display: none;
       margin-left: 8px;
       text-transform: none;
       text-align: justify !important;
    }
    .showhim:hover .showme {
        display: block;
        font-size: 11px;
        width: auto;
        font-weight: 600;

        background-color: #182c7d;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        /* Position the tooltip */
        position: absolute;
        z-index: 9999;
        padding: 6px 20px;
        max-width: 60%;
    }
</style>
<div class="container border rounded border-primary mt-5 w-40 p-3 col-md-6">
  <div class="text-center">
  <h3 class="text-primary  text-uppercase mt-3 ">Welcome </h3>
  <h5 class="text-muted">Enter the required informations to join the Seminar</h5>
  </div>

    
    <form method="POST" action="<?php echo e(route('join_stream' ,$id)); ?>"  id="redirect" name="redirect">
        <?php echo csrf_field(); ?>

      <div class="container w-40 p-3 ">
        <?php if(Session::get('errorsUnique')): ?>
        <div class="alert-danger text-center mb-3 p-3">
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
            <button type="submit" class="form-control btn-primary text-uppercase text-primary <?php echo e(!Auth::check() ? "btn_ col-md-5" : "btn_f"); ?> showhim"> Join <div class="showme">You can directly join the ongoing seminar by clicking on join after having entered your name and the access code to the seminar's virtual room that you would have received with the invitation or via email. </div></button>
            <?php if(!Auth::check()): ?>
               <a href="<?php echo e(route('userRegister')); ?>" class="form-control btn-primary text-uppercase text-primary text-center col-md-5 showhim btn_">Register <div class="showme">You can join the ongoing seminar by creating your own account, which will allow us to identify you everytime you join a seminar on our platform, and to notify you about the latest seminars and conferences.</div></a>
            <?php endif; ?>
        </div><!-- fin row -->
     </div>
        
      </form>
      
      

    </div>
      <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.viewer_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Seminaire-CNDP\resources\views/user_join.blade.php ENDPATH**/ ?>