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
		$aksi="modul/mod_galeri/aksi_galeri.php";
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">Daftar Galeri</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#" onclick="location.href='?module=galeri&act=insertnew&id_album=<?php echo $_GET[id] ?>'">
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
	    				<th>Image</th> 
	    				<th>Album</th> 
	    				<th>Aksi</th> 
					</tr> 
				</thead> 
				
				<tbody> 
				<?php 	
					$no=1;
					$a=mysql_fetch_array(mysql_query("SELECT * FROM album where id_album='$_GET[id]'"));
					$galeri = mysql_query("SELECT * FROM galeri where id_album='$_GET[id]' ORDER BY id_galeri DESC");
					while($m=mysql_fetch_array($galeri)){
						
					?>
					<tr>  
	    				<td align="center"><?php echo" $no" ?></td> 
	    				<td align="center"><img width="100px" src="../joimg/galeri/<?php echo"$m[gambar]" ?>"></td> 
	    				<td><?php echo"$m[nama]" ?></td> 
	    				<td><?php echo"$a[nama]" ?></td>
	    				<td align="center">
	    				<a href="<?php echo"?module=galeri&act=edit&id=$m[id_galeri]";?>&id_album=<?php echo $_GET[id] ?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; 
	    				<a href="<?php echo"$aksi?module=galeri&act=hapus&id=$m[id_galeri]";?>&id_album=<?php echo $_GET[id] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
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
				<h4>Tambahkan Galeri</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=galeri&act=insertnew'>
					<input type="hidden" name="album" value="<?php echo $_GET['id_album'] ?>">
					<div class="form-group">
						<label>Nama Galeri</label>
						<input class="form-control" name="nama" type="text">
					</div>

					<div class="form-group">
						<?php 
							echo "
								<label>Album</label>
								<select class='form-control' name='album'>";
								$tampil=mysql_query("SELECT * FROM album ORDER BY nama ASC");
									while($w=mysql_fetch_array($tampil)){
									echo "<option value=$w[id_album]>$w[nama]</option>";
								}
							echo "</select>";
						?>
					</div>

					<div class="form-group">
						<label>Thumbnail</label>
						<input style="margin-left:10px;" type="file" name="fupload" size=40>
					</div>
					<div class="alert alert-info">
					  <strong>Info!</strong> *) Image size minimal 650 x 450px.
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
		
	<?php break; 
		case"edit":
			$galeri = mysql_query("SELECT * FROM galeri WHERE id_galeri='$_GET[id]'");
			$r=mysql_fetch_array($galeri);
			
	?>
	<?php
			switch($_GET[act2]){
				default:
	?>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Galeri</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=galeri&act=update'>
					<input type="hidden" name="album" value="<?php echo $_GET['id_album'] ?>">
					<input type='hidden' name='id' value='<?php echo"$r[id_galeri]" ?>'>
					<div class="form-group">
						<label>Nama Galeri</label>
						<input class="form-control" name="nama" type="text" value="<?php echo"$r[nama]" ?>">
					</div>

					<div class="form-group">
						<?php
							echo"
								<label>Album</label>
								<select class='form-control' name='album'>";
								
								$tampil=mysql_query("SELECT * FROM album ORDER BY nama ASC");
							  if ($r[id_album]==0){
								echo "<option value=0 selected>- Pilih Album -</option>";
								}   

							  while($w=mysql_fetch_array($tampil)){
								if ($r[id_album]==$w[id_album]){
								  echo "<option value=$w[id_album] selected>$w[nama]</option>";
								}
								else{
								  echo "<option value=$w[id_album]>$w[nama]</option>";
								}
							}
							echo "</select>";
						?>
					</div>

					<div class="form-group">
						<label>Thumbnail</label>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm6 col-xs-12">
								<img class="img-responsive" src="../joimg/galeri/<?php echo"$r[gambar]" ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Ganti Thumbnail</label>
						<input style="margin-left:10px;" type="file" name="fupload" size=40>
					</div>
					<div class="alert alert-info">
					  <strong>Info!</strong> *) Image size minimal 650 x 450px.
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