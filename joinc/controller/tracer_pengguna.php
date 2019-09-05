<?php
	
	// load model buku tamu
	// require_once 'joinc/model/model_tracer_pengguna.php';
	$data = [];
	$act = !empty($_GET['act'])? $_GET['act']: '';
	// print_r($act);
	if ($act=='pengguna-login') {
		$data['post']=[
			'users_email'=>input('username'),
			'users_password'=>md5(input('password')),
			'users_level'=>'tracer-pengguna',
		];
		$data['users']= $db->select($table='user', $where=$data['post']);
		$data['cek']= count($data['users']['data']);
		// $data['cek_session']= count($_SESSION['tracer-pengguna']);
		if ( $data['cek'] > 0 ) {
			# data found
			if ($data['users']['data'][0]->users_status=='true') {
				# tracer sudah selesai
				echo "<script>alert('Maaf Akun Sudah Digunakan, Silahkan Hubungi Administrator Jika Anda Merasa Belum Menggunakan.'); window.location.assign('home-dccustjogja.html');</script>";
			}else{
				#code 
				$_SESSION['tracer-pengguna']=[
					'users_id'=>$data['users']['data'][0]->users_id,
					'users_email'=>$data['users']['data'][0]->users_email,
					'users_password'=>$data['users']['data'][0]->users_password,
					'users_level'=>'tracer-pengguna',
				];
				header('Location:tracer-identitas-pengisi.html');
			}
		}else{
			# data not found
			// echo "string";
			echo "<script>alert('Maaf Akun Anda Belum Terdaftar.'); window.location.assign('home-dccustjogja.html');</script>";
			
		}


		// echo "<pre>";
		// print_r($data);
		// print_r($_SESSION);
		// echo "</pre>";
	}
	
	if (empty($_SESSION['tracer-pengguna'])) {
		echo "<script>alert('Maaf Kamu Harus Login Terlebih Dahulu'); window.location.assign('home-dccustjogja.html');</script>";
	}else{

		switch ($act) {
			case 'identitas-lembaga':
				# code...
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
				require_once('joinc/view/tracer_pengguna/identitas_lembaga.php');
				break;

			case 'informasi-umum':
				# code...
				require_once('joinc/view/tracer_pengguna/informasi_umum.php');
				break;

			case 'informasi-kemampuan-alumni':
				# code...
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
				require_once('joinc/view/tracer_pengguna/informasi_kemampuan_alumni.php');
				break;
			
			default:
				# code...
				require_once('joinc/view/tracer_pengguna/identitas_pengisi.php');
				break;
		}

	}
	// echo"<pre>";
	// print_r($data);
	// echo"</pre>";
	// session_unset();
?>