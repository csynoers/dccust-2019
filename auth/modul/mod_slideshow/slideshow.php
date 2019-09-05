	<style type="text/css" title="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
	$(document).ready( function () {
	     var oTable = $('#slideshow').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );		
	} );
	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>


		
	<?php
		$aksi="modul/mod_slideshow/aksi_slideshow.php";
		$module="slideshow";
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">Slideshow</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#" onclick="location.href='?module=<?php echo $module;?>&act=insertnew'">
								<button type="button" class="btn btn-primary">Insert New</button>
							</a>	
						</li>
					</ul>
				</div>
			</nav>
			<div class="panel-body">
				<table width="100%" class='display' id='slideshow'> 
				<thead> 
					<tr>  
	    				<th width="5%">No</th> 
	    				<th width="19%">Thumbnail</th> 
	    				<th width="19%">Tittle</th> 
	    				<th width="19%">Link</th> 
	    				<th width="19%">Date</th> 
	    				<th width="19%">Action</th> 
					</tr> 
				</thead> 
				
				<tbody> 
				<?php 	
					$no=1;
					$slideshow = mysql_query("SELECT * FROM slide ORDER BY id DESC");
					while($b=mysql_fetch_array($slideshow)){
					$tanggal = tgl_amerika($b['tanggal']);
					
					
					?>
					<tr>  
	    				<td align="center"><?php echo"$no" ?></td> 
	    				<td align="center"><img class="img-responsive" src="../joimg/slide/<?php echo"$b[gambar]" ?>"></td> 
	    				<td><?php echo"$b[judul_ina]" ?></td> 
	    				<td><?php echo"$b[link]" ?></td> 
	    				<td><?php echo $tanggal; ?></td> 
	    				<td align="center"><a href="<?php echo"?module=$module&act=edit&id=$b[id]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=$module&act=hapus&id=$b[id]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
						</td> 
					</tr> 
				<?php $no++; } ?>
					
					
				</tbody> 
				</table>
				
			</div>
		</div>
	</div>
		
		<?php break; 
		case"insertnew":
			// load view insert slideshow
			require_once('view_insert_slideshow.php');

		break; 
		case"edit":
			$slideshow = mysql_query("SELECT * FROM slide WHERE id='$_GET[id]'");
			$g=mysql_fetch_array($slideshow);

			// load view edit slideshow
			require_once('view_edit_slideshow.php');
		
		break; 
		 } 