<?php
date_default_timezone_set( "Asia/Jakarta" );
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";
require_once "Akun_User.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus alumni
if ($module=='alumni' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

  $cek = mysql_fetch_array(mysql_query("SELECT gambar FROM alumni_daftar WHERE id_alumni='$id'"));
  if($cek['gambar']!=''){
  mysql_query("DELETE FROM alumni_daftar WHERE id_alumni='$_GET[id]'");
    unlink("../../../joimg/alumni/$cek[gambar]");
  } else {
  mysql_query("DELETE FROM alumni_daftar WHERE id_alumni='$id'");
}

	header('location:../../media.php?module='.$module.'&j='.$_GET['j']);
}

// Input header
elseif ($module=='alumni' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadAlumni($nama_file_unik);
   /* mysql_query("INSERT INTO alumni_daftar(
									 nama,
									 username,
									 password,
									 isi_alumni_ina,
									 isi_alumni_en,
									 tanggal,
									 gambar)
                            VALUES('$_POST[nama]',
									'$_POST[username]',
									'$_POST[password]',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									now(),
									'$nama_file_unik')");*/
	$aryo=new Akun_User;
	$_POST['gambar'] = $nama_file_unik;
	$_POST['tanggal'] = date('Y-m-d H:i:s');
	$aryo->simpanNilai($_POST);
	$hasil=$aryo->registerUser();
  }
  else{
    /*mysql_query("INSERT INTO alumni_daftar(nama,
									 username,
									 password,
									 isi_alumni_ina,
									 isi_alumni_en,
									 tanggal)
                            VALUES('$_POST[nama]',
									'$_POST[username]',
									'$_POST[password]',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									now())");*/
	$aryo=new Akun_User;
	$_POST['gambar'] = "";
	$_POST['tanggal'] = date('Y-m-d H:i:s');
	$aryo->simpanNilai($_POST);
	//echo $aryo->password;echo $aryo->isi_alumni_en;echo $aryo->isi_alumni_ina;echo $aryo->tanggal;exit();
	$hasil=$aryo->registerUser();

  }
  header('location:../../media.php?module='.$module.'&hasil='.$hasil['hasilOperasi']);
}

// Update header
elseif ($module=='alumni' AND $act=='update'){
	function cek_null($data){
		$value = empty($data)? 'NULL': $data;

		return $value;
	}

	$data= array(
				'id_alumni' 	=> $_POST['id_alumni'],
				'nama_alumni' 	=> cek_null($_POST['nama']),
				'email' 		=> cek_null($_POST['email']),
				'tahun_lulus' 	=> cek_null($_POST['tahun_lulus']),
				'prodi' 		=> cek_null($_POST['prodi']),
				'phone'			=> cek_null($_POST['no_hp']),
				'alamat_domisli'=> cek_null($_POST['alamat_domisli']),
				'alamat_ktp'	=> cek_null($_POST['alamat_ktp'])
				);
	// print_r($data);

	function update_alumni($data){
		$query= mysql_query("	UPDATE 	alumni_daftar
								SET 	nama_alumni 	= '{$data["nama_alumni"]}',
										email 			= '{$data["email"]}',
										tahun_lulus 	= '{$data["tahun_lulus"]}',
										prodi 			= '{$data["prodi"]}',
										phone 			= '{$data["phone"]}',
										alamat_domisli 	= '{$data["alamat_domisli"]}',
										alamat_ktp 		= '{$data["alamat_ktp"]}'
								WHERE 	id_alumni 		= '{$data["id_alumni"]}'
							");

		if ($query===1) {
			echo "<script>alert('Data Berhasil Diupdate')</script>";

		}else{
			echo "<script>alert('Data Gagal Diupdate')</script>";

		}
		// return $message;
	}
	// print_r($query);
	// die();
	update_alumni($data);

	header('location:../../media.php?module=alumni&j=1');


 /* $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;

	if(!empty($lokasi_file)){

	$tampil=mysql_query("SELECT * FROM alumni_daftar WHERE id_alumni='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/alumni/$ex[gambar]");
		}

	UploadAlumni($nama_file_unik);*/

    // mysql_query("UPDATE alumni_daftar SET   email 			= '$_POST[email]' WHERE id_alumni = '$_POST[id_alumni]'");
	/*$aryo=new Akun_User;
	$_POST['gambar'] = $nama_file_unik;
	$_POST['tanggal'] = date('Y-m-d');
	$aryo->simpanNilai($_POST);
	$hasil=$aryo->suntingAkun();
	}
	else{
	mysql_query("UPDATE alumni_daftar SET
									email 			= '$_POST[email]'
									WHERE id_alumni = '$_POST[id]'");
	$aryo=new Akun_User;
	$_POST['gambar'] = "";
	$_POST['tanggal'] = date('Y-m-d');
	$aryo->simpanNilai($_POST);
	$hasil=$aryo->suntingAkun();
	}*/
  // header('location:../../media.php?module='.$module.'&j='.$_GET['j']);
}
// Update header
if ($module=='alumni' AND $act=='update_header'){

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
