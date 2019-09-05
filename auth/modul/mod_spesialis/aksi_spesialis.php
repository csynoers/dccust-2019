<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module = $_GET[module];
$act = $_GET[act];

// Hapus fakultas
if ($module=='spes' AND $act=='hapus'){
	$id = $_GET['id'];
	mysql_query("DELETE FROM spesialis WHERE id_spes = '$id'");
  header('location:../../media.php?module='.$module);
}
else{
  mysql_query("INSERT INTO spesialis (nama_spes) VALUES ('$_POST[nama_spes]')");
  header('location:../../media.php?module='.$module);
}

?>
