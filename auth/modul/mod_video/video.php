<style type="text/css" title="currentStyle">
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
		$aksi="modul/mod_video/aksi_video.php";
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:
	?>

	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Koleksi video</h4>
			</div>
			<div class="panel-body">
				<table class='display' id='example'>
				<thead> 
					<tr>  
	    				<th>No</th>
	    				<th>Tittle</th> 
	    				<th>Link</th> 
	    				<th>Actions</th> 
					</tr> 
				</thead> 
				
				<tbody> 
				<?php 	
					$no=1;
					$slide = mysql_query("SELECT * FROM video ORDER BY id ASC");
					while($s=mysql_fetch_array($slide)){
					
					?>
					<tr style="background: #E2E4FF;">  
	    				<th><?php echo"$no" ?></th>
	    				<td><?php echo"$s[judul]" ?></td> 
	    				<td><?php echo"$s[video]" ?></td> 
	    				<td style="text-align:center"><a href="<?php echo"?module=video&act=edit&id=$s[id]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo"$aksi?module=video&act=hapus&id=$s[id]";?>"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
					</tr> 
				<?php $no++; } ?>
					
					
				</tbody> 
				</table>
			</div>
		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Add New video</h4>
			</div>
			<div class="panel-body">
				 <form method='POST' enctype='multipart/form-data' action='modul/mod_video/aksi_video.php?module=video&act=insertnew'>
				 	<div class="form-group">
				 		<label>Title</label>
				 		<input class="form-control" name="name" type="text">
				 	</div>
				 	<div class="form-group">
				 		<label>Link</label>
				 		<input class="form-control" name="link" type="text">
				 	</div>
					<div class="alert alert-info">
					  <strong>Info!</strong> *)Link harus mengunakan <b><i>www.youtube.com</i></b> (contoh : <b><i>www.youtube.com/embed/WlSTAYVTxkQ</i></b>)
					</div>
					<footer>
						<div class="submit_link">
							<input type="submit" value="Publish" class="alt_btn">
						</div>
					</footer>
				</form>
			</div>
		</div>
	</div>
		
		
		<?php break; 
		case"edit":
			$video = mysql_query("SELECT * FROM video WHERE id='$_GET[id]'");
				$g=mysql_fetch_array($video);
		
		?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit video</h4>
			</div>
			<div class="panel-body">
				 <form method='POST' enctype='multipart/form-data' action='modul/mod_video/aksi_video.php?module=video&act=update'>
					<input type='hidden' name='id' value='<?php echo"$g[id]" ?>'>
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="name" type="text" value="<?php echo"$g[judul]" ?>">
					</div>
					<div class="form-group">
						<label>Link</label>
						<input class="form-control" name="link" type="text" value="<?php echo"$g[video]" ?>">
					</div>
					<footer>
							<input style="float:right; margin-top:5px;margin-right:10px;" type='button'  class='tombol' value='Back' onclick='self.history.back()'>
						<div class="submit_link">
							<input type="submit" value="Update" class="alt_btn">
						</div>
					</footer>
					
				</form>
				
			</div>
		</div>
	</div>
		
		<?php
		
		break; 
		 }