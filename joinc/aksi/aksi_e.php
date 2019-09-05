<?php
$data = array(
	'id_alumni' => $_SESSION['idnya'],
	'1' =>	array(
			'e11' 	=> $_POST['e11'], 
			'e12' 	=> $_POST['e12'], 
			'e13' 	=> $_POST['e13'], 
			'e14' 	=> $_POST['e14'], 
			'e15' 	=> $_POST['e15'], 
			'e16' 	=> $_POST['e16'], 
			'e17' 	=> $_POST['e17'], 
			'e18' 	=> $_POST['e18'], 
			'e19' 	=> $_POST['e19'], 
			'e110' 	=> $_POST['e110'], 
			'e111' 	=> $_POST['e111'], 
			'e112' 	=> $_POST['e112'], 
			'e113' 	=> $_POST['e113'], 
			'e114' 	=> $_POST['e114'], 
			'e115' 	=> $_POST['e115'], 
			'e116' 	=> $_POST['e116'], 
			'e117' 	=> $_POST['e117'], 
			'e118' 	=> $_POST['e118'], 
			'e119' 	=> $_POST['e119'], 
			'e120' 	=> $_POST['e120'], 
			'e121' 	=> $_POST['e121'], 
			'e122' 	=> $_POST['e122'],
			'e122' 	=> $_POST['e122'],
			'e123' 	=> $_POST['e123'],
			'e124' 	=> $_POST['e124'],
			'e125' 	=> $_POST['e125'],
			'e126' 	=> $_POST['e126'],
			'e127' 	=> $_POST['e127'],
		),
	'2' =>	array(
			'e21' 	=> $_POST['e21'], 
			'e22' 	=> $_POST['e22'], 
			'e23' 	=> $_POST['e23'], 
			'e24' 	=> $_POST['e24'], 
			'e25' 	=> $_POST['e25'], 
			'e26' 	=> $_POST['e26'], 
			'e27' 	=> $_POST['e27'], 
			'e28' 	=> $_POST['e28'], 
			'e29' 	=> $_POST['e29'], 
			'e210' 	=> $_POST['e210'], 
			'e211' 	=> $_POST['e211'], 
			'e212' 	=> $_POST['e212'], 
			'e213' 	=> $_POST['e213'], 
			'e214' 	=> $_POST['e214'], 
			'e215' 	=> $_POST['e215'], 
			'e216' 	=> $_POST['e216'], 
			'e217' 	=> $_POST['e217'], 
			'e218' 	=> $_POST['e218'], 
			'e219' 	=> $_POST['e219'], 
			'e220' 	=> $_POST['e220'], 
			'e221' 	=> $_POST['e221'], 
			'e222' 	=> $_POST['e222'],
			'e223' 	=> $_POST['e223'],
			'e224' 	=> $_POST['e224'],
			'e225' 	=> $_POST['e225'],
			'e226' 	=> $_POST['e226'],
			'e227' 	=> $_POST['e227'],

		),  
);
// echo "<pre>";
// print_r($data);
// echo "</pre>";

$data_e1= "";
$data_e2= "";

foreach ($data[1] as $key => $value) {
	$data_e1 .=$value.'-';
}

foreach ($data[2] as $key => $value) {
	$data_e2 .=$value.'-';
}

$data_ans= array(
	'e1' => rtrim($data_e1, -1),
	'e2' => rtrim($data_e2, -1), 
);

// var_dump($data_ans);
// die();


mysql_query("	INSERT INTO tb_e(id_alumni,e1,e2)
				VALUES ('$data[id_alumni]','$data_ans[e1]','$data_ans[e2]')");

header('Location:selesai.html');
?>