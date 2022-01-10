
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   
    <style>
      #header
      {
        text-align:center;
        background-color: #2f589e;
        padding: 20px;
      }
      .img_logo
      {
        
        width: 100px;
      }
      body{
        color: white;
        padding:0;
        margin:0;
        background-color:#2f589e ;
      }
      .content{
       
       padding-top:50px;
      }
     .btn_login{
       text-align: center;
       margin-top:50px;
     }
     .btn-primary{
        background-color: tomato;
        padding: 20px;
        border-color: white;
        border-radius: 5px;
        font-weight:bold ;
        text-decoration:none ;
        color:white;
      }
      .layout{
       text-align: center;
      }
    </style>
  </head>
  <body>
    <div>
      <!-- <div class="layout" >
        <div id="header">
        <img src="\img\logo.png" alt="tamkine logo" class="img_logo">
        </div>
        <h1 class="display-3"><?php echo e($details['greeting']); ?></h1>
        <div class="content container">
        <p class="display-1"><?php echo e($details['message']); ?></p>
        </div>
        <div class="btn_login">
         <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-lg">LOG IN</a>
        </div>
      </div> -->

      <!-- Example -->
    	<!-- module 2 -->
      <table data-module="module-2" data-thumb="thumbnails/02.png" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" width="600" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
                <tr>
									</tr>
									<tr>
										<td data-bgcolor="bg-block" class="holder" style="padding:58px 60px 52px;" bgcolor="#f9f9f9">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:35px/38px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px;">
													<?php echo e($details['greeting']); ?>

													</td>
												</tr>
												<tr>
													<td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="center" style="font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
                          Thank you for using our platform and we would like to inform you that <?php echo e($details['message']); ?>

                         
													</td>
												</tr>
												<tr>
													<td style="padding:0 0 20px;">
														<table width="134" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
															<tr>
																<td data-bgcolor="bg-button" data-size="size button" data-min="10" data-max="16" class="btn" align="center" style="font:12px/14px Arial, Helvetica, sans-serif; color:#f8f9fb; text-transform:uppercase; mso-padding-alt:12px 10px 10px; border-radius:2px;" bgcolor="#2f589e">
																	<a target="_blank" style="text-decoration:none; color:#f8f9fb; display:block; padding:12px 10px 10px;" href="<?php echo e(route('login')); ?>">Login</a>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td height="28"></td></tr>
								</table>
							</td>
						</tr>
					</table>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\plateforme-seminaire\resources\views/streamers/mail.blade.php ENDPATH**/ ?>