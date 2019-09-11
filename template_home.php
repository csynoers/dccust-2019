<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php $row= $db->get_select("select static_content_en from modul where id_modul='90' ")['data'][0];  echo $row->static_content_en ?></title>
<!-- Description, Keywords and Author -->
<meta name="description" content="<?php $row= $db->get_select("select static_content_en from modul where id_modul='92' ")['data'][0]; echo $row->static_content_en ?>">
<meta name="keywords" content="<?php $row= $db->get_select("select static_content_en from modul where id_modul='91' ")['data'][0];	echo $row->static_content_en ?>">
<meta name="author" content="https://github.com/csynoers" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/favicon.png" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<!-- <link href="css/jcarousel.css" rel="stylesheet" /> -->
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css?v=0.1" rel="stylesheet" />

<!-- font awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- end font awesome -->


<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- Theme popup -->
<link rel="stylesheet" href="modal_login/css/style.css" />
<style type="text/css">
	div .scroll{
		width: 100%;
	    height: 50%;
	    overflow-y: auto;
	}
</style>
</head>

<body>
<div id="wrapper">
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                	<a class="navbar-brand" href="home-dccustjogja.html"><img src="img/logo.png" style="max-width:100px"></a>
                	<a class="navbar-brand" href="home-dccustjogja.html"><img src="img/LOGO UST1.png" style="max-width:75px"></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    	<li <?php if($_GET['mod']=='home') { echo 'class="active"'; } ?>>
                    		<a href="home-dccustjogja.html">Beranda</a>
                    	</li>

                        <li <?php if($_GET['mod']=='profile') { echo 'class="active"'; } ?>>
                        	<a href="profile-dccustjogja.html">Profil</a>
                        </li>

                        <li class="dropdown">
				        	<a class="dropbtn" data-toggle="dropdown" href="#">Program</b></a>
				        	<ul class="dropdown-menu dropdown-content">
					        <?php
					        	$program_nav= $db->select('program',array());
						        foreach ($program_nav['data'] AS $key => $value) {
						        	?>
						        		<li <?php if($_GET['mod']=='program') { echo 'class="active"'; } ?>>
						        			<a style="font-size:13px;font-weight: 700;" href="program-<?php echo $value->id_program ?>.html"><?php echo $value->nama_program ?></a>
						        		</li>
						        	<?php
						        }
					        ?>
				        	</ul>
                        </li>

                        <li <?php if($_GET['mod']=='karir') { echo 'class="active"'; } ?>>
                        	<a href="karir-dccustjogja.html">karir</a>
                        </li>

                        <?php 
                        $sid = session_id();
				        $al = $db->get_select("SELECT * FROM alumni_daftar WHERE id_session = '$sid'");
				        	if (count($al['data']) > 0) {
				        		?>
		                        <li class="dropdown">
							        <a class="dropbtn" data-toggle="dropdown" href="#">Tracer Study</a>
							        <ul class="dropdown-menu dropdown-content">
							        	<!-- <li <?php if($_GET['mod']=='profil') { echo 'class="active"'; } ?>>
							        		<a style="font-size:13px;font-weight: 700;" href="profil.html">Profil</a>
							        	</li> -->

							        	<li <?php if($_GET['mod']=='kuesioner') { echo 'class="active"'; } ?>>
							        		<a style="font-size:13px;font-weight: 700;" href="kuesioner.html">Kuesioner</a>
							        	</li>

							        	<li <?php if($_GET['mod']=='logout') { echo 'class="active"'; } ?>>
							        		<a style="font-size:13px;font-weight: 700;" href="logout.html">Logout</a>
							        	</li>

							      	</ul>
						      </li>
				        		<?php
				        	}else{
				        		?>
				        		<li <?php if($_GET['mod']=='alumni') { echo 'class="active"'; } ?>>
				        			<a href="#" data-toggle="modal" data-target="#login-modal">Tracer Study</a>
				        		</li>

				        		<?php
				        	}
				        ?>
                        <li <?php if($_GET['mod']=='tracer-pengguna') { echo 'class="active"'; } ?>>
                        	<?php
                        		if (!empty($_SESSION['tracer-pengguna'])) {
                        			?>
			                        	<a href="tracer-identitas-pengisi.html"  >tracer pengguna</a>
                        			<?php
                        		}else{
                        			?>
			                        	<a href="#" data-toggle="modal" data-target="#login-tracer-pengguna-modal" >tracer pengguna</a>
                        			<?php
                        		}
                        	?>
                        </li>

                        <li class="dropdown">
				        	<a class="dropbtn" data-toggle="dropdown" href="#">info</b></a>
				        	<ul class="dropdown-menu dropdown-content">
		                        <li>
		                        	<a style="font-size:13px;font-weight: 700;" href="event-dccustjogja.html">Agenda</a>
		                        </li>
		                        <li>
		                        	<a style="font-size:13px;font-weight: 700;" href="artikel-dccustjogja.html">Artikel</a>
		                        </li>
				        	</ul>
                        </li>

                        <li <?php if($_GET['mod']=='beasiswa') { echo 'class="active"'; } ?>>
                        	<a href="beasiswa-dccustjogja.html">Beasiswa</a>
                        </li>

                        <li class="dropdown">
				        	<a class="dropbtn" data-toggle="dropdown" href="#">Galeri</a>
				        	<ul class="dropdown-menu dropdown-content">
				        		<li <?php if($_GET['mod']=='album') { echo 'class="active"'; } ?>>
				        			<a style="font-size:13px;font-weight: 700;" href="album-dccustjogja.html">Foto</a>
				        		</li>

                        	 	<li <?php if($_GET['mod']=='video') { echo 'class="active"'; } ?>>
                        	 		<a style="font-size:13px;font-weight: 700;" href="video-dccustjogja.html">Video</a>
                        	 	</li>
				        	</ul>
				      	</li>

				      	<!-- <li <?php // if($_GET['mod']=='buku_tamu'){ echo "class='active'";} ?>>
				      		<a href="buku-tamu-dccustjogja.html">Buku Tamu</a>
				      	</li> -->

                        <li class="dropdown">
				        	<a class="dropbtn" data-toggle="dropdown" href="#">Kontak</a>
				        	<ul class="dropdown-menu dropdown-content">
				        		<li <?php if($_GET['mod']=='buku_tamu'){ echo "class='active'";} ?>>
				        			<a style="font-size:13px;font-weight: 700;" href="buku-tamu-dccustjogja.html">Buku Tamu</a>
				        		</li>

                        	 	<li <?php if($_GET['mod']=='contact') { echo 'class="active"'; } ?>>
                        	 		<a style="font-size:13px;font-weight: 700;" href="contact-us-dccustjogja.html">Kontak</a>
                        	 	</li>
				        	</ul>
				      	</li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<section id="featured">
		<!-- start slider -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div id="main-slider" class="flexslider">
						<ul class="slides">
						<?php
							$rows= $db->get_select("SELECT * FROM slide order by id DESC");
							foreach ($rows['data'] as $key => $sh){
								echo "
									<li>
										<a href='{$sh->link}' target='_blank'>
											<img src='https://via.placeholder.com/1200x300.png?text={$sh->judul_ina}'  data-src='joimg/slide/{$sh->gambar}' alt='{$sh->judul_ina}'/>
										</a>
									</li>
								";
							}
						?>
						</ul>
					</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->	
	</section>
	<section id="featured">
	<div class="container">
		<?php
			$row= $db->get_select("SELECT nama_modul_ina,static_content_ina FROM modul where id_modul = '94'")['data'][0];	
		?>
		<div class="row">
			<div class="col-lg-9 col-md-9 ">
				<div class="col-lg-12 col-md-12">
					<div class="foooter">
						<center><h5><span style="color: #009a54;"><?php echo $row->nama_modul_ina ?></span></h5></center>
						<?php echo $row->static_content_ina ?>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="bawah">
						<center><h5><span style="color: #009a54;   font-size: 14px;padding-top: 10px" data-mce-mark="1">Lowongan Kerja Terbaru</span></h5></center>
					</div>
					<div class="panel panel-default" style="height: 750px;overflow: auto;">
						<div class="panel-body">
							<?php
								$rows= $db->get_select("SELECT *,IFNULL(karir.gambar,'karir_00.jpg') FROM karir LEFT JOIN propinsi ON propinsi.propinsi_id=karir.lokasi ORDER BY karir.id_karir DESC LIMIT 5");
								foreach ($rows['data'] as $key => $k){ ?>

									<div class="bawah">
										<article class="">
										<h4 style="font-weight: 200;text-transform: capitalize;"><a href="detailkarir-<?php echo $k->id_karir.'-'.$k->seo_ina ?>.html" rel="" title="<?php echo $k->judul_karir ?>"><?php echo $k->judul_karir ?></a></h4>              
										<div style="margin-top: -15px;">
										<span class="">
											<span class="date">Published : </span> 
											<span class="entry-date" ><?php echo tanggal_indo(date('Y-m-d', strtotime($k->tanggal)),TRUE) ?></span>
										</span> |
										<span class="">
											<span class="">By</span> 
											<span class="">
											<a class="" href="#" title="">admin</a></span>
										</span>
										</div> 
										<div class="">
											<p><img src="<?php echo "https://via.placeholder.com/512x256.png?text={$k->judul_karir}" ?>" class="" alt="executive_development_program_thumb" data-src="joimg/karir/<?php echo $k->gambar ?>" style="width:100%;height: auto" /></p>
											<!-- <p>&nbsp;</p> -->
											<div class="alert alert-info">
												<ul class="marginX">
												<li class="text-capitalize"><strong>Perusahaan :  </strong><?php echo $k->perusahaan_karir ?></li>
												<li><strong>Batas Akhir : </strong><?php echo tanggal_indo($k->deadline,TRUE) ?></li>
												<li><strong>Penempatan :</strong> <?php echo $k->propinsi_name ?></li>
												</ul>
											</div>
										</div>
										</article>
									</div>

							<?php }	?>
							<center style="padding-top: 10px;padding-bottom: 10px;"><a href="karir-dccustjogja.html" target="_blank"><button class="btn btn-lg btn-primary" id="submit">Lihat Lainnya</button></a></center>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="bawah">
						<center><h5><span style="color: #009a54;   font-size: 14px;padding-top: 10px" data-mce-mark="1">Agenda DCC UST</span></h5></center>
					</div>
					<div class="panel panel-default" style="height: 750px;overflow: auto;">
						<div class="panel-body">
							<?php
								$agendaa = $db->get_select("SELECT * FROM agenda order by id_agenda DESC");
								foreach($agendaa['data'] AS $key => $s){
							?>
							<div class="bawah">
								<article class="">
								<h4 style="font-weight: 200;"><a href="detailevent-<?php echo ($s->id_agenda).'-'.($s->seo_ina) ?>.html" rel="" title="<?php echo $s->nama_agenda_ina ?>"><?php echo $s->nama_agenda_ina ?></a></h4>              
								<div style="margin-top: -15px;">
								<span class="">
									<span class="date">Published : </span> 
									<span class="entry-date" ><?php echo tanggal_indo(date('Y-m-d', strtotime($s->tanggal)),TRUE) ?></span>
								</span> |
								<span class="">
									<span class="">By</span> 
									<span class="">
									<a class="" href="#" title="">fgi-admin</a></span>
								</span>
								</div> 
								<div class="">
									
									<p><img src="<?php echo "https://via.placeholder.com/512x256.png?text={$s->nama_agenda_ina}" ?>" class="" alt="executive_development_program_thumb" data-src="joimg/event/<?php echo"$s->gambar"; ?>" style="width: 100%;height: auto;" /></p>
									<div class="alert alert-info">
										<ul class="marginX">
											<li><strong>Tema :  </strong><?php echo $s->tema_agenda_ina ?></li>
											<li><strong>Tanggal : </strong><?php echo tanggal_indo($s->waktu,TRUE); ?></li>
											<li><strong>Tempat :</strong> <?php echo $s->lokasi ?></li>
											<li><strong>Peserta : </strong><?php echo $s->peserta ?></li>
										</ul>	
									</div>
								</div>
								</article>
							</div>
							
							<?php } ?>
							<center style="padding-top: 10px;padding-bottom: 10px;"><a href="event-dccustjogja.html" target="_blank"><button class="btn btn-lg btn-primary" id="submit">Lihat Lainnya</button></a></center>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12">
					<div class="foooter">
						<div class="bawah">
							<center><h5><span style="color: #009a54;   font-size: 14px;padding-top: 10px" data-mce-mark="1">Kerjasama</span></h5></center>
						</div>
					<div class="row" style="margin-top: 19px;">
						<section id="projects">
						<ul id="thumbss" class="portfolio">
						<?php
							$rows= $db->get_select("SELECT * FROM sajian order by id_sajian DESC LIMIT 12");
							foreach ($rows['data'] as $key => $value) {
						?>
							<li class="item-thumbss col-lg-3 design" data-id="id-0" data-type="web">
								<img src="<?php echo "https://via.placeholder.com/256x128.png?text={$value->nama_sajian_ina}" ?>" style="max-height:150px;max-width: 200px;  box-shadow: 0 0 2px #009a54;" data-src="joimg/ourclient/<?php echo $value->gambar ?>" alt="<?php echo $value->nama_sajian_ina ?>">
							</li>
							<?php } ?>
						</ul>
						</section>
					</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="col-lg-3 col-md-3">
				<?php
				require_once "joinc/sidebar_home.php";
				?>
			</div>
		</div>
			
	</div>
	</section>

	<div class="foooter">
			<div class=""><center style="margin-top: 22px;">DEWANTARA CAREER CENTER UNIVERSITAS SARJANAWIYATA TAMANSISWA | Copyright © 2016 | All Rights Reserved.Developed by <a target="_blank" href="http://jogjasite.com">Jogjasite.com</a></center>
		</div>
	</div>
			
</div>

<!-- informasi kontak login -->

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header login_modal_header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h2 class="modal-title" id="myModalLabel">Login to Your Account</h2>
      		</div>
      		<div class="modal-body login-modal">
      			
      			<div class="clearfix"></div>
      			<div id='social-icons-conatainer'>
				<form action="cek_login.html" method="post">
	        		<div class='modal-body-left'>
	        			<div class="form-group">
		              		<input name="username" type="email" id="username" placeholder="Enter your email" value="" class="form-control login-field">
		              		<i class="fa fa-user login-field-icon"></i>
		            	</div>
		
		            	<div class="form-group">
		            	  	<input name="password" type="password" id="login-pass" placeholder="Password" value="" class="form-control login-field">
		              		<i class="fa fa-lock login-field-icon"></i>
		            	</div>
		
		            	<button type="submit" name="login" value="login" class="btn btn-success modal-login-btn">Login</button>
	        		</div>
	        	</form>
	        		<div class='modal-body-right'>
	        			<div class="modal-social-icons">
	        			<p>Silahkan hubungi administrator untuk dapat <b>log in</b> sebagai alumni Universitas Sarjanawiyata Tamansiswa </p><hr>
	        			<p>Daftar Alumni?, <a href="daftar-dccustjogja.html">Daftar</a></p>
	        			</div> 
	        		</div>		
	        		
	        	</div>																												
        		<div class="clearfix"></div>
      		</div>
      		<div class="clearfix"></div>
      		<div class="modal-footer login_modal_footer">Copyright @<a href="http://jogjasite.com">jogjasite.com</a>
      		</div>
    	</div>
  	</div>
</div>			

<div class="modal fade" id="login-tracer-pengguna-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header login_modal_header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h2 class="modal-title" id="myModalLabel">Login to Your Account</h2>
      		</div>
      		<div class="modal-body login-modal">
      			
      			<div class="clearfix"></div>
      			<div id='social-icons-conatainer'>
				<form action="tracer-pengguna-login.html" method="post">
	        		<div class='modal-body-left'>
	        			<div class="form-group">
		              		<input name="username" type="email" id="username2" placeholder="Enter your email" value="" class="form-control login-field">
		              		<i class="fa fa-user login-field-icon"></i>
		            	</div>
		
		            	<div class="form-group">
		            	  	<input name="password" type="password" id="login-pass2" placeholder="Password" value="" class="form-control login-field">
		              		<i class="fa fa-lock login-field-icon"></i>
		            	</div>
		
		            	<button type="submit" name="login" value="login" class="btn btn-success modal-login-btn">Login</button>
	        		</div>
	        	</form>
	        		<div class='modal-body-right'>
	        			<div class="modal-social-icons">
	        			<p>Silahkan hubungi administrator untuk dapat <b>log in</b> Tracer Pengguna <a href="contact-us-dccustjogja.html">Kontak Kami</a></p><hr>
	        			<!-- <p>Daftar Alumni?, <a href="daftar-dccustjogja.html">Daftar</a></p> -->
	        			</div> 
	        		</div>		
	        		
	        	</div>																												
        		<div class="clearfix"></div>
      		</div>
      		<div class="clearfix"></div>
      		<div class="modal-footer login_modal_footer">Copyright @<a href="http://jogjasite.com">jogjasite.com</a>
      		</div>
    	</div>
  	</div>
</div>			
			
		


<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script>
$(window).load(function () {
    $('img').each(function(){
        $(this).attr('src',$(this).data('src'));
    });
});
</script>
</body>
</html>