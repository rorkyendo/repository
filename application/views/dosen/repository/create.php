  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <img src="<?php echo base_url()?>assets/img/logon.png" class="img-responsive" style="width:25px" alt="USU">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dosen/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Repository</a></li>
        <li><a href="<?php echo base_url(); ?>dosen/repository/create">Buat Repository</a></li>
      </ol>
    </section>

    <section class="content">
      <a class="btn btn-sm btn-warning" href="<?php echo base_url()?>dosen/repository"><i class="fa fa-angle-left"></i> Kembali ke repository</a>
      <br>
      <br>
        <div class="box">
            <!-- <div class="box-header">
                <h4><center><strong>Tambah Departemen</strong></center></h4>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="index.html" method="post">
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" placeholder="Masukkan Judul">
                  </div>
                  <div class="form-group">
                    <label>Upload File</label>
                    <input type="file" class="form-control" placeholder="Masukkan File">
                  </div>
                  <div class="form-group">
                    <label>Kategori Repository</label>
                    <select class="form-control select2" name="category_repository">
                      <option value="">-Pilih Kategori Repository-</option>
                      <option value="">Jurnal</option>
                      <option value="">Karya Tulis</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kategori File</label>
                    <select class="form-control select2" name="category_file">
                      <option value="">-Pilih Kategori File-</option>
                      <option value="">Umum</option>
                      <option value="">Private</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Abstract</label>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                      Masukkan Abstract disini
                      </textarea>
                  </div>
                  <button type="submit" name="simpan" class="btn btn-sm btn-rounded btn-primary">Simpan</button>
                </div>
              </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
