


<?php $__env->startSection('streamer_content'); ?>
  <div class="container">
    <div class="alert alert-info alert-dismissible fade show" role="alert" style="text-transform: capitalize">
      <strong>Note :</strong> after you have finished your live stream you will find your records hestory but make sure you started recording at your stream top middle 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<table class="table table-hover"> 
<?php if(Session::get('success')): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo e(Session::get('success')); ?>

      </div>
      <?php endif; ?>
<thead>
  <tr>
  <th style="width: 2%;">#</th>
  <th style="width: 5%; text-align: center;">Type</th>
  <th style="width: 5%; text-align: center;">Participants</th>
  <th style="width: 15%; text-align: center;">Actions</th>
  </tr>
</thead>

<tbody>
 
 
  <?php $__currentLoopData = $recs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>  
        <td style="text-align: center;"><?php echo e($rec['name']); ?></td>
        <td style="text-align: center;"><?php echo e($rec['playback']['format']['type']); ?></td>
        <td style="text-align: center;"><?php echo e($rec['participants']); ?></td>
        <td style="text-align: center;">
        <a class="btn btn-success btn-sm" href="<?php echo e($rec['playback']['format']['url']); ?>" target="_blank"><i class="fa fa-play fa-sm"></i> View Recording</a> 
        <a class="btn btn-danger btn-sm" href="<?php echo e(route('streamer.delete.recordigns' ,$rec['recordID'] )); ?>"><i class="fa fa-times fa-sm"></i> Delete Recording</a>
        </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</tbody>

</table>
</div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('streamers.streamer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Seminaire-CNDP\resources\views/streamers/recordings.blade.php ENDPATH**/ ?>