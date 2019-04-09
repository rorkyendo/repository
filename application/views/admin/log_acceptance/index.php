  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <img src="<?php echo base_url()?>assets/img/logon.png" class="img-responsive" style="width:25px" alt="USU">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Log</a></li>
        <li><a href="<?php echo base_url(); ?>admin/logdata/log_acceptance">Log Persetujuan Pengajuan</a></li>
      </ol>
    </section>

    <section class="content" id="log_acceptance">

    </section>
      </div>
        <script type="text/javascript">
          $(document).ready(function(){
            $('#log_acceptance').html('<center><img src="<?php echo base_url()?>assets/img/loading.gif" alt="loading"><br><h3>Loading.....</h3></center>');
            $.ajax({
              url:"<?php echo base_url()?>admin/logdata/log_acceptance_detail",
              success : function(data){
                $('#log_acceptance').html(data);
              },error : function()
              {
                $('#log_acceptance').html('<div class="alert alert-danger">Mohon maaf sedang ada masalah pada server</div>');
              }
            });
          });
        </script>
