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
        <h4><center><strong>LOG LOGIN</strong></center></h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table table-responsive col-md-12">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>User</th>
              <th>Waktu Login</th>
              <th>User Agents</th>
              <th>IP Address</th>
              <th>Kode Negara</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($login as $key): ?>
            <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $key->username?></td>
              <td><?php echo $key->login_time?></td>
              <td><?php echo $key->user_agents?></td>
              <td><?php echo $key->ip_address?></td>
              <td><?php echo $key->country?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
  <script type="text/javascript">
  $(document).ready(function(){
    $('#example1_filter').addClass('pull-right');
    $('#example1_paginate').addClass('pull-right');
  });
  </script>
