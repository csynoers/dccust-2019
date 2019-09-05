<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus sajian
if ($module=='sajian' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM sajian WHERE id_sajian='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM sajian WHERE id_sajian='$_GET[id]'");
    unlink("../../../joimg/sajian/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM sajian WHERE id_sajian='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='sajian' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadSajian($nama_file_unik);
    mysql_query("INSERT INTO sajian(nama_sajian_en,
									 nama_sajian_ina,
									 seo_en,
									 seo_ina,
									 isi_sajian_ina,
									 isi_sajian_en,
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
    mysql_query("INSERT INTO sajian(nama_sajian_en,
									nama_sajian_ina,
									 seo_en,
									 seo_ina,
									 isi_sajian_ina,
									 isi_sajian_en,
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
elseif ($module=='sajian' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM sajian WHERE id_sajian='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/sajian/$ex[gambar]");
		}
	
	UploadSajian($nama_file_unik);
  
    mysql_query("UPDATE sajian SET nama_sajian_en 	= '$_POST[judul_en]',
								   nama_sajian_ina 	= '$_POST[judul_ina]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_sajian_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_sajian_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."',
									gambar			= '$nama_file_unik'
									WHERE id_sajian  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE sajian SET nama_sajian_en 	= '$_POST[judul_en]',
								   nama_sajian_ina 	= '$_POST[judul_ina]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_sajian_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_sajian_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."'
									WHERE id_sajian  ='$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}
// Update header
if ($module=='sajian' AND $act=='update_header'){
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  
	if(!empty($lokasi_file)){
	
	if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/gif" AND $tipe_file != "image/png"){?>
    <script>window.alert("Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.GIF, *.PNG");
        window.location=("../../media.php?module=<?php echo $module.'&act=edit&id='.$_POST['id'] ?>")</script>;
    <?php die();}
  
	$tampil=mysql_query("SELECT * FROM header WHERE id_header='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex[gambar] != ''){
		unlink("../../../joimg/header_image/$ex[gambar]");
		}
	
	UploadGambarHeader($nama_file_unik);
  
    mysql_query("UPDATE header SET 	
									nama_header_ina			= '$_POST[nama_header_ina]',
									nama_header_en		 	= '$_POST[nama_header_en]',
									isi_header_ina			=  '".mysql_real_escape_string($_POST[isi_header_ina])."',
									isi_header_en			=  '".mysql_real_escape_string($_POST[isi_header_en])."',
									tanggal					= NOW(),
									gambar					= '$nama_file_unik'
							WHERE id_header		   			= '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE header SET 	
									nama_header_ina			= '$_POST[nama_header_ina]',
									nama_header_en		 	= '$_POST[nama_header_en]',
									isi_header_ina			=  '".mysql_real_escape_string($_POST[isi_header_ina])."',
									isi_header_en			=  '".mysql_real_escape_string($_POST[isi_header_en])."',
									tanggal					= NOW()
                            WHERE id_header		       	= '$_POST[id]'");
	}
	
  header('location:../../media.php?module='.$module);
}
?>

