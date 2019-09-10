<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
$(document).ready( function () {
     var oTable = $('#kerjasama').dataTable( {
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
				} );		
} );
</script>
<style>.ui-widget-header{background:none;border:none;}</style>

	
<?php
	$aksi="modul/mod_sajian/aksi_sajian.php";
	$module="sajian";
	isset($_GET['act'])? $act=$_GET['act'] : $act='';

	switch($act){
	default:
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="#">Kerjasama</a>
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
			<table class='display' id='kerjasama'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<!-- <th>Thumbnail</th>  -->
    				<th>Tittle</th> 
    				<th width="80px">Date</th> 
    				<th width="130px">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$sajian = $db->get_select("SELECT * FROM sajian ORDER BY id_sajian DESC");
				foreach ($sajian['data'] as $key => $b ){
				$tanggal = tanggal_indo($tanggal=date('Y-m-d',strtotime($b->tanggal)), $cetak_hari = true);
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<!-- <td align="center"><img height="70px" src="../joimg/ourclient/<?php echo"$b->gambar" ?>"></td> --> 
    				<td><?php echo"$b->nama_sajian_ina" ?></td> 
    				<td width="90px"><?php echo $tanggal; ?></td> 
    				<td align="center"><a href="<?php echo"?module=$module&act=edit&id=$b->id_sajian";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=$module&act=hapus&id=$b->id_sajian";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
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
			<h4>Add Kerjasama</h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=insertnew'>
				<div class="container-fluid">
					<div class="form-group">
						<label for="judul">Judul :</label>
						<input class="form-control" name="judul_ina" type="text" >
					</div>
					<!-- <div class="form-group">
						<label for="deskripsi">Deskripsi :</label>
						<textarea name="isi_ina" id="jogmce"></textarea>
					</div> -->
					<div class="form-group">
						<label for="thumbnail">Thumbnail :</label>
						<input type="file" name="fupload">
					</div>
					<div class="form-group">
						<div class="alert alert-info">
							<strong>Info! </strong>File Type: *.jpg File Size: max-width:200 max-height:150px.
						</div>
					</div>
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
	$sajian = $db->get_select("SELECT * FROM sajian WHERE id_sajian='$_GET[id]'");
	$r= $sajian['data'][0];
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Kerjasama</h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=update'>
				<div class="container-fluid">
					<input type='hidden' name='id' value='<?php echo"$r->id_sajian" ?>'>
					<div class="form-group">
						<label for="judul">Judul :</label>
						<input class="form-control" name="judul_ina" type="text" value="<?php echo"$r->nama_sajian_ina" ?>">
					</div>
					<!-- <div class="form-group">
						<label for="deskripsi">Deskripsi :</label>
						<textarea name="isi_ina" id="jogmce"><?php echo"$r->isi_sajian_ina" ?></textarea>
					</div> -->
					<div class="form-group">
						<label for="thumbnail">Thumbnail :</label>
						<img class="img-responsive" src="../joimg/ourclient/<?php echo"$r->gambar" ?>">
					</div>
					<div class="form-group">
						<label for="change_thumbnail">Change Thumbnail :</label>
						<input type="file" name="fupload">
					</div>
					<div class="form-group">
						<div class="alert alert-info">
							<strong>Info! </strong>File Type: *.jpg File Size: max-width:200 max-height:150px.
						</div>
					</div>
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
	case"update_header":
	$header = mysql_query("SELECT * FROM header WHERE id_header='5' AND aktif='Y'");
	$h=mysql_fetch_assoc($header);
		
?>
	
	<article class="module width_full">
		<header><h3>Edit Header Kerjasama</h3></header>
		<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=sajian&act=update_header'>
			<div class="container-fluid">
				<input type='hidden' name='id' value='<?php echo"$h[id_header]" ?>'>
				<div class="form-group">
					<label for="judul">Judul :</label>
					<input class="form-control" name="nama_header_ina" type="text" value="<?php echo"$h[nama_header_ina]" ?>">
				</div>
				<div class="form-group">
					<label for="deskripsi">Deskripsi :</label>
					<textarea name="isi_header_ina" id="jogmce"><?php echo"$h[isi_header_ina]" ?></textarea>
				</div>
				<div class="form-group">
					<label for="thumbnail">Thumbnail :</label>
					<img class="img-responsive" src="../joimg/header_image/<?php echo"$h[gambar]" ?>">
				</div>
				<div class="form-group">
					<label for="change_thumbnail">Change Thumbnail :</label>
					<input type="file" name="fupload">
				</div>
				<div class="form-group">
					<div class="alert alert-info">
						<strong>Info! </strong>File Type: *.jpg File Size: 1300x481 px.
					</div>
				</div>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
		</form>
	</article>
	<br />
	<br />
	
	
	<?php	
		break;
}