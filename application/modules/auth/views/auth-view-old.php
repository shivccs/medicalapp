<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/css/custom.min.css" rel="stylesheet">
    <title>SB ENTERPRISES | LOGIN</title>


  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?php echo base_url(); ?>auth/login">
              <h1>Login</h1>
              <div>
                <input required name="email" type="text" id="email" placeholder="User ID/Email" />  
              </div>
              <div>
                <input required name="password" type="password" id="password" placeholder="Password" />
              </div>
              <div>
                <button type="submit" class="btn btn-info">Login</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>
                <br />

                <div>
                  <h1></i>SB ENTERPRISES</h1>
                  <p>©2021 All Rights Reserved. SB Enterprises Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
