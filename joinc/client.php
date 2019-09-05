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
					$client	 		= $_SESSION['bahasa'] 	== "en" ? "Our client" : "Klien kami";
					$slide=mysql_query("SELECT * FROM header where id_header='5'");
					$s=mysql_fetch_array($slide);
					$nama	 	= $_SESSION['bahasa'] 	== "en" ? "nama_header_".$_SESSION[bahasa] : "nama_header_ina";
					$isi	 	= $_SESSION['bahasa'] 	== "en" ? "isi_header_".$_SESSION[bahasa] : "isi_header_ina";
				?>
                <img src="joimg/header_image/<?php echo"$s[gambar]"; ?>" alt="" />
                <div class="flex-caption">
					
                    <h3 style="margin-top: -78px;"><?php echo"$s[$nama]"; ?></h3> 
					<?php echo"$s[$isi]"; ?>
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
						<center><h5><span style="color: #009a54;   font-size: 26px;" data-mce-mark="1"><?php echo "$client"; ?></span></h3></center>
				</div>	
				<div class="row" style="margin-top: 19px;">
					<section id="projects">
					<ul id="thumbs" class="portfolio">
						<?php
							$client=mysql_query("SELECT * FROM sajian order by id_sajian DESC");
							 while ($c=mysql_fetch_array($client)){
							$nama_q	 	= $_SESSION['bahasa'] 	== "en" ? "nama_sajian_".$_SESSION[bahasa] : "nama_sajian_ina";
							$isi_q	 	= $_SESSION['bahasa'] 	== "en" ? "isi_sajian_".$_SESSION[bahasa] : "isi_sajian_ina";
						?>
							<!-- Item Project and Filter Name -->
							<li class="item-thumbs col-lg-3 col-md-4 col-sm-6 design" data-id="id-0" data-type="web">
							<!-- Fancybox - Gallery Enabled - Title - Full Image -->
							<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo "$c[$nama_q]"; ?>" href="joimg/ourclient/<?php echo "$c[gambar]"; ?>">
							<span class="overlay-img"></span>
							<span class="overlay-img-thumb font-icon-plus"></span>
							</a>
							<!-- Thumb Image and Description -->
						
								<div class="thumbnail">
									<img src="joimg/ourclient/<?php echo "$c[gambar]"; ?>" alt="<?php echo "$c[$isi_q]"; ?>">
								</div>
					
							<div class="judul">
								<center><h5 style="min-height: 50px; margin-bottom: -5px;"><a href="#"><?php echo "$c[$nama_q]"; ?></a></h5></center>
							</div>
							</li>
						<?php } ?>
						<!-- End Item Project -->
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