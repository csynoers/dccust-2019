<?php
// session_start();
	if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<link href='style.css' rel='stylesheet' type='text/css'>
		<center>Untuk mengakses modul, Anda harus login <br>";
 	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else {
	// load model career
	require 'model_career.php';

	//initialize model career
	$career= new Career($db_config);

	isset($_GET['act'])? $act=$_GET['act'] : $act='';
	switch ($act) {
		case 'insert':
			isset($_GET['saving'])? $saving=$_GET['saving'] : $saving='';
			if ($saving!='1') {
				//get jenis lowongan
				$jenis_lowongan= $career->get_jenis_lowongan();

				//get data spesialisasi
				$spesialisasi= $career->get_spesialisasi();

				//get data tingkat jabatan
				$tingkat_jabatan= $career->get_tingkat_jabatan();

				//get data kota
				$kota= $career->get_kota();

				// load view insert new career
				require 'view_insert.php';

			}elseif ($_GET['saving']=='1'){
				// load function seo
				include "../josys/fungsi_seo.php";

				//load function thumb
				include "../josys/fungsi_thumb.php";

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

				//create seo title 
				$judul_seo_ina      = seo_title($_POST['judul_karir']);

				//get data from POST form and save to variable $data
				$data= array(
							'id_spes'=> $_POST['spes'],
							'judul_karir'=>$_POST['judul_karir'],
							'perusahaan_karir'=> $_POST['perusahaan_karir'],
							'jenis_lowongan'=> $_POST['jenis_lowongan'],
							'tingkat_jabatan'=> $_POST['tingkat_jabatan'],
							'isi_karir'=> $_POST['isi_karir'],
							'deadline'=> $_POST['waktu'],
							'lokasi'=> $_POST['lokasi'],
							'gambar'=> $nama_file_unik,
							'seo_ina'=> $judul_seo_ina
							);

				// Apabila ada gambar yang diupload
				if (!empty($lokasi_file)){
					//if lokasi file mnot empthy call function UploadKarir
					UploadKarir($data['gambar']);

					// call function insert new career
					$career->insert_career(
							$data['id_spes'],
							$data['judul_karir'],
							$data['perusahaan_karir'],
							$data['jenis_lowongan'],
							$data['tingkat_jabatan'],
							$data['isi_karir'],
							$data['deadline'],
							$data['lokasi'],
							$data['gambar'],
							$data['seo_ina']
							);

				}else{//if no img uploaded
					// call function insert new career without img
					$career->insert_career_without_img(
							$data['id_spes'],
							$data['judul_karir'],
							$data['perusahaan_karir'],
							$data['jenis_lowongan'],
							$data['tingkat_jabatan'],
							$data['isi_karir'],
							$data['deadline'],
							$data['lokasi'],
							$data['seo_ina']
							);
				}

				//if 
				echo "<script>window.location = 'media.php?module=karir';</script>";
			}
			break;
		
		case 'edit':
			//get id karir
			$id= $_GET['id'];

			//get data career where id = $id
			$edit_career= $career->get_career_where($id);

			if ($_GET['saving']=='0') {

				//get jenis lowongan
				$jenis_lowongan= $career->get_jenis_lowongan();

				//get data spesialisasi
				$spesialisasi= $career->get_spesialisasi();

				//get data tingkat jabatan
				$tingkat_jabatan= $career->get_tingkat_jabatan();

				//get data kota
				$kota= $career->get_kota();

				//view edit career
				require 'view_edit_career.php';

			}elseif ($_GET['saving']=='1'){
				// load function seo
				include "../josys/fungsi_seo.php";

				//load function thumb
				include "../josys/fungsi_thumb.php";

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

				//create seo title 
				$judul_seo_ina      = seo_title($_POST['judul_karir']);

				//get data from POST form and save to variable $data
				$data= array(
							'id'=> $id,
							'id_spes'=> $_POST['spes'],
							'judul_karir'=>$_POST['judul_karir'],
							'perusahaan_karir'=> $_POST['perusahaan_karir'],
							'jenis_lowongan'=> $_POST['jenis_lowongan'],
							'tingkat_jabatan'=> $_POST['tingkat_jabatan'],
							'isi_karir'=> $_POST['isi_karir'],
							'deadline'=> $_POST['waktu'],
							'lokasi'=> $_POST['lokasi'],
							'gambar'=> $nama_file_unik,
							'seo_ina'=> $judul_seo_ina
							);

				// Apabila ada gambar yang diupload
				if (!empty($lokasi_file)){
					//if lokasi file not empthy call function UploadKarir
					UploadKarir($data['gambar']);

					// call function insert new career
					$career->update_career(
							$data['id'],
							$data['id_spes'],
							$data['judul_karir'],
							$data['perusahaan_karir'],
							$data['jenis_lowongan'],
							$data['tingkat_jabatan'],
							$data['isi_karir'],
							$data['deadline'],
							$data['lokasi'],
							$data['gambar'],
							$data['seo_ina']
							);

				}else{//if no img uploaded
					// call function insert new career without img
					$career->update_career_without_img(
							$data['id'],
							$data['id_spes'],
							$data['judul_karir'],
							$data['perusahaan_karir'],
							$data['jenis_lowongan'],
							$data['tingkat_jabatan'],
							$data['isi_karir'],
							$data['deadline'],
							$data['lokasi'],
							$data['seo_ina']
							);
				}

				//if 
				echo "<script>window.location = 'media.php?module=karir';</script>";
			}
			break;

		case 'delete':
			//action delete career
			$id= $_GET['id'];
			$img= $career->name_img($id);
			// $career->delete_career($id);
			if($img!=''){
				$career->delete_career($id);
			    unlink("../joimg/karir/$img");   
			} else {
				$career->delete_career($id); 
			}
			echo "<script>window.location = 'media.php?module=karir';</script>";

			break;

		default:
			// if no action or default page for career
			$career= $career->get_career();
			require 'view_career.php';
			break;
	}
} 