<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../josys/koneksi.php";
include "../../../josys/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];


// Hapus
if ($module=='pesan' AND $act=='hapus'){
	
	
	mysql_query("DELETE FROM contact WHERE id='$_GET[id]'");
	
  header('location:../../media.php?module='.$module);
}
// Hapus pesan
if ($module=='pesan' AND $act=='update2'){
	
		mysql_query("UPDATE contact SET dibaca = '$_POST[aktif]' 
                            WHERE id       = '$_POST[id]'");
	
  header('location:../../media.php?module='.$module);
}


}
?>
