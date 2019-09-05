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

	// Update slideshow
	if ($module=='slideshow' AND $act=='update'){
	  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
	  
		if(!empty($lokasi_file)){	  
			$tampil=mysql_query("SELECT * FROM slide WHERE id='$_POST[id]'");
			$ex=mysql_fetch_array($tampil);
			if($ex['gambar'] != ''){
				unlink("../../../joimg/slide/$ex[gambar]");
			}
			
			UploadSlide($nama_file_unik);
		  
			mysql_query("UPDATE slide SET 	judul_ina 	= '$_POST[judul_ina]',
											judul_en 	= '$_POST[judul_en]',
											isi_ina 	= '$_POST[isi_ina]',
											isi_en 		= '$_POST[isi_en]',
											link 		= '$_POST[link]',
											gambar		= '$nama_file_unik'
									WHERE id  = '$_POST[id]'");
		}else{
			mysql_query("UPDATE slide SET 	judul_ina 	= '$_POST[judul_ina]',
											judul_en 	= '$_POST[judul_en]',
											isi_ina 	= '$_POST[isi_ina]',
											isi_en 		= '$_POST[isi_en]',
											link 		= '$_POST[link]'
								WHERE id  = '$_POST[id]'");
		}
		header('location:../../media.php?module='.$module);
	}
	// Update Hapus Message
	if ($module=='slideshow' AND $act=='hapus'){	  
		$tampil=mysql_query("SELECT * FROM slide WHERE id='$_GET[id]'");
		$ex=mysql_fetch_array($tampil);
		
		if($ex['gambar'] != ''){
			unlink("../../../joimg/slide/$ex[gambar]");
			mysql_query("DELETE FROM slide WHERE id='$_GET[id]'");
		}else {
			mysql_query("DELETE FROM slide WHERE id='$_GET[id]'");
		}
		header('location:../../media.php?module='.$module);
	}

	// Update Tambah slideshow
	if ($module=='slideshow' AND $act=='insertnew'){  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
	  
		if(!empty($lokasi_file)){	  
			UploadSlide($nama_file_unik);
	  
			mysql_query("INSERT INTO slide(judul_ina,
										   judul_en,
										   isi_ina,
										   isi_en,
										   gambar,
										   link,
										   tanggal) 
								VALUES('$_POST[judul_ina]',
										'$_POST[judul_en]',
										'$_POST[isi_ina]',
										'$_POST[isi_en]',
										'$nama_file_unik',
										'$_POST[link]',
										 now() )");
		}else{
			mysql_query("INSERT INTO slide(judul_ina,
										   judul_en,
										   isi_ina,
										   isi_en,
										   link,
										   tanggal) 
								VALUES('$_POST[judul_ina]',
										'$_POST[judul_en]',
										'$_POST[isi_ina]',
										'$_POST[isi_en]',
										'$_POST[link]',
										 now() )");
		}
		header('location:../../media.php?module='.$module);
	}

}
?>
