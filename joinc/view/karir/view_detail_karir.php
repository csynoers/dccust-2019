<div class="cs-content">
<div class="bawah" style="margin-top:20px; border-top: 1px solid #ddd;">
	<h3 style="padding-bottom: 20px; color: #009a54; border-bottom: 1px solid #ddd"><i class="fa fa-bars" aria-hidden="true"></i> Detail Lowongan </h3>
	<p class="clear-fix"></p>
	<?php
		foreach ($karir as $key) {
			?>
<!-- 				<div class="col-lg-12" style="border: 1px solid #ddd">
					<h3 style="color: #009a54"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php //echo $key['judul_karir'] ?></h3>
					<div class="col-lg-2">
						<img class="img-responsive" src="joimg/karir/<?php //echo $key['gambar'] ?>">
					</div>
					<div class="col-lg-8">
						<?php// echo substr($key['isi_karir'], 0,400) ?>
					</div>
					<div class="col-lg-2 cs-right">
						<div class="cs-tag">new</div>
						<br>
						<center>
							<h1 style="font-size: 48px;">1</h1>
							<span>Lowongan</span>
						</center>
						<br>
						<div class="cs-lihat">Lihat <i class="fa fa-chevron-down"></i></div>
					</div>
				</div>
				<p class="clear-fix"></p> -->
							<article class="">
								<h4 style="font-weight: 200;"><a href="" rel="" title="<?php echo"$key[judul_karir]"; ?>"><?php echo"$key[judul_karir]"; ?></a></h4>              
								<div style="margin-top: -15px;">
								<span class="">
									<span class="date">Published</span> 
									<span class="entry-date" title="7:21 am"><?php echo"$key[tanggal]"; ?></span>
								</span> |
								<span class="">
									<span class="">By</span> 
									<span class="">
									<a class="" href="#" title="">admin</a></span>
								</span>
								</div> 
								<div class="">
									
									<p><img class="" alt="executive_development_program_thumb" src="joimg/karir/<?php echo"$key[gambar]"; ?>" /></p>
										<p><strong>Perusahaan :  </strong><?php echo"$key[perusahaan_karir]"; ?></br>
										<strong>Batas Ashir : </strong><?php echo"$key[deadline]"; ?></br>
										<strong>Penempatan :</strong> <?php echo get_kota($key[lokasi]); ?></p>
										<p><strong>Keterangan lengkap:</strong> <?php echo"$key[isi_karir]"; ?></p>
								</div>
							</article>
							<div class="post-heading">
								<h3><a href="#"><?php echo "$f[nama_artikel]"; ?></a></h3>
								<!-- Go to www.addthis.com/dashboard to customize your tools -->
								<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54bc99eb04210058" async="async"></script>
								<!-- Go to www.addthis.com/dashboard to customize your tools -->
								<div class="addthis_sharing_toolbox"></div>
							</div>
			<?php
		}
	?>					
</div>
</div>