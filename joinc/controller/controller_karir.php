<?php
	// load model karir
	// require 'joinc/model/model_karir.php';
	require_once 'josys/fungsi_indotgl.php';

	// membuat model karir baru dalam variabel $karir
	// $karir= new Karir();

	// get data slide
	$slide= $db->get_select("SELECT nama_header_ina AS name_header_ina,gambar AS img_src FROM header where id_header='7'")['data'][0];

	// get data tingkat jabatan
	$jabatan= $db->get_select("SELECT id,name FROM tingkat_jabatan ORDER BY name ASC")['data'];

	// get data spesiailisasi pekerjaan
	$spesialis= $db->get_select("SELECT id_spes,nama_spes FROM spesialis ORDER BY nama_spes ASC")['data'];

	//get data jenis lowongan
	$jenis= $db->get_select("SELECT id,name FROM jenis_lowongan ORDER BY name ASC")['data'];

	//get data penempatan
	$penempatan= $db->get_select("SELECT propinsi_id,propinsi_name FROM propinsi ORDER BY propinsi_name ASC")['data'];

	//get data karir
	$karir= $db->get_select("SELECT * FROM karir ORDER BY id_karir DESC LIMIT 5")['data'];

	// echo "<pre>";
	// print_r($slide);
	// echo "</pre>";

	// load view karir
	require 'joinc/view/karir/view_karir.php';