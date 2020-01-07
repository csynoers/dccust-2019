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

	$aksi="modul/mod_tracer_pengguna/aksi_mod_tracer_pengguna.php";
	$print = "modul/mod_tracer_pengguna/aksi_export.php";
	$module="tracer-pengguna";
	$db= new dbHelper($db_config	);

	$data['bidang-usaha']=[
		'1'=>'Pertanian, Perburuan dan Kehutanan',
			'Perikanan',
			'Pertambangan dan Penggalian',
			'Industri Pengolahan',
			'Listrik, Gas dan Air',
			'Kontruksi',
			'Perdagangan Besar & Eceran: Reparasi, dan Keperluan Rumah Tangga',
			'Penyediaan Akomodasi dan Penyediaan Makan Minum',
			'Tranportasi, Pergudangan dan komunikasi',
			'Perantara Keuangann',
			'Real Estat, Usaha Persewaan dan Jasa Perusahaan',
			'Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial',
			'Jasa Pendidikan',
			'Jasa Kesehatan dan Kegiatan Sosial',
			'Jasa Kemasyarakatan, Sosial, dan Kegiatan Lainnya',
			'Jasa Perorangan',
			'Badan Internasional dan Badan Ekstra Internasional Lainya',
			'Kegiatan Yang Belum Jelas Batasannya',
	];

?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Hasil Tracer Pengguna</h4>
			</div>
			<div class="panel-body">
				
			<div id="tab1" class="row">
				<div class="col-lg-12 col-sm-6">
					<form action="" method="POST">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label>Pilih Bidang Usaha: </label>
									<select class="form-control" name="bidang_usaha">
										<option value=""> -- Pilih Bidang Usaha -- </option>
										<?php foreach($data['bidang-usaha'] AS $key => $value){?>
											<option value="<?php echo $key ?>"><?php echo $value ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Pilih Provinsi: </label>
									<select class="form-control lembaga_provinsi" name="lembaga_provinsi" ">
										<option value="" data-json=""> -- Pilih Provinsi -- </option>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Pilih Kabupaten: </label>
									<select class="form-control lembaga_kabupaten" name="lembaga_kabupaten">
										<option value=""> -- Pilih Kabupaten -- </option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<button type="button" class="btn btn-primary filter" title="Filter data">Filter</button>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<button type="button" class="btn btn-primary export" title="Mohon pilih Prodi terlebih dahulu untuk lebih spesifik">Export ke Excel</button>
							</div>
						</div>
					</form>
				<hr>
				</div>

				<div class="col-lg-12 col-sm-12 tracer-content">
					<table class="display" id="biodata"> 
						<thead> 
							<tr>  
			    				<th>No</th> 
			    				<th>Nama Alumni</th> 
			    				<th>Bidang Usaha</th> 
			    				<th>Provinsi</th> 
			    				<th>Kabupaten</th> 
			    				<th>Date</th> 
			    				<th>Action</th> 
							</tr>
						</thead> 
						
						<tbody> 
						<?php 	
							$no=1;
							$biodata = $db->get_select(" SELECT 
												tracer_pengguna.tracer_id,
												tracer_pengguna.tracer_title,
												tracer_pengguna.tracer_prop,
												tracer_pengguna.tracer_kab,
												tracer_pengguna.tracer_usaha,
												tracer_pengguna.tracer_timestamp,
												province.title AS province_title,
												city.title AS city_title
												FROM tracer_pengguna,province,city
												WHERE
													province.id_province=tracer_pengguna.tracer_prop
													AND city.id_city=tracer_pengguna.tracer_kab 
												ORDER BY tracer_pengguna.tracer_timestamp ASC
												");
							
							foreach($biodata['data'] AS $key => $b){
								// echo '<pre>';
								// print_r($b);
								// echo '</pre>';
								?>
							<tr>  
			    				<td align="center"><?php echo "$no" ?></td> 
			    				<td align="center"><?php echo json_decode($b->tracer_title) ?></td> 
								<td><?php echo $data['bidang-usaha'][ $b->tracer_usaha ] ?></td>
								<td><?php echo $b->province_title ?></td>
								<td><?php echo $b->city_title ?></td>
								<td><?php echo tanggal_indo($tanggal=date('Y-m-d',strtotime($b->tracer_timestamp)), $cetak_hari = true) ?></td>
			    				<td align="center">
			    					<a href="<?php echo "$aksi?module=$module&act=hapus&id=$b->tracer_id";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
								</td> 
							</tr>

						<?php $no++; } ?>
							
							
						</tbody> 
					</table>
					
				</div>
			</div>
				<hr>
			</div>
		</div>
	</div>

<script type="text/javascript">
	(function(j){
		var data;
		j.getJSON('../joinc/json/province_json.php',{format:'json'},function(json){
			j.each(json,function(i){
				j('.lembaga_provinsi').append('<option value="'+json[i].id_province+'">'+json[i].title+'</option>');
			});
			j('.lembaga_provinsi').on('change',function(){
				var id_propinsi= j(this).val();
				j.getJSON('../joinc/json/city_json.php',{format:'json'},function(json){
					var data_kab='<option value="" > -- Pilih Kabupaten -- </option>';
					j.each(json,function(i){
						if ( json[i].id_province== id_propinsi  ) {
							data_kab += '<option value="'+json[i].id_city+'">'+json[i].title+'</option>';
						}
					});
					j('.lembaga_kabupaten').html(data_kab);
				});
			});
		});

		// export actions
		j('.export').on('click',function(){exportData()});
		// filter actions
		j('.filter').on('click',function(){filterData()});

		// fungsi export data
		function exportData(){
			data= selectionData();
		    j.ajax({
		    	method: 'GET',
		    	data: data,
		    	url: "./modul/mod_tracer_pengguna/data.php",
		    	success: function(result){
		    		exportToExcel(result);
		    		// console.log(result)
		    	}
			});
		}
		// fungsi export data

		// fungsi filter data
		function filterData(){
			data= selectionData();
			j.ajax({
				method: 'GET',
				data: data,
				// beforeSend: function(){
				// 	console.log(data);
				// },
				cache: false,
		    	url: "./modul/mod_tracer_pengguna/filter_data.php",
		    	success: function(result){
		    		j('.tracer-content').html(result);
		    		var oTable = $('#biodata').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );
		    	}
			});

			// console.log(data);
		}
		// fungsi filter data

		// selection data
		function selectionData(){
			data={};
			j('select[name=bidang_usaha]').val()!=""?data['bidang_usaha']=j('select[name=bidang_usaha]').val() : data['bidang_usaha']='null' ;
			j('select[name=lembaga_provinsi] option:selected').val()!=""?data['lembaga_provinsi']=j('select[name=lembaga_provinsi] option:selected').val() : data['lembaga_provinsi']='null' ;
			j('select[name=lembaga_kabupaten] option:selected').val()!=""? data['lembaga_kabupaten']=j('select[name=lembaga_kabupaten] option:selected').val() : data['lembaga_kabupaten']='null' ;
			return data;
		}
		// selection data

		// export excel
		function exportToExcel(html){
		var htmls = "";
		            var uri = 'data:application/vnd.ms-excel;base64,';
		            var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><h2 align="center">KUISIONER PENELUSURAN PENGGUNA LULUSAN (USER)</h2><h2 align="center">UNIVERSITAS SARJANAWIYATA TAMANSISWA</h2><h3 align="center">JL. Kusumanegara No. 157 Yogyakarta</h3><table border=1>{table}</table></html>'; 
		            var base64 = function(s) {
		                return window.btoa(unescape(encodeURIComponent(s)))
		            };

		            var format = function(s, c) {
		                return s.replace(/{(\w+)}/g, function(m, p) {
		                    return c[p];
		                })
		            };

		            htmls = html

		            var ctx = {
		                worksheet : 'Worksheet',
		                table : htmls
		            }


		            var link = document.createElement("a");
		            link.download = "Data_tracer_pengguna.xls";
		            link.href = uri + base64(format(template, ctx));
		            link.click();
		}
		// export excel
	})(jQuery)

</script>