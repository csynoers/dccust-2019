<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";


$module=$_GET[module];
$act=$_GET[act];

// Hapus berita
if ($module=='file_alumni' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT * FROM alumni_file WHERE id_file='$id'"));
	if($cek['nama_file']!=''){
	mysql_query("DELETE FROM alumni_file WHERE id_file='$_GET[id]'");
    unlink("../../../joimg/file_alumni/$cek[nama_file]");   
  } else { 
	mysql_query("DELETE FROM alumni_file WHERE id_file='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}
// Ambil nama depan perusahaan

// Input header
elseif ($module=='file_alumni' AND $act=='insertnew'){
$a=mysql_query("SELECT * FROM alumni_daftar where id_alumni='$_POST[alumni]'");
$ambil=mysql_fetch_array($a);

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $ambil_file  = str_replace(" ","_",$ambil['username'].'_');
  $nama_file   = $ambil_file.$_FILES['fupload']['name'];
  
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
        window.location=('../../media.php?module=alumni')</script>";
  }
  else{
    UploadFileAlumni($nama_file);
    mysql_query("INSERT INTO alumni_file(nama,
									 id_alumni,
									 tgl,
									 nama_file) 
                            VALUES('$_POST[nama]',
									'$_POST[alumni]',
									now(),
									'$nama_file')");
  }
  }
  else{
  mysql_query("INSERT INTO alumni_file(nama,
									 id_alumni,
									 tgl
									 ) 
                            VALUES('$_POST[nama]',
									'$_POST[alumni]',
									now())");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='file_alumni' AND $act=='update'){
  $a1=mysql_query("SELECT * FROM alumni_daftar where id_alumni='$_POST[alumni]'");
  $ambil1=mysql_fetch_array($a1);

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $ambil_file  = str_replace(" ","_",$ambil1['username'].'_');
  $nama_file   = $ambil_file.$_FILES['fupload']['name'];

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
        window.location=('../../media.php?module=alumni')</script>";
  }else
	
	UploadFileAlumni($nama_file);
  
    mysql_query("UPDATE alumni_file SET nama			= '$_POST[nama]',
										id_alumni		= '$_POST[alumni]',
										nama_file		= '$nama_file',
										tgl				= NOW()
										WHERE id_file 	= '$_POST[id]'");
	}

	else{
	mysql_query("UPDATE alumni_file SET nama	= '$_POST[nama]',
										id_alumni		= '$_POST[alumni]',
										tgl				= NOW()
										WHERE id_file  ='17'");
	}
  header('location:../../media.php?module='.$module);
}
?>
