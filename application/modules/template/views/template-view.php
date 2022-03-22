<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CelestialUI Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>theme/vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>theme/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>theme/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>theme/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>theme/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>theme/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>theme/images/favicon.png" />
  <!-- base:js -->
  <script src="<?php echo base_url(); ?>theme/vendors/js/vendor.bundle.base.js"></script>

</head>

<body>
  <div class="container-scroller">

    <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <!-- partial:theme/partials/_navbar.html -->
     <?php 
          $this->load->view('nav-bar');
      ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:theme/partials/_sidebar.html -->
      <?php if (($this->session->userdata['sessiondata']['user_type']==1)) {
        $this->load->view('admin-sidebar');
        }else{
            $this->load->view('user-sidebar');
          }
      ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <?php                               //var_dump($adata);
            echo Modules::run($module);
          ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:<?php echo base_url(); ?>theme/partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url(); ?>theme/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>theme/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>theme/js/template.js"></script>
  <script src="<?php echo base_url(); ?>theme/js/settings.js"></script>
  <script src="<?php echo base_url(); ?>theme/js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="<?php echo base_url(); ?>theme/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>theme/vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url(); ?>theme/js/file-upload.js"></script>
  <script src="<?php echo base_url(); ?>theme/js/typeahead.js"></script>
  <script src="<?php echo base_url(); ?>theme/js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
