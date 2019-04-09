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
        <li><a href="<?php echo base_url(); ?>admin/users">List Users</a></li>
      </ol>
    </section>

    <section class="content">
      <?php if($this->session->userdata('user')=='validator'){ ?>
      <a href="<?php echo base_url()?>admin/users/create/validator" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah validator</a>
      <br>
      <br>
      <?php } ?>
        <div class="box">
            <div class="box-header">
                <h4><center><strong>LIST USERS AKTIF</strong></center></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive col-md-12">
                <?php echo $this->session->flashdata('notif') ?>
                <div class="form-group">
                  <label>Pilih User</label>
                  <select class="form-control" name="choose" id="choose">
                    <option>-Pilih User-</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="member">Member</option>
                    <option value="validator">Validator</option>
                  </select>
                  <script type="text/javascript">
                    $('#choose').change(function(){
                      var choose = $('#choose').val();
                      if(choose=='mahasiswa')
                      {
                        window.location.replace('<?php echo base_url()?>admin/users/active/'+choose);
                      }else if(choose=='member'){
                        window.location.replace('<?php echo base_url()?>admin/users/active/'+choose);
                      }else if(choose=='validator'){
                        window.location.replace('<?php echo base_url()?>admin/users/active/'+choose);
                      }
                    })
                    $('#choose').val('<?php echo $this->session->userdata('user')?>')
                  </script>
                </div>
                <br>
                <hr>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Departemen</th>
                      <?php if($this->session->userdata('user')=='member'){?>
                      <th>Status</th>
                      <th>Aksi</th>
                    <?php }elseif($this->session->userdata('user')=='mahasiswa'){ ?>
                      <th>NIM</th>
                    <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($users as $key) {?>
                    <tr>
                      <td><?php echo $no++?></td>
                      <?php if($this->session->userdata('user')!='validator'){?>
                      <td><?php echo $key->nama_depan." ".$key->nama_belakang?></td>
                      <?php }else { ?>
                      <td><?php echo $key->nama_validator?></td>
                      <?php } ?>
                      <td><?php echo $key->departemen?></td>
                      <?php if($this->session->userdata('user')=='member'){?>
                      <td><span class="badge bg-aqua">Aktif</span></td>
                      <td>
                        <a href="<?php echo base_url()?>admin/users/edit/not_active/<?php echo $key->id_member?>" class="btn btn-danger btn-rounded btn-sm">Non aktifkan</a>
                      </td>
                    <?php }elseif($this->session->userdata('user')=='mahasiswa'){ ?>
                      <td><?php echo $key->nim?></td>
                    <?php } ?>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Departemen</th>
                    <?php if($this->session->userdata('user')=='member'){?>
                      <th>Status</th>
                      <th>Aksi</th>
                    <?php }elseif($this->session->userdata('user')=='mahasiswa'){ ?>
                      <th>NIM</th>
                    <?php } ?>
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
