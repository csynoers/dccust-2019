<?php
    //start session
    session_start();
    
    include_once "josys/minify_helper.php";
    ob_start('minify_html');

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

    // ob_end_flush();
    // echo ob_get_clean();