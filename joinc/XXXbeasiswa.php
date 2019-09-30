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
					$slide=mysql_query("SELECT * FROM header where id_header='15'");
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
				<div class="col-lg-9 col-md-9">
					<div class="col-lg-12 col-md-12">
						<div class="bawah">
							<center><h5><span style="color: #009a54; font-size: 26px;" data-mce-mark="1">Beasiswa</span></h3></center>
						</div>
						<div class="row" style="margin-top: 19px;">
							<div class="art-sheet clearfix">
							<article>
							<div>
								<ul class="wpb_thumbnails wpb_thumbnails-fluid clearfix" data-layout-mode="fitRows">
									<?php
										$publikasi=mysql_query("SELECT * FROM beasiswa order by id_beasiswa DESC");
										while($p=mysql_fetch_array($publikasi)){
										$isi 		= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$p["isi_beasiswa"])));			
										$isi		= substr($isi,0,strrpos(substr($isi,0,300)," "));										
									?>
									<li class="col-lg-4">
										<div class="post-thumb">
											<a href="detailbeasiswa-<?php echo $p['id_beasiswa']?>.html" class="link_image" title="<?php echo "$p[nama_beasiswa]";?>"><img src="joimg/beasiswa/<?php echo "$p[gambar]";?>" width="282" height="94" alt="<?php echo "$p[nama_beasiswa]";?>" /></a>
										</div>
										<h5 class="post-title">
											<a href="detailbeasiswa-<?php echo $p['id_beasiswa']?>.html" class="link_title" title="<?php echo "$p[nama_beasiswa]";?>"><?php echo "$p[nama_beasiswa]";?></a></h5>
										<div class="entry-content">
											<p align="justify"><?php echo "$isi";?>&nbsp <a href="detailbeasiswa-<?php echo"$p[id_beasiswa]-$p[seo_beasiswa]"; ?>.html">[..]</a></p>
										</div>
									</li>
									<?php } ?>
								</ul>
							</div>
							</article>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<?php include "sidebar.php" ; ?>
				</div>
			</div>
		</div>
	</section>