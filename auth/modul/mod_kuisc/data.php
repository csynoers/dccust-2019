<?php
	include "../../../josys/koneksi.php";
	function jwb($field,$table,$where,$where_fill){
	    $sql = mysql_fetch_assoc(mysql_query("SELECT $field FROM $table WHERE $where = '".strip_tags($where_fill)."'"));
	    return $sql[$field];
	}

$data_quest_c= array(
'1' => 'C1. Apakah Anda bekerja saat ini (termasuk kerja sambilan dan wirausaha)? ',
'2' => 'C2. Bagaimana  Anda menggambarkan kondisi Anda saat ini?',
'3' => 'C3. Apakah Anda aktif mencari pekerjaan dalam 4 minggu terakhir? <small><i>Pilih satu jawaban</i></small>',
'4' => 'C4. Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang? ',
'5' => 'C5. Jika Anda menjalankan usaha sendiri, apa status usaha Anda saat ini? <small><i>Jawaban bisa lebih dari satu</i></small>',
'6' => 'C6. Tempat Anda bekerja saat ini bergerak di bidang apa? ',
'7' => 'C7. Kira-kira berapa pendapatan Anda setiap bulannya?',
);

$data_c1= array(
'c11' => 'Ya',
'c12' => 'Tidak',
);

$data_c2= array(
'c21' => 'Saya melanjutkan kuliah profesi atau pascasarjana',
'c22' => 'Saya sedang mencari pekerjaan',
'c23' => 'Saya sibuk dengan keluarga dan anak-anak',
'c24' => 'Saya sedang mempersiapkan pernikahan',
// 'c25' => 'Lainnya',
);

$data_c3= array(
'c31' => 'Tidak',
'c32' => 'Tidak, tapi saya sedang menunggu hasil lamaran kerja',
'c33' => 'Ya, saya akan mulai bekerja dalam 2 minggu ke depan',
'c34' => 'Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan',
// 'c35' => 'Lainnya',
);

$data_c4= array(
'c41' => 'Instansi pemerintah (termasuk BUMN)',
'c42' => 'Organisasi non-profit/Lembaga Swadaya Masyarakat',
'c43' => 'Perusahaan swasta/instansi',
'c44' => 'Wiraswasta/perusahaan sendiri',
// 'c45' => 'Lainnya',
);

$data_c5= array(
'c51' => 'Milik sendiri',
'c52' => 'Alih kontrak',
'c53' => 'Membuka cabang baru perusahaan tempat bekerja dulu',
'c54' => 'Bekerja di rumah/usaha online/industri rumah',
'c55' => 'Joint venture',
'c56' => 'Menjalankan usaha orang lain',
// 'c57' => 'Lainnya',
);

$data_c6= array(
'1' => 'Pertanian, kehutanan, dan perikanan',
'2' => 'Pertambangan dan penggalian',
'3' => 'Industri pengolahan',
'4' => 'Pengadaan listrik, gas, uap/air panas dan udara dingin',
'5' => 'Pengadaan air, pengelolaan sampah dan daur ulang, pembuangan dan pembersihan limbah dan sampah',
'6' => 'Konstruksi',
'7' => 'Perdagangan besar dan eceran; reparasi dan perawatan mobil dan sepeda motor',
'8' => 'Transportasi dan pergudangan',
'9' => 'Penyediaan akomodasi dan penyediaan makan minum',
'10' => 'Informasi dan komunikasi',
'11' => 'Jasa keuangan dan asuransi',
'12' => 'Real estat',
'13' => 'Jasa profesional, ilmiah dan teknis',
'14' => 'Jasa persewaan dan sewa guna usaha tanpa hak opsi, ketenagakerjaan, agen perjalanan dan penunjang usahalainnya',
'15' => 'Administrasi pemerintahan, pertahanan dan jaminan sosial wajib',
'16' => 'Jasa pendidikan',
'17' => 'Jasa kesehatan dan kegiatan sosial',
'18' => 'Kesenian, hiburan dan kebudayaan',
'19' => 'Kegiatan jasa lainnya',
'20' => 'Jasa perorangan yang melayani rumah tangga; kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan',
'21' => 'Kegiatan badan internasional dan badan ekstra internasional lainnya',
);

$data_c6sub= array(
'1' => array(
  '1' => 'Pertanian tanaman, peternakan, perburuhan dan kegiatan terkait', 
  '2' => 'Kehutanan dan penebangan kayu', 
  '3' => 'Perikanan', 
),
'2' => array(
  '1' => 'Pertambangan batu bara dan lignit', 
  '2' => 'Pertambangan minyak bumi dan gas alam dan panas bumi', 
  '3' => 'Pertambangan bijih logam', 
  '4' => 'Pertambangan dan penggalian lainnya', 
  '5' => 'Jasa pertambangan', 
),
'3' => array(
  '1' => 'Industri makanan', 
  '2' => 'Industri minuman', 
  '3' => 'Industri pengolahan tembakau', 
  '4' => 'Industri tekstil', 
  '5' => 'Industri pakaian jadi', 
  '6' => 'Industri kulit, barang dari kulit dan alas kaki', 
  '7' => 'Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya', 
  '8' => 'Industri kertas dan barang dari kertas', 
  '9' => 'Industri pencetakan dan reproduksi media rekaman', 
  '10' => 'Industri produk dari batu bara dan pengilangan minyak bumi', 
  '11' => 'Industri bahan kimia dan barang dari bahan kimia', 
  '12' => 'Industri farmasi, produk obat kimia dan obat tradisional', 
  '13' => 'Industri karet, barang dari karet dan plastik', 
  '14' => 'Industri barang galian bukan logam', 
  '15' => 'Industri logam dasar', 
  '16' => 'Industri barang logam, bukan mesin dan peralatannya', 
  '17' => 'Industri komputer, barang elektronik dan optik', 
  '18' => 'Industri peralatan listrik', 
  '19' => 'Industri mesin dan perlengkapan ytdl', 
  '20' => 'Industri kendaraan bermotor, trailer dan semi trailer', 
  '21' => 'Industri alat angkutan lainnya', 
  '22' => 'Industri furnitur', 
  '23' => 'Industri pengolahan lainnya', 
  '24' => 'Jasa reparasi dan pemasangan mesin dan peralatan', 
),
'4' => array(
  '1' => 'Pengadaan listrik, gas, uap/air panas dan udara dingin', 
),
'5' => array(
  '1' => 'Pengadaan air', 
  '2' => 'Pengolahan limbah', 
  '3' => 'Pengolahan sampah dan daur ulang', 
  '4' => 'Jasa pembersihan dan pengelolaan sampah lainnya', 
),
'6' => array(
  '1' => 'Konstruksi gedung', 
  '2' => 'Konstruksi bangunan sipil', 
  '3' => 'Konstruksi khusus', 
),
'7' => array(
  '1' => 'Perdagangan, reparasi dan perawatan mobil dan sepeda motor', 
  '2' => 'Perdagangan besar, bukan mobil dan sepeda motor', 
  '3' => 'Perdagangan eceran, bukan mobil dan motor', 
),
'8' => array(
  '1' => 'Angkutan darat dan angkutan melalui saluran pipa', 
  '2' => 'Angkutan air', 
  '3' => 'Angkutan udara', 
  '4' => 'Pergudangan dan jasa penunjang angkutan', 
  '5' => 'Pos dan kurir', 
),
'9' => array(
  '1' => 'Penyediaan akomodasi', 
  '2' => 'Penyediaan makanan dan minuman',
),
'10' => array(
  '1' => 'Penerbitan', 
  '2' => 'Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan music', 
  '3' => 'Penyiaran dan pemrograman', 
  '4' => 'Telekomunikasi', 
  '5' => 'Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu', 
  '6' => 'Kegiatan jasa informasi', 
),
'11' => array(
  '1' => 'Jasa keuangan, bukan asuransi dan dana pension', 
  '2' => 'Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib', 
  '3' => 'Jasa penunjang jasa keuangan, asuransi dan dana pensiun', 
),
'12' => array(
  '1' => 'Real estat', 
),
'13' => array(
  '1' => 'Jasa hukum dan akuntansi', 
  '2' => 'Kegiatan kantor pusat dan konsultasi manajemen', 
  '3' => 'Jasa arsitektur dan teknik sipil; analisis dan uji teknis', 
  '4' => 'Penelitian dan pengembangan ilmu pengetahuan', 
  '5' => 'Periklanan dan penelitian pasar', 
  '6' => 'Jasa profesional, ilmiah dan teknis lainnya',
  '7' => 'Jasa kesehatan hewan', 
),
'14' => array(
  '1' => 'Jasa persewaan dan sewa guna usaha tanpa hak opsi', 
  '2' => 'Jasa ketenagakerjaan', 
  '3' => 'Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya', 
  '4' => 'Jasa keamanan dan penyelidikan', 
  '5' => 'Jasa untuk gedung dan pertamanan', 
  '6' => 'Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya', 
),
'15' => array(
  '1' => 'Administrasi pemerintahan, pertahanan dan jaminan sosial wajib', 
),
'16' => array(
  '1' => 'Jasa pendidikan', 
  '2' => 'Bimbingan belajar', 
  '3' => 'Penelitian bidang pendidikan', 
  '4' => 'Konsultan pendidikan', 
  '5' => 'Motivator/ToT', 
  '6' => 'Translator',
),
'17' => array(
  '1' => 'Jasa kesehatan manusia dan konsultan gizi', 
  '2' => 'Jasa kesehatan jiwa/psikolog', 
  '3' => 'Jasa kegiatan sosial di dalam panti', 
  '4' => 'Jasa kegiatan sosial di luar panti', 
),
'18' => array(
  '1' => 'Kegiatan hiburan, kesenian dan kreativitas', 
  '2' => 'Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya', 
  '3' => 'Sastrawan dan seniman', 
  '4' => 'Kurator', 
  '5' => 'Kegiatan olahraga dan rekreasi lainnya', 
),
'19' => array(
  '1' => 'Kegiatan keanggotaan organisasi', 
  '2' => 'Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga', 
  '3' => 'Jasa desain (desainer) dan industri fashion', 
  '4' => 'Chef', 
),
'20' => array(
  '1' => 'Jasa perorangan yang melayani rumah tangga', 
  '2' => 'Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan', 
),
'21' => array(
  '1' => 'Kegiatan badan internasional dan badan ekstra internasional lainnya', 
),
);

$data_c7= array(
'c71' => '0 s.d Rp 2.500.000', 
'c72' => 'Rp 2.500.000 s.d Rp 5.000.000', 
'c73' => 'Rp 5.000.000 s.d Rp 7.000.000', 
'c74' => '> Rp 7.000.000',
);

# MENGAMBIL DATA DARI DATABASE MYSQL
if (isset($_GET['prodi'])) {
    $kuisc = mysql_query("
    					SELECT
    						alumni_daftar.nim,
    						alumni_daftar.nama_alumni,
    						alumni_daftar.tahun_lulus,
    						prodi.prodi,
    						tb_c.id_alumni,
    						tb_c.c1,
    						tb_c.c2,
    						tb_c.c2,
    						tb_c.c3,
    						tb_c.c4,
    						tb_c.c5,
    						tb_c.c57,
    						tb_c.c6,
    						tb_c.c7
                        FROM alumni_daftar
                            INNER JOIN prodi
                                ON (alumni_daftar.prodi = prodi.id_prodi)
                            INNER JOIN tb_c
                                ON (tb_c.id_alumni = alumni_daftar.id_alumni)
                        WHERE alumni_daftar.prodi = '$_GET[prodi]'
                        ORDER BY alumni_daftar.nim ASC
                       	");
}else{
    $kuisc = mysql_query("
    					SELECT
    						alumni_daftar.nim,
    						alumni_daftar.nama_alumni,
    						alumni_daftar.tahun_lulus,
    						prodi.prodi,
    						tb_c.id_alumni,
    						tb_c.c1,
    						tb_c.c2,
    						tb_c.c2,
    						tb_c.c3,
    						tb_c.c4,
    						tb_c.c5,
    						tb_c.c57,
    						tb_c.c6,
    						tb_c.c7
                        FROM
                            alumni_daftar
                            INNER JOIN prodi
                                ON (alumni_daftar.prodi = prodi.id_prodi)
                            INNER JOIN tb_c
                                ON (tb_c.id_alumni = alumni_daftar.id_alumni)
                        ORDER BY alumni_daftar.nim ASC");
}
 ?>
<table border="1">
	<tr>
		<th rowspan="2">No</th>
		<th rowspan="2">Nim</th>
		<th rowspan="2">Nama Alumni</th>
		<th rowspan="2">Prodi</th>
		<th rowspan="2">Tahun Lulus</th>
		<th><?php echo $data_quest_c['1'] ?></th>
		<th><?php echo $data_quest_c['2'] ?></th>
		<th><?php echo $data_quest_c['3'] ?></th>
		<th><?php echo $data_quest_c['4'] ?></th>
		<th><?php echo $data_quest_c['5'] ?></th>
		<th><?php echo $data_quest_c['6'] ?></th>
		<th><?php echo $data_quest_c['7'] ?></th>
	</tr>
	<tr>
		<th>jawaban</th>
		<th>jawaban</th>
		<th>jawaban</th>
		<th>jawaban</th>
		<th>jawaban</th>
		<th>jawaban</th>
		<th>jawaban</th>
	</tr>

	<?php
		$no=1;
		while ($data= mysql_fetch_assoc($kuisc)) {
			?>
				<tr>
					<td><?php echo $no ?></td>
					<td><?php echo $data['nim'] ?></td>
					<td><?php echo $data['nama_alumni'] ?></td>
					<td><?php echo $data['prodi'] ?></td>
					<td><?php echo $data['tahun_lulus'] ?></td>
					<td><?php echo $data_c1[$data['c1']] ?></td>
					<td>
					<?php
						// $length= strlen($data['c2']);
						if (isset($data['c2'])) {
						 	if (isset($data_c2[$data['c2']])) {
						 		echo $data_c2[$data['c2']];

						 	}else{
							 	echo $data['c2'];

						 	}

						}else{
							echo "";

						}
					?>	
					</td>
					<td>
					<?php
						if (isset($data_c3[$data['c3']])) {
						 	echo $data_c3[$data['c3']];

					 	}else{
						 	echo $data['c3'];

					 	}
					?>	
					</td>
					<td>
					<?php
						if (isset($data_c4[$data['c4']])) {
						 	echo $data_c4[$data['c4']];

					 	}else{
						 	echo $data['c4'];

					 	}
					?>
					</td>
					<td>
					<?php
						$ans_d5= explode('-', $data['c5']);
						$no_d5=1;
						foreach ($ans_d5 as $key => $value) {
							echo $no_d5.'. '.$data_c5[$value].'<br>';
							$no_d5++;
						}
						echo isset($data['c57'])? $no_d5.'. '.$data_c5[$value] : '';
					?>	
					</td>
					<td>
					<?php
						$kategori= substr($data['c6'], -1);
						$sub 	 = substr($data['c6'], 2,1);
						echo "<strong>Kategori </strong>$data_c6[$kategori] :<br>";
						echo '- '.$data_c6sub[$kategori][$sub]; 
					?>
					</td>
					<td><?php echo $data_c7[$data['c7']] ?></td>
				</tr>
			<?php
			$no++;
		}
	?>
</table>