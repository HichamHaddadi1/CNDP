


<?php $__env->startSection('streamer_content'); ?>
<style>
    .form_div{
  margin:0% 20% 20% 20% ;
  background-color:white;
  padding: 50px;
  border-radius: 10px;

}
form {
  text-align: left;
}

#file-upload {
  position: absolute;
  left: -9999px;
}

label[for="file-upload"] {
  color:white;
  padding: 0.5em;
  display: inline-block;
  background: #0067d4;
  cursor: pointer;
}
label[for="file-upload"]:hover {
  background: #48a1ff;
}

#filename {
  padding: 0.5em;
  float: left;
  width: 380px;
  white-space: nowrap;
  overflow: hidden;
  background: #007bff;
  color: white;
}

 
</style>


<div class="container alert alert-info alert-dismissible fade show" role="alert" style="text-transform: capitalize">
  <strong>here you can upload your presentation to be at your stream screen but make sure it is a *.PDF format </strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="form_div">
  <?php if( Session::has('success') ): ?>
                <div class="alert alert-success text-center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h5><?php echo e(Session::get('success')); ?></h5>
                </div>
<?php endif; ?>
<form action="<?php echo e(route('streamer.presentation.upload')); ?>" method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
    <div class="form-group text-center">
    <h1>Upload your Presentation</h1>
    </div>
    <div class="form-group">
     
    
        <span id="filename">Select your file</span>
        <label for="file-upload">Browse<input type="file" id="file-upload" name="file_upload"></label><br>
        <button type="submit" class="btn btn-primary">Submit</button>
   </div>
   </div>
     
  <!--****************************************************************-->
  
   
</form>
<script>
$('#file-upload').change(function() {
    var filepath = this.value;
    var m = filepath.match(/([^\/\\]+)$/);
    var filename = m[1];
    $('#filename').text(filename);
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('streamers.streamer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\BBB_DEMO\resources\views/streamers/streamer_prasent.blade.php ENDPATH**/ ?>