<?php
include "../../../josys/koneksi.php"; 
# MENGAMBIL DATA DARI DATABASE MYSQL
if (isset($_GET['prodi'])) {
      $kuisa = mysql_query("SELECT *
                                    FROM
                                        `alumni_daftar`
                                        INNER JOIN `prodi` 
                                            ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                                        INNER JOIN `tb_a` 
                                            ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                              WHERE alumni_daftar.prodi = '$_GET[prodi]' ORDER BY alumni_daftar.nim ASC");
}else{
      $kuisa = mysql_query("SELECT *
                                    FROM
                                        `alumni_daftar`
                                        INNER JOIN `prodi` 
                                            ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                                        INNER JOIN `tb_a` 
                                            ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                    ORDER BY alumni_daftar.nim ASC");
}
?>
<table border="1">
	<tr>
		<th rowspan="2">No</th>
		<th rowspan="2">NIM</th>
		<th rowspan="2">Nama Alumni</th>
		<th rowspan="2">Prodi</th>
		<th rowspan="2">Tahun Lulus</th>
		<th colspan="2">A1. Menurut Anda seberapa besar penggunaan metode pembelajaran di bawah ini pada program studi anda?</th>
		<th colspan="2">A2. Bagaimana penilaian Anda mengenai suasana akademik di bawah ini?</th>
		<th colspan="2">A3. Bagaimana penilaian Anda terhadap kondisi fasilitas belajar di bawah ini? </th>
	</tr>
	<tr>
		<th>Pertanyaan</th>
		<th>Jawaban 1 s.d 5</th>
		<th>Pertanyaan</th>
		<th>Jawaban 1 s.d 5</th>
		<th>Pertanyaan</th>
		<th>Jawaban 1 s.d 5</th>
	</tr>
	<?php
	$no=1;
	while ($key=mysql_fetch_object($kuisa)) {
		?>
			<tr>
				<td>
					<?php echo $no ?>
				</td>
				<td>
					<?php echo $key->nim ?>
				</td>
				<td>
					<?php echo $key->nama_alumni ?>
				</td>
				<td>
					<?php echo $key->prodi ?>
				</td>
				<td>
					<?php echo $key->tahun_lulus ?>
				</td>
				<td>
					<?php
						$data_a1= array(
						'1' => 'Perkuliahan',
						'2' => 'Demonstrasi (Peragaan)',
						'3' => 'Partisipasi dalam proyek riset', 
						'4' => 'Magang', 
						'5' => 'Praktikum kerja lapangan',
						'6' => 'Diskusi',
						'7' => 'Penugasan berbasis proyek'
						);
						echo '1. '.$data_a1[1].'<br>';
						echo '2. '.$data_a1[2].'<br>';
						echo '3. '.$data_a1[3].'<br>';
						echo '4. '.$data_a1[4].'<br>';
						echo '5. '.$data_a1[5].'<br>';
						echo '6. '.$data_a1[6].'<br>';
						echo '7. '.$data_a1[7].'<br>';
					?>
				</td>
				<td>
					<?php
						echo $key->a1_1.'<br>';
						echo $key->a1_2.'<br>';
						echo $key->a1_3.'<br>';
						echo $key->a1_4.'<br>';
						echo $key->a1_5.'<br>';
						echo $key->a1_6.'<br>';
						echo $key->a1_7.'<br>';
					?>
				</td>
				<td>
					<?php
						$data_a2= array(
						'1' => 'Kesempatan untuk berinteraksi dengan dosen-dosen di luar jadwal kuliah',
						'2' => 'Pembimbingan akademik',
						'3' => 'Kesempatan berpartisipasi dalam penelitian dan pengabdian masyarakat', 
						'4' => 'Keikutsertaan dalam lembaga kemahasiswaan dan unit kegiatan mahasiswa (UKM)', 
						'5' => 'Kesempatan untuk memasuki dan menjadi bagian dari jejaring ilmiah profesional',
						// '6' => 'Lainya'
						);

						echo '1. '.$data_a2[1].'<br>';
						echo '2. '.$data_a2[2].'<br>';
						echo '3. '.$data_a2[3].'<br>';
						echo '4. '.$data_a2[4].'<br>';
						echo '5. '.$data_a2[5].'<br>';
						echo $key->a2_6_isi!=''? '6. '.$key->a2_6_isi.'<br>' : '' ;
					?>
				</td>
				<td>
					<?php
						echo $key->a2_1.'<br>';
						echo $key->a2_2.'<br>';
						echo $key->a2_3.'<br>';
						echo $key->a2_4.'<br>';
						echo $key->a2_5.'<br>';
						echo $key->a2_6!=''? $key->a2_6.'<br>' : '' ;
					?>
				</td>
				<td>
					<?php
						$data_a3= array(
						'1' => 'Perpustakaan',
						'2' => 'Teknologi Informasi dan Komunikasi',
						'3' => 'Modul belajar', 
						'4' => 'Ruang belajar', 
						'5' => 'Laboratorium',
						'6' => 'Fasilitas ibadah',
						'7' => 'Asrama mahasiswa',
						'8' => 'Kantin',
						'9' => 'Pusat kegiatan mahasiswa dan fasilitasnya, ruang rekreasi',
						'10' => 'Fasilitas layanan kesehatan',
						'11' => 'Fasilitas olahraga dan seni',
						'12' => 'Lainya',
						);

						echo '1. '.$data_a3[1].'<br>';
						echo '2. '.$data_a3[2].'<br>';
						echo '3. '.$data_a3[3].'<br>';
						echo '4. '.$data_a3[4].'<br>';
						echo '5. '.$data_a3[5].'<br>';
						echo '6. '.$data_a3[6].'<br>';
						echo '7. '.$data_a3[7].'<br>';
						echo '8. '.$data_a3[8].'<br>';
						echo '9. '.$data_a3[9].'<br>';
						echo '10. '.$data_a3[10].'<br>';
						echo '11. '.$data_a3[11].'<br>';
						echo $key->a3_12_isi!=''? '12. '.$key->a3_12_isi.'<br>' : '' ;
					?>
				</td>
				<td>
					<?php
						echo $key->a3_1.'<br>';
						echo $key->a3_2.'<br>';
						echo $key->a3_3.'<br>';
						echo $key->a3_4.'<br>';
						echo $key->a3_5.'<br>';
						echo $key->a3_6.'<br>';
						echo $key->a3_7.'<br>';
						echo $key->a3_8.'<br>';
						echo $key->a3_9.'<br>';
						echo $key->a3_10.'<br>';
						echo $key->a3_11.'<br>';
						echo $key->a3_12!=''? $key->a3_12.'<br>' : '' ;
					?>
				</td>
			</tr>
		<?php
		$no++;
	}
	?>
</table>