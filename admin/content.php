<?php
include "../josys/koneksi.php";
include "../josys/library.php";
include "../josys/fungsi_combobox.php";
include "../josys/fungsi_amerikatgl.php";
include "../josys/class_paging.php";
include "../josys/fungsi_rupiah.php";

// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='admin'){ ?>
  <h4 class="alert_info">Selamat Datang Di DCC UST JOGJA admin panel.</h4>
		
		<article class="module width_full">
			<header><h3>Stats</h3></header>
			<div class="module_content">
				
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
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article --><?php
  }
}
// Bagian Home
elseif ($_GET['module']=='halaman_home'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_home/home.php";
  }
}

// Bagian profile
elseif ($_GET['module']=='profile'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_profile/profile.php";
  }
}

// Bagian profile
elseif ($_GET['module']=='program'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_program/program.php";
  }
}

// Bagian profile
elseif ($_GET['module']=='beasiswa'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_beasiswa/beasiswa.php";
  }
}


// Bagian profile
elseif ($_GET['module']=='proyek'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_service_proyek/service_proyek.php";
  }
}

elseif ($_GET['module']=='spes'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_spesialis/spesialis.php";
  }
}


//Grafik
elseif ($_GET['module']=='statis_respon'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/statis_respon.php";
  }
}
elseif ($_GET['module']=='respon_rate'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/respon_rate.php";
  }
}
elseif ($_GET['module']=='respon_perempuan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/respon_perempuan.php";
  }
}
elseif ($_GET['module']=='respon_laki'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/respon_laki.php";
  }
}
elseif ($_GET['module']=='aspek_pembelajaran'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/aspek_pembelajaran.php";
  }
}
elseif ($_GET['module']=='pengalaman_belajar'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/pengalaman_belajar.php";
  }
}
elseif ($_GET['module']=='sarana_belajar'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/sarana_belajar.php";
  }
}
elseif ($_GET['module']=='cari_kerja_pertamas1'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/cari_kerja_pertamas1.php";
  }
}
elseif ($_GET['module']=='cari_kerja_pertamas2'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/cari_kerja_pertamas2.php";
  }
}
elseif ($_GET['module']=='cari_kerja_pertamas3'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/cari_kerja_pertamas3.php";
  }
}
elseif ($_GET['module']=='dapat_kerja_pertamas1'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/dapat_kerja_pertamas1.php";
  }
}
elseif ($_GET['module']=='dapat_kerja_pertamas2'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/dapat_kerja_pertamas2.php";
  }
}
elseif ($_GET['module']=='dapat_kerja_pertamas3'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/dapat_kerja_pertamas3.php";
  }
}
elseif ($_GET['module']=='jumlah_perusahaan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/jumlah_perusahaan.php";
  }
}
elseif ($_GET['module']=='jumlah_perusahaans2'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/jumlah_perusahaans2.php";
  }
}
elseif ($_GET['module']=='jumlah_perusahaans1s2'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/jumlah_perusahaans1s2.php";
  }
}
elseif ($_GET['module']=='status_kerjas1'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/status_kerjas1.php";
  }
}
elseif ($_GET['module']=='status_kerjas2'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/status_kerjas2.php";
  }
}
elseif ($_GET['module']=='status_kerjasemua'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/status_kerjasemua.php";
  }
}
elseif ($_GET['module']=='jenis_pekerjaan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/jenis_pekerjaan.php";
  }
}
elseif ($_GET['module']=='pendapatan_alumni'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/pendapatan_alumni.php";
  }
}
elseif ($_GET['module']=='tingkat_pendidikan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/tingkat_pendidikan.php";
  }
}
elseif ($_GET['module']=='kompetensi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/kompetensi.php";
  }
}
elseif ($_GET['module']=='alasan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_grafik/alasan.php";
  }
}



elseif ($_GET['module']=='kuisa'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kuisa/kuisa.php";
  }
}
elseif ($_GET['module']=='kuisb'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kuisb/kuisb.php";
  }
}
elseif ($_GET['module']=='kuisc'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kuisc/kuisc.php";
  }
}
elseif ($_GET['module']=='kuisd'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kuisd/kuisd.php";
  }
}
elseif ($_GET['module']=='kuise'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kuise/kuise.php";
  }
}


// Bagian kategori album
elseif ($_GET['module']=='katalbum'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_katalbum/katalbum.php";
  }
}



// Bagian review
elseif ($_GET['module']=='review'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_review/review.php";
  }
}

// Bagian subcategory
elseif ($_GET['module']=='subcategory'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_subcategory/subcategory.php";
  }
}

// Bagian berita
elseif ($_GET['module']=='karir'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_karir/karir.php";
  }
}

// Bagian jaii
elseif ($_GET['module']=='artikel'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_artikel/artikel.php";
  }
}

// Bagian jaringan
elseif ($_GET['module']=='jaringan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_jaringan/jaringan.php";
  }
}

// Bagian provinsi
elseif ($_GET['module']=='provinsi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_provinsi/provinsi.php";
  }
}

// Bagian Sektor kegiatan jaringan
elseif ($_GET['module']=='sektor_kegiatan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sektor_kegiatan/sektor.php";
  }
}

// Bagian kegiatan
elseif ($_GET['module']=='kegiatan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kegiatan/kegiatan.php";
  }
}

// Bagian Agenda
elseif ($_GET['module']=='agenda'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_agenda/agenda.php";
  }
}

// Bagian Newsletter
elseif ($_GET['module']=='newsletter'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_newsletter/newsletter.php";
  }
}

// Bagian Guru merdeka
elseif ($_GET['module']=='merdeka'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_gurumerdeka/merdeka.php";
  }
}

// Bagian comment
elseif ($_GET['module']=='comment'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_comment/comment.php";
  }
}

// Bagian Alumni
elseif ($_GET['module']=='alumni'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_alumni/alumni.php";
  }
}

// Bagian File Alumni
elseif ($_GET['module']=='file_alumni'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_file_alumni/file_alumni.php";
  }
}


// Jasa ongkos kirim
elseif ($_GET['module']=='jasa'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_jasa/jasa.php";
  }
}

elseif ($_GET['module']=='negara'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_negara/negara.php";
  }
}

elseif ($_GET['module']=='fakultas'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_fakultas/fakultas.php";
  }
}

elseif ($_GET['module']=='prodi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_prodi/prodi.php";
  }
}


elseif ($_GET['module']=='kota'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kota/kota.php";
  }
}
// Bagian ongkos
elseif ($_GET['module']=='ongkir'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_ongkir/ongkir.php";
  }
}

// Bagian subcribe
elseif ($_GET['module']=='subcribe'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_subcribe/subcribe.php";
  }
}


// Bagian slideshow
elseif ($_GET['module']=='slideshow'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_slideshow/slideshow.php";
  }
}

// Bagian Album
elseif ($_GET['module']=='album'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_album/album.php";
  }
}

// Bagian Galeri
elseif ($_GET['module']=='galeri'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_galeri/galeri.php";
  }
}

// Bagian kaos
elseif ($_GET['module']=='kaos'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kaos/kaos.php";
  }
}

// Bagian video
elseif ($_GET['module']=='video'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_video/video.php";
  }
}


// Bagian confirmation
elseif ($_GET['module']=='confirmation'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_confirmation/confirmation.php";
  }
}

// Bagian banner
elseif ($_GET['module']=='banner'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_banner/banner.php";
  }
}

// Bagian buku
elseif ($_GET['module']=='buku'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_buku/buku.php";
  }
}

// Bagian Sajian utama
elseif ($_GET['module']=='sajian'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sajian/sajian.php";
  }
}

// Bagian subimages
elseif ($_GET['module']=='subimages'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_subimages/subimages.php";
  }
}



// Bagian Title
elseif ($_GET['module']=='title'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_title/title.php";
  }
}

// Bagian Description
elseif ($_GET['module']=='description'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_description/description.php";
  }
}

// Bagian Keyword
elseif ($_GET['module']=='keyword'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_keyword/keyword.php";
  }
}

// Bagian User
elseif ($_GET['module']=='user'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_user/user.php";
  }
}

// Bagian static_content
elseif ($_GET['module']=='static_content'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_static_content/static_content.php";
  }
}

// Bagian download
elseif ($_GET['module']=='download'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_download/download.php";
  }
}

// Bagian pesan
elseif ($_GET['module']=='pesan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_pesan/pesan.php";
  }
}

// Bagian sosial
elseif ($_GET['module']=='sosial'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sosial/sosial.php";
  }
}

// Bagian overview
elseif ($_GET['module']=='overview'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_overview/overview.php";
  }
}


// Bagian order
elseif ($_GET['module']=='member'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_member/member.php";
  }
}

// Bagian Testimoni
elseif ($_GET['module']=='testimoni'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_testimoni/testimoni.php";
  }
}


// Bagian Partner
elseif ($_GET['module']=='partner'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_partner/partner.php";
  }
}



// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
