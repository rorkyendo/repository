<style>

  form{
        border:1px #ccc;
        padding:10px 10px 10px;
        background-color:#f0f0f0;
    }
</style>
<form action="<?php echo base_url()?>auth/login" method="post">
  <?php echo $this->session->flashdata('notif'); ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="identity" class="form-control" placeholder="Enter NIM/NIP">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Enter Password">
  </div>
  <button type="submit" class="btn btn-success" >Submit</button>
</form>
</div>
<br><br><br></div>
