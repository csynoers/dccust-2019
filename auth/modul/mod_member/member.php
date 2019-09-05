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
		$aksi="modul/mod_member/aksi_member.php";
		switch($_GET['act']){
			default:
		?>
		<!-- comment -->
		<article class="module width_full">
			<header><h3>Daftar Member</h3></header>
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Nama</th> 
    				<th>Phone</th> 
    				<th>Email</th> 
    				<th>Blokir</th> 
    				<th>Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$member = mysql_query("SELECT * FROM memberarea ORDER BY id_member DESC");
				while($r=mysql_fetch_array($member)){
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><?php echo"$r[nama]" ?></td> 
    				<td align="center"><?php echo"$r[no_telp]" ?></td> 
    				<td align="center"><?php echo"$r[email]" ?></td> 
    				<td align="center"><?php echo"$r[blokir]"; ?></td> 
					<td align="center"><a href="<?php echo"?module=member&act=edit&id=$r[id_member]";?>"><input type="image" src="images/icn_edit.png" title="Detail"></a> &nbsp;<a href="<?php echo"$aksi?module=member&act=hapus&id=$r[id_member]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
		</article>
		<!-- end of comment -->
		
		
		<?php break; 
		case"edit":
			$room = mysql_query("SELECT * FROM memberarea WHERE id_member='$_GET[id]'");
			$r=mysql_fetch_array($room);
			
		?>
		<article style="min-width:500px; float:none;" class="module width_quarter">
			 <header><h3>Detail Member</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='modul/mod_member/aksi_member.php?module=member&act=update2'>
				<input type="hidden" name="id" value='<?php echo"$r[id_member]"; ?>'>
				<div class="module_content">
						
						<table>
							<tr><td><label>Nama</label></td><td>:</td><td><?php echo"$r[nama]" ?></td></tr>
							<tr><td><label>Email</label></td><td>:</td><td><?php echo"$r[email]" ?></td></tr>
							<tr><td><label>Phone</label></td><td>:</td><td><?php echo"$r[no_telp]" ?></td></tr>
							<tr><td><label>Alamat</label></td><td>:</td><td><?php echo"$r[alamat]" ?></td></tr>
							<tr><td><label>Blokir</label></td><td>:</td>
								<td>
								<?php 
									if($r['blokir'] == 'N'){
								?>
									<input type="radio" name="blokir" class="radio" value="Y" > Yes 
									<input type="radio" name="blokir" class="radio" value="N" checked > No
								<?php } else {?>
									<input type="radio" name="blokir" class="radio" value="Y"  checked> Yes 
									<input type="radio" name="blokir" class="radio" value="N" > No
								<?php } ?>
								</td>
							</tr>
						</table>
						
						
						<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type='button'  class='tombol' value='Ubah Password' onclick="location.href='?module=member&act=password&id=<?php echo"$r[id_member]"; ?>'">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article --><br /><br /><!-- end of post new article -->
		
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		
		<?php 
		
		
		break; 
		  case "password": 
		  
		?>
			
		<article class="module width_full">
			<header><h3>Ubah Password</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=member&act=password'>
				<input type="hidden" name="id" value='<?php echo"$_GET[id]"; ?>'>
				<div class="module_content">
						<fieldset><label>Password</label><br /><br />
							<input style="width:96%; margin-bottom:8px;" name="password" type="text" required>
						</fieldset>
						<fieldset><label>Retype Password</label><br /><br />
							<input style="width:96%; margin-bottom:8px;" name="password_lama" type="text" required>
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
			
		<?php 
			break;
		 } ?>
		
<?php } ?>