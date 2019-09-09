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


	function get_karir_page($id){
		// load connection
		$this->connectMysql();
		$sql= mysql_query("SELECT * FROM karir WHERE id_karir<=$id ORDER BY id_karir DESC LIMIT 1 ");
		while ($row=mysql_fetch_assoc($sql))
			$data[]= $row;

		return $data;
		// return $sql;
	}

	function get_karir_one($id){
		// load connection
		$this->connectMysql();
		$sql= mysql_query("SELECT * FROM karir WHERE id_karir='{$id}'");
		while ($row=mysql_fetch_assoc($sql))
			$data[]= $row;
		return $data;
	}

	function get_karir_jabatan($id){
		// load connection
		$this->connectMysql();
		$sql= mysql_query("SELECT * FROM karir WHERE tingkat_jabatan IN ({$id}) ORDER BY id_karir DESC");
		while ($row=mysql_fetch_assoc($sql))
			$data[]= $row;
		return $data;
	}

	function get_karir_spesialis($id){
		// load connection
		$this->connectMysql();
		$sql= mysql_query("SELECT * FROM karir WHERE id_spes='{$id}' ORDER BY id_karir DESC");
		while ($row=mysql_fetch_assoc($sql))
			$data[]= $row;
		return $data;
	}

	function get_karir_jenis($id){
		// load connection
		$this->connectMysql();
		if ($id=='zero') {
			$sql= mysql_query("SELECT * FROM karir ORDER BY id_karir DESC");
			while ($row=mysql_fetch_assoc($sql))
				$data[]= $row;
			
		}else{
			$sql= mysql_query("SELECT * FROM karir WHERE jenis_lowongan='{$id}' ORDER BY id_karir DESC");
			while ($row=mysql_fetch_assoc($sql))
				$data[]= $row;
		}
		return $data;
	}

	function get_karir_penempatan($id){
		// load connection
		$this->connectMysql();
		if ($id=='00') {
			# code...
			$sql= mysql_query("SELECT * FROM karir");
			while ($row=mysql_fetch_assoc($sql))
				$data[]= $row;
		}else{
			$sql= mysql_query("SELECT * FROM karir WHERE lokasi='{$id}'");
			while ($row=mysql_fetch_assoc($sql))
				$data[]= $row;
		}
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