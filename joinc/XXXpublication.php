<!-- end header -->
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
							<center><h5><span style="color: #009a54; font-size: 26px;" data-mce-mark="1">Artikel</span></h3></center>
						</div>
						<div class="row" style="margin-top: 19px;">
							<div class="art-sheet clearfix">
							<article>
							<div>
								<ul class="wpb_thumbnails wpb_thumbnails-fluid clearfix" data-layout-mode="fitRows">
									<?php
										$rows= $db->get_select("SELECT * FROM artikel order by id_artikel DESC");
										foreach ($rows['data'] as $key => $value) {
											echo '
												<li class="col-lg-4">
													<div class="post-thumb">
														<a href="detailpublikasi-'.$value->id_artikel.'.html" class="link_image" title="'.$value->nama_artikel.'"><img src="joimg/artikel/'.$value->gambar.'" width="282" height="94" alt="'.$value->nama_artikel.'" /></a>
													</div>
													<h5 class="post-title">
														<a href="detailpublikasi-'.$value->id_artikel.'.html" class="link_title text-info" title="'.$value->nama_artikel.'" >'.$value->nama_artikel.'</a></h5>
													<div class="entry-content">
														<p align="justify">'.substr(htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$value->isi_artikel))), 0, strrpos(substr(htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$value->isi_artikel))), 0, 300)," ")).'&nbsp <a class="text-info" href="detailpublikasi-'.$value->id_artikel.'-'.$value->seo_artikel.'.html">[..]</a></p>
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
					<?php include "sidebar.php" ; ?>
				</div>
			</div>
		</div>
	</section>