<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
$(document).ready( function () {
     var oTable = $('#kuisd').dataTable( {
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
				});		
});
</script>
<style>.ui-widget-header{background:none;border:none;}</style>
	<?php
		$aksi="modul/mod_kuisd/aksi_kuisd.php";
		$print = "modul/mod_kuisd/aksi_export.php";
		$module="kuisd";
		isset($_GET['j'])? $jenjang = "S".$_GET['j'] : $jenjang='';
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:
	?>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>HASIL D. Keselarasan Vertikal dan Horizontal</h4>
			</div>
			<div class="panel-body">
				<div id="tab1" class="row">
					<div class="col-lg-6 col-sm-6">
						<form action="" method="POST">
							<div class="form-group">
								<label>Pilih Prodi: </label>
								<select class="form-control" name="prodi" onchange="this.form.submit()">
									<option value=""> -- Pilih Prodi -- </option>
									<?php
									$prodi = mysql_query("SELECT * FROM prodi");
									while ($dprodi = mysql_fetch_assoc($prodi)) {
										?>
										<option value="<?php echo $dprodi['id_prodi'] ?>"><?php echo $dprodi['prodi'] ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</form>

						<p>*Mohon pilih Prodi terlebih dahulu</p>
						
						<?php 
						if (empty($_POST['prodi'])) {
							?>
							<a href="#">Export ke Excel</a>
							<?php
						}else{
							?>
							<a href="<?php echo $print ?>?module&prodi=<?php echo $_POST['prodi'] ?>">Export ke Excel</a>
							<?php
						}
						?>
						
					</div>
					<br>

					<div class="col-lg-12 col-sm-12">
						<table class='display' id='kuisd'> 
						<thead> 
							<tr>  
			    				<th>No</th> 
			    				<th>NIM</th> 
			    				<th>Nama Alumni</th> 
			    				<th>Prodi</th>
			    				<th>Tahun Lulus</th>
			    				<th>Action</th> 
							</tr> 
						</thead> 
						<tbody> 
						<?php 	
							$no=1;
							if (isset($_POST['prodi'])) {
								$kuisd = mysql_query("
													SELECT
														alumni_daftar.nim,
														alumni_daftar.nama_alumni,
														alumni_daftar.tahun_lulus,
														prodi.prodi,
														tb_d.id_alumni
													FROM alumni_daftar
													    INNER JOIN prodi 
													        ON (alumni_daftar.prodi = prodi.id_prodi)
													    INNER JOIN tb_d 
													        ON (tb_d.id_alumni = alumni_daftar.id_alumni)
													WHERE alumni_daftar.prodi = '$_POST[prodi]'
													ORDER BY alumni_daftar.nim ASC");
							}else{
								$kuisd = mysql_query("
													SELECT
														alumni_daftar.nim,
														alumni_daftar.nama_alumni,
														alumni_daftar.tahun_lulus,
														prodi.prodi,
														tb_d.id_alumni

													FROM alumni_daftar
													    INNER JOIN prodi 
													        ON (alumni_daftar.prodi = prodi.id_prodi)
													    INNER JOIN tb_d 
													        ON (tb_d.id_alumni = alumni_daftar.id_alumni)
													ORDER BY alumni_daftar.nim ASC");
							}
							while($b=mysql_fetch_array($kuisd)){
							?>
							<tr>  
			    				<td align="center"><?php echo "$no" ?></td> 
			    				<td align="center"><?php echo "$b[nim]" ?></td> 
			    				<td><?php echo "$b[nama_alumni]" ?></td>
			    				<td><?php echo "$b[prodi]" ?></td> 
			    				<td><?php echo "$b[tahun_lulus]" ?></td>
			    				<td align="center">
			    					<a href="<?php echo"$aksi?module=$module&act=hapus&id=$b[id_alumni]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
								</td> 
							</tr>

						<?php $no++; } ?>
							
							
						</tbody> 
						</table>
					</div>
					<div class="clear"></div>
				</div>
				
			</div>
		</div>
	</div>
		
		<?php break; 
		case"insertnew":
		?>
		
		<article class="module width_full">
			<header><h3 style="color: Red;">Add Alumni</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=insertnew'>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#ina" data-toggle="tab">Content Indonesia</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                            </div>
                        </div>
					</div>
					<fieldset><label>NAMA ALUMNI</label><br />
						<input style="width:96%; margin-bottom:8px;" name="nama" type="text" >
					</fieldset>
					<fieldset><label>USERNAME</label><br />
						<input style="width:96%; margin-bottom:8px;" name="username" type="text" >
					</fieldset>
					<fieldset><label>PASSWORD</label><br />
						<input style="width:96%; margin-bottom:8px;" name="password" type="text" >
					</fieldset>
					<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						<label>Logo</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> 
					</fieldset>
					<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><br /><br /><!-- end of post new article -->
		
		<?php break; 
		case"edit":
			$kuisd = mysql_query("SELECT * FROM kuisd_daftar WHERE id_kuisd='$_GET[id]'");
			$r=mysql_fetch_array($kuisd);
		?>		
		<article class="module width_full">
			<header><h3>Edit Alumni</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=update'>
				<input type='hidden' name='id_kuisd' value='<?php echo"$r[id_kuisd]" ?>'>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#ina" data-toggle="tab">Content Indonesia</a>
                                </li>
                            </ul>
                            <div class="tab-content">

                            </div>
                        </div>
					</div>
					<fieldset><label>Nama kuisd</label><br />
						<input style="width:96%; margin-bottom:8px;" name="nama" type="text" value="<?php echo"$r[nama_kuisd]" ?>">
					</fieldset>
					<fieldset><label>Email</label><br />
						<input style="width:96%; margin-bottom:8px;" name="email" type="text" value="<?php echo"$r[email]" ?>">
					</fieldset>
					<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><br /><br />
		<div class="clear"></div><br/><br/>
		<?php break; 
			case"update_header":
			$header = mysql_query("SELECT * FROM header WHERE id_header='12' AND aktif='Y'");
			$h=mysql_fetch_array($header);	
		?>
		<article class="module width_full">
			<header><h3>Edit Header Album</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=kuisd&act=update_header'>
			<div class="col-lg-12">
				<input type='hidden' name='id' value='<?php echo"$h[id_header]" ?>'>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#ina" data-toggle="tab">Content Indonesia</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="ina">
									<div class="module_content">
										<fieldset><label>Judul</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="nama_header_ina" type="text" value="<?php echo"$h[nama_header_ina]" ?>">
										</fieldset>
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_header_ina" id="jogmce"><?php echo"$h[isi_header_ina]" ?></textarea>
										</fieldset>
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
										<fieldset><label>Tittle</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="nama_header_en" type="text" value="<?php echo"$h[nama_header_en]" ?>">
										</fieldset>
										<fieldset><label>Description</label><br /><br />
											<textarea name="isi_header_en"><?php echo"$h[isi_header_en]" ?></textarea>
										</fieldset>
									</div>	
                                </div>
                            </div>
                        </div>
                    </div>
					</div>
					<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						&nbsp;&nbsp;<img width="270px" src="../joimg/header_image/<?php echo"$h[gambar]" ?>">
						<br /><br /><label>Ganti header</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 1024x370 px.
					</fieldset>
					<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article --><br /><br /><!-- end of post new article -->
		
		
		<?php	
			break;
			}