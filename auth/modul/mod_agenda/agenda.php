<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
	$(document).ready( function () {
		var oTable = $('#agenda').dataTable( {
					"bJQueryUI": true,
					"sPaginationType": "full_numbers",
		} );		
	} );
</script>
<style>.ui-widget-header{background:none;border:none;}</style>

	
<?php
	$aksi="modul/mod_agenda/aksi_agenda.php";
	$module="agenda";
	isset($_GET['act'])? $act=$_GET['act'] : $act='';

	switch($act){
	default:
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="#">Agenda</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#" onclick="location.href='?module=<?php echo $module;?>&act=update_header'">
							<button type="button" class="btn btn-primary">Update Header</button>
						</a>
					</li>
					<li>
						<a href="#" onclick="location.href='?module=<?php echo $module;?>&act=insertnew'">
							<button type="button" class="btn btn-primary">Insert New</button>
						</a>	
					</li>
				</ul>
			</div>
		</nav>
		<div class="panel-body">
			<table class='display' id='agenda'> 
			<thead> 
				<tr>  
    				<th width="4%">No</th> 
    				<!-- <th width="16%">Thumbnail</th>  -->
    				<th width="40%">Tittle</th> 
    				<th width="20">Date</th> 
    				<th width="20">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$berita = $db->get_select("SELECT * FROM agenda ORDER BY id_agenda DESC");
				foreach ($berita['data'] as $key => $b){
				$tanggal = tanggal_indo($tanggal=date('Y-m-d',strtotime($b->tanggal)), $cetak_hari = true);
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<!-- <td align="center"><img class="img-responsive" src="../joimg/event/<?php echo"$b->gambar" ?>"></td>  -->
    				<td><?php echo"$b->nama_agenda_ina" ?></td> 
    				<td><?php echo $tanggal; ?></td> 
    				<td align="center"><a href="<?php echo"?module=$module&act=edit&id=$b->id_agenda";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=$module&act=hapus&id=$b->id_agenda";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
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
			<h4>Add Agenda</h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=insertnew'>
				<div class="container-fluid">
					<div class="form-group">
						<label for="judul">Judul :</label>
						<input name="judul_ina" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="tema_agenda">Tema Agenda :</label>
						<input name="tema_ina" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi :</label>
						<textarea name="isi_ina" id="jogmce"></textarea>
					</div>
					<div class="form-group">
						<label for="waktu_pelaksanaan">Waktu Pelaksanaan :</label>
						<input class="form-control"  name="waktu" type="date" >
					</div>
					<div class="form-group">
						<label for="peserta">Peserta :</label>
						<input class="form-control"  name="peserta" type="text" >
					</div>
					<div class="form-group">
						<label for="lokasi">Lokasi :</label>
						<input class="form-control"  name="lokasi" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="thumbnail">Thumbnail :</label>
						<input type="file" name="fupload">
					</div>
					<div class="form-group">
						<div class="alert alert-info">
							<strong>Info! </strong>File Type: *.jpg File Size: max-width:1024 px.
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
	$berita = $db->get_select("SELECT * FROM agenda WHERE id_agenda='$_GET[id]'");
	$r= $berita['data'][0];
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Agenda</h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=update'>
				<div class="container-fluid">
					<input type='hidden' name='id' value='<?php echo"$r->id_agenda" ?>'>
					<div class="form-group">
						<label for="judul">Judul :</label>
						<input name="judul_ina" type="text" value="<?php echo"$r->nama_agenda_ina" ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="tema_agenda">Tema Agenda :</label>
						<input name="tema_ina" type="text"  value="<?php echo"$r->tema_agenda_ina" ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi :</label>
						<textarea name="isi_ina" id="jogmce" class="form-control"><?php echo"$r->isi_agenda_ina" ?></textarea>
					</div>
					<div class="form-group">
						<label for="waktu_pelaksanaan">Waktu Pelaksanaan :</label>
						<input name="waktu" type="date" value="<?php echo"$r->waktu" ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="peserta">Peserta :</label>
						<input  name="peserta" type="text" value="<?php echo"$r->peserta" ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="lokasi">Lokasi :</label>
						<input  name="lokasi" type="text" value="<?php echo"$r->lokasi" ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="thumbnail">Thumbnail :</label>
						<img class="img-responsive" src="../joimg/event/<?php echo"$r->gambar" ?>">
					</div>
					<div class="form-group">
						<label for="change_thumbnail">Change Thumbnail :</label>
						<input type="file" name="fupload">
					</div>
					<div class="form-group">
						<div class="alert alert-info">
							<strong>Info! </strong>File Type: *.jpg File Size: max-width:1024 px.
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
	$header = $db->get_select("SELECT * FROM header WHERE id_header='4' AND aktif='Y'");
	$h= $header['data'][0];
		
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Header Agenda</h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=agenda&act=update_header'>
				<div class="container-fluid">
					<input type='hidden' name='id' value='<?php echo"$h->id_header" ?>'>
					<div class="form-group">
						<label for="jdudul">Judul :</label>
						<input class="form-control" name="nama_header_ina" type="text" value="<?php echo"$h->nama_header_ina" ?>">
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi :</label>
						<textarea name="isi_header_ina" id="jogmce"><?php echo"$h->isi_header_ina" ?></textarea>
					</div>
					<div class="form-group">
						<label for="thumbnail">Thumbnail :</label>
						<img class="img-responsive" src="../joimg/header_image/<?php echo"$h->gambar" ?>">
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
			
		</div>
	</div>
</div>
	
	
<?php	
	break;
	}
?>