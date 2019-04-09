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
        <li><a href="<?php echo base_url(); ?>admin/users"> Users</a></li>
        <li><a href="<?php echo base_url(); ?>admin/users/create/validator">Tambah Validator</a></li>
      </ol>
    </section>

    <section class="content">
      <a class="btn btn-sm btn-warning" href="javascript:history.back()"><i class="fa fa-angle-left"></i> Kembali </a>
      <br>
      <br>
        <div class="box">
            <!-- <div class="box-header">
                <h4><center><strong>Tambah Departemen</strong></center></h4>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <?php echo $this->session->flashdata('notif'); ?>
              <form class="" id="create_validator" action="<?php echo base_url()?>admin/users/create/validator/do_create" method="post">
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Validator</label>
                    <input type="text" class="form-control" name="nama_validator" placeholder="Masukkan Nama Validator" title="Masukkan Nama Validator" required>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" title="Masukkan Username" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" id='password' class="form-control" name="password" placeholder="Masukkan password" title="Masukkan Password" required>
                  </div>
                  <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" id='confirm_password' class="form-control" name="confirm_password" placeholder="Masukkan password" title="Masukkan Password" required>
                  </div>
                  <button type="submit" name="simpan" class="btn btn-sm btn-rounded btn-primary">Tambah Validator</button>
                </div>
              </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
<script type="text/javascript">
$("form#create_validator").validate({
  lang: 'id',
  rules : {
    password: {
        required: true,
        minlength: 5
    },
    confirm_password: {
        required: true,
        equalTo: "#password",
        minlength: 5,
    },
    nama_validator: {
      minlength : 3,
    },
    username: {
      minlength : 3,
    }
  },
  messages :{
    password: {
        required: "Masukan password ",
        minlength: "Gunakan min 5 karakter atau lebih untuk password"
    },
    confirm_password: {
        required: "Masukan ulang password",
        equalTo: "Sandi yang anda masukan tidak sama",
        minlength: "Gunakan min 5 karakter atau lebih untuk password",
    },
    nama_validator : {
        minlength: "Gunakan minimal 3 karakter atau lebih untuk nama validator",
    },
    username : {
        minlength: "Gunakan minimal 3 karakter atau lebih untuk username",
    }
  },
  highlight: function(element) {
    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
    $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
  },
  success: function(element) {
    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
    $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
  },
  errorPlacement: function(error, element) {
    $(element).closest('.form-group').append(error);
  },
});
</script>
