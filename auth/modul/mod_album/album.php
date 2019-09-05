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

		<!-- TinyMCE 4.x -->
<script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
	
	<script type="text/javascript">
	tinymce.init({
			selector: "textarea",
			plugins: "table",
			tools: "inserttable",
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste jbimages",
				"textcolor",
				"autoresize",
				"pagebreak",
				
			],

			//toolbar: "pagebreak save charmap advhr| insertfile undo redo | styleselect,formatselect,fontselect,fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | jbimages | print preview media | forecolor backcolor emoticons | anchor",
			toolbar:"pagebreak save charmap| insertfile undo redo | styleselect formatselect fontselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | jbimages | print preview media | forecolor backcolor emoticons | justifyleft justifycenter justifyright justifyfull | cut copy paste pastetext pasteword | search replace | blockquote |link unlink anchor image cleanup help code | insertdate inserttime preview | tablecontrols | hr removeformat visualaid | sub sup | iespell media advhr | print | ltr rtl | fullscreen | insertlayer moveforward movebackward absolute |styleprops spellchecker | cite abbr acronym del ins attribs | visualchars nonbreaking template | insertimage",
			relative_urls: false
	 });
	</script>
<!-- /TinyMCE -->
		
	<?php
		$aksi="modul/mod_album/aksi_album.php";
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">Daftar album</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#" onclick="location.href='?module=album&act=insertnew'">
								<button type="button" class="btn btn-primary">Insert New</button>
							</a>	
						</li>
					</ul>
				</div>
			</nav>
			<div class="panel-body">
				<table class='display' id='example'> 
				<thead> 
					<tr>  
	    				<th>No</th> 
	    				<th>Thumbnail</th> 
	    				<th>Album</th> 
	    				<th>Aksi</th> 
					</tr> 
				</thead> 
				
				<tbody> 
				<?php 	
					$no=1;
					$album = mysql_query("SELECT * FROM album ORDER BY id_album DESC");
					while($m=mysql_fetch_array($album)){
					
					
					?>
					<tr>  
	    				<td align="center"><?php echo"$no" ?></td> 
	    				<td align="center"><img width="100px" src="../joimg/album/<?php echo"$m[gambar]" ?>"></td> 
	    				<td><?php echo"$m[nama]" ?></td> 
	    				<td align="center"><a href="<?php echo"?module=album&act=edit&id=$m[id_album]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=album&act=hapus&id=$m[id_album]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
							&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo"?module=galeri&id=$m[id_album]";?>">Add Galeri</a>
						</td> 
					</tr> 
				<?php $no++; } ?>
					
					
				</tbody> 
				</table>
				
			</div>
		</div>
	</div>	
		
	<?php
		break; 
		case"insertnew":
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Tambahkan Album</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=album&act=insertnew'>
					<div class="form-group">
						<label>Nama Album</label>
						<input class="form-control" name="nama" type="text" >
					</div>

					<div class="form-group">
						<label>Thumbnail</label>
						<input style="margin-left:10px;" type="file" name="fupload" size=40>
					</div>
					<div class="alert alert-info">
						<strong>Info!</strong> *) Image size minimal 280 x 200px.
					</div>
				<footer>
					<div class="submit_link">
						<input type="submit" value="Publish" class="alt_btn">
						<input type="button" onclick='self.history.back()' value="Back">
					</div>
				</footer>
				</form>
				
			</div>
		</div>
	</div>
		
	<?php
		break; 
		case"edit":
			$album = mysql_query("SELECT * FROM album WHERE id_album='$_GET[id]'");
			$r=mysql_fetch_array($album);
			
	?>

	<?php
		switch($_GET[act2]){
			default:
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Album</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=album&act=update'>
					<input type='hidden' name='id' value='<?php echo"$r[id_album]" ?>'>
					<div class="form-group">
						<label>Nama Album</label>
						<input class="form-control" name="nama" type="text" value="<?php echo"$r[nama]" ?>">
					</div>

					<div class="form-group">
						<label>Thumbnail</label>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<img class="img-responsive" src="../joimg/album/<?php echo"$r[gambar]" ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Ganti Thumbnail</label>
						<input style="margin-left:10px;" type="file" name="fupload" size=40>
					</div>
					<div class="alert alert-info">
					  <strong>Info!</strong> *) Image size minimal 280 x 200px.
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
		break;
		 }