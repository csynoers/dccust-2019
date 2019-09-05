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
					$slide=mysql_query("SELECT * FROM header where id_header='6'");
					$s=mysql_fetch_assoc($slide);
				?>
                <img src="joimg/header_image/<?php echo"$s[gambar]"; ?>" alt="" />
                <div class="flex-caption">
					
                    <h3><?php echo $s['nama_header_ina']; ?></h3> 
					<?php echo $s['isi_header_ina']; ?>
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
							<center><h5><span style="color: #009a54; font-size: 26px;" data-mce-mark="1">Artikel</span></h3></center>
						</div>
						<div class="row" style="margin-top: 19px;">
							<div class="art-sheet clearfix">
							<article>
							<div>
								<ul class="wpb_thumbnails wpb_thumbnails-fluid clearfix" data-layout-mode="fitRows">
									<?php
										$publikasi=mysql_query("SELECT * FROM artikel order by id_artikel DESC");
										while($p=mysql_fetch_assoc($publikasi)){
										$isi 		= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$p["isi_artikel"])));			
										$isi		= substr($isi,0,strrpos(substr($isi,0,300)," "));										
									?>
									<li class="col-lg-4">
										<div class="post-thumb">
											<a href="detailpublikasi-<?php echo $p['id_artikel']?>.html" class="link_image" title="<?php echo "$p[nama_artikel]";?>"><img src="joimg/artikel/<?php echo "$p[gambar]";?>" width="282" height="94" alt="<?php echo "$p[nama_artikel]";?>" /></a>
										</div>
										<h5 class="post-title">
											<a href="detailpublikasi-<?php echo $p['id_artikel']?>.html" class="link_title" title="<?php echo "$p[nama_artikel]";?>"><?php echo "$p[nama_artikel]";?></a></h5>
										<div class="entry-content">
											<p align="justify"><?php echo "$isi";?>&nbsp <a href="detailpublikasi-<?php echo"$p[id_artikel]-$p[seo_artikel]"; ?>.html">[..]</a></p>
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