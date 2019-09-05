<?php require_once("cek_login_awal/Akun_User.php"); ?>
<?php $cekLogin = Akun_User::cekStatusLogin();echo $cekLogin; ?>
<?php if($cekLogin == TRUE): ?>
<?php session_start(); ?>
<!-- end header -->
	<section id="featured">
	<!-- start slider -->
	<div class="container" style="margin-top: -22px;">
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
              <ul class="slides">
              <li>
				<?php
					$slide=mysql_query("SELECT * FROM header where id_header='12'");
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
						<p align="left"><h5><span style="color: #009a54;   font-size: 26px;" data-mce-mark="1">Selamat datang (<?php echo $_SESSION['username'];?>)</span></h5></p>
						<p><span style="float:right;   margin-top: -37px;"><a href="cek_login_awal/index.php?logout=logout"><img style="width: 20px; " src="img/logout.png">Sign Out</a></span></p>
					</div>
					<div class="bawah">
					
					<table width="100%" >
						<?php
							$q=mysql_query("SELECT * FROM alumni_daftar where id_alumni=".$_SESSION['id_alumni']." order by nama");
							$alumni=mysql_fetch_array($q);
							$isi	= $_SESSION['bahasa'] 	== "en" ? "isi_alumni_".$_SESSION[bahasa] : "isi_alumni_ina";
							?>
						<tr>
							<td style="width:79%;">
								<?php echo "$alumni[$isi]"; ?>
							</td>
						</tr>
					</table>
					<h5><span style="color: #009a54;   font-size: 26px;" data-mce-mark="1">Files</span></h5>
					<table width="100%">
						<?php
							$qs=mysql_query("SELECT * FROM alumni_file where id_alumni=".$_SESSION['id_alumni']." order by nama");
							while($file=mysql_fetch_array($qs)){
							?>
						<tr>
							<td style="width:50%;">
								<?php echo "$file[nama]"; ?>
							</td>
							<td style="width:50%;">
								<a href="joimg/file_alumni/<?php echo"$file[nama_file]"; ?>"><img style="width:24px;" src="img/download.png"></a>
							</td>
						</tr>
						<?php } ?>
					</table>
					
				</div>
				
				
				
				
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3">
				<?php include "sidebar.php" ; ?>
			</div>
			
		</div>
	</div>
	</section>
<?php else: ?>
<?php header("Location: home-dccustjogja.html"); ?>
<?php endif; ?>