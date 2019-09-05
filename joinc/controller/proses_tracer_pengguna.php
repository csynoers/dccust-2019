<?php
	session_start();
	// load model dbhelper
	require '../../josys/dbHelper.php';
	 // $rows = $db->select('customers_php',array());  
	 // $rows = $db->select('customers_php',array('id'=>171));  
	 // $rows = $db->insert('customers_php',array('name' => 'Ipsita Sahoo', 'email'=>'ipi@angularcode.com'), array('name', 'email'));  
	 // $rows = $db->update('customers_php',array('name' => 'Ipsita Sahoo', 'email'=>'email'),array('id'=>'170'), array('name', 'email'));  
	 // $rows = $db->delete('customers_php', array('name' => 'Ipsita Sahoo', 'id'=>'227'));  

	// load fungsi_input
	require '../../josys/fungsi_input.php';
	// cleanInput($data) return string

	$db =  new dbHelper();
	$data=[];
	$data['author']= $_SESSION['tracer-pengguna']['users_email'];
	$data['post']=$_REQUEST['data'];
	// echo "<pre>";
	$data['insert'] = $db->insert(
		$table='tracer_pengguna',
		$columnsArray=[
			'tracer_title'=>$data['post']['tracer_title'],
			'tracer_desc'=>$data['post']['tracer_desc'],
			'tracer_prop'=>$data['post']['tracer_prop'],
			'tracer_kab'=>$data['post']['tracer_kab'],
			'tracer_usaha'=>$data['post']['tracer_usaha'],
			'tracer_author'=>$data['author'],
		],
		$requiredColumnsArray=['tracer_title','tracer_desc','tracer_prop','tracer_kab','tracer_usaha','tracer_author']);

	$data['update'] = $db->update(
		$table='user',
		$columnsArray=array('users_status'=>'true'),
		$where=array('users_email'=>$data['author']),
		$requiredColumnsArray=array('users_status')
	);
	unset($_SESSION['tracer-pengguna']);  
	print_r($data['update']['status']);
?>