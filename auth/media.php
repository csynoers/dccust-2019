<?php
	session_start();
	include_once "../josys/minify_helper.php";
    ob_start('minify_html');
// error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>
 <center>Anda harus login dulu <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
	require_once "../josys/koneksi.php";
	require_once "../josys/dbHelper.php";
	$db = new dbHelper($db_config);
	$module= ! empty($_GET['module']) ? $_GET['module'] : NULL ;
	$data= ! empty($_GET['data']) ? $_GET['data'] : NULL ;

	//load model navbar
	$navbar_grafik= $db->get_select("SELECT id_prodi,prodi FROM prodi")['data'];
?>

<!doctype html>
<html lang="en">

<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<title>Dashboard Admin Panel DCC UST JOGJA</title>

	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen" />

	<!-- get font awesome from maxcdn -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- end get font awesome from maxcdn -->

	<!-- custom style -->
	<link rel="stylesheet" type="text/css" href="cs-style.css">
	<!-- end custom style -->


	<script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>


	<script type="text/javascript">
		// $(document).ready(function()
	 //    	{
	 //      		$(".tablesorter").tablesorter();
	 //   	 	}
		// );
		$(document).ready(function() {

		//When page loads...
		$(".tab_content").hide(); //Hide all content
		$("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(".tab_content:first").show(); //Show first tab content

		//On Click Event
		$("ul.tabs li").click(function() {

			$("ul.tabs li").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$(".tab_content").hide(); //Hide all tab content

			var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
			$(activeTab).fadeIn(); //Fade in the active ID content
			return false;
		});

	});
    </script>

    <script type="text/javascript">
    // $(function(){
    //     $('.column').equalHeight();
    // });
	</script>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- TinyMCE 4.x -->
	<script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
	<!-- <script type="text/javascript" src="../tinymce_4.6.5/js/tinymce/tinymce.min.js"></script> -->
	<script type="text/javascript">
		tinymce.init({
		  selector: "textarea.myTextarea",

		  // ===========================================
		  // INCLUDE THE PLUGIN
		  // ===========================================

		  plugins: [
		    "advlist autolink lists link image charmap print preview anchor spellchecker",
		    "searchreplace visualblocks code fullscreen",
		    "insertdatetime media table contextmenu paste jbimages"
		  ],

		  // ===========================================
		  // PUT PLUGIN'S BUTTON on the toolbar
		  // ===========================================

		  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect |  bullist numlist outdent indent | link image jbimages",

		  // ===========================================
		  // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
		  // ===========================================

		  relative_urls: false

		});
	</script>
	<script type="text/javascript">
	$(function () {
		$('.navbar-toggle-sidebar').click(function () {
			$('.navbar-nav').toggleClass('slide-in');
			$('.side-body').toggleClass('body-slide-in');
			$('#search').removeClass('in').addClass('collapse').slideUp(200);
		});

		$('#search-trigger').click(function () {
			$('.navbar-nav').removeClass('slide-in');
			$('.side-body').removeClass('body-slide-in');
			$('.search-input').focus();
		});
	});
	</script>
	<!-- /TinyMCE -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<?php
	$header= array(
		'home'			=> 'Dashboard' ,
		'profile'		=> 'Edit Profil',
		'halaman_home'	=> 'Edit Halaman home',
		'proyek'		=> 'Edit Service pelatihan',
		'fasilitator'	=> 'Edit fasilitator',
		'katalbum'		=> 'Edit Katagori album',
		'alumni'		=> 'Edit Daftar alumni'	,
		'file_alumni'	=> 'Edit Daftar file_alumn',
		'slideshow'		=> 'Edit Slideshow',
		'subimages'		=> 'Edit Sub Images',
		'banner'		=> 'Edit Banner',
		'buku_tamu'		=> 'Edit Buku Tamu',
		'static_content'=> 'Edit Content Website',
		'pesan'			=>	'Read Message',
		'subcategory'	=> 'Edit Subkategori',
		'brand'			=> 'Edit brand',
		'berita'		=> 'Edit Materi',
		'artikel'		=> 'Edit Artikel',
		'jaii'			=> 'Edit jaii',
		'provinsi'		=> 'Edit provinsi',
		'program'		=> 'Edit Program',
		'beasiswa'		=> 'Edit Beasiswa',
	    'jaringan'		=> 'Edit jaringan',
		'kegiatan'		=> 'Edit Services (DCC UST)',
		'agenda'		=> 'Edit Agenda',
		'order'			=> 'Edit Order Product',
		'jasa'			=> 'Edit Jasa kirim',
		'ongkir'		=> 'Edit Ongkos Kirim',
		'sosial'		=> 'Edit Sosial Media',
		'video'			=> 'Edit video',
		'subcribe'		=> 'Edit Subcribe Email',
		'model'			=> 'Edit Model Product',
		'bank'			=> 'Edit Bank',
		'review'		=> 'Edit Review Product',
		'comment'		=> 'Edit Comment',
		'confirmation'	=> 'Edit Payment Confirmation',
		'testimoni'		=> 'Edit Testimoni',
		'download'		=> 'Edit download',
		'buku'			=> 'Edit buku',
		'kerjasama'		=> 'Edit Informasi Kerjasama',
		'gallery'		=> 'Edit Informasi Galeri',
		'partner'		=> 'Edit Partner',
		'preorder'		=> 'Edit Preorder',
		'karir'			=> 'Edit Karir',
		'option_career'	=> 'Edit Setting Lowongan',
		'biodata'		=> 'Informasi Biodata Hasil Kuisioner',
		'kuisa'			=> 'Informasi Hasil Metode Pembelajaran Kuis A',
		'kuisb'			=> 'Informasi Hasil Masa Transisi Kuis B',
		'kuisc'			=> 'Informasi Hasil Pekerjaan Sekarang Kuis C',
		'kuisd'			=> 'Informasi Hasil Keselarasan Vertikal dan Horizontal Kuis D',
		'kuise'			=> 'Informasi Hasil Kompetensi Kuis E',
		'album'			=> 'Edit Album',
		'galeri'		=> 'Edit Galeri',
		'fakultas'		=> 'Edit Fakultas',
		'prodi'		 	=> 'Edit Program Studi',
		//
		'statis_respon' 	=> 'Statistik Respons',
		'respon_rate'		=> 'Respoone Rate',
		'respon_perempuan'	=> 'Proporsi Responden',
		'aspek_pembelajaran'=> 'Penekanan Aspek Pembelajaran (Mean)',
		'jumlah_perusahaan'=> 'Jumlah Perusahaan',
		'cari_kerja_pertamas1'=> 'Cara Mencari Pekerjaan Pertama',
		'status_kerjasemua'=> 'Status Kerja Saat Ini',
		'jenis_pekerjaan'=> 'Jenis Organisasi Tempat Bekerja Saat Ini',
		'pendapatan_alumni'=> 'Pendapatan Alumni Setiap Bulan',
		'hubungan_studi_pekerjaan'=> 'Hubungan Antara Bidang Studi Dengan Pekerjaan',
		'tingkat_pendidikan'=> 'Tingkat Pendidikan Yang Paling Sesuai Untuk Pekerjaan',
		'kompetensi'		=> 'Kompetensi Statistik',

		/* ==================== START MENU UTAMA ==================== */
		/* ==================== END MENU UTAMA ==================== */

		/* ==================== START TRACER STUDI ==================== */
		'tracer-study-category'=> 'Informasi Kategori Tracer Studi',
		'tracer-study-detail'=> 'Informasi Detail Tracer Studi',
		/* ==================== START TRACER STUDI ==================== */

		/* ==================== START TRACER PENGGUNA ==================== */
		'tracer-pengguna'=> 'Hasil Tracer Pengguna',
		'users-tracer-pengguna'=> 'Informasi Users Tracer Pengguna',
		/* ==================== END TRACER PENGGUNA ==================== */

		/* ==================== START MENU SUPPORT ==================== */
		/* ==================== END MENU SUPPORT ==================== */

		/* ==================== START MENU SEO ==================== */
		'seo'=> 'Informasi SEO(search engine optimization)',
		/* ==================== END MENU SEO ==================== */

		/* ==================== START MENU ADMIN ==================== */
		'user'=> 'Edit Change Password',
		/* ==================== END MENU ADMIN ==================== */

	);
?>

<!-- container -->
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="media.php?module=home">
				DCC UST Admin
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../index.php" target='_BLANK'>Visit Site</a></li>
			</ul>

		</div><!-- /.navbar-collapse -->

	</div><!-- /.container-fluid -->
</nav>

<div class="container-fluid main-container">
  	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sidebar">
  		<div class="row">
			<!-- uncomment code for absolute positioning tweek see top comment in css -->
			<div class="absolute-wrapper"> </div>

			<!-- Menu -->
			<div class="side-menu">
				<nav class="navbar navbar-default" role="navigation">
					<!-- Main Menu -->
					<div class="side-menu-container">
						<ul class="nav navbar-nav">
							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown-lvl2">
									<i class="fa fa-list-ul" aria-hidden="true"></i> Menu Utama <span class="caret"></span>
								</a>

								<!-- Dropdown level 2 -->
								<div id="dropdown-lvl2" class="panel-collapse collapse <?php echo ($module=='halaman_home' || $module=='profile' || $module=='static_content' || $module=='artikel' || $module=='program' || $module=='beasiswa' || $module=='agenda' || $module=='karir' || $module=='option_career' || $module=='gallery' || $module=='buku_tamu' ) ? 'in' : NULL ; ?>">
									<div class="panel-body">
										<ul class="nav navbar-nav">
										<li><a href="?module=halaman_home" <?php echo ($module=='halaman_home') ? 'class="bg-info"' : NULL ; ?> >Home</a></li>
											<li><a href="?module=profile" <?php echo ($module=='profile') ? 'class="bg-info"' : NULL ; ?>>Profile</a></li>
											<li><a href="?module=program" <?php echo ($module=='program') ? 'class="bg-info"' : NULL ; ?> >Program</a></li>


											<!-- Dropdown level 21 -->
											<li class="panel panel-default" id="dropdown">
												<a data-toggle="collapse" href="#dropdown-lvl21">Lowongan <span class="caret"></span>
												</a>
												<div id="dropdown-lvl21" class="panel-collapse collapse <?php echo ($module=='karir' || $module=='option_career') ? 'in' : NULL ; ?>">
													<div class="panel-body">
														<ul class="nav navbar-nav">
															<li><a href="?module=karir" <?php echo ($module=='karir') ? 'class="bg-info"' : NULL ; ?> >Lowongan</a></li>
															<li><a href="?module=option_career" <?php echo ($module=='option_career') ? 'class="bg-info"' : NULL ; ?> >Setting Option Lowongan</a></li>
														</ul>
													</div>
												</div>
											</li>
											<li class="panel panel-default" id="dropdown">
												<a data-toggle="collapse" href="#dropdown-info">Info <span class="caret"></span>
												</a>
												<div id="dropdown-info" class="panel-collapse collapse <?php echo ($module=='agenda' || $module=='artikel') ? 'in' : NULL ; ?>">
													<div class="panel-body">
														<ul class="nav navbar-nav">
															<li><a href="?module=agenda" <?php echo ($module=='agenda') ? 'class="bg-info"' : NULL ; ?> >Agenda</a></li>
															<li><a href="?module=artikel" <?php echo ($module=='artikel') ? 'class="bg-info"' : NULL ; ?> >Artikel</a></li>
														</ul>
													</div>
												</div>
											</li>
											<li><a href="?module=beasiswa" <?php echo ($module=='beasiswa') ? 'class="bg-info"' : NULL ; ?> >Beasiswa</a></li>
											<li class="panel panel-default" id="dropdown">
												<a data-toggle="collapse" href="#dropdown-gallery">Galeri <span class="caret"></span>
												</a>
												<div id="dropdown-gallery" class="panel-collapse collapse <?php echo ($module=='gallery') ? 'in' : NULL ; ?>">
													<div class="panel-body">
														<ul class="nav navbar-nav">
															<li><a href="?module=gallery&data=album" <?php echo ($data=='album') ? 'class="bg-info"' : NULL ; ?> >Foto</a></li>
															<li><a href="?module=gallery&data=video" <?php echo ($data=='video') ? 'class="bg-info"' : NULL ; ?> >Video</a></li>
														</ul>
													</div>
												</div>
											</li>
											<li class="panel panel-default" id="dropdown">
												<a data-toggle="collapse" href="#dropdown-kontak">Kontak <span class="caret"></span>
												</a>
												<div id="dropdown-kontak" class="panel-collapse collapse <?php echo ( ($module=='buku_tamu') || ($module=='static_content' && $_GET['id']=='7' ) ) ? 'in' : NULL ; ?>">
													<div class="panel-body">
														<ul class="nav navbar-nav">
															<li><a href="?module=buku_tamu" <?php echo ($module=='buku_tamu') ? 'class="bg-info"' : NULL ; ?>>Buku Tamu</a></li>
															<li><a href="?module=static_content&id=7" <?php echo ($module=='static_content' && $_GET['id']=='7') ? 'class="bg-info"' : NULL ; ?> >Kontak</a></li>
														</ul>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</li>

							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown-lvl6">
									<i class="fa fa-list-ul" aria-hidden="true"></i> Alumni <span class="caret"></span>
								</a>

								<!-- Dropdown level 6 -->
								<div id="dropdown-lvl6" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav">
											<li><a href="?module=alumni&j=1">Data Alumni</a></li>
										</ul>
									</div>
								</div>
							</li>

							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown-lvl3">
									<i class="fa fa-list-ul" aria-hidden="true"></i> Hasil Tracer <span class="caret"></span>
								</a>

								<!-- Dropdown level 3 -->
								<div id="dropdown-lvl3" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav">
											<li>
												<a href="?module=biodata">Biodata</a>
											</li>
											<li>
												<a href="?module=kuisa">A. Metode Pembelajaran</a>
											</li>
											<li>
												<a href="?module=kuisb">B. Masa Transisi</a>
											</li>
											<li>
												<a href="?module=kuisc">C. Pekerjaan Sekarang</a>
											</li>
											<li>
												<a href="?module=kuisd">D. Keselarasan Vertikal dan Horizontal</a>
											</li>
											<li>
												<a href="?module=kuise">E. Kompetensi</a>
											</li>
										</ul>
									</div>
								</div>
							</li>

							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown-lvl4">
									<i class="fa fa-list-ul" aria-hidden="true"></i> Grafik Tracer <span class="caret"></span>
								</a>

								<!-- Dropdown level 4 -->
								<div id="dropdown-lvl4" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav">
										<?php
											foreach($navbar_grafik AS $key => $value){
												echo "

												<li class='panel panel-default' id='dropdown'>
													<a data-toggle='collapse' href='#dropdown-lvl4$value->id_prodi'> $value->prodi <span class='caret'></span>
													</a>
													<div id='dropdown-lvl4$value->id_prodi' class='panel-collapse collapse'>
														<div class='panel-body'>
															<ul class='nav navbar-nav'>
																<li>
																	<a href='?module=statis_respon&prodi=$value->id_prodi'>Statik respon TSUST</a>
																</li>
																<li>
																	<a href='?module=respon_rate&prodi=$value->id_prodi'>Respoone Rate TSUST</a>
																</li>
																<!--<li>
																	<a href='?module=respon_perempuan&prodi=$value->id_prodi'>Biodata</a>
																</li>-->
																<!--<li>
																	<a href='#'>Lama Studi S1</a>
																</li>-->
																<!--<li>
																	<a href='#'>Lama Studi S2</a>
																</li>-->
																<!--<li>
																	<a href='?module=alasan'>Alasan Yang Mempengaruhi Lamanya Masa Studi</a>
																</li>-->
																<li>
																	<a href='?module=aspek_pembelajaran&prodi=$value->id_prodi'>Penekanan Aspek Pembelajaran</a>
																</li>
																<li>
																	<a href='?module=cari_kerja_pertamas1&prodi=$value->id_prodi'>Cara Mencari Pekerjaan Pertama</a>
																</li>
																<!--<li>
																	<a href='#'>Masa Tunggu S1</a>
																</li>-->
																<!--<li>
																	<a href='#'>Masa Tunggu S2</a>
																</li>-->
																<li>
																	<a href='?module=jumlah_perusahaan&prodi=$value->id_prodi'>Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara</a>
																</li>
																<!--<li>
																	<a href='?module=jumlah_perusahaans2'>Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara (S2)</a>
																</li>-->
																<!--<li>
																	<a href='?module=jumlah_perusahaans1s2'>Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara (S1 & S2)</a>
																</li>-->
																<li>
																	<a href='?module=status_kerjasemua&prodi=$value->id_prodi'>Status Kerja Saat Ini</a>
																</li>
																<!--<li>
																	<a href='?module=status_kerjas1'>Status Kerja Saat Ini (S1)</a>
																</li>-->
																<!--<li>
																	<a href='?module=status_kerjas2'>Status Kerja Saat Ini (S2)</a>
																</li>-->
																<li>
																	<a href='?module=jenis_pekerjaan&prodi=$value->id_prodi'>Jenis Organisasi Tempat Bekerja Saat Ini</a>
																</li>
																<li>
																	<a href='?module=pendapatan_alumni&prodi=$value->id_prodi'>Pendapatan Alumni</a>
																</li>
																<li>
																	<a href='?module=hubungan_studi_pekerjaan&prodi=$value->id_prodi'>Hubungan Antara Bidang Studi dan Pekerjaan Saat Ini</a>
																</li>
																<li>
																	<a href='?module=tingkat_pendidikan&prodi=$value->id_prodi'>Tingkat Pendidikan Yang Paling Sesuai Untuk Pekerjaan</a>
																</li>
																<li>
																	<a href='?module=kompetensi&prodi=$value->id_prodi'>Kompetensi</a>
																</li>
															</ul>
														</div>
													</div>
												</li>


												";
											}
										?>
										</ul>
									</div>
								</div>
							</li>

							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown-tracer-study">
									<i class="fa fa-list-ul" aria-hidden="true"></i> Tracer Studi <span class="caret"></span>
								</a>

								<!-- Dropdown level 2 -->
								<div id="dropdown-tracer-study" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav">
											<li><a href="?module=tracer-study-category">Kategori</a></li>
											<li><a href="?module=tracer-study-detail">Detail</a></li>


											<!-- Dropdown level 21 -->
											<!-- <li class="panel panel-default" id="dropdown">
												<a data-toggle="collapse" href="#dropdown-lvl21">Lowongan <span class="caret"></span>
												</a>
												<div id="dropdown-lvl21" class="panel-collapse collapse">
													<div class="panel-body">
														<ul class="nav navbar-nav">
															<li><a href="?module=karir">Lowongan</a></li>
															<li><a href="?module=option_career">Setting Option Lowongan</a></li>
														</ul>
													</div>
												</div>
											</li>
											<li><a href="?module=sajian">Kerjasama</a></li>
 -->									</ul>
									</div>
								</div>
							</li>

							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown-lv20">
									<i class="fa fa-list-ul" aria-hidden="true"></i> Tracer Pengguna <span class="caret"></span>
								</a>

								<!-- Dropdown level 2 -->
								<div id="dropdown-lv20" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav">
											<li><a href="?module=tracer-pengguna">Hasil Tracer</a></li>
											<li><a href="?module=users-tracer-pengguna">Users</a></li>


											<!-- Dropdown level 21 -->
											<!-- <li class="panel panel-default" id="dropdown">
												<a data-toggle="collapse" href="#dropdown-lvl21">Lowongan <span class="caret"></span>
												</a>
												<div id="dropdown-lvl21" class="panel-collapse collapse">
													<div class="panel-body">
														<ul class="nav navbar-nav">
															<li><a href="?module=karir">Lowongan</a></li>
															<li><a href="?module=option_career">Setting Option Lowongan</a></li>
														</ul>
													</div>
												</div>
											</li>
											<li><a href="?module=sajian">Kerjasama</a></li>
 -->									</ul>
									</div>
								</div>
							</li>
							<!-- ==================== START MENU SUPPORT ==================== -->
							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown-support">
									<i class="fa fa-list-ul" aria-hidden="true"></i> Menu Support <span class="caret"></span>
								</a>
								<div id="dropdown-support" class="panel-collapse collapse <?php echo ($module=='banner' || $module=='fakultas' || $module=='kerjasama' || $module=='pesan' || $module=='prodi' || $module=='slideshow' || $module=='sosial' ) ? 'in' : NULL ; ?>">
									<div class="panel-body">
										<ul class="nav navbar-nav">
											<li><a href="?module=banner" <?php echo ($module=='banner') ? 'class="bg-info"' : NULL ; ?>>Banner</a></li>
											<li><a href="?module=fakultas" <?php echo ($module=='fakultas') ? 'class="bg-info"' : NULL ; ?>>Fakultas</a></li>
											<li><a href="?module=kerjasama" <?php echo ($module=='kerjasama') ? 'class="bg-info"' : NULL ; ?>>Kerjasama</a></li>
											<li><a href="?module=pesan" <?php echo ($module=='pesan') ? 'class="bg-info"' : NULL ; ?>>Message</a></li>
											<li><a href="?module=prodi" <?php echo ($module=='prodi') ? 'class="bg-info"' : NULL ; ?>>Prodi</a></li>
											<li><a href="?module=slideshow" <?php echo ($module=='slideshow') ? 'class="bg-info"' : NULL ; ?>>Slideshow</a></li>
											<li><a href="?module=sosial" <?php echo ($module=='sosial') ? 'class="bg-info"' : NULL ; ?>>Social Media</a></li>
										</ul>
									</div>
								</div>
							</li>
							<!-- ==================== END MENU SUPPORT ==================== -->

							<!-- ==================== START MENU SEO ==================== -->
							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown-seo">
									<i class="fa fa-list-ul" aria-hidden="true"></i> Seo <span class="caret"></span>
								</a>
								<div id="dropdown-seo" class="panel-collapse collapse <?php echo ($module=='seo') ? 'in' : NULL ; ?>">
									<div class="panel-body">
										<ul class="nav navbar-nav">
											<li><a href="?module=seo&data=title&id=90" <?php echo ($data=='title') ? 'class="bg-info"' : NULL ; ?>>Title</a></li>
											<li><a href="?module=seo&data=description&id=92" <?php echo ($data=='description') ? 'class="bg-info"' : NULL ; ?>>Description</a></li>
											<li><a href="?module=seo&data=keyword&id=91" <?php echo ($data=='keyword') ? 'class="bg-info"' : NULL ; ?>>Keyword</a></li>
										</ul>
									</div>
								</div>
							</li>
							<!-- ==================== END MENU SEO ==================== -->

							<!-- ==================== END MENU ADMIN ==================== -->
							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown-admin">
									<i class="fa fa-user-circle-o" aria-hidden="true"></i> Admin <span class="caret"></span>
								</a>
								<div id="dropdown-admin" class="panel-collapse collapse <?php echo ($module=='user') ? 'in' : NULL ; ?>">
									<div class="panel-body">
										<ul class="nav navbar-nav">
											<li><a href="?module=user" <?php echo ($module=='user') ? 'class="bg-info"' : NULL ; ?>>Change Password</a></li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</div>
								</div>
							</li>
							<!-- ==================== END MENU ADMIN ==================== -->

							<li>
								<div class="alert alert-info">
									<p  align="justify" style="margin-bottom:10px;">Jika Anda kesulitan dalam menginputkan data, silahkan hubungi kami :<br />
										&nbsp; &nbsp; <strong>HOTLINE : 0274 2870123</strong> atau
										<strong><br />&nbsp;&nbsp; SMS : 0822 2300 0770</strong><br />
										&nbsp;&nbsp;<strong> E-mail :  support@jogjasite.com</strong>
									</p>
								</div>
							</li>
							<!-- <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li> -->

						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>

			</div>
		</div>
	</div>

	<!-- <div class="col-md-10 content">
	  	<div class="panel panel-default">
			<div class="panel-heading">
				Dashboard
			</div>
			<div class="panel-body">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
		</div>
	</div> -->
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 content">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			    <div class="alert alert-info fade in alert-dismissable">
			      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			      <strong><i class="fa fa-home"></i> Website Admin</strong>
			      <i class="fa fa-chevron-right" aria-hidden="true"></i>
			      <?php echo $header[$module];  ?>.
			    </div>
			</div>

			<?php include('content.php'); ?>
		</div>
	</div>

	<footer class="pull-left footer">
		<p class="col-md-12">
			<hr class="divider">
			<p style="margin-bottom:10px;"><strong>Copyright &copy; 2016-<?php echo date('Y') ?> dcc.ustjogja.ac.id</strong></p>
		</p>
	</footer>
</div>
<!--end container -->



</body>

</html>
<?php
}
?>