<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<link href='style.css' rel='stylesheet' type='text/css'>
	<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
	include "../../../josys/dbHelper.php";
	include "../../../josys/fungsi_input.php";

	$db= new dbHelper();
	$module = $_GET['module'];
	$act 	= empty($_GET['act'])? 'null': $_GET['act'];

	switch ($act) {
		case 'insert':
			# code...
			$data['post']=[
				'users_email'=>input(cleanInput('email')),
				'users_password'=>md5(input(cleanInput('password'))),
				'users_desc'=>json_encode(['nama_perusahaan'=>input(cleanInput('nama_perusahaan')),'text_users_level'=>input(cleanInput('password'))]),
				'users_level'=>'tracer-pengguna',
				'users_status'=>'false',
			];
			$data['cek']= $db->get_select("SELECT * FROM user WHERE users_email='{$data["post"]["users_email"]}' ");
			if ( count($data['cek']['data']) > 0 ) {
				// echo "true";
				echo "<script>alert('Maaf username Sudah Digunakan');window.history.go(-1)</script>";
			}else{
				// echo "false";
				$data['insert']= $db->insert($table='user', $columnsArray=$data['post'], $requiredColumnsArray=array('users_email','users_password','users_desc','users_level','users_status'));
				// $data['insert']= mysql_query("INSERT INTO user(users_email,users_password,users_desc,users_level,users_status) VALUES('{$data["post"]["users_email"]}','{$data["post"]["users_password"]}','{$data["post"]["users_level"]}','{$data["post"]["users_status"]}')");
				if ($data['insert']['status']=='success') {
					echo "<script>alert('Data berhasil disimpan');window.history.go(-1)</script>";
				}
			}
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			break;
		case 'hapus':
			$data['get']=[
				'module'=>input('module'),
				'act'=>input('act'),
				'id'=>input('id'),
			];
			$data['delete']= $db->delete( $table='user', $where=array('users_id'=>$data["get"]["id"]) );
			if ($data['delete']['status']=='success') {
				echo "<script>alert('Data berhasil dihapus');window.history.go(-1)</script>";
			}
			// echo "<pre>";
			// print_r($data);
			break;
		case 'update':
			# code...
			$data['post']=[
				'users_email'=>input(cleanInput('email')),
				'users_password'=>md5(input(cleanInput('password'))),
				'users_desc'=>json_encode(['nama_perusahaan'=>input(cleanInput('nama_perusahaan')),'text_users_level'=>input(cleanInput('password'))]),
			];
			$data['update']= $db->update($table='user', $columnsArray=$data['post'], $where=array( 'users_id'=>input(cleanInput('id')) ), $requiredColumnsArray=array('users_email','users_password','users_desc'));
			if ($data['update']['status']=='success' || $data['update']['status']=='warning') {
				echo "<script>alert('Data berhasil diupdate');window.history.go(-1)</script>";
			}
			// echo "<pre>";
			// print_r($data);
			// echo "<pre>";
			break;		
		default:
			# code...
			break;
	}

}
