<?php
// date_default_timezone_set( "Asia/Jakarta" );
include "../../../josys/koneksi.php";
// include "../../../josys/library.php";
// include "../../../josys/fungsi_thumb.php";
// include "../../../josys/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus alumni
if ($module=='kuisb' AND $act=='hapus'){

	$id = $_GET['id'];
	mysql_query("DELETE FROM tb_b WHERE id_alumni = '$id'");
	$cek= mysql_fetch_assoc(mysql_query("SELECT * FROM tb_b23 WHERE id_alumni= '$id'"));
	if ($cek > 0) {
		// echo "string";
		// die();
		mysql_query("DELETE FROM tb_b23 WHERE id_alumni = '$id'");
	}
	header('location:../../media.php?module='.$module);
}
?>
