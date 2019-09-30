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
	<?php echo minify_css('
		<style type="text/css">
			div .scroll{
				width: 100%;
				height: 50%;
				overflow-y: auto;
			}
		</style>
	
	') ?>
	<!-- jQuery loaded -->
	<script src="js/jquery.js"></script>
</head>

<body>
<div id="wrapper">
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                	<a class="navbar-brand" href="home-dccustjogja.html"><img src='https://via.placeholder.com/100x100.png?text=Logo' data-src="img/logo.png" style="max-width:100px"></a>
                	<a class="navbar-brand" href="home-dccustjogja.html"><img src='https://via.placeholder.com/100x100.png?text=Logo' data-src="img/LOGO UST1.png" style="max-width:75px"></a>
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

	<?php include_once "joinc/mainContent.php";?>
	<div class="foooter">
			<div class="">
				<center style="margin-top: 22px;">DEWANTARA CAREER CENTER UNIVERSITAS SARJANAWIYATA TAMANSISWA | Copyright © 2016 | All Rights Reserved.Developed by <a target="_blank" href="http://jogjasite.com">Jogjasite.com</a></center>
			</div>
	</div>
			
</div>

<!-- start modal tracer study login -->
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
		              		<input name="username" type="email" id="username4" placeholder="Enter your email" value="dini-cilik@ymail.com" class="form-control login-field">
		              		<i class="fa fa-user login-field-icon"></i>
		            	</div>
		
		            	<div class="form-group">
		            	  	<input name="password" type="password" id="login-pass4" placeholder="Password" value="hc)qjL2" class="form-control login-field">
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
<!-- end modal tracer study login -->

<!-- end modal tracer pengguna login -->
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
<!-- end modal tracer pengguna login -->

<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="js/jquery.js"></script> -->
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
<?php 
	echo minify_js(
		"
		<script>
			$(window).load(function () {
				$('img').each(function(){
					$(this).attr('src',$(this).data('src'))
				})
			})
		</script>
		"
	)
?>
</html>