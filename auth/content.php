<?php
include "../josys/koneksi.php";
include "../josys/library.php";
include "../josys/fungsi_combobox.php";
// include "../josys/fungsi_amerikatgl.php";
include "../josys/fungsi_indotgl.php";
include "../josys/class_paging.php";
include "../josys/fungsi_rupiah.php";

switch ($_GET['module']) {
  case 'home':
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
    				  } 
    				  else{
    				  }

    				  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
    				  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
    				  $hits             = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik WHERE tanggal='$tanggal'"), 0); 
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

    			?>
        				
    			<article class="stats_overview">
    				<div class="overview_today">
    					<p class="overview_day">Today</p>
    					<p class="overview_count"><?php echo"$pengunjung"; ?></p>
    					<p class="overview_type">Visits</p>
    					<p class="overview_count"><?php echo"$hits"; ?></p>
    					<p class="overview_type">Views</p>
    				</div>
    				<div class="overview_previous">
    					<p class="overview_day">All Time</p>
    					<p class="overview_count"><?php echo"$totalpengunjung"; ?></p>
    					<p class="overview_type">Visits</p>
    					<p class="overview_count"><?php echo"$totalhits"; ?></p>
    					<p class="overview_type">Views</p>
    				</div>
    			</article>

        </div>

      </div>
    </div>
      
  <?php
  }
  break;

  // Bagian Home
  case 'halaman_home':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_home/home.php";
    }
    break;


  // Bagian profile
  case 'profile':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_profile/profile.php";
    }
    break;


  // Bagian profile
  case 'program':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_program/program.php";
    }
    break;


  // Bagian profile
  case 'beasiswa':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_beasiswa/beasiswa.php";
    }
    break;



  // Bagian profile
  case 'proyek':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_service_proyek/service_proyek.php";
    }
    break;


  case 'spes':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_spesialis/spesialis.php";
    }
    break;



  //Grafik
  case 'statis_respon':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/statis_respon.php";
    }
    break;

  case 'respon_rate':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/respon_rate.php";
    }
    break;

  case 'respon_perempuan':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/respon_perempuan.php";
    }
    break;

  case 'respon_laki':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/respon_laki.php";
    }
    break;

  case 'aspek_pembelajaran':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/aspek_pembelajaran.php";
    }
    break;

  case 'pengalaman_belajar':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/pengalaman_belajar.php";
    }
    break;

  case 'sarana_belajar':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/sarana_belajar.php";
    }
    break;

  case 'cari_kerja_pertamas1':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/cari_kerja_pertamas1.php";
    }
    break;

  case 'cari_kerja_pertamas2':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/cari_kerja_pertamas2.php";
    }
    break;

  case 'cari_kerja_pertamas3':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/cari_kerja_pertamas3.php";
    }
    break;

  case 'dapat_kerja_pertamas1':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/dapat_kerja_pertamas1.php";
    }
    break;

  case 'dapat_kerja_pertamas2':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/dapat_kerja_pertamas2.php";
    }
    break;

  case 'dapat_kerja_pertamas3':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/dapat_kerja_pertamas3.php";
    }
    break;

  case 'jumlah_perusahaan':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/jumlah_perusahaan.php";
    }
    break;

  case 'jumlah_perusahaans2':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/jumlah_perusahaans2.php";
    }
    break;

  case 'jumlah_perusahaans1s2':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/jumlah_perusahaans1s2.php";
    }
    break;

  case 'status_kerjas1':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/status_kerjas1.php";
    }
    break;

  case 'status_kerjas2':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/status_kerjas2.php";
    }
    break;

  case 'status_kerjasemua':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/status_kerjasemua.php";
    }
    break;

  case 'jenis_pekerjaan':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/jenis_pekerjaan.php";
    }
    break;

  case 'pendapatan_alumni':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/pendapatan_alumni.php";
    }
    break;

  case 'tingkat_pendidikan':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/tingkat_pendidikan.php";
    }
    break;

  case 'hubungan_studi_pekerjaan':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/hubungan_studi_pekerjaan.php";
    }
    break;

  case 'kompetensi':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/kompetensi.php";
    }
    break;

  case 'alasan':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_grafik/alasan.php";
    }
    break;


  case 'biodata':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_biodata/biodata.php";
    }
    break;


  case 'kuisa':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_kuisa/kuisa.php";
    }
    break;

  case 'kuisb':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_kuisb/kuisb.php";
    }
    break;

  case 'kuisc':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_kuisc/kuisc.php";
    }
    break;

  case 'kuisd':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_kuisd/kuisd.php";
    }
    break;

  case 'kuise':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_kuise/kuise.php";
    }
    break;


  // Bagian Tracer Pengguna
  case 'tracer-pengguna':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_tracer_pengguna/tracer_pengguna.php";
    }
    break;
  // Users Tracer Pengguna
  case 'users-tracer-pengguna':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_users_tracer_pengguna/users_tracer_pengguna.php";
    }
    break;


  // Bagian kategori album
  case 'katalbum':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_katalbum/katalbum.php";
    }
    break;




  // Bagian review
  case 'review':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_review/review.php";
    }
    break;


  // Bagian subcategory
  case 'subcategory':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_subcategory/subcategory.php";
    }
    break;


  // Bagian karir
  // case 'karir'){
  //   if ($_SESSION['leveluser']=='admin'){
  //     include "modul/mod_karir/karir.php";
  //   }
  // break;
  // 

  // Bagian karir
  case 'karir':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_karir/controller_career.php";

  break;
    
  }

  // Bagian Option Career
  case 'option_career':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_option_career/controller_option_career.php";

  break;
    
  }

  // Bagian jaii
  case 'artikel':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_artikel/artikel.php";
    }
    break;


  // Bagian jaringan
  case 'jaringan':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_jaringan/jaringan.php";
    }
    break;


  // Bagian provinsi
  case 'provinsi':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_provinsi/provinsi.php";
    }
    break;


  // Bagian Sektor kegiatan jaringan
  case 'sektor_kegiatan':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_sektor_kegiatan/sektor.php";
    }
    break;


  // Bagian kegiatan
  case 'kegiatan':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_kegiatan/kegiatan.php";
    }
    break;


  // Bagian Agenda
  case 'agenda':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_agenda/agenda.php";
    }
    break;


  // Bagian Newsletter
  case 'newsletter':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_newsletter/newsletter.php";
    }
    break;


  // Bagian Guru merdeka
  case 'merdeka':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_gurumerdeka/merdeka.php";
    }
    break;


  // Bagian comment
  case 'comment':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_comment/comment.php";
    }
    break;


  // Bagian Alumni
  case 'alumni':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_alumni/alumni.php";
    }
    break;


  // Bagian File Alumni
  case 'file_alumni':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_file_alumni/file_alumni.php";
    }
    break;



  // Jasa ongkos kirim
  case 'jasa':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_jasa/jasa.php";
    }
    break;


  case 'negara':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_negara/negara.php";
    }
    break;


  case 'fakultas':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_fakultas/fakultas.php";
    }
    break;


  case 'prodi':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_prodi/prodi.php";
    }
    break;



  case 'kota':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_kota/kota.php";
    }
    break;

  // Bagian ongkos
  case 'ongkir':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_ongkir/ongkir.php";
    }
    break;


  // Bagian subcribe
  case 'subcribe':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_subcribe/subcribe.php";
    }
    break;



  // Bagian slideshow
  case 'slideshow':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_slideshow/slideshow.php";
    }
    break;


  // Bagian Album
  case 'album':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_album/album.php";
    }
    break;


  // Bagian Galeri
  case 'galeri':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_galeri/galeri.php";
    }
    break;


  // Bagian kaos
  case 'kaos':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_kaos/kaos.php";
    }
    break;


  // Bagian video
  case 'video':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_video/video.php";
    }
    break;



  // Bagian confirmation
  case 'confirmation':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_confirmation/confirmation.php";
    }
    break;


  // Bagian banner
  case 'banner':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_banner/banner.php";
    }
    break;


  // Bagian buku tamu
  case 'buku_tamu':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_buku_tamu/controller_buku_tamu.php";
    }
    break;


  // Bagian Sajian utama
  case 'sajian':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_sajian/sajian.php";
    }
    break;


  // Bagian subimages
  case 'subimages':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_subimages/subimages.php";
    }
    break;




  // Bagian Title
  case 'title':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_title/title.php";
    }
    break;


  // Bagian Description
  case 'description':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_description/description.php";
    }
    break;


  // Bagian Keyword
  case 'keyword':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_keyword/keyword.php";
    }
    break;


  // Bagian User
  case 'user':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_user/user.php";
    }
    break;


  // Bagian static_content
  case 'static_content':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_static_content/static_content.php";
    }
    break;


  // Bagian download
  case 'download':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_download/download.php";
    }
    break;


  // Bagian pesan
  case 'pesan':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_pesan/pesan.php";
    }
    break;


  // Bagian sosial
  case 'sosial':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_sosial/sosial.php";
    }
    break;


  // Bagian overview
  case 'overview':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_overview/overview.php";
    }
    break;



  // Bagian order
  case 'member':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_member/member.php";
    }
    break;


  // Bagian Testimoni
  case 'testimoni':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_testimoni/testimoni.php";
    }
    break;



  // Bagian Partner
  case 'partner':
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_partner/partner.php";
    }
    break;
  
  default:
    # Apabila modul tidak ditemukan
    echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
    break;
}
?>
