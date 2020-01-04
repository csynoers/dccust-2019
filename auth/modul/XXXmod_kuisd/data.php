<?php
include "../../../josys/koneksi.php";

function jwb($field,$table,$where,$where_fill){
    $sql = mysql_fetch_assoc(mysql_query("SELECT $field FROM $table WHERE $where = '".strip_tags($where_fill)."'"));
    return $sql[$field];
}

$data_quest_d= array(
'1' => 'D1 Seberapa erat hubungan antara bidang studi dengan pekerjaan Anda? ', 
'2' => 'D2 Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?', 
'3' => 'D3 Jika menurut Anda pekerjaan Anda saat ini tidak sesuai dengan pendidikan Anda, mengapa Anda mengambilnya? <small><i>Jawaban bisa lebih dari satu.</i></small> ', 
);

$data_d1= array(
'1' => 'Hubungan bidang studi dengan pekerjaan',
);

$data_d2= array(
'1' => 'Setingkat lebih tinggi',
'2' => 'Tingkat yang sama',
'3' => 'Setingkat lebih rendah',
'4' => 'Tidak perlu pendidikan tinggi',
);

$data_d3= array(
'd31' => 'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.',
'd32' => 'Saya belum mendapatkan pekerjaan yang lebih sesuai.',
'd33' => 'Di pekerjaan ini saya memperoleh prospek karir yang baik.',
'd34' => 'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.',
'd35' => 'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.',
'd36' => 'Saya dapat memperoleh pendapatn yang lebih tinggi di pekerjaan ini.',
'd37' => 'Pekerjaan saya saat ini lebih aman/terjamin/secure',
'd38' => 'Pekerjaan saya saat ini lebih menarik',
'd39' => 'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.',
'd310' => 'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.',
'd311' => 'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.',
'd312' => 'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.',
'd313' => 'Lainnya',
);
# MENGAMBIL DATA DARI DATABASE MYSQL
if (isset($_GET['prodi'])) {
    $kuisd = mysql_query("
                        SELECT
                            alumni_daftar.nim,
                            alumni_daftar.nama_alumni,
                            alumni_daftar.tahun_lulus,
                            prodi.prodi,
                            tb_d.d11,
                            tb_d.d2,
                            tb_d.d3,
                            tb_d.d313

                        FROM alumni_daftar
                            INNER JOIN prodi
                                ON (alumni_daftar.prodi = prodi.id_prodi)
                            INNER JOIN tb_d
                                ON (tb_d.id_alumni = alumni_daftar.id_alumni)
                        WHERE alumni_daftar.prodi = '$_GET[prodi]'
                        ORDER BY alumni_daftar.nim ASC
                        ");
}else{
    $kuisd = mysql_query("
                        SELECT *
                        FROM alumni_daftar
                            INNER JOIN prodi
                                ON (alumni_daftar.prodi = prodi.id_prodi)
                            INNER JOIN tb_d
                                ON (tb_d.id_alumni = alumni_daftar.id_alumni)
                        ORDER BY alumni_daftar.nim ASC
                        ");
}
?>
<table border="1">
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Nim</th>
        <th rowspan="3">Nama Alumni</th>
        <th rowspan="3">Prodi</th>
        <th rowspan="3">Tahun Lulus</th>
        <th colspan="2"><?php echo $data_quest_d['1'] ?></th>
        <th><?php echo $data_quest_d['2'] ?></th>
        <th><?php echo $data_quest_d['3'] ?></th>
    </tr>
    <tr>
        <th rowspan="2">Pertanyaan</th>
        <th>Jawaban</th>
        <th rowspan="2">Jawaban</th>
        <th rowspan="2">Jawaban</th>
    </tr>
    <tr>
        <th>1 s.d 5</th>
    </tr>

    <?php
        $no=1;
        while ($data= mysql_fetch_assoc($kuisd)) {
        ?>
            <td><?php echo $no ?></td>
            <td><?php echo $data['nim'] ?></td>
            <td><?php echo $data['nama_alumni'] ?></td>
            <td><?php echo $data['prodi'] ?></td>
            <td><?php echo $data['tahun_lulus'] ?></td>
            <td><?php echo $data_d1['1'] ?></td>
            <td><?php echo $data['d11']; ?></td>
            <td><?php echo $data_d2[$data['d2']] ?></td>
            <td>
            <?php
                $no_d3=1;
                $ans_d3= explode('-', $data['d3']);
                foreach ($ans_d3 as $key => $value) {
                    echo $no_d3.'. '.$data_d3[$value].'<br>';
                    $no_d3++;
                }
                echo $data['d313']!=''? $no_d3.'. '.$data['d313']: '';

            ?>
                
            </td>
        <?php
        $no++;
        }
    ?>
            

</table>