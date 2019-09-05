<br>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Lowongan</h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action="?module=karir&act=edit&saving=1&id=<?php echo $id ?>">
				<div class="form-group" style="width: 50%">
					<label>Judul :</label>
					<input class="form-control" name="judul_karir" type="text" required="" value="<?php echo $edit_career->judul ?>">
				</div>

				<div class="form-group" style="width: 50%">
					<label>Perusahaan :</label>
					<input class="form-control" name="perusahaan_karir" type="text" required="" value="<?php echo $edit_career->perusahaan ?>">
				</div>

				<div class="form-group" style="width: 50%">
					<label>Jenis Lowongan :</label>
					<select name="jenis_lowongan" class="form-control" required>
					<option value="<?php echo $edit_career->id_jenis_lowongan ?>"><?php echo $edit_career->jenis_lowongan ?></option>
					<option value="">-- Pilih Jenis Lowongan --</option>
						<?php
						foreach ($jenis_lowongan as $key) {
							?>
							<option value="<?php echo $key['id'] ?>"> <?php echo $key['name'] ?></option>
							<?php
						}

						?>
					</select>
				</div>

				<div class="form-group" style="width: 50%">
					<label>Spesialisasi Pekerjaan :</label>
					<select name="spes" class="form-control">
					<option value="">-- Pilih Spesialisasi Kerja --</option>
					<option selected="" value="<?php echo $edit_career->id_spesialisasi_pekerjaan ?>"><?php echo $edit_career->spesialisasi_pekerjaan ?></option>
						<?php
						foreach ($spesialisasi as $key) {
							?>
							<option value="<?php echo $key['id_spes'] ?>"> <?php echo $key['nama_spes'] ?></option>
							<?php
						}

						?>
					</select>
				</div>

				<div class="form-group" style="width: 50%">
					<label>Tingkat Jabatan :</label>
					<select  name="tingkat_jabatan" class="form-control">
					<option value="">-- Pilih Tingkat Jabatan --</option>
					<option selected="" value="<?php echo $edit_career->id_tingkat_jabatan ?>"><?php echo $edit_career->tingkat_jabatan ?></option>
						<?php
						foreach ($tingkat_jabatan as $key) {
							?>
							<option value="<?php echo $key['id'] ?>"> <?php echo $key['name'] ?></option>
							<?php
						}

						?>
					</select>
				</div>

				<div class="form-group" style="width: 50%">
					<label>Penempatan :</label>
					<select name="lokasi" class="form-control">
					<option value="">-- Pilih Kota --</option>
					<option selected="" value="<?php echo $edit_career->id_penempatan ?>"><?php echo $edit_career->penempatan ?></option>
						<?php
						foreach ($kota as $key) {
							?>
							<option value="<?php echo $key['propinsi_id'] ?>"> <?php echo $key['propinsi_name'] ?></option>
							<?php
						}

						?>
					</select>
				</div>

				<div class="form-group" style="width: 50%">
					<label>Batas Akhir : </label>
					<input class="form-control" name="waktu" type="date" value="<?php echo $edit_career->batas_akhir ?>">
				</div>

				<div class="form-group">
					<label>Deskripsi</label>
					<div class="col-sm-12">
						<textarea name="isi_karir" id="jogmceX"><?php echo $edit_career->deskripsi ?></textarea>
					</div>
				</div>

	            <div class="form-group">
	            	<label>Thumbnail</label><br>
	            	<img width="256px" class="img-thumbnail" src="../joimg/karir/<?php echo $edit_career->thumbnail ?>"><br>
					<label>Change Thumbnail</label>
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