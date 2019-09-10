<!-- <br> -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tambah Lowongan</b></h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=karir&act=insert&saving=1'>
				<div class="form-group" style="width: 50%">
					<label>Judul :</label>
					<input class="form-control" name="judul_karir" type="text" required="">
				</div>

				<div class="form-group" style="width: 50%">
					<label>Perusahaan :</label>
					<input class="form-control" name="perusahaan_karir" type="text" required="">
				</div>

				<div class="form-group" style="width: 50%">
					<label>Jenis Lowongan :</label>
					<select name="jenis_lowongan" class="form-control" required>
					<option value="">-- Pilih Jenis Lowongan --</option>
						<?php
						foreach ($jenis_lowongan as $key) {
							?>
							<option value="<?php echo $key->id ?>"> <?php echo $key->name ?></option>
							<?php
						}

						?>
					</select>
				</div>

				<div class="form-group" style="width: 50%">
					<label>Spesialisasi Pekerjaan :</label>
					<select name="spes" class="form-control" required>
					<option value="">-- Pilih Spesialisasi Kerja --</option>
						<?php
						foreach ($spesialisasi as $key) {
							?>
							<option value="<?php echo $key->id_spes ?>"> <?php echo $key->nama_spes ?></option>
							<?php
						}

						?>
					</select>
				</div>

				<div class="form-group" style="width: 50%">
					<label>Tingkat Jabatan :</label>
					<select name="tingkat_jabatan" class="form-control" required>
					<option value="">-- Pilih Tingkat Jabatan --</option>
						<?php
						foreach ($tingkat_jabatan as $key) {
							?>
							<option value="<?php echo $key->id ?>"> <?php echo $key->name ?></option>
							<?php
						}

						?>
					</select>
				</div>

				<div class="form-group" style="width: 50%">
					<label>Penempatan :</label>
					<select name="lokasi" class="form-control" required>
					<option value="">-- Pilih Kota --</option>
						<?php
						foreach ($kota as $key) {
							?>
							<option value="<?php echo $key->propinsi_id ?>"> <?php echo $key->propinsi_name ?></option>
							<?php
						}

						?>
					</select>
				</div>

				<div class="form-group" style="width: 50%">
					<label>Batas Akhir : </label>
					<input class="form-control" name="waktu" type="date" >
				</div>

				<div class="form-group">
					<label>Deskripsi</label>
					<div class="col-sm-12">
						<textarea name="isi_karir" id="jogmceX"></textarea>
					</div>
				</div>

                <div class="form-group">
                	<label>Thumbnail</label>
					<input type="file" name="fupload" size=40>
				</div>

	            <div class="panel-footer">
	            	<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Publish</button>
					<button type="button" onclick="self.history.back()" class="btn btn-info"><i class="fa fa-backward" aria-hidden="true"></i> Back</button>
	            </div>
			</form>
			
		</div>
	</div>
</div>