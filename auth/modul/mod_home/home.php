<?php
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>

<style type="text/css" keyword="currentStyle">
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
		$aksi="modul/mod_home/aksi_home.php";
		if (isset($_GET['act'])) {
			$act= $_GET['act'];
		}else{
			$act= '';
		}
		switch($act){
			default:
				$g= $db->get_select(" SELECT * FROM modul WHERE id_modul='94' ")['data'][0];
		
		?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Sambutan</h4>
		</div>

		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='modul/mod_home/aksi_home.php?module=halaman_home&act=update'>
				<input type="hidden" name="id" value="<?php echo $g->id_modul ?>">
				<div class="form-group">
					<textarea class="form-control" name="isi" rows="13"><?php echo $g->static_content_ina ?></textarea>
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
		 } ?>
		
<?php } ?>