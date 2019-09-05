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
include "../../../josys/library.php";

$module=$_GET[module];
$act=$_GET[act];



// Hapus header
if ($module=='album' AND $act=='hapus'){
	
	$tampil=mysql_query("SELECT * FROM galeri WHERE id_album='$_GET[id]'");
	while ($ex=mysql_fetch_array($tampil)){
	if($ex['gambar'] != ''){
	unlink("../../../joimg/galeri/$ex[gambar]");}
	}
	
	$tampil=mysql_query("SELECT * FROM album WHERE id_album='$_GET[id]'");
	$ex=mysql_fetch_array($tampil);
	
	if($ex[gambar] != ''){
	unlink("../../../joimg/album/$ex[gambar]");
	mysql_query("DELETE FROM album WHERE id_album='$_GET[id]'");
	mysql_query("DELETE FROM galeri WHERE id_album='$_GET[id]'");
	}else {
	mysql_query("DELETE FROM album WHERE id_album='$_GET[id]'");
	mysql_query("DELETE FROM galeri WHERE id_album='$_GET[id]'");
	}
  header('location:../../media.php?module='.$module);
}


// Update
if ($module=='album' AND $act=='update'){
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo      = seo_title($_POST[nama]);
  
	if(!empty($lokasi_file)){
	
	if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/gif" AND $tipe_file != "image/png"){?>
    <script>window.alert("Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.GIF, *.PNG");
        window.location=("../../media.php?module=<?php echo $module.'&act=edit&id='.$_POST['id'] ?>")</script>;
    <?php die();}
  
	$tampil=mysql_query("SELECT * FROM album WHERE id_album='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex[gambar] != ''){
		unlink("../../../joimg/album/$ex[gambar]");
		}
	
	UploadAlbum($nama_file_unik);
  
    mysql_query("UPDATE album SET 	
									nama			 	= '$_POST[nama]',
									seo			 		= '$judul_seo',
									gambar				= '$nama_file_unik'
                            WHERE id_album		       	= '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE album SET 	
									nama			 	= '$_POST[nama]',
									seo			 		= '$judul_seo'
                            WHERE id_album		       	= '$_POST[id]'");
	}
	
  header('location:../../media.php?module='.$module);
}
// Update Room Type
if ($module=='album' AND $act=='insertnew'){
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo      = seo_title($_POST[nama]);
  
	if(!empty($lokasi_file)){
	
	if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/gif" AND $tipe_file != "image/png"){?>
    <script>window.alert("Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.GIF, *.PNG");
        window.location=("../../media.php?module=<?php echo $module.'&act=edit&id='.$_POST['id'] ?>")</script>;
    <?php die();}
  
	UploadAlbum($nama_file_unik);
  
    mysql_query("INSERT INTO album(
									nama,
									seo,
									gambar) 
                            VALUES(
                                   '$_POST[nama]',
								   '$judul_seo',
								   '$nama_file_unik')");
	}
	else{
	mysql_query("INSERT INTO album(
									nama, seo) 
                            VALUES(
                                   '$_POST[nama]',
								   '$judul_seo')");
	}
	
	
  header('location:../../media.php?module='.$module);
}



}
?>
