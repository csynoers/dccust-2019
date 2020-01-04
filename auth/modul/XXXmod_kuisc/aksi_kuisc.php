<?php
date_default_timezone_set( "Asia/Jakarta" );
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus alumni
if ($module=='kuisc' AND $act=='hapus'){

	$id = $_GET['id'];
	mysql_query("DELETE FROM tb_c WHERE id_alumni = '$id'");
	// mysql_query("DELETE FROM tb_c2 WHERE id_alumni = '$id'");
	// mysql_query("DELETE FROM tb_c3 WHERE id_alumni = '$id'");
	// mysql_query("DELETE FROM tb_c10 WHERE id_alumni = '$id'");
	// mysql_query("DELETE FROM tb_c12 WHERE id_alumni = '$id'");
	header('location:../../media.php?module='.$module);
}
?>
