<?php
error_reporting(0);
  // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "joinc/counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	$tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

	echo "
	<table width='100%' style='border:1px dotted #cccccc;'>
	<tr>
		<td width='69'><img src='img/chart/06.png' style='width: 13px;'> Today</td>
		<td width='17'>: <b>$pengunjung</b></td>
		<td width='66'><img src='img/chart/06.png' style='width: 13px;'> Visitor</td>
		<td width='20'>: <b>$totalpengunjung</b></td>
	</tr>
	<tr>
		<td><img src='img/chart/02.png' style='width: 13px;'>Hits Today</td>
		<td>: <b>$hits[hitstoday]</b></td>
		<td><img src='img/chart/04.png' style='width: 13px;'>Online</td>
		<td>: <b>$pengunjungonline</b></td>
	</tr>
	<tr>
		<td><img src='img/chart/03.png' style='width: 13px;'>Total Hits</td>
		<td>: <b>$totalhits</b></td>
	</tr>
	</table>
	";
?>
