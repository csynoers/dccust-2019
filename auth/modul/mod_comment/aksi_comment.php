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
if ($module=='comment' AND $act=='hapus'){
	
	
	mysql_query("DELETE FROM comment WHERE id_komentar='$_GET[d]'");
	
  header('location:../../media.php?module='.$module.'&id='.$_GET['id']);
}
// Hapus pesan
if ($module=='comment' AND $act=='update2'){
	
		mysql_query("UPDATE comment SET aktif = '$_POST[aktif]' 
                            WHERE id_komentar = '$_POST[d]'");
	
  header('location:../../media.php?module='.$module.'&id='.$_POST['id']);
}


}
?>
