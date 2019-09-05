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
		$aksi="modul/mod_kegiatan/aksi_kegiatan.php";
		$module="kegiatan";
		switch($_GET['act']){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Service (Four fain group)</h3>
				
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Insert New' onclick="location.href='?module=<?php echo $module;?>&act=insertnew'">
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Thumbnail</th> 
    				<th>Tittle</th> 
    				<th width="80px">Date</th> 
    				<th width="130px">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$berita = mysql_query("SELECT * FROM kegiatan ORDER BY id_keg DESC");
				while($b=mysql_fetch_array($berita)){
				$tanggal = tgl_amerika($b['tanggal']);
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><img height="70px" src="../joimg/service_group/<?php echo"$b[gambar]" ?>"></td> 
    				<td><?php echo"$b[nama_keg_ina]" ?></td> 
    				<td width="90px"><?php echo $tanggal; ?></td> 
    				<td align="center"><a href="<?php echo"?module=$module&act=edit&id=$b[id_keg]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=$module&act=hapus&id=$b[id_keg]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
					</td> 
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
			<header><h3 style="color: Red;">insert (Four fain group)</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=insertnew'>
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#ina" data-toggle="tab">Content Indonesia</a>
                                </li>
                                <!-- <li class=""><a href="#en" data-toggle="tab">Content English</a>
                                </li> -->
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="ina">
									<div class="module_content">
										<fieldset><label>Judul</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="judul_ina" type="text" >
										</fieldset>
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_ina" id="jogmce"></textarea>
										</fieldset>
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
										<fieldset><label>Tittle</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="judul_en" type="text" >
										</fieldset>
										<fieldset><label>Description</label><br /><br />
											<textarea name="isi_en"></textarea>
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
						<label>Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> 
					</fieldset>
					<div class="clear"></div>
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
			$berita = mysql_query("SELECT * FROM kegiatan WHERE id_keg='$_GET[id]'");
			$r=mysql_fetch_array($berita);
		?>
		
		<article class="module width_full">
			<header><h3>Edit Service (Four fain group)</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=update'>
			<div class="col-lg-12">
				<input type='hidden' name='id' value='<?php echo"$r[id_keg]" ?>'>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#ina" data-toggle="tab">Content Indonesia</a>
                                </li>
                                <!-- <li class=""><a href="#en" data-toggle="tab">Content English</a>
                                </li> -->
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="ina">
									<div class="module_content">
										<fieldset><label>Judul</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="judul_ina" type="text" value="<?php echo"$r[nama_keg_ina]" ?>">
										</fieldset>
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_ina" id="jogmce"><?php echo"$r[isi_keg_ina]" ?></textarea>
										</fieldset>
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
										<fieldset><label>Tittle</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="judul_en" type="text" value="<?php echo"$r[nama_keg_en]" ?>">
										</fieldset>
										<fieldset><label>Description</label><br /><br />
											<textarea name="isi_en"><?php echo"$r[isi_keg_en]" ?></textarea>
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
						&nbsp;&nbsp;<img width="270px" src="../joimg/service_group/<?php echo"$r[gambar]" ?>">
						<br /><br /><label>Ganti Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
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
		</article><br /><br /><!-- end of post new article -->
		
		
		<div class="clear"></div><br/><br/>
		
		
		
		<?php	
		break;
		 } ?>
		
<?php } ?>