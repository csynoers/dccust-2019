<?php
// error_reporting(0);
/**
* model buku tamu
*/

// create model buku tamu
class Buku_tamu extends dbHelper
{
	// function __construct($db_config)
	function __construct()
	{
		// parent::__construct();
		// $this->config= $db_config;
		print_r(parent::get_select("SELECT * FROM guest_book")['data']);
		// print_r(parent::);
	}
	
	// public function get_header($id){
	// 	$data= $this->select('header',array('id_header'=> $id));
	// 	return $data['data'];
	// }

	// public function get_buku_tamu(){
	// 	$data= $this->select('guest_book',array('status'=> '1'));
	// 	return $data['data'];
	// }

	// public function insert_buku_tamu($data){
	// 	$rows = $this->insert("guest_book",array('name' => $data['name'], 'email'=> $data['email'],'message_fill' => $data['message_fill'], 'status' => '0'), array('name', 'email', 'message_fill', 'status'));
	// 	// print_r(json_encode($rows,JSON_NUMERIC_CHECK));

	// 	return $rows['status'];
	// }
}