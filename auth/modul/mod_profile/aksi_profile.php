<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];



// Update header
if ($module=='profile' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM profile WHERE id_profile='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/profile/$ex[gambar]");
		}
	
	UploadProfile($nama_file_unik);
  
    mysql_query("UPDATE profile SET nama_profile_en 		= '$_POST[judul_en]',
									seo_en 					= '$judul_seo_en',
									seo_ina 				= '$judul_seo_ina',
									isi_profile_en 			= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_profile_ina 		= '".mysql_real_escape_string($_POST['isi_ina'])."',
									visi_profile_en 		= '".mysql_real_escape_string($_POST['visi_en'])."',
									visi_profile_ina 		= '".mysql_real_escape_string($_POST['visi_ina'])."',
									misi_profile_en 		= '".mysql_real_escape_string($_POST['misi_en'])."',
									misi_profile_ina 		= '".mysql_real_escape_string($_POST['misi_ina'])."',
									tanggal				= NOW(),
									gambar				= '$nama_file_unik'
									WHERE id_profile 	 = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE profile SET nama_profile_en 		= '$_POST[judul_en]',
								   nama_profile_ina 		= '$_POST[judul_ina]',
									seo_en 					= '$judul_seo_en',
									seo_ina 				= '$judul_seo_ina',
									isi_profile_en 			= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_profile_ina 		= '".mysql_real_escape_string($_POST['isi_ina'])."',
									visi_profile_en 		= '".mysql_real_escape_string($_POST['visi_en'])."',
									visi_profile_ina 		= '".mysql_real_escape_string($_POST['visi_ina'])."',
									misi_profile_en 		= '".mysql_real_escape_string($_POST['misi_en'])."',
									misi_profile_ina 		= '".mysql_real_escape_string($_POST['misi_ina'])."',
									
									tanggal					= NOW()
									WHERE id_profile 		='$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}
?>
