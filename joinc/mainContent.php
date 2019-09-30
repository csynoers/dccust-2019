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
	
	/* ==================== START PAGE : PROFIL ==================== */
	public function profile()
	{
		$row= $this->Model->profile()[0];
		include_once 'joinc/view/view_profile.php';
	}
	/* ==================== END PAGE : PROFIL ==================== */
	
	/* ==================== START PAGE : KARIR ==================== */
	public function karir()
	{
		# get data slide
		$slide= $this->Model->db->get_select("SELECT nama_header_ina AS name_header_ina,gambar AS img_src FROM header where id_header='7'")['data'][0];
		#  get data tingkat jabatan
		$jabatan= $this->Model->db->get_select("SELECT id,name FROM tingkat_jabatan ORDER BY name ASC")['data'];
		#  get data spesiailisasi pekerjaan
		$spesialis= $this->Model->db->get_select("SELECT id_spes,nama_spes FROM spesialis ORDER BY nama_spes ASC")['data'];
		# get data jenis lowongan
		$jenis= $this->Model->db->get_select("SELECT id,name FROM jenis_lowongan ORDER BY name ASC")['data'];
		# get data penempatan
		$penempatan= $this->Model->db->get_select("SELECT propinsi_id,propinsi_name FROM propinsi ORDER BY propinsi_name ASC")['data'];
		# get data karir
		$karir= $this->Model->db->get_select("SELECT *,DATE_FORMAT(karir.deadline, '%W,  %d %b %Y') AS deadline_mod FROM karir ORDER BY id_karir DESC LIMIT 5")['data'];

		# load view karir
		require 'joinc/view/karir/view_karir.php';
	}
	public function detailkarir()
	{
		$header = $this->Model->karir_detail_header()[0];
		$row = $this->Model->karir_detail($_GET['id'])[0];
		include_once 'joinc/view/karir/view_detail_karir.php';
	}
	/* ==================== END PAGE : KARIR ==================== */
	
	/* ==================== START PAGE : TRACER STUDY ==================== */
	public function kuesioner()
	{
		include_once 'joinc/view/tracer_study/view_biodata.php';
	}
	/* ==================== END PAGE : TRACER STUDY ==================== */

	/* ==================== START PAGE : INFO ==================== */
	public function event()
	{
		$header = $this->Model->event_header()[0];
		$rows = $this->Model->event();
		include_once 'joinc/view/view_event.php';
	}
	public function detailevent()
	{
		$header = $this->Model->event_header()[0];
		$row = $this->Model->event_detail($_GET['id'])[0];
		include_once 'joinc/view/view_event_detail.php';
	}
	public function publication()
	{
		$header= $this->Model->publication_header()[0];
		$rows= $this->Model->publication();
		include_once 'joinc/view/view_publication.php';
	}
	public function detailpublikasi()
	{
		$header= $this->Model->publication_header()[0];
		$row= $this->Model->publication_detail($_GET['id'])[0];
		include_once 'joinc/view/view_publication_detail.php';
	}
	/* ==================== END PAGE : INFO ==================== */

	/* ==================== START PAGE : BEASISWA ==================== */
	public function beasiswa()
	{
		$header = $this->Model->beasiswa_header()[0];
		$rows = $this->Model->beasiswa(); 
		include_once 'joinc/view/view_beasiswa.php';
	}
	public function detailbeasiswa()
	{
		$header = $this->Model->beasiswa_header()[0];
		$row = $this->Model->beasiswa_detail($_GET['id'])[0];
		include_once 'joinc/view/view_beasiswa_detail.php';
	}
	/* ==================== END PAGE : BEASISWA ==================== */

	/* ==================== START PAGE : PROGRAM ==================== */
	public function program()
	{
		$header= $this->Model->program_header()[0];
		$row= $this->Model->program($_GET['id'])[0];
		include_once 'joinc/view/view_program.php';
	}
	/* ==================== END PAGE : PROGRAM ==================== */

	/* ==================== START PAGE : GALERI ==================== */
	public function album()
	{
		$row = $this->Model->album_header()[0];
		$rows = $this->Model->album();
		include_once 'joinc/view/view_album.php';
	}
	public function galeri()
	{
		$row = $this->Model->galeri_header()[0];
		$rows = $this->Model->galeri($_GET['id']);
		include_once 'joinc/view/view_galeri.php';
	}
	public function video()
	{
		$row = $this->Model->video_header()[0];
		$rows = $this->Model->video();
		include_once 'joinc/view/view_video.php';
	}
	/* ==================== END PAGE : GALERI ==================== */

	/* ==================== START PAGE : CONTACT ==================== */
	public function buku_tamu()
	{
		$row= $this->Model->buku_tamu_header();
		$rows= $this->Model->buku_tamu();
		include_once 'joinc/view/view_buku_tamu.php';
	}
	public function send_buku_tamu()
	{
		$this->Model->post= $_POST;
		if ($this->Model->buku_tamu_insert()) {
			echo "<script>confirm('Data Berhasil Dikirim')</script>";

		}else{
			echo "<script>confirm('Data Gagal Dikirim')</script>";

		}
		echo "<script>window.location = 'buku-tamu-dccustjogja.html';</script>";
	}
	public function contact()
	{
		$row = $this->Model->contact()[0];
		include_once 'joinc/view/view_contact.php';
	}
	public function simpancontactus()
	{
		$this->Model->post = $_POST;
		$admin = $this->Model->db->get_select("SELECT * FROM modul WHERE id_modul='7'")['data'][0];
		//pengiriman email akan berfungsi jika sudah online	
		if ($this->Model->contact_insert()) {
			mail($admin->link,$this->Model->post['nama'],$this->Model->post['message'],"From: {$this->Model->post['email']}\n"); 
			echo "<script type='text/javascript'>alert('Your message was succesfull!.'); window.location.href='contact-us-dccustjogja.html'</script>";
		}else{
			echo "<script type='text/javascript'>alert('Your message was failed!.'); window.location.href='contact-us-dccustjogja.html'</script>";
		}
	}
	/* ==================== END PAGE : CONTACT ==================== */


	/* switch (empty($_GET['mod'])? '': $_GET['mod']) {

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

			case 'fasilitator': 
				include_once 'joinc/fasilitator.php';
				break;

			case 'partner': 
				include_once 'joinc/partner.php';
				break;

			case 'foto': 
				include_once 'joinc/foto.php';
				break;

			case 'login': 
				include_once 'joinc/login_sukses.php';
				break;

			case 'daftaralumni': 
				include_once 'joinc/aksi/daftaralumni.php';
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

