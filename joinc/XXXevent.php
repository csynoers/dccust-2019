<!-- end header -->
	<section id="featured">
	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="main-slider" class="flexslider">
					<ul class="slides">
						<li>
							<?php
								$row= $db->get_select("SELECT * FROM header where id_header='4'")['data'][0];
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
						$rows= $db->get_select("SELECT * FROM agenda order by id_agenda DESC");
						foreach ($rows['data'] as $key => $value) {
							echo '
								<div class="bawah">
									<article class="">
									<h4 style="font-weight: 200;"><a href="detailevent-'.$value->id_agenda.'-'.$value->seo_ina.'.html" rel="" title="'.$value->nama_agenda_ina.'">'.$value->nama_agenda_ina.'</a></h4>              
									<div style="margin-top: -15px;">
									<span class="">
										<span class="date">Published</span> 
										<span class="entry-date" title="7:21 am">'.$value->tanggal.'</span>
									</span> |
									<span class="">
										<span class="">By</span> 
										<span class="">
										<a class="" href="#" title="">fgi-admin</a></span>
									</span>
									</div> 
									<div class="">
										
										<p><img class="" alt="executive_development_program_thumb" src="joimg/event/'.$value->gambar.'" width="300" height="210" /></p>
										<p>&nbsp;</p>
										<ul class="margin">
											<li><strong>Theme :  </strong>'.$value->tema_agenda_ina.'</li>
											<li><strong>Date : </strong>'.$value->waktu.'</li>
											<li><strong>Place :</strong> '.$value->lokasi.'</li>
											<li><strong>Member : </strong>'.$value->peserta.'</li>
											<!--<li><strong>Keterangan :</strong> '.$value->isi_agenda_ina.'</li>-->
										</ul>
										<!--<p style="  margin-left: 326px; margin-top: 30px;"> <a href="#">Read More <span class="meta-nav">...</span></a></p>-->
									</div>
									</article>
								</div>
							';
						}
					?>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3">
				<?php include "sidebar.php" ; ?>
			</div>
			
		</div>
	</div>
	</section>