<?php
/**
* create model buku tamu
*/
class Buku_tamu extends dbHelper
{
	
	// function __construct(argument)
	// {
	// 	parent::__construct();
	// }

	function get_header(){
		$data= $this->select('header',array('id_header'=>'16'));
		return $data['data'];
	}

	function get_buku_tamu(){
		$data= $this->select('guest_book',array());
		return $data;
	}

	function update_header($data){
		if (!empty($data['gambar'])) {//with image
			$rows = $this->update('header',array('nama_header_ina' => $data['nama_header_ina'], 'isi_header_ina'=> $data['isi_header_ina'],'gambar'=> $data['gambar'],'tanggal'=> $data['tanggal']),array('id_header'=> $data['id_header']), array('nama_header_ina', 'isi_header_ina','gambar','tanggal'));

		}else{ //without image
			$rows = $this->update('header',array('nama_header_ina' => $data['nama_header_ina'], 'isi_header_ina'=> $data['isi_header_ina'],'tanggal'=> $data['tanggal']),array('id_header'=> $data['id_header']), array('nama_header_ina', 'isi_header_ina','tanggal'));

		}

		// if update header succes
		if ($rows['status']=='success') {
			echo "<script>alert('Header Buku Tamu Berhasil Di Update')</script>";
		}
		
		return $rows['status'];
	}

	function get_one_buku_tamu($id){
		$data= $this->select('guest_book',array('id'=> $id));
		return $data;
	}

	function update_buku_tamu($data){
		$rows = $this->update('guest_book',array('status' => $data['status']),array('id'=> $data['id']), array('status'));
		// print_r(json_encode($rows,JSON_NUMERIC_CHECK));
		
		return $rows['status'];
	}

	function delete_buku_tamu($id){
		$rows = $this->delete("guest_book", array('id'=> $id));
		// print_r(json_encode($rows,JSON_NUMERIC_CHECK));

		return $rows;
	}
}