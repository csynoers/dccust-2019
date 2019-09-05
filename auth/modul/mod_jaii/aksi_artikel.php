<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus artikel
if ($module=='jaii' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM artikel WHERE id_artikel='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM artikel WHERE id_artikel='$_GET[id]'");
    unlink("../../../joimg/artikel/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM artikel WHERE id_artikel='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='jaii' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadArtikel($nama_file_unik);
    mysql_query("INSERT INTO artikel(nama_artikel_en,
									 nama_artikel_ina,
									 seo_en,
									 seo_ina,
									 isi_artikel_ina,
									 isi_artikel_en,
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
    mysql_query("INSERT INTO artikel(nama_artikel_en,
									nama_artikel_ina,
									 seo_en,
									 seo_ina,
									 isi_artikel_ina,
									 isi_artikel_en,
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
elseif ($module=='jaii' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM artikel WHERE id_artikel='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/artikel/$ex[gambar]");
		}
	
	UploadArtikel($nama_file_unik);
  
    mysql_query("UPDATE artikel SET nama_artikel_en 	= '$_POST[judul_en]',
								   nama_artikel_ina 	= '$_POST[judul_ina]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_artikel_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_artikel_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."',
									tanggal			= NOW(),
									gambar			= '$nama_file_unik'
									WHERE id_artikel  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE artikel SET nama_artikel_en 	= '$_POST[judul_en]',
								   nama_artikel_ina 	= '$_POST[judul_ina]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_artikel_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									tanggal			= NOW(),
									isi_artikel_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."'
									WHERE id_artikel  ='$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='jaii' AND $act=='updatejaii'){
mysql_query("UPDATE modul SET		static_content_en 		= '".mysql_real_escape_string($_POST['deskripsi_en'])."',
									static_content_ina 	= '".mysql_real_escape_string($_POST['deskripsi_ina'])."'
									WHERE id_modul  ='$_POST[ids]'");
 header('location:../../media.php?module='.$module);
}
?>
