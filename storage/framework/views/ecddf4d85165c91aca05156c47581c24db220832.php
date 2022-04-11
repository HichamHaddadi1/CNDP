


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
<h2 class="m-3">room_descStreamers Rooms</h2>
<?php if(Session::get('success')): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo e(Session::get('success')); ?>

      </div>
      <?php endif; ?>
<table class="table table-hover">
 
 <div class="search mb-3">
<form action="<?php echo e(route('search_room_admin')); ?>" method="GET">
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
        <th scope="col">Room Name</th>
        <th scope="col">Room Description</th>
        <th scope="col">User</th>
        <th scope="col">Access Code</th>
        <th scope="col">Room Statue</th>
        <th scope="col">Created at</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($room->verified == 'verified'): ?>
        
        <tr>  
        <td><?php echo e($room->room_name); ?></td>
        <td class="room_desc"><?php echo e($room->room_desc); ?></td>
        <td><?php echo e($room->user->name); ?></td>
        <?php if($room->viewer_pw == ''): ?>
        <td>No key for this room</td>
        <?php else: ?>
        <td><?php echo e($room->viewer_pw); ?></td>
        <?php endif; ?>
        <?php if(\Bigbluebutton::isMeetingRunning($room->id.'cmp') == false): ?>
        <td><img src="https://img.icons8.com/emoji/48/000000/red-circle-emoji.png" style="width: 10px; height:10px;" /> Offline</td>
        <?php else: ?>
        <td><img src="https://img.icons8.com/emoji/48/000000/green-circle-emoji.png" style="width: 10px; height:10px;" /> Online</td>
        <?php endif; ?>
         <td><?php echo e($room->created_at); ?></td>
        <td colspan="3">
          <a class="btn btn-primary btn-sm" href="<?php echo e(route('admin.rooms_start' , $room->id)); ?>"><i class="fa fa-play fa-sm"></i> Start Room</a>
          <button class="btn btn-primary btn-sm" style="color: white" data-clipboard-text=" <?php echo e(route('join',[$room->id,Crypt::encrypt($room->id)])); ?>">
            Copy Link
           </button> 
       <a  href="<?php echo e(route('delete.room' , $room->id)); ?>"><button class="btn btn-primary btn-sm" style="background-color: #dc3545">Delete Room</button></a>
        </td>
        
      </tr>
      <?php endif; ?>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
   
  
    </tbody>
  
  </table>
  
    <span class="pagination justify-content-center" >
    <?php echo e($rooms->links()); ?>

    </span>


 
    </div>

<script>
  new ClipboardJS('.btn');
</script>




  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Seminaire-CNDP\resources\views/admin_rooms.blade.php ENDPATH**/ ?>