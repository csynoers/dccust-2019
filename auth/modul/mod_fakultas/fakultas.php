	<style type="text/css" title="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>
	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
	$(document).ready( function () {
	     var oTable = $('#fakultas').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );		
	} );
	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>
	<?php
		$aksi="modul/mod_fakultas/aksi_fakultas.php";
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">Fakultas</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#" onclick="location.href='?module=fakultas&act=tambah_fakultas'">
								<button type="button" class="btn btn-primary">Insert New</button>
							</a>	
						</li>
					</ul>
				</div>
			</nav>
			<div class="panel-body">
				<table class='display' id='fakultas'> 
				<thead> 
					<tr>  
	    				<th>No</th>
						<th>Fakultas</th>
						<th>Aksi</th>
					</tr> 
				</thead> 
				
				<tbody> 
				<?php 	
					$no=1;
					$fakultas = mysql_query("SELECT * FROM fakultas ORDER BY id_fakultas ASC");
					while($r=mysql_fetch_array($fakultas)){
					
					
					?>
					<tr>  
	    				<td align="center"><?php echo"$no" ?></td> 
	    				<td align="center"><?php echo"$r[fakultas]" ?></td>
						<td align="center"><a href="<?php echo"$aksi?module=fakultas&act=hapus&id=$r[id_fakultas]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
					</tr> 
				<?php $no++; } ?>
					
					
				</tbody> 
				</table>
				
			</div>
		</div>
	</div>
  <?php break; 
  case "tambah_fakultas":
  		// load view insert new fakultas
  		require_once('view_insert_fakultas.php');
     break;
    

}
