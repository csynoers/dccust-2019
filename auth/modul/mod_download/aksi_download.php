<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

@$module=$_GET[module];
@$act=$_GET[act];

// Hapus download
if ($module=='download' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT * FROM download WHERE id_download='$id'"));
	if($cek['nama_file']!=''){
	mysql_query("DELETE FROM download WHERE id_download='$_GET[id]'");
    unlink("../../../files/$cek[nama_file]");   
  } else { 
	mysql_query("DELETE FROM download WHERE id_download='$id'");
	}
	
  header('location:../../media.php?module='.$module);
}

// Input download
elseif ($module=='download' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tgl			= date("Y-m-d");
  // Apabila ada file yang diupload
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
        window.location=('../../media.php?module=download')</script>";
  }
  else{
    UploadFile($nama_file);
    mysql_query("INSERT INTO download(tanggal,judul,
                                    nama_file) 
                            VALUES('$tgl', '$_POST[judul]',
                                   '$nama_file')");
  header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysql_query("INSERT INTO download(tanggal, judul) VALUES('$tgl', '$_POST[judul]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update download
elseif ($module=='download' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila file tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE download SET judul     = '$_POST[judul]'
                             WHERE id_download = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
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
        window.location=('../../media.php?module=download')</script>";
  }
  else{
    UploadFile($nama_file);
    mysql_query("UPDATE download SET judul     = '$_POST[judul]',
                                   nama_file    = '$nama_file'   
                             WHERE id_download = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  }
}
?>
