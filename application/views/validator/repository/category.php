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
        <li><a href="<?php echo base_url(); ?>validator/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Repository</a></li>
        <li><a href="<?php echo base_url(); ?>validator/repository/category">List Category</a></li>
      </ol>
    </section>

    <section class="content">
      <a class="btn btn-sm btn-primary" href="<?php echo base_url()?>validator/repository/create_category"><i class="fa fa-plus"></i> Tambah Kategori</a>
      <br>
      <br>
        <div class="box">
            <div class="box-header">
                <h4><center><strong>List Kategori</strong></center></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive col-md-12">
                <?php echo $this->session->flashdata('notif') ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($repository_category as $key): ?>
                    <tr>
                      <td><?php echo $no++?></td>
                      <td><?php echo $key->nama_repository_category?></td>
                      <td>
                        <?php if($key->status==1){ ?>
                          <span class="badge bg-aqua">Aktif</span>
                        <?php }else{ ?>
                          <span class="badge bg-red">Tidak Aktif</span>
                        <?php } ?>
                      </td>
                      <td>
                        <?php if($key->status==1){ ?>
                          <a href="<?php echo base_url()?>validator/repository/edit_category/not_active/<?php echo $key->id_repository_category?>" class="btn btn-danger btn-rounded btn-sm">Non aktifkan</a>
                        <?php }else{ ?>
                          <a href="<?php echo base_url()?>validator/repository/edit_category/active/<?php echo $key->id_repository_category?>" class="btn btn-success btn-rounded btn-sm">aktifkan</a>
                        <?php } ?>
                        &nbsp;&nbsp;&nbsp;
                        <a href="<?php echo base_url()?>validator/repository/edit_category/<?php echo $key->id_repository_category?>" class="btn btn-warning btn-rounded btn-sm">Edit</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
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
