<div class="row" style="margin-top: 19px; margin-bottom: 50px;"> 
	<?php 
		$nama_q	 	= $_SESSION['bahasa'] 	== "en" ? "nama_profile_".$_SESSION[bahasa] : "nama_profile_ina";
		$isi_q	 	= $_SESSION['bahasa'] 	== "en" ? "isi_profile_".$_SESSION[bahasa] : "isi_profile_ina";
		$isi 		= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$ac["$isi_q"])));			
		$isi		= substr($isi,0,strrpos(substr($isi,0,210)," "));
		
	?>
	<article style="margin-bottom: 10px;border: 1px dotted #cccccc; min-height: 200px;">
			<div class="post-image">
				<img style="height: 190px;" class="leftblok" src="joimg/profile/<?php echo "$ac[gambar]"; ?>" alt="" />
			</div>
		<p>
			<div class="post-heading">
				<h5><a href="#"><?php echo "$ac[$nama_q]"; ?></a></h5>
			</div>
			<?php echo "$isi"; ?><a href="detailsearch-<?php echo"$ac[id_profile]"; ?>.html"> [..]</a>
		</p>
	</article>
</div>