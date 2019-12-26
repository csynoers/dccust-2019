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

	$aksi="modul/mod_hasil_tracer/aksi_hasil_tracer.php";
	$print = "modul/mod_hasil_tracer/aksi_export.php";
	$module="hasil-tarcer";

?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Hasil Tracer <?= $_GET['hasiltracer'] ?></h4>
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
							<p>*Mohon pilih Prodi terlebih dahulu untuk melakukan export data</p>
						</div>

						<div class="form-group">
							<?php 
							if ( ! empty($_POST['prodi'])) {
								echo '<a href="'.$print.'?prodi='.$_POST['prodi'].'&tahun='.$_GET['tahun'].'&idsetting='.$_GET['id'].'&title='.$_GET['hasiltracer'].'" class="btn btn-default">Export ke Excel</a>';
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
			    				<!-- <th>Action</th> --> 
							</tr> 
						</thead> 
						
						<tbody> 
						<?php
							$rows_setting = $db->get_select("SELECT * FROM settings WHERE settings.id='{$_GET['id']}' ")['data'];
							if ( count($rows_setting) > 0 ) {
								$where_in = "";
								foreach ($rows_setting as $key => $value) {
									$where_in = implode(',', json_decode($value->options));
								}

								if (isset($_POST['prodi'])) {
									$biodata = $db->get_select("
										SELECT *
										FROM tracer_studies AS ts 
											INNER JOIN tracer_studies_detail AS tsd
												ON tsd.tracer_study_id=ts.tracer_study_id
											INNER JOIN tracer_answers AS ta
												ON ta.question_id=tsd.tracer_study_detail_id
											LEFT JOIN alumni_daftar AS ad
												ON ad.nim=ta.nim
											LEFT JOIN prodi AS p
												ON p.id_prodi=ad.prodi
										WHERE ts.tracer_study_id IN ({$where_in}) AND ad.prodi='{$_POST['prodi']}' AND ad.tahun_lulus='{$_GET['tahun']}' GROUP BY ta.nim
									");
								}else{
									$biodata = $db->get_select("
										SELECT *
										FROM tracer_studies AS ts 
											INNER JOIN tracer_studies_detail AS tsd
												ON tsd.tracer_study_id=ts.tracer_study_id
											INNER JOIN tracer_answers AS ta
												ON ta.question_id=tsd.tracer_study_detail_id
											LEFT JOIN alumni_daftar AS ad
												ON ad.nim=ta.nim
											LEFT JOIN prodi AS p
												ON p.id_prodi=ad.prodi
										WHERE ts.tracer_study_id IN ({$where_in}) AND ad.tahun_lulus='{$_GET['tahun']}' GROUP BY ta.nim
									");
								}

								$no=1;	
								foreach ($biodata['data'] as $key => $value) {
									?>
									<tr>  
										<td align="center"><?= $no ?></td> 
										<td align="center"><?= $value->nim ?></td> 
										<td><?= $value->nama_alumni ?></td>
										<td><?= $value->prodi ?></td>
										<td><?= $value->tahun_lulus ?></td>
										<!-- <td align="center">
											<a href="<?php // echo "$aksi?module=$module&act=hapus&id=$b->id_alumni";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
										</td>  -->
									</tr>
									<?php $no++;
								}							
							} ?>
						</tbody> 
					</table>
					
				</div>
			</div>
			</div>
		</div>
	</div>