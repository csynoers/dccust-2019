<?php
	include_once "../../josys/dbHelper.php";
	$db = new dbHelper();
	$data= array();
	$data['city']= $db->get_select("SELECT * FROM city ORDER BY title ASC");
	echo json_encode($data['city']['data']);
?>