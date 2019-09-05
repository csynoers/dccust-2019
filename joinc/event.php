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
			<div class="col-lg-9 col-md-9">
				<div class="col-lg-12">
				
					<div class="bawah">
						<center><h5><span style="color: #009a54;   font-size: 26px;" data-mce-mark="1">Agenda</span></h3></center>
					</div>
					<?php
						$agendaa=mysql_query("SELECT * FROM agenda order by id_agenda DESC");
						while($s=mysql_fetch_array($agendaa)){
						$nama	 	= $_SESSION['bahasa'] 	== "en" ? "nama_agenda_".$_SESSION[bahasa] : "nama_agenda_ina";
						$tema	 	= $_SESSION['bahasa'] 	== "en" ? "tema_agenda_".$_SESSION[bahasa] : "tema_agenda_ina";
						$isi	 	= $_SESSION['bahasa'] 	== "en" ? "isi_agenda_".$_SESSION[bahasa] : "isi_agenda_ina";
					?>
					<div class="bawah">
						<article class="">
						<h4 style="font-weight: 200;"><a href="detailevent-<?php echo $s['id_agenda'].'-'.$s['seo_ina'] ?>.html" rel="" title="<?php echo"$s[$nama]"; ?>"><?php echo"$s[$nama]"; ?></a></h4>              
						<div style="margin-top: -15px;">
						<span class="">
							<span class="date">Published</span> 
							<span class="entry-date" title="7:21 am"><?php echo"$s[tanggal]"; ?></span>
						</span> |
						<span class="">
							<span class="">By</span> 
							<span class="">
							<a class="" href="#" title="">fgi-admin</a></span>
						</span>
						</div> 
						<div class="">
							
							<p><img class="" alt="executive_development_program_thumb" src="joimg/event/<?php echo"$s[gambar]"; ?>" width="300" height="210" /></p>
							<p>&nbsp;</p>
							<ul class="margin">
							<li><strong>Theme :  </strong><?php echo"$s[$tema]"; ?></li>
							<li><strong>Date : </strong><?php echo"$s[waktu]"; ?></li>
							<li><strong>Place :</strong> <?php echo"$s[lokasi]"; ?></li>
							<li><strong>Member : </strong><?php echo"$s[peserta]"; ?></li>
							<li><strong>Keterangan :</strong> <?php echo"$s[$isi]"; ?></li>
							</ul>
							<!--<p style="  margin-left: 326px; margin-top: 30px;"> <a href="#">Read More <span class="meta-nav">...</span></a></p>-->
						</div>
						</article>
					</div>
					<?php } ?>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3">
				<?php include "sidebar.php" ; ?>
			</div>
			
		</div>
	</div>
	</section>