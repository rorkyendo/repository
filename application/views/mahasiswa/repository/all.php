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
        <li><a href="<?php echo base_url(); ?>mahasiswa/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Repository</a></li>
        <li><a href="<?php echo base_url(); ?>mahasiswa/repository/">List Repository</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h4><center><strong>List Repository</strong></center></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive col-md-12">
                <?php echo $this->session->flashdata('notif') ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Image</th>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Kategori File</th>
                      <th>Tanggal Upload</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($repository as $key): ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><img style="width:80px" src="<?php echo base_url().$key->repository_cover_image?>" class="img-responsive"></img></td>
                      <td width="20%"><a href="<?php echo base_url()?>mahasiswa/repository/detail/<?php echo $key->id_repository?>"><?php echo $key->title?></a></td>
                      <td><?php echo $key->nama_repository_category?></td>
                      <td><?php echo $key->nama_file_category?></td>
                      <td><?php echo $key->created_time?></td>
                    </tr>
                    <?php endforeach; ?>
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
