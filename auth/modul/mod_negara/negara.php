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
		$aksi="modul/mod_negara/aksi_negara.php";
		switch($_GET['act']){
			default:
		?>
		<!-- comment -->
		<article class="module width_full">
			<header><h3>Negara</h3></header>
			<input type="button"  class="butt" value="Tambahkan Negara" onclick="location.href='?module=negara&act=tambah_negara'"><br /><br />
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th>
					<th>Negara</th>
					<th>Aksi</th>
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$negara = mysql_query("SELECT * FROM negara ORDER BY id_negara ASC");
				while($r=mysql_fetch_array($negara)){
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><?php echo"$r[negara]" ?></td>
					<td align="center"><a href="<?php echo"$aksi?module=negara&act=hapus&id=$r[id_negara]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
		</article>
		<!-- end of comment -->
  <?php break; 
  case "tambah_negara":
    echo "<article class='module width_full'>
			<h2>TAMBAHKAN NEGARA</h2>
          <form method=POST action='$aksi?module=negara&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Nama negara</td><td>  : <input type=text name='judul' size=30 required></td></tr>
		  
          <tr><td colspan=2>
		  <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form></article><br /><br />";
     break;
    

}
}
?>
