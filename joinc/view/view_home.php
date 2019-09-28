<section id="featured">
    <!-- start slider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="main-slider" class="flexslider">
                    <ul class="slides">
                    <?php
                        foreach ($rows['slide'] as $key => $sh){
                            echo "
                                <li>
                                    <a href='{$sh->link}' target='_blank'>
                                        <img src='https://via.placeholder.com/1200x300.png?text={$sh->judul_ina}'  data-src='joimg/slide/{$sh->gambar}' alt='{$sh->judul_ina}'/>
                                    </a>
                                </li>
                            ";
                        }
                    ?>
                    </ul>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->	
</section>
<!-- / section -->

<section id="featured">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 ">
				<div class="col-lg-12 col-md-12">
					<div class="foooter">
						<center><h5><span style="color: #009a54;"><?php echo $rows['welcome']->nama_modul_ina ?></span></h5></center>
						<?php echo $rows['welcome']->static_content_ina ?>
					</div>
				</div>
				<!-- /.col -->

				<div class="col-lg-6 col-md-6">
					<div class="bawah">
						<center><h5><span style="color: #009a54;   font-size: 14px;padding-top: 10px" data-mce-mark="1">Lowongan Kerja Terbaru</span></h5></center>
					</div>
					<div class="panel panel-default" style="height: 750px;overflow: auto;">
						<div class="panel-body">
							<?php
								foreach ($rows['karir'] as $key => $k){ ?>
									<div class="bawah">
										<article class="">
										<h4 style="font-weight: 200;text-transform: capitalize;"><a href="detailkarir-<?php echo $k->id_karir.'-'.$k->seo_ina ?>.html" rel="" title="<?php echo $k->judul_karir ?>"><?php echo $k->judul_karir ?></a></h4>              
										<div style="margin-top: -15px;">
										<span class="">
											<span class="date">Published : </span> 
											<span class="entry-date" ><?php echo tanggal_indo(date('Y-m-d', strtotime($k->tanggal)),TRUE) ?></span>
										</span> |
										<span class="">
											<span class="">By</span> 
											<span class="">
											<a class="" href="#" title="">admin</a></span>
										</span>
										</div> 
										<div class="">
											<p><img src="<?php echo "https://via.placeholder.com/512x256.png?text={$k->judul_karir}" ?>" class="" alt="executive_development_program_thumb" data-src="joimg/karir/<?php echo $k->gambar ?>" style="width:100%;height: auto" /></p>
											<!-- <p>&nbsp;</p> -->
											<div class="alert alert-info">
												<ul class="marginX">
												<li class="text-capitalize"><strong>Perusahaan :  </strong><?php echo $k->perusahaan_karir ?></li>
												<li><strong>Batas Akhir : </strong><?php echo tanggal_indo(date('Y-m-d', strtotime($k->deadline)),TRUE) ?></li>
												<li><strong>Penempatan :</strong> <?php echo $k->propinsi_name ?></li>
												</ul>
											</div>
										</div>
										</article>
									</div>

							<?php }	?>
							<center style="padding-top: 10px;padding-bottom: 10px;"><a href="karir-dccustjogja.html" target="_blank"><button class="btn btn-lg btn-primary" id="submit">Lihat Lainnya</button></a></center>
						</div>
					</div>
				</div>
				<!-- /.col -->

				<div class="col-lg-6 col-md-6">
					<div class="bawah">
						<center><h5><span style="color: #009a54;   font-size: 14px;padding-top: 10px" data-mce-mark="1">Agenda DCC UST</span></h5></center>
					</div>
					<div class="panel panel-default" style="height: 750px;overflow: auto;">
						<div class="panel-body">
							<?php
								foreach($rows['agenda'] AS $key => $s){
							?>
							<div class="bawah">
								<article class="">
								<h4 style="font-weight: 200;"><a href="detailevent-<?php echo ($s->id_agenda).'-'.($s->seo_ina) ?>.html" rel="" title="<?php echo $s->nama_agenda_ina ?>"><?php echo $s->nama_agenda_ina ?></a></h4>              
								<div style="margin-top: -15px;">
								<span class="">
									<span class="date">Published : </span> 
									<span class="entry-date" ><?php echo tanggal_indo(date('Y-m-d', strtotime($s->tanggal)),TRUE) ?></span>
								</span> |
								<span class="">
									<span class="">By</span> 
									<span class="">
									<a class="" href="#" title="">fgi-admin</a></span>
								</span>
								</div> 
								<div class="">
									
									<p><img src="<?php echo "https://via.placeholder.com/512x256.png?text={$s->nama_agenda_ina}" ?>" class="" alt="executive_development_program_thumb" data-src="joimg/event/<?php echo"$s->gambar"; ?>" style="width: 100%;height: auto;" /></p>
									<div class="alert alert-info">
										<ul class="marginX">
											<li><strong>Tema :  </strong><?php echo $s->tema_agenda_ina ?></li>
											<li><strong>Tanggal : </strong><?php echo tanggal_indo($s->waktu,TRUE); ?></li>
											<li><strong>Tempat :</strong> <?php echo $s->lokasi ?></li>
											<li><strong>Peserta : </strong><?php echo $s->peserta ?></li>
										</ul>	
									</div>
								</div>
								</article>
							</div>
							
							<?php } ?>
							<center style="padding-top: 10px;padding-bottom: 10px;"><a href="event-dccustjogja.html" target="_blank"><button class="btn btn-lg btn-primary" id="submit">Lihat Lainnya</button></a></center>
						</div>
					</div>
				</div>
				<!-- /.col -->

				<div class="col-lg-12 col-md-12">
					<div class="foooter">
						<div class="bawah">
							<center><h5><span style="color: #009a54;   font-size: 14px;padding-top: 10px" data-mce-mark="1">Kerjasama</span></h5></center>
						</div>
					<div class="row" style="margin-top: 19px;">
						<section id="projects">
						<ul id="thumbss" class="portfolio">
						<?php
							foreach ($rows['kerjasama'] as $key => $value) {
						?>
							<li class="item-thumbss col-lg-3 design" data-id="id-0" data-type="web">
								<img src="<?php echo "https://via.placeholder.com/256x128.png?text={$value->nama_sajian_ina}" ?>" style="max-height:150px;max-width: 200px;  box-shadow: 0 0 2px #009a54;" data-src="joimg/ourclient/<?php echo $value->gambar ?>" alt="<?php echo $value->nama_sajian_ina ?>">
							</li>
							<?php } ?>
						</ul>
						</section>
					</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="col-lg-3 col-md-3">
				<?php
					$this->home_sidebar();
				?>
			</div>
		</div>
			
	</div>
</section>
<!-- / section -->