<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo base_url() ?>" />

    <title>Mbingweb - Qodd Portal Base</title>

    <!-- Bootstrap -->
    <link href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendor/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="formLogin" action="<?php echo $form_login ?>" method="post">
              <h1>Login Form</h1>
              <?php 
                $flash_message = $this->session->flashdata('handler_msg');
                if( ! empty($flash_message) ) {
                  echo '<p class="alert alert-'. $flash_message['type'] .'" id="flash_message"><b>'. $flash_message['msg'] .'</b></p>';
                }
              ?>
              <div>
                <input type="text" class="form-control" name="userLOGINID" placeholder="Username/Email" required />
              </div>
              <div>
                <input type="password" class="form-control" name="userLOGINPWD" placeholder="Password" required />
              </div>
              <div>
                <button type="submit" class="btn btn-default">Log In</button>
                <a class="reset_pass" href="login">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!-- <p class="change_link">New to site?
                  <a href="qoddportal#signup" class="to_register"> Create Account </a>
                </p> -->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-users"></i> Qodd Portal</h1>
                  <p>&copy;2018 All Rights Reserved. Siebentech - Group of SiebenAnymatics</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="login#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Qodd Portal</h1>
                  <p>&copy;2018 All Rights Reserved. Siebentech - Group of SiebenAnymatics</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery-validate/jquery.validate.min.js"></script>
<script>
  $('#formLogin').validate();
</script>