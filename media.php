<?php
//start session
ob_start();
session_start();
// error_reporting(-1);

include_once "josys/koneksi.php"; #include config connection
include_once "josys/class_paging.php";
include_once "josys/paging.php";
include_once "josys/library.php";
include_once "josys/fungsi_indotgl.php";
include_once "josys/fungsi_rupiah.php";
include_once "josys/dbHelper.php"; #inlcude database helper
$db = new dbHelper($db_config);
include "template_home.php";# include template

ob_end_flush();
