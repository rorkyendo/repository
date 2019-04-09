  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <img src="<?php echo base_url()?>assets/img/logon.png" class="img-responsive" style="width:25px" alt="USU">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>validator/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Repository</a></li>
        <li><a href="<?php echo base_url(); ?>validator/repository/create_category">Tambah Kategori</a></li>
      </ol>
    </section>

    <section class="content">
      <a class="btn btn-sm btn-warning" href="<?php echo base_url()?>validator/repository/category"><i class="fa fa-angle-left"></i> Kembali ke list kategori</a>
      <br>
      <br>
        <div class="box">
            <div class="box-body">
              <form id="create_category" action="<?php echo base_url()?>validator/repository/create_category/do" method="post">
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" name="category_name" title="Masukkan Nama Kategori" required>
                  </div>
                  <button type="submit" name="simpan" class="btn btn-sm btn-rounded btn-primary">Tambah Kategori</button>
                </div>
              </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <script type="text/javascript">
        $("form#create_category").validate({
          lang: 'id',
        });
        </script>
