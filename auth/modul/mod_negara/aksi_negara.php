<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module = $_GET[module];
$act = $_GET[act];

// Hapus negara
if ($module=='negara' AND $act=='hapus'){
	$id = $_GET['id'];
	mysql_query("DELETE FROM negara WHERE id_negara = '$id'");
  header('location:../../media.php?module='.$module);
}
else{
  mysql_query("INSERT INTO negara (negara) VALUES ('$_POST[judul]')");
  header('location:../../media.php?module='.$module);
}

?>
