<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{ ?>
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
$aksi="modul/mod_jasa/aksi_jasa.php";
switch($_GET[act]){
  // Tampil jasa
  default:
    echo "<article class='module width_full'>
		<h2>EDIT JASA PENGIRIMAN</h2>
          <input type=button  class=butt value='Tambahkan Jasa Pengiriman' onclick=location.href='?module=jasa&act=tambah_slide'><br /><br />
          <table id='example' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'>
		  <tr>
			  <th>No</th>
			  <th>Jasa Pengiriman</th>
			  <th>Aksi</th></tr>
			  </thead>
		  <tbody>";
    $tampil=mysql_query("SELECT * FROM jasa ORDER BY id_jasa ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
		
		
		  echo "<tr><td>$no</td>
		  <td>$r[jasa_pengiriman]</td>
		  <td>
			<a href=?module=jasa&act=edit_jasa&id=$r[id_jasa]>Edit</a> | ";?>
			<a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=jasa&act=hapus&id=$r[id_jasa]>Hapus</a>
					</tr>";
    $no++;
    }
    echo "</tbody></table></article>";
    break;
  
  case "tambah_slide":
    echo "<article class='module width_full'>
		<h2>TAMBAHKAN JASA PENGIRIMAN</h2>
          <form method=POST action='$aksi?module=jasa&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Jasa Pengiriman</td><td>  : <input type=text name='jasa_pengiriman' size=30 required></td></tr>
          
		  <td colspan=2>
		  <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form></article><br /><br />";
     break;
    
  case "edit_jasa":
    $edit = mysql_query("SELECT * FROM jasa WHERE id_jasa='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<article class='module width_full'>
		<h2>EDIT JASA PENGIRIMAN</h2>
			
          <form method=POST enctype='multipart/form-data' action=$aksi?module=jasa&act=update>
          <input type=hidden name=id value=$r[id_jasa]>
		  
          <table>
		   <tr><td>Jasa Pengiriman</td><td>     : <input type=text name='jasa_pengiriman' size=30 value='$r[jasa_pengiriman]' required></td></tr>
		   <tr><td colspan=2>
				<input type=submit class=butt value=Update>
                <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form></article>";
    break;  
}
}
?>
