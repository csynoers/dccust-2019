<section id="featured">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="row" style="margin-bottom: 46px;">
					<div class="bawah">
						<center><h3><span style="color: #009a54;" data-mce-mark="1">Kuesioner</span></h3></center>
					</div>
					<!-- /.bawah -->

					<div class="bawah">
						<h5><span style="color: #009a54;" data-mce-mark="1">BIODATA</span></h5>
					</div>
					<!-- /.bawah -->

					<form method="post" action="aksi_biodata.html" id="contactfrm" role="form">
						<input type="hidden" name="prodi_id" value="<?php echo $a->id_prodi?>">
						<div class="col-sm-6 col-lg-6">
							<div class="form-group">
								<label for="name">1. Nama</label>
								<input type="text" class="form-control" name="nama" readonly value="<?php echo $a->nama_alumni; ?>">
							</div>

							<div class="form-group">
								<label for="name">3. Tahun Lulus</label>
								<input type="text" class="form-control" name="th_lulus" readonly value="<?php echo $a->tahun_lulus; ?>">
							</div>

							<div class="form-group">
								<label for="name">5. Nomor HP</label>
								<input type="telp" maxlength="15" class="form-control" name="no_hp" placeholder="081234567890" required>
							</div>

							<div class="form-group">
								<label for="name">7. Alamat Domisili</label>
								<textarea name="almt_domisili" class="form-control" rows="4" cols="30" placeholder="Masukan alamat domisili ..." required></textarea>
							</div>
						</div>
						<!-- /.col -->

						<div class="col-sm-6 col-lg-6">
							<div class="form-group">
								<label for="name">2. NIM</label>
								<input type="text" class="form-control" name="nim" readonly value="<?php echo $a->nim; ?>">
							</div>
							<div class="form-group">
								<label for="name">4. Program Studi</label>
								<input type="text" class="form-control" name="prodi" readonly value="<?php echo $a->prodi; ?>">
							</div>
							<div class="form-group">
								<label for="name">6. Email</label>
								<input type="text" class="form-control" name="email" required value="<?php echo $a->email; ?>">
							</div>
							<div class="form-group">
								<label for="name">8. Alamat KTP</label>
								<textarea name="almt_ktp" class="form-control" rows="4" cols="30" placeholder="Masukan alamat sesuai ktp ..." required></textarea>
							</div>
							<button name="submit" type="submit" class="btn btn-lg btn-primary pull-right" id="submit">Lanjutkan</button>
						</div>
						<!-- /.col -->
					</form>
					<!-- /.form -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</section>