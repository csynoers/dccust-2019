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
					$slide=mysql_query("SELECT * FROM header where id_header='6'");
					$s=mysql_fetch_array($slide);
					$nama	 	= $_SESSION['bahasa'] 	== "en" ? "nama_header_".$_SESSION[bahasa] : "nama_header_ina";
					$isi	 	= $_SESSION['bahasa'] 	== "en" ? "isi_header_".$_SESSION[bahasa] : "isi_header_ina";
				?>
                <img src="joimg/header_image/<?php echo"$s[gambar]"; ?>" alt="" />
                <div class="flex-caption">
					
                    <h3><?php echo"$s[$nama]"; ?></h3> 
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
			<div class="col-lg-9">
			<div class="col-lg-12">
				<div class="bawah">
					<!--<center><h5><span style="color: #009a54; font-size: 26px;" data-mce-mark="1">Detail publication</span></h3></center>-->
				</div>
				<div class="row" style="margin-top: 19px; margin-bottom: 50px;"> 
					<?php 
						$publikasi=mysql_query("SELECT * FROM artikel where id_artikel='$_GET[id]'");
						$f=mysql_fetch_array($publikasi);
						
					?>
					<article>
						<div class="post-image">
							<div class="post-heading">
								<h3><a href="#"><?php echo "$f[nama_artikel]"; ?></a></h3>
								 <!-- Go to www.addthis.com/dashboard to customize your tools -->
									<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54bc99eb04210058" async="async"></script>
								<!-- Go to www.addthis.com/dashboard to customize your tools -->
									<div class="addthis_sharing_toolbox"></div>
							</div>
							<img style="max-width: 70%" src="joimg/artikel/<?php echo"$f[gambar]"; ?>" alt="" />
						</div>
						<?php echo"$f[isi_artikel]"; ?>	
					</article>					
					
				</div>
			</div>
		</div>
		 <div class="col-lg-3">
			<?php include "joinc/sidebar.php" ; ?>
		</div>
	</div>
	</section>
	