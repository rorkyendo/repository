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
        <li><a href="<?php echo base_url(); ?>admin/departemen/edit">Edit Departemen</a></li>
      </ol>
    </section>

    <section class="content">
      <a class="btn btn-sm btn-warning" href="<?php echo base_url()?>admin/departemen"><i class="fa fa-angle-left"></i> Kembali ke list departemen</a>
      <br>
      <br>
        <div class="box">
            <div class="box-body">
              <?php foreach ($departemen as $key){?>
              <form id="edit_departemen" action="<?php echo base_url()?>admin/departemen/edit/do_edit/<?php echo $key->group_id?>" method="post">
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Departemen</label>
                    <input type="text" class="form-control" name="departemen" placeholder="Masukkan Nama Departemen" value="<?php echo $key->departemen?>">
                  </div>
                  <button type="submit" name="simpan" class="btn btn-sm btn-rounded btn-primary">Tambah Departemen</button>
                </div>
              </form>
            <?php } ?>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <script type="text/javascript">
        $("form#edit_departemen").validate({
          lang: 'id',
        });
        </script>
