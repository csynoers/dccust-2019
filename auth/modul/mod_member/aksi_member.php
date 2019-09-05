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
if ($module=='member' AND $act=='hapus'){
	
	
	mysql_query("DELETE FROM memberarea WHERE id_member='$_GET[id]'");
	
  header('location:../../media.php?module='.$module);
}
// Hapus pesan
if ($module=='member' AND $act=='update2'){
	
		mysql_query("UPDATE memberarea SET blokir = '$_POST[blokir]' 
                            WHERE id_member = '$_POST[id]'");
	
  header('location:../../media.php?module='.$module);
}


// Hapus pesan
if ($module=='member' AND $act=='password'){
	
		$password = $_POST['password'];
		$password_lama = $_POST['password_lama'];
		$pass = md5($_POST['password']);
		if($password == $password_lama){
			mysql_query("UPDATE memberarea SET password = '$pass' 
                            WHERE id_member = '$_POST[id]'");
			
			header('location:../../media.php?module='.$module);
		}else{echo"<script type='text/javascript'>alert('Password yang anda masukkan salah. Coba lagi!'); history.go(-1) </script>";}
	
}


}
?>
