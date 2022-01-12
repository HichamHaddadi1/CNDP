<?php $__env->startSection('validator_content'); ?>

<div class="container">
<h2 class="m-3">Streamers</h2>
<?php if(Session::get('success')): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo e(Session::get('success')); ?>

      </div>
      <?php endif; ?>
      <?php if(Session::get('errorsUnique')): ?>
      <div class="alert alert-danger mt-3" role="alert">
        <?php echo e(Session::get('errorsUnique')); ?>

      </div>
      <?php endif; ?>
<table class="table table-hover">
<div class="search mb-3">
<form action="<?php echo e(route('search_users')); ?>" method="GET">
 <div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <div class="input-group">
      <input type="search" id="search" name="search" class="form-control" placeholder="Search ">
      <button type="submit" class="btn btn-outline-primary">search</button>


    </div>
  </div>
</div>
</form>
</div>
    <thead>
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Full name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Language</th>
        <th scope="col">Options</th>
      </tr>
    </thead>

    <tbody>

        <?php $__currentLoopData = $streamers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $streamer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($streamer->role == 2  && $streamer->status == 'Pending'): ?>
          <tr>
       <?php echo csrf_field(); ?>


            <td><?php echo e($streamer->name); ?></td>
            <td><?php echo e($streamer->fname . " " . $streamer->lname); ?></td>
            <td><?php echo e($streamer->email); ?></td>
            <td><?php echo e($streamer->gender); ?></td>
            <td><?php echo e($streamer->language); ?></td>

            <td colspan="2">
            <?php if($streamer->status == 'Pending'): ?>
            <a class="btn btn-success btn-sm" href="<?php echo e(route('validator_verify_streamer' , [$streamer->id,'v'])); ?>"><i class="fas fa-check fa-sm"></i> Verify</a>
            <a class="btn btn-danger btn-sm" href="<?php echo e(route('validator_verify_streamer' , [$streamer->id,'d'])); ?>"><i class="fas fa-times fa-sm"></i> Deny</a>
            <?php endif; ?>
              </td>
            </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>


  </table>
  <span class="pagination justify-content-center" >
    <?php echo e($streamers->render()); ?>

    </span>
</div>



  <?php $__env->stopSection(); ?>

<?php echo $__env->make('EventValidator.EV_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plateforme-seminaire\resources\views/EventValidator/pending_user_validator.blade.php ENDPATH**/ ?>