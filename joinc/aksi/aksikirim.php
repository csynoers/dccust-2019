<?php

$data_update= [
	'email'=> $_POST['email'],
];
$data_where= [
	'nim'=> $_POST['nim']
];
$this->Model->db->update('alumni_daftar', $data_update, $data_where, array_keys($data_update))['status'];


$dalumni= $this->Model->db->get_select("SELECT * FROM alumni_daftar WHERE nim = '{$_POST['nim']}'")['data'][0];
$subjek = "AKUN MEMBER ALUMNI DCC UST";
$isi = "<b>DCC Universitas Sarjanawiyata Tamansiswa</b><br /><br />
		<b>Data Alumni</b><br /><br />
		<b>NIM : ".$dalumni->nim."</b><br /><br />
		<b>Nama Alumni : ".$dalumni->nama_alumni."</b><br /><br />
		<b>Username Alumni : ".$_POST['email']."</b><br /><br />
		<b>Password Alumni : ".$dalumni->re_password."</b><br /><br />
		";
$headers = "From: admin@dcc.ustjogja.ac.id \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($dalumni->email,$subjek,$isi,$headers);

//mail('bayu0701@gmail.com',$subjek,$isi,$headers);




echo '
	<div class="alert alert-warning alert-dismissable">
		Username dan Password anda telah dikirim ke email '.$dalumni->email.' jika tidak ada email di kotak masuk coba lihat di spam.<br>
		Klik
		<a class="alert-link" href="javascript:history.go(-1) ">
			<b>Kirim Ulang</b>
		</a>
		Apabila anda belum menerima email dari kami.
	</div>
';
?>