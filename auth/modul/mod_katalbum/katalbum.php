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
		$aksi="modul/mod_katalbum/aksi_katalbum.php";
		switch($_GET[act]){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Daftar Katagori album</h3>
				
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Insert New' onclick="location.href='?module=katalbum&act=insertnew'">
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Update Header' onclick="location.href='?module=katalbum&act=update_header'">
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Thumbnail</th> 
    				<th>Kategori album</th> 
					<th>Deskripsi</th>
    				<th>Aksi</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$katalbum = mysql_query("SELECT * FROM kategori_album ORDER BY id_katalbum DESC");
				while($m=mysql_fetch_array($katalbum)){
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><img width="100px" src="../joimg/katalbum/<?php echo"$m[gambar]" ?>"></td> 
    				<td><?php echo"$m[nama]" ?></td> 
					<td><?php echo"$m[deskripsi]" ?></td> 
    				<td align="center"><a href="<?php echo"?module=katalbum&act=edit&id=$m[id_katalbum]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=katalbum&act=hapus&id=$m[id_katalbum]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
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
			<header><h3>Tambahkan kategori album</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=katalbum&act=insertnew'>
				<div class="module_content">
						
					<table>
						<fieldset style="width:20%;"><label>Nama Kategori Album</label></td> <td style="width:50%; margin-bottom:8px;"><input style="width:100%; margin-bottom:8px;" name="nama" type="text" ></td></tr>
					</table>
					<fieldset><label>Keterangan Singkat</label><br /><br />
						<textarea name="deskripsi"></textarea>
					</fieldset>
					<div class="clear"></div>
					*** Usahakan penulisan <strong>deskripsi</strong> hanya dua baris saja, agar menyesuaikan tampilan tinggi gambar disampingnya.
					<div class="clear"></div>
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						<label>Thumbnail</label><br /><br />
						<input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 650 x 450px.
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
			$katalbum = mysql_query("SELECT * FROM kategori_album WHERE id_katalbum='$_GET[id]'");
			$r=mysql_fetch_array($katalbum);
			
		?>
		
		
		<article class="module width_full">
			<header><h3>Edit Kategori Album</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=katalbum&act=update'>
				<input type='hidden' name='id' value='<?php echo"$r[id_katalbum]" ?>'>
				<div class="module_content">
					<table>
						
						<tr><td style="width:20%;"><label>Nama Kategori album</label></td> <td style="width:50%; margin-bottom:8px;"><input style="width:100%; margin-bottom:8px;" name="nama" type="text" value="<?php echo"$r[nama]" ?>"></td></tr>
						
					</table>
					<div class="clear"></div>
					<fieldset><label>Edit katalbum</label><br /><br />
						<textarea name="deskripsi"><?php echo"$r[deskripsi]" ?></textarea>
					</fieldset>
					
					*** Usahakan penulisan <strong>deskripsi</strong> hanya dua baris saja, agar menyesuaikan tampilan tinggi gambar disampingnya.
					<div class="clear"></div>
					<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						&nbsp;&nbsp;<img width="270px" src="../joimg/katalbum/<?php echo"$r[gambar]" ?>">
						<br /><br /><label>Ganti Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 650 x 450px.
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
		
		<?php break; 
		case"update_header":
			$header = mysql_query("SELECT * FROM header WHERE id_header='9' AND aktif='Y'");
			$h=mysql_fetch_array($header);
			
		?>
		
		<article class="module width_full">
			<header><h3>Edit Header Galeri</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=katalbum&act=update_header'>
			<div class="col-lg-12">
				<input type='hidden' name='id' value='<?php echo"$h[id_header]" ?>'>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#ina" data-toggle="tab">Content Indonesia</a>
                                </li>
                               <!--  <li class=""><a href="#en" data-toggle="tab">Content English</a>
                                </li> -->
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="ina">
									<div class="module_content">
										<fieldset><label>Judul</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="nama_header_ina" type="text" value="<?php echo"$h[nama_header_ina]" ?>">
										</fieldset>
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_header_ina" id="jogmce"><?php echo"$h[isi_header_ina]" ?></textarea>
										</fieldset>
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
										<fieldset><label>Tittle</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="nama_header_en" type="text" value="<?php echo"$h[nama_header_en]" ?>">
										</fieldset>
										<fieldset><label>Description</label><br /><br />
											<textarea name="isi_header_en"><?php echo"$h[isi_header_en]" ?></textarea>
										</fieldset>
									</div>	
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					</div>
					<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						&nbsp;&nbsp;<img width="270px" src="../joimg/header_image/<?php echo"$h[gambar]" ?>">
						<br /><br /><label>Ganti header</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 1024x370 px.
					</fieldset>
					<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article --><br /><br /><!-- end of post new article -->
		
		
		<?php	
			break;
			}
		
	 ?>
<?php } ?>