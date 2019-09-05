<?php
	include_once "../../josys/dbHelper.php";
	$db = new dbHelper();
	$data= array();
	$data['province']= $db->get_select("SELECT * FROM province ORDER BY title ASC");
	echo json_encode($data['province']['data']);
?>