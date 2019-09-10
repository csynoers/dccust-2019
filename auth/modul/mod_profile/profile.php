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
	$aksi="modul/mod_profile/aksi_profile.php";
	$module="profile";

	isset($_GET['act'])? $act=$_GET['act'] : $act='';

	switch($act){
	default:
?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Tentang kami</h4>
			</div>
			<div class="panel-body">
				<table class='display' id='example'> 
				<thead> 
					<tr>  
	    				<th>Thumbnail</th> 
	    				<th>Tittle</th> 
	    				<th>Visi</th> 
	    				<th>Misi</th> 
	    				<th width="80px">Date</th> 
	    				<th width="130px">Action</th> 
					</tr> 
				</thead> 
				
				<tbody> 
				<?php 	
					$no=1;
					$profile = $db->get_select("SELECT * FROM profile ORDER BY id_profile DESC");
					foreach ($profile['data'] as $key => $b){
					$tanggal = tanggal_indo($tanggal=date('Y-m-d',strtotime($b->tanggal)), $cetak_hari = true);
					
					
					?>
					<tr>  
	    				
	    				<td align="center"><img height="70px" src="../joimg/profile/<?php echo"$b->gambar" ?>"></td> 
	    				<td><?php echo"$b->nama_profile_ina" ?></td> 
						<td><?php echo"$b->visi_profile_ina" ?></td>
						<td><?php echo"$b->misi_profile_ina" ?></td>
	    				<td width="90px"><?php echo $tanggal; ?></td> 
	    				<td align="center"><a href="<?php echo"?module=$module&act=edit&id=$b->id_profile";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=$module&act=hapus&id=$b->id_profile";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"></a>
						</td> 
					</tr> 
				<?php } ?>
					
					
				</tbody> 
				</table>
				
			</div>
		</div>		
		
	</div>
		
<?php
	break; 
	case"edit":
	$profile = $db->get_select("SELECT * FROM profile WHERE id_profile='$_GET[id]'");
	$r= $profile['data'][0];
?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Edit profile</h4>
			</div>

			<div class="panel-body">
				<header><h3></h3></header>
				<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=update'>
					<input type='hidden' name='id' value='<?php echo"$r->id_profile" ?>'>
					<div class="form-group">
						<label for="judul">Judul :</label>
						<input name="judul_ina" type="text" value="<?php echo"$r->nama_profile_ina" ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi Profile :</label>
						<textarea name="isi_ina" class="form-control"><?php echo"$r->isi_profile_ina" ?></textarea>
					</div>
					<div class="form-group">
						<label for="visi">Visi :</label>
						<textarea name="visi_ina" class="form-control"><?php echo"$r->visi_profile_ina" ?></textarea>
					</div>
					<div class="form-group">
						<label for="misi">Misi :</label>
						<textarea name="misi_ina" class="form-control"><?php echo"$r->misi_profile_ina" ?></textarea>
					</div>
					<div class="form-group">
						<label for="thumbnail">Thumbnail :</label>
						<img class="img-responsive" src="../joimg/profile/<?php echo"$r->gambar" ?>">
					</div>
					<div class="form-group">
						<label for="change_thumbnail">Change Thumbnail :</label>
						<input type="file" name="fupload">
					</div>
					<div class="alert alert-info">
						<strong>Info!</strong> File Type: .jpg File Size: 1300x481 px.
					</div>
					<!-- <footer> -->
						<!-- <div class="submit_link"> -->
							<button type="submit" class="btn btn-primary">Update</button>
							<button type="button" class="btn btn-primary" onclick='self.history.back()'>Back</button>
						<!-- </div> -->
					<!-- </footer> -->
				</form>
			</div>

		</div>
		
	</div>	
		
<?php	
	break;
	}
?>