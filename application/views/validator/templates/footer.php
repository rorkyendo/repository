	<footer class="main-footer">
		<table width="100%">
			<tr>
				<td><?php echo $this->config->item('app_name')?></td>
				<td align="center"><?php echo $this->benchmark->elapsed_time();?> detik</td>
				<td align="right"><?php echo $this->config->item('app_name');?> v<?php echo $this->config->item('app_version');?></td>
			</tr>
		</table>
      </footer>

				<script type="text/javascript">
				$(document).ready(function(){
					$('#example1_filter').addClass('pull-right');
					//$('#example1_filter label').html('Pencarian:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">');
					$('#example1_paginate').addClass('pull-right');
				});
				</script>
			<!-- CK Editor -->
			<script src="<?php echo base_url()?>assets/bower_components/ckeditor/ckeditor.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					// instance, using default configuration.
					CKEDITOR.replace('editor1')
				});
			</script>
			<!-- Sparkline -->
			<script src="<?php echo base_url()?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
			<!-- jQuery Knob Chart -->
			<script src="<?php echo base_url()?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
			<!-- daterangepicker -->
			<script src="<?php echo base_url()?>assets/bower_components/moment/min/moment.min.js"></script>
			<script src="<?php echo base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
			<!-- datepicker -->
			<script src="<?php echo base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
			<!-- Bootstrap WYSIHTML5 -->
			<script src="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
			<!-- Slimscroll -->
			<script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
			<!-- FastClick -->
			<script src="<?php echo base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
			<!-- AdminLTE App -->
			<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
			<!-- AdminLTE for demo purposes -->
			<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
  </body>
</html>
