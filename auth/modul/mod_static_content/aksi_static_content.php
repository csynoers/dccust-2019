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

	// Update jasa
	if ($module=='static_content' AND $act=='update'){
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
	  
		$isi_ina = mysql_real_escape_string($_POST['isi_ina']);
		$isi_en  = mysql_real_escape_string($_POST['isi_en']);
		$gmap = $_POST['gmap'];
		if(!empty($lokasi_file)){
		$tampil=mysql_query("SELECT * FROM modul WHERE id_modul='$_POST[id]'");
		$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/statik/$ex[gambar]");
		}
	
	UploadStatik($nama_file_unik);
		mysql_query("UPDATE modul SET 	nama_modul_en			= '$_POST[nama_modul_en]',
										nama_modul_ina			= '$_POST[nama_modul_ina]',
										link					= '$_POST[link]',
										gambar					= '$nama_file_unik',
										static_content_en		= '$isi_en',
										static_content_ina		= '$isi_ina',
										tanggal					= NOW()
										WHERE id_modul 			= '$_POST[id]'");
		}
	else{
			mysql_query("UPDATE modul SET 	nama_modul_en			= '$_POST[nama_modul_en]',
										nama_modul_ina			= '$_POST[nama_modul_ina]',
										link					= '$_POST[link]',
										static_content_en		= '$isi_en',
										static_content_ina		= '$isi_ina',
										tanggal					= NOW()
										WHERE id_modul 			= '$_POST[id]'");
		}	
		header('location:../../media.php?module='.$module.'&id='.$id);
	
			$id = $_POST['id'];
			if($_POST['id']=='7')
			{	mysql_query("UPDATE modul SET extra  = '$gmap'
										 WHERE id_modul  = '$_POST[id]'") or die(mysql_error());
			header('location:../../media.php?module='.$module.'&id='.$id);
			}	
	}
}	
?>
