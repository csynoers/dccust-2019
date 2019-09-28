<?php
switch (empty($_GET['mod'])? '': $_GET['mod']) {
	case 'home':
		include_once 'joinc/view/view_home.php';
		break;
	case 'profile':
		include_once 'joinc/profile.php';
		break;

	case 'service': 
		include 'joinc/service.php';
		break;

	case 'selesai': 
		include 'joinc/selesai.php';
		break;

	case 'kirim-pass': 
		include 'joinc/kirim_pass.php';
		break;

	case 'emailpass': 
		include 'joinc/aksi/aksikirim.php';
		break;

	case 'event': 
		include 'joinc/event.php';
		break;

	case 'karir':
		require 'joinc/controller/controller_karir.php';
		break;

	case 'kuesioner': 
		include 'joinc/biodata.php';
		break;

	case 'aksi_biodata': 
		include 'joinc/aksi/aksi_biodata.php';
		break;

	case 'kuesioner_a': 
		include 'joinc/kuis_a.php';
		break;

	case 'kuesioner_b': 
		include 'joinc/kuis_b.php';
		break;

	case 'kuesioner_c': 
		include 'joinc/kuis_c.php';
		break;

	case 'kuesioner_d': 
		include 'joinc/kuis_d.php';
		break;

	case 'kuesioner_e': 
		include 'joinc/kuis_e.php';
		break;

	case 'aksi_kuis_a': 
		include 'joinc/aksi/aksi_a.php';
		break;

	case 'aksi_kuis_b': 
		include 'joinc/aksi/aksi_b.php';
		break;

	case 'aksi_kuis_c': 
		include 'joinc/aksi/aksi_c.php';
		break;

	case 'aksi_kuis_d': 
		include 'joinc/aksi/aksi_d.php';
		break;

	case 'aksi_kuis_e': 
		include 'joinc/aksi/aksi_e.php';
		break;

	case 'tracer_pengguna':
		# code...
		include_once('joinc/controller/tracer_pengguna.php');
		break;

	case 'client': 
		include 'joinc/client.php';
		break;

	case 'publication': 
		include 'joinc/publication.php';
		break;

	case 'beasiswa': 
		include 'joinc/beasiswa.php';
		break;

	case 'program': 
		include 'joinc/program.php';
		break;

	case 'fasilitator': 
		include 'joinc/fasilitator.php';
		break;

	case 'partner': 
		include 'joinc/partner.php';
		break;

	case 'galeri': 
		include 'joinc/galeri.php';
		break;

	case 'album': 
		include 'joinc/album.php';
		break;

	case 'video': 
		include 'joinc/video.php';
		break;

	case 'foto': 
		include 'joinc/foto.php';
		break;

	case 'buku_tamu':
		include 'joinc/controller/controller_buku_tamu.php';
		break;

	case 'send_buku_tamu': 
		include 'joinc/controller/controller_buku_tamu.php';
		break;

	case 'contact': 
		include 'joinc/contact.php';
		break;

	case 'login': 
		include 'joinc/login_sukses.php';
		break;

	case 'simpancontactus':
			
		$email = mysql_query("SELECT * FROM modul WHERE id_modul='7' ");
		$temail=mysql_fetch_array($email);

		$nama 		= trim($_POST['nama']);
		$email 		= trim($_POST['email']);
		$phone	 	= trim($_POST['phone']);
		$subject	= trim($_POST['subject']);
		$message	= trim($_POST['message']);

		//pengiriman email akan berfungsi jika sudah online	
		mail("$temail[link]",$nama,$pesan,"From: $email\n"); 

		mysql_query("INSERT INTO contact(nama, email, phone, subject, message, tanggal ) 
						 VALUES('$nama','$email', '$phone', '$subject', '$message', now() )");
		
		echo "<script type='text/javascript'>alert('Your message was succesfull!.'); window.location.href='contact-us-dccustjogja.html'</script>";

		break;
		
	case 'detailpublikasi': 
		include 'joinc/detail/detail_publikasi.php';
		break;

	case 'detailbeasiswa': 
		include 'joinc/detail/detail_beasiswa.php';
		break;

	case 'daftaralumni': 
		include 'joinc/aksi/daftaralumni.php';
		break;

	case 'detailkarir': 
		include 'joinc/detail/detail_karir.php';
		break;

	case 'detailevent': 
		include 'joinc/detail/detail_event.php';
		break;

	case 'daftar': 
		include 'joinc/daftar.php';
		break;

	case 'pencarian': 
		include 'joinc/pencarian.php';
		break;
	// case 'proses-tracer-pengguna':
	// 	# code...
	// 	echo json_encode(['hetml'=>'sdfsdfs']);
	// 	// echo "string";
	// 	break;	
	default:
		# code...
		echo "
		<div class='container'>
			<div class='col-sm-12'>
				<div class='col-sm-12'>
					<center><div class='alert alert-info' style='margin:15rem'>Error 404</div></center>
				</div>
			</div>
		</div>";
		break;
}

