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
						<center><h5><span style="color: #009a54;   font-size: 26px;" data-mce-mark="1">Galeri Video</span></h3></center>
				</div>	
				<div class="row" style="margin-top: 19px;">
					<section id="projects">
					<ul id="thumbss" class="portfolio">
					<?php
						$video=mysql_query("SELECT * FROM video order by id DESC");
						while($v=mysql_fetch_array($video)){
					?>
		                <!-- Item Project and Filter Name -->
						<li class="item-thumbss col-lg-3 design" data-id="id-0" data-type="web">
						
						<iframe width="250" height="250" src="<?php echo $v['video'] ?>" allowfullscreen=""></iframe>
						</li>
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