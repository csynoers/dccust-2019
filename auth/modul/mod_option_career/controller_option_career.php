<?php
// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<link href='style.css' rel='stylesheet' type='text/css'>
		<center>Untuk mengakses modul, Anda harus login <br>";
 	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else {
	// load model career
	require 'model_option_career.php';

	// initialize model option career
	$career= new Career($db_config);

	isset($_GET['act'])? $act=$_GET['act']: $act='';
	switch ($act) {
		case 'insert':
			isset($_GET['saving'])? $saving=$_GET['saving']: $saving='';
			if ($saving=='') {
				if ($_GET['opt']=='jenis') {
					// load view insert jenis lowongan
					require 'view_insert_jenis.php';

				}elseif ($_GET['opt']=='spesialis') {
					// load view insert spesialisasi pekerjaan
					require 'view_insert_spesialis.php';

				}elseif ($_GET['opt']=='jabatan') {
					// load view insert tingkat jabatan
					require 'view_insert_jabatan.php';

				}elseif ($_GET['opt']=='penempatan') {
					// load view insert penempatan
					require 'view_insert_penempatan.php';

				}

			}elseif ($_GET['saving']==1) {
				if ($_GET['opt']=='jenis') {
					// get data from action and save to variabel data array mode
					$data= array('description'=> $_POST['desc']);

					// call function insert new data
					$career->insert_jenis($data['description']);

					//location header
					echo "<script>window.location = 'media.php?module=option_career';</script>";
					

				}elseif ($_GET['opt']=='spesialis') {
					// get data from action and save to variabel data array mode
					$data= array('description'=> $_POST['desc']);

					// call function insert new data
					$career->insert_spesialis($data['description']);

					//location header
					echo "<script>window.location = 'media.php?module=option_career';</script>";
					

				}elseif ($_GET['opt']=='jabatan') {
					// get data from action and save to variabel data array mode
					$data= array('description'=> $_POST['desc']);

					// call function insert new data
					$career->insert_jabatan($data['description']);

					//location header
					echo "<script>window.location = 'media.php?module=option_career';</script>";
					

				}elseif ($_GET['opt']=='penempatan') {
					// get data from action and save to variabel data array mode
					$data= array('description'=> $_POST['desc']);

					// call function insert new data
					$career->insert_penempatan($data['description']);

					//location header
					echo "<script>window.location = 'media.php?module=option_career';</script>";					

				}

			}

			break;
		
		case 'edit':
			// get data id from url
			$id=$_GET['id'];

			if ($_GET['saving']==0) {
				if ($_GET['opt']=='jenis') {
					// get data jenis lowongan
					$description= $career->get_jenis_where('name',$id);

					// load view insert jenis lowongan
					require 'view_edit_jenis.php';

				}elseif ($_GET['opt']=='spesialis') {
					// get data spesialisasi pekerjaan
					$description= $career->get_spesialis_where('nama_spes',$id);

					// load view edit spesialisasi pekerjaan
					require 'view_edit_spesialis.php';

				}elseif ($_GET['opt']=='jabatan') {
					// get data tingkat jabatan
					$description= $career->get_jabatan_where('name',$id);
	
					// load view edit tingkat jabatan
					require 'view_edit_jabatan.php';

				}elseif ($_GET['opt']=='penempatan') {
					// get data penempatan
					$description= $career->get_penempatan_where('propinsi_name',$id);

					// load view edit penempatan
					require 'view_edit_penempatan.php';

				}

			}elseif ($_GET['saving']==1) {
				if ($_GET['opt']=='jenis') {
					// get data from action and save to variabel data array mode
					$data= array('id'=>$id,'description'=> $_POST['desc']);

					// call function insert new data
					$career->update_jenis($data['id'],$data['description']);

					//location header
					echo "<script>window.location = 'media.php?module=option_career';</script>";
					

				}elseif ($_GET['opt']=='spesialis') {
					// get data from action and save to variabel data array mode
					$data= array('id'=>$id,'description'=> $_POST['desc']);

					// call function update new data
					$career->update_spesialis($data['id'],$data['description']);

					//location header
					echo "<script>window.location = 'media.php?module=option_career';</script>";
					

				}elseif ($_GET['opt']=='jabatan') {
					// get data from action and save to variabel data array mode
					$data= array('id'=>$id,'description'=> $_POST['desc']);

					// call function update new data
					$career->update_jabatan($data['id'],$data['description']);

					//location header
					echo "<script>window.location = 'media.php?module=option_career';</script>";
					

				}elseif ($_GET['opt']=='penempatan') {
					// get data from action and save to variabel data array mode
					$data= array('id'=>$id,'description'=> $_POST['desc']);

					// call function update new data
					$career->update_penempatan($data['id'],$data['description']);

					//location header
					echo "<script>window.location = 'media.php?module=option_career';</script>";					

				}

			}
			break;

		case 'delete':
			// get id from url
			$id=$_GET['id'];

			if ($_GET['opt']=='jenis') {
				//call delete method
				$career->delete_jenis($id);

				//location header
				echo "<script>window.location = 'media.php?module=option_career';</script>";
				
			}elseif ($_GET['opt']=='spesialis') {
				//call delete method
				$career->delete_spesialis($id);

				//location header
				echo "<script>window.location = 'media.php?module=option_career';</script>";

			}elseif ($_GET['opt']=='jabatan') {
				//call delete method
				$career->delete_jabatan($id);

				//location header
				echo "<script>window.location = 'media.php?module=option_career';</script>";

			}elseif ($_GET['opt']=='penempatan') {
				//call delete method
				$career->delete_penempatan($id);

				//location header
				echo "<script>window.location = 'media.php?module=option_career';</script>";

			}

			break;

		default:
			// get data jenis lowongan
			$jenis_lowongan= $career->get_jenis_lowongan();

			// get data spesialisasi pekerjaan
			$spesialis= $career->get_spesialis();

			// get data tingkat jabatan
			$jabatan= $career->get_jabatan();

			// get data penempatan
			$penempatan= $career->get_penempatan();

			// if no action or default page for career
			require 'view_option_career.php';
			break;
	}
} 