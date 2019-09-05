 <?php
include '../josys/koneksi.php';
    $id             = $_POST['negara'];
    $sql = mysql_query("SELECT * FROM kota WHERE id_negara='$id'");
	  echo "<option>--Pilih Kota--</option>";
      while($d=mysql_fetch_array($sql)){
         echo "<option value=$d[id_kota]>$d[nama_kota]</option> \n";
      }
?>