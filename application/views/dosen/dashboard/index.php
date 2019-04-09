  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <img src="<?php echo base_url()?>assets/img/logon.png" class="image-responsive" style="width:25px"  alt="USU" >
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dosen/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-clock-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Menunggu <br> Persetujuan</span>
              <span class="info-box-number"><small>10</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Koleksi</span>
              <span class="info-box-number">15</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sedang <br> Diperbarui</span>
              <span class="info-box-number">21</span>
            </div>
              <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class=" fa fa-check-square-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Disetujui</span>
              <span class="info-box-number">15</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
          <div class="box">
              <div class="box-header">
                  <h4><center><strong>SELAMAT DATANG DI MENU DOSEN REPOSITORY</strong></center></h4>
              </div>
              <!-- /.box-header -->
                <div class="box-body">
                  <h4 class="text-center"><?php echo date('d-m-Y')?></h4>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
