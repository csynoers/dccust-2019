<?php

	// load model buku tamu
	require_once('model_buku_tamu.php');

	//initialize model buku tamu
	$buku_tamu= new Buku_tamu();

		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		case 'edit':
			//action edit guest boook
			
			if ($_GET['saving']==0) {
				$view_one = $buku_tamu->get_one_buku_tamu($_GET['id']);

				// load view edit buku tamu
				require_once('view_edit_buku_tamu.php');

			}elseif($_GET['saving']==1){
				//get data from POST form and save to variable $data
				$data= array(
							'id'=> $_POST['id'],
							'status'=> $_POST['opt']
							);

				// call function update header buku tamu with image
				$status= $buku_tamu->update_buku_tamu($data);

				if ($status=='success') {
					echo "<script>alert('Data Berhasil Di Update')</script>";

				}else{
					echo "<script>alert('Data Gagal Di Simpan')</script>";

				}
				echo "<script>window.location = 'media.php?module=buku_tamu';</script>";
			}

			break;

		case 'delete':
			//action delete guest book
			$status= $buku_tamu->delete_buku_tamu($_GET['id']);

			// if process delete is success
			if ($status=='success') {
				echo "<script>alert('Data Berhasil Dihapus')</script>";

			}else{
				echo "<script>alert('Data Gagal Dihapus')</script>";

			}
			echo "<script>window.location = 'media.php?module=buku_tamu';</script>";

			break;

		case 'update_header':
			//action update header
			
			if ($_GET['saving']==0) {
				// get data header
				$header= $buku_tamu->get_header();

				// load view edit header guest book
				require_once('view_edit_header.php');

			}elseif($_GET['saving']==1){
				//load function thumb
				require_once("../josys/fungsi_thumb.php");

				//get lokasi temporary image
				$lokasi_file    = $_FILES['fupload']['tmp_name'];

				//get file type
				$tipe_file      = $_FILES['fupload']['type'];

				//get nama file Upload
				$nama_file      = $_FILES['fupload']['name'];

				//create number random 0- 999999
				$acak           = rand(000000,999999);

				//create nama file use random
				$nama_file_unik = $acak.$nama_file;

				// Apabila ada gambar yang diupload
				if (!empty($lokasi_file)){

					if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/gif" AND $tipe_file != "image/png"){
						echo "<script>alert('Maaf! Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.GIF, *.PNG.'); window.location = '../../media.php?module=$module';</script>";
					}

					// get data header
					$header= $buku_tamu->get_header();

					// check file exist image
					if ((file_exists('../joimg/header_image/'.$header[0]->gambar))===TRUE) {
						// if image file available in this directory then remove this file
						unlink("../joimg/header_image/".$header[0]->gambar);

						// change with new image
						ImageUpload($fupload_name=$nama_file_unik, $to_dir='../joimg/header_image/');

					}else{
						// Upload Image
						ImageUpload($fupload_name=$nama_file_unik, $to_dir='../joimg/header_image/');
					}


					//get data from POST form and save to variable $data
					$data= array(
								'id_header'=> $_POST['id'],
								'nama_header_ina'=> $_POST['nama_header_ina'],
								'isi_header_ina'=>$_POST['isi_header_ina'],
								'gambar'=> $nama_file_unik,
								'tanggal'=>date("Y-m-d H:i:s")
								);

					// call function update header buku tamu with image
					$status= $buku_tamu->update_header($data);
					

				}else{//if no img uploaded
					//get data from POST form and save to variable $data
					$data= array(
								'id_header'=> $_POST['id'],
								'nama_header_ina'=> $_POST['nama_header_ina'],
								'isi_header_ina'=>$_POST['isi_header_ina'],
								'tanggal'=> date("Y-m-d H:i:s")
								);

					// call function update header buku tamu without img
					$status = $buku_tamu->update_header($data);
				}

				if ($status=='success') {
					echo "<script>window.location = 'media.php?module=buku_tamu';</script>";

				}else{
					echo "<script>window.location = 'media.php?module=buku_tamu';</script>";
					
				}

			}

			break;

		default:
			// if no action or default page for guest book
			$guest_book= $buku_tamu->get_buku_tamu();
			require 'view_buku_tamu.php';

			break;
	}