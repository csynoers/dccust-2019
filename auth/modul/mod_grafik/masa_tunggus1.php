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
    $s2 = mysql_query("SELECT * FROM
                                  `tb_d`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2' ");
    $jml_s2 = mysql_num_rows($s2);

    $d10125 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '25' AND alumni_daftar.jenjang = 'S1'");
    $jmld10125 = mysql_num_rows($d10125);
    if ($jmld10125>0) {
     while ($dd10125 = mysql_fetch_assoc($d10125)) {
      $totd10125 += $dd10125['d101']; 
    }
    $ratd10125 = $totd10125/$jmld10125;
    }else{
      $ratd10125 = 0;
    }

    $d10126 = mysql_query("SELECT *
                        FROM
                            `tb_d`
                            INNER JOIN `alumni_daftar` 
                                ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            INNER JOIN `prodi` 
                                ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                        WHERE alumni_daftar.prodi = '26' AND alumni_daftar.jenjang = 'S1'");
    $jmld10126 = mysql_num_rows($d10126);
    if ($jmld10126>0) {
    while ($dd10126 = mysql_fetch_assoc($d10126)) {
    $totd10126 += $dd10126['d101']; 
    }
    $ratd10126 = $totd10126/$jmld10126;
    }else{
    $ratd10126 = 0;
    }

    $d10127 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '27' AND alumni_daftar.jenjang = 'S1'");
    $jmld10127 = mysql_num_rows($d10127);
    if ($jmld10127>0) {
     while ($dd10127 = mysql_fetch_assoc($d10127)) {
      $totd10127 += $dd10127['d101']; 
    }
    $ratd10127 = $totd10127/$jmld10127;
    }else{
      $ratd10127 = 0;
    }

    $d10128 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '28' AND alumni_daftar.jenjang = 'S1'");
    $jmld10128 = mysql_num_rows($d10128);
    if ($jmld10128>0) {
     while ($dd10128 = mysql_fetch_assoc($d10128)) {
      $totd10128 += $dd10128['d101']; 
    }
    $ratd10128 = $totd10128/$jmld10128;
    }else{
      $ratd10128 = 0;
    }

        $d10129 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '29' AND alumni_daftar.jenjang = 'S1'");
    $jmld10129 = mysql_num_rows($d10129);
    if ($jmld10129>0) {
     while ($dd10129 = mysql_fetch_assoc($d10129)) {
      $totd10129 += $dd10129['d101']; 
    }
    $ratd10129 = $totd10129/$jmld10129;
    }else{
      $ratd10129 = 0;
    }

        $d10130 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '30' AND alumni_daftar.jenjang = 'S1'");
    $jmld10130 = mysql_num_rows($d10130);
    if ($jmld10130>0) {
     while ($dd10130 = mysql_fetch_assoc($d10130)) {
      $totd10130 += $dd10130['d101']; 
    }
    $ratd10130 = $totd10130/$jmld10130;
    }else{
      $ratd10130 = 0;
    }

        $d10131 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '31' AND alumni_daftar.jenjang = 'S1'");
    $jmld10131 = mysql_num_rows($d10131);
    if ($jmld10131>0) {
     while ($dd10131 = mysql_fetch_assoc($d10131)) {
      $totd10131 += $dd10131['d101']; 
    }
    $ratd10131 = $totd10131/$jmld10131;
    }else{
      $ratd10131 = 0;
    }

        $d10132 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '32' AND alumni_daftar.jenjang = 'S1'");
    $jmld10132 = mysql_num_rows($d10132);
    if ($jmld10132>0) {
     while ($dd10132 = mysql_fetch_assoc($d10132)) {
      $totd10132 += $dd10132['d101']; 
    }
    $ratd10132 = $totd10132/$jmld10132;
    }else{
      $ratd10132 = 0;
    }

        $d10133 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '33' AND alumni_daftar.jenjang = 'S1'");
    $jmld10133 = mysql_num_rows($d10133);
    if ($jmld10133>0) {
     while ($dd10133 = mysql_fetch_assoc($d10133)) {
      $totd10133 += $dd10133['d101']; 
    }
    $ratd10133 = $totd10133/$jmld10133;
    }else{
      $ratd10133 = 0;
    }

        $d10134 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '34' AND alumni_daftar.jenjang = 'S1'");
    $jmld10134 = mysql_num_rows($d10134);
    if ($jmld10134>0) {
     while ($dd10134 = mysql_fetch_assoc($d10134)) {
      $totd10134 += $dd10134['d101']; 
    }
    $ratd10134 = $totd10134/$jmld10134;
    }else{
      $ratd10134 = 0;
    }

        $d10135 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '35' AND alumni_daftar.jenjang = 'S1'");
    $jmld10135 = mysql_num_rows($d10135);
    if ($jmld10135>0) {
     while ($dd10135 = mysql_fetch_assoc($d10135)) {
      $totd10135 += $dd10135['d101']; 
    }
    $ratd10135 = $totd10135/$jmld10135;
    }else{
      $ratd10135 = 0;
    }

        $d10136 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '36' AND alumni_daftar.jenjang = 'S1'");
    $jmld10136 = mysql_num_rows($d10136);
    if ($jmld10136>0) {
     while ($dd10136 = mysql_fetch_assoc($d10136)) {
      $totd10136 += $dd10136['d101']; 
    }
    $ratd10136 = $totd10136/$jmld10136;
    }else{
      $ratd10136 = 0;
    }

        $d10137 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '37' AND alumni_daftar.jenjang = 'S1'");
    $jmld10137 = mysql_num_rows($d10137);
    if ($jmld10137>0) {
     while ($dd10137 = mysql_fetch_assoc($d10137)) {
      $totd10137 += $dd10137['d101']; 
    }
    $ratd10137 = $totd10137/$jmld10137;
    }else{
      $ratd10137 = 0;
    }

        $d10139 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '39' AND alumni_daftar.jenjang = 'S1'");
    $jmld10139 = mysql_num_rows($d10139);
    if ($jmld10139>0) {
     while ($dd10139 = mysql_fetch_assoc($d10139)) {
      $totd10139 += $dd10139['d101']; 
    }
    $ratd10139 = $totd10139/$jmld10139;
    }else{
      $ratd10139 = 0;
    }

        $d10140 = mysql_query("SELECT *
                            FROM
                                `tb_d`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '40' AND alumni_daftar.jenjang = 'S1'");
    $jmld10140 = mysql_num_rows($d10140);
    if ($jmld10140>0) {
     while ($dd10140 = mysql_fetch_assoc($d10140)) {
      $totd10140 += $dd10140['d101']; 
    }
    $ratd10140 = $totd10140/$jmld10140;
    }else{
      $ratd10140 = 0;
    }

?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Prodi', 'Pendapatan'],
          ['Akuntansi', <?php echo $ratd10125 ?>],
          ['Manajemen', <?php echo $ratd10126 ?>],
          ['Pendidikan Matematika', <?php echo $ratd10127 ?>],
          ['Pendidikan Fisika', <?php echo $ratd10128 ?>],
          ['Pendidikan Bahasa Inggris', <?php echo $ratd10129 ?>],
          ['Pendidikan Bahasa dan Sastra Indonesia', <?php echo $ratd10130 ?>],
          ['Pendidikan Seni Rupa', <?php echo $ratd10131 ?>],
          ['Pendidikan Teknik Mesin', <?php echo $ratd10132 ?>],
          ['Pendidikan Kesejahteraan Keluarga', <?php echo $ratd10133 ?>],
          ['Pendidikan Guru Sekolah Dasar', <?php echo $ratd10134 ?>],
          ['Pendidikan Ilmu Pengetahuan Alam', <?php echo $ratd10135 ?>],
          ['Agroteknologi', <?php echo $ratd10136 ?>],
          ['Agrobisnis', <?php echo $ratd10137 ?>],
          ['Psikologi', <?php echo $ratd10139 ?>],
          ['Tekink Industri', <?php echo $ratd10140 ?>],
          ['Teknik Sipil', <?php echo $ratd10141 ?>]
        ]);

        var options = {
          title: 'Pendapatan alumni',
          hAxis: {title: 'Jenjang',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  <style>.ui-widget-header{background:none;border:none;}</style>
    <article class="module width_full">
      <header><h3 class="tabs_involved">Pendapatan Alumni</h3></header>
    <div class="tab_container">
      <div id="tab1" class="tab_content">
        <div id="chart_div" style="width: 100%; height: 800px;"></div>
        <br>
        <br>
        <table class="table">
          <tr>
            <td></td>
            <td>Total Responden S1</td>
            <td>Total Responden S2</td>
          </tr>
          <tr>
            <td>Total Responden</td>
            <td><?php echo $jml_s1  ?></td>
            <td><?php echo $jml_s2  ?></td>
          </tr>
          
        </table>
      </div>
    </div>
    </article>
    
<?php } ?>