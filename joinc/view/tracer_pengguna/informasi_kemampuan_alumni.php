<section id="featured">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="row" style="margin-bottom: 46px;">
					<div class="bawah">
						<center><h3><span style="color: #009a54;;" data-mce-mark="1">Tracer Pengguna</span></h3></center>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="text-white">D. Informasi Kemampuan Alumni</h4>
					</div>
					<div class="panel-body">
						<form method="POST" action="tracer-informasi-kemampuan-alumni.html">
							<br>
							<div class="col-lg-12">
								<table class="table table-hover">
									<thead>
										<tr>
											<th rowspan="2">No</th>
											<th rowspan="2">Jenis Kemampuan</th>
											<th colspan="4" class="text-center">Tanggapan Pihak Pengguna</th>
										</tr>
										<tr>
											<th>Sangat Baik</th>
											<th>Baik</th>
											<th>Cukup</th>
											<th>Kurang</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data['kemampuan'] as $key => $value) { ?>
											<tr class="data-kemampuan">
												<td class="data-key" data-key="<?php echo $key ?>"><?php echo $key ?></td>
												<td><?php echo $value ?></td>
												<td><input type="radio" class="options_<?php echo $key ?>" name="options_<?php echo $key ?>" required="" value="4"></td>
												<td><input type="radio" class="options_<?php echo $key ?>" name="options_<?php echo $key ?>" required="" value="3"></td>
												<td><input type="radio" class="options_<?php echo $key ?>" name="options_<?php echo $key ?>" required="" value="2"></td>
												<td><input type="radio" class="options_<?php echo $key ?>" name="options_<?php echo $key ?>" required="" value="1"></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="col-lg-12">
								<label>Masukan apakah yang ingin Bapak/Ibu sampaikan kepada Program Srudi Almamater lulusan kami untuk peningkatan mutu lulusan ?</label>
								<div class="form-group">
									<textarea required="" rows="5" name="pesan_studi" class="form-control"></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="text-center">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="button" class="back btn btn-primary">Previous</button>
								</div>
							</div>
							
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	(function(j){
		if (sessionStorage.length > 0 ) {
			if (sessionStorage.kemampuan !=null ) {
				var obj = JSON.parse(sessionStorage.kemampuan);
				j.each(obj.jenis_kemampuan,function(i,items){
					var select_options=j('.options_'+obj.jenis_kemampuan[i].id_kemampuan);
					j.each(select_options,function(){
						if (j(this).val()==obj.jenis_kemampuan[i].id_tanggapan) {
							j(this).attr("checked", "checked");
							// console.log(j(this).val()+'='+obj.jenis_kemampuan[i].id_tanggapan);
						}
					});
				});
				j('textarea[name=pesan_studi]').val(obj.pesan_studi);
				submit();	
			}

		}
		submit();
		j('.back').on('click',function(){
			location.assign('tracer-informasi-umum.html');
			// submit();
		});

		function submit(){
			j('form').submit(function(){
				var data_jenis_kemampuan=j('.data-kemampuan');
				var jenis_kemampuan=[];
				j.each(data_jenis_kemampuan,function(){
					var keys= j(this).find('.data-key').attr('data-key');
					var options= j(this).find('.options_'+keys+':checked').val();
					// var data_asal_program_studi= j(this).find('.asal_program_studi');
					jenis_kemampuan.push( {id_kemampuan: keys,id_tanggapan: options} );
				});

				var kemampuan={
					"jenis_kemampuan":jenis_kemampuan,
					"pesan_studi":j('textarea[name=pesan_studi]').val(),
				};
				sessionStorage.setItem('kemampuan', JSON.stringify(kemampuan));
				// alert(j('.lembaga_options').val());
				save_tracer();
			});
		// console.log(kemampuan);
		}
		function save_tracer(){
			if (sessionStorage.length > 0 ) {
				if ( sessionStorage.length === 4 ) {
					console.log(sessionStorage);
					var identitas_lembaga 	= JSON.parse(sessionStorage.identitas_lembaga);
					var identitas_pengisi 	= JSON.parse(sessionStorage.identitas_pengisi);
					var informasi_umum 		= JSON.parse(sessionStorage.informasi_umum);
					var kemampuan 			= JSON.parse(sessionStorage.kemampuan);
					var data 				= {
						tracer_title: JSON.stringify(identitas_pengisi.nama_alumni),
						tracer_desc: JSON.stringify(sessionStorage),
						tracer_prop: identitas_lembaga.lembaga_provinsi,
						tracer_kab: identitas_lembaga.lembaga_kabupaten,
						tracer_usaha: identitas_lembaga.lembaga_options,
					};
					console.log(data);
					j.post("proses-tracer-pengguna.html", {data:data}, function(result){
				        // console.log(result);
				        if (result=='success') {
				        	alert('Terima Kasih Sudah Meluangkan Waktunya Untuk Melakukan Tracer Pengguna DCC UST.');
				        	location.assign('home-dccustjogja.html');
				        }
					});
					
					
				}

			}
		}
	})(jQuery)
</script>