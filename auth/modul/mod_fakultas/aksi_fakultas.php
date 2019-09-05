<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module = $_GET[module];
$act = $_GET[act];

// Hapus fakultas
if ($module=='fakultas' AND $act=='hapus'){
	$id = $_GET['id'];
	mysql_query("DELETE FROM fakultas WHERE id_fakultas = '$id'");
  header('location:../../media.php?module='.$module);
}
else{
  mysql_query("INSERT INTO fakultas (fakultas) VALUES ('$_POST[judul]')");
  header('location:../../media.php?module='.$module);
}

?>
