	<section id="featured">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div id="main-slider" class="flexslider">
							<ul class="slides">
								<li>
									<?php
										$row= $db->get_select("SELECT * FROM header where id_header='6'")['data'][0];
										echo '
											<img src="joimg/header_image/'.$row->gambar.'" alt="" />
											<div class="flex-caption">
												
												<h3>'.$row->nama_header_ina.'</h3> 
												'.$row->isi_header_ina.'
											</div>
										';
									?>
								</li>
							</ul>
						</div>
						<!-- /.flexslider -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
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
						$row= $db->get_select("SELECT * FROM artikel where id_artikel='$_GET[id]'")['data'][0];
						echo '
							<article>
								<div class="post-image">
									<div class="post-heading">
										<h3><a href="#">'.$row->nama_artikel.'</a></h3>
										<!-- Go to www.addthis.com/dashboard to customize your tools -->
											<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54bc99eb04210058" async="async"></script>
										<!-- Go to www.addthis.com/dashboard to customize your tools -->
											<div class="addthis_sharing_toolbox"></div>
									</div>
									<img style="max-width: 70%" src="joimg/artikel/'.$row->gambar.'" alt="" />
								</div>
								'.$row->isi_artikel.'	
							</article>					
						';
					?>
				</div>
			</div>
		</div>
		 <div class="col-lg-3">
			<?php include "joinc/sidebar.php" ; ?>
		</div>
	</div>
	</section>
	