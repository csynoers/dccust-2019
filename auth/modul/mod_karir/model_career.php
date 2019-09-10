<?php
	/**
	* create modal for career
	*/
	/**
	 * 
	 */
	class Career extends dbHelper
	{
		//get data career
		function get_career(){
			//load connection
			$data= $this->get_select("SELECT * FROM karir JOIN spesialis ON karir.id_spes = spesialis.id_spes ORDER BY id_karir DESC");
			return $data['data'];
		}

		//insert new career
		function insert_career($id_spes,$judul_karir,$perusahaan_karir,$jenis_lowongan,$tingkat_jabatan,$isi_karir,$deadline,$lokasi,$gambar,$seo_ina){
			//load connection
			$this->connectMysql();
			$sql=("INSERT INTO karir(id_spes, judul_karir, perusahaan_karir, jenis_lowongan, tingkat_jabatan, isi_karir, deadline, lokasi, gambar, seo_ina) VALUES ('{$id_spes}','{$judul_karir}','{$perusahaan_karir}','{$jenis_lowongan}','{$tingkat_jabatan}','{$isi_karir}','{$deadline}','{$lokasi}','{$gambar}','{$seo_ina}')");
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di simpan')</script>";
			}else{
				echo "<script>alert('data gagal di simpan')</script>";
			}
		}

		//insert new career without img
		function insert_career_without_img($id_spes,$judul_karir,$perusahaan_karir,$jenis_lowongan,$tingkat_jabatan,$isi_karir,$deadline,$lokasi,$seo_ina){
			//load connection
			$this->connectMysql();
			$sql=("INSERT INTO karir(id_spes, judul_karir, perusahaan_karir, jenis_lowongan, tingkat_jabatan, isi_karir, deadline, lokasi, seo_ina) VALUES ('{$id_spes}','{$judul_karir}','{$perusahaan_karir}','{$jenis_lowongan}','{$tingkat_jabatan}','{$isi_karir}','{$deadline}','{$lokasi}','{$seo_ina}')");
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di simpan')</script>";
			}else{
				echo "<script>alert('data gagal di simpan')</script>";
			}
		}

		//insert new career
		function update_career($id_karir,$id_spes,$judul_karir,$perusahaan_karir,$jenis_lowongan,$tingkat_jabatan,$isi_karir,$deadline,$lokasi,$gambar,$seo_ina){
			//load connection
			$this->connectMysql();
			$sql=("UPDATE karir SET 
							id_spes = '{$id_spes}',
							judul_karir = '{$judul_karir}',
							perusahaan_karir = '{$perusahaan_karir}',
							jenis_lowongan = '{$jenis_lowongan}',
							tingkat_jabatan = '{$tingkat_jabatan}',
							isi_karir = '{$isi_karir}',
							deadline = '{$deadline}',
							lokasi = '{$lokasi}',
							gambar = '{$gambar}',
							seo_ina = '{$seo_ina}'
					WHERE id_karir='{$id_karir}'");

			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di simpan')</script>";
			}else{
				echo "<script>alert('data gagal di simpan')</script>";
			}
		}

		//insert new career without img
		function update_career_without_img($id_karir,$id_spes,$judul_karir,$perusahaan_karir,$jenis_lowongan,$tingkat_jabatan,$isi_karir,$deadline,$lokasi,$seo_ina){
			//load connection
			$this->connectMysql();
			$sql=("UPDATE karir SET
								id_spes = '{$id_spes}',
								judul_karir = '{$judul_karir}',
								perusahaan_karir = '{$perusahaan_karir}',
								jenis_lowongan = '{$jenis_lowongan}',
								tingkat_jabatan = '{$tingkat_jabatan}',
								isi_karir = '{$isi_karir}',
								deadline = '{$deadline}',
								lokasi = '{$lokasi}',
								seo_ina = '{$seo_ina}'
					WHERE id_karir='{$id_karir}'");

			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di simpan')</script>";
			}else{
				echo "<script>alert('data gagal di simpan')</script>";
			}
		}

		//get data jenis lowongtan
		function get_jenis_lowongan(){
			$rows= $this->get_select("SELECT id,name FROM jenis_lowongan ORDER BY name ASC");
			return $rows['data'];
		}

		//get data jenis lowongan where id
		function get_jenis_lowongan_where($field,$id){
			// load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT {$field} FROM jenis_lowongan WHERE id='{$id}'");
			$row= mysql_fetch_object($sql);
			$data= $row->$field;
			return $data;
		}

		//get data spesialisasi
		function get_spesialisasi(){
			$rows= $this->get_select("SELECT id_spes,nama_spes FROM spesialis ORDER BY id_spes ASC");
			return $rows['data'];
		}

		//get data spesialisasi where id
		function get_spesialisasi_where($field,$id){
			//load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT {$field} FROM spesialis WHERE id_spes='{$id}'");
			$row= mysql_fetch_object($sql);
			$data= $row->$field;
			return $data;
		}

		//get data tingkat_jabatan
		function get_tingkat_jabatan(){
			$rows= $this->get_select("SELECT id,name FROM tingkat_jabatan ORDER BY name ASC");
			return $rows['data'];
		}

		//get data tingkat_jabatan where id
		function get_tingkat_jabatan_where($field,$id){
			//load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT {$field} FROM tingkat_jabatan WHERE id='{$id}'");
			$row= mysql_fetch_object($sql);
			$data= $row->$field;
			return $data;
		}

		// get data kota
		function get_kota(){
			$rows= $this->get_select("SELECT propinsi_id,propinsi_name FROM propinsi ORDER BY propinsi_name ASC");
			return $rows['data'];			
		}

		// get data kota where id
		function get_kota_where($field,$id){
			// load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT {$field} FROM propinsi WHERE propinsi_id='{$id}'");
			$row= mysql_fetch_object($sql);
			$data= $row->$field;
			return $data;
			
		}

		// get data career where id
		function get_career_where($id){
			// load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT * FROM karir WHERE id_karir='{$id}'");
			$row= mysql_fetch_object($sql);

			$this->judul= $row->judul_karir;
			$this->perusahaan= $row->perusahaan_karir;
			$this->id_jenis_lowongan= $this->get_jenis_lowongan_where('id',$row->jenis_lowongan);
			$this->jenis_lowongan= $this->get_jenis_lowongan_where('name',$row->jenis_lowongan);
			$this->id_spesialisasi_pekerjaan= $this->get_spesialisasi_where('id_spes',$row->id_spes);
			$this->spesialisasi_pekerjaan= $this->get_spesialisasi_where('nama_spes',$row->id_spes);
			$this->id_tingkat_jabatan= $this->get_tingkat_jabatan_where('id',$row->tingkat_jabatan);
			$this->tingkat_jabatan= $this->get_tingkat_jabatan_where('name',$row->tingkat_jabatan);
			$this->id_penempatan= $this->get_kota_where('propinsi_id',$row->lokasi);
			$this->penempatan= $this->get_kota_where('propinsi_name',$row->lokasi);
			$this->batas_akhir= $row->deadline;
			$this->deskripsi= $row->isi_karir;
			$this->thumbnail= $row->gambar;
			return $this;
			
		}

		function name_img($id){
			// load connection
			$this->connectMysql();
			$sql=mysql_query("SELECT gambar FROM karir WHERE id_karir='{$id}'");
			$row= mysql_fetch_object($sql);
			$data= $row->gambar;
			return $data;
		}

		function delete_career($id){
			// load connection
			$this->connectMysql();
			$sql=("DELETE FROM karir WHERE id_karir='{$id}'");
			// echo $sql;
			if (mysql_query($sql)===TRUE) {
				echo "<script>alert('data berhasil di hapus')</script>";
			}else{
				echo "<script>alert('data gagal dihapus')</script>";
			}
		}

		
	}