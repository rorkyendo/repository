<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    })
  })
</script>
<div class="box">
    <div class="box-header">
        <h4><center><strong>LOG PERSETUJUAN PENGAJUAN</strong></center></h4>
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
              <th>Di Setujui Oleh</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($persetujuan as $key): ?>
            <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $key->nama_repository_category?></td>
              <td><?php echo $key->nama_file_category?></td>
              <td><a href="<?php echo base_url().'admin/repository/detail/'.$key->id_repository?>"><?php echo $key->title?></a></td>
              <td><?php echo $key->created_time?></td>
              <td>
                <?php if($key->status=='0')
                {
                  echo "<span class='badge bg-aqua'>Baru</span>";
                }else{
                  echo "<span class='badge bg-green'>Disetujui</span>";
                }?>
              </td>
              <td>
                <?php if($key->accepted_by!='')
                    {
                      echo $key->username;
                    }else {
                      echo "<span class='badge bg-yellow'>Belum ada yang menyetujui</span>";
                    }
                 ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
    <!-- /.box-body -->
  <!-- /.box -->
  <script type="text/javascript">
  $(document).ready(function(){
    $('#example1_filter').addClass('pull-right');
    $('#example1_paginate').addClass('pull-right');
  });
  </script>
