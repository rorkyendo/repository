<?php foreach ($repository as $key): ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <img src="<?php echo base_url()?>assets/img/logon.png" class="img-responsive" style="width:25px" alt="USU">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>guest/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Repository</a></li>
        <li><a href="<?php echo base_url(); ?>guest/repository/detail/<?php echo $key->id_repository?>">Detail Repository</a></li>
      </ol>
    </section>

    <section class="content">
      <a class="btn btn-sm btn-warning" href="javascript:history.back()"><i class="fa fa-angle-left"></i> Kembali ke repository</a>
      <br>
      <br>
        <div class="box">
            <div class="box-body">
              <h3 class="text-center"><?php echo $key->title?></h3>
              <center><img style="width:250px" src="<?php echo base_url().$key->repository_cover_image?>" class="img-responsive"></img></center>
              <hr>
              <b>abstract :</b>
              <?php echo $key->abstract ?>
              <hr>
              <b>Download :</b><a href='<?php echo base_url().$key->repository_location?>'>Download</a>
              <br>
              <b>Preview :</b><a target="_blank" href='<?php echo base_url().$key->repository_location?>#page=1&zoom=auto,-15,610'>Preview</a>
              <br>
              <span class="text-danger">* Fitur preview akan aktif apabila menggunakan google chrome / mozilla firefox</span>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <script type="text/javascript">
        $("form#create_repository").validate({
          lang: 'id',
        });
        </script>
<?php endforeach; ?>
