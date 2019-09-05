<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>
<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
$(document).ready( function () {
     var oTable = $('#example').dataTable( {
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
				} );		
} );
</script>
<style>.ui-widget-header{background:none;border:none;}</style>

		
		<?php
		$aksi="modul/mod_overview/aksi_overview.php";
		switch($_GET['act']){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Overview</h3>
				
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Insert New' onclick="location.href='?module=overview&act=insertnew'">
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Thumbnail</th> 
    				<th>Judul</th> 
    				<th width="80px">Tanggal</th> 
    				<th width="70px">Aksi</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$berita = mysql_query("SELECT * FROM overview ORDER BY id DESC");
				while($b=mysql_fetch_array($berita)){
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><img width="100px" src="../joimg/overview/<?php echo"$b[gambar]" ?>"></td> 
    				<td><?php echo"$b[nama]" ?></td> 
    				<td><?php echo"$b[tanggal]" ?></td> 
    				<td align="center"><a href="<?php echo"?module=overview&act=edit&id=$b[id]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=overview&act=hapus&id=$b[id]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
			<div class="clear"></div>
			</div><!-- end of #tab1 -->
			<div class="clear"></div>
		</div><!-- end of .tab_container -->
		</article>
		<br />
		<div class="clear"></div>
		
		<?php break; 
		case"insertnew":
		?>
		
		<article class="module width_full">
			<header><h3>Tambahkan Overview</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=overview&act=insertnew'>
				<div class="module_content">
						
						<table>
							
							<tr><td style="width:10%;"><label>Judul Overview</label></td> <td style="width:1000px; margin-bottom:8px;"><input style="width:100%; margin-bottom:8px;" name="nama" type="text" ></td></tr>
							
						</table>
						<fieldset><label>Isi Overview</label><br /><br />
							<textarea name="isi" rows="12" id="jogmce"><?php echo"$w[static_content]" ?></textarea>
						</fieldset>
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Thumbnail</label><br /><br />
							<input style="margin-left:10px;" type="file" name="fupload" size=40>
							<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 500x375px.
						</fieldset>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><br /><br /><!-- end of post new article -->
		
		<?php break; 
		case"edit":
			$berita = mysql_query("SELECT * FROM overview WHERE id='$_GET[id]'");
			$r=mysql_fetch_array($berita);
			
		?>
		<?php
			switch($_GET['act2']){
				default:
		?>
		
		<article class="module width_full">
			<header><h3>Edit Overview</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=overview&act=update'>
				<input type='hidden' name='id' value='<?php echo"$r[id]" ?>'>
				<div class="module_content">
						<table>
							
							<tr><td style="width:10%;"><label>Judul</label></td> <td style="width:1000px; margin-bottom:8px;"><input style="width:100%; margin-bottom:8px;" name="nama" type="text" value="<?php echo"$r[nama]" ?>"></td></tr>
							
						</table>
						<fieldset><label>Keterangan</label><br /><br />
							<textarea name="isi" id="jogmce"><?php echo"$r[isi]" ?></textarea>
						</fieldset>
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							&nbsp;&nbsp;<img width="270px" src="../joimg/overview/<?php echo"$r[gambar]" ?>">
							<br /><br /><label>Ganti Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
							<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 500x375px.
						</fieldset>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><br /><br /><!-- end of post new article -->
		
		
		<div class="clear"></div><br/><br/>
		
		
		
		<?php	
			break;
			}
		break;
		 } ?>
		
<?php } ?>