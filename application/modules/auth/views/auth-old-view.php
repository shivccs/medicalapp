<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Remidio Healthcare</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>theme/vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>theme/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>theme/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>theme/images/favicon.png" />
  <script>
  $('.js-tilt').tilt({
        scale: 1.1
      })

  (function ($) {
      "use strict";

      
      /*==================================================================
      [ Validate ]*/
      var input = $('.validate-input .input100');

      $('.validate-form').on('submit',function(){
          var check = true;

          for(var i=0; i<input.length; i++) {
              if(validate(input[i]) == false){
                  showValidate(input[i]);
                  check=false;
              }
          }

          return check;
      });


      $('.validate-form .input100').each(function(){
          $(this).focus(function(){
             hideValidate(this);
          });
      });

      function validate (input) {
          if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
              if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                  return false;
              }
          }
          else {
              if($(input).val().trim() == ''){
                  return false;
              }
          }
      }

      function showValidate(input) {
          var thisAlert = $(input).parent();

          $(thisAlert).addClass('alert-validate');
      }

      function hideValidate(input) {
          var thisAlert = $(input).parent();

          $(thisAlert).removeClass('alert-validate');
      }
      
      

})(jQuery);</script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php echo base_url(); ?>theme/images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="post" action="<?php echo base_url(); ?>auth/login">
                <div id="message" style="color:red; font-size: 18px; text-align:center; font-weight:700; center;">
                  <?php
                    if ($this->session->flashdata('msg')) {
                      $data = $this->session->flashdata('msg');
                      echo $data['msg'];
                    }
                  ?>
                </div>
                <div class="form-group">
                  <input class="form-control form-control-lg" id="username" name="email" type="email" placeholder="Username">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submit">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="<?php echo base_url(); ?>theme/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url(); ?>theme/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>theme/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>theme/js/template.js"></script>
  <script src="<?php echo base_url(); ?>theme/js/settings.js"></script>
  <script src="<?php echo base_url(); ?>theme/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
