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
        <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Users</a></li>
        <li><a href="<?php echo base_url(); ?>admin/users/not_active">Tidak Aktif</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h4><center><strong>List Users Yang Tidak Aktif dan Belum Mengaktifasi Email</strong></center></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive col-md-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Departemen</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($users as $key): ?>
                    <tr>
                      <td><?php echo $no++?></td>
                      <td><?php echo $key->nama_depan." ".$key->nama_belakang?></td>
                      <td><?php echo $key->email?></td>
                      <td><?php echo $key->departemen?></td>
                      <td><span class="badge bg-red">Tidak Aktif</span></td>
                      <td>
                        <a href="<?php echo base_url()?>admin/users/edit/active/<?php echo $key->id_member?>" class="btn btn-info btn-rounded btn-sm">aktifkan</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Departemen</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
