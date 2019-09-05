<?php
date_default_timezone_set( "Asia/Jakarta" );
include "../../../josys/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus alumni
if ($module=='kuise' AND $act=='hapus'){

	$id = $_GET['id'];
	mysql_query("DELETE FROM tb_e WHERE id_alumni = '$id'");
	header('location:../../media.php?module='.$module);
}
?>
