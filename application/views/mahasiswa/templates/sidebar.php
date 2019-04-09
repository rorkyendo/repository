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
        <img src="<?php echo $this->session->userdata('link_foto')?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama')?></p>
        <p><?php echo $this->session->userdata('nim')?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header bg-primary">
          <span>Mahasiswa Menu</span>
      </li>
      <li class="<?php if($menu=='dashboard'){ echo 'active' ;} ?>">
        <a href="<?php echo base_url()?>mahasiswa/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview <?php if($menu=='repository'){ echo 'menu-open active' ;} ?>">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Repository</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if($submenu=='repository'){ echo 'class="active"' ;} ?>><a href="<?php echo base_url(); ?>mahasiswa/repository"><i class="fa fa-circle-o"></i> Koleksi Repository</a></li>
          <li <?php if($submenu=='not_accepted'){ echo 'class="active"' ;} ?>><a href="<?php echo base_url(); ?>mahasiswa/repository/not_accepted"><i class="fa fa-circle-o"></i> Ditolak</a></li>
          <li <?php if($submenu=='log_acceptance'){ echo 'class="active"' ;} ?>><a href="<?php echo base_url(); ?>mahasiswa/repository/log_acceptance"><i class="fa fa-circle-o"></i> Menunggu Persetujuan</a></li>
        </ul>
      </li>
      <li class="<?php if($menu=='all_repository'){ echo 'active' ;} ?>">
        <a href="<?php echo base_url()?>mahasiswa/repository/all">
          <i class="fa fa-bookmark"></i> <span>All repository</span>
        </a>
      </li>
  </section>
  <!-- /.sidebar -->
</aside>
