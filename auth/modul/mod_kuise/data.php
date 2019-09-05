<?php
include "../../../josys/koneksi.php";
function jwb($field,$table,$where,$where_fill){
    $sql = mysql_fetch_assoc(mysql_query("SELECT $field FROM $table WHERE $where = '".strip_tags($where_fill)."'"));

    return $sql[$field];
}

$data_options= array(
    '1' => 'Sangat rendah',
    '2' => 'Sangat Tinggi',
);
$data_quest_e= array(
	'1' => 'E1 Pada saat lulus, pada tingkat mana kompetensi di bawah ini Anda kuasai? (A) ', 
	'2' => 'E2 Pada saat ini, pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan?', 
);

$data_e1= array(
	'1' => 'Pengetahuan di bidang atau disiplin ilmu anda',
	'2' => 'Pengetahuan di luar bidang atau disiplin ilmu anda',
	'3' => 'Pengetahuan umum',
	'4' => 'Keterampilan menggunakan internet',
	'5' => 'Keterampilan mengoperasikan komputer',
	'6' => 'Berpikir kritis',
	'7' => 'Keterampilan melakukan riset',
	'8' => 'Kemampuan beradaptasi',
	'9' => 'Kemampuan belajar',
	'10' => 'Kemampuan berkomunikasi',
	'11' => 'Kemampuan bekerja di bawah tekanan',
	'12' => 'Keterampilan manajemen waktu',
	'13' => 'Keterampilan bekerja secara mandiri',
	'14' => 'Bekerja dalam tim/bekerjasama dengan orang lain',
	'15' => 'Kemampuan dalam memecahkan masalah',
	'16' => 'Keterampilan melakukan negosiasi',
	'17' => 'Kemampuan analisis',
	'18' => 'Sikap toleransi',
	'19' => 'Loyalitas dan integritas',
	'20' => 'Bekerja dengan orang yang berbeda budaya maupun latar belakang',
	'21' => 'Kepemimpinan',
	'22' => 'Kemampuan dalam memegang tanggungjawab',
	'23' => 'Kemampuan berinisiasi/Inisiatif',
	'24' => 'Kemampuan mengembangkan manajemen proyek/program',
	'25' => 'Kemampuan untuk mempresentasikan ide/produk/laporan',
	'26' => 'Kemampuan dalam menulis laporan, memo dan dokumen',
	'27' => 'Kemampuan untuk terus belajar sepanjang hayat',
);

$data_e2= array(
	'1' => 'Pengetahuan di bidang atau disiplin ilmu anda',
	'2' => 'Pengetahuan di luar bidang atau disiplin ilmu anda',
	'3' => 'Pengetahuan umum',
	'4' => 'Keterampilan menggunakan internet',
	'5' => 'Keterampilan mengoperasikan komputer',
	'6' => 'Berpikir kritis',
	'7' => 'Keterampilan melakukan riset',
	'8' => 'Kemampuan beradaptasi',
	'9' => 'Kemampuan belajar',
	'10' => 'Kemampuan berkomunikasi',
	'11' => 'Kemampuan bekerja di bawah tekanan',
	'12' => 'Keterampilan manajemen waktu',
	'13' => 'Keterampilan bekerja secara mandiri',
	'14' => 'Bekerja dalam tim/bekerjasama dengan orang lain',
	'15' => 'Kemampuan dalam memecahkan masalah',
	'16' => 'Keterampilan melakukan negosiasi',
	'17' => 'Kemampuan analisis',
	'18' => 'Sikap toleransi',
	'19' => 'Loyalitas dan integritas',
	'20' => 'Bekerja dengan orang yang berbeda budaya maupun latar belakang',
	'21' => 'Kepemimpinan',
	'22' => 'Kemampuan dalam memegang tanggungjawab',
	'23' => 'Kemampuan berinisiasi/Inisiatif',
	'24' => 'Kemampuan mengembangkan manajemen proyek/program',
	'25' => 'Kemampuan untuk mempresentasikan ide/produk/laporan',
	'26' => 'Kemampuan dalam menulis laporan, memo dan dokumen',
	'27' => 'Kemampuan untuk terus belajar sepanjang hayat',
	);

# MENGAMBIL DATA DARI DATABASE MYSQL
if (isset($_GET['prodi'])) {
    $kuise = mysql_query("
    					SELECT
    						alumni_daftar.nim,
							alumni_daftar.nama_alumni,
							alumni_daftar.tahun_lulus,
							prodi.prodi,
							tb_e.e1,
							tb_e.e2
                        FROM alumni_daftar
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            INNER JOIN `tb_e` 
                            	ON (`tb_e`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                        WHERE alumni_daftar.prodi = '$_GET[prodi]'
                        ORDER BY alumni_daftar.nim ASC");
}else{
    $kuise = mysql_query("
    					SELECT
    						alumni_daftar.nim,
							alumni_daftar.nama_alumni,
							alumni_daftar.tahun_lulus,
							prodi.prodi,
							tb_e.id_alumni
                        FROM alumni_daftar
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            INNER JOIN `tb_e` 
                                    ON (`tb_e`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                        ORDER BY alumni_daftar.nim ASC
            ");
}
$no=1;
?>
<table border="1">
	<!-- header -->
	<tr>
		<th rowspan="3">No.</th>
		<th rowspan="3">NIM</th>
		<th rowspan="3">Nama Alumni</th>
		<th rowspan="3">Prodi</th>
		<th rowspan="3">Tahun Lulus</th>
		<th colspan="2"><?php echo $data_quest_e['1'] ?></th>
		<th colspan="2"><?php echo $data_quest_e['2'] ?></th>
	</tr>
	<tr>
		<th rowspan="2">Pertanyaan</th>
		<th>jawaban</th>
		<th rowspan="2">Pertanyaan</th>
		<th>jawaban</th>
	</tr>
	<tr>
		<th>1 s.d 5</th>
		<th>1 s.d 5</th>
	</tr>
	<!-- end header -->

	<!-- body -->
	<?php
	while ($data= mysql_fetch_assoc($kuise)) {
		?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $data['nim'] ?></td>
				<td><?php echo $data['nama_alumni'] ?></td>
				<td><?php echo $data['prodi'] ?></td>
				<td><?php echo $data['tahun_lulus'] ?></td>
				<td>
				<?php
					foreach ($data_e1 as $key => $value) {
						echo $key.'. '."$value".'<br>';
					}
				?>
				</td>
				<td>
				<?php
					$quest_e1= explode('-', $data['e1']);
					foreach ($quest_e1 as $key => $value) {
						echo "$value".'<br>';
					}
				?>
				</td>
				<td>
				<?php
					foreach ($data_e2 as $key => $value) {
						echo $key.'. '."$value".'<br>';
					}
				?>
				</td>
				<td>
				<?php
					$quest_e2= explode('-', $data['e2']);
					foreach ($quest_e2 as $key => $value) {
						echo "$value".'<br>';
					}
				?>
				</td>
			</tr>
		<?php
		$no++;
	}
	?>
	<!-- end body -->
</table>