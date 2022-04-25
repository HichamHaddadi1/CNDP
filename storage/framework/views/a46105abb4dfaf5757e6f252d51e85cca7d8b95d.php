



<?php $__env->startSection('validator_content'); ?>
<style>
  .div_export {
  background-color: white;
  padding: 30px;
  margin: 30px;
  
  }
</style>
<div class="div_export shadow p-3 mb-5 rounded text-center">
  

        <a href="/export/<?php echo e($room_id); ?>" class="btn btn-info" type="submit">
          <i class="fas fa-cloud-download-alt"></i>  Export Excel
        </a>
    
</div>
<table class="table table-striped table-info text-center">
    <thead>
      <tr>
        <th>Owner</th>
        <th>Seminar Theme</th>
        <th scope="col">Started at</th>
        <th scope="col">Ended at</th>
        <th scope="col">Participants Joined</th>
      </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr >
        <td><?php echo e($hr->name); ?></td>
        <td><?php echo e($hr->event_theme); ?></td>
        <td><?php echo e($hr->start_date); ?></td>
        <td><?php echo e($hr->end_date); ?></td>
        <td><?php echo e($hr->nb_participants.' / '.$hr->max_viewers); ?></td>
      </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
       <td colspan="5" class="text-center">
       no history for this Room
       </td>
       <?php endif; ?>
    </tbody>

  </table>
   <span class="pagination justify-content-center" >
        <?php echo e($history->links()); ?>

   </span> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('EventValidator.EV_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Seminaire-CNDP\resources\views/EventValidator/history.blade.php ENDPATH**/ ?>