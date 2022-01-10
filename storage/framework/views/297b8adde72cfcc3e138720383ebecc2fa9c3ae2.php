


<?php $__env->startSection('admin_content'); ?>
<style>
    .form_div{
  margin:0% 20% 20% 20% ;
  background-color:white;
  padding: 50px;
  border-radius: 10px;
  box-shadow:1px 2px solid grey;
}
</style>
<div class="form_div">
<form action="<?php echo e(route('admin.presentation' ,Auth::user()->id)); ?>" method="POST">
    <div class="form-group">
    <h1>Upload your Presentation</h1>
    </div>
    <div class="form-group">
     
    </div>
    <div class="form-check">
    <input type="file" placeholder="choose your presentation .PDF" name="file_upload">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\BBB_DEMO\resources\views/admin_present.blade.php ENDPATH**/ ?>