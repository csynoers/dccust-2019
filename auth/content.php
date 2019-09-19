<?php
include_once "../josys/library.php";
include_once "../josys/fungsi_combobox.php";
include_once "../josys/fungsi_indotgl.php";
include_once "../josys/class_paging.php";
include_once "../josys/fungsi_rupiah.php";

switch ($_GET['module']) {
  case 'home':
	class Statistik extends dbHelper
	{
		# Statistik user
		public $ip; // Mendapatkan IP komputer user
		public $tanggal; // Mendapatkan tanggal sekarang
		public $waktu; //
		
		# stats Overview
		public $pengunjung;
		public $hits;
		public $total_pengunjung;
		public $total_hits;
		public $pengunjung_online;
		
		public function __construct($db_config){
			parent::__construct($db_config);
			$this->ip       = $_SERVER['REMOTE_ADDR'];
			$this->tanggal  = date("Y-m-d");
			$this->waktu    = time();

			$this->pengunjung 		= $this->pengunjung();
			$this->hits 			= $this->hits();
			$this->total_pengunjung = $this->total_pengunjung();
			$this->total_hits 		= $this->total_hits();
			$this->pengunjung_online= $this->pengunjung_online();
		}

		public function pengunjung()
		{
			$rows= $this->get_select("SELECT * FROM statistik WHERE tanggal='{$this->tanggal}' GROUP BY ip");
			return count($rows['data']);
		}

		public function hits()
		{
			return $this->get_select("SELECT SUM(hits) AS hits_count FROM statistik WHERE tanggal='{$this->tanggal}'")['data'][0]->hits_count;
		}

		public function total_pengunjung()
		{
			return $this->get_select("SELECT COUNT(hits) AS total_pengunjung FROM statistik")['data'][0]->total_pengunjung;
		}

		public function total_hits()
		{
			return $this->get_select("SELECT SUM(hits) AS hits_count FROM statistik")['data'][0]->hits_count;
		}

		public function pengunjung_online()
		{
			$rows = $this->get_select("SELECT * FROM statistik WHERE online > ".($this->waktu - 300)."");
			return count($rows['data']);
		}
		
	}

	$statistik= new Statistik($db_config);
    
    # code...
  if ($_SESSION['leveluser']=='admin'){
  ?>
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="alert alert-info fade in alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Info!</strong> Selamat Datang Di DCC UST JOGJA admin panel.
      </div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><i class="fa fa-bar-chart" aria-hidden="true"></i> Stats</h4>
			</div>

			<div class="panel-body">        				
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Today</p>
						<p class="overview_count"><?php echo $statistik->pengunjung ?></p>
						<p class="overview_type">Visits</p>
						<p class="overview_count"><?php echo $statistik->hits ?></p>
						<p class="overview_type">Views</p>
					</div>
					<div class="overview_previous">
						<p class="overview_day">All Time</p>
						<p class="overview_count"><?php echo $statistik->total_pengunjung ?></p>
						<p class="overview_type">Visits</p>
						<p class="overview_count"><?php echo $statistik->total_hits ?></p>
						<p class="overview_type">Views</p>
					</div>
				</article>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel .panel-primary -->
    </div>
      
  <?php
  }
  break;

	// Bagian informasi Home
	case 'halaman_home':
		if ($_SESSION['leveluser']=='admin'){			
			include_once "modul/mod_home/ModelHome.php";
			include_once "modul/mod_home/ControllerHome.php";
		}
    	break;

	// Bagian informasi profile
	case 'profile':
		if ($_SESSION['leveluser']=='admin'){
			include_once "../josys/helper_upload.php";
			include_once "modul/mod_profile/ModelProfile.php";
			include_once "modul/mod_profile/ControllerProfile.php";
		}
		break;

	// Bagian informassi Artikel
	case 'artikel':
		if ($_SESSION['leveluser']=='admin'){
			include_once "../josys/helper_upload.php";
			include_once "../josys/fungsi_seo.php";
			include_once "modul/mod_artikel/ModelArtikel.php";
			include_once "modul/mod_artikel/ControllerArtikel.php";
		}
		break;

	// Bagian informasi program
	case 'program':
		if ($_SESSION['leveluser']=='admin'){
			include_once "../josys/helper_upload.php";
			include_once "../josys/fungsi_seo.php";
			include_once "modul/mod_program/ModelProgram.php";
			include_once "modul/mod_program/ControllerProgram.php";
		}
		break;

	// Bagian informasi beasiswa
	case 'beasiswa':
		if ($_SESSION['leveluser']=='admin'){
			include_once "../josys/helper_upload.php";
			include_once "../josys/fungsi_seo.php";
			include_once "modul/mod_beasiswa/ModelBeasiswa.php";
			include_once "modul/mod_beasiswa/ControllerBeasiswa.php";
		}
		break;
	
	// Bagian informasi agenda
	case 'agenda':
		if ($_SESSION['leveluser']=='admin'){
			include_once "../josys/helper_upload.php";
			include_once "../josys/fungsi_seo.php";
			include_once "modul/mod_agenda/ModelAgenda.php";
			include_once "modul/mod_agenda/ControllerAgenda.php";
		}
		break;

	// Bagian informasi lowongan karir
	case 'karir':
		if ($_SESSION['leveluser']=='admin'){
			include_once "../josys/helper_upload.php";
			include_once "../josys/fungsi_seo.php";
			include_once "modul/mod_karir/ModelKarir.php";
			include_once "modul/mod_karir/ControllerKarir.php";
			// include_once "modul/mod_karir/controller_career.php";
		}
		break;
	
	// Bagian Option Career
	case 'option_career':
		if ($_SESSION['leveluser']=='admin'){
			include_once "modul/mod_option_career/ModelOptionCareer.php";
			include_once "modul/mod_option_career/ControllerOptionCareer.php";
			// include_once "modul/mod_option_career/controller_option_career.php";
		}
		break;
	
	// Bagian informasi kerjasama
	case 'kerjasama':
		if ($_SESSION['leveluser']=='admin'){
			include_once "../josys/helper_upload.php";
			include_once "modul/mod_kerjasama/ModelKerjasama.php";
			include_once "modul/mod_kerjasama/ControllerKerjasama.php";
			// include_once "modul/mod_sajian/sajian.php";
		}
		break;



  // Bagian profile
  case 'proyek':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_service_proyek/service_proyek.php";
    }
    break;


  case 'spes':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_spesialis/spesialis.php";
    }
    break;



  //Grafik
  case 'statis_respon':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/statis_respon.php";
    }
    break;

  case 'respon_rate':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/respon_rate.php";
    }
    break;

  case 'respon_perempuan':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/respon_perempuan.php";
    }
    break;

  case 'respon_laki':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/respon_laki.php";
    }
    break;

  case 'aspek_pembelajaran':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/aspek_pembelajaran.php";
    }
    break;

  case 'pengalaman_belajar':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/pengalaman_belajar.php";
    }
    break;

  case 'sarana_belajar':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/sarana_belajar.php";
    }
    break;

  case 'cari_kerja_pertamas1':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/cari_kerja_pertamas1.php";
    }
    break;

  case 'cari_kerja_pertamas2':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/cari_kerja_pertamas2.php";
    }
    break;

  case 'cari_kerja_pertamas3':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/cari_kerja_pertamas3.php";
    }
    break;

  case 'dapat_kerja_pertamas1':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/dapat_kerja_pertamas1.php";
    }
    break;

  case 'dapat_kerja_pertamas2':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/dapat_kerja_pertamas2.php";
    }
    break;

  case 'dapat_kerja_pertamas3':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/dapat_kerja_pertamas3.php";
    }
    break;

  case 'jumlah_perusahaan':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/jumlah_perusahaan.php";
    }
    break;

  case 'jumlah_perusahaans2':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/jumlah_perusahaans2.php";
    }
    break;

  case 'jumlah_perusahaans1s2':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/jumlah_perusahaans1s2.php";
    }
    break;

  case 'status_kerjas1':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/status_kerjas1.php";
    }
    break;

  case 'status_kerjas2':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/status_kerjas2.php";
    }
    break;

  case 'status_kerjasemua':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/status_kerjasemua.php";
    }
    break;

  case 'jenis_pekerjaan':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/jenis_pekerjaan.php";
    }
    break;

  case 'pendapatan_alumni':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/pendapatan_alumni.php";
    }
    break;

  case 'tingkat_pendidikan':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/tingkat_pendidikan.php";
    }
    break;

  case 'hubungan_studi_pekerjaan':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/hubungan_studi_pekerjaan.php";
    }
    break;

  case 'kompetensi':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/kompetensi.php";
    }
    break;

  case 'alasan':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_grafik/alasan.php";
    }
    break;


  case 'biodata':
    if ($_SESSION['leveluser']=='admin'){
		include_once "modul/mod_biodata/biodata.php";

    }
    break;


  case 'kuisa':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_kuisa/kuisa.php";
    }
    break;

  case 'kuisb':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_kuisb/kuisb.php";
    }
    break;

  case 'kuisc':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_kuisc/kuisc.php";
    }
    break;

  case 'kuisd':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_kuisd/kuisd.php";
    }
    break;

  case 'kuise':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_kuise/kuise.php";
    }
	break;
	
	# Tracer Studi Category
	case 'tracer-study-category':
		if ($_SESSION['leveluser']=='admin'){
			include_once "modul/mod_tracer_study_category/ModelTracerStudyCategory.php";
			include_once "modul/mod_tracer_study_category/ControllerTracerStudyCategory.php";
		}
	break;
	
	# Tracer Studi Detail
	case 'tracer-study-detail':
		if ($_SESSION['leveluser']=='admin'){
			include_once "modul/mod_tracer_study_detail/ModelTracerStudyDetail.php";
			include_once "modul/mod_tracer_study_detail/ControllerTracerStudyDetail.php";
		}
	break;

  // Bagian Tracer Pengguna
  case 'tracer-pengguna':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_tracer_pengguna/tracer_pengguna.php";
    }
    break;
  // Users Tracer Pengguna
  case 'users-tracer-pengguna':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_users_tracer_pengguna/users_tracer_pengguna.php";
    }
    break;


  // Bagian kategori album
  case 'katalbum':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_katalbum/katalbum.php";
    }
    break;




  // Bagian review
  case 'review':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_review/review.php";
    }
    break;


  // Bagian subcategory
  case 'subcategory':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_subcategory/subcategory.php";
    }
    break;

  
    

  // Bagian jaringan
  case 'jaringan':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_jaringan/jaringan.php";
    }
    break;


  // Bagian provinsi
  case 'provinsi':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_provinsi/provinsi.php";
    }
    break;


  // Bagian Sektor kegiatan jaringan
  case 'sektor_kegiatan':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_sektor_kegiatan/sektor.php";
    }
    break;


  // Bagian kegiatan
  case 'kegiatan':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_kegiatan/kegiatan.php";
    }
    break;


  


  // Bagian Newsletter
  case 'newsletter':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_newsletter/newsletter.php";
    }
    break;


  // Bagian Guru merdeka
  case 'merdeka':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_gurumerdeka/merdeka.php";
    }
    break;


  // Bagian comment
  case 'comment':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_comment/comment.php";
    }
    break;


  // Bagian Alumni
  case 'alumni':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_alumni/alumni.php";
    }
    break;


  // Bagian File Alumni
  case 'file_alumni':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_file_alumni/file_alumni.php";
    }
    break;



  // Jasa ongkos kirim
  case 'jasa':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_jasa/jasa.php";
    }
    break;


  case 'negara':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_negara/negara.php";
    }
    break;


  case 'fakultas':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_fakultas/fakultas.php";
    }
    break;


  case 'prodi':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_prodi/prodi.php";
    }
    break;



  case 'kota':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_kota/kota.php";
    }
    break;

  // Bagian ongkos
  case 'ongkir':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_ongkir/ongkir.php";
    }
    break;


  // Bagian subcribe
  case 'subcribe':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_subcribe/subcribe.php";
    }
    break;



  // Bagian slideshow
  case 'slideshow':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_slideshow/slideshow.php";
    }
    break;


  // Bagian Album
  case 'album':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_album/album.php";
    }
    break;


  // Bagian Galeri
  case 'galeri':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_galeri/galeri.php";
    }
    break;


  // Bagian kaos
  case 'kaos':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_kaos/kaos.php";
    }
    break;


  // Bagian video
  case 'video':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_video/video.php";
    }
    break;



  // Bagian confirmation
  case 'confirmation':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_confirmation/confirmation.php";
    }
    break;


  // Bagian banner
  case 'banner':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_banner/banner.php";
    }
    break;


  // Bagian buku tamu
  case 'buku_tamu':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_buku_tamu/controller_buku_tamu.php";
    }
    break;





  // Bagian subimages
  case 'subimages':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_subimages/subimages.php";
    }
    break;




  // Bagian Title
  case 'title':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_title/title.php";
    }
    break;


  // Bagian Description
  case 'description':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_description/description.php";
    }
    break;


  // Bagian Keyword
  case 'keyword':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_keyword/keyword.php";
    }
    break;


  // Bagian User
  case 'user':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_user/user.php";
    }
    break;


    // Bagian static_content
	case 'static_content':
		if ($_SESSION['leveluser']=='admin'){
			include_once "../josys/helper_upload.php";
			include_once "modul/mod_static_content/ModelStaticContent.php";
			include_once "modul/mod_static_content/ControllerStaticContent.php";
		}
		break;


  // Bagian download
  case 'download':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_download/download.php";
    }
    break;


  // Bagian pesan
  case 'pesan':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_pesan/pesan.php";
    }
    break;


  // Bagian sosial
  case 'sosial':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_sosial/sosial.php";
    }
    break;


  // Bagian overview
  case 'overview':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_overview/overview.php";
    }
    break;



  // Bagian order
  case 'member':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_member/member.php";
    }
    break;


  // Bagian Testimoni
  case 'testimoni':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_testimoni/testimoni.php";
    }
    break;



  // Bagian Partner
  case 'partner':
    if ($_SESSION['leveluser']=='admin'){
      include_once "modul/mod_partner/partner.php";
    }
    break;
  
  default:
    # Apabila modul tidak ditemukan
    echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
    break;
}
?>
