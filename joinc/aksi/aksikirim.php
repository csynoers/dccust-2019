<?php
mysql_query("UPDATE alumni_daftar SET email = '$_POST[email]' WHERE nim = '$_POST[nim]'");
$useralumni = mysql_query("SELECT * FROM alumni_daftar WHERE nim = '$_POST[nim]'");
$dalumni = mysql_fetch_assoc($useralumni);
$subjek = "AKUN MEMBER ALUMNI DCC UST";
$isi = "<b>DCC Universitas Sarjanawiyata Tamansiswa</b><br /><br />
		<b>Data Alumni</b><br /><br />
		<b>NIM : ".$dalumni['nim']."</b><br /><br />
		<b>Nama Alumni : ".$dalumni['nama_alumni']."</b><br /><br />
		<b>Username Alumni : ".$_POST['email']."</b><br /><br />
		<b>Password Alumni : ".$dalumni['re_password']."</b><br /><br />
		";
$headers = "From: admin@dcc.ustjogja.ac.id \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($dalumni['email'],$subjek,$isi,$headers);

//mail('bayu0701@gmail.com',$subjek,$isi,$headers);




echo '<div class="alert alert-warning alert-dismissable">
			Username dan Password anda telah dikirim ke email '.$dalumni['email'].'.<br>Klik <a class="alert-link" href="javascript:history.go(-1)
			"><b>Kirim Ulang</b></a> Apabila anda belum menerima email dari kami.
</div>';
?>