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
						<h4 class="text-white text-uppercase">A. Identitas Pengisi</h4>
					</div>
					<div class="panel-body">
						<form method="POST" action="tracer-identitas-lembaga.html">
							<input type="hidden" name="act" value="identitas-lembaga">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="nama">Nama :</label>
									<input type="text" name="nama" class="form-control" placeholder="masukan nama *" required="" value="<?php echo !empty($_SESSION['identitas-pengisi'])? $_SESSION['identitas-pengisi']['nama_alumni'] : '' ;?>">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="nama">Jabatan :</label>
									<input type="text" name="jabatan" class="form-control" placeholder="masukan jabatan *" required="" value="<?php echo !empty($_SESSION['identitas-pengisi'])? $_SESSION['identitas-pengisi']['jabatan_alumni'] : '' ;?>">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="nama">Email :</label>
									<input type="email" name="email" class="form-control" placeholder="example@gmail.com" required="" value="<?php echo !empty($_SESSION['identitas-pengisi'])? $_SESSION['identitas-pengisi']['email_alumni'] : '' ;?>">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="nama">No Telp :</label>
									<input type="text" name="no_telp" class="form-control" placeholder="+6281 2345 6789" required="" value="<?php echo !empty($_SESSION['identitas-pengisi'])? $_SESSION['identitas-pengisi']['no_telp_alumni'] : '' ;?>">
								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="next btn btn-primary">Next</button>
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
		j('form').submit(function(){
			var identitas_pengisi={
				"nama_alumni":j('input[name=nama]').val(),
				"jabatan_alumni":j('input[name=jabatan]').val(),
				"email_alumni":j('input[name=email]').val(),
				"no_telp_alumni":j('input[name=no_telp]').val(),
			};
			sessionStorage.setItem('identitas_pengisi', JSON.stringify(identitas_pengisi));
		});

		// sessionStorage.clear();
		if (sessionStorage.length > 0 ) {
			if (sessionStorage.identitas_pengisi.length > 0 ) {
				var obj = JSON.parse(sessionStorage.identitas_pengisi);
				j('input[name=nama]').val(obj.nama_alumni);
				j('input[name=jabatan]').val(obj.jabatan_alumni);
				j('input[name=email]').val(obj.email_alumni);
				j('input[name=no_telp]').val(obj.no_telp_alumni);
				// console.log(obj);
				
			}

		}


	})(jQuery)
</script>
