<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>
    <?php 
    $s2 = mysql_query("SELECT * FROM
                                  `tb_d`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2' ");
    $jml_s2 = mysql_num_rows($s2);

$d1142 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '42' AND alumni_daftar.jenjang = 'S2' AND tb_d.d1 = 'Ya'");
$jmld1142 = mysql_num_rows($d1142);

$d1143 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '43' AND alumni_daftar.jenjang = 'S2' AND tb_d.d1 = 'Ya'");
$jmld1143 = mysql_num_rows($d1143);
$d1144 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '44' AND alumni_daftar.jenjang = 'S2' AND tb_d.d1 = 'Ya'");
$jmld1144 = mysql_num_rows($d1144);
$d1145 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '45' AND alumni_daftar.jenjang = 'S2' AND tb_d.d1 = 'Ya'");
$jmld1145 = mysql_num_rows($d1145);


$d1242 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '42' AND alumni_daftar.jenjang = 'S2' AND tb_d.d1 = 'Tidak'");
$jmld1242 = mysql_num_rows($d1242);

$d1243 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '43' AND alumni_daftar.jenjang = 'S2' AND tb_d.d1 = 'Tidak'");
$jmld1243 = mysql_num_rows($d1243);
$d1244 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '44' AND alumni_daftar.jenjang = 'S2' AND tb_d.d1 = 'Tidak'");
$jmld1244 = mysql_num_rows($d1244);
$d1245 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '45' AND alumni_daftar.jenjang = 'S2' AND tb_d.d1 = 'Tidak'");
$jmld1245 = mysql_num_rows($d1245);


$totaljmld142 = $jmld1142+$jmld1242;
$persend1142 = ($jmld1142/$totaljmld142)*100;
$persend1242 = ($jmld1242/$totaljmld142)*100;

$totaljmld143 = $jmld1143+$jmld1243;
$persend1143 = ($jmld1143/$totaljmld143)*100;
$persend1243 = ($jmld1243/$totaljmld143)*100;

$totaljmld144 = $jmld1144+$jmld1244;
$persend1144 = ($jmld1144/$totaljmld144)*100;
$persend1244 = ($jmld1244/$totaljmld144)*100;

$totaljmld145 = $jmld1145+$jmld1245;
$persend1145 = ($jmld1145/$totaljmld145)*100;
$persend1245 = ($jmld1245/$totaljmld145)*100;


    ?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Jurusan', 'Bekerja', 'Tidak Bekerja'],
          ['Magister Manajemen', <?php echo $persend1142 ?>, <?php echo $persend1242 ?>],
          ['Manajemen Pendidikan', <?php echo $persend1143 ?>, <?php echo $persend1243 ?>],
          ['Penelitian dan Evaluasi Pendidikan', <?php echo $persend1144 ?>, <?php echo $persend1244 ?>],
          ['Pendidikan Bahasa Inggris S2', <?php echo $persend1145 ?>, <?php echo $persend1245 ?>]
        ]);

        var options = {
          chart: {
            title: 'Status saat ini alumni S2',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
<style>.ui-widget-header{background:none;border:none;}</style>
    <article class="module width_full">
      <header><h3 class="tabs_involved">Status saat ini alumni S2</h3></header>
    <div class="tab_container">
      <div id="tab1" class="tab_content">
        <div id="columnchart_material" style="width: 90%; height: 500px;"></div>
        <br>
        <!-- <div align="center"><img src="../img/index.png"></div> -->
        <br>
        <table class="table">
          <tr>
            <td></td>
            <td>Total Responden S2</td>
          </tr>
          <tr>
            <td>Total Responden</td>
            <td><?php echo $jml_s2  ?></td>
          </tr>
          
        </table>
      </div>
    </div>
    </article>
    
<?php } ?>