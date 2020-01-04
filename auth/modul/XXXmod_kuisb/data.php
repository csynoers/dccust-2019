<?php
include '../../../josys/koneksi.php';
function jwb($field,$table,$where,$where_fill){
	$sql = mysql_fetch_object(mysql_query("SELECT $field FROM $table WHERE $where = '".strip_tags($where_fill)."'"));
    return $sql->$field;
}

  $data_options= array(
    '1' => 'Tidak sama sekali',
    '2' => 'Sangat Besar',
  );

  $data_quest_b=array(
    '1' => 'B1. Kapan Anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak dimasukkan.' ,
    '2' => 'B2. Apa alasan utama Anda tidak mencari pekerjaan setelah lulus kuliah?', 
    '3' => 'B3. Bagaimana cara Anda mencari pekerjaan tersebut? <small><i>Jawaban bisa lebih dari satu</i></small>', 
    '4' => 'B4. Berapa bulan waktu yang dihabiskan untuk memperoleh pekerjaan pertama?', 
    '5' => 'B5. Berapa perusahaan/instansi/institusi yang sudah Anda lamar (melalui surat atau e-mail) sebelum Anda memperoleh pekerjaan pertama?', 
    '6' => 'B6. Berapa banyak perusahaan/instansi/institusi yang merespons lamaran Anda?', 
    '7' => 'B7. Berapa banyak perusahaan/instansi/institusi yang mengundang Anda wawancara?', 
    '8' => 'B8. Bagaimana cara Anda mendapatkan pekerjaan pertama? <small><i>Hanya satu jawaban</i></small>', 
    '9' => 'B9. Berdasarkan persepsi Anda, seberapa pentingkah aspek aspek di bawah ini bagi perusahaan/instansi dalam melakukan penerimaan pegawai baru?', 
  );

  $data_b1= array(
    'b11' => 'Bulan sebelum lulus',
    'b12' => 'Bulan setelah lulus',
    'b13' => 'Saya tidak mencari kerja',
  );

  $data_b2= array(
    'b21' => 'Saya memiliki usaha',
    'b22' => 'Saya sudah memperolah pekerjaan sebelum lulus',
    'b23' => 'Saya melanjutkan kuliah',
    'b24' => 'Saya melanjutkan usaha keluarga',
    // 'b25' => 'Lainnya',
  );

  $data_b23= array(
    '1' => 'Jurusan Tempat Studi Lanjut:',
    '2' => 'Universitas Tempat Studi Lanjut:',
    '3' => 'Sumber biaya untuk studi lanjut?',
    '4' => 'Alasan studi lanjut di jurusan dan universitas tersebut?',
  );

  $data_b23_sub= array(
    '1' => array(
      '' => '',
    ),
    '2' => array(
      '' => '',
    ),
    '3' => array(
      'b231' => 'Pribadi',
      'b232' => 'Orang tua/keluarga',
      // '3' => 'c. Beasiswa, sebutkan beasiswa apa:',
    ),
    '4' => array(
      'b231' => 'Sama dengan universitas pada jenjang pendidikan sebelumnya',
      'b232' => 'Biaya studi lanjut yang murah, baik biaya kuliah maupun biaya hidup',
      'b233' => 'Memiliki relasi yang terkait pada tempat studi lanjut ',
      'b234' => 'Tempat studi lanjut memiliki kerja sama dengan pemberi beasiswa',
      'b235' => 'Aspek kualitas pendidikan yang diberikan bagus',
      'b236' => 'Jaminan peluang kerja & pengembangan diri yang disediakan',
      // 'b237' => 'g. Lainnya, tuliskan ',
    ),
  );

  $data_b3= array(
    'b31' => 'Melalui iklan di koran/majalah,brosur',
    'b32' => 'Melamar ke perusahaan tanpa mengetahui lowongan yang ada',
    'b33' => 'Pergi ke bursa/pameran kerja',
    'b34' => 'Mencari lewat internet/iklan online/milis',
    'b35' => 'Dihubungi oleh perusahaan',
    'b36' => 'menghubungi Kemnakertrans',
    'b37' => 'Menghubungi agen tenaga kerja komerisal/swasta',
    'b38' => 'Mendapatkan informasi dari pusat/kantor pengembangan karir fakultas/universitas',
    'b39' => 'Menghubungi kantor kemahasiswaan/hubungi alumni',
    'b310' => 'Membangun network sejak masih kuliah',
    'b311' => 'Melalui relasi (mislanya dosen,orang tua, saudara, teman, dll.)',
    'b312' => 'Membangun bisnis sendiri',
    'b313' => 'Melalui penempatan kerja atau magang',
    'b314' => 'Bekerja di tempat yang sama dengan tempat kerja semasa kuliah',
    // 'b315' => 'Lainnya'
  );

  $data_b4= array(
    'b41' => '0 s.d 3 bulan', 
    'b42' => '4 s.d 6 bulan',
    'b43' => '> 6 bulan',
  );

  $data_b5= array(
    '1' => 'Jumlah perusahaan/instansi/institusi',
  );

  $data_b6= array(
    '1' => 'Jumlah perusahaan/instansi/institusi',
  );

  $data_b7= array(
    '1' => 'Jumlah perusahaan/instansi/institusi',
  );

  $data_b8= array(
    'b81' => 'Melalui iklan di koran/majalah, brosur',
    'b82' => 'Melamar ke perusahaan tanpa mengetahui lowongan yang ada',
    'b83' => 'Pergi ke bursa/pameran kerja',
    'b84' => 'Mencari lewat internet/iklan online/milis',
    'b85' => 'Dihubungi oleh perusahaan',
    'b86' => 'Menghubungi Kemnakertrans',
    'b87' => 'Menghubungi agen tenaga kerja komersial/swasta',
    'b88' => 'Memperoleh informasi dari pusat/kantor pengembangan karir fakultas/universitas',
    'b89' => 'Menghubungi kantor kemahasiswaan/hubungi alumni',
    'b810' => 'Membangun network sejak masih kuliah',
    'b811' => 'Melalui Relasi (misalnya dosen, orang tua, saudara, teman, dll.)',
    'b812' => 'Membangun bisnis sendiri',
    'b813' => 'Melalui penempatan kerja atau magang',
    'b814' => 'Bekerja di tempat yang sama dengan tempat kerja semasa kuliah',
    // 'b815' => 'Lainnya',
  );

  $data_b9= array(
    '1' => 'Program studi',
    '2' => 'Spesialisasi',
    '3' => 'IPK',
    '4' => 'Pengalaman kerja selaman kuliah',
    '5' => 'Reputasi dari perguruan tinggi',
    '6' => 'Pengalaman ke luar negeri (untuk bekerja atau magang)',
    '7' => 'Kemampuan bahasa inggris',
    '8' => 'Kemampuan bahasa asing lainnya',
    '9' => 'Pengoperasian computer',
    '10' => 'Pengalaman berorganisasi',
    '11' => 'Rekomendasi dari pihak ketiga',
    '12' => 'Kepribadian dan ketrampilan antar personal',
    // '13' => 'Lainnya',
  );
# MENGAMBIL DATA DARI DATABASE MYSQL
if (isset($_GET['prodi'])) {
    $kuisb = mysql_query("
                        SELECT
                            alumni_daftar.nim,
                            alumni_daftar.nama_alumni,
                            alumni_daftar.tahun_lulus,
                            prodi.prodi,
                            tb_b.id_alumni,
                            tb_b.b1,
                            tb_b.b2,
                            tb_b.b3,
                            tb_b.b4,
                            tb_b.b5,
                            tb_b.b6,
                            tb_b.b7,
                            tb_b.b8,
                            tb_b.b9
                        FROM
                            alumni_daftar
                            INNER JOIN prodi 
                                ON (alumni_daftar.prodi = prodi.id_prodi)
                            INNER JOIN tb_b 
                                ON (tb_b.id_alumni = alumni_daftar.id_alumni)
                        WHERE alumni_daftar.prodi = '$_GET[prodi]'
                        ORDER BY alumni_daftar.nim ASC
                        ");
}else{
    $kuisb = mysql_query("SELECT *
                            FROM
                                alumni_daftar
                                INNER JOIN prodi 
                                    ON (alumni_daftar.prodi = prodi.id_prodi)
                                INNER JOIN tb_b 
                                    ON (tb_b.id_alumni = alumni_daftar.id_alumni)
                        ORDER BY alumni_daftar.nim ASC");
}
?>
<table border="1">
    <!-- row 1 -->
	<tr>
        <th rowspan="2">No</th>   
        <th rowspan="2">Nim</th>   
        <th rowspan="2">Nama Alumni</th>   
        <th rowspan="2">Prodi</th>   
        <th rowspan="2">Tahun Lulus</th>
        <th><?php echo $data_quest_b['1'] ?></th>   
        <th><?php echo $data_quest_b['2'] ?></th>   
        <th><?php echo $data_quest_b['3'] ?></th>   
        <th><?php echo $data_quest_b['4'] ?></th>   
        <th><?php echo $data_quest_b['5'] ?></th>   
        <th><?php echo $data_quest_b['6'] ?></th>   
        <th><?php echo $data_quest_b['7'] ?></th>   
        <th><?php echo $data_quest_b['8'] ?></th>   
        <th colspan="2"><?php echo $data_quest_b['9'] ?></th>   
    </tr>
    <!-- row 2 -->
    <tr>
        <th>Jawaban</th>
        <th>Jawaban</th>
        <th>Jawaban</th>
        <th>Jawaban</th>
        <th>Jawaban</th>
        <th>Jawaban</th>
        <th>Jawaban</th>
        <th>Jawaban</th>
        <th>Pertanyaan</th>
        <th>Jawaban 1 s.d 5</th>
    </tr>

    <!-- body -->
    <?php
        $no=1;
        while ($data= mysql_fetch_assoc($kuisb)) {
            echo "<tr>";
                echo "
                    <td>$no</td>
                    <td>$data[nim]</td>
                    <td>$data[nama_alumni]</td>
                    <td>$data[prodi]</td>
                    <td>$data[tahun_lulus]</td>";

                #b1
                $ans_b1= substr($data['b1'], 0,3);

                if ($ans_b1=='b13') {
                    echo "<td>".$data_b1[$ans_b1]."</td>";
                }else{
                    // get month b11 and b12
                    $month_b1= substr($data['b1'], -1,1);
                    echo "<td>Kira-kira $month_b1 $data_b1[$ans_b1]</td>";
                }

                #b2
                echo "<td>";
                $cek_b2= isset($data_b2[$data['b2']])? $data_b2[$data['b2']] : ''; 
                if ($cek_b2!='') {
                    if ($data['b2']=='b23') {
                        $id= $data['id_alumni'];
                        $sql= mysql_fetch_object(mysql_query("SELECT * FROM tb_b23 WHERE id_alumni=$data[id_alumni]"));
                        
                        echo "- $cek_b2<br>";
                        echo "<strong>1. $data_b23[1]</strong><br>";
                        echo '- '.$sql->b231.'<br>';
                        echo "<strong>2. $data_b23[2]</strong><br>";
                        echo '- '.$sql->b232.'<br>';
                        echo "<strong>3. $data_b23[3]</strong><br>";
                        echo isset($data_b23_sub[3][$sql->b233])? '- '.$data_b23_sub[3][$sql->b233].'<br>': '- '.$sql->b233.'<br>';
                        echo "<strong>4. $data_b23[4]</strong><br>";
                        echo isset($data_b23_sub[4][$sql->b234])? '- '.$data_b23_sub[3][$sql->b234].'<br>': '- '.$sql->b234.'<br>';

                    }else{
                        echo $cek_b2;
                    }
                }else{
                    echo $data['b2'];
                }
                echo "</td>";

                #b3
                $array_b3= explode('+', $data['b3']);
                // echo count($array_b3);
                // print_r($array_b3);
                // die(); 
                if (count($array_b3) == 2) {#if b3 lainnya is set
                    $ans_b3     = explode('-', $array_b3['0']);
                    $b3lainnya  = $array_b3['1'];

                    echo "<td>";
                    $no_b3= 1;
                    foreach ($ans_b3 as $key => $value) {
                        echo isset($data_b3[$value])? $no_b3.'. '.$data_b3[$value].'<br>' : '';
                        $no_b3++;
                    }
                    echo isset($b3lainnya)!=''? $no_b3.'. '.$b3lainnya : '';
                    echo "</td>";

                }else{
                    $ans_b3     = explode('-', $array_b3[0]);
                    echo "<td>";
                    $no_b3= 1;
                    foreach ($ans_b3 as $key => $value) {
                        echo $no_b3.'. '.$data_b3[$value].'<br>';
                        $no_b3++;
                    }
                    echo "</td>";
                }

                #b4
                echo '<td>'.$data_b4[$data['b4']].'</td>';

                #b5
                echo '<td>'.$data['b5'].'</td>';

                #b6
                echo '<td>'.$data['b6'].'</td>';

                #b7
                echo '<td>'.$data['b7'].'</td>';

                #b8
                echo '<td>';
                $ans_b8= $data_b8[$data['b8']];
                echo isset($ans_b8)? $ans_b8 : $data['b8'] ; 
                echo '</td>';

                #b9
                $array_b9= explode('+', $data['b9']);
                if (count($array_b9)==2) {
                    $ans_b9         = explode('-', $array_b9[0]);
                    $quest_b9_lain  = $array_b9[1];
                }else{
                    $ans_b9         = explode('-', $data['b9']);
                }
                
                echo '<td>';
                $no_b9=1;
                foreach ($data_b9 as $key => $value) {
                    echo $no_b9.'. '.$value.'<br>';
                    $no_b9++;
                }
                echo isset($quest_b9_lain)? $no_b9.'. '.$quest_b9_lain : '';
                echo '</td>';

                echo '<td>';
                foreach ($ans_b9 as $key => $value) {
                    echo $value.'<br>';
                }
                echo '</td>';


            echo "</tr>";
            $no++;
        }
    ?>
    <!-- end body -->
</table>