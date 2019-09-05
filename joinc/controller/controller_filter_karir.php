<?php
	require '../model/model_karir.php';
	$karir= new Karir();

	if (isset($_POST['id_jabatan'])) {
		$id_jabatan= $_POST['id_jabatan'];
		// print_r($id_jabatan);

		// $arr = array('Hello','World!','Beautiful','Day!');
		// echo implode(",",$id_jabatan);

		$karir= $karir->get_karir_jabatan(implode(",",$id_jabatan));
		// var_dump($jabatan);

		if ($karir===NULL) {
			// load error view
			require '../view/karir/view_error.php';

		}else{
			// load view karir filter by jabatan
			require '../view/karir/view_karir_filter.php';
			
		}

	}

	// get id spesialis
	if (isset($_POST['id_spesialis'])) {
		$id_spesialis=$_POST['id_spesialis'];

		$karir= $karir->get_karir_spesialis($id_spesialis);
		// var_dump($spesialis);

		if ($karir===NULL) {
			// load error view
			require '../view/karir/view_error.php';
		}else{
			// load view karir filter by spesialis
			require '../view/karir/view_karir_filter.php';
			
		}
	}

	// get  id jenis lowongan
	if (isset($_POST['id_jenis'])) {
		$id_jenis=$_POST['id_jenis'];

		$karir= $karir->get_karir_jenis($id_jenis);
		// var_dump($jenis);

		if ($karir===NULL) {
			// load error view
			require '../view/karir/view_error.php';
		}else{
			$caption=$_POST['caption'];
			// load view karir filter by jenis
			require '../view/karir/view_karir_filter.php';
			
		}
	}

	// get id penempatan
	if (isset($_POST['id'])) {
		$id_penempatan= $_POST['id'];
		$karir= $karir->get_karir_penempatan($id_penempatan);
		// var_dump($penempatan);

		if ($karir===NULL) {
			// load error view
			require '../view/karir/view_error.php';
		}else{
			$caption = $_POST['caption'];
			
			// load view karir filter by penempatan
			require '../view/karir/view_karir_filter.php';
			
		}
	}

	// get id karir
	if (isset($_POST['id_karir'])) {
		$id_karir= $_POST['id_karir'];
		$karir= $karir->get_karir_one($id_karir);
		// var_dump($penempatan);

		if ($karir===NULL) {
			// load error view
			require '../view/karir/view_error.php';
		}else{
			function get_kota($id){
				// $this->connectMysql();
				$sql =mysql_query("SELECT propinsi_name FROM propinsi WHERE propinsi_id='{$id}'");
				$row=mysql_fetch_object($sql);
				$data= $row->propinsi_name;
				// $data= 'gdfgdf';
				return $data;
			}
			
			// load view karir filter by penempatan
			require '../view/karir/view_detail_karir.php';
			
		}
	}

	// paging
	if (isset($_POST['id_page'])) {
		$id_page= $_POST['id_page'];
		$karir= $karir->get_karir_page($id_page);

			// load view karir filter by penempatan
		// echo "$id_page";
		// echo "<pre>";
		// print_r($karir);
		// echo "</pre>";
		// load view karir filter by penempatan
		require '../view/karir/view_karir_paging.php';
	}

?>