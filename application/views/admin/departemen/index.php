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
        <li><a href="#"> Departemen</a></li>
        <li><a href="<?php echo base_url(); ?>admin/departemen">List Departemen</a></li>
      </ol>
    </section>
    <section class="content">
      <a class="btn btn-sm btn-primary" href="<?php echo base_url()?>admin/departemen/create"><i class="fa fa-plus"></i> Tambah Departemen</a>
      <br>
      <br>
        <div class="box">
            <div class="box-header">
                <h4><center><strong>List Departemen</strong></center></h4>
                <?php echo $this->session->flashdata('notif')?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive col-md-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Departemen</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($departemen as $key) { ?>
                    <tr>
                      <td><?php echo $no++?></td>
                      <td><?php echo $key->departemen?></td>
                      <td>
                        <?php if($key->status==1){?>
                          <span class="badge bg-aqua">Aktif</span>
                        <?php }else{ ?>
                          <span class="badge bg-red">Tidak aktif</span>
                        <?php } ?>
                      </td>
                      <td>
                        <?php if($key->status==1){?>
                          <a href="<?php echo base_url()?>admin/departemen/edit/not_active/<?php echo $key->group_id?>" class="btn btn-danger btn-rounded btn-sm">Non aktifkan</a>
                        <?php }else{ ?>
                          <a href="<?php echo base_url()?>admin/departemen/edit/active/<?php echo $key->group_id?>" class="btn btn-primary btn-rounded btn-sm">Aktifkan</a>
                        <?php } ?>
                        &nbsp;&nbsp;&nbsp;
                        <a href="<?php echo base_url()?>admin/departemen/edit/<?php echo $key->group_id?>" class="btn btn-warning btn-rounded btn-sm">Edit</a>
                      </td>
                    </tr>
                  <?php } ?>
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
