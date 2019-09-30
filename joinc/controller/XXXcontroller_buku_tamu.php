<?php

	if ($_GET['mod']=='buku_tamu'){
		$row= $db->select('header',array('id_header'=> '16'))['data'][0];
		$get_buku_tamu= $db->select('guest_book',array('status'=> '1'))['data'];
		// load view buku tamu
		require 'joinc/view/buku_tamu/view_buku_tamu.php';
	}elseif($_GET['mod']=='send_buku_tamu'){
		$data= array(
					'name'=> htmlspecialchars($_POST['name']),
					'email'=> strip_tags($_POST['email']),
					'message_fill'=> htmlspecialchars($_POST['message_fill']),
					'status' => '0'
					);
		$status = $db->insert("guest_book",$data, array('name', 'email', 'message_fill', 'status'))['status'];
		if ($status=='success') {
			echo "<script>confirm('Data Berhasil Dikirim')</script>";

		}else{
			echo "<script>confirm('Data Gagal Dikirim')</script>";

		}
		echo "<script>window.location = 'buku-tamu-dccustjogja.html';</script>";

	}