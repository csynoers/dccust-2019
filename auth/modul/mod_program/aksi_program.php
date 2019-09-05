<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus program
if ($module=='program' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM program WHERE id_program='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM program WHERE id_program='$_GET[id]'");
    unlink("../../../joimg/program/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM program WHERE id_program='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='program' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_program      = seo_title($_POST[nama_program]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadProgram($nama_file_unik);
    mysql_query("INSERT INTO program(nama_program,
									 seo_program,
									 isi_program,
									 tanggal,
									 gambar) 
                            VALUES('$_POST[nama_program]',
									'$judul_seo_program',
									'".mysql_real_escape_string($_POST[isi_program])."',
									now(),
									'$nama_file_unik')");
  }
  else{
      mysql_query("INSERT INTO program(nama_program,
									 seo_program,
									 isi_program,
									 tanggal) 
                            VALUES('$_POST[nama_program]',
									'$judul_seo_program',
									'".mysql_real_escape_string($_POST[isi_program])."',
									now())");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='program' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_program      = seo_title($_POST[nama_program]);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM program WHERE id_program='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/program/$ex[gambar]");
		}
	
	UploadProgram($nama_file_unik);
  
    mysql_query("UPDATE program SET nama_program 		= '$_POST[nama_program]',
									seo_program 		= '$judul_seo_program',
									isi_program		 	= '".mysql_real_escape_string($_POST['isi_program'])."',
									tanggal				= NOW(),
									gambar				= '$nama_file_unik'
									WHERE id_program  	= '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE program SET nama_program 		= '$_POST[nama_program]',
									seo_program 		= '$judul_seo_program',
									isi_program		 	= '".mysql_real_escape_string($_POST['isi_program'])."',
									tanggal				= NOW()
									WHERE id_program  	= '$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}




// Update header
if ($module=='program' AND $act=='update_header'){
  
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
