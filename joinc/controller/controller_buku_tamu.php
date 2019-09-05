<?php
	
	// load model buku tamu
	require 'joinc/model/model_buku_tamu.php';

	// load function tanggal indo
	// require_once 'josys/fungsi_indotgl.php';

	// membuat model buku tamu baru dalam variabel $bk
	$buku_tamu= new Buku_tamu();
	// $buku_tamu= new Buku_tamu($db_config);

	if ($_GET['mod']=='buku_tamu'){
		// get data header
		// $header= $buku_tamu->get_header('16');
		// $data_header= $header[0];

		// $get_buku_tamu= $buku_tamu->get_buku_tamu();

		// load view buku tamu
		// require 'joinc/view/buku_tamu/view_buku_tamu.php';
	}elseif($_GET['mod']=='send_buku_tamu'){
		$data= array(
					'name'=> htmlspecialchars($_POST['name']),
					'email'=> strip_tags($_POST['email']),
					'message_fill'=> htmlspecialchars($_POST['message_fill'])
					);
		
		$status= $buku_tamu->insert_buku_tamu($data);
		if ($status=='success') {
			echo "<script>confirm('Data Berhasil Dikirim')</script>";

		}else{
			echo "<script>confirm('Data Gagal Dikirim')</script>";

		}
		echo "<script>window.location = 'buku-tamu-dccustjogja.html';</script>";

	}