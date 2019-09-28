<?php
class ControllerContent
{
	public function __construct($db_config){
		$this->Model 	= new ModelContent($db_config);
		$this->aksi		= 'joinc/model/ModelContent.php';
		$this->mod 	= empty($_GET['mod'])? NULL : $_GET['mod'];

		$this->load_mod();
	}

	public function load_mod()
	{
		if ( ! method_exists($this, $this->mod ) ) {
			echo json_encode(['error'=>"Method {$this->mod}() not found"]);

		} else {
			$this->{$this->mod}();
		}
	}

	/* ==================== START PAGE : HOME ==================== */
	public function home()
	{
		$rows['slide']		= $this->Model->home_slide();
		$rows['welcome']	= $this->Model->home_welcome()[0];
		$rows['karir']		= $this->Model->home_karir();
		$rows['agenda']		= $this->Model->home_agenda();
		$rows['kerjasama']	= $this->Model->home_kerjasama();
		include_once 'joinc/view/view_home.php';
	}
	public function home_sidebar()
	{
		$sid = session_id();
		$rows['user'] 		= $this->Model->home_sidebar_user($sid);
		$rows['alamat'] 	= $this->Model->home_sidebar_alamat()[0];
		$rows['banner'] 	= $this->Model->home_sidebar_banner();
		$rows['sosmed'] 	= $this->Model->home_sidebar_sosmed();
		require_once "joinc/view/view_home_sidebar.php";
	}
	public function statistik()
	{
		echo $this->Model->statistik();
	}
	/* ==================== END PAGE : HOME ==================== */

	/* switch (empty($_GET['mod'])? '': $_GET['mod']) {

			case 'profile':
				include_once 'joinc/profile.php';
				break;

			case 'service': 
				include_once 'joinc/service.php';
				break;

			case 'selesai': 
				include_once 'joinc/selesai.php';
				break;

			case 'kirim-pass': 
				include_once 'joinc/kirim_pass.php';
				break;

			case 'emailpass': 
				include_once 'joinc/aksi/aksikirim.php';
				break;

			case 'event': 
				include_once 'joinc/event.php';
				break;

			case 'karir':
				require 'joinc/controller/controller_karir.php';
				break;

			case 'kuesioner': 
				include_once 'joinc/biodata.php';
				break;

			case 'aksi_biodata': 
				include_once 'joinc/aksi/aksi_biodata.php';
				break;

			case 'kuesioner_a': 
				include_once 'joinc/kuis_a.php';
				break;

			case 'kuesioner_b': 
				include_once 'joinc/kuis_b.php';
				break;

			case 'kuesioner_c': 
				include_once 'joinc/kuis_c.php';
				break;

			case 'kuesioner_d': 
				include_once 'joinc/kuis_d.php';
				break;

			case 'kuesioner_e': 
				include_once 'joinc/kuis_e.php';
				break;

			case 'aksi_kuis_a': 
				include_once 'joinc/aksi/aksi_a.php';
				break;

			case 'aksi_kuis_b': 
				include_once 'joinc/aksi/aksi_b.php';
				break;

			case 'aksi_kuis_c': 
				include_once 'joinc/aksi/aksi_c.php';
				break;

			case 'aksi_kuis_d': 
				include_once 'joinc/aksi/aksi_d.php';
				break;

			case 'aksi_kuis_e': 
				include_once 'joinc/aksi/aksi_e.php';
				break;

			case 'tracer_pengguna':
				# code...
				include_once('joinc/controller/tracer_pengguna.php');
				break;

			case 'client': 
				include_once 'joinc/client.php';
				break;

			case 'publication': 
				include_once 'joinc/publication.php';
				break;

			case 'beasiswa': 
				include_once 'joinc/beasiswa.php';
				break;

			case 'program': 
				include_once 'joinc/program.php';
				break;

			case 'fasilitator': 
				include_once 'joinc/fasilitator.php';
				break;

			case 'partner': 
				include_once 'joinc/partner.php';
				break;

			case 'galeri': 
				include_once 'joinc/galeri.php';
				break;

			case 'album': 
				include_once 'joinc/album.php';
				break;

			case 'video': 
				include_once 'joinc/video.php';
				break;

			case 'foto': 
				include_once 'joinc/foto.php';
				break;

			case 'buku_tamu':
				include_once 'joinc/controller/controller_buku_tamu.php';
				break;

			case 'send_buku_tamu': 
				include_once 'joinc/controller/controller_buku_tamu.php';
				break;

			case 'contact': 
				include_once 'joinc/contact.php';
				break;

			case 'login': 
				include_once 'joinc/login_sukses.php';
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
				include_once 'joinc/detail/detail_publikasi.php';
				break;

			case 'detailbeasiswa': 
				include_once 'joinc/detail/detail_beasiswa.php';
				break;

			case 'daftaralumni': 
				include_once 'joinc/aksi/daftaralumni.php';
				break;

			case 'detailkarir': 
				include_once 'joinc/detail/detail_karir.php';
				break;

			case 'detailevent': 
				include_once 'joinc/detail/detail_event.php';
				break;

			case 'daftar': 
				include_once 'joinc/daftar.php';
				break;

			case 'pencarian': 
				include_once 'joinc/pencarian.php';
				break;
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
		} */
}
$load= new ControllerContent($db_config);

