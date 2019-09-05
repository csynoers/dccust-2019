<?php
	// print_r($view_one['data']);
	foreach ($view_one['data'] as $key => $value) {

		echo "
		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
			<div class='panel panel-primary'>
				<div class='panel-heading'>
					<h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Buku Tamu</h4>
				</div>
				<div class='panel-body'>
					<form method='POST' enctype='multipart/form-data' action='?module=buku_tamu&act=edit&saving=1'>
						<div class='container-fluid'>
							<input type='hidden' name='id' value='$value->id'>
							<div class='form-group'>
								<label for='name'>Nama :</label>
								<input class='form-control' name='name' type='text' value='$value->name' disabled>
							</div>
							<div class='form-group'>
								<label for='email'>Email :</label>
								<input type='email' name='email' value='$value->email' class='form-control' disabled>
							</div>
							<div class='form-group'>
								<label for='pesan'>Pesan :</label>
								<div class='alert alert-info'>$value->message_fill</div>
							</div>
							<div class='form-group'>
								<label for='tanggal'>Tanggal :</label>
								<input class='form-control' type='text' name='tanggal' value='$value->date_send' disabled>
							</div>
							<div class='form-group'>
								<label for='post'>Tampilkan Ke Website :</label>
								<br>
								";
								if($value->status==1){
									echo "<label class='radio-inline'><input type='radio' name='opt' value='1' checked> YA </label>";
									echo "<label class='radio-inline'><input type='radio' name='opt' value='0'> TIDAK </label>";
								}else{
									echo "<label class='radio-inline'><input type='radio' name='opt' value='1' > YA </label>";
									echo "<label class='radio-inline'><input type='radio' name='opt' value='0' checked> TIDAK </label>";
								}
		echo "				</div>
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