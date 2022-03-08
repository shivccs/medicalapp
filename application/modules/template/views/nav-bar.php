<div class="top_nav">
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
</div>
