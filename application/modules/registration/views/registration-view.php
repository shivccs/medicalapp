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
            <div class="auth-form-light text-left py-3 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php echo base_url(); ?>theme/images/logo.svg" alt="logo">
              </div>
              <h4>Registration Form</h4>
              <form class="form-sample">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" placeholder="Enter your name here">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control">
                        <option hidden="">Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control">
                        <option hidden="">Marital status</option>
                        <option>Married</option>
                        <option>Unmarried</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control form-control-sm" type="date">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" placeholder="Enter Your Mobile Number">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" placeholder="Address Line">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" placeholder="City">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" placeholder="State">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" placeholder="Postcode">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control">
                          <option hidden="">Country</option>
                          <option>America</option>
                          <option>Italy</option>
                          <option>Russia</option>
                          <option>Britain</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submit">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="register.html" class="text-primary">Sign In</a>
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
