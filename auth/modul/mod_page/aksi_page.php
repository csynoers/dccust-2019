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
	include "../../../josys/fungsi_seo.php";

	$module=$_GET['module'];
	$act=$_GET['act'];

	// Hapus header
	if ($module=='overview' AND $act=='hapus'){
		
		$tampil=mysql_query("SELECT * FROM overview WHERE id='$_GET[id]'");
		$ex=mysql_fetch_array($tampil);
		
		if($ex['gambar'] != ''){
		unlink("../../../joimg/overview/$ex[gambar]");
		unlink("../../../joimg/overview/s_$ex[gambar]");
		mysql_query("DELETE FROM overview WHERE id='$_GET[id]'");
		}else {
		mysql_query("DELETE FROM overview WHERE id='$_GET[id]'");
		}
	  header('location:../../media.php?module='.$module);
	}


	// Update Page Room
	if ($module=='overview' AND $act=='update'){
	  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
	  
		$isi = mysql_real_escape_string($_POST['isi']);
	  
		if(!empty($lokasi_file)){
  
		$tampil=mysql_query("SELECT * FROM overview WHERE id='$_POST[id]'");
		$ex=mysql_fetch_array($tampil);
			if($ex['gambar'] != ''){
			unlink("../../../joimg/overview/$ex[gambar]");
			unlink("../../../joimg/overview/s_$ex[gambar]");
			}
		
		UploadOverview($nama_file_unik);
	  
		mysql_query("UPDATE overview SET 	nama			 	= '$_POST[nama]',
											isi					= '$isi',
											gambar				= '$nama_file_unik',
											tanggal				= now()
										WHERE id       	= '$_POST[id]'");
		}
		else{
		mysql_query("UPDATE overview SET 	nama		 	= '$_POST[nama]',
											isi				= '$isi',
											tanggal			= now()
										WHERE id       	= '$_POST[id]'");
		}
		header('location:../../media.php?module='.$module);
	}
	// Update
	if ($module=='overview' AND $act=='insertnew'){
	  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file;
		$isi = mysql_real_escape_string($_POST['isi']);
	  
		if(!empty($lokasi_file)){
	  
		UploadOverview($nama_file_unik);
	  
		mysql_query("INSERT INTO overview(nama,
										isi,
										tanggal,
										gambar)  
								VALUES('$_POST[nama]',
									   '$isi',
										now(),
										'$nama_file_unik' )");
		}
		else{
		mysql_query("INSERT INTO overview(nama,
										isi,
										tanggal) 
								VALUES('$_POST[nama]',
									   '$isi',
									   now() )");
		
		}
		
		
	  header('location:../../media.php?module='.$module);
	}

}
?>
