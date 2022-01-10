

<?php $__env->startSection('admin_content'); ?>
<div class="container">
  <h3 class="m-3">Events</h3>
<?php if(Session::get('success')): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo e(Session::get('success')); ?>

      </div>
      <?php endif; ?>
      <table class="table table-hover">

    <thead>
      <tr>
        <th scope="col">Event Theme</th>
        <th scope="col">Starts At</th>
        <th scope="col">Ending At</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
          <tr>  
      
      <td><?php echo e($event->event_theme); ?></td>
      <td><?php echo e($event->starting_at); ?></td>
      <td><?php echo e($event->ending_at); ?></td>
      <td><?php echo e($event->isVerified); ?></td>
      
      <td colspan="2">
        <?php if($event->isVerified == 'Verified'): ?>
        <a class="btn btn-danger btn-sm" href="<?php echo e(route('delete.event' , $event->id)); ?>"><i class="fas fa-trash"></i> Delete</a>
        <a class="btn btn-primary btn-sm" href="<?php echo e(route('admin.rooms_start' , $event->id_room)); ?>"><i class="fa fa-play fa-sm"></i> Start Room</a>
        <?php endif; ?>
      </td>
      
    </tr>
      
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>

  </table>


  

  <form id="adminEventUpdate" action="admin/streams/" method="GET">
    <?php echo csrf_field(); ?>
  <div class="modal fade" id="EditEventAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="form-row">
      
      
      <div class="modal-body mx-3">
        <div class="md-form">
        </div>
      </div>
    </div>

      <div class="modal-body mx-3">
        <div class="md-form mb-3">
            <label data-error="wrong" data-success="right" for="orangeForm-email">Event Theme</label>
            <input type="text" id="RoomNameUpdate" name="event_themeUpdate" class="form-control validate"   >
        </div>
        <div class="time-picker">   
            <div class="form-group row">
                <div class="md-orm ">
                  <label class="col-form-label text-right">Start at</label>
                  <input type="text" id="startingUpdate" name="starting_at_Update" autocomplete="off" value="" class="form-control form-control-solid datetimepicker-input" id="kt_datetimepicker_5" placeholder="Select date & time"  data-toggle="datetimepicker" data-target="#kt_datetimepicker_5" onfocusout="checkDates()" />
                  <span for="end" id="start_error_update" class="text-danger error-text start_error_update"></span>
                </div>
                
            <div class="md-orm ">
                  <label class="col-form-label text-right">End at</label>
                  <input type="text" id="EndingUpdate" name="ending_at_Update" autocomplete="off" value="" class="form-control form-control-solid datetimepicker-input" id="kt_datetimepicker_4" placeholder="Select date & time"  data-toggle="datetimepicker" data-target="#kt_datetimepicker_4"   />
            </div>   
        </div>
        
        <div class="md-form "> 
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Event Description</label>
            
            <textarea name="event_desc_Update" id="DescUpdate" class="form-control validate" cols="30" rows="6"  ></textarea>
        </div>
      <div class="modal-footer d-flex justify-content-center">
        <a id='specialURL' href="admin/streams/">   <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save Changes</button></a>
      </div>
    </div>
  </div>
</div>
</div>
</form>
</div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\BBB_DEMO\resources\views/admin_streams.blade.php ENDPATH**/ ?>