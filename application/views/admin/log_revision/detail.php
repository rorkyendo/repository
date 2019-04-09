<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    });

    $('#start_date').datepicker({
             format: 'dd-mm-yyyy',
             todayBtn: true,
             todayHighlight: true,
             autoclose: true
           });
   $('#end_date').datepicker({
             format: 'dd-mm-yyyy',
             todayBtn: true,
             todayHighlight: true,
             autoclose: true
           });
  })
</script>
<div class="box">
    <div class="box-header">
        <h4><center><strong>LOG PERSETUJUAN REVISI</strong></center></h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table table-responsive col-md-12">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori Repository</th>
              <th>Kategori File</th>
              <th>Judul</th>
              <th>Tanggal Di Buat</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($revisi as $key): ?>
            <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $key->nama_repository_category?></td>
              <td><?php echo $key->nama_file_category?></td>
              <td><a href="<?php echo base_url().'admin/repository/detail/'.$key->id_repository?>"><?php echo $key->title?></a></td>
              <td><?php echo $key->created_time?></td>
              <td>
                <?php if($key->status=='2')
                {
                  echo "<span class='badge bg-yellow'>Sedang direvisi</span>";
                }?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#example1_filter').addClass('pull-right');
      $('#example1_paginate').addClass('pull-right');
    });
    </script>
