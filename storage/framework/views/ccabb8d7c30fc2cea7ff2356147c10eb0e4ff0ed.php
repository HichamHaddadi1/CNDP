


<?php $__env->startSection('streamer_content'); ?>

  
<div class="container">
<?php if(Session::get('success')): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo e(Session::get('success')); ?>

      </div>
<?php elseif(Session::get('error')): ?>
      <div class="alert alert-danger mt-3" role="alert">
        <?php echo e(Session::get('error')); ?>

      </div>
      <?php endif; ?>
    <div class="btn mb-4 mr-4" style="float: right">   
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-plus"></i> Add Room</button>
    </div>
    <table class="table table-hover"> 
 
 <form action="<?php echo e(route('search_room_streamer')); ?>" method="GET">
 <div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <div class="input-group">
      <input type="search" id="search" name="search" class="form-control" placeholder="Search ">
      <button type="submit" class="btn btn-outline-primary">search</button>
    </div>
  </div>
</div>
</form>
    <thead>
      <tr>
        <th scope="col">Room Name</th>
        <th scope="col">Room Description</th>
        <th scope="col">Max Attendees</th>
        <th scope="col">Access Code</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(Auth::user()->id == $room->user->id  ): ?>
            
        <tr> 
        <td><?php echo e($room->room_name); ?></td>
        <td class="room_desc"><?php echo e($room->room_desc); ?></td>
        <td ><?php echo e($room->max_viewers); ?></td>
        <td><?php echo e($room->viewer_pw); ?></td>
      
         
        <td colspan="3">
          <?php if($room->verified!='Pending' && $room->verified!='Denied'): ?>

           
       <?php endif; ?> 

       <?php if($room->verified!='Pending'): ?>
       <a  href="<?php echo e(route('delete.room' , $room->id)); ?>"><button class="btn btn-primary btn-sm" style="background-color: #dc3545">Delete Room</button></a>
       <?php endif; ?> 

        </td>
        
        <!-- Trigger -->
        
      
      </tr>
      <?php endif; ?>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
   
  
    </tbody>
  
  </table>
  
    <span class="pagination justify-content-center" >
    <?php echo e($rooms->links()); ?>

    </span>


 
  <form action="<?php echo e(route ('streamers.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Create Room</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-3">
            <label data-error="wrong" data-success="right" for="orangeForm-email">Room Name</label>
            <input type="text" id="RoomName" name="room_name" class="form-control validate">
          
        </div>
        <div class="row">
          <div class="col">
            <div class="md-form mb-3">
                <label data-error="wrong" data-success="right" for="orangeForm-email">Max Attendees</label>
                <input type="text" id="MaxViewer" name="max_viewers" class="form-control validate">
            </div>
            </div>
            <div class="col">
            <div class="md-form mb-3">
              <label data-error="wrong" data-success="right" for="orangeForm-email">Viewer Password</label>
              <input type="text" id="MaxViewer" name="viewer_pw" class="form-control validate">
            </div>
          </div>
          </div>
          
        <div class="md-form mb-4"> 
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Room Description</label>
            <textarea id="RoomDesc" name="room_desc" class="form-control validate" cols="30" rows="8"></textarea>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-info">Create Room</button>
      </div>
    </div>
  </div>
</div>
<script>
  new ClipboardJS('.btn');
</script>


</div>
</form>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('streamers.streamer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BBB_origin\BBB_DEMO\resources\views/streamers/rooms.blade.php ENDPATH**/ ?>