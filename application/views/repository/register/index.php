<div class="col-md-8">
<h1>Form Pendaftaran Anggota Baru</h1>
<hr/>
<?php echo $this->session->flashdata('notif') ?>
<div class="alert alert-info">
  Untuk Dosen/Mahasiswa USU dapat melakukan login langsung dari <a href="<?php echo base_url()?>repository/page/login">sini</a>
</div>
<form action="<?php echo base_url()?>auth/register" method="post" id="registrasi">
  <div class="form-group">
    <label>NIK</label>
    <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK" pattern="[0-9]" maxlength="18" minlength="14" title="Masukkan data sesuai nik" required>
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="Masukkan username" minlength="3" title="Masukkan username" required>
  </div>
  <div class="form-group">
    <label>Password</label> &nbsp;
    <button class="btn btn-info btn-sm" type="button" id="lock" title="click untuk melihat password"><i class="fa fa-lock"></i></button>
    <button class="btn btn-info btn-sm" hidden type="button" id="unlock" title="click untuk menyembunyikan password"><i class="fa fa-unlock"></i></button>
      <input type="password" name="password" class="form-control" placeholder="Masukkan Password" id="pass" title="Masukkan password" required>
  </div>
  <div class="form-group">
    <label>Nama Depan</label>
    <input type="text" name="nama_depan" class="form-control" placeholder="Masukkan nama depan" pattern="[a-zA-Z ]" minlength="3" title="Masukkan nama depan" required>
  </div>
  <div class="form-group">
    <label>Nama Belakang</label>
    <input type="text" name="nama_belakang" class="form-control" placeholder="Masukkan nama belakang" pattern="[a-zA-Z ]" minlength="3" title="Masukkan nama belakang" required>
  </div>
  <div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control" name="jenkel" title="Pilih jenis kelamin" required>
      <option>-Pilih Jenis Kelamin-</option>
      <option value="L">Laki-laki</option>
      <option value="P">Perempuan</option>
    </select>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Masukkan email" title="Masukkan email" required>
  </div>
  <div class="form-group">
    <label>No HP</label>
    <input type="text" name="nomor_hp" class="form-control" pattern="[0-9]" placeholder="Masukkan nomor handphone" title="Masukkan nomor handphone" required>
  </div>
  <div class="form-group">
    <label>Tempat Lahir</label>
    <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan nama tempat lahir" pattern="[a-zA-Z ]" minlength="3" title="Masukkan tempat lahir" required>
  </div>
  <div class="form-group">
    <label>Tanggal Lahir</label>
    <input type="text" id="datemask" placeholder="Masukkan tanggal lahir" name="tgl_lahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask title="Masukkan tanggal lahir" required>
  </div>
  <button type="submit" class="btn btn-success" >Submit</button>
  <br>
  <br>
  <br>
</form>
</div>

<script type="text/javascript">
  $("form#registrasi").validate({
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
