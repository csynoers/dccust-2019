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
				<?php
					$slide=mysql_query("SELECT * FROM header where id_header='9'");
					$s=mysql_fetch_array($slide);
/*					$nama	 	= $_SESSION['bahasa'] 	== "en" ? "nama_header_".$_SESSION[bahasa] : "nama_header_ina";
					$isi	 	= $_SESSION['bahasa'] 	== "en" ? "isi_header_".$_SESSION[bahasa] : "isi_header_ina";*/
				?>
                <img src="joimg/header_image/<?php echo"$s[gambar]"; ?>" alt="" />
                <div class="flex-caption">
					
                    <h3><?php echo"$s[nama_header_ina]"; ?></h3> 
					<?php echo"$s[isi_header_ina]"; ?>
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
						<center><h5><span style="color: #009a54;   font-size: 26px;" data-mce-mark="1">Galeri Album</span></h3></center>
				</div>	
				<div class="row" style="margin-top: 19px;">
					<section id="projects">
					<ul id="thumbss" class="portfolio">
					<?php
						$galeri=mysql_query("SELECT * FROM album order by id_album DESC");
						while($g=mysql_fetch_array($galeri)){
					?>
						<!-- Item Project and Filter Name -->
						<li class="item-thumbss col-lg-3 design" data-id="id-0" data-type="web">
						<!-- Fancybox - Gallery Enabled - Title - Full Image -->
						<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo "$g[nama]"; ?>" href="galeri-dccustjogja-<?php echo $g['id_album'] ?>.html">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
						<!-- Thumb Image and Description -->
						<img style="height:170px;  box-shadow: 0 0 9px #000;" src="joimg/album/<?php echo"$g[gambar]"; ?>" alt="<?php echo "$g[deskripsi]"; ?>">
						<div class="judul">
							<center><h5><a href="#"><?php echo "$g[nama]"; ?></a></h5></center>
						</div>
						</li>
						<!-- End Item Project -->
						<?php } ?>
					</ul>
					</section>
				</div>
			</div>
			</div>
			
			<div class="col-lg-3 col-md-3">
				<?php include "sidebar.php" ; ?>
			</div>
			
		</div>
	</div>
	</section>