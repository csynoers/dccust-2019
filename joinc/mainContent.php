<?php
class ControllerContent
{
	public $db_config;
	public function __construct($db_config){
		$this->db_config= $db_config;
		$this->Model 	= new ModelContent($this->db_config);
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
	public function daftar()
	{
		include_once 'joinc/daftar.php';
	}
	public function daftaralumni()
	{
		include_once 'joinc/aksi/daftaralumni.php';
	}
	public function kirim_pass(){
		include_once 'joinc/kirim_pass.php';
	}
	public function emailpass()
	{ 
		include_once 'joinc/aksi/aksikirim.php';
	}
	# end daftar alumni

	public function kuesioner()
	{
		if ( count($this->Model->cek_biodata($_SESSION['idnya'])) == 0 ) { # if empty 
			$this->kuesioner_biodata();
		} else {
			if ( count($this->Model->get_tracer_answers($_SESSION['rowuser']->nim,'tracer_study')) > 0 ) {
				echo "<script>alert('Maaf halaman ini sudah tidak tersedia'); window.history.back();</script>";
			} else {
				include_once 'joinc/view/tracer_study/view_kuesioner.php';
			}
			
		}
		
	}
	public function kuesioner_biodata()
	{
		$a= $this->Model->get_biodata($_SESSION['idnya'])[0];
		include_once 'joinc/view/tracer_study/view_biodata.php';
	}
	public function aksi_biodata()
	{
		$this->Model->post = $_POST;
		if ( $this->Model->biodata_insert() ) {
			header('Location:kuesioner.html');
		} else {
			echo "<script>alert('Biodata anda berhasil disimpan'); window.history.back();</script>";
			// echo "<script>alert('Biodata anda berhasil disimpan'); window.history.back();</script>";
		}
	}
	public function store_kuesioner()
	{
		$nim = $_SESSION['rowuser']->nim;
		$other_temp = [];
		$post = [];

		# start create other temp
		if ( $_POST['tracer_study'][0] ) {
			foreach ( $_POST['tracer_study'][0] as $a => $b ) {
				array_push($other_temp,$a);
			}
		}
		# end create other temp

		foreach ($_POST['tracer_study'] as $a => $b) {
			if ( $a == 0 ) {
				foreach ( $b as $c => $d ) {
					$answer = [
						'question_id' => $c,
						'nim' => $nim,
						'answer' => $d,
						'tracer_type' => 'tracer_study'
					];
					array_push($post,$answer);
				}
				
			} else {
				if ( is_array($b) ) {
					foreach ($b as $c => $d) {
						if ( ! in_array($c,$other_temp) ) {
							$answer = [
								'question_id' => $c,
								'nim' => $nim,
								'answer' => $d,
								'tracer_type' => 'tracer_study'
							];
							array_push($post,$answer);
						}
					}

				} else {
					if ( ! in_array($b,$other_temp) ) {
						$answer = [
							'question_id' => $b,
							'nim' => $nim,
							'answer' => $b,
							'tracer_type' => 'tracer_study'
						];
						array_push($post,$answer);
					}
					
				}
				
			}
			
		}
		
		$this->Model->post= $post;
		if ( $this->Model->kuesioner_insert() ) {
			echo "<script>alert('jawaban anda berhasil dikirim, terimakasih telah meluangkan waktunya '); window.location.assign('home-dccustjogja.html');</script>";
		}
	}
	/* ==================== END PAGE : TRACER STUDY ==================== */

	/* ==================== START PAGE : TRACER STUDY HELPER ==================== */
	protected function tracer_study($id=NULL)
	{
		return $this->Model->get_tracer_study($id);
	}
	protected function tracer_study_detail($id=NULL)
	{
		return $this->Model->get_tracer_study_detail($id);
	}
	protected function multiple_radio_button($rows){
		$html= '';	

		foreach ($rows as $key => $value) {
			$label= $this->methods($value);
			$add_wrapper_class= ($label['status']===FALSE ? NULL : 'wrap_other' );
			$html .= "
				<tr>
					<td style='padding:1em'>".($key+1)."</td>
					<td><div class='radio'><label><input type='radio' data-name='tracer_study[{$value->tracer_study_id}{$value->tracer_study_detail_id}][{$value->tracer_study_detail_id}]' value='1' required=''></label></div></td>
					<td><div class='radio'><label><input type='radio' data-name='tracer_study[{$value->tracer_study_id}{$value->tracer_study_detail_id}][{$value->tracer_study_detail_id}]' value='2' required=''></label></div></td>
					<td><div class='radio'><label><input type='radio' data-name='tracer_study[{$value->tracer_study_id}{$value->tracer_study_detail_id}][{$value->tracer_study_detail_id}]' value='3' required=''></label></div></td>
					<td><div class='radio'><label><input type='radio' data-name='tracer_study[{$value->tracer_study_id}{$value->tracer_study_detail_id}][{$value->tracer_study_detail_id}]' value='4' required=''></label></div></td>
					<td><div class='radio'><label><input type='radio' data-name='tracer_study[{$value->tracer_study_id}{$value->tracer_study_detail_id}][{$value->tracer_study_detail_id}]' value='5' required=''></label></div></td>
					<td style='padding:1em 0em'>{$label['html']}</td>
				</tr>
			";
		}

		return "
			<table class='table table-striped table-condensed table-hover'>
				<thead>
					<tr>
						<th colspan='4'>Tidak sama sekali</th>
						<th colspan='4'>Sangat besar</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style='width: 45px;padding:1em'>No</td>
						<td style='width: 45px;padding:1em 0.5em'>1</td>
						<td style='width: 45px;padding:1em 0.5em'>2</td>
						<td style='width: 45px;padding:1em 0.5em'>3</td>
						<td style='width: 45px;padding:1em 0.5em'>4</td>
						<td style='width: 45px;padding:1em 0.5em'>5</td>
						<td style='padding:1em 0em'>Pertanyaan</td>
					</tr>
					{$html}
				</tbody>
			</table>
		";
	}

	protected function single_radio_button($rows){
		$html= '';
		foreach ($rows as $key => $value) {
			$label= $this->methods($value);
			$adds = [
				'wrapper_class' => ($value->method=='false' ? NULL : 'wrap_other' ),
				'events'		=> [
					'AddData' 	=> ($value->event=='false'? '' : $this->add_events($value)),
					'AddClass' 	=> ($value->event=='false'? '' : 'tracer-detail-event'),
				],
			];
			$html .= "
				<div class='radio {$adds['wrapper_class']}'>
					<label>
						<input {$adds['events']['AddData']} class='{$adds['events']['AddClass']}' type='radio' data-name='tracer_study[0{$value->tracer_study_id}]' value='{$value->tracer_study_detail_id}'>
						{$label['html']}
					</label>
				</div>
			";
		}
		return "
			<div class='col-sm-12'>
				<div class='wrap_single_radio'>
					{$html}
				</div>
			</div>
		";
	}
	protected function checkbox($rows){
		$html= '';		
		foreach ($rows as $key => $value) {
			$label = $this->methods($value);
			$add_wrapper_class= ($label['status']===FALSE ? NULL : 'wrap_other' );
			$html .= '
				<div class="checkbox '.$add_wrapper_class.'">
					<label>
						<input type="checkbox" data-name="tracer_study['.$value->tracer_study_id.$value->tracer_study_detail_id.']" value="'.$value->tracer_study_detail_id.'" >
						'.$label['html'].'
					</label>
				</div>';
		}

		return "
			<div clas='col-sm-12'>
				<div class='wrap_checkbox'>
					{$html}	
				</div>
			</div>
		";
	}
	protected function none($rows)
	{
		// return print_r($rows);
		return NULL;
	}
	protected function methods($row){
		$output = [];
		switch ($row->method) {
			case 'input_number':
				$output['status'] = TRUE;
				$output['html'] = "<td><input min='1' type='number' data-name='tracer_study[0][{$row->tracer_study_detail_id}]' class='other form-control' placeholder='Masukan angka min 1...' ></td>";
				$output['html'] .= '<td>&nbsp;&nbsp;'.strip_tags($row->tracer_study_detail_title).'</td>';
				$output['html'] = "<table><tr class='form-inline'>{$output['html']}</tr></table>";
				break;

			case 'input_currency':
				$output['status'] = TRUE;
				$output['html'] = "<td><input min='1' type='number' data-name='tracer_study[0][{$row->tracer_study_detail_id}]' class='other form-control' placeholder='Ex: 3000000' ></td>";
				$output['html'] .= '<td>&nbsp;&nbsp;'.strip_tags($row->tracer_study_detail_title).'</td>';
				$output['html'] = "<table><tr class='form-inline'>{$output['html']}</tr></table>";
				break;
			
			case 'input_text':
				$output['status'] = TRUE;
				$output['html'] = '<td>'.strip_tags($row->tracer_study_detail_title).'&nbsp;&nbsp;</td>';
				$output['html'] .= "<td><input type='text' data-name='tracer_study[0][{$row->tracer_study_detail_id}]' class='other form-control' placeholder='Masukan lainnya ...' ></td>";
				$output['html'] = "{$output['html']}";
				break;
			
			default:
				# code...
				$output['status'] = FALSE;
				$output['html'] = strip_tags($row->tracer_study_detail_title);
				// $output['html'] = strip_tags(json_encode($row));
				
				break;
		}
		return $output;
	}
	protected function add_events($row)
	{
		$output= [];
		switch ($row->event) {
			case 'onselect':
				# code...
				$output['attr'] = 'data-event="onselect" ';
				foreach ($this->Model->get_tracer_events($row->tracer_study_detail_id) as $key => $value) {
					$output['attr'] .= "data-action='{$value->action}' "; 
					$output['attr'] .= "data-target-{$value->action}='{$value->json_desc}'"; 
				} 
				break;
			
			default:
				# code...
				break;
		}
		return $output['attr'];
	}
	protected function input_text($row)
	{
		return '<input data-name="tracer_study[0]['.$row->tracer_study_detail_id.']" name="tracer_study[0]['.$row->tracer_study_detail_id.']" type="text" class="other form-control" placeholder="Masukan lainnya ..." >';
	}
	protected function input_number($rows)
	{
		$html = "";
		foreach ($rows as $key => $value) {
			$html .= '
				<tr class="form-inline">
					<td><input min="1" type="number" name="tracer_study[0]['.$value->tracer_study_detail_id.']" class="form-control" placeholder="Masukan angka min 1..." required></td>
					<td>&nbsp;&nbsp;'.strip_tags($value->tracer_study_detail_title).'</td
				</tr>
			';
		}
		return "<table>{$html}</table>";
	}
	/* ==================== END PAGE : TRACER STUDY HELPER==================== */

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

