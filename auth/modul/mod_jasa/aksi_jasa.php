<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus jasa
if ($module=='jasa' AND $act=='hapus'){

	$id = $_GET['id'];

	
	mysql_query("DELETE FROM jasa WHERE id_jasa='$id'");
	
	
	header('location:../../media.php?module='.$module);
}

// Input jasa
elseif ($module=='jasa' AND $act=='input'){
	
    mysql_query("INSERT INTO jasa(id_jasa, jasa_pengiriman) VALUES ('$_POST[id]','$_POST[jasa_pengiriman]')");
  
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='jasa' AND $act=='update'){
    mysql_query("UPDATE jasa SET id_jasa = '$_POST[id]', jasa_pengiriman = '$_POST[jasa_pengiriman]' WHERE id_jasa = '$_POST[id]'");		
	
  header('location:../../media.php?module='.$module);
}
?>
