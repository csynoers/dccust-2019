<?php
    foreach ($rows['karir'] as $key => $value) {
		$option= [];

		$option['jenis_lowongan']= '<option value="" disabled>-- Pilih Jenis Lowongan --</option>';
		foreach ($rows['jenis_lowongan'] as $key_jl => $value_jl) {
			$option['jenis_lowongan'] .= "<option value='{$value_jl->id}' ".($value->jenis_lowongan==$value_jl->id? 'selected' : NULL )."> {$value_jl->name}</option>";
		}

		$option['spesialisasi_pekerjaan']= '<option value="" disabled>-- Pilih Spesialisasi Kerja --</option>';
		foreach ($rows['spesialisasi_pekerjaan'] as $key_sp => $value_sp) {
			$option['spesialisasi_pekerjaan'] .= "<option value='{$value_sp->id_spes}' ".($value->id_spes==$value_sp->id_spes? 'selected' : NULL )."> {$value_sp->nama_spes}</option>";
		}
		
		$option['tingkat_jabatan']= '<option value="" disabled>-- Pilih Tingkat Jabatan --</option>';
		foreach ($rows['tingkat_jabatan'] as $key_tj => $value_tj) {
			$option['tingkat_jabatan'] .= "<option value='{$value_tj->id}' ".($value->tingkat_jabatan==$value_tj->id? 'selected' : NULL )."> {$value_tj->name}</option>";
		}
		
		$option['penempatan']= '<option value="" disabled>-- Pilih Kota --</option>';
		foreach ($rows['penempatan'] as $key_p => $value_p) {
			$option['penempatan'] .= "<option value='{$value_p->propinsi_id}' ".($value->lokasi==$value_p->propinsi_id? 'selected' : NULL )."> {$value_p->propinsi_name}</option>";
		}

        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <H4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Informasi Lowongan</H4>
                    </div>
                    <div class='panel-body'>
                        <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store'>
                            <div class='container-fluid'>
                                <div class='form-group'>
                                    <label for='judul'>Judul :</label>
                                    <input name='judul_karir' type='text' value='{$value->judul_karir}' class='form-control' required>
								</div>
								<div class='row'>
									<div class='col-sm-6'>
										<div class='form-group'>
											<label>Perusahaan :</label>
											<input class='form-control' name='perusahaan_karir' type='text' value='{$value->perusahaan_karir}' required>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='form-group'>
											<label>Jenis Lowongan :</label>
											<select name='jenis_lowongan' class='form-control' required>
												{$option['jenis_lowongan']}
											</select>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='form-group'>
											<label>Spesialisasi Pekerjaan :</label>
											<select name='id_spes' class='form-control'>
												{$option['spesialisasi_pekerjaan']}
											</select>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='form-group'>
											<label>Tingkat Jabatan :</label>
											<select  name='tingkat_jabatan' class='form-control'>
												{$option['tingkat_jabatan']}
											</select>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='form-group'>
											<label>Penempatan :</label>
											<select name='lokasi' class='form-control'>
												{$option['penempatan']}
											</select>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='form-group'>
											<label>Batas Akhir : </label>
											<input class='form-control' name='deadline' type='date' value='{$value->deadline}'>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<label>Deskripsi</label>
									<textarea name='isi_karir'>{$value->isi_karir}</textarea>
								</div>
                                <div class='form-group'>
                                    <label for='thumbnail'>Thumbnail :</label>
                                    <img class='img-responsive' src='../joimg/karir/{$value->gambar}'>
                                </div>
                                <div class='form-group'>
                                    <label for='change_thumbnail'>Change Thumbnail :</label>
                                    <input type='file' name='gambar'>
                                </div>
                                <div class='form-group'>
                                    <div class='alert alert-info'>
                                        <strong>Info! </strong> File Type: *.jpg File Size: max-width:1024px.
                                    </div>
                                </div>
                            </div>

                            <input type='hidden' name='id_karir' value='{$value->id_karir}'>
                            <input type='hidden' name='operation' value='update'>
                            <button type='submit' class='btn btn-primary'>Update</button>
                            <button type='button' class='btn btn-primary' onclick='self.history.back()'>Back</button>
                        </form>
                    </div>
                </div>
            </div>
        ";
	}