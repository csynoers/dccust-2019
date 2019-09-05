<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module = $_GET[module];
$act = $_GET[act];

// Hapus prodi
if ($module=='prodi' AND $act=='hapus'){
  $id = $_GET['id'];
  mysql_query("DELETE FROM prodi WHERE id_prodi = '$id'");
  header('location:../../media.php?module='.$module);
}
else{
 mysql_query("INSERT INTO prodi (id_fakultas,prodi) VALUES ('$_POST[fakultas]','$_POST[judul]')");
  header('location:../../media.php?module='.$module);
}

?>
