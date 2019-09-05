<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus berita
if ($module=='jaringan' AND $act=='hapus'){

	$id = $_GET['id'];

	mysql_query("DELETE FROM jaringan WHERE id_jaringan='$id'");
	
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='jaringan' AND $act=='insertnew'){
  
  $judul_seo_en      = seo_title($_POST[ornop_en]);
  $judul_seo_ina      = seo_title($_POST[ornop_ina]);

  
    mysql_query("INSERT INTO jaringan(ornop_ina,
									ornop_en,
									ornop_singkat_ina,
									ornop_singkat_en,
									alamat_ina,
									alamat_en,
									provinsi,
									kegiatan,
									nama,
									 seo_en,
									 seo_ina,
									 isi_ina,
									 isi_en,
									 tanggal) 
                            VALUES('$_POST[ornop_ina]',
									'$_POST[ornop_en]',
									'$_POST[ornop_singkat_ina]',
									'$_POST[ornop_singkat_en]',
									'$_POST[alamat_ina]',
									'$_POST[alamat_en]',
									'$_POST[provinsi]',
									'$_POST[kegiatan]',
									'$_POST[nama]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									now())");
  
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='jaringan' AND $act=='update'){
 
  
  $judul_seo_en      = seo_title($_POST[ornop_en]);
  $judul_seo_ina      = seo_title($_POST[ornop_ina]);
    
	mysql_query("UPDATE jaringan SET ornop_ina			= '$_POST[ornop_ina]',
									ornop_en			= '$_POST[ornop_en]',
									ornop_singkat_ina	= '$_POST[ornop_singkat_ina]',
									ornop_singkat_en	= '$_POST[ornop_singkat_en]',
									alamat_ina			= '$_POST[alamat_ina]',
									alamat_en			= '$_POST[alamat_en]',
									provinsi			= '$_POST[provinsi]',
									kegiatan			= '$_POST[kegiatan]',
									nama				= '$_POST[nama]',
									 seo_en				= '$judul_seo_en',
									 seo_ina			= '$judul_seo_ina',
									 isi_ina			= '".mysql_real_escape_string($_POST[isi_ina])."',
									 isi_en				= '".mysql_real_escape_string($_POST[isi_en])."'
									 WHERE id_jaringan  ='$_POST[id]'");
	
  header('location:../../media.php?module='.$module);
}
?>
