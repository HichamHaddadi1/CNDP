



<?php $__env->startSection('validator_content'); ?>
<div class="container">
<h3 class="m-3">Users</h3>
<?php if(Session::get('success')): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo e(Session::get('success')); ?>

      </div>
      <?php endif; ?>

      <table class="table table-hover">
  <div class="search mb-3">

</div>
    <thead>
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Full name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Language</th>
        <th scope="col">Created at</th>
        <th scope="col">Role</th>
        
      </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $all_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $one_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($one_user->id != Auth::user()->id && $one_user->role !=4): ?>
       <?php echo csrf_field(); ?>
        <tr>

            <td><?php echo e($one_user->name); ?></td>
            <td><?php echo e($one_user->fname . " " . $one_user->lname); ?></td>
            <td><?php echo e($one_user->email); ?></td>
            <td><?php echo e($one_user->gender); ?></td>
            <td><?php echo e($one_user->language); ?></td>
            <td><?php echo e($one_user->created_at); ?></td>
            <?php if($one_user->role == 2): ?>
            <td class="bg-secondary bg-gradient">Streamer </td>
            <?php endif; ?>
            <?php if($one_user->role == 3): ?>
            <td class="bg-info bg-opacity-25" >Normal User </td>
            <?php endif; ?>
            
        <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

  </table>
  <span class="pagination justify-content-center" >
    <?php echo e($all_users->links()); ?>

    </span>
</div>



  <?php $__env->stopSection(); ?>

<?php echo $__env->make('EventValidator.EV_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Seminaire-CNDP\resources\views/EventValidator/all_streamers.blade.php ENDPATH**/ ?>