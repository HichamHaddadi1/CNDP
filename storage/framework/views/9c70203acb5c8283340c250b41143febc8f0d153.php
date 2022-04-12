



<?php $__env->startSection('validator_content'); ?>
<div class="container">
  <?php if(Session::get('success')): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo e(Session::get('success')); ?>

      </div>
  <?php elseif(Session::get('deny')): ?>
      <div class="alert alert-danger mt-3" role="alert">
        <?php echo e(Session::get('deny')); ?>

      </div>
  <?php endif; ?>
<table class="table table-hover">

    <thead>
      <tr>
        <th scope="col">Seminar Theme</th>
        <th scope="col">Starts At</th>
        <th scope="col">Ending At</th>
        <th scope="col">Owner</th>
        <th scope="col">Created at</th>
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
      <td><?php echo e($event->created_at); ?></td>
      <td><?php echo e($event->isVerified); ?></td>
      <td colspan="2">
        
        
        <?php if($event->isVerified == 'Denied'): ?>
      <a  id="<?php echo e($event->id); ?>" class="btn btn-success btn-sm btn_validate"><i class="fas fa-check"></i> Validate Seminar</a>
      <?php elseif($event->isVerified == 'Verified'): ?>
        <a id="<?php echo e($event->id); ?>" class="btn btn-danger btn-sm btn_deny_seminar" style="color:white"><i class="fas fa-times"></i> Deny Seminar</a>
        <?php endif; ?>
      </td>
    </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>

  </table>
   <span class="pagination justify-content-center" >
    <?php echo e($events->links()); ?> 
    </span>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="DenyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deny Seminar Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you wanna deny this Seminar?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger btn_deny">Deny</a>
        <button type="button" class="btn btn-secondary btn_close" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ValidateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Validate Seminar Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you wanna Validate this Seminar?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-success btn_c_validate">Validate</a>
        <button type="button" class="btn btn-secondary btn_close" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

  </div>
  
  <script>
  
      $('.btn-close ,.btn_close').click(function(){
        $('#DenyModal').modal('hide');
      });
        $('.btn_deny_seminar').click(function(){
            var event_id= $('.btn_deny_seminar').attr("id");
          
            var str='<?php echo e(route("verify_event",[":id","d"])); ?>';
            str= str.replace(':id',event_id);
            $('#DenyModal').modal('show');
            $('.btn_deny').attr('href',str);
        });
  </script>

    <script>
        $('.btn-close ,.btn_close').click(function(){
          $('#ValidateModal').modal('hide');
        });
          $('.btn_validate').click(function(){
              var event_id= $('.btn_validate').attr("id");
              var str='<?php echo e(route("verify_event",[":id","v"])); ?>';
              str= str.replace(':id',event_id);
              $('#ValidateModal').modal('show');
              $('.btn_c_validate').attr('href',str);
          });
      </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('EventValidator.EV_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Seminaire-CNDP\resources\views/EventValidator/events.blade.php ENDPATH**/ ?>