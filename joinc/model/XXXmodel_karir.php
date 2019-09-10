<?php
// error_reporting(0);
/**
* model karir
*/
class Karir
{
	
	function connectMysql()
	{
		require '../../josys/koneksi.php';
	}

	function get_karir_one($id){
		// load connection
		$this->connectMysql();
		$sql= mysql_query("SELECT * FROM karir WHERE id_karir='{$id}'");
		while ($row=mysql_fetch_assoc($sql))
			$data[]= $row;
		return $data;
	}

	


	function get_kota($id){
		// $this->connectMysql();
		// $sql =mysql_query("SELECT propinsi_name FROM propinsi WHERE propinsi_id='{$id}'");
		// $row=mysql_fetch_object($sql);
		// $data= $row->propinsi_name;
		$data= 'gdfgdf';
		return $data;
	}
}