


<?php $__env->startSection('admin_content'); ?>
<style>
  .room_desc{
    width: 250px;
    max-width: 250px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
  }
  </style>
  <div class="container">
  <h2 class="m-3">Pending Requests</h2>
  <?php if(Session::get('success')): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo e(Session::get('success')); ?>

      </div>
      <?php endif; ?>
  <table class="table table-hover"> 
    <thead>
      <tr>
        <th scope="col">Room Name</th>
        <th scope="col">Room Description</th>
        <th scope="col">User</th>
        <th scope="col">Max Viewers</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody> 
      <?php if($rooms->count() > 0): ?>
     
        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($room->verified == 'Pending'): ?>
        <tr>  
    
            <td><?php echo e($room->room_name); ?></td>
            <td class="room_desc"><?php echo e($room->room_desc); ?></td>
            <td><?php echo e($room->user->name); ?></td>
            <td><?php echo e($room->max_viewers); ?></td>
        <td colspan="2">
          <a class="btn btn-success btn-sm" href="<?php echo e(route('update.roomStatue' , [$room->id,'v'])); ?>"><i class="fas fa-check fa-sm"></i> Verify</a>
          <a class="btn btn-danger btn-sm" href="<?php echo e(route('update.roomStatue' , [$room->id,'d'])); ?>"><i class="fas fa-times"></i> Deny</a>
        </td>
      </tr>
      <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php if($room->verified != 'Pending' ): ?>
      <div class="alert alert-primary" role="alert">
        There is no rooms to approve at the moment .
      </div>
      <?php endif; ?>
      <?php endif; ?>
    </tbody>
    
  </table>
  <span>
    <?php echo e($rooms->links()); ?>

  </span>
</div>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Seminaire-CNDP\resources\views/admin_pending.blade.php ENDPATH**/ ?>