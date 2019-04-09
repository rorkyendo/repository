  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <img src="<?php echo base_url()?>assets/img/logon.png" class="img-responsive" style="width:25px" alt="USU">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>guest/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Repository</a></li>
        <li><a href="<?php echo base_url(); ?>guest/repository/create">Buat Repository</a></li>
      </ol>
    </section>

    <section class="content">
      <a class="btn btn-sm btn-warning" href="<?php echo base_url()?>guest/repository"><i class="fa fa-angle-left"></i> Kembali ke repository</a>
      <br>
      <br>
        <div class="box">
            <div class="box-body">
              <form id="create_repository" action="<?php echo base_url()?>guest/repository/create/do" method="post" enctype="multipart/form-data">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cover Image</label>
                  <span class="text-danger">*Hanya ekstensi (jpg,jpeg,png)</span><br>
                  <input type="file" class="form-control" name="image" accept="image/*" title="Masukkan Gambar" id='files-gbr' required>
                </div>
                  <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="judul" minlenght='3' title='Masukkan Judul' required>
                  </div>
                  <div class="form-group">
                    <label>Upload File</label><span class="text-red"> *Hanya File PDF</span>
                    <input type="file" class="form-control" name="file" placeholder="Masukkan File" accept="application/pdf" title="Masukkan file pdf" required>
                  </div>
                  <div class="form-group">
                    <?php echo $this->session->flashdata('notif') ?>
                    <label>Kategori Repository</label>
                    <div class="col-md-12">
                    <div class="col-md-8">
                    <select class="form-control select2" name="category_repository" title="Pilih kategori repository" id='kategori_repository' required>
                      <option>-Pilih Kategori Repository-</option>
                      <?php foreach ($kategori_repository as $key): ?>
                      <option value="<?php echo $key->id_repository_category?>"><?php echo $key->nama_repository_category?></option>
                      <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="col-md-4">
                      <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">Tambah Kategori</button>
                    </div>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="form-group">
                    <label>Kategori File</label>
                    <select class="form-control select2" name="category_file" title="Pilih kategori file repository" required>
                      <option value="">-Pilih Kategori File-</option>
                      <?php foreach ($kategori_file_repository as $key): ?>
                      <option value="<?php echo $key->id_file_category?>"><?php echo $key->nama_file_category?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Abstract</label>
                    <textarea id="editor1" name="abstract" rows="10" cols="80" title="Masukkan Abstract" required>
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
        <script type="text/javascript">
        $("form#create_repository").validate({
          lang: 'id',
        });
        </script>
        <!-- Modal -->
          <div id="addCategory" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tambah Kategori Repository</h4>
                </div>
                <form action="<?php echo base_url()?>guest/repository/create_category/<?php echo $id_repository?>" method="post">
                <div class="modal-body">
                  <input type="text" name="addCategory" class="form-control" placeholder="Tambahkan kategori repository baru" title="Tambahkan kategori repository baru" minlenght='3' required>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success pull-left">Simpan</button>
                </form>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
