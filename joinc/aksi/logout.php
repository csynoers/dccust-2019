<?php
session_start();
include('../../josys/koneksi.php');
$sid  = session_id();
$ses = mysql_query("SELECT * FROM alumni_daftar WHERE id_session='$sid'");
$s=mysql_fetch_array($ses);
$ses = mysql_query("UPDATE alumni_daftar SET id_session = '0' WHERE id_alumni = '$s[id_alumni]'");
session_regenerate_id();
header('location:index.php');
?>
