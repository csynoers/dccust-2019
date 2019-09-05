<?php
	require_once "../../../josys/dbHelper.php";
	require_once "../../../josys/fungsi_indotgl.php";
	$data= array();
	$db = new dbHelper();
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

	$data['get'] = [];
	$_REQUEST['bidang_usaha']=='null'? null : $data['get']['tracer_pengguna.tracer_usaha'] = $_REQUEST['bidang_usaha']  ;
	$_REQUEST['lembaga_provinsi']=='null'? null : $data['get']['tracer_pengguna.tracer_prop']=$_REQUEST['lembaga_provinsi']  ;
	$_REQUEST['lembaga_kabupaten']=='null'? null : $data['get']['tracer_pengguna.tracer_kab']=$_REQUEST['lembaga_kabupaten']  ;


	$no=1;
	if ( count($data['get']) < 1 ) {
		$data['tracer']= $db->get_select("SELECT
				tracer_pengguna.tracer_id,
				tracer_pengguna.tracer_title,
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
	echo '
	<table class="display" id="biodata"> 
		<thead> 
			<tr>  
				<th>No</th> 
				<th>Nama Alumni</th> 
				<th>Bidang Usaha</th> 
				<th>Provinsi</th> 
				<th>Kabupaten</th> 
				<th>Date</th> 
				<th>Action</th>
			</tr>
		</thead> 
	';
	foreach ($data['tracer']['data'] as $key => $value) {
		echo '
			<tr>  
				<td align="center">'.$no.'</td> 
				<td align="center">'.json_decode($value->tracer_title).'</td> 
				<td>'.$data['bidang-usaha'][$value->tracer_usaha].'</td>
				<td>'.$value->province_title.'</td>
				<td>'.$value->city_title.'</td>
				<td>'.tanggal_indo($tanggal=date('Y-m-d',strtotime($value->tracer_timestamp)), $cetak_hari = true).'</td>
				<td align="center">
					<a onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')" href="modul/mod_tracer_pengguna/aksi_mod_tracer_pengguna.php?modul=tracer-pengguna&act=hapus&id='.$value->tracer_id.'" ><input type="image" src="images/icn_trash.png" title="Trash"></a>
				</td> 
			</tr>
		';
		$no++;
	}
	echo '
		</tbody> 
	</table>
	';
	// print_r($data['where']);
?>