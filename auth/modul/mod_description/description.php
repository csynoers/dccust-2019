	<style type="text/css" description="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
	$(document).ready( function () {
	     var oTable = $('#example').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );		
	} );
	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>
		
	<?php
		$aksi="modul/mod_description/aksi_description.php";
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:
			$view = mysql_query("SELECT * FROM modul WHERE id_modul='92'");
				$g=mysql_fetch_array($view);
		
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Decsription Website</h4>
			</div>
			<div class="panel-body">
				 <form method='POST' enctype='multipart/form-data' action='modul/mod_description/aksi_description.php?module=description&act=update'>
					<input type="hidden" name="id" value="<?php echo"$g[id_modul]" ?>">
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="isi" rows="13"><?php echo"$g[static_content_en]" ?></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
		
		<?php
		
		break; 
		 }