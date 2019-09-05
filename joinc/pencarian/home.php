<div class="row" style="margin-top: 19px; margin-bottom: 50px;"> 
	<?php 
		$nama_q	 	= $_SESSION['bahasa'] 	== "en" ? "nama_kiri_".$_SESSION[bahasa] : "nama_kiri_ina";
		$isi_q	 	= $_SESSION['bahasa'] 	== "en" ? "isi_kiri_".$_SESSION[bahasa] : "isi_kiri_ina";
		$isi 		= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$aw["$isi_q"])));			
		$isi		= substr($isi,0,strrpos(substr($isi,0,210)," "));
		
	?>
	<article style="margin-bottom: 10px;border: 1px dotted #cccccc; min-height: 200px;">
			<div class="post-image">
			</div>
		<p>
			<div class="post-heading">
				<h5><a href="#"><?php echo "$aw[$nama_q]"; ?></a></h5>
			</div>
			<?php echo "$isi"; ?><a href="detailsearch-<?php echo"$aw[id_berita]"; ?>.html"> [..]</a>
		</p>
	</article>
</div>