<?php
	// create validation if string there a single quote
	$string			= ($_POST['nama']);
	$cek 			= strpos($string, '\'');
	if ($cek!='') {
		$nama_alumni= str_replace('\'', "\'", $string);
	}else{
		$nama_alumni= $string;
	}
	// end validation if string there a single quote
	$domisili	= htmlentities($_POST['almt_domisili']);
	$ktp		= htmlentities($_POST['almt_ktp']);
	// echo "";


	mysql_query("INSERT INTO biodata (id_alumni, nama, nim, th_lulus, prodi, no_hp, email, almt_domisili, almt_ktp)
			 VALUES
			 ('$_SESSION[idnya]', '$nama_alumni', '$_POST[nim]', '$_POST[th_lulus]', '$_POST[prodi_id]', '$_POST[no_hp]', '$_POST[email]', '$domisili', '$ktp')");
	// die();
	header('Location:kuis_a.html');
?>