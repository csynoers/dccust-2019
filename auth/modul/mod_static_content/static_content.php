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
<?php
	$aksi="modul/mod_static_content/aksi_static_content.php";
	$jasa = mysql_query("SELECT * FROM modul WHERE id_modul='$_GET[id]'");
	$w=mysql_fetch_assoc($jasa);
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit <?php echo $w['nama_modul_ina'];?></h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=static_content&act=update'>
				<input type='hidden' name='id' value='<?php echo"$w[id_modul]" ?>'>
				<div class="form-group">
					<label>Judul</label>
					<input class="form-control" name="nama_modul_ina" type="text" value="<?php echo"$w[nama_modul_ina]" ?>">
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="isi_ina" id="jogmce" rows="12"><?php echo"$w[static_content_ina]" ?></textarea>
				</div>

				<?php
				if($_GET['id']=="7")
					{
				?>
				<div class="form-group">
					<label>Google Map Iframe</label>
					<input class="form-control" name='gmap' value='<?php echo"$w[extra]" ?>' style='height:100px;width:100%;'>
				</div>
				<?php } ?>

				<div class="form-group">
					<label>Thumbnail</label>
					<img class="img-responsive" src="../joimg/statik/<?php echo"$w[gambar]" ?>">
				</div>

				<div class="form-group">
					<label>Ganti Thumbnail</label>
					<input type="file" name="fupload" size=40>
				</div>
				<div class="alert alert-info">
					<strong>Info!</strong> File Type: .jpg File Size: 1300x481 px.
				</div>

				<button type="submit" class="btn btn-primary">Publish</button>

			</form>
			
		</div>
	</div>
</div>
