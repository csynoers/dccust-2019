<?php
// create model buku tamu
class Grafik extends dbHelper
{
	function __construct()
	{
		parent::__construct();
	}
	
	// get name of program study
	public function get_prodi($id){
		$data= $this->get_select("SELECT prodi FROM prodi WHERE id_prodi='$id'");
		return $data['data'];
	}
	// end get name of program study

	// get jumlah populasi target
	public function count_populasi_target($id){
		$data= $this->get_select("SELECT id_alumni FROM alumni_daftar WHERE prodi='$id'");
		return $data['data'];
	}
	// end get jumlah populasi target

	// count responden statis_respon
	public function count_responden_status_respon($id){
		$data= $this->get_select("SELECT id_biodata FROM biodata WHERE prodi='$id'");
		return $data['data'];
	}
	// end count responden statis_respon
	
	// get data fakultas
	public function get_data_fakultas(){
		$data= $this->get_select("SELECT id_fakultas,fakultas FROM fakultas ORDER BY fakultas ASC");
		return $data['data'];
	}
	// end get data fakultas

	// count prodi where fakultas
	public function count_all_prodi_in_fakultas($id){
		$prodi= $this->get_select("SELECT id_prodi,id_fakultas FROM prodi WHERE id_fakultas='$id'");
		$data_prodi= $prodi['data'];
		$count_add="";
		foreach ($data_prodi as $key => $value) {
			$data_alumni=  $this->get_select("SELECT id_alumni FROM alumni_daftar WHERE prodi='$value->id_prodi'");
			// $data_alumni=$this->count_populasi_target('25');
			// count data alumni where prodi = $value
			$count= count($data_alumni['data']);
			$count_add += $count;
		}
		return $count_add;
	}
	// end count prodi where fakultas

	// count fill prodi where fakultas
	public function count_fill_prodi_in_fakultas($id){
		$prodi= $this->get_select("SELECT id_prodi,id_fakultas FROM prodi WHERE id_fakultas='$id'");
		$data_prodi= $prodi['data'];
		$count_add="";
		foreach ($data_prodi as $key => $value) {
			$data_alumni=  $this->get_select("SELECT id_alumni FROM biodata WHERE prodi='$value->id_prodi'");
			// $data_alumni=$this->count_populasi_target('25');
			// count data alumni where prodi = $value
			$count= count($data_alumni['data']);
			$count_add += $count;
		}
		return $count_add;
	}
	// end count fill prodi where fakultas

	// statis_respon
	// public function 
	// end statis_respon

	// Penekanan Aspek Pembelajaran (Mean)

	public function get_aspek_pembelajaran($id){
		$data= $this->get_select("
							SELECT
								tb_a.id_alumni,
								tb_a.a1_1,
								tb_a.a1_2,
								tb_a.a1_3,
								tb_a.a1_4,
								tb_a.a1_5,
								tb_a.a1_6,
								tb_a.a1_7
							FROM tb_a
						    INNER JOIN biodata 
						        ON (tb_a.id_alumni = biodata.id_alumni)
						    WHERE biodata.prodi='{$id}'");
		return $data['data'];
	}

	// end Penekanan Aspek Pembelajaran (Mean)

	// Cara Mencari Pekerjaan Pertama
	public function get_mencari_pekerjaan($id){
		$data= $this->get_select("
							SELECT
								tb_b.id_alumni,
								tb_b.b3
							FROM tb_b
						    INNER JOIN biodata 
						        ON (tb_b.id_alumni = biodata.id_alumni)
						    WHERE biodata.prodi='{$id}'");
		return $data['data'];
	}
	// end Cara Mencari Pekerjaan Pertama

	// Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara
	public function get_jumlah_perusahaan($id){
		$data= $this->get_select("
							SELECT
								tb_b.id_alumni,
								tb_b.b5,
								tb_b.b6,
								tb_b.b7
                            FROM tb_b
                            INNER JOIN biodata 
						        ON (tb_b.id_alumni = biodata.id_alumni)
						    WHERE biodata.prodi='{$id}'");
		return $data['data'];
	}
	// end Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara

	// status kerja saat ini
	public function get_status_kerja($id){
		$data= $this->get_select("
							SELECT
								tb_c.id_alumni,
								tb_c.c1
                            FROM tb_c
                            INNER JOIN biodata 
						        ON (tb_c.id_alumni = biodata.id_alumni)
						    WHERE biodata.prodi='{$id}'");
		return $data['data'];
	}
	// end status kerja saat ini

	// Jenis organisasi tempat bekerja saat ini
	public function get_tempat_kerja($id){
		$data= $this->get_select("
							SELECT
								tb_c.id_alumni,
								tb_c.c4
                            FROM tb_c
                            INNER JOIN biodata 
						        ON (tb_c.id_alumni = biodata.id_alumni)
						    WHERE biodata.prodi='{$id}'");
		return $data['data'];
	} 
	// end Jenis organisasi tempat bekerja saat ini 

	// Pendapatan Alumni Setiap Bulan
	public function get_pendapatan($id){
		$data= $this->get_select("
							SELECT
								tb_c.id_alumni,
								tb_c.c7
                            FROM tb_c
                            INNER JOIN biodata 
						        ON (tb_c.id_alumni = biodata.id_alumni)
						    WHERE biodata.prodi='{$id}'");
		return $data['data'];
	} 
	// end Pendapatan Alumni Setiap Bulan

	// Hubungan Antara Bidang Studi Dengan Pekerjaan.
	public function get_hubungan_studi_pekerjaan($id){
		$data= $this->get_select("
							SELECT
								tb_d.id_alumni,
								tb_d.d11
                            FROM tb_d
                            INNER JOIN biodata 
						        ON (tb_d.id_alumni = biodata.id_alumni)
						    WHERE biodata.prodi='{$id}'");
		return $data['data'];
	} 
	// end Hubungan Antara Bidang Studi Dengan Pekerjaan.

	// Tingkat pendidikan yang paling tepat/sesuai untuk pekerjaan saat ini
	public function get_tingkat_pendidikan($id){
		$data= $this->get_select("
							SELECT
								tb_d.id_alumni,
								tb_d.d2
                            FROM tb_d
                            INNER JOIN biodata 
						        ON (tb_d.id_alumni = biodata.id_alumni)
						    WHERE biodata.prodi='{$id}'");
		return $data['data'];
	} 
	// end Tingkat pendidikan yang paling tepat/sesuai untuk pekerjaan saat ini


	// Kompetensi Statistik
	public function get_kompetensi($id){
		$data= $this->get_select("SELECT tb_e.e1,tb_e.e2
                            FROM
                                tb_e
                            INNER JOIN alumni_daftar 
                                ON (tb_e.id_alumni = alumni_daftar.id_alumni) WHERE alumni_daftar.prodi ='$id'
                            ");
		return $data['data'];
	}
	// end Kompetensi Statistik
}