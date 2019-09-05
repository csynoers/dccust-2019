<?php
include "../josys/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "<link href='./style2.css' rel='stylesheet' type='text/css' />";
  echo " <br />
  <br /> <br />
  <br /> <br />
  <br /> <br />
  <br /><div align='center'><div id='content'>
  <div align='center'><br /> 
  

   
    <table width='303' border='0' cellpadding='0' cellspacing='0' class='form3'>
  <tr>
    <td><div align='center'><a href='javascript:history.go(-1)'><b><img src='images/icn_alert_info.png' width='24' height='24' border='0'/></b></a><br />
       
            <a href='javascript:history.go(-1)'><b>Ulangi Sekali Lagi</b></a> </div></td>
  </tr>
</table>
    <br /> 
  <br />
  </div> 
</div>";
}
else{
$login=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_assoc($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION['namauser']     = $r['username'];
  $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['passuser']     = $r['password'];
  $_SESSION['leveluser']    = $r['level'];

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  mysql_query("UPDATE users SET id_session='$sid_baru' WHERE username='$username'");
  header('location:media.php?module=home');
}
else{
  echo "<link href='./style2.css' rel='stylesheet' type='text/css' />";
  echo " <br />
  <br /> <br />
  <br /> <br />
  <br /> <br />
  <br /><div align='center'><div id='content'>
  <div align='center'><br /> 
  

   
    <table width='303' border='0' cellpadding='0' cellspacing='0' class='form5'>
  <tr>
    <td><div align='center'><a href='javascript:history.go(-1)'><b><img src='images/icn_alert_info.png' width='24' height='24' border='0'/></b></a><br />
      Username atau Password Anda tidak benar <br />
            <a href='javascript:history.go(-1)'><b>Ulangi Lagi</b></a> Sekali lagi </div></td>
  </tr>
</table>
    <br /> 
  <br />
  </div> 
</div>";
}}
?>
