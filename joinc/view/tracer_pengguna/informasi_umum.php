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
						<h4 class="text-white">C. Informasi Umum</h4>
					</div>
					<div class="panel-body">
						<form method="POST" action="tracer-informasi-kemampuan-alumni.html">
							<br>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="lembaga_nama">Berapa julah lulusan kami yang bekerja di lembaga/perusahaan Anda? :</label>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="input-group col-lg-6">
									<input required="" id="" type="number" min="1" class="form-control jumlah_alumni" name="jumlah_alumni" placeholder="Number Only *">
									<span class="input-group-addon">orang</span>
								</div>
							</div>
							<div class="col-lg-12">
								<label>Nama Alumni Kami : </label>
								<table class="table table-hover">
									<thead>
										<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Asal Program Studi</th>
									</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td><input required="" type="text" class="form-control" name="" placeholder="input nama alumni *"></td>
											<td><input required="" type="text" class="form-control" name="" placeholder="input asal program studi alumni *"></td>
										</tr>
									</tbody>
								</table>
								<div class="text-center">
									<button type="submit" class="btn btn-primary">Next</button>
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
		j('.jumlah_alumni').keyup(function(){
			var count= j(this).val();
			var content='';
			// generate content
			for (i = 0; i < count; i++) {
				content += '<tr class="data-alumni"><td>'+(i+1)+'</td><td><input required="" type="text" class="form-control nama_alumni" name="nama_alumni" placeholder="input nama alumni '+(i+1)+' *"></td><td><input required="" type="text" class="form-control asal_program_studi" name="asal_program_studi" placeholder="input asal program studi alumni '+(i+1)+' *"></td></tr>';
			}
			j('.table').find('tbody').html(content);
			// generate content
		});
		submit();
		if (sessionStorage.length > 0 ) {
			if (sessionStorage.informasi_umum !=null ) {
				var obj = JSON.parse(sessionStorage.informasi_umum);
				j('input[name=jumlah_alumni]').val(obj.jumlah_alumni);
				var alumni = obj.daftar_alumni;

				var count= obj.jumlah_alumni;
				var content='';
				// generate content
				for (i = 0; i < count; i++) {
					content += '<tr class="data-alumni"><td>'+(i+1)+'</td><td><input required="" type="text" class="form-control nama_alumni" name="nama_alumni" placeholder="input nama alumni '+(i+1)+' *" value="'+alumni[i].nama_alumni+'" ></td><td><input required="" type="text" class="form-control asal_program_studi" name="asal_program_studi" placeholder="input asal program studi alumni '+(i+1)+' *" value="'+alumni[i].asal_program_studi+'"></td></tr>';
				}
				j('.table').find('tbody').html(content);
				// generate content
				submit();
				
			}

		}
		j('.back').on('click',function(){
			location.assign('tracer-identitas-lembaga.html');
		});
		function submit(){
			j('form').submit(function(){
				var data_alumni=j('.data-alumni');
				var nama_alumni=[];
				var data_asal_program_studi;
				j.each(data_alumni,function(){
					var data_nama_alumni= j(this).find('.nama_alumni');
					var data_asal_program_studi= j(this).find('.asal_program_studi');
					nama_alumni.push( {nama_alumni:data_nama_alumni.val(), asal_program_studi:data_asal_program_studi.val() } );
				});

				var informasi_umum={
					"jumlah_alumni":j('input[name=jumlah_alumni]').val(),
					"daftar_alumni":nama_alumni,
				};
				sessionStorage.setItem('informasi_umum', JSON.stringify(informasi_umum));
				// alert(j('.lembaga_options').val());
			});
		// console.log(sessionStorage);
		}
	})(jQuery)
</script>