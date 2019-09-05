<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>
    <?php 
    $s1 = mysql_query("SELECT * FROM
                                  `tb_d`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1' ");
    $jml_s1 = mysql_num_rows($s1);

    $d1125 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '25' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1125 = mysql_num_rows($d1125);

$d1126 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '26' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1126 = mysql_num_rows($d1126);
$d1127 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '27' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1127 = mysql_num_rows($d1127);
$d1128 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '28' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1128 = mysql_num_rows($d1128);
$d1129 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '29' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1129 = mysql_num_rows($d1129);
$d1130 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '30' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1130 = mysql_num_rows($d1130);
$d1131 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '31' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1131 = mysql_num_rows($d1131);
$d1132 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '32' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1132 = mysql_num_rows($d1132);
$d1133 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '33' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1133 = mysql_num_rows($d1133);
$d1134 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '34' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1134 = mysql_num_rows($d1134);
$d1135 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '35' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1135 = mysql_num_rows($d1135);
$d1136 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '36' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1136 = mysql_num_rows($d1136);
$d1137 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '37' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1137 = mysql_num_rows($d1137);
$d1139 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '39' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1139 = mysql_num_rows($d1139);
$d1140 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '40' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1140 = mysql_num_rows($d1140);
$d1141 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '41' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1141 = mysql_num_rows($d1141);
$d1142 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '42' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Ya'");
$jmld1142 = mysql_num_rows($d1142);


$d1225 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '25' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1225 = mysql_num_rows($d1225);

$d1226 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '26' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1226 = mysql_num_rows($d1226);
$d1227 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '27' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1227 = mysql_num_rows($d1227);
$d1228 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '28' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1228 = mysql_num_rows($d1228);
$d1229 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '29' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1229 = mysql_num_rows($d1229);
$d1230 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '30' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1230 = mysql_num_rows($d1230);
$d1231 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '31' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1231 = mysql_num_rows($d1231);
$d1232 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '32' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1232 = mysql_num_rows($d1232);
$d1233 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '33' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1233 = mysql_num_rows($d1233);
$d1234 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '34' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1234 = mysql_num_rows($d1234);
$d1235 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '35' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1235 = mysql_num_rows($d1235);
$d1236 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '36' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1236 = mysql_num_rows($d1236);
$d1237 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '37' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1237 = mysql_num_rows($d1237);
$d1239 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '39' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1239 = mysql_num_rows($d1239);
$d1240 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '40' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1240 = mysql_num_rows($d1240);
$d1241 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '41' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1241 = mysql_num_rows($d1241);
$d1242 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '42' AND alumni_daftar.jenjang = 'S1' AND tb_d.d1 = 'Tidak'");
$jmld1242 = mysql_num_rows($d1242);

$totaljmld125 = $jmld1125+$jmld1225;
$persend1125 = ($jmld1125/$totaljmld125)*100;
$persend1225 = ($jmld1225/$totaljmld125)*100;

$totaljmld126 = $jmld1126+$jmld1226;
$persend1126 = ($jmld1126/$totaljmld126)*100;
$persend1226 = ($jmld1226/$totaljmld126)*100;

$totaljmld127 = $jmld1127+$jmld1227;
$persend1127 = ($jmld1127/$totaljmld127)*100;
$persend1227 = ($jmld1227/$totaljmld127)*100;

$totaljmld128 = $jmld1128+$jmld1228;
$persend1128 = ($jmld1128/$totaljmld128)*100;
$persend1228 = ($jmld1228/$totaljmld128)*100;

$totaljmld129 = $jmld1129+$jmld1229;
$persend1129 = ($jmld1129/$totaljmld129)*100;
$persend1229 = ($jmld1229/$totaljmld129)*100;

$totaljmld130 = $jmld1130+$jmld1230;
$persend1130 = ($jmld1130/$totaljmld130)*100;
$persend1230 = ($jmld1230/$totaljmld130)*100;

$totaljmld131 = $jmld1131+$jmld1231;
$persend1131 = ($jmld1131/$totaljmld131)*100;
$persend1231 = ($jmld1231/$totaljmld131)*100;

$totaljmld132 = $jmld1132+$jmld1232;
$persend1132 = ($jmld1132/$totaljmld132)*100;
$persend1232 = ($jmld1232/$totaljmld132)*100;

$totaljmld133 = $jmld1133+$jmld1233;
$persend1133 = ($jmld1133/$totaljmld133)*100;
$persend1233 = ($jmld1233/$totaljmld133)*100;

$totaljmld134 = $jmld1134+$jmld1234;
$persend1134 = ($jmld1134/$totaljmld134)*100;
$persend1234 = ($jmld1234/$totaljmld134)*100;

$totaljmld135 = $jmld1135+$jmld1235;
$persend1135 = ($jmld1135/$totaljmld135)*100;
$persend1235 = ($jmld1235/$totaljmld135)*100;

$totaljmld136 = $jmld1136+$jmld1236;
$persend1136 = ($jmld1136/$totaljmld136)*100;
$persend1236 = ($jmld1236/$totaljmld136)*100;

$totaljmld137 = $jmld1137+$jmld1237;
$persend1137 = ($jmld1137/$totaljmld137)*100;
$persend1237 = ($jmld1237/$totaljmld137)*100;

$totaljmld139 = $jmld1139+$jmld1239;
$persend1139 = ($jmld1139/$totaljmld139)*100;
$persend1239 = ($jmld1239/$totaljmld139)*100;

$totaljmld140 = $jmld1140+$jmld1240;
$persend1140 = ($jmld1140/$totaljmld140)*100;
$persend1240 = ($jmld1240/$totaljmld140)*100;

$totaljmld141 = $jmld1141+$jmld1241;
$persend1141 = ($jmld1141/$totaljmld141)*100;
$persend1241 = ($jmld1241/$totaljmld141)*100;
    ?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Jurusan', 'Bekerja', 'Tidak Bekerja'],
          ['Akuntansi', <?php echo $persend1125 ?>, <?php echo $persend1225 ?>],
          ['Manajemen', <?php echo $persend1126 ?>, <?php echo $persend1226 ?>],
          ['Pendidikan Matematika', <?php echo $persend1127 ?>, <?php echo $persend1227 ?>],
          ['Pendidikan Fisika', <?php echo $persend1128 ?>, <?php echo $persend1228 ?>],
          ['Pendidikan Bahasa Inggris', <?php echo $persend1129 ?>, <?php echo $persend1229 ?>],
          ['Pendidikan Bahasa dan Sastra Indonesia', <?php echo $persend1130 ?>, <?php echo $persend1230 ?>],
          ['Pendidikan Seni Rupa', <?php echo $persend1131 ?>, <?php echo $persend1231 ?>],
          ['Pendidikan Teknik Mesin', <?php echo $persend1132 ?>, <?php echo $persend1232 ?>],
          ['Pendidikan Kesejahteraan Keluarga', <?php echo $persend1133 ?>, <?php echo $persend1233 ?>],
          ['Pendidikan Guru Sekolah Dasar', <?php echo $persend1134 ?>, <?php echo $persend1234 ?>],
          ['Pendidikan Ilmu Pengetahuan Alam', <?php echo $persend1135 ?>, <?php echo $persend1235 ?>],
          ['Agroteknologi', <?php echo $persend1136 ?>, <?php echo $persend1236 ?>],
          ['Agrobisnis', <?php echo $persend1137 ?>, <?php echo $persend1237 ?>],
          ['Psikologi', <?php echo $persend1139 ?>, <?php echo $persend1239 ?>],
          ['Tekink Industri', <?php echo $persend1140 ?>, <?php echo $persend1240 ?>],
          ['Teknik Sipil', <?php echo $persend1141 ?>, <?php echo $persend1241 ?>]
        ]);

        var options = {
          chart: {
            title: 'Status saat ini alumni S1 Reguler',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
<style>.ui-widget-header{background:none;border:none;}</style>
    <article class="module width_full">
      <header><h3 class="tabs_involved">Status saat ini alumni S1 Reguler</h3></header>
    <div class="tab_container">
      <div id="tab1" class="tab_content">
        <div id="columnchart_material" style="width: 90%; height: 500px;"></div>
        <br>
        <!-- <div align="center"><img src="../img/index.png"></div> -->
        <br>
        <table class="table">
          <tr>
            <td></td>
            <td>Total Responden S1</td>
          </tr>
          <tr>
            <td>Total Responden</td>
            <td><?php echo $jml_s1  ?></td>
          </tr>
          
        </table>
      </div>
    </div>
    </article>
    
<?php } ?>