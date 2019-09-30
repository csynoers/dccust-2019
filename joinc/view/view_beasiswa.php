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
                        <img src="joimg/header_image/<?php echo $header->gambar ?>" alt="" />
                        <div class="flex-caption">
                            
                            <h3><?php echo $header->nama_header_ina ?></h3> 
                            <?php echo $header->isi_header_ina ?>
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
                                    foreach ($rows as $key => $value) {
                                        echo '
                                            <li class="col-lg-4">
                                                <div class="post-thumb">
                                                    <a href="detailbeasiswa-'.$value->id_beasiswa.'.html" class="link_image" title="'.$value->nama_beasiswa.'"><img src="joimg/beasiswa/'.$value->gambar.'" width="256" alt="'.$value->nama_beasiswa.'" /></a>
                                                </div>
                                                <h5 class="post-titleX">
                                                    <a href="detailbeasiswa-'.$value->id_beasiswa.'.html" class="link_title btn btn-link" title="'.$value->nama_beasiswa.'"> '.$value->nama_beasiswa.'</a></h5>
                                                <div class="entry-content">
                                                    <p align="justify"> '.$value->isi_beasiswa_mod.' &nbsp <a class="btn btn-link" href="detailbeasiswa-'.$value->id_beasiswa.'-'.$value->seo_beasiswa.'.html">[..]</a></p>
                                                </div>
                                            </li>
                                        
                                        ';
                                    }
                                ?>
                            </ul>
                        </div>
                        </article>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <?php $this->home_sidebar() ?>
            </div>
        </div>
    </div>
</section>