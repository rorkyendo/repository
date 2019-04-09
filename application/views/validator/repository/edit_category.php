<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <img src="<?php echo base_url()?>assets/img/logon.png" class="img-responsive" style="width:25px" alt="USU">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>validator/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Repository</a></li>
      <li><a href="<?php echo base_url(); ?>validator/repository/edit_category">Edit Kategori</a></li>
    </ol>
  </section>

  <section class="content">
    <a class="btn btn-sm btn-warning" href="<?php echo base_url()?>validator/repository/category"><i class="fa fa-angle-left"></i> Kembali ke list kategori</a>
    <br>
    <br>
      <div class="box">
          <!-- <div class="box-header">
              <h4><center><strong>Tambah Departemen</strong></center></h4>
          </div> -->
          <!-- /.box-header -->
          <div class="box-body">
            <?php foreach ($repository_category as $key): ?>
            <form id="edit_category" action="<?php echo base_url()?>validator/repository/edit_category/do_edit/<?php echo $key->id_repository_category?>" method="post">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" class="form-control" name="nama_repository_category" placeholder="Masukkan Nama Kategori" value="<?php echo $key->nama_repository_category?>" title="Masukkan Nama Kategori" required>
                </div>
                <button type="submit" name="simpan" class="btn btn-sm btn-rounded btn-primary">Simpan</button>
              </div>
            </form>
          <?php endforeach; ?>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <script type="text/javascript">
      $("form#edit_category").validate({
        lang: 'id',
      });
      </script>
