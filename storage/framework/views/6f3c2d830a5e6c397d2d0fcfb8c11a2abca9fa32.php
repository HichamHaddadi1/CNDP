<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>- <?php echo e($details['subject']); ?></title>
    <link rel="icon" href="<?php echo e(asset('assets/images/logo/favicon.png')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/utilities/normalize.css')); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      rel="stylesheet" />
    <style>
      .container {
        background-color: #dcdcdc23;
        color: #5a5757;
        border-bottom: 8px solid #18337d
      }

      .container .content {
        width: 440px;
        margin: 22px auto;
        padding: 28px 14px
      }

      .container .content h1 img {
        width: 100%
      }

      .container .content h2 {
        font-weight: normal;
        font-size: 30px
      }

      .container .content h2 strong {
        padding-left: 14px;
        display: block
      }

      .container .content h3 {
        font-size: 24px
      }

      .container .content h3 strong {
        padding-left: 14px;
        display: block
      }

      .container .content p {
        line-height: 1.6;
        font-size: 16px;
        color: #757373;
        font-weight: 600
      }

      .container .content .link {
        display: flex;
        justify-content: center;
        padding: 8px 0;
        margin: 8x 0
      }

      .container .content .link a {
        border-radius: 4px;
        cursor: pointer;
        text-align: center;
        padding: 14px 18px;
        background-color: #572d2f;
        color: #fff;
        width: fit-content;
        margin: auto
      }
    </style>
  </head>

  <body>
    
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
                      <?php echo e($details['subject']); ?>

                      </td>
                    </tr>
                    <tr>
                      <td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="center" style="font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
                      <?php echo e($details['message']); ?>

                     
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:0 0 20px;">
                        <table width="134" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
                          <tr>
                           mail sent by <?php echo e($details['email']); ?>

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
<?php /**PATH C:\xampp\htdocs\BBB_Project\BBB_DEMO\resources\views/contactus.blade.php ENDPATH**/ ?>