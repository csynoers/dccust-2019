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
		case 'hapus':
			$data['get']=[
				'module'=>input('module'),
				'act'=>input('act'),
				'id'=>input('id'),
			];
			$data['delete']= $db->delete( $table='tracer_pengguna', $where=array('tracer_id'=>$data["get"]["id"]) );
			if ($data['delete']['status']=='success') {
				echo "<script>alert('Data berhasil dihapus');window.history.go(-1)</script>";
			}
			// echo "<pre>";
			// print_r($data);
			break;
				
		default:
			# code...
			break;
	}

}
