	<style type="text/css" title="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
	$(document).ready( function () {
	     var oTable = $('#sosial').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );		
	} );
	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>


		
	<?php
		$aksi="modul/mod_sosial/aksi_sosial.php";
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:
	?>
		
		
		
	<?php
		$head = mysql_query("SELECT * FROM modul WHERE id_modul='5'");
		$thead=mysql_fetch_assoc($head);
	?>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Sosial Media</h4>
			</div>
			<div class="panel-body">
				<table class='display' id='sosial'>
				<thead> 
					<tr>  
	    				<th>No</th>
	    				<th>Tittle</th> 
	    				<th>Link</th> 
	    				<th width="30%">Thumbnail</th> 
	    				<th>Actions</th> 
					</tr> 
				</thead> 
				
				<tbody> 
				<?php 	
					$no=1;
					$slide = mysql_query("SELECT * FROM sosial ORDER BY id ASC");
					while($s=mysql_fetch_assoc($slide)){
					
					?>
					<tr style="background: #E2E4FF;">  
	    				<th width="4%"><?php echo"$no" ?></th>
	    				<td width="24%"><?php echo"$s[nama]" ?></td> 
	    				<td width="24%"><?php echo"$s[link]" ?></td> 
	    				<td width="24%"><img class="img-responsive" src="../joimg/sosial/<?php echo"$s[gambar]" ?>"></td> 
	    				<td width="24%" style="text-align:center"><a href="<?php echo"?module=sosial&act=edit&id=$s[id]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo"$aksi?module=sosial&act=hapus&id=$s[id]";?>"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
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
				<h4>Add New Sosial Media</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='modul/mod_sosial/aksi_sosial.php?module=sosial&act=insertnew'>
					<div class="module_content">
							<div class="form-group">
								<label for="title">Title :</label>
								<input type="text" name="name" class="form-control" required="">	
							</div>
							<div class="form-group">
								<label for="link">Link :</label>
								<input type="text" name="link" class="form-control">
							</div>
							<div class="form-group">
								<div class="alert alert-info">
									<strong>Info! *)</strong> Link harus mengunakan <b><i>http://</i></b> (contoh : <b><i>http://facebook.com/</i></b>).
								</div>
							</div>
							<div class="form-group">
								<label for="thumnail">Thumbnail :</label>
								<input type="file" name="fupload" required="">
							</div>
							<div class="form-group">
								<div class="alert alert-info">
									<strong>Info! </strong>File Type: *.png File Size: max-width: 128 px.
								</div>
							</div>
					</div>
					<footer>
						<div class="submit_link">
							<button type="submit" class="btn btn-primary">Publish</button>
						</div>
					</footer>
				</form>
				
			</div>
		</div>
	</div>
		
		
		
	<?php break; 
		case"edit":
			$sosial = mysql_query("SELECT * FROM sosial WHERE id='$_GET[id]'");
				$g=mysql_fetch_assoc($sosial);
		
	?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Sosial Media</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='modul/mod_sosial/aksi_sosial.php?module=sosial&act=update'>
					<div class="module_content">
						<input type='hidden' name='id' value='<?php echo"$g[id]" ?>'>
						<div class="form-group">
							<label for="title">Title :</label>
							<input type="text" name="name" value="<?php echo"$g[nama]" ?>" class="form-control">
						</div>						
						<div class="form-group">
							<label for="Link">Link :</label>
							<input type="text" name="link" value="<?php echo"$g[link]" ?>" class="form-control">
						</div>
						<div class="form-group">
							<div class="alert alert-info">
								<strong>Info! *)</strong> Link harus mengunakan <b><i>http://</i></b> (contoh : <b><i>http://facebook.com/</i></b>).
							</div>
						</div>
						<div class="form-group">	
							<label for="thumnail">Thumbnail :</label>
							<img class="img-responsive" src="../joimg/sosial/<?php echo"$g[gambar]" ?>">
						</div>
						<div class="form-group">
							<label for="change_thumbnail">Change Thumbnail :</label>
							<input type="file" name="fubpload">	
						</div>
						<div class="alert alert-info">
							<strong>Info! </strong>File Type: *.png File Size: max-width: 128 px.
						</div>
					</div>
					<footer>
						<div class="submit_link">
							<input type="button" value="Back" class="alt_btn" onclick='self.history.back()'>
						</div>
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