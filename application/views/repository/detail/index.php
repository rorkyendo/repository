<?php foreach ($repository as $key): ?>
<div class="col-md-8">
<h2 class="text-center"><?php echo $key->title ?></h2>
<hr>
<div class="row">
    <div class="col-md-8">
      <h5>Abstract</h5>
      <hr>
      <?php echo $key->abstract ?>
    </div>
    <div class="col-md-4">
      <img src="<?php echo base_url().$key->repository_cover_image?>" class="img-responsive" alt="">
      <hr>
      <h5>File</h5>
      <hr>
      <b>Download : <a href="<?php echo base_url().$key->repository_location?>">LINK</a></b>
      <br>
      <b>Preview :</b><a target="_blank" href='<?php echo base_url().$key->repository_location?>#page=1&zoom=auto,-15,610'>Preview</a>
      <br>
      <span class="text-danger">* Fitur preview akan aktif apabila menggunakan google chrome / mozilla firefox</span>
    </div>
  </div>
  <hr>
  <b>Author : <?php echo $key->nama_depan." ".$key->nama_belakang?></b>
  <br>
  <b>Kategori : <?php echo $key->nama_repository_category?></b>
  <hr>
  <br><br>
</div>
<?php endforeach; ?>
