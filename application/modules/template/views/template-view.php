<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Janswasthaya Kendra</title>
     <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>css/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>css/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>css/custom.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
  </head>
     
  <body class="nav-md">
    <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url(); ?>template" class="site_title"><i class="fa fa-stethoscope"></i> <span>
                JSK Portal
              </span></a>
            </div>

            <br />
            <br />
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>assets/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata['sessiondata']['name']; ?></h2>
              </div>
            </div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <?php if (($this->session->userdata['sessiondata']['user_type']==1)) {
                    $this->load->view('admin-sidebar');
                    }else{
                        $this->load->view('user-sidebar');
                    }
              ?>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <?php 
            $this->load->view('nav-bar');
        ?>
        <!-- /top navigation -->

        <!-- page content -->
        <?php                               //var_dump($adata);
          echo Modules::run($module);
        ?>
        <!-- /page content -->

      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>vendors/nprogress/nprogress.js"></script>

  
    <!-- DateJS -->
    <script src="<?php echo base_url(); ?>vendors/DateJS/build/date.js"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url(); ?>vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>js/custom.min.js"></script>
  </body>
</html>