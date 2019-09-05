<?php
	// load model karir
	require 'joinc/model/model_karir.php';
	require_once 'josys/fungsi_indotgl.php';

	// membuat model karir baru dalam variabel $karir
	$karir= new Karir();

	// get data slide
	$slide= $karir->get_slide();

	// get data tingkat jabatan
	$jabatan= $karir->get_jabatan();

	// get data spesiailisasi pekerjaan
	$spesialis= $karir->get_spesialis();

	//get data jenis lowongan
	$jenis= $karir->get_jenis_lowongan();

	//get data penempatan
	$penempatan= $karir->get_penempatan();

	//get data karir
	$karir= $karir->get_karir();

	// echo "<pre>";
	// print_r($slide);
	// echo "</pre>";

	// load view karir
	require 'joinc/view/karir/view_karir.php';