<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>
 <center>Anda harus login dulu <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard Admin Panel DCC UST JOGJA</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen" />



	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	

	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
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
    $(function(){
        $('.column').equalHeight();
    });
	</script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- TinyMCE 4.x -->
 
<script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
 
tinymce.init({
  selector: "textarea",
  
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
<!-- /TinyMCE -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="?module=home">DCC UST Admin</a></h1>
			<h2 class="section_title">
			<?php if ($_GET['module']=='home') {?>
			Dashboard
			<?php } elseif ($_GET['module']=='profile'){?>
			Edit Profil
			<?php } elseif ($_GET['module']=='halaman_home'){?>
			Edit Halaman home
			<?php } elseif ($_GET['module']=='proyek'){?>
			Edit Service pelatihan
			<?php } elseif ($_GET['module']=='fasilitator'){?>
			Edit fasilitator
			<?php } elseif ($_GET['module']=='katalbum'){?>
			Edit Katagori album
			<?php } elseif ($_GET['module']=='alumni'){?>
			Edit Daftar alumni	
			<?php } elseif ($_GET['module']=='file_alumni'){?>
			Edit Daftar file_alumn
			<?php } elseif ($_GET['module']=='slideshow'){?>
			Edit Slideshow
			<?php } elseif ($_GET['module']=='subimages'){?>
			Edit Sub Images
			<?php } elseif ($_GET['module']=='banner'){?>
			Edit Banner
			<?php } elseif ($_GET['module']=='static_content'){?>
			Edit Content Website
			<?php } elseif ($_GET['module']=='pesan'){?>
			Read Message
			<?php } elseif ($_GET['module']=='title'){?>
			Edit Title Website
			<?php } elseif ($_GET['module']=='description'){?>
			Edit Description Website
			<?php } elseif ($_GET['module']=='keyword'){?>
			Edit Keyword Website
			<?php } elseif ($_GET['module']=='user'){?>
			Edit Change Password
			<?php } elseif ($_GET['module']=='subcategory'){?>
			Edit Subkategori
			<?php } elseif ($_GET['module']=='brand'){?>
			Edit brand
			<?php } elseif ($_GET['module']=='berita'){?>
			Edit Materi
			<?php } elseif ($_GET['module']=='jaii'){?>
			Edit jaii
			<?php } elseif ($_GET['module']=='provinsi'){?>
			Edit provinsi
			<?php } elseif ($_GET['module']=='program'){?>
			Edit Program 
			<?php } elseif ($_GET['module']=='beasiswa'){?>
			Edit Beasiswa 
		    <?php } elseif ($_GET['module']=='jaringan'){?>
			Edit jaringan
			<?php } elseif ($_GET['module']=='kegiatan'){?>
			Edit Services (DCC UST)
			<?php } elseif ($_GET['module']=='agenda'){?>
			Edit Event
			<?php } elseif ($_GET['module']=='order'){?>
			Edit Order Product
			<?php } elseif ($_GET['module']=='jasa'){?>
			Edit Jasa kirim
			<?php } elseif ($_GET['module']=='ongkir'){?>
			Edit Ongkos Kirim
			<?php } elseif ($_GET['module']=='sosial'){?>
			Edit Sosial Media
			<?php } elseif ($_GET['module']=='video'){?>
			Edit video
			<?php } elseif ($_GET['module']=='subcribe'){?>
			Edit Subcribe Email
			<?php } elseif ($_GET['module']=='model'){?>
			Edit Model Product
			<?php } elseif ($_GET['module']=='bank'){?>
			Edit Bank
			<?php } elseif ($_GET['module']=='review'){?>
			Edit Review Product
			<?php } elseif ($_GET['module']=='comment'){?>
			Edit Comment
			<?php } elseif ($_GET['module']=='confirmation'){?>
			Edit Payment Confirmation
			<?php } elseif ($_GET['module']=='member'){?>
			Edit Memberarea
			<?php } elseif ($_GET['module']=='testimoni'){?>
			Edit Testimoni
			<?php } elseif ($_GET['module']=='download'){?>
			Edit download
			<?php } elseif ($_GET['module']=='buku'){?>
			Edit buku
			<?php } elseif ($_GET['module']=='sajian'){?>
			Edit Our client
			<?php } elseif ($_GET['module']=='partner'){?>
			Edit Partner
			<?php } elseif ($_GET['module']=='preorder'){?>
			Edit Preorder
			<?php } ?>
			
			</h2><div class="btn_view_site"><a  href="../index.php" target='_BLANK'>View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Admin</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="?module=home">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">
			<?php if ($_GET['module']=='home') {?>
			Dashboard
			<?php } elseif ($_GET['module']=='profile'){?>
			Edit Profil
			<?php } elseif ($_GET['module']=='halaman_home'){?>
			Edit Halaman home
			<?php } elseif ($_GET['module']=='proyek'){?>
			Edit Service pelatihan
			<?php } elseif ($_GET['module']=='fasilitator'){?>
			Edit fasilitator
			<?php } elseif ($_GET['module']=='katalbum'){?>
			Edit Katagori album
			<?php } elseif ($_GET['module']=='alumni'){?>
			Edit Daftar alumni	
			<?php } elseif ($_GET['module']=='file_alumni'){?>
			Edit Daftar file_alumni
			<?php } elseif ($_GET['module']=='brands'){?>
			Edit Brands
			<?php } elseif ($_GET['module']=='slideshow'){?>
			Edit Slideshow
			<?php } elseif ($_GET['module']=='subimages'){?>
			Edit Sub Images
			<?php } elseif ($_GET['module']=='banner2'){?>
			Edit Right Banner
			<?php } elseif ($_GET['module']=='banner'){?>
			Edit Banner
			<?php } elseif ($_GET['module']=='beasiswa'){?>
			Edit Beasiswa 
			<?php } elseif ($_GET['module']=='static_content'){?>
			Edit Content Website
			<?php } elseif ($_GET['module']=='pesan'){?>
			Read Message
			<?php } elseif ($_GET['module']=='title'){?>
			Edit Title Website
			<?php } elseif ($_GET['module']=='description'){?>
			Edit Description Website
			<?php } elseif ($_GET['module']=='keyword'){?>
			Edit Keyword Website
			<?php } elseif ($_GET['module']=='user'){?>
			Edit Change Password
			<?php } elseif ($_GET['module']=='subcategory'){?>
			Edit Sub category
			<?php } elseif ($_GET['module']=='brand'){?>
			Edit brand
			<?php } elseif ($_GET['module']=='berita'){?>
			Edit Materi
			<?php } elseif ($_GET['module']=='jaii'){?>
			Edit jaii
			<?php } elseif ($_GET['module']=='provinsi'){?>
			Edit provinsi
			<?php } elseif ($_GET['module']=='program'){?>
			Edit Program 
			<?php } elseif ($_GET['module']=='jaringan'){?>
			Edit Jaringan
			<?php } elseif ($_GET['module']=='kegiatan'){?>
			Edit Services (DCC UST)
			<?php } elseif ($_GET['module']=='agenda'){?>
			Edit Event
			<?php } elseif ($_GET['module']=='order'){?>
			Edit Order Product
			<?php } elseif ($_GET['module']=='jasa'){?>
			Edit Jasa kirim
			<?php } elseif ($_GET['module']=='ongkir'){?>
			Edit Ongkos Kirim
			<?php } elseif ($_GET['module']=='sosial'){?>
			Edit Sosial Media
			<?php } elseif ($_GET['module']=='video'){?>
			Edit video
			<?php } elseif ($_GET['module']=='subcribe'){?>
			Edit Subcribe Email
			<?php } elseif ($_GET['module']=='model'){?>
			Edit Model Product
			<?php } elseif ($_GET['module']=='bank'){?>
			Edit Bank
			<?php } elseif ($_GET['module']=='review'){?>
			Edit Review Product
			<?php } elseif ($_GET['module']=='comment'){?>
			Edit Comment
			<?php } elseif ($_GET['module']=='confirmation'){?>
			Edit Payment Confirmation
			<?php } elseif ($_GET['module']=='member'){?>
			Edit Memberarea
			<?php } elseif ($_GET['module']=='testimoni'){?>
			Edit Testimoni
			<?php } elseif ($_GET['module']=='banner1'){?>
			Edit Banner
			<?php } elseif ($_GET['module']=='download'){?>
			Edit Download
			<?php } elseif ($_GET['module']=='buku'){?>
			Edit Buku
			<?php } elseif ($_GET['module']=='sajian'){?>
			Edit Our client
			<?php } elseif ($_GET['module']=='partner'){?>
			Edit Partner
			<?php } elseif ($_GET['module']=='preorder'){?>
			Edit Pre order
			<?php } ?>
			</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		
		<h3>Main Menu</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=halaman_home">Home</a></li>
			<li class="icn_categories"><a href="?module=profile">Profile</a></li>
			<li class="icn_categories"><a href="?module=static_content&id=7">Contact Us</a></li>
		</ul>
		<h3>Menu utama</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=artikel">Artikel</a></li>
			<li class="icn_categories"><a href="?module=program">Program</a></li>
			<li class="icn_categories"><a href="?module=beasiswa">Beasiswa</a></li>
			<li class="icn_categories"><a href="?module=agenda">Event</a></li>
			<li class="icn_categories"><a href="?module=spes">Spesialisasi Kerja</a></li>
			<li class="icn_categories"><a href="?module=karir">Lowongan</a></li>
			<li class="icn_categories"><a href="?module=sajian">Our client</a></li>
		</ul>
		<h3>Hasil Tracer</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=kuisa">A. SOSIO-BIOGRAFI</a></li>
			<li class="icn_categories"><a href="?module=kuisb">B. KAGIATAN PENDIDIKAN DAN PENGALAMAN BELAJAR</a></li>
			<li class="icn_categories"><a href="?module=kuisc">C. PENCARIAN KERJA DAN TRANSMINI KE DUNIA KERJA</a></li>
			<li class="icn_categories"><a href="?module=kuisd">D. PEKERJAAN</a></li>
			<li class="icn_categories"><a href="?module=kuise">E. PEKERJAAN DAN KOMPETENSI, HUBUNGAN ANTARA SRUDI DENGAN KERJA</a></li>
		</ul>
		<h3>Grafik Tracer</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=statis_respon">Statik respon TSUST</a></li>
			<li class="icn_categories"><a href="?module=respon_rate">Respoone Rate TSUST</a></li>
			<li class="icn_categories"><a href="?module=respon_perempuan">Sosio-Biografi</a></li>
			<li class="icn_categories"><a href="#">Lama Studi S1</a></li>
			<li class="icn_categories"><a href="#">Lama Studi S2</a></li>
			<li class="icn_categories"><a href="?module=alasan">Alasan Yang Mempengaruhi Lamanya Masa Studi</a></li>
			<li class="icn_categories"><a href="?module=aspek_pembelajaran">Penekanan Aspek Pembelajaran</a></li>
			<li class="icn_categories"><a href="?module=cari_kerja_pertamas1">Cara Mencari Pekerjaan Pertama</a></li>
			<li class="icn_categories"><a href="#">Masa Tunggu S1</a></li>
			<li class="icn_categories"><a href="#">Masa Tunggu S2</a></li>
			<li class="icn_categories"><a href="?module=jumlah_perusahaan">Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara (S1)</a></li>
			<li class="icn_categories"><a href="?module=jumlah_perusahaans2">Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara (S2)</a></li>
			<li class="icn_categories"><a href="?module=jumlah_perusahaans1s2">Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara (S1 & S2)</a></li>
			<li class="icn_categories"><a href="?module=status_kerjasemua">Status Kerja Saat Ini</a></li>
			<li class="icn_categories"><a href="?module=status_kerjas1">Status Kerja Saat Ini (S1)</a></li>
			<li class="icn_categories"><a href="?module=status_kerjas2">Status Kerja Saat Ini (S2)</a></li>
			<li class="icn_categories"><a href="?module=jenis_pekerjaan">Jenis Organisasi Tempat Bekerja Saat Ini</a></li>
			<li class="icn_categories"><a href="?module=pendapatan_alumni">Pendapatan Alumni</a></li>
			<li class="icn_categories"><a href="#">Hubungan Antara Bidang Studi dan Pekerjaan Saat Ini</a></li>
			<li class="icn_categories"><a href="?module=tingkat_pendidikan">Tingkat Pendidikan Yang Paling Sesuai Untuk Pekerjaan</a></li>
			<li class="icn_categories"><a href="?module=kompetensi">Kompetensi</a></li>
		</ul>
		<h3>Menu Galeri foto album</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=album">Album foto</a></li>
			<li class="icn_categories"><a href="?module=video">Koleksi Video</a></li>	
		</ul>
		<h3>Alumni</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=alumni&j=1">List alumni Sarjana (S1)</a></li>
			<li class="icn_categories"><a href="?module=alumni&j=2">List alumni Pascasarjana (S2)</a></li>
		</ul>
		<h3>Menu Support</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=fakultas">Fakultas</a></li>
			<li class="icn_categories"><a href="?module=prodi">Prodi</a></li>
			<li class="icn_categories"><a href="?module=negara">Negara</a></li>
			<li class="icn_categories"><a href="?module=kota">Kota</a></li>
			<li class="icn_categories"><a href="?module=slideshow">Slideshow</a></li>
			<li class="icn_categories"><a href="?module=banner">Banner</a></li>
			<li class="icn_categories"><a href="?module=pesan">Message</a></li>
			<li class="icn_categories"><a href="?module=sosial">Social Media</a></li>
		</ul>
		<h3>SEO</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="?module=title">Title</a></li>
			<li class="icn_settings"><a href="?module=description">Description</a></li>
			<li class="icn_settings"><a href="?module=keyword">Keyword</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_profile"><a href="?module=user">Change Password</a></li>
			<li class="icn_jump_back"><a href="logout.php">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p  align="justify" style="margin-bottom:10px;">Jika Anda kesulitan dalam menginputkan data, silahkan hubungi kami :<br />
			&nbsp; &nbsp; <strong>HOTLINE : 0274 2870123</strong> atau
			<strong><br />&nbsp;&nbsp; SMS : 0822 2300 0770</strong><br />
			&nbsp;&nbsp;<strong> E-mail :  support@jogjasite.com</strong></p>
			<p style="margin-bottom:10px;"><strong>Copyright &copy; 2016 Jogjasite.com</strong></p>
			
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<?php include('content.php'); ?>
		
		
		
		
	</section>

</body>

</html>
<?php
}
?>