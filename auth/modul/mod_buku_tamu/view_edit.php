<?php
	foreach ($rows as $key => $value) {
		$status= '';
		if($value->status==1){
			$status .= "<label class='radio-inline'><input type='radio' name='status' value='1' checked> YA </label>";
			$status .= "<label class='radio-inline'><input type='radio' name='status' value='0'> TIDAK </label>";
		}else{
			$status .= "<label class='radio-inline'><input type='radio' name='status' value='1' > YA </label>";
			$status .= "<label class='radio-inline'><input type='radio' name='status' value='0' checked> TIDAK </label>";
		}
		echo "
		<div class='col-sm-12'>
			<div class='panel panel-primary'>
				<div class='panel-heading'>
					<h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Informasi Buku Tamu</h4>
				</div>
				<div class='panel-body'>
					<form method='POST' enctype='multipart/form-data' action='?module={$this->url->module}&act=store'>
						<div class='container-fluid'>
							<div class='form-group'>
								<label for='name'>Nama :</label>
								<input class='form-control' name='name' type='text' value='{$value->name}' disabled>
							</div>
							<div class='form-group'>
								<label for='email'>Email :</label>
								<input type='email' name='email' value='{$value->email}' class='form-control' disabled>
							</div>
							<div class='form-group'>
								<label for='pesan'>Pesan :</label>
								<div class='alert alert-info'>{$value->message_fill}</div>
							</div>
							<div class='form-group'>
								<label for='tanggal'>Tanggal :</label>
								<input class='form-control' type='text' name='tanggal' value='{$value->date_send_mod}' disabled>
							</div>
							<div class='form-group'>
								<label for='post'>Tampilkan Ke Website :</label>
								<br>
								{$status}	
							</div>
						</div>

						<input type='hidden' name='id' value='{$value->id}'>
						<input type='hidden' name='operation' value='update'>
						<button type='submit' class='btn btn-primary'>Update</button>
						<button type='button' class='btn btn-primary' onclick='self.history.back()'>Back</button>
					</form>
					
				</div>
			</div>
		</div>
				
				";
	}