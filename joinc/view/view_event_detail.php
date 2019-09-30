<section id="featured">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div id="main-slider" class="flexslider">
						<ul class="slides">
						<li>
							<?php
								echo '
									<img src="joimg/header_image/'.$header->gambar.'" alt="" />
									<div class="flex-caption">
										<h3>'.$header->nama_header_ina.'</h3> 
										'.$header->isi_header_ina.'
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
				
				<div class="row" style="margin-top: 19px; margin-bottom: 50px;"> 
					<?php 
						echo '
							<article>
								<div class="bawah">
								<article class="">
								<h4 style="font-weight: 200;"><a href="" rel="" title="'.$row->nama_agenda_ina.'">'.$row->nama_agenda_ina.'</a></h4>              
								<div style="margin-top: -15px;">
								<span class="">
									<span class="date">Published</span> 
									<span class="entry-date" title="7:21 am">'.$row->tanggal_mod.'</span>
								</span> |
								<span class="">
									<span class="">By</span> 
									<span class="">
									<a class="" href="#" title="">admin</a></span>
								</span>
								</div> 
								<div class="">
									
									<p><img class="img-responsive" alt="executive_development_program_thumb" src="joimg/event/'.$row->gambar.'" /></p>
										<p><strong>Tema :  </strong>'.$row->tema_agenda_ina.'</br>
										<strong>Tanggal : </strong>'.$row->waktu.'</br>
										<strong>Tempat :</strong> '.$row->lokasi.'</br>
										<strong>Peserta : </strong>'.$row->peserta.'</p>
										<p><strong>Keterangan lengkap:</strong> '.$row->isi_agenda_ina.'</p>
								</div>
								</article>
								<div class="post-heading">
										<h3><a href="#">'.$row->nama_agenda_ina.'</a></h3>
										<!-- Go to www.addthis.com/dashboard to customize your tools -->
											<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54bc99eb04210058" async="async"></script>
										<!-- Go to www.addthis.com/dashboard to customize your tools -->
											<div class="addthis_sharing_toolbox"></div>
									</div>
							</div>
							</article>
						';
					?>
				</div>
			</div>
		</div>
		 <div class="col-lg-3">
			<?php $this->home_sidebar() ?>
		</div>
	</div>
	</section>
	