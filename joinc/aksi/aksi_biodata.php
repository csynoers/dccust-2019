<?php
	// create validation if string there a single quote
	$string			= ($_POST['nama']);
	$cek 			= strpos($string, '\'');
	if ( $cek != '' ) {
		$nama_alumni= str_replace('\'', "\'", $string);
	}else{
		$nama_alumni= $string;
	}
	// end validation if string there a single quote
	$domisili	= htmlentities($_POST['almt_domisili']);
	$ktp		= htmlentities($_POST['almt_ktp']);
	// echo "";

	# initialize parameter insert biodata
	$table = 'biodata';
	$columnsArray = [
		'id_alumni' => $_SESSION['idnya'],
		'nama' => $nama_alumni,
		'nim' => $_POST['nim'],
		'th_lulus' => $_POST['th_lulus'],
		'prodi' => $_POST['prodi_id'],
		'no_hp' => $_POST['no_hp'],
		'email' => $_POST['email'],
		'almt_domisili' => $domisili,
		'almt_ktp' => $ktp,
	];
	$requiredColumnsArray= array_keys($columnsArray);

	# insert
	$db->insert($table, $columnsArray, $requiredColumnsArray);
	
	// die();
	header('Location:kuis_a.html');
?>