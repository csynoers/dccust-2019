<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{?>
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
		$aksi="modul/mod_spesialis/aksi_spesialis.php";
		switch($_GET['act']){
			default:
		?>
		<!-- comment -->
		<article class="module width_full">
			<header><h3>Fakultas</h3></header>
			<input type="button"  class="butt" value="Tambahkan Spesialis" onclick="location.href='?module=spes&act=tambah_spesialis'"><br /><br />
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th>
					<th>Fakultas</th>
					<th>Aksi</th>
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$spesialis = mysql_query("SELECT * FROM spesialis ORDER BY id_spes ASC");
				while($r=mysql_fetch_array($spesialis)){
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><?php echo"$r[nama_spes]" ?></td>
					<td align="center"><a href="<?php echo"$aksi?module=spes&act=hapus&id=$r[id_spes]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
		</article>
		<!-- end of comment -->
  <?php break; 
  case "tambah_spesialis":
    echo "<article class='module width_full'>
			<header><h3>TAMBAHKAN SPESIALIS KERJA</h3></header>
          <form method=POST action='$aksi?module=spes&act=input' enctype='multipart/form-data'>
	        <table>
	          <tr>
	          	<td>Nama spesialis kerja</td><td>  : <input type=text name='nama_spes' size=30 required></td>
	          </tr>
	          <tr>
	          	<td colspan=2>
				<input type=submit class=butt value=Simpan>
		        <input type=button class=butt value=Batal onclick=self.history.back()></td>
		      </tr>
	          </table>
	      </form>
	      </article>";
     break;
    

}
}
?>
