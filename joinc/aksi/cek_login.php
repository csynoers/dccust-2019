<?php
include "../../josys/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$email = anti_injection($_POST['username']);
$pass   = anti_injection(md5($_POST['password']));


$login=mysql_query("SELECT * FROM alumni_daftar WHERE email='$email' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
	session_start();
	$sid  = session_id();
  $_SESSION['idnya']=$r['id_alumni'];
  mysql_query("UPDATE alumni_daftar SET id_session='$sid' WHERE email='$email'");
  header('location:home-dccustjogja.html');
}
else{
  ?>
  <script type="text/javascript">
    alert("Login gagal mohon masukkan username dan password yg benar");
  </script>
  <meta http-equiv="refresh" content="0; url=home-dccustjogja.html">
  <?php
  
  }
?>