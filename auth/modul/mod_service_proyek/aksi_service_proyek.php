<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Proyek
if ($module=='proyek' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM service_proyek WHERE id_service_proyek='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM service_proyek WHERE id_service_proyek='$_GET[id]'");
    unlink("../../../joimg/service_proyek/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM service_proyek WHERE id_service_proyek='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='proyek' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadService_proyek($nama_file_unik);
    mysql_query("INSERT INTO service_proyek(nama_service_proyek_en,
									 nama_service_proyek_ina,
									 seo_en,
									 seo_ina,
									 isi_service_proyek_ina,
									 isi_service_proyek_en,
									 tanggal,
									 gambar) 
                            VALUES('$_POST[judul_en]',
									'$_POST[judul_ina]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									now(),
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO service_proyek(nama_service_proyek_en,
									nama_service_proyek_ina,
									 seo_en,
									 seo_ina,
									 isi_service_proyek_ina,
									 isi_service_proyek_en,
									 tanggal) 
                            VALUES('$_POST[judul_en]',
									'$_POST[judul_ina]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									now())");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='proyek' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM service_proyek WHERE id_service_proyek='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/service_proyek/$ex[gambar]");
		}
	
	UploadService_proyek($nama_file_unik);
  
    mysql_query("UPDATE service_proyek SET nama_service_proyek_en 	= '$_POST[judul_en]',
								   nama_service_proyek_ina 	= '$_POST[judul_ina]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_service_proyek_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_service_proyek_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."',
									tanggal			= NOW(),
									gambar			= '$nama_file_unik'
									WHERE id_service_proyek  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE service_proyek SET nama_service_proyek_en 	= '$_POST[judul_en]',
								   nama_service_proyek_ina 	= '$_POST[judul_ina]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_service_proyek_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									tanggal			= NOW(),
									isi_service_proyek_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."'
									WHERE id_service_proyek  ='$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}
?>
