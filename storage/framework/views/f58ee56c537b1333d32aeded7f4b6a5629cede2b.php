<?php $__env->startSection('validator_content'); ?>
<div class="container">
<table class="table table-hover">

    <thead>
      <tr>
        <th scope="col">Event Theme</th>
        <th scope="col">Starts At</th>
        <th scope="col">Ending At</th>
        <th scope="col">Owner</th>
        <th scope="col">is Verified</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
      <td><?php echo e($event->event_theme); ?></td>
      <td><?php echo e(str_replace('00:', '',$event->starting_at)); ?></td>
      <td><?php echo e(str_replace('00:', '',$event->ending_at)); ?></td>
      <td><?php echo e(str_replace(str_split('"[]'),'', App\Models\User::where('id' , '=' , $event->id_user)->pluck('name') )); ?></td>
      <td><?php echo e($event->isVerified); ?></td>
      <td colspan="2">
        
        <?php if($event->isVerified == 'Denied'): ?>
      <a  class="btn btn-success btn-sm" href="<?php echo e(route('verify_event' , [$event->id,'v'])); ?>"><i class="fas fa-check"></i> Validate Events</a>
      <?php elseif($event->isVerified == 'Verified'): ?>
        <a class="btn btn-danger btn-sm" href="<?php echo e(route('verify_event' , [$event->id,'d'])); ?>"><i class="fas fa-times"></i> Deny Events</a>
        <?php endif; ?>
      </td>
    </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>

  </table>
   <span class="pagination justify-content-center" >
    
    </span>


  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('EventValidator.EV_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plateforme-seminaire\resources\views/EventValidator/events.blade.php ENDPATH**/ ?>