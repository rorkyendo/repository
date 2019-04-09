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
        <li><a href="#"> Log</a></li>
        <li><a href="<?php echo base_url(); ?>admin/logdata/log_download">Log Download</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h4><center><strong>LOG DOWNLOAD</strong></center></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive col-md-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Judul</th>
                      <th>Jumlah Download</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Jurnal</td>
                      <td>Jurnal Percobaan</td>
                      <td>4</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Jurnal</td>
                      <td>Jurnal Testing</td>
                      <td>4</td>
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
