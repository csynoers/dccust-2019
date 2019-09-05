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
					$fasilitator	 		= $_SESSION['bahasa'] 	== "en" ? "Facilitator" : "Fasilitator";
					$slide=mysql_query("SELECT * FROM header where id_header='7'");
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
					<center><h5><span style="color: #009a54; font-size: 26px;" data-mce-mark="1"><?php echo "$fasilitator"; ?></span></h3></center>
				</div>
				<div class="row" style="margin-top: 19px; margin-bottom: 50px;"> 
					<?php 
						$fasilitator=mysql_query("SELECT * FROM fasilitator order by id_fasilitator ASC");
						while($f=mysql_fetch_array($fasilitator)){
						$nama_q	 	= $_SESSION['bahasa'] 	== "en" ? "nama_fasilitator_".$_SESSION[bahasa] : "nama_fasilitator_ina";
						$isi_q	 	= $_SESSION['bahasa'] 	== "en" ? "isi_fasilitator_".$_SESSION[bahasa] : "isi_fasilitator_ina";
					?>
					<article style="margin-bottom: 10px;border: 1px dotted #cccccc;min-height: 234px;">
						<div class="post-image">
							<img class="leftblok" src="joimg/fasilitator/<?php echo "$f[gambar]"; ?>" alt="" />
						</div>
						<p>
							<div class="post-heading">
								<h5><a href="#"><?php echo "$f[$nama_q]"; ?></a></h5>
							</div>
							<?php echo "$f[$isi_q]"; ?>

						</p>
					</article>
					<?php } ?>
				</div>
			</div>
		</div>
		 <div class="col-lg-3 col-md-3">
			<?php include "sidebar.php" ; ?>
		</div>
	</div>
	</section>