



<?php $__env->startSection('validator_content'); ?>

<div class="container">
  <?php if(Session::get('success')): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo e(Session::get('success')); ?>

      </div>
      
<?php endif; ?>
<?php if(Session::get('deny')): ?>
<div class="alert alert-success mt-3" role="alert">
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
        
      <a id="<?php echo e($event->id); ?>"  data-toggle="modal" data-target="#ValidateModal" class="btn btn-success btn-sm btn_validate" href=""><i class="fas fa-check"></i> Validate Seminar</a>
        <a id="<?php echo e($event->id); ?>" class="btn btn-danger btn-sm btn_deny" data-toggle="modal" data-target="#DenyModal" href=""><i class="fas fa-times"></i> Deny Seminar</a>
      </td>
    </tr>
    <?php endif; ?>
   
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>

  </table>
   
    <!--///////////////////////////////////////////////////////////////////////////-->


<!-- Modal -->
<div class="modal fade " id="DenyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deny Seminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Are you sure you want to deny this Seminar?
      </div>
      <div class="modal-footer">
      
        <a style="color:white" type="button" class="btn btn-danger btn_c_d">Confirm denying</a>
        <a style="color:white" type="button" class="btn btn-info btn_cancel">Cancel</a>
      </div>
    </div>
  </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////-->
<!--///////////////////////////////////////////////////////////////////////////-->


<!-- Modal -->
<div class="modal fade " id="ValidateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">validate Seminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to validate this Seminar?
      </div>
      <div class="modal-footer">
      
        <a style="color:white" type="button" class="btn btn-success btn_c_v">Confirm validation</a>
        <a style="color:white" type="button" class="btn btn-info btn_cancel">Cancel</a>
      </div>
    </div>
  </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////-->

  </div>
  <script>
    // btn validate
      $('.btn-close ,.btn_cancel').click(function(){
        $('#ValidateModal').modal('hide');
        $('#DenyModal').modal('hide');    
      });
        $('.btn_validate').click(function(){
            var event_id= $(this).attr("id");
          //console.log(room_id);
            var str='<?php echo e(route("verify_event" , [":id","v"])); ?>';
            str= str.replace(':id',event_id);
            $('#ValidateModal').modal('show');
            $('.btn_c_v').attr('href',str);
        });
    </script>
  
  
  <script>
    // btn validate
        $('.btn_deny').click(function(){
            var event_id= $(this).attr("id");
          //console.log(room_id);
            var str='<?php echo e(route("verify_event" , [":id","d"])); ?>';
            str= str.replace(':id',event_id);
            $('#DenyModal').modal('show');
            $('.btn_c_d').attr('href',str);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('EventValidator.EV_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Seminaire-CNDP\resources\views/EventValidator/pending_events.blade.php ENDPATH**/ ?>