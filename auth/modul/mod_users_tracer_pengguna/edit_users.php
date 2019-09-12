<?php 
	require_once "../../../josys/koneksi.php";
	require_once "../../../josys/dbHelper.php";
	include "../../../josys/fungsi_input.php";
	
	$db= new dbHelper($db_config);
	$data=array();
	$data['post']=['users_id'=>input('id')];
	$data['users']= $db->select($table='user',$where=$data['post']);
	$users_desc=json_decode($data['users']['data'][0]->users_desc);
	echo '
		<form method="POST" action="modul/mod_users_tracer_pengguna/aksi_users_tracer_pengguna.php?module=users-tracer-pengguna&act=update">
			<input type="hidden" name="id" value="'.$data['post']['users_id'].'">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label>Nama Perusahaan</label>
						<input type="text" name="nama_perusahaan" class="form-control" placeholder="ex: PT Telkom" required="" value="'.$users_desc->nama_perusahaan.'">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Username</label>
						<input type="email" name="email" class="form-control" placeholder="Type Email ex: john@gmail.com" required="" value="'.$data['users']['data'][0]->users_email.'">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Password</label>
						<input type="text" name="password" class="form-control" placeholder="ex: xz4s2d45" required="" value="'.$users_desc->text_users_level.'">
					</div>
				</div>
				<div class="col-lg-2">
					<button type="submit" class="btn btn-primary form-control">Save</button>
				</div>
				<div class="col-lg-4">
					<button type="button" class="btn btn-primary form-control generate-password">Generate Password</button>
				</div>
			</div>
		</form>
	';
	// print_r($data);
?>