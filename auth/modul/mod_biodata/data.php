<?php
include "../../../josys/koneksi.php"; 
# MENGAMBIL DATA DARI DATABASE MYSQL
if (isset($_GET['prodi'])) {
      $biodata = mysql_query("
							SELECT
									biodata.id_alumni,
									biodata.nim,
									biodata.nama,
									biodata.th_lulus,
									biodata.no_hp,
									biodata.email,
									biodata.almt_domisili,
									biodata.almt_ktp,
									prodi.prodi
							FROM biodata
							    INNER JOIN prodi 
							        ON (biodata.prodi = prodi.id_prodi)
							WHERE biodata.prodi = '$_GET[prodi]'
							ORDER BY biodata.nim ASC
							");
}else{
      $biodata = mysql_query("
							SELECT
								biodata.id_alumni,
								biodata.nim,
								biodata.nama,
								biodata.th_lulus,
								biodata.no_hp,
								biodata.email,
								biodata.almt_domisili,
								biodata.almt_ktp,
								prodi.prodi

							FROM biodata
							    INNER JOIN prodi 
							        ON (biodata.prodi = prodi.id_prodi)
							ORDER BY biodata.nim ASC
							");
}
?>
<table border="1">
	<tr>
		<th>No</th>
		<th>NIM</th>
		<th>Nama Alumni</th>
		<th>Prodi</th>
		<th>Tahun Lulus</th>
		<th>No HP</th>
		<th>Email</th>
		<th>Alamat Domisli</th>
		<th>Alamat KTP</th>
	</tr>
	<?php
	$no=1;
	while ($key=mysql_fetch_object($biodata)) {
		?>
			<tr>
				<td>
					<?php echo $no ?>
				</td>
				<td>
					<?php echo $key->nim ?>
				</td>
				<td>
					<?php echo $key->nama ?>
				</td>
				<td>
					<?php echo $key->prodi ?>
				</td>
				<td>
					<?php echo $key->th_lulus ?>
				</td>
				<td>
					<?php echo $key->no_hp ?>
				</td>
				<td>
					<?php echo $key->email ?>
				</td>
				<td>
					<?php echo $key->almt_domisili ?>
				</td>
				<td>
					<?php echo $key->almt_ktp ?>
				</td>
				
			</tr>
		<?php
		$no++;
	}
	?>
</table>