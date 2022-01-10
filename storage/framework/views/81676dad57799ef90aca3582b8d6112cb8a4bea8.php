


<?php $__env->startSection('admin_content'); ?>
<div class="container">
<h3 class="m-3">Users</h3>
<?php if(Session::get('success')): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo e(Session::get('success')); ?>

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
        <th scope="col">Role</th>
        <th scope="col">Options</th>
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
            <?php if($one_user->role == 2): ?>
            <td class="bg-secondary bg-gradient">Streamer </td>  
            <?php endif; ?>
            <?php if($one_user->role == 3): ?>
            <td class="bg-info bg-opacity-25" >Normal User </td>  
            <?php endif; ?>
            <td colspan="2">
                <a class="btn btn-danger btn-sm" href="<?php echo e(route('delete.user' , $one_user->id)); ?>"><i class="fas fa-times"></i> Delete</a>
              </td>
              <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    
  </table>
  <span class="pagination justify-content-center" >
    <?php echo e($all_users->links()); ?>

    </span>
</div>



  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\BBB_DEMO\resources\views/admin_users.blade.php ENDPATH**/ ?>