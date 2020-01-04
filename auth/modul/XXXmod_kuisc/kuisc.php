	<style type="text/css" title="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
		$(document).ready( function () {
		     var oTable = $('#kuisc').dataTable( {
		                    "bJQueryUI": true,
		                    "sPaginationType": "full_numbers",
						});
		});
	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>

	<?php
		$aksi="modul/mod_kuisc/aksi_kuisc.php";
		$print = "modul/mod_kuisc/aksi_export.php";
		$module="kuisc";

	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>HASIL C. Pekerjaan Sekarang</h4>
			</div>
			<div class="panel-body">
				<div id="tab1" class="row">
					<div class="col-lg-6 col-sm-6">
						<div class="form-group">
							<form action="" method="POST">
							<label>Pilih Prodi: </label>
							<select class="form-control" style="max-width: 300px" name="prodi" onchange="this.form.submit()">
								<option value=""> -- Pilih Prodi -- </option>
								<?php
								$prodi = mysql_query("SELECT id_prodi,prodi FROM prodi");
								while ($dprodi = mysql_fetch_assoc($prodi)) {
									?>
									<option value="<?php echo $dprodi['id_prodi'] ?>"><?php echo $dprodi['prodi'] ?></option>
									<?php
								}
								?>
							</select>
							</form>
						</div>

						<div class="form-group">
							<p>*Mohon pilih Prodi terlebih dahulu</p>
						</div>

						<div class="form-group">
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
					</div>
					<br>

					<div class="col-lg-12 col-sm-12">
						<table class='display' id='kuisc'>
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
								$kuisc = mysql_query("
													SELECT
														alumni_daftar.nim,
														alumni_daftar.nama_alumni,
														alumni_daftar.tahun_lulus,
														prodi.prodi,
														tb_c.id_alumni
													FROM
													    alumni_daftar
													    INNER JOIN prodi
													        ON (alumni_daftar.prodi = prodi.id_prodi)
													    INNER JOIN tb_c
													        ON (tb_c.id_alumni = alumni_daftar.id_alumni)
													WHERE alumni_daftar.prodi = '$_POST[prodi]'
													ORDER BY alumni_daftar.nim ASC");
							}else{
								$kuisc = mysql_query("
													SELECT
														alumni_daftar.nim,
														alumni_daftar.nama_alumni,
														alumni_daftar.tahun_lulus,
														prodi.prodi,
														tb_c.id_alumni
													FROM alumni_daftar
													    INNER JOIN prodi
													        ON (alumni_daftar.prodi = prodi.id_prodi)
													    INNER JOIN tb_c
													        ON (tb_c.id_alumni = alumni_daftar.id_alumni)
													ORDER BY alumni_daftar.nim ASC");
							}
							while($b=mysql_fetch_array($kuisc)){
							?>
							<tr>
			    				<td align="center"><?php echo"$no" ?></td>
			    				<td align="center"><?php echo"$b[nim]" ?></td>
			    				<td><?php echo"$b[nama_alumni]" ?></td>
			    				<td><?php echo $b['prodi']; ?></td>
								<td><?php echo $b['tahun_lulus']; ?></td>
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