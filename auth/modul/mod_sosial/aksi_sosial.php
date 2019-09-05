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

	// Update sosial
	if ($module=='sosial' AND $act=='update'){
	  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
	  
		if(!empty($lokasi_file)){
	  
		$tampil=mysql_query("SELECT * FROM sosial WHERE id='$_POST[id]'");
		$ex=mysql_fetch_array($tampil);
			if($ex[gambar] != ''){
			unlink("../../../joimg/sosial/$ex[gambar]");
			}
		
		UploadSosial($nama_file_unik);
	  
		mysql_query("UPDATE sosial SET 	nama 	= '$_POST[name]',
										link 	= '$_POST[link]',
										gambar	= '$nama_file_unik',
										tanggal = now()
								WHERE id		= '$_POST[id]'");
		}
		else{
		mysql_query("UPDATE sosial SET 	nama 	= '$_POST[name]',
										link 	= '$_POST[link]',
										tanggal = now()
								WHERE id	    = '$_POST[id]'");
		}
	  header('location:../../media.php?module='.$module);
	}
	// Update sosial
	if ($module=='sosial' AND $act=='update2'){
	  	  
		mysql_query("UPDATE modul SET 	nama_modul 		= '$_POST[nama_modul]',
										static_content 	= '$_POST[static_content]'
								WHERE id_modul	    = '5'");
		header('location:../../media.php?module='.$module);
	}
	// Update Hapus Message
	if ($module=='sosial' AND $act=='hapus'){
	  
		$tampil=mysql_query("SELECT * FROM sosial WHERE id='$_GET[id]'");
		$ex=mysql_fetch_array($tampil);
		
		if($ex[gambar] != ''){
		unlink("../../../joimg/sosial/$ex[gambar]");
		mysql_query("DELETE FROM sosial WHERE id='$_GET[id]'");
		}else {
		mysql_query("DELETE FROM sosial WHERE id='$_GET[id]'");
		}
	  header('location:../../media.php?module='.$module);
	}

	// Update Tambah sosial
	if ($module=='sosial' AND $act=='insertnew'){	  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
	  
		if(!empty($lokasi_file)){
	  
		UploadSosial($nama_file_unik);
	  
		mysql_query("INSERT INTO sosial(nama,
										link,
										gambar,
										tanggal) 
								VALUES('$_POST[name]',
										'$_POST[link]',
										'$nama_file_unik',
										now())");
		}
		else{
		mysql_query("INSERT INTO sosial(nama,
										link,tanggal) 
								VALUES('$_POST[name]',
										'$_POST[link]',
										now())");
		}
		header('location:../../media.php?module='.$module);
	}

}
?>
