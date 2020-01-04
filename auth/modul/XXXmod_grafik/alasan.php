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
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`)");
		$jml_s1 = mysql_num_rows($s1);
		$s2 = mysql_query("SELECT * FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2' ");
		$jml_s2 = mysql_num_rows($s2);

		//S1

		$b71s1 = mysql_query("SELECT tb_b.b71 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b71s1)>0) {
			while ($data_b71s1 = mysql_fetch_assoc($b71s1)) {
			$jum_b71s1 += $data_b71s1['b71'];
			$mean_b71s1 = round(($jum_b71s1/$jml_s1),2);
			}
		}else{
			$jum_b71s1 = 0;
			$mean_b71s1 = round(($jum_b71s1/$jml_s1),2);
		}
		$b72s1 = mysql_query("SELECT tb_b.b72 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b72s1)>0) {
			while ($data_b72s1 = mysql_fetch_assoc($b72s1)) {
			$jum_b72s1 += $data_b72s1['b72'];
			$mean_b72s1 = round(($jum_b72s1/$jml_s1),2);
			}
		}else{
			$jum_b72s1 = 0;
			$mean_b72s1 = round(($jum_b72s1/$jml_s1),2);
		}
		$b73s1 = mysql_query("SELECT tb_b.b73 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b73s1)>0) {
			while ($data_b73s1 = mysql_fetch_assoc($b73s1)) {
			$jum_b73s1 += $data_b73s1['b73'];
			$mean_b73s1 = round(($jum_b73s1/$jml_s1),2);
			}
		}else{
			$jum_b73s1 = 0;
			$mean_b73s1 = round(($jum_b73s1/$jml_s1),2);
		}
		$b74s1 = mysql_query("SELECT tb_b.b74 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b74s1)>0) {
			while ($data_b74s1 = mysql_fetch_assoc($b74s1)) {
			$jum_b74s1 += $data_b74s1['b74'];
			$mean_b74s1 = round(($jum_b74s1/$jml_s1),2);
			}
		}else{
			$jum_b74s1 = 0;
			$mean_b74s1 = round(($jum_b74s1/$jml_s1),2);
		}
		$b75s1 = mysql_query("SELECT tb_b.b75 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b75s1)>0) {
			while ($data_b75s1 = mysql_fetch_assoc($b75s1)) {
			$jum_b75s1 += $data_b75s1['b75'];
			$mean_b75s1 = round(($jum_b75s1/$jml_s1),2);
			}
		}else{
			$jum_b75s1 = 0;
			$mean_b75s1 = round(($jum_b75s1/$jml_s1),2);
		}
		$b76s1 = mysql_query("SELECT tb_b.b76 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b76s1)>0) {
			while ($data_b76s1 = mysql_fetch_assoc($b76s1)) {
			$jum_b76s1 += $data_b76s1['b76'];
			$mean_b76s1 = round(($jum_b76s1/$jml_s1),2);
			}
		}else{
			$jum_b76s1 = 0;
			$mean_b76s1 = round(($jum_b76s1/$jml_s1),2);
		}

		//S2
		$b71s2 = mysql_query("SELECT tb_b.b71 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b71s2)>0) {
			while ($data_b71s2 = mysql_fetch_assoc($b71s2)) {
			$jum_b71s2 += $data_b71s2['b71'];
			$mean_b71s2 = round(($jum_b71s2/$jml_s2),2);
			}
		}else{
			$jum_b71s2 = 0;
			$mean_b71s2 = round(($jum_b71s2/$jml_s2),2);
		}
		$b72s2 = mysql_query("SELECT tb_b.b72 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b72s2)>0) {
			while ($data_b72s2 = mysql_fetch_assoc($b72s2)) {
			$jum_b72s2 += $data_b72s2['b72'];
			$mean_b72s2 = round(($jum_b72s2/$jml_s2),2);
			}
		}else{
			$jum_b72s2 = 0;
			$mean_b72s2 = round(($jum_b72s2/$jml_s2),2);
		}
		$b73s2 = mysql_query("SELECT tb_b.b73 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b73s2)>0) {
			while ($data_b73s2 = mysql_fetch_assoc($b73s2)) {
			$jum_b73s2 += $data_b73s2['b73'];
			$mean_b73s2 = round(($jum_b73s2/$jml_s2),2);
			}
		}else{
			$jum_b73s2 = 0;
			$mean_b73s2 = round(($jum_b73s2/$jml_s2),2);
		}
		$b74s2 = mysql_query("SELECT tb_b.b74 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b74s2)>0) {
			while ($data_b74s2 = mysql_fetch_assoc($b74s2)) {
			$jum_b74s2 += $data_b74s2['b74'];
			$mean_b74s2 = round(($jum_b74s2/$jml_s2),2);
			}
		}else{
			$jum_b74s2 = 0;
			$mean_b74s2 = round(($jum_b74s2/$jml_s2),2);
		}
		$b75s2 = mysql_query("SELECT tb_b.b75 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b75s2)>0) {
			while ($data_b75s2 = mysql_fetch_assoc($b75s2)) {
			$jum_b75s2 += $data_b75s2['b75'];
			$mean_b75s2 = round(($jum_b75s2/$jml_s2),2);
			}
		}else{
			$jum_b75s2 = 0;
			$mean_b75s2 = round(($jum_b75s2/$jml_s2),2);
		}
		$b76s2 = mysql_query("SELECT tb_b.b76 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b76s2)>0) {
			while ($data_b76s2 = mysql_fetch_assoc($b76s2)) {
			$jum_b76s2 += $data_b76s2['b76'];
			$mean_b76s2 = round(($jum_b76s2/$jml_s2),2);
			}
		}else{
			$jum_b76s2 = 0;
			$mean_b76s2 = round(($jum_b76s2/$jml_s2),2);
		}

		

?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Alasan', 'S1', 'S2'],
          ['Lainnya', <?php echo $mean_b71s1 ?>, <?php echo $mean_b71s2 ?>],
          ['Kesehatan', <?php echo $mean_b72s1 ?>, <?php echo $mean_b72s2 ?>],
          ['Alasan keluarga',<?php echo $mean_b73s1 ?>, <?php echo $mean_b73s2 ?>],
          ['Penulisan skripsi', <?php echo $mean_b74s1 ?>, <?php echo $mean_b74s2 ?>],
          ['Tidak lulus ujian', <?php echo $mean_b75s1 ?>, <?php echo $mean_b75s2 ?>],
          ['Alasan keuangan', <?php echo $mean_b76s1 ?>,<?php echo $mean_b76s2 ?>]
        ]);

        var options = {
          chart: {
            title: 'Alasan yang mempengaruhi lamanya studi',
            subtitle: '',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, options);
      }
    </script>
<style>.ui-widget-header{background:none;border:none;}</style>
		<article class="module width_full">
			<header><h3 class="tabs_involved">Alasan yang mempengaruhi lamanya studi</h3></header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			 	<div id="barchart_material" style="width: 900px; height: 500px;"></div>
			 	<br>
			 	<div align="center"><img src="../img/index.png"></div>
			 	<br>
			 	<table class="table">
			 		<tr>
			 			<td></td>
			 			<td>Total Responden S1</td>
			 			<td>Total Responden S2</td>
			 		</tr>
			 		<tr>
			 			<td>Total Responden</td>
			 			<td><?php echo $jml_s1 ?></td>
			 			<td><?php echo $jml_s2 ?></td>
			 		</tr>
			 		
			 	</table>
			</div>
		</div>
		</article>
		
<?php } ?>