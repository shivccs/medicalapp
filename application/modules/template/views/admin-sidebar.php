<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>template/index">
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">Dashboard </span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#usr-mngmnt" aria-expanded="false" aria-controls="ui-basic">
        <i class="typcn typcn-user-outline menu-icon"></i>
        <span class="menu-title">User Management</span>
        <i class="typcn typcn-chevron-right menu-arrow"></i>
      </a>
      <div class="collapse" id="usr-mngmnt">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/user_role">User Role</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/user_registration">User Registration</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/users_list">Users List</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#dctr-mngmnt" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-stethoscope menu-icon"></i>
        <span class="menu-title">Doctor Management</span>
        <i class="typcn typcn-chevron-right menu-arrow"></i>
      </a>
      <div class="collapse" id="dctr-mngmnt">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/doctors_speciality">Doctors Speciality List</a></li>
        <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/doctors_category">Doctors Category</a></li>
        <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/doctor_registration">Doctor Registration</a></li>
        <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/doctors_list">Doctors List</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ptnt-mngmnt" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-hotel menu-icon"></i>
        <span class="menu-title">Patient Management</span>
        <i class="typcn typcn-chevron-right menu-arrow"></i>
      </a>
      <div class="collapse" id="ptnt-mngmnt">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/patient_list">Patient List</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#phrmcy" aria-expanded="false" aria-controls="ui-basic">
        <i class="typcn typcn-pipette menu-icon"></i>
        <span class="menu-title">Pharmacy</span>
        <i class="typcn typcn-chevron-right menu-arrow"></i>
      </a>
      <div class="collapse" id="phrmcy">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/pharmacy_category">Pharmacy Category</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/pharmacy_manufacturer">Pharmacy Manufacturer</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/pharmacy_leaf">Pharmacy Leaf</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>template/pharmacy_units">Pharmacy Unit</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>