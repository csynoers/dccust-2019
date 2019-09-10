<?php
	require_once '../../josys/koneksi.php';
	require_once '../../josys/dbHelper.php';
	$db = new dbHelper($db_config);

	if (isset($_POST['id_jabatan'])) {
		$caption = empty($_POST['caption'])? NULL : $_POST['caption'] ;
		$id_jabatan= implode(",",$_POST['id_jabatan']);
		$karir= $db->get_select("SELECT *,DATE_FORMAT(karir.deadline, '%W,  %d %b %Y') AS deadline_mod FROM karir WHERE tingkat_jabatan IN ({$id_jabatan}) ORDER BY id_karir DESC");

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
		$caption = empty($_POST['caption'])? NULL : $_POST['caption'] ;
		$karir= $db->get_select("SELECT *,DATE_FORMAT(karir.deadline, '%W,  %d %b %Y') AS deadline_mod FROM karir WHERE id_spes='{$_POST['id_spesialis']}' ORDER BY id_karir DESC");

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
		$caption = empty($_POST['caption'])? NULL : $_POST['caption'] ;
		$id_jenis=$_POST['id_jenis'];
		if ($id_jenis=='zero') {
			$karir= $db->get_select("SELECT *,DATE_FORMAT(karir.deadline, '%W,  %d %b %Y') AS deadline_mod FROM karir ORDER BY id_karir DESC");			
		}else{
			$karir= $db->get_select("SELECT *,DATE_FORMAT(karir.deadline, '%W,  %d %b %Y') AS deadline_mod FROM karir WHERE jenis_lowongan='{$id_jenis}' ORDER BY id_karir DESC");
		}

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
		$caption = empty($_POST['caption'])? NULL : $_POST['caption'] ;
		$id_penempatan= $_POST['id'];
		if ($id_penempatan=='00') {
			$karir= $db->get_select("SELECT *,DATE_FORMAT(karir.deadline, '%W,  %d %b %Y') AS deadline_mod FROM karir");
		}else{
			$karir= $db->get_select("SELECT *,DATE_FORMAT(karir.deadline, '%W,  %d %b %Y') AS deadline_mod FROM karir WHERE lokasi='{$id_penempatan}'");
		}

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
		$karir= $db->get_select("SELECT *,DATE_FORMAT(karir.deadline, '%W,  %d %b %Y') AS deadline_mod FROM karir WHERE id_karir <= {$_POST['id_page']} ORDER BY id_karir DESC LIMIT 1");
		// load view karir filter by penempatan
		require '../view/karir/view_karir_paging.php';
	}

?>