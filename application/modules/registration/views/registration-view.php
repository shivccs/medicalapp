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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>

    var base_url = '<?php echo base_url(); ?>';
  </script>
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
              <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>registration/signup">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" placeholder="Enter your name here" name="patient_name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" name="gender" required>
                        <option hidden="">Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" name="mstatus" required>
                        <option hidden="">Marital status</option>
                        <option>Married</option>
                        <option>Unmarried</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control form-control-sm" type="date" name="dob" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input name="mobile" type="text" class="form-control form-control-sm" placeholder="Enter Your Mobile Number" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control">
                          <option hidden="IN">India</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" placeholder="Address Line" name="add">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" name="state" id="state" required>
                        <option value="">Select State</option>
                        <?php foreach ($states as $key => $svalue) { ?>
                        <option value="<?php echo $svalue['id']; ?>" ><?php echo $svalue['name']; ?></option>

                        <?php } ?>
                                  
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" name="city" required id="city" >
                          <option value="">Select City</option>                       
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" placeholder="Postcode" name="pincode" required>
                    </div>
                  </div>
                  
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submit">SIGN UP</button>
                  <?php
                        if ($this->session->flashdata('msg')) {
                          echo $this->session->flashdata('msg');
                        }
                     ?>
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

<script type="text/javascript">
    $('#state').change(function(){
      $('#city').empty();
      var state =$('#state').val();
      if (state.length>0) {
          $.ajax({
                type: 'POST',
                url: base_url + 'user_registration/get_cities',
                data: JSON.stringify(state),
                dataType: 'json',
             })
             .done(function(json) {
                $('#roh').hide();
        $('#city').show();
                var city_html = '<option value="">Select City</option>';

                $.each(json.cities, function(i, item) {
                    city_html = city_html + '<option value="'+item.id+'">'+item.name+'</option>';
                });

                $('#city').append(city_html); 
             
             })
              .fail(function(xhr, status, errorThrown) {
                alert('Something went wrong!');
             }); 
     
      }else{
               var city_html = '<option value="">No City</option>';
               $('#city').append(city_html); 
      }//end of if      
             
    }); // end of change state
</script>

</html>
