<?php
	require_once "../../../josys/koneksi.php";
	require_once "../../../josys/dbHelper.php";
	$db = new dbHelper($db_config); 

	# MENGAMBIL DATA DARI DATABASE MYSQL
	if (isset($_GET['prodi'])) {
		$biodata = $db->get_select("SELECT * FROM biodata INNER JOIN prodi ON (biodata.prodi = prodi.id_prodi) WHERE biodata.th_lulus='{$_GET['tahun']}' AND biodata.prodi = '$_GET[prodi]' ORDER BY biodata.nim ASC");
	}else{
		$biodata = $db->get_select("SELECT * FROM biodata INNER JOIN prodi ON (biodata.prodi = prodi.id_prodi) WHERE biodata.th_lulus='{$_GET['tahun']}' ORDER BY biodata.nim ASC");
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
		foreach ($biodata['data'] as $key => $value) {
			?>
				<tr>
					<td>
						<?php echo $no ?>
					</td>
					<td>
						<?php echo $value->nim ?>
					</td>
					<td>
						<?php echo $value->nama ?>
					</td>
					<td>
						<?php echo $value->prodi ?>
					</td>
					<td>
						<?php echo $value->th_lulus ?>
					</td>
					<td>
						<?php echo $value->no_hp ?>
					</td>
					<td>
						<?php echo $value->email ?>
					</td>
					<td>
						<?php echo $value->almt_domisili ?>
					</td>
					<td>
						<?php echo $value->almt_ktp ?>
					</td>
					
				</tr>
			<?php
			$no++;
		}
	?>
</table>