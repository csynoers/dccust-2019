<?php
	foreach ($header as $key => $value) {
		echo "
		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
			<div class='panel panel-primary'>
				<div class='panel-heading'>
					<h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Header Buku Tamu</h4>
				</div>
				<div class='panel-body'>
					<form method='POST' enctype='multipart/form-data' action='?module=buku_tamu&act=update_header&saving=1'>
						<div class='container-fluid'>
							<input type='hidden' name='id' value='$value->id_header'>
							<div class='form-group'>
								<label for='judul'>Judul :</label>
								<input class='form-control' name='nama_header_ina' type='text' value='$value->nama_header_ina'>
							</div>
							<div class='form-group'>
								<label for='deskripsi'>Deskripsi :</label>
								<textarea name='isi_header_ina' id='jogmce'>$value->isi_header_ina</textarea>
							</div>
							<div class='form-group'>
								<label for='thumbnail'>Thumbnail :</label>
								<img class='img-responsive' src='../joimg/header_image/$value->gambar'>
							</div>
							<div class='form-group'>
								<label for='change_thumbnail'>Change Thumbnail :</label>
								<input type='file' name='fupload'>
							</div>
							<div class='form-group'>
								<div class='alert alert-info'>
									<strong>Info! </strong>File Type: *.jpg File Size: 1300x481 px.
								</div>
							</div>
						</div>
						<footer>
							<div class='submit_link'>
								<input type='submit' value='Update' class='alt_btn'>
								<input type='button' onclick='self.history.back()' value='Back'>
							</div>
						</footer>
					</form>
				</div>
			</div>
		</div>
			";
	}