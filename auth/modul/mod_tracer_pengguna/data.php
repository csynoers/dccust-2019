<?php
	require_once "../../../josys/koneksi.php";
	require_once "../../../josys/dbHelper.php";
	require_once "../../../josys/fungsi_indotgl.php";
	$data= array();
	$db = new dbHelper($db_config);
	$data['bidang-usaha']=[
	'1'=>'Pertanian, Perburuan dan Kehutanan',
		'Perikanan',
		'Pertambangan dan Penggalian',
		'Industri Pengolahan',
		'Listrik, Gas dan Air',
		'Kontruksi',
		'Perdagangan Besar & Eceran: Reparasi, dan Keperluan Rumah Tangga',
		'Penyediaan Akomodasi dan Penyediaan Makan Minum',
		'Tranportasi, Pergudangan dan komunikasi',
		'Perantara Keuangann',
		'Real Estat, Usaha Persewaan dan Jasa Perusahaan',
		'Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial',
		'Jasa Pendidikan',
		'Jasa Kesehatan dan Kegiatan Sosial',
		'Jasa Kemasyarakatan, Sosial, dan Kegiatan Lainnya',
		'Jasa Perorangan',
		'Badan Internasional dan Badan Ekstra Internasional Lainya',
		'Kegiatan Yang Belum Jelas Batasannya',
	];
	$data['kemampuan']=[
		'1'=>'Integritas (etika dan moral)',
			'Keahlian berdasarkan bidang ilmu (profesionalisme)',
			'Keluasan wawasan antar disiplin ilmu',
			'Kepemimpinan',
			'Kemampuan alumni dalam bekerja secara mandiri',
			'Kemampuan alumni dalam bekerja dalam tim',
			'kemampuan bahasa asing',
			'Penggunaan Teknologi Informasi',
			'Kemampuan berkomunikasi',
			'Kedisiplinan',
			'Kejujuran',
			'Motivasi Kerja',
			'Pengembangan Diri',
			'inovasi dan Kreativitas',
			'Kemampuan menyelesaikan masalah ',
	];
	$data['tanggapan']=[
		'1'=>'Sangat Baik',
			'Baik',
			'Cukup',
			'Kurang',
	];

	$data['get'] = [];
	$_REQUEST['bidang_usaha']=='null'? null : $data['get']['tracer_pengguna.tracer_usaha'] = $_REQUEST['bidang_usaha']  ;
	$_REQUEST['lembaga_provinsi']=='null'? null : $data['get']['tracer_pengguna.tracer_prop']=$_REQUEST['lembaga_provinsi']  ;
	$_REQUEST['lembaga_kabupaten']=='null'? null : $data['get']['tracer_pengguna.tracer_kab']=$_REQUEST['lembaga_kabupaten']  ;

	$no=1;
	if ( count($data['get']) < 1 ) {
		$data['tracer']= $db->get_select("SELECT
				tracer_pengguna.tracer_id,
				tracer_pengguna.tracer_title,
				tracer_pengguna.tracer_desc,
				tracer_pengguna.tracer_prop,
				tracer_pengguna.tracer_kab,
				tracer_pengguna.tracer_usaha,
				tracer_pengguna.tracer_timestamp,
				province.title AS province_title,
				city.title AS city_title
				FROM tracer_pengguna,province,city
				WHERE
					province.id_province=tracer_pengguna.tracer_prop
					AND city.id_city=tracer_pengguna.tracer_kab 
				ORDER BY tracer_pengguna.tracer_timestamp ASC
			");
	}else{
		$data['where']='';
		foreach ($data['get'] as $key => $value) {
			$data['where'] .= ' AND '.$key.'='.$value;
		}
		$data['tracer']= $db->get_select("SELECT
				tracer_pengguna.tracer_id,
				tracer_pengguna.tracer_title,
				tracer_pengguna.tracer_desc,
				tracer_pengguna.tracer_prop,
				tracer_pengguna.tracer_kab,
				tracer_pengguna.tracer_usaha,
				tracer_pengguna.tracer_timestamp,
				province.title AS province_title,
				city.title AS city_title
				FROM tracer_pengguna,province,city
				WHERE
					province.id_province=tracer_pengguna.tracer_prop
					AND city.id_city=tracer_pengguna.tracer_kab
					$data[where] 
				ORDER BY tracer_pengguna.tracer_timestamp ASC
			");
		
	}
	// print_r($data);
	echo '
		<tr>
			<tr>
				<th rowspan="2">No</th> 
				<th colspan="4">Identitas Pengisi</th>
				<th colspan="6">Identitas Lembaga Perusahaan</th>
				<th colspan="2">Informasi Umum</th>
				<th colspan="16">Informasi Kemampuan Alumni</th>
				<th colspan="1" rowspan="2">Date</th>
			</tr>
			<tr>  
				<th>Nama</th> 
				<th>Jabatan</th> 
				<th>Email</th> 
				<th>No. Telp</th> 
				<th>Nama Perusahaan</th> 
				<th>Alamat Perusahaan</th> 
				<th>Provinsi</th> 
				<th>Kabupaten</th> 
				<th>No. Telp/Faks</th> 
				<th>Bidang Usaha</th> 
				<th>Nama</th> 
				<th>Asal Program Studi</th>'; 
				// <th>Jenis Kemampuan</th> 
				// <th>Tanggapan</th>
				foreach ($data['kemampuan'] as $key => $value) {
					echo "<th>$value</th>";
				}
				echo ' 
				<th>Pesan Studi</th> 
			</tr>
		</tr>
	';
	foreach ($data['tracer']['data'] as $key => $value) {
		$tracer_desc= json_decode($value->tracer_desc);
		$identitas_pengisi= json_decode($tracer_desc->identitas_pengisi);
		$identitas_lembaga= json_decode($tracer_desc->identitas_lembaga);
		$informasi_umum= json_decode($tracer_desc->informasi_umum);
		$kemampuan= json_decode($tracer_desc->kemampuan);
		// echo "<pre>";
		// print_r($kemampuan);
		// echo "</pre>";
		$nama_alumni='';
		$asal_program_studi='';
		$noInfo=1;
		foreach ($informasi_umum->daftar_alumni as $key => $value_informasi_umum) {
			$nama_alumni .= $noInfo.'. '.$value_informasi_umum->nama_alumni;
			$nama_alumni .= '<br>';
			$asal_program_studi .= $value_informasi_umum->asal_program_studi;
			$asal_program_studi .= '<br>';
			$noInfo++;
		}
		$jenis_kemampuan='';
		$tanggapan='';
		$noKemampuan=1;
		// foreach ($kemampuan->jenis_kemampuan as $key => $value_kemampuan) {
			// $jenis_kemampuan .= $noKemampuan.'. '.$data['kemampuan'][$value_kemampuan->id_kemampuan];
			// $jenis_kemampuan .= '<br>';
			// $tanggapan .= $data['tanggapan'][$value_kemampuan->id_tanggapan];
			// $tanggapan .= '<br>';
			// $noKemampuan++;
		// }
		echo "
			<tr>
				<td>$no</td>
				<td rowspan='0'>".$identitas_pengisi->nama_alumni."</td>
				<td>".$identitas_pengisi->jabatan_alumni."</td>
				<td>".$identitas_pengisi->email_alumni."</td>
				<td>".strval($identitas_pengisi->no_telp_alumni)."</td>
				<td>".$identitas_lembaga->lembaga_nama."</td>
				<td>".$identitas_lembaga->lembaga_alamat."</td>
				<td>$value->province_title</td>
				<td>$value->city_title</td>
				<td>".$identitas_lembaga->lembaga_no_telp_faks."</td>
				<td>".$data['bidang-usaha'][$value->tracer_usaha]."</td>
				<td>$nama_alumni</td>
				<td>$asal_program_studi</td>
				<!--<td>$jenis_kemampuan</td>-->
				<!--<td>$tanggapan</td>-->";
				foreach ($kemampuan->jenis_kemampuan as $key => $value_k) {
					echo "<td>$value_k->id_tanggapan</td>";;
				}
				echo "
				<td>".$kemampuan->pesan_studi."</td>
				<td>".tanggal_indo($tanggal=date('Y-m-d',strtotime($value->tracer_timestamp)), $cetak_hari = true)."</td>
			</tr>
		";
		$no++;
	}
	echo '
	';
?>