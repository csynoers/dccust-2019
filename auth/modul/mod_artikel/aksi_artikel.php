<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus artikel
if ($module=='artikel' AND $act=='hapus'){

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
elseif ($module=='artikel' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_artikel      = seo_title($_POST[nama_artikel]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadArtikel($nama_file_unik);
    mysql_query("INSERT INTO artikel(nama_artikel,
									 seo_artikel,
									 isi_artikel,
									 tanggal,
									 gambar) 
                            VALUES('$_POST[nama_artikel]',
									'$judul_seo_artikel',
									'".mysql_real_escape_string($_POST[isi_artikel])."',
									now(),
									'$nama_file_unik')");
  }
  else{
      mysql_query("INSERT INTO artikel(nama_artikel,
									 seo_artikel,
									 isi_artikel,
									 tanggal) 
                            VALUES('$_POST[nama_artikel]',
									'$judul_seo_artikel',
									'".mysql_real_escape_string($_POST[isi_artikel])."',
									now())");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='artikel' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_artikel      = seo_title($_POST[nama_artikel]);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM artikel WHERE id_artikel='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/artikel/$ex[gambar]");
		}
	
	UploadArtikel($nama_file_unik);
  
    mysql_query("UPDATE artikel SET nama_artikel 		= '$_POST[nama_artikel]',
									seo_artikel 		= '$judul_seo_artikel',
									isi_artikel		 	= '".mysql_real_escape_string($_POST['isi_artikel'])."',
									tanggal				= NOW(),
									gambar				= '$nama_file_unik'
									WHERE id_artikel  	= '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE artikel SET nama_artikel 		= '$_POST[nama_artikel]',
									seo_artikel 		= '$judul_seo_artikel',
									isi_artikel		 	= '".mysql_real_escape_string($_POST['isi_artikel'])."',
									tanggal				= NOW()
									WHERE id_artikel  	= '$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}




// Update header
if ($module=='artikel' AND $act=='update_header'){
  
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
