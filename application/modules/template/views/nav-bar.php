<!--<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <?php echo $this->session->userdata['sessiondata']['name']; ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="<?php echo base_url(); ?>auth/profile"> Profile</a></li>
            <li><a href="<?php echo base_url(); ?>auth/change_password"> Change Password</a></li>
            
            <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>

        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">1</span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">


            <li>
              <a>
                
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            
          </ul>
        </li>

      </ul>

    </nav>
  </div>
</div>-->


<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="<?php echo base_url(); ?>theme/index.html"><img src="<?php echo base_url(); ?>theme/images/logo.svg" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="<?php echo base_url(); ?>theme/index.html"><img src="<?php echo base_url(); ?>theme/images/logo-mini.svg" alt="logo"/></a>
    <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
      <span class="typcn typcn-th-menu"></span>
    </button>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    
    <ul class="navbar-nav navbar-nav-right">
      
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
          <i class="typcn typcn-user-outline mr-0"></i>
          <span class="nav-profile-name"> <?php echo $this->session->userdata['sessiondata']['name']; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item">
          <i class="typcn typcn-cog text-primary"></i>
          Settings
          </a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>auth/logout">
          <i class="typcn typcn-power text-primary"></i>
          Logout
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="typcn typcn-th-menu"></span>
    </button>
  </div>
</nav>