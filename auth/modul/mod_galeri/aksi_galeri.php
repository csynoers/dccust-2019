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
$album = $_POST[album];



// Hapus header
if ($module=='galeri' AND $act=='hapus'){
	
	$tampil=mysql_query("SELECT * FROM galeri WHERE id_galeri='$_GET[id]'");
	$ex=mysql_fetch_array($tampil);
	
	if($ex[gambar] != ''){
	unlink("../../../joimg/galeri/$ex[gambar]");
	mysql_query("DELETE FROM galeri WHERE id_galeri='$_GET[id]'");
	}else {
	mysql_query("DELETE FROM galeri WHERE id_galeri='$_GET[id]'");
	}
  header('location:../../media.php?module='.$module.'&id='.$_GET[id_album]);
}


// Update
if ($module=='galeri' AND $act=='update'){
  
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
  
	$tampil=mysql_query("SELECT * FROM galeri WHERE id_galeri='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex[gambar] != ''){
		unlink("../../../joimg/galeri/$ex[gambar]");
		}
	
	UploadGaleri($nama_file_unik);
  
    mysql_query("UPDATE galeri SET 	id_album			= '$_POST[album]',
									nama			 	= '$_POST[nama]',
									seo					= '$judul_seo',
									deskripsi			=  '".mysql_real_escape_string($_POST['deskripsi'])."',
									gambar				= '$nama_file_unik'
                            WHERE id_galeri		       	= '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE galeri SET 	id_album			= '$_POST[album]',
									nama			 	= '$_POST[nama]',
									deskripsi			=  '".mysql_real_escape_string($_POST['deskripsi'])."',
									seo					= '$judul_seo'
                            WHERE id_galeri		       	= '$_POST[id]'");
	}
	
  header('location:../../media.php?module='.$module.'&id='.$album);
}
// Update Room Type
if ($module=='galeri' AND $act=='insertnew'){
  
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
  
	UploadGaleri($nama_file_unik);
  
    mysql_query("INSERT INTO galeri(id_album,
									nama,
									deskripsi,
									gambar,
									seo) 
                            VALUES('$_POST[album]',
                                   '$_POST[nama]',
                                   '".mysql_real_escape_string($_POST[deskripsi])."',
								   '$nama_file_unik',
                                   'judul_seo')");
	}
	else{
	mysql_query("INSERT INTO galeri(id_album,
									nama,
									deskripsi,
									gambar,
									seo) 
                            VALUES('$_POST[album]',
                                   '$_POST[nama]',
                                   '".mysql_real_escape_string($_POST[deskripsi])."',
								   '$nama_file_unik',
                                   'judul_seo')");
	}
	
	
  header('location:../../media.php?module='.$module.'&id='.$album);
}



}
?>
