<?php
	/**
	* create modal for career
	*/
	class Career
	{

		//call function connect mysql
		function connectMysql()
		{
			//load config mysql connect
			// include '../../../josys/koneksi.php';

		}

		//get data jenis lowongans
		function get_jenis_lowongan(){
			//load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT id,name FROM jenis_lowongan ORDER BY name ASC");
			while ($row= mysql_fetch_assoc($sql))
				$data[]= $row;
				return $data;
		}

		//get data spesialisasi pekerjaan
		function get_spesialis(){
			//load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT id_spes,nama_spes FROM spesialis ORDER BY nama_spes ASC");
			while ($row= mysql_fetch_assoc($sql))
				$data[]= $row;
				return $data;
		}

		//get data tingkat jabatan
		function get_jabatan(){
			//load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT id,name FROM tingkat_jabatan ORDER BY name ASC");
			while ($row= mysql_fetch_assoc($sql))
				$data[]= $row;
				return $data;
		}

		//get data penempatan
		function get_penempatan(){
			//load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT propinsi_id,propinsi_name FROM propinsi ORDER BY propinsi_name ASC");
			while ($row= mysql_fetch_assoc($sql))
				$data[]= $row;
				return $data;
		}

		// create model insert new jenis
		function insert_jenis($desc){
			// load connection
			$this->connectMysql();
			$sql="INSERT INTO jenis_lowongan(name) VALUES ('{$desc}')";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di simpan')</script>";
			}else{// if query false
				echo "<script>alert('data gagal disimpan')</script>";
			}

		}

		// create model insert new spesialisasi pekerjaan
		function insert_spesialis($desc){
			// load connection
			$this->connectMysql();
			$sql="INSERT INTO spesialis(nama_spes) VALUES ('{$desc}')";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di simpan')</script>";
			}else{// if query false
				echo "<script>alert('data gagal disimpan')</script>";
			}

		}

		// create model insert new jabatan
		function insert_jabatan($desc){
			// load connection
			$this->connectMysql();
			$sql="INSERT INTO tingkat_jabatan(name) VALUES ('{$desc}')";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di simpan')</script>";
			}else{// if query false
				echo "<script>alert('data gagal disimpan')</script>";
			}

		}

		// create model insert new penempatan
		function insert_penempatan($desc){
			// load connection
			$this->connectMysql();
			$sql="INSERT INTO propinsi(propinsi_name) VALUES ('{$desc}')";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di simpan')</script>";
			}else{// if query false
				echo "<script>alert('data gagal disimpan')</script>";
			}

		}

		//get data jenis lowongan where
		function get_jenis_where($field,$id){
			//load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT $field FROM jenis_lowongan WHERE id='{$id}'");
			$row= mysql_fetch_object($sql);
			$data= $row->$field;
			return $data;
		}

		//get data spesialisasi pekerjaan where
		function get_spesialis_where($field,$id){
			//load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT $field FROM spesialis WHERE id_spes='{$id}'");
			$row= mysql_fetch_object($sql);
			$data= $row->$field;
			return $data;
		}

		//get data tingkat jabatan where
		function get_jabatan_where($field,$id){
			//load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT $field FROM tingkat_jabatan WHERE id='{$id}'");
			$row= mysql_fetch_object($sql);
			$data= $row->$field;
			return $data;
		}

		//get data penempatan where
		function get_penempatan_where($field,$id){
			//load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT $field FROM propinsi WHERE propinsi_id='{$id}'");
			$row= mysql_fetch_object($sql);
			$data= $row->$field;
			return $data;
		}

		// create model update jenis lowongan
		function update_jenis($id,$desc){
			// load connection
			$this->connectMysql();
			$sql="UPDATE jenis_lowongan SET name='{$desc}' WHERE id='{$id}'";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di ubah')</script>";
			}else{// if query false
				echo "<script>alert('data gagal di ubah')</script>";
			}

		}

		// create model update spesialisasi pekerjaan
		function update_spesialis($id,$desc){
			// load connection
			$this->connectMysql();
			$sql="UPDATE spesialis SET nama_spes='{$desc}' WHERE id_spes='{$id}'";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di ubah')</script>";
			}else{// if query false
				echo "<script>alert('data gagal di ubah')</script>";
			}

		}

		// create model update tingkat jabatan
		function update_jabatan($id,$desc){
			// load connection
			$this->connectMysql();
			$sql="UPDATE tingkat_jabatan SET name='{$desc}' WHERE id='{$id}'";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di ubah')</script>";
			}else{// if query false
				echo "<script>alert('data gagal di ubah')</script>";
			}

		}

		// create model update penempatan
		function update_penempatan($id,$desc){
			// load connection
			$this->connectMysql();
			$sql="UPDATE propinsi SET propinsi_name='{$desc}' WHERE propinsi_id='{$id}'";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di ubah')</script>";
			}else{// if query false
				echo "<script>alert('data gagal di ubah')</script>";
			}

		}

		// create model delete jenis lowongan
		function delete_jenis($id){
			// load connection
			$this->connectMysql();
			$sql="DELETE FROM jenis_lowongan WHERE id='{$id}'";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di hapus')</script>";
			}else{// if query false
				echo "<script>alert('data gagal di hapus')</script>";
			}

		}

		// create model delete spesialisasi pekerjaan
		function delete_spesialis($id){
			// load connection
			$this->connectMysql();
			$sql="DELETE FROM spesialis WHERE id_spes='{$id}'";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di hapus')</script>";
			}else{// if query false
				echo "<script>alert('data gagal di hapus')</script>";
			}

		}

		// create model delete tingkat jabatan
		function delete_jabatan($id){
			// load connection
			$this->connectMysql();
			$sql="DELETE FROM tingkat_jabatan WHERE id='{$id}'";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di hapus')</script>";
			}else{// if query false
				echo "<script>alert('data gagal di hapus')</script>";
			}

		}

		// create model delete penempatan
		function delete_penempatan($id){
			// load connection
			$this->connectMysql();
			$sql="DELETE FROM propinsi WHERE propinsi_id='{$id}'";
			// if query true
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di hapus')</script>";
			}else{// if query false
				echo "<script>alert('data gagal di hapus')</script>";
			}

		}
	}