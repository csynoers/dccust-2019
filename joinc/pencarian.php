<!-- end header -->
	<section id="featured">
	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
             <ul class="slides">
              <li>
                <img src="img/search.jpg" alt="" />
                <div class="flex-caption">
				  <h3>Pencarian</h3>
					<p> Menu ini digunakan untuk mempermudah dalam pencarian content </p>
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
			</div>
		</div>
	</div>	
	</section>
	<section id="featured">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9">
			<div class="col-lg-12 col-md-12">
				<div class="bawah">
					<center><h5><span style="color: #009a54; font-size: 26px;" data-mce-mark="1">Search</span></h3></center>
				</div>
				<?php
						$kata= $_POST['pencarian'];
						//Cek daata profile
							$cekProfile = mysql_query("SELECT * FROM profile WHERE nama_profile_ina LIKE '%$kata%' OR isi_profile_ina LIKE '%$kata%' OR visi_profile_ina LIKE '%$kata%' OR misi_profile_ina LIKE '%$kata%' OR nilai_profile_ina LIKE '%$kata%' OR struktur_profile_ina LIKE '%$kata%'");
							if($cekProfile > 0){
								$profile = mysql_query("SELECT * FROM profile WHERE nama_profile_ina LIKE '%$kata%' OR isi_profile_ina LIKE '%$kata%' OR visi_profile_ina LIKE '%$kata%' OR misi_profile_ina LIKE '%$kata%' OR nilai_profile_ina LIKE '%$kata%' OR struktur_profile_ina LIKE '%$kata%'");
							while($ac = mysql_fetch_array($profile)){ ?>
						<?php include "joinc/pencarian/profile.php"; ?>	
						
						<?php } }	
						//Cek daata service group
							$cekSgroup = mysql_query("SELECT * FROM kegiatan WHERE nama_keg_ina LIKE '%$kata%' OR isi_keg_ina LIKE '%$kata%'");
							if($cekSgroup > 0){
								$Sgroup = mysql_query("SELECT * FROM kegiatan WHERE nama_keg_ina LIKE '%$kata%' OR isi_keg_ina LIKE '%$kata%'");
							while($ab = mysql_fetch_array($Sgroup)){ ?>
						<?php include "joinc/pencarian/service_group.php"; ?>		
						
						<?php } }	
						//Cek daata service pelatihan
							$cekSpelatihan = mysql_query("SELECT * FROM service_proyek WHERE nama_service_proyek_ina LIKE '%$kata%' OR isi_service_proyek_ina LIKE '%$kata%'");
							if($cekSpelatihan > 0){
								$Spelatihan = mysql_query("SELECT * FROM service_proyek WHERE nama_service_proyek_ina LIKE '%$kata%' OR isi_service_proyek_ina LIKE '%$kata%'");
							while($as = mysql_fetch_array($Spelatihan)){ ?>
						<?php include "joinc/pencarian/service_pelatihan.php"; ?>		
						
						<?php } } 
						//Cek daata publikasi
							$cekPublikasi = mysql_query("SELECT * FROM berita WHERE nama_berita_ina LIKE '%$kata%' OR isi_berita_ina LIKE '%$kata%'");
							if($cekPublikasi > 0){
								$berita = mysql_query("SELECT * FROM berita WHERE nama_berita_ina LIKE '%$kata%' OR isi_berita_ina LIKE '%$kata%'");
							while($aq = mysql_fetch_array($berita)){ ?>
						<?php include "joinc/pencarian/publikasi.php"; ?>		
						<?php } }
		 
						//Cek daata home
							$cekHome = mysql_query("SELECT * FROM home WHERE nama_kiri_ina LIKE '%$kata%' OR isi_kiri_ina LIKE '%$kata%'");
							if($cekHome > 0){
								$home = mysql_query("SELECT * FROM home WHERE nama_kiri_ina LIKE '%$kata%' OR isi_kiri_ina LIKE '%$kata%'");
							while($aw = mysql_fetch_array($home)){ ?>
						<?php include "joinc/pencarian/home.php"; ?>		
						<?php } }?>
			</div>
		</div>
		 <div class="col-lg-3 col-md-3">
			<?php include "sidebar.php" ; ?>
		</div>
	</div>
	</section>