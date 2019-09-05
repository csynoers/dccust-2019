<div class="row" style="margin-top: 19px; margin-bottom: 50px;"> 
	<?php 
		$nama_q	 	= $_SESSION['bahasa'] 	== "en" ? "nama_berita_".$_SESSION[bahasa] : "nama_berita_ina";
		$isi_q	 	= $_SESSION['bahasa'] 	== "en" ? "isi_berita_".$_SESSION[bahasa] : "isi_berita_ina";
		$isi 		= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$aq["$isi_q"])));			
		$isi		= substr($isi,0,strrpos(substr($isi,0,210)," "));
		
	?>
	<article style="margin-bottom: 10px;border: 1px dotted #cccccc; min-height: 200px;">
			<div class="post-image">
				<img style="height: 190px;" class="leftblok" src="joimg/materi/<?php echo "$aq[gambar]"; ?>" alt="" />
			</div>
		<p>
			<div class="post-heading">
				<h5><a href="#"><?php echo "$aq[$nama_q]"; ?></a></h5>
			</div>
			<?php echo "$isi"; ?><a href="detailsearch-<?php echo"$aq[id_berita]"; ?>.html"> [..]</a>
		</p>
	</article>
</div>