<section id="featured">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Slider -->
                <div id="main-slider" class="flexslider">
                    <ul class="slides">
                        <li>
                            <?php
                                echo '
                                    <img src="joimg/header_image/'.$row->gambar.'" alt="" />
                                    <div class="flex-caption">
                                        <h3>'.$row->nama_header_ina.'/h3> 
                                        '.$row->isi_header_ina.'>
                                    </div>
                                ';
                            ?>
                        </li>
                    </ul>
                </div>
                <!-- end slider -->
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
                            <center><h5><span style="color: #009a54;   font-size: 26px;" data-mce-mark="1">Galeri Video</span></h3></center>
                    </div>	
                    <div class="row" style="margin-top: 19px;">
                        <section id="projects">
                            <ul id="thumbss" class="portfolio">
                                <?php
                                    foreach ($rows as $key => $value) {
                                        echo '
                                            <!-- Item Project and Filter Name -->
                                            <li class="item-thumbss col-lg-3 design" data-id="id-0" data-type="web">		
                                            <iframe width="250" height="250" src="'.$value->video.'" allowfullscreen=""></iframe>
                                            </li>
                                        ';
                                    }
                                ?>
                            </ul>
                        </section>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.col -->
            
            <div class="col-lg-3 col-md-3">
                <?php $this->home_sidebar() ?>
            </div>
            
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#featured -->