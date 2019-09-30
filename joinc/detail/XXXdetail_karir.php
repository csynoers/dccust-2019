<section id="featured">
<!-- start slider -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<!-- Slider -->
			<div id="main-slider" class="flexslider">
				<ul class="slides">
				<li>
					<?php
						$row= $db->get_select("SELECT * FROM header where id_header='7'")['data'][0];
					?>
					<img src="joimg/header_image/<?php echo $row->gambar ?>" alt="" />
					<div class="flex-caption">
						
						<h3><?php echo $row->nama_header_ina ?></h3> 
						<?php echo $row->isi_header_ina ?>
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
			<div class="col-lg-9">
			<?php 
				$row= $db->get_select("SELECT *,DATE_FORMAT(karir.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM karir LEFT JOIN propinsi ON propinsi.propinsi_id=karir.lokasi WHERE id_karir='$_GET[id]'")['data'][0];
				
			?>
				<article>
					<h2 class="text-capitalize">
						<a href="" rel="" title="<?php echo $row->judul_karir ?>">
							<i class="fa fa-eye" aria-hidden="true"></i>
							<?php echo $row->judul_karir ?>
						</a>
					</h2>              
					<span class="label label-info">
						<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> Published : </span>
						<span class="entry-date" title="7:21 am"><?php echo $row->tanggal_mod ?></span>
						<span class="">By :</span> 
						<span class="">admin</span>
					</span>
					<p>
						<br>
						<img width="100%" class="" alt="executive_development_program_thumb" src="joimg/karir/<?php echo $row->gambar ?>" />
						<div class="alert alert-info">
							<table>
								<tr>
									<td><strong>Perusahaan </strong></td>
									<td class="text-capitalize"><strong> : </strong><?php echo $row->perusahaan_karir ?></td>
								</tr>
								<tr>
									<td><strong>Batas Akhir </strong></td>
									<td><strong> : </strong><?php echo $row->tanggal_mod ?></br></td>
								</tr>
								<tr>
									<td><strong>Penempatan </strong></td>
									<td><strong> : </strong><?php echo $row->propinsi_name ?></td>
								</tr>
							</table>
						</div>
						<table>
							<tr>
								<strong>Keterangan lengkap:</strong>
							</tr>
							<tr>
								<?php echo $row->isi_karir ?>
							</tr>
							<tr>
								<div class="post-heading">
									<h3><a href="#"><?php echo $row->judul_karir ?></a></h3>
									<!-- Go to www.addthis.com/dashboard to customize your tools -->
									<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54bc99eb04210058" async="async"></script>
									<!-- Go to www.addthis.com/dashboard to customize your tools -->
									<div class="addthis_sharing_toolbox"></div>
								</div>
							</tr>
						</table>			
					</p>
				</article>

			</div>

			<div class="col-lg-3">
				<?php include_once "joinc/sidebar.php" ; ?>
			</div>

		</div>
	</div>
</section>
	