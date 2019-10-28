<?php
$rows = $this->Model->db->get_select("SELECT nim FROM alumni_daftar WHERE nim = '$_POST[nim]'");
if ( count($rows['data']) > 0) {
	$nim = $_POST['nim'];
	header('Location:kirim-pass-'.$nim.'.html');
}else{
	echo '<div class="alert alert-warning alert-dismissable">
			Anda tidak terdaftar sebagai alumni. <a class="alert-link" href="javascript:history.go(-1)"><b>Cek nim anda Lagi</b></a>.
	</div>';
}
/*$sid 		= session_id();
$pass = md5($_POST['password']);

if(!empty($_POST['kode'])) {
	if($_POST['kode'] == $_POST['rahasia']) {

				mysql_query("INSERT INTO alumni_daftar(nim, nama_alumni, fakultas, prodi, angkatan, email, phone, username, password, id_session) 
				 			VALUES('$_POST[nim]','$_POST[nama]','$_POST[fak]','$_POST[prodi]','$_POST[angk]', '$_POST[email]','$_POST[phone]','$_POST[username]','".$pass."','$sid')");
				echo '<script>alert("Terimakasih Telah Mendaftar.")</script>';
				echo '<meta http-equiv="refresh" content="1; url=home-dccustjogja.html" />';
	} else {
				echo '	<div class="alert alert-warning alert-dismissable">
							Hitungan Anda salah, ulangi lagi. <a class="alert-link" href="javascript:history.go(-1)"><b>Ulangi Lagi</b></a>.
						</div>';
		}
} else {
	
	echo '	<div class="alert alert-warning alert-dismissable">
					Anda belum memasukkan kode. <a class="alert-link" href="javascript:history.go(-1)"><b>Ulangi Lagi</b></a>.
				</div>';	
}*/
?>