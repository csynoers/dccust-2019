<section id="featured">
    <!-- start slider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="main-slider" class="flexslider">
                    <ul class="slides">
                        <li>
                            <?php
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
                <!-- /#main-slider .flexslider -->
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
			<div class="col-lg-9 col-md-9">
			<div class="col-lg-12 col-md-12">
				<div class="bawah">
					<center><h5><span style="color: #009a54;   font-size: 26px;" data-mce-mark="1">Galeri Album</span></h3></center>
				</div>	
				<div class="row" style="margin-top: 19px;">
					<section id="projects">
						<ul id="thumbss" class="portfolio">
						<?php
							foreach ($rows as $key => $value) {
								echo '
									<!-- Item Project and Filter Name -->
									<li class="item-thumbss col-lg-3 design" data-id="id-0" data-type="web">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="'.$value->nama.'" href="galeri-dccustjogja-'.$value->id_album.'.html">
											<span class="overlay-img"></span>
											<span class="overlay-img-thumb font-icon-plus"></span>
										</a>
										<!-- Thumb Image and Description -->
										<img style="height:170px;  box-shadow: 0 0 9px #000;" src="joimg/album/'.$value->gambar.'" alt="'.$value->deskripsi.'">
										<div class="judul">
											<center><h5><a href="#">'.$value->nama.'</a></h5></center>
										</div>
									</li>
									<!-- End Item Project -->
								';
							}
						?>
						</ul>
					</section>
				</div>
			</div>
			</div>
			
			<div class="col-lg-3 col-md-3">
				<?php $this->home_sidebar() ?>
			</div>
			
		</div>
	</div>
</section>