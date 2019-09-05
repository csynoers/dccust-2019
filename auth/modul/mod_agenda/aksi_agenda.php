<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Agenda
if ($module=='agenda' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM agenda WHERE id_agenda='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM agenda WHERE id_agenda='$_GET[id]'");
    unlink("../../../joimg/agenda/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM agenda WHERE id_agenda='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='agenda' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadAgenda($nama_file_unik);
    mysql_query("INSERT INTO agenda(nama_agenda_en,
									 nama_agenda_ina,
									 seo_en,
									 seo_ina,
									 isi_agenda_ina,
									 isi_agenda_en,
									 tema_agenda_en,
									 tema_agenda_ina,
									 waktu,
									 peserta,
									 lokasi,
									 tanggal,
									 gambar) 
                            VALUES('$_POST[judul_en]',
									'$_POST[judul_ina]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									'$_POST[tema_en]',
									'$_POST[tema_ina]',
									'$_POST[waktu]',
									'$_POST[peserta]',
									'$_POST[lokasi]',
									now(),
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO agenda(nama_agenda_en,
									 nama_agenda_ina,
									 seo_en,
									 seo_ina,
									 isi_agenda_ina,
									 isi_agenda_en,
									 tema_agenda_en,
									 tema_agenda_ina,
									 waktu,
									 peserta,
									 lokasi,
									 tanggal)
                            VALUES('$_POST[judul_en]',
									'$_POST[judul_ina]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									'$_POST[tema_en]',
									'$_POST[tema_ina]',
									'$_POST[waktu]',
									'$_POST[peserta]',
									'$_POST[lokasi]',
									now())");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='agenda' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM agenda WHERE id_agenda='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/agenda/$ex[gambar]");
		}
	
	UploadAgenda($nama_file_unik);
  
    mysql_query("UPDATE agenda SET nama_agenda_en 	= '$_POST[judul_en]',
								   nama_agenda_ina 	= '$_POST[judul_ina]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_agenda_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_agenda_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."',
									tema_agenda_en 	= '$_POST[tema_en]',
									tema_agenda_ina = '$_POST[tema_ina]',
									waktu 			= '$_POST[waktu]',
									peserta 		= '$_POST[peserta]',
									lokasi	 		= '$_POST[lokasi]',
									gambar			= '$nama_file_unik'
									WHERE id_agenda = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE agenda SET nama_agenda_en 	= '$_POST[judul_en]',
								   nama_agenda_ina 	= '$_POST[judul_ina]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_agenda_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_agenda_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."',
									tema_agenda_en 	= '$_POST[tema_en]',
									tema_agenda_ina = '$_POST[tema_ina]',
									waktu 			= '$_POST[waktu]',
									peserta 		= '$_POST[peserta]',
									lokasi	 		= '$_POST[lokasi]'
									WHERE id_agenda  ='$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}

// Update header
if ($module=='agenda' AND $act=='update_header'){
  
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
