<div class="row" style="margin-top: 19px; margin-bottom: 50px;"> 
	<?php 
		$nama_q	 	= $_SESSION['bahasa'] 	== "en" ? "nama_service_proyek_".$_SESSION[bahasa] : "nama_service_proyek_ina";
		$isi_q	 	= $_SESSION['bahasa'] 	== "en" ? "isi_service_proyek_".$_SESSION[bahasa] : "isi_service_proyek_ina";
		$isi 		= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$as["$isi_q"])));			
		$isi		= substr($isi,0,strrpos(substr($isi,0,210)," "));
		
	?>
	<article style="margin-bottom: 10px;border: 1px dotted #cccccc; min-height: 200px;">
			<div class="post-image">
				<img style="height: 190px;" class="leftblok" src="joimg/service_proyek/<?php echo "$as[gambar]"; ?>" alt="" />
			</div>
		<p>
			<div class="post-heading">
				<h5><a href="#"><?php echo "$as[$nama_q]"; ?></a></h5>
			</div>
			<?php echo "$isi"; ?><a href="detailsearch-<?php echo"$as[id_service_proyek]"; ?>.html"> [..]</a>
		</p>
	</article>
</div>