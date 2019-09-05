<?php
foreach ($karir as $key) {
	?>
		<div class="col-lg-12" style="border: 1px solid #ddd">
		<a href="detailkarir-<?php echo $key['id_karir'].'-'.$key['seo_ina'] ?>.html">
			<h3 style="color: #009a54"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $key['judul_karir'] ?></h3>
		</a>
			<div class="col-lg-2">
				<img class="img-responsive" src="joimg/karir/<?php echo $key['gambar'] ?>">
			</div>
			<div class="col-lg-10">
				<?php echo substr($key['isi_karir'], 0,400) ?>
				<a class="data-page" data-page="<?php echo $key['id_karir'] ?>" href="detailkarir-<?php echo $key['id_karir'].'-'.$key['seo_ina'] ?>.html">... Read More</a>
			</div>
		</div>
		<p class="clear-fix"></p>
	<?php
}