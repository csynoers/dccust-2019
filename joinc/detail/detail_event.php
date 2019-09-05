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
					$slide=mysql_query("SELECT * FROM header where id_header='4'");
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
				
				<div class="row" style="margin-top: 19px; margin-bottom: 50px;"> 
					<?php 
						$karir=mysql_query("SELECT * FROM agenda where id_agenda='$_GET[id]'");
						$k=mysql_fetch_array($karir);
						
					?>
					<article>
						<div class="bawah">
						<article class="">
						<h4 style="font-weight: 200;"><a href="" rel="" title="<?php echo"$k[nama_agenda_ina]"; ?>"><?php echo"$k[nama_agenda_ina]"; ?></a></h4>              
						<div style="margin-top: -15px;">
						<span class="">
							<span class="date">Published</span> 
							<span class="entry-date" title="7:21 am"><?php echo"$k[tanggal]"; ?></span>
						</span> |
						<span class="">
							<span class="">By</span> 
							<span class="">
							<a class="" href="#" title="">admin</a></span>
						</span>
						</div> 
						<div class="">
							
							<p><img class="img-responsive" alt="executive_development_program_thumb" src="joimg/event/<?php echo"$k[gambar]"; ?>" /></p>
								<p><strong>Tema :  </strong><?php echo"$k[tema_agenda_ina]"; ?></br>
								<strong>Tanggal : </strong><?php echo"$k[waktu]"; ?></br>
								<strong>Tempat :</strong> <?php echo"$k[lokasi]"; ?></br>
								<strong>Peserta : </strong><?php echo"$k[peserta]"; ?></p>
								<p><strong>Keterangan lengkap:</strong> <?php echo"$k[isi_agenda_ina]"; ?></p>
						</div>
						</article>
						<div class="post-heading">
								<h3><a href="#"><?php echo "$f[nama_agenda_ina]"; ?></a></h3>
								 <!-- Go to www.addthis.com/dashboard to customize your tools -->
									<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54bc99eb04210058" async="async"></script>
								<!-- Go to www.addthis.com/dashboard to customize your tools -->
									<div class="addthis_sharing_toolbox"></div>
							</div>
					</div>
					</article>
				</div>
			</div>
		</div>
		 <div class="col-lg-3">
			<?php include "joinc/sidebar.php" ; ?>
		</div>
	</div>
	</section>
	