<?php foreach ($profile as $key): ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <img src="<?php echo base_url()?>assets/img/logon.png" class="img-responsive" style="width:25px" alt="USU">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>guest/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Profile</a></li>
        <li><a href="<?php echo base_url(); ?>guest/user/profile/">Edit Profile</a></li>
      </ol>
    </section>

    <section class="content">
      <a class="btn btn-sm btn-warning" href="javascript:history.back()"><i class="fa fa-angle-left"></i> Kembali</a>
      <br>
      <br>
        <div class="box">
          <?php echo $this->session->flashdata('notif')?>
            <div class="box-body">
              <form id="edit" action="<?php echo base_url()?>guest/user/profile/edit/<?php echo $key->user_id?>/<?php echo $key->kon_id?>" method="post">
                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK" pattern="[0-9]" maxlength="18" minlength="14" title="Masukkan data sesuai nik" value="<?php echo $key->nik?>" readonly>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Masukkan username" minlength="3" title="Masukkan username" value="<?php echo $key->username?>" readonly required>
                </div>
                <div class="form-group">
                  <label>Password</label> &nbsp;
                  <button class="btn btn-info btn-sm" type="button" id="lock" title="click untuk melihat password"><i class="fa fa-lock"></i></button>
                  <button class="btn btn-info btn-sm" type="button" id="unlock" title="click untuk menyembunyikan password" hidden><i class="fa fa-unlock"></i></button>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" id="pass" title="Masukkan password" required>
                </div>
                <div class="form-group">
                  <label>Nama Depan</label>
                  <input type="text" name="nama_depan" class="form-control" placeholder="Masukkan nama depan" pattern="[a-zA-Z ]" minlength="3" title="Masukkan nama depan" value="<?php echo $key->nama_depan?>" required>
                </div>
                <div class="form-group">
                  <label>Nama Belakang</label>
                  <input type="text" name="nama_belakang" class="form-control" placeholder="Masukkan nama belakang" pattern="[a-zA-Z ]" minlength="3" title="Masukkan nama belakang" value="<?php echo $key->nama_belakang?>" required>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" id='jenkel' name="jenkel" title="Pilih jenis kelamin" readonly required disabled>
                    <option>-Pilih Jenis Kelamin-</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Masukkan email" title="Masukkan email" value="<?php echo $key->email?>" required>
                </div>
                <div class="form-group">
                  <label>No HP</label>
                  <input type="text" name="nomor_hp" class="form-control" pattern="[0-9]" placeholder="Masukkan nomor handphone" title="Masukkan nomor handphone" value="<?php echo $key->nomor_hp?>" required>
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan nama tempat lahir" pattern="[a-zA-Z ]" minlength="3" title="Masukkan tempat lahir" value="<?php echo $key->tempat_lahir?>" required>
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="text" id="datemask" placeholder="Masukkan tanggal lahir" name="tgl_lahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask title="Masukkan tanggal lahir" value="<?php echo date('d/m/Y', strtotime($key->tgl_lahir))?>" required>
                </div>
                  <button type="submit" name="simpan" class="btn btn-sm btn-rounded btn-primary">Simpan</button>
                </form>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <script type="text/javascript">
          $("form#edit").validate({
            lang: 'id',
          });
          $('#lock').click(function(){
            $('#lock').attr('hidden',true);
            $('#unlock').removeAttr('hidden');
            $('#pass').prop('type','text');
          });
          $('#unlock').click(function(){
            $('#lock').removeAttr('hidden');
            $('#unlock').attr('hidden',true);
            $('#pass').prop('type','password');
          });
        </script>

        <script type="text/javascript">
          $(function(){
            //Date picker
               $('#datepicker').datepicker({
                 autoclose: true
               });

               //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
          })
        </script>

        <script type="text/javascript">
          $('#jenkel').val('<?php echo $key->jenkel?>');
        </script>
      <?php endforeach; ?>
