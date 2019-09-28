<!-- end header -->
	<section id="featured">
	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
			<?php
				$row= $db->get_select("SELECT * FROM profile where id_profile='9'")['data'][0];
			?>
              <li>
                <img width="100%" src="joimg/profile/<?php echo $row->gambar ?>" alt="" />
                <div class="flex-caption">
                    <h3><?php echo $row->nama_profile_ina ?></h3> 
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
					<center><h5><span style="color: #009a54;   font-size: 26px;" data-mce-mark="1">Profile</span></h3></center>
				</div>
					<?php echo $row->isi_profile_ina ?>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3">
				<aside class="right-sidebar">
					<div class="thum">
						<div style="margin-left:10px;">
							<h5 class="widgetheading">Search DCC UST</h5>
							<form class="form-search">
								<input class="form-control" style="  margin-top: -19px; margin-bottom: 9px;" type="text" placeholder="Search..">
								<!--<input class="art-search-button" type="submit" value="Search" />-->
							</form>
						</div>
					</div>
					<div class="thum">
						<div style="margin-left:10px;">
							<h5 class="widgetheading">Visi</h5>
							<?php echo $row->visi_profile_ina ?>
						</div>
					</div>
					<div class="thum">
						<div style="margin-left:10px;">
							<h5 class="widgetheading">Misi</h5>
							<?php echo $row->misi_profile_ina ?>
						</div>
					</div>
					
				</aside>
			</div>
			
		</div>
	</div>
	</section>