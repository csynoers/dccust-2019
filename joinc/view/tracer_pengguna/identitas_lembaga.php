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
						<h4 class="text-white text-uppercase">B. Identitas Lembaga/Perusahaan</h4>
					</div>
					<div class="panel-body">
						<form method="POST" action="tracer-informasi-umum.html">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="lembaga_nama">Nama :</label>
									<input type="text" name="lembaga_nama" class="form-control" placeholder="masukan nama lembaga *" required="" value="<?php echo !empty($_SESSION['identitas-lembaga'])? $_SESSION['identitas-lembaga']['lembaga_nama'] : '' ;?>">
								</div>
								<div class="form-group">
									<label for="lembaga_no_telp_faks">No. Telp/Faks :</label>
									<input type="text" name="lembaga_no_telp_faks" class="form-control" placeholder="masukan no. telp/faks lembaga *" required="" value="<?php echo !empty($_SESSION['identitas-lembaga'])? $_SESSION['identitas-lembaga']['lembaga_no_telp_faks'] : '' ;?>">
								</div>
								<div class="form-group">
									<label for="lembaga_alamat">Alamat :</label>
									<textarea rows="5" name="lembaga_alamat" class="form-control" placeholder="masukan alamat lengkap disini *" required=""><?php echo !empty($_SESSION['identitas-lembaga'])? $_SESSION['identitas-lembaga']['lembaga_alamat'] : '' ;?></textarea>
								</div>
								<div class="form-group">
									<label for="lembaga_provinsi">Provinsi :</label>
									<select name="lembaga_provinsi" class="form-control lembaga_provinsi" required="">
										<option value=""> -- Pilih Provinsi -- </option>
									</select>
								</div>
								<div class="form-group">
									<label for="lembaga_kabupaten">Kabupaten :</label>
									<select name="lembaga_kabupaten" class="form-control lembaga_kabupaten" required="">
										<option value=""> -- Pilih Kabupaten -- </option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<label>Bidang Usaha</label>
								<?php foreach ($data['bidang-usaha'] as $key => $value) { ?>
									<div class="radio">
										<label><input class="lembaga_options" type="radio" name="lembaga_options" required="" value="<?php echo $key?>"><?php echo $value ?></label>
									</div>
									
								<?php } ?>
							</div>
							<div class="text-center">
								<button type="submit" class="next btn btn-primary">Next</button>
								<button type="button" class="back btn btn-primary">Previous</button>
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
		// j.getJSON('joinc/json/province_json.php',{format:'json'},function(json){
		j.getJSON('joinc/json/province_json.php',function(json){
			j.each(json,function(i){
				j('.lembaga_provinsi').append('<option value="'+json[i].id_province+'" >'+json[i].title+'</option>');
				// console.log(json[i]);
			});
			j('.lembaga_provinsi').on('change',function(){
				var id_propinsi= j(this).val();
				j.getJSON('joinc/json/city_json.php',{format:'json'},function(json){
					var data_kab='<option value="" > -- Pilih Kabupaten -- </option>';
					j.each(json,function(i){
						if ( json[i].id_province== id_propinsi  ) {
							data_kab += '<option value="'+json[i].id_city+'" >'+json[i].title+'</option>';
							// console.log(json[i]);
						}
					});
					j('.lembaga_kabupaten').html(data_kab);
				});
			});
		});
		submit();
		// sessionStorage.clear();
		if (sessionStorage.length > 0 ) {
			if (sessionStorage.identitas_lembaga !=null ) {
				var obj = JSON.parse(sessionStorage.identitas_lembaga);
				j('input[name=lembaga_nama]').val(obj.lembaga_nama);
				j('input[name=lembaga_no_telp_faks]').val(obj.lembaga_no_telp_faks);
				j('textarea[name=lembaga_alamat]').val(obj.lembaga_alamat);
				// j('select[name=lembaga_provinsi][value='+obj.lembaga_provinsi+']').attr('selected','selected');
				j('select[name=lembaga_kabupaten]').val(obj.lembaga_kabupaten);
				j('input[name=lembaga_options][value='+obj.lembaga_options+']').attr("checked", "checked");
				// console.log(obj.lembaga_options);
				// console.log(obj);

				j.getJSON('joinc/json/province_json.php',{format:'json'},function(json){
					j.each(json,function(i){
						if (json[i].id==obj.lembaga_provinsi) {
							j('.lembaga_provinsi').append('<option selected value="'+json[i].id_province+'" >'+json[i].title+'</option>');
							
						}
					});
					j.getJSON('joinc/json/city_json.php',{format:'json'},function(json){
						var data_kab='<option value="" > -- Pilih Kabupaten -- </option>';
						j.each(json,function(i){
							if ( json[i].id_province== obj.lembaga_provinsi  ) {
								if (json[i].id_city==obj.lembaga_kabupaten) {
									data_kab += '<option selected value="'+json[i].id_city+'" >'+json[i].title+'</option>';
								}else{
									data_kab += '<option value="'+json[i].id_city+'" >'+json[i].title+'</option>';
								}
							}
						});
						j('.lembaga_kabupaten').html(data_kab);
					});
				});
				submit();
				
			}

		}

		function submit(){
			j('form').submit(function(){
				var identitas_lembaga={
					"lembaga_nama":j('input[name=lembaga_nama]').val(),
					"lembaga_no_telp_faks":j('input[name=lembaga_no_telp_faks]').val(),
					"lembaga_alamat":j('textarea[name=lembaga_alamat]').val(),
					"lembaga_provinsi":j('select[name=lembaga_provinsi]').val(),
					"lembaga_kabupaten":j('select[name=lembaga_kabupaten]').val(),
					"lembaga_options":j('.lembaga_options:checked').val(),
				};
				sessionStorage.setItem('identitas_lembaga', JSON.stringify(identitas_lembaga));
				// alert(j('.lembaga_options').val());
			});
		}

		j('.back').on('click',function(){
			location.assign('tracer-identitas-pengisi.html');
		});

	})(jQuery)
</script>