	<style type="text/css" title="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
	$(document).ready( function () {
	     var oTable = $('#kuisa').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );		
	} );
	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>

		
<?php

	$aksi="modul/mod_kuisa/aksi_kuisa.php";
	$print = "modul/mod_kuisa/aksi_export.php";
	$module="kuisa";

?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Hasil A. Metode Pembelajaran</h4>
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
									$rows = $db->get_select("SELECT id_prodi,prodi FROM prodi");
									foreach ($rows['data'] as $key => $value) {
										?>
										<option value="<?php echo $value->id_prodi ?>"><?php echo $value->prodi ?></option>
										<?php
									}
									?>
								</select>
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
						</form>
					</div>

					<div class="col-lg-12 col-sm-12">
						<table class='display' id='kuisa'> 
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
									$kuisa = mysql_query("
													SELECT
															alumni_daftar.nim,
															alumni_daftar.nama_alumni,
															alumni_daftar.tahun_lulus,
															prodi.prodi,
															tb_a.id_alumni
													FROM
													    alumni_daftar
													    INNER JOIN prodi 
													        ON (alumni_daftar.prodi = prodi.id_prodi)
													    INNER JOIN tb_a 
													        ON (tb_a.id_alumni = alumni_daftar.id_alumni)
													WHERE alumni_daftar.prodi = '$_POST[prodi]'
													ORDER BY alumni_daftar.nim ASC
													");
								}else{
									$kuisa = mysql_query("
														SELECT
															alumni_daftar.nim,
															alumni_daftar.nama_alumni,
															alumni_daftar.tahun_lulus,
															prodi.prodi,
															tb_a.id_alumni

														FROM
														    alumni_daftar
														    INNER JOIN prodi 
														        ON (alumni_daftar.prodi = prodi.id_prodi)
														    INNER JOIN tb_a 
														        ON (tb_a.id_alumni = alumni_daftar.id_alumni)
														ORDER BY alumni_daftar.nim ASC
														");
								}
								
								while($b=mysql_fetch_assoc($kuisa)){
								?>
								<tr>  
				    				<td align="center"><?php echo "$no" ?></td> 
				    				<td align="center"><?php echo "$b[nim]" ?></td> 
				    				<td><?php echo "$b[nama_alumni]" ?></td>
				    				<td><?php echo "$b[prodi]" ?></td> 
									<td><?php echo "$b[tahun_lulus]" ?></td>
				    				<td align="center">
				    					<a href="<?php echo "$aksi?module=$module&act=hapus&id=$b[id_alumni]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
									</td> 
								</tr>

							<?php $no++; } ?>
								
								
							</tbody> 
						</table>
						
					</div>

					<br>
					<div class="clear"></div>
				</div>
				
			</div>
		</div>
	</div>