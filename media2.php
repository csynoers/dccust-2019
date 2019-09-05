<?php
//start session
ob_start();
session_start();
// error_reporting(-1);
//require system files
include_once "josys/koneksi.php";
include_once "josys/class_paging.php";
include_once "josys/paging.php";
include_once "josys/library.php";
include_once "josys/fungsi_indotgl.php";
include_once "josys/fungsi_rupiah.php";
include_once "josys/dbHelper.php";
$db = new dbHelper($db_config);
// filter input
include_once 'josys/fungsi_input.php';
//include_once template
include_once "template_dua.php";
ob_end_flush();
