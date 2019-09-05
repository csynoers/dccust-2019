<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus berita
if ($module=='merdeka' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT * FROM guru_merdeka WHERE id='$id'"));
	if($cek['nama_file']!=''){
	mysql_query("DELETE FROM guru_merdeka WHERE id='$_GET[id]'");
    unlink("../../../files/berita/$cek[nama_file]");   
  } else { 
	mysql_query("DELETE FROM guru_merdeka WHERE id='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='merdeka' AND $act=='insertnew'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));
  switch($file_extension){
    case "pdf": $ctype="application/pdf"; break;
    case "exe": $ctype="application/octet-stream"; break;
    case "zip": $ctype="application/zip"; break;
    case "rar": $ctype="application/rar"; break;
    case "doc": $ctype="application/msword"; break;
    case "xls": $ctype="application/vnd.ms-excel"; break;
    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }

  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../media.php?module=guru_merdeka')</script>";
  }
  else{
    UploadFile($nama_file);
    mysql_query("INSERT INTO guru_merdeka(judul_ina,
									 judul_en,
									 isi_guru_merdeka_ina,
									 isi_guru_merdeka_en,
									 tanggal,
									 nama_file) 
                            VALUES('$_POST[judul_ina]',
									'$_POST[judul_en]',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									now(),
									'$nama_file')");
  }
  }
  else{
  mysql_query("INSERT INTO guru_merdeka(judul_ina,
									 judul_en,
									  isi_guru_merdeka_ina,
									 isi_guru_merdeka_en,
									 tanggal
									 ) 
                            VALUES('$_POST[judul_ina]',
									'$_POST[judul_en]',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									now())");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='merdeka' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $nama_file      = $_FILES['fupload']['name'];

	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM guru_merdeka WHERE id='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['nama_file'] != ''){
		unlink("../../../files/$ex[nama_file]");
		}
	
	UploadFile($nama_file);
  
    mysql_query("UPDATE guru_merdeka SET judul_en 	= '$_POST[judul_en]',
								   judul_ina 	= '$_POST[judul_ina]',
									isi_guru_merdeka_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_guru_merdeka_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."',
									tanggal			= NOW(),
									nama_file			= '$nama_file'
									WHERE id  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE guru_merdeka SET judul_en 	= '$_POST[judul_en]',
								   judul_ina 	= '$_POST[judul_ina]',
									isi_guru_merdeka_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									tanggal			= NOW(),
									isi_guru_merdeka_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."'
									WHERE id  ='$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}
?>
