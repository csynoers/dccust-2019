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
		$aksi="modul/mod_download/aksi_download.php";
		switch($_GET['act']){
			default:
		?>
		<!-- comment -->
		<article class="module width_full">
			<header><h3>Upload Files</h3></header>
			<input type="button"  class="butt" value="Tambahkan File" onclick="location.href='?module=download&act=tambah_file'"><br /><br />
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th>
					<th>Judul</th>
					<th>Nama File</th>
					<th>Aksi</th>
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$member = mysql_query("SELECT * FROM download ORDER BY id_download DESC");
				while($r=mysql_fetch_array($member)){
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><?php echo"$r[judul]" ?></td> 
    				<td align="center"><?php echo"$r[nama_file]" ?></td> 
					<td align="center"><a href="<?php echo"$aksi?module=download&act=hapus&id=$r[id_download]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
		</article>
		<!-- end of comment -->
  <?php break; 
  case "tambah_file":
    echo "<article class='module width_full'>
			<h2>TAMBAHKAN FILE DOWNLOAD</h2>
          <form method=POST action='$aksi?module=download&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Judul File</td><td>  : <input type=text name='judul' size=30 required></td></tr>
		  <tr><td>File</td><td> : <input type=file name='fupload' size=30 required> </td></tr>
          <tr><td colspan=2>
		  <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form></article><br /><br />";
     break;
    

}
}
?>
