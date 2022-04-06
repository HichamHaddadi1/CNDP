



<?php $__env->startSection('validator_content'); ?>
<div class="container">
<table class="table table-hover">

    <thead>
      <tr>
  
        <th scope="col">Seminar Theme</th>
        <th scope="col">Starts At</th>
        <th scope="col">Ending At</th>
        <th scope="col">Owner</th>
        <th scope="col">Create at</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($event->isVerified == 'Pending'): ?>
      <tr>  
      
      <td><?php echo e($event->event_theme); ?></td>
      <td><?php echo e(str_replace('00:', '',$event->starting_at)); ?></td>
      <td><?php echo e(str_replace('00:', '',$event->ending_at)); ?></td>
      <td><?php echo e(str_replace(str_split('"[]'),'', App\Models\User::where('id' , '=' , $event->id_user)->pluck('name') )); ?></td>
      <td><?php echo e($event->created_at); ?></td>
      <td colspan="2">
        
      <a  class="btn btn-success btn-sm" href="<?php echo e(route('verify_event' , [$event->id,'v'])); ?>"><i class="fas fa-check"></i> Validate Seminar</a>
        <a class="btn btn-danger btn-sm" href="<?php echo e(route('verify_event' , [$event->id,'d'])); ?>"><i class="fas fa-times"></i> Deny Seminar</a>
      </td>
    </tr>
    <?php endif; ?>
   
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>

  </table>
   


  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('EventValidator.EV_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Seminaire-CNDP\resources\views/EventValidator/pending_events.blade.php ENDPATH**/ ?>