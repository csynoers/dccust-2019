<?php
    //start session
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once "josys/minify_helper.php";
    ob_start('minify_html');
    // ob_start('minify_css');
    // ob_start('minify_js');

    include_once "josys/koneksi.php"; #include config connection
    include_once "josys/class_paging.php";
    include_once "josys/paging.php";
    include_once "josys/library.php";
    include_once "josys/fungsi_indotgl.php";
    include_once "josys/fungsi_rupiah.php";
    include_once "josys/dbHelper.php"; #inlcude database helper
    $db = new dbHelper($db_config);

    include_once "joinc/model/ModelContent.php";# include Model Content
    
    $seo = new ModelContent($db_config);
    include_once "template_home.php";# include template

    ob_end_flush();
    // echo ob_get_clean();
