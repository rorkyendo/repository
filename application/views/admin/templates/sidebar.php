<?php
  $menu = $this->session->userdata('menu');
  $submenu = $this->session->userdata('submenu');
 ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="height:auto;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url()?>assets/img/avatar.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama')?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header bg-primary">
          <span>Admin Menu</span>
      </li>
      <li class="<?php if($menu=='dashboard'){ echo 'active' ;} ?>">
        <a href="<?php echo base_url()?>admin/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview <?php if($menu=='logdata'){ echo 'menu-open active' ;} ?>">
        <a href="#">
          <i class="fa fa-clock-o"></i>
          <span>LOG</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if($submenu=='log_login'){ echo 'class="active"' ;} ?>><a href="<?php echo base_url(); ?>admin/logdata/log_login"><i class="fa fa-circle-o"></i> Login</a></li>
          <!-- <li <?php if($submenu=='log_download'){ echo 'class="active"' ;} ?>><a href="<?php echo base_url(); ?>admin/logdata/log_download"><i class="fa fa-circle-o"></i> Download</a></li> -->
          <li <?php if($submenu=='log_revision'){ echo 'class="active"' ;} ?>><a href="<?php echo base_url(); ?>admin/logdata/log_revision"><i class="fa fa-circle-o"></i> Update & Edit-ReUpload</a></li>
          <li <?php if($submenu=='log_acceptance'){ echo 'class="active"' ;} ?>><a href="<?php echo base_url(); ?>admin/logdata/log_acceptance"><i class="fa fa-circle-o"></i> Persetujuan Pengajuan</a></li>
        </ul>
      </li>
      <li class="treeview <?php if($menu=='users'){ echo 'menu-open active' ;} ?>">
        <a href="#">
          <i class="fa fa-users "></i>
          <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if($submenu=='users'){ echo 'class="active"' ;} ?>><a href="<?php echo base_url(); ?>admin/users/active"><i class="fa fa-circle-o"></i> Aktif</a></li>
          <li <?php if($submenu=='users_not_active'){ echo 'class="active"' ;} ?>><a href="<?php echo base_url(); ?>admin/users/not_active"><i class="fa fa-circle-o"></i> Tidak Aktif</a></li>
        </ul>
      </li>
      <li class="<?php if($menu=='departemen'){ echo 'active' ;} ?>">
        <a href="<?php echo base_url()?>admin/departemen">
          <i class="fa fa-building"></i> <span>Departemen</span>
        </a>
      </li>
      <li class="<?php if($menu=='all_repository'){ echo 'active' ;} ?>">
        <a href="<?php echo base_url()?>admin/repository/all">
          <i class="fa fa-bookmark"></i> <span>All repository</span>
        </a>
      </li>
  </section>
  <!-- /.sidebar -->
</aside>
