	<style type="text/css" title="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
	$(document).ready( function () {
	     var oTable = $('#biodata').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );		
	} );
	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>

		
<?php

	$aksi="modul/mod_biodata/aksi_biodata.php";
	$print = "modul/mod_biodata/aksi_export.php";
	$module="biodata";

?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Hasil Biodata</h4>
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
								$rows = $db->get_select("SELECT id_prodi,prodi FROM prodi")['data'];
								foreach ($rows as $key => $dprodi) {
									?>
									<option value="<?php echo $dprodi->id_prodi ?>"><?php echo $dprodi->prodi ?></option>
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
					<table class='display' id='biodata'> 
						<thead> 
							<tr>  
			    				<th>No</th> 
			    				<th>NIM</th>
			    				<th>Nama Alumni</th> 
			    				<th>Prodi</th>
			    				<th>Tahun Lulus</th>
			    				<th>No HP</th>
			    				<th>Email</th>
			    				<th>Alamat Domisli</th>
			    				<th>Alamat KTP</th>
			    				<th>Action</th> 
							</tr> 
						</thead> 
						
						<tbody> 
						<?php 	
							$no=1;
							if (isset($_POST['prodi'])) {
								$biodata = $db->get_select("
												SELECT
														biodata.id_alumni,
														biodata.nim,
														biodata.nama,
														biodata.th_lulus,
														biodata.no_hp,
														biodata.email,
														biodata.almt_domisili,
														biodata.almt_ktp,
														prodi.prodi
												FROM biodata
												    INNER JOIN prodi 
												        ON (biodata.prodi = prodi.id_prodi)
												WHERE biodata.prodi = '$_POST[prodi]'
												ORDER BY biodata.nim ASC
												");
							}else{
								$biodata = $db->get_select("
													SELECT
														biodata.id_alumni,
														biodata.nim,
														biodata.nama,
														biodata.th_lulus,
														biodata.no_hp,
														biodata.email,
														biodata.almt_domisili,
														biodata.almt_ktp,
														prodi.prodi

													FROM biodata
													    INNER JOIN prodi 
													        ON (biodata.prodi = prodi.id_prodi)
													ORDER BY biodata.nim ASC
													");
							}
							
							foreach ($biodata['data'] as $key => $b) {
							?>
							<tr>  
			    				<td align="center"><?php echo "$no" ?></td> 
			    				<td align="center"><?php echo "$b->nim" ?></td> 
			    				<td><?php echo "$b->nama" ?></td>
			    				<td><?php echo "$b->prodi" ?></td> 
								<td><?php echo "$b->th_lulus" ?></td>
								<td><?php echo "$b->no_hp" ?></td>
								<td><?php echo "$b->email" ?></td>
								<td><?php echo "$b->almt_domisili" ?></td>
								<td><?php echo "$b->almt_ktp" ?></td>
			    				<td align="center">
			    					<a href="<?php echo "$aksi?module=$module&act=hapus&id=$b->id_alumni";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
								</td> 
							</tr>

						<?php $no++; } ?>
							
							
						</tbody> 
					</table>
					
				</div>
			</div>
			</div>
		</div>
	</div>