<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <img src="<?php echo base_url()?>assets/img/logon.png" class="img-responsive" style="width:25px" alt="USU">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dosen/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Repository</a></li>
        <li><a href="<?php echo base_url(); ?>dosen/repository/not_accepted">List Repository Ditolak</a></li>
      </ol>
    </section>

    <section class="content">
      <a class="btn btn-sm btn-primary" href="<?php echo base_url()?>dosen/repository/create"><i class="fa fa-plus"></i> Tambah Repository</a>
      <br>
      <br>
        <div class="box">
            <div class="box-header">
                <h4><center><strong>List Repository Ditolak</strong></center></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive col-md-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Tanggal Upload</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td width="50%"><a href="#">Identifikasi Kebutuhan Jurnal Mahasiswa Pascasarjana di Lingkungan Fakultas Matematika dan Ilmu Pengetahuan Alam Universitas Sumatera Utara </a></td>
                      <td>Jurnal</td>
                      <td>03-12-2018</td>
                      <td><button class="btn btn-info btn-rounded btn-sm">Ditolak</button></td>
                      <td>
                        <button class="btn btn-danger btn-rounded btn-sm">Hapus</button>
                        &nbsp;&nbsp;&nbsp;
                        <a href="<?php echo base_url()?>dosen/repository/edit/1" class="btn btn-warning btn-rounded btn-sm">Edit</a>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    
                  </tfoot>
                </table>
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
