<?php
error_reporting(0);
/**
* model karir
*/
class Karir
{
	
	function connectMysql()
	{
		require '../../josys/koneksi.php';
	}

	function get_karir(){
		// load connection
		// $this->connectMysql();
		$sql= mysql_query("SELECT * FROM karir ORDER BY id_karir DESC LIMIT 5");
		while ($row=mysql_fetch_assoc($sql))
			$data[]= $row;
		return $data;
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

	function get_slide(){
		// load connection
		// $this->connectMysql();
		$sql= mysql_query("SELECT nama_header_ina,gambar FROM header where id_header='7'");
		$row= mysql_fetch_object($sql);
		$data= array('name_header_ina'=>$row->nama_header_ina,'img_src'=>$row->gambar);
		return $data;
	}

	// get data tingkat jabatan
	function get_jabatan(){
		$sql= mysql_query("SELECT id,name FROM tingkat_jabatan ORDER BY name ASC");
		while ($row=mysql_fetch_assoc($sql))
			$data[]= $row;
		return $data;
	}

	// get data spesialisasi pekerjaan
	function get_spesialis(){
		$sql= mysql_query("SELECT id_spes,nama_spes FROM spesialis ORDER BY nama_spes ASC");
		while ($row=mysql_fetch_assoc($sql))
			$data[]= $row;
		return $data;
	}

	// get data jenis lowongan
	function get_jenis_lowongan(){
		$sql= mysql_query("SELECT id,name FROM jenis_lowongan ORDER BY name ASC");
		while ($row=mysql_fetch_assoc($sql))
			$data[]= $row;
		return $data;
	}

	// get data penempatan
	function get_penempatan(){
		$sql= mysql_query("SELECT propinsi_id,propinsi_name FROM propinsi ORDER BY propinsi_name ASC");
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