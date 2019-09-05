	<style type="text/css" title="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
	$(document).ready( function () {
	     var oTable = $('#pesan').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );		
	} );
	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>

		
	<?php
		$aksi="modul/mod_pesan/aksi_pesan.php";
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Message</h4>
			</div>
			<div class="panel-body">
				<table class='display' id='pesan'> 
				<thead> 
					<tr>  
	    				<th>No</th> 
	    				<th>Date</th> 
	    				<th>Name</th> 
	    				<th>Email</th> 
	    				<th>Read</th> 
	    				<th>Aksi</th> 
					</tr> 
				</thead> 
				
				<tbody> 
				<?php 	
					$no=1;
					$room = mysql_query("SELECT * FROM contact ORDER BY tanggal DESC");
					while($r=mysql_fetch_array($room)){
					
					
					?>
					<tr>  
	    				<td align="center"><?php echo"$no" ?></td> 
	    				<td align="center"><?php echo"$r[tanggal]" ?></td> 
	    				<td align="center"><?php echo"$r[nama]" ?></td> 
	    				<td align="center"><?php echo"$r[email]" ?></td> 
	    				<td align="center"><?php echo"$r[dibaca]"; ?></td> 
						<td align="center"><a href="<?php echo"?module=pesan&act=edit&id=$r[id]";?>"><input type="image" src="images/icn_edit.png" title="Detail"></a> &nbsp;<a href="<?php echo"$aksi?module=pesan&act=hapus&id=$r[id]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
					</tr> 
				<?php $no++; } ?>
					
					
				</tbody> 
				</table>
			</div>
		</div>
	</div>
		
		
	<?php break; 
		case"edit":
			$room = mysql_query("SELECT * FROM contact WHERE id='$_GET[id]'");
			$r=mysql_fetch_array($room);
			$on = mysql_query("SELECT * FROM berita WHERE id_berita='$r[id]'");
			$o=mysql_fetch_array($on);
			
			$tgl = tgl_amerika($r['tanggal']);
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Detail Message</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='modul/mod_pesan/aksi_pesan.php?module=pesan&act=update2'>
					<input type="hidden" name="id" value='<?php echo"$_GET[id]" ?>'>

					<div class="form-group">
						<label>Name</label>
						<div class="alert alert-info">
							<?php echo"$r[nama]" ?>
						</div>
					</div>

					<div class="form-group">
						<label>Email</label>
						<div class="alert alert-info">
							<?php echo"$r[email]" ?>
						</div>
					</div>

					<div class="form-group">
						<label>Phone</label>
						<div class="alert alert-info">
							<?php echo"$r[phone]" ?>
						</div>
					</div>

					<div class="form-group">
						<label>Message</label>
						<div class="alert alert-info">
							<?php echo"$r[message]" ?>
						</div>
					</div>

					<div class="form-group">
						<label>Date</label>
						<div class="alert alert-info">
							<?php echo"$tgl"; ?>
						</div>
					</div>

					<div class="form-group">
						<label>Read</label>
						<?php 
							if($r['dibaca'] == 'No'){
						?>
							<label class="radio-inline">
								<input type="radio" name="aktif" class="radio" value="Yes" > Yes
							</label>
							<label class="radio-inline"> 
								<input type="radio" name="aktif" class="radio" value="No" checked > No
						    </label>
						<?php } else {?>
							<label class="radio-inline"> 
								<input type="radio" name="aktif" class="radio" value="Yes"  checked> Yes 
						    </label>
						    <label class="radio-inline"> 
								<input type="radio" name="aktif" class="radio" value="No" > No
						    </label>
							
						<?php } ?>
					</div>

					<footer>
						<div class="submit_link">
							<input type="submit" value="Update" class="alt_btn">
							<input type="button" onclick='self.history.back()' value="Back">
						</div>
					</footer>
				</form>				
			</div>
		</div>
	</div>
		
	<?php	
		break;
		 }