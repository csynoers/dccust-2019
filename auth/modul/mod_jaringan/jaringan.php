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
		$aksi="modul/mod_jaringan/aksi_jaringan.php";
		$module="jaringan";
		switch($_GET['act']){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">jaringan</h3>
				
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Insert New' onclick="location.href='?module=<?php echo $module;?>&act=insertnew'">
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Title</th> 
    				<th>Address</th> 
    				<th width="80px">Date</th> 
    				<th width="130px">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$jaringan = mysql_query("SELECT * FROM jaringan ORDER BY id_jaringan DESC");
				while($b=mysql_fetch_array($jaringan)){
				$tanggal = tgl_amerika($b['tanggal']);
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td><?php echo"$b[ornop_ina]" ?></td> 
    				<td><?php echo"$b[alamat_ina]" ?></td> 
    				<td width="90px"><?php echo $tanggal; ?></td> 
    				<td align="center"><a href="<?php echo"?module=$module&act=edit&id=$b[id_jaringan]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=$module&act=hapus&id=$b[id_jaringan]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
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
			<header><h3 style="color: Red;">Add jaringan</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=insertnew'>
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
										<fieldset><label>Ornop</label><br />
											<input style="width:96%; margin-bottom:8px;" name="ornop_ina" type="text" >
										</fieldset>
										<fieldset><label>Ornop Singkat</label><br />
											<input style="width:96%; margin-bottom:8px;" name="ornop_singkat_ina" type="text" >
										</fieldset>
										<fieldset><label>Alamat</label><br /><br />
											<textarea name="alamat_ina"></textarea>
										</fieldset>
										<br />
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_ina" id="jogmce"></textarea>
										</fieldset>
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
										<fieldset><label>Ornop</label><br />
											<input style="width:96%; margin-bottom:8px;" name="ornop_en" type="text" >
										</fieldset>
										<fieldset><label>Ornop Singkat</label><br />
											<input style="width:96%; margin-bottom:8px;" name="ornop_singkat_en" type="text" >
										</fieldset>
										<fieldset><label>Address</label><br /><br />
											<textarea name="alamat_en"></textarea>
										</fieldset>
										<br />
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
					<fieldset><label>Nama pemilik</label><br />
						<input style="width:96%; margin-bottom:8px;" name="nama" type="text" >
					</fieldset>
					<fieldset><label>Provinsi</label><br />
						<?php
						$tampil=mysql_query("SELECT * FROM provinsi ORDER BY nama");
						$cek=mysql_num_rows($tampil);
						?>
						<select name='provinsi'><option value=0 selected>- Pilih Provinsi -</option>
							<?php
							while($r=mysql_fetch_array($tampil))
							{
							?>
								<option value="<?php echo"$r[id]"?>"><?php echo"$r[nama]"?></option>				
						<?php } ?>
						</select>
					</fieldset>
					<br />
					<fieldset><label>Sektor kegiatan</label><br />
						<?php
						$tampil=mysql_query("SELECT * FROM sektor_kegiatan ORDER BY nama");
						$cek=mysql_num_rows($tampil);
						?>
						<select name='kegiatan'><option value=0 selected>- Pilih sektor kegiatan -</option>
							<?php
							while($r=mysql_fetch_array($tampil))
							{
							?>
								<option value="<?php echo"$r[id]"?>"><?php echo"$r[nama]"?></option>				
						<?php } ?>
						</select>
					</fieldset>
					<br />
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
			$jaringan = mysql_query("SELECT * FROM jaringan WHERE id_jaringan='$_GET[id]'");
			$r=mysql_fetch_array($jaringan);
		?>
		
		<article class="module width_full">
			<header><h3>Edit jaringan</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=update'>
			<div class="col-lg-12">
				<input type='hidden' name='id' value='<?php echo"$r[id_jaringan]" ?>'>
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
										<fieldset><label>Ornop</label><br />
											<input style="width:96%; margin-bottom:8px;" name="ornop_ina" type="text" value="<?php echo"$r[ornop_ina]"?>" >
										</fieldset>
										<fieldset><label>Ornop Singkat</label><br />
											<input style="width:96%; margin-bottom:8px;" name="ornop_singkat_ina" type="text" value="<?php echo"$r[ornop_singkat_ina]"?>">
										</fieldset>
										<fieldset><label>Alamat</label><br /><br />
											<textarea name="alamat_ina"><?php echo"$r[alamat_ina]"?></textarea>
										</fieldset>
										<br />
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_ina" id="jogmce"><?php echo"$r[isi_ina]"?></textarea>
										</fieldset>
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
											<fieldset><label>Ornop</label><br />
											<input style="width:96%; margin-bottom:8px;" name="ornop_en" type="text" value="<?php echo"$r[ornop_en]"?>" >
										</fieldset>
										<fieldset><label>Ornop Singkat</label><br />
											<input style="width:96%; margin-bottom:8px;" name="ornop_singkat_en" type="text" value="<?php echo"$r[ornop_singkat_en]"?>" >
										</fieldset>
										<fieldset><label>Address</label><br /><br />
											<textarea name="alamat_en"><?php echo"$r[alamat_en]"?></textarea>
										</fieldset>
										<br />
										<fieldset><label>Description</label><br /><br />
											<textarea name="isi_en"><?php echo"$r[isi_en]"?></textarea>
										</fieldset>
									</div>	
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					</div>
					<fieldset style="float:left; width:30%; margin-right: 3%;"><label>Nama pemilik</label><br />
						<input style="width:96%; margin-bottom:8px;" name="nama" type="text" value="<?php echo"$r[nama]"?>" >
					</fieldset>
					<fieldset style="float:left; width:30%; margin-right: 3%;"><label>Provinsi</label><br />
				    <select name='provinsi'>
						<?php
						$tampil=mysql_query("SELECT * FROM provinsi ORDER BY nama");
						if ($r['provinsi']==0){
						?>
						
							<option value=0 selected>- Pilih Provinsi -</option>
						 <?php }  
						  while($w=mysql_fetch_array($tampil)){
							if ($r['provinsi']==$w['id']){ ?>  
							  <option value=<?php echo"$w[id]"?> selected><?php echo"$w[nama]"?></option>
							<?php }
							else{ ?>
							  <option value=<?php echo"$w[id]"?>><?php echo"$w[nama]"?></option>
						<?php	} } ?>
					</select>
					</fieldset>
					<br />
					<fieldset style="float:left; width:30%; margin-right: 3%;"><label>Sektor kegiatan</label><br />
						<select name='kegiatan'>
						<?php
						$tampill=mysql_query("SELECT * FROM sektor_kegiatan ORDER BY nama");
						if ($r['kegiatan']==0){
						?>
						
							<option value=0 selected>- Pilih Sektor kegiatan -</option>
						 <?php }  
						  while($ws=mysql_fetch_array($tampill)){
							if ($r['kegiatan']==$ws['id']){ ?>  
							  <option value=<?php echo"$ws[id]"?> selected><?php echo"$ws[nama]"?></option>
							<?php }
							else{ ?>
							  <option value=<?php echo"$ws[id]"?>><?php echo"$ws[nama]"?></option>
						<?php	} } ?>
					</select>
					</fieldset>
					<br />
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