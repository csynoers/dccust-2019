<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus beasiswa
if ($module=='beasiswa' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM beasiswa WHERE id_beasiswa='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM beasiswa WHERE id_beasiswa='$_GET[id]'");
    unlink("../../../joimg/beasiswa/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM beasiswa WHERE id_beasiswa='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='beasiswa' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_beasiswa      = seo_title($_POST[nama_beasiswa]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  	
    UploadBeasiswa($nama_file_unik);
    mysql_query("INSERT INTO beasiswa(nama_beasiswa,
									 seo_beasiswa,
									 isi_beasiswa,
									 tanggal,
									 gambar) 
                            VALUES('$_POST[nama_beasiswa]',
									'$judul_seo_beasiswa',
									'".mysql_real_escape_string($_POST[isi_beasiswa])."',
									now(),
									'$nama_file_unik')");
  }
  else{
      mysql_query("INSERT INTO beasiswa(nama_beasiswa,
									 seo_beasiswa,
									 isi_beasiswa,
									 tanggal) 
                            VALUES('$_POST[nama_beasiswa]',
									'$judul_seo_beasiswa',
									'".mysql_real_escape_string($_POST[isi_beasiswa])."',
									now())");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='beasiswa' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_beasiswa      = seo_title($_POST[nama_beasiswa]);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM beasiswa WHERE id_beasiswa='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/beasiswa/$ex[gambar]");
		}
	
	UploadBeasiswa($nama_file_unik);
  
    mysql_query("UPDATE beasiswa SET nama_beasiswa 		= '$_POST[nama_beasiswa]',
									seo_beasiswa 		= '$judul_seo_beasiswa',
									isi_beasiswa		 	= '".mysql_real_escape_string($_POST['isi_beasiswa'])."',
									tanggal				= NOW(),
									gambar				= '$nama_file_unik'
									WHERE id_beasiswa  	= '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE beasiswa SET nama_beasiswa 		= '$_POST[nama_beasiswa]',
									seo_beasiswa 		= '$judul_seo_beasiswa',
									isi_beasiswa		 	= '".mysql_real_escape_string($_POST['isi_beasiswa'])."',
									tanggal				= NOW()
									WHERE id_beasiswa  	= '$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}




// Update header
if ($module=='beasiswa' AND $act=='update_header'){
  
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
