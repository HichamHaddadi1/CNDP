


<?php $__env->startSection('user_content'); ?>
<div class="container">
      <div class="main-body">
          <!-------------------------------------------------------------------------------------------------->
          <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-100 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                  <div class="card-block text-center text-white">
                                  <?php if(!empty(auth()->user()->avatar)): ?>
                                <div class="m-b-25"> <img src="/upload/<?php echo e(Auth::user()->avatar); ?>" alt="avatar" class="img-radius" style="border-radius: 50% ; width:150px ; height:150px" > </div>
                              <?php else: ?>
                              <div class="m-b-25"> <img src="/img/default-icon.png" alt="avatar" class="img-radius" style="border-radius: 50% ; width:150px ; height:150px" > </div>
                              <?php endif; ?>
                                    <h6 class="f-w-600"><?php echo e(Auth::user()->name); ?></h6>
                                    <p class="mb-2 f-w-600" style="color:rgb(255, 255, 255);">Change Avatar </p>
                          
                                    <form enctype="multipart/form-data" action="/profile" method="post">
                              
                                      <div class="input-group">
                                        <div class="custom-file">
                                         <!-- <input type="file" class="custom-file-input" id="inputGroupFile04" name="image" accept="image">
                                         -->
                                          <div class="custom-file-upload">
                                            <!--<label for="file">File: </label>--> 
                                            
                                            <input type="file" id="file" name="image"  accept="image" />
                                          </div>
                                          <!--<label class="custom-file-label" for="inputGroupFile04">Choose file</label>-->
                                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        </div>
                                        
                                        <div class="input-group-append">
                                          <button type="submit" class="btn btn-outline-light" type="button">Submit</button>
                                        </div>
                                      </div>
              
                                    </form>
                                </div>
                              </div>
                              <div class="col-sm-8">
                                <form action="<?php echo e(route('user_profile_update' , Auth::user()->id)); ?>" method="GET">
                                  <div class="card-block">
                                      <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informations</h6>
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <p class="m-b-10 f-w-600">First Name</p>
                                              <h6 class="text-muted f-w-400"> <input type="text" name ="fname" value="<?php echo e(Auth::user()->fname); ?>" class="form-control" id="EmailInput"  ></h6>
                                          </div>
                                          <div class="col-sm-6">
                                              <p class="m-b-10 f-w-600">Last Name</p>
                                              <h6 class="text-muted f-w-400"> 
                                                <input type="text" name ="lname" value="<?php echo e(Auth::user()->lname); ?>" class="form-control" id="NameInput" ></h6>
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400"> <input type="text" name ="email" value="<?php echo e(Auth::user()->email); ?>" class="form-control" id="EmailInput"  ></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">User Name</p>
                                            <h6 class="text-muted f-w-400"> 
                                              <input type="text" name ="username" value="<?php echo e(Auth::user()->name); ?>" class="form-control" id="NameInput" ></h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6">
                                          <p class="m-b-10 f-w-600">Adress</p>
                                          <h6 class="text-muted f-w-400"> <input type="text" name ="adress" value="<?php echo e(Auth::user()->address); ?>" class="form-control" id="EmailInput"  ></h6>
                                      </div>
                                      <div class="col-sm-6">
                                          <p class="m-b-10 f-w-600">Country</p>
                                          <h6 class="text-muted f-w-400"> 
                                            <input type="text" name ="country" value="<?php echo e(Auth::user()->country); ?>" class="form-control" id="NameInput" readonly="readonly"></h6>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6">
                                          <p class="m-b-10 f-w-600">Language</p>
                                          <h6 class="text-muted f-w-400"> 
                                            <input type="text" name ="language" value="<?php echo e(Auth::user()->language); ?>" class="form-control" id="EmailInput" readonly="readonly" ></h6>
                                      </div>
                                      <div class="col-sm-6">
                                          <p class="m-b-10 f-w-600">Gender</p>
                                          <h6 class="text-muted f-w-400"> 
                                            <input type="text" name ="country" value="<?php echo e(Auth::user()->gender); ?>" class="form-control" id="NameInput" readonly="readonly"></h6>
                                      </div>
                                  </div>
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <input type="submit" class="btn btn-success" value="Update">
                                          </div>
                                      </div>
                                  </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
          </div>
          </div>
      </div>
  </div>
  <script>
    ;(function($) {
    
    // Browser supports HTML5 multiple file?
    var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
      isIE = /msie/i.test( navigator.userAgent );
    
    $.fn.customFile = function() {
    
    return this.each(function() {
    
      var $file = $(this).addClass('custom-file-upload-hidden'), // the original file input
          $wrap = $('<div class="file-upload-wrapper">'),
          $input = $('<input type="text" class="file-upload-input" />'),
          // Button that will be used in non-IE browsers
          $button = $('<button type="button" class="file-upload-button">Select a File</button>'),
          // Hack for IE
          $label = $('<label class="file-upload-button" for="'+ $file[0].id +'">Select a File</label>');
    
      // Hide by shifting to the left so we
      // can still trigger events
      $file.css({
        position: 'absolute',
        left: '-9999px'
      });
    
      $wrap.insertAfter( $file )
        .append( $file, $input, ( isIE ? $label : $button ) );
    
      // Prevent focus
      $file.attr('tabIndex', -1);
      $button.attr('tabIndex', -1);
    
      $button.click(function () {
        $file.focus().click(); // Open dialog
      });
    
      $file.change(function() {
    
        var files = [], fileArr, filename;
    
        // If multiple is supported then extract
        // all filenames from the file array
        if ( multipleSupport ) {
          fileArr = $file[0].files;
          for ( var i = 0, len = fileArr.length; i < len; i++ ) {
            files.push( fileArr[i].name );
          }
          filename = files.join(', ');
    
        // If not supported then just take the value
        // and remove the path to just show the filename
        } else {
          filename = $file.val().split('\\').pop();
        }
    
        $input.val( filename ) // Set the value
          .attr('title', filename) // Show filename in title tootlip
          .focus(); // Regain focus
    
      });
    
      $input.on({
        blur: function() { $file.trigger('blur'); },
        keydown: function( e ) {
          if ( e.which === 13 ) { // Enter
            if ( !isIE ) { $file.trigger('click'); }
          } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
            // On some browsers the value is read-only
            // with this trick we remove the old input and add
            // a clean clone with all the original events attached
            $file.replaceWith( $file = $file.clone( true ) );
            $file.trigger('change');
            $input.val('');
          } else if ( e.which === 9 ){ // TAB
            return;
          } else { // All other keys
            return false;
          }
        }
      });
    
    });
    
    };
    
    // Old browser fallback
    if ( !multipleSupport ) {
    $( document ).on('change', 'input.customfile', function() {
      var $this = $(this),
          // Create a unique ID so we
          // can attach the label to the input
          uniqId = 'customfile_'+ (new Date()).getTime(),
          $wrap = $this.parent(),
    
          // Filter empty input
          $inputs = $wrap.siblings().find('.file-upload-input')
            .filter(function(){ return !this.value }),
    
          $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');
    
      // 1ms timeout so it runs after all other events
      // that modify the value have triggered
      setTimeout(function() {
        // Add a new input
        if ( $this.val() ) {
          // Check for empty fields to prevent
          // creating new inputs when changing files
          if ( !$inputs.length ) {
            $wrap.after( $file );
            $file.customFile();
          }
        // Remove and reorganize inputs
        } else {
          $inputs.parent().remove();
          // Move the input so it's always last on the list
          $wrap.appendTo( $wrap.parent() );
          $wrap.find('input').focus();
        }
      }, 1);
    
    });
    }
    
    }(jQuery));
    
    $('input[type=file]').customFile();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('normal_users.user_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BBB_origin\BBB_DEMO\resources\views/normal_users/user_profile.blade.php ENDPATH**/ ?>