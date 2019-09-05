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
		$aksi="modul/mod_file_alumni/aksi_file_alumni.php";
		switch($_GET['act']){
			default:
		?>
		
		<article style="min-width:535px;" class="module width_3_quarter">
			<header><h3 class="tabs_involved">File Alumni</h3>
				
			</header>

			<table class='display' id='example'>
			<thead> 
				<tr>  
    				<th>No</th>
    				<th>Judul file</th>
    				<th>Nama alumni</th>		
    				<th width="30%">Nama file</th> 
					<th>Tanggal</th>
    				<th>Actions</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
			
				$slide = mysql_query("SELECT * FROM alumni_file ORDER BY nama DESC");
				while($s=mysql_fetch_array($slide)){
				$alumni = mysql_query("SELECT * FROM alumni_daftar where id_alumni='$s[id_alumni]'  ORDER BY nama DESC");
				$a=mysql_fetch_array($alumni);
				
				?>
				<tr>  
    				<th><?php echo"$no" ?></th>
    				<td><?php echo"$s[nama]" ?></td> 
    				<td><?php echo"$a[nama]" ?></td> 
    				<td><a href="joimg/<?php echo"$s[nama_file]" ?>"><?php echo"$s[nama_file]" ?></a></td> 
					<td><?php echo"$s[tgl]" ?></td>
    				<td style="text-align:center"><a href="<?php echo"?module=file_alumni&act=edit&id=$s[id_file]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo"$aksi?module=file_alumni&act=hapus&id=$s[id_file]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
			<div class="clear"></div>
			<div class="clear"></div>
		</article>
		
		<article style="min-width:260px;" class="module width_quarter">
			 <header><h3>Post New file_alumni</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='modul/mod_file_alumni/aksi_file_alumni.php?module=file_alumni&act=insertnew'>
				<div class="module_content">
						<fieldset>
							<label>Judul file</label>
							<input name="nama" type="text">
						</fieldset>
						<br />
						<fieldset><label>Alumni</label><br />
						<?php
						$tampil=mysql_query("SELECT * FROM alumni_daftar ORDER BY nama");
						$cek=mysql_num_rows($tampil);
						?>
						<select name='alumni'><option value=0 selected>- Pilih Alumni -</option>
							<?php
							while($r=mysql_fetch_array($tampil))
							{
							?>
								<option value="<?php echo"$r[id_alumni]"?>"><?php echo"$r[nama]"?></option>				
						<?php } ?>
						</select>
					</fieldset>
					<br />
					<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						<label>File alumni</label><br />
						<input style="margin-left:10px; margin-right:-20px;" type="file" name="fupload">
						<br /> 
					</fieldset>
						<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		
		
		<?php break; 
		case"edit":
			$slideshow = mysql_query("SELECT * FROM alumni_file WHERE id_file='$_GET[id]'");
				$g=mysql_fetch_array($slideshow);
			$alumni = mysql_query("SELECT * FROM alumni_daftar where id_alumni='$g[id_alumni]'  ORDER BY nama DESC");
				$a=mysql_fetch_array($alumni);
		?>
		
		<article class="module width_quarter">
			 <header><h3 class="tabs_involved">Edit file_alumni</h3>
				
				<input style="float:right; margin-top:5px;margin-right:10px;" type='button'  class='tombol' value='Back' onclick='self.history.back()'>
				
			</header>
			 <form method='POST' enctype='multipart/form-data' action='modul/mod_file_alumni/aksi_file_alumni.php?module=file_alumni&act=update'>
				<input type='hidden' name='id' value='<?php echo"$g[id_file]" ?>'>
				<div class="module_content">
						<fieldset>
							<label>Judul file</label>
							<input name="nama" type="text" value="<?php echo"$g[nama]" ?>">
						</fieldset>
						<br />
						<fieldset style="float:left; width:100%; margin-right: 3%;"><label>Nama alumni</label><br />
							<select name='alumni'>
								<?php
								$tampil=mysql_query("SELECT * FROM alumni_daftar ORDER BY nama");
								if ($g['id_alumni']==0){
								?>

									<option value=0 selected>- Pilih alumni -</option>
								 <?php }  
								  while($w=mysql_fetch_array($tampil)){
									if ($g['id_alumni']==$w['id_alumni']){ ?>  
									  <option value=<?php echo"$w[id_alumni]"?> selected><?php echo"$w[nama]"?></option>
									<?php }
									else{ ?>
									  <option value=<?php echo"$w[id_alumni]"?>><?php echo"$w[nama]"?></option>
								<?php	} } ?>
							</select>
						</fieldset>
						<br /><br /><br />
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Nama File</label><br /><br />
							
						</fieldset>
							
						<fieldset style="float:left; width:30%; margin-right: 3%;   margin-top: 21px; margin-left: -88px;"> <!-- to make two field float next to one another, adjust values accordingly -->
							&nbsp;&nbsp;<?php echo"$g[nama_file]" ?>
							<br /><br /><label>Ganti Files</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
							<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) max files 2mb.
						</fieldset>
						<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		<br />
		
		<?php
		
		break; 
		 } ?>
		
<?php } ?>