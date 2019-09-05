	<style type="text/css" title="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>
	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
	$(document).ready( function () {
	     var oTable = $('#prodi').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );		
	} );
	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>
	<?php
		$aksi="modul/mod_prodi/aksi_prodi.php";
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">Program Studi</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#" onclick="location.href='?module=prodi&act=tambah_prodi'">
								<button type="button" class="btn btn-primary">Insert New</button>
							</a>	
						</li>
					</ul>
				</div>
			</nav>
			<div class="panel-body">
				<table class='display' id='prodi'> 
				<thead> 
					<tr>  
	    				<th>No</th>
						<th>Fakultas</th>
						<th>Prodi</th>
						<th>Aksi</th>
					</tr> 
				</thead> 
				
				<tbody> 
				<?php 	
					$no=1;
					$prodi = mysql_query("SELECT * FROM prodi INNER JOIN fakultas ON (fakultas.id_fakultas = prodi.id_fakultas) ORDER BY id_prodi DESC");
					while($r=mysql_fetch_array($prodi)){
					
					
					?>
					<tr>  
	    				<td align="center"><?php echo"$no" ?></td> 
	    				<td align="center"><?php echo"$r[fakultas]" ?></td> 
	    				<td align="center"><?php echo"$r[prodi]" ?></td> 
						<td align="center"><a href="<?php echo"$aksi?module=prodi&act=hapus&id=$r[id_prodi]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
					</tr> 
				<?php $no++; } ?>
					
					
				</tbody> 
				</table>
				
			</div>
		</div>
	</div>
  <?php break; 
  case "tambah_prodi":
  		// load view insert prodi
   		require_once('view_insert_prodi.php');
     break;
    

}