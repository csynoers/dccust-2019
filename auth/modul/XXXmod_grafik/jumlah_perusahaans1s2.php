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
                                  `tb_c`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)");
    $jml_s2 = mysql_num_rows($s2);
    $c4s1 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.jenjang = 'S1'");
    $jmlc4s1 = mysql_num_rows($c4s1);
    if ($jmlc4s1>0) {
     while ($dc4s1 = mysql_fetch_assoc($c4s1)) {
      $totc4s1 += $dc4s1['c4']; 
    }
    $ratc4s1 = $totc4s1/$jmlc4s1;
    }else{
      $ratc4s1 = 0;
    }
    $c4s2 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.jenjang = 'S2'");
    $jmlc4s2 = mysql_num_rows($c4s2);
    if ($jmlc4s2>0) {
     while ($dc4s2 = mysql_fetch_assoc($c4s2)) {
      $totc4s2 += $dc4s2['c4']; 
    }
    $ratc4s2 = $totc4s2/$jmlc4s2;
    }else{
      $ratc4s2 = 0;
    }

    $c6s1 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.jenjang = 'S1'");
    $jmlc6s1 = mysql_num_rows($c6s1);
    if ($jmlc6s1>0) {
     while ($dc6s1 = mysql_fetch_assoc($c6s1)) {
      $totc6s1 += $dc6s1['c6']; 
    }
    $ratc6s1 = $totc6s1/$jmlc6s1;
    }else{
      $ratc6s1 = 0;
    }
    $c6s2 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.jenjang = 'S2'");
    $jmlc6s2 = mysql_num_rows($c6s2);
    if ($jmlc6s2>0) {
     while ($dc6s2 = mysql_fetch_assoc($c6s2)) {
      $totc6s2 += $dc6s2['c6']; 
    }
    $ratc6s2 = $totc6s2/$jmlc6s2;
    }else{
      $ratc6s2 = 0;
    }

    $c7s1 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.jenjang = 'S1'");
    $jmlc7s1 = mysql_num_rows($c7s1);
    if ($jmlc7s1>0) {
     while ($dc7s1 = mysql_fetch_assoc($c7s1)) {
      $totc7s1 += $dc7s1['c7']; 
    }
    $ratc7s1 = $totc7s1/$jmlc7s1;
    }else{
      $ratc7s1 = 0;
    }
    $c7s2 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.jenjang = 'S2'");
    $jmlc7s2 = mysql_num_rows($c7s2);
    if ($jmlc7s2>0) {
     while ($dc7s2 = mysql_fetch_assoc($c7s2)) {
      $totc7s2 += $dc7s2['c7']; 
    }
    $ratc7s2 = $totc7s2/$jmlc7s2;
    }else{
      $ratc7s2 = 0;
    }
    
    ?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Jenjang', 'Perusahaan yang dilamar', 'Perusahaan yang merespon lamaran', 'Perusahaan yang mengundang wawancara'],
          ['S1', <?php echo $ratc4s1 ?>, <?php echo $ratc6s1 ?>, <?php echo $ratc7s1 ?>],
          ['S2', <?php echo $ratc4s2 ?>, <?php echo $ratc6s2 ?>, <?php echo $ratc7s2 ?>]
        ]);

        var options = {
          chart: {
            title: 'Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
<style>.ui-widget-header{background:none;border:none;}</style>
		<article class="module width_full">
			<header><h3 class="tabs_involved">Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara</h3></header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			 	<div id="columnchart_material" style="width: 100%; height: 500px;"></div>
			 	<br>
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