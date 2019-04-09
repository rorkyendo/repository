  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <img src="<?php echo base_url()?>assets/img/logon.png" class="image-responsive" style="width:25px"  alt="USU" >
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>validator/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
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
              <span class="info-box-number"><small><?php echo number_format($jumlah_persetujuan,0,'.','.')?></small></span>
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
              <span class="info-box-text">Kategori <br> Repository</span>
              <span class="info-box-number"><?php echo number_format($jumlah_kategori,0,'.','.')?></span>
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
                  <h4><center><strong>SELAMAT DATANG DI MENU VALIDATOR REPOSITORY</strong></center></h4>
              </div>
              <!-- /.box-header -->
                <div class="box-body">
                  <h1 class="text-center"><?php echo date('Y-m-d')?></h1>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
