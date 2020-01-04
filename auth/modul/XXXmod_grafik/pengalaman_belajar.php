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
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1' ");
		$jml_s1 = mysql_num_rows($s1);
		$s2 = mysql_query("SELECT * FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2' ");
		$jml_s2 = mysql_num_rows($s2);
		$s3 = mysql_query("SELECT * FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3' ");
		$jml_s3 = mysql_num_rows($s3);

		//S1

		$b101s1 = mysql_query("SELECT tb_b.b101 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b101s1)>0) {
			while ($data_b101s1 = mysql_fetch_assoc($b101s1)) {
			$jum_b101s1 += $data_b101s1['b101'];
			$mean_b101s1 = round(($jum_b101s1/$jml_s1),2);
			}
		}else{
			$jum_b101s1 = 0;
			$mean_b101s1 = round(($jum_b101s1/$jml_s1),2);
		}
		$b102s1 = mysql_query("SELECT tb_b.b102 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b102s1)>0) {
			while ($data_b102s1 = mysql_fetch_assoc($b102s1)) {
			$jum_b102s1 += $data_b102s1['b102'];
			$mean_b102s1 = round(($jum_b102s1/$jml_s1),2);
			}
		}else{
			$jum_b102s1 = 0;
			$mean_b102s1 = round(($jum_b102s1/$jml_s1),2);
		}
		$b103s1 = mysql_query("SELECT tb_b.b103 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b103s1)>0) {
			while ($data_b103s1 = mysql_fetch_assoc($b103s1)) {
			$jum_b103s1 += $data_b103s1['b103'];
			$mean_b103s1 = round(($jum_b103s1/$jml_s1),2);
			}
		}else{
			$jum_b103s1 = 0;
			$mean_b103s1 = round(($jum_b103s1/$jml_s1),2);
		}
		$b104s1 = mysql_query("SELECT tb_b.b104 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b104s1)>0) {
			while ($data_b104s1 = mysql_fetch_assoc($b104s1)) {
			$jum_b104s1 += $data_b104s1['b104'];
			$mean_b104s1 = round(($jum_b104s1/$jml_s1),2);
			}
		}else{
			$jum_b104s1 = 0;
			$mean_b104s1 = round(($jum_b104s1/$jml_s1),2);
		}
		$b105s1 = mysql_query("SELECT tb_b.b105 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b105s1)>0) {
			while ($data_b105s1 = mysql_fetch_assoc($b105s1)) {
			$jum_b105s1 += $data_b105s1['b105'];
			$mean_b105s1 = round(($jum_b105s1/$jml_s1),2);
			}
		}else{
			$jum_b105s1 = 0;
			$mean_b105s1 = round(($jum_b105s1/$jml_s1),2);
		}
		$b106s1 = mysql_query("SELECT tb_b.b106 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b106s1)>0) {
			while ($data_b106s1 = mysql_fetch_assoc($b106s1)) {
			$jum_b106s1 += $data_b106s1['b106'];
			$mean_b106s1 = round(($jum_b106s1/$jml_s1),2);
			}
		}else{
			$jum_b106s1 = 0;
			$mean_b106s1 = round(($jum_b106s1/$jml_s1),2);
		}
		$b107s1 = mysql_query("SELECT tb_b.b107 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
		if (mysql_num_rows($b107s1)>0) {
			while ($data_b107s1 = mysql_fetch_assoc($b107s1)) {
			$jum_b107s1 += $data_b107s1['b107'];
			$mean_b107s1 = round(($jum_b107s1/$jml_s1),2);
			}
		}else{
			$jum_b107s1 = 0;
			$mean_b107s1 = round(($jum_b107s1/$jml_s1),2);
		}
		

		//S2
		$b101s2 = mysql_query("SELECT tb_b.b101 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b101s2)>0) {
			while ($data_b101s2 = mysql_fetch_assoc($b101s2)) {
			$jum_b101s2 += $data_b101s2['b101'];
			$mean_b101s2 = round(($jum_b101s2/$jml_s2),2);
			}
		}else{
			$jum_b101s2 = 0;
			$mean_b101s2 = round(($jum_b101s2/$jml_s2),2);
		}
		$b102s2 = mysql_query("SELECT tb_b.b102 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b102s2)>0) {
			while ($data_b102s2 = mysql_fetch_assoc($b102s2)) {
			$jum_b102s2 += $data_b102s2['b102'];
			$mean_b102s2 = round(($jum_b102s2/$jml_s2),2);
			}
		}else{
			$jum_b102s2 = 0;
			$mean_b102s2 = round(($jum_b102s2/$jml_s2),2);
		}
		$b103s2 = mysql_query("SELECT tb_b.b103 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b103s2)>0) {
			while ($data_b103s2 = mysql_fetch_assoc($b103s2)) {
			$jum_b103s2 += $data_b103s2['b103'];
			$mean_b103s2 = round(($jum_b103s2/$jml_s2),2);
			}
		}else{
			$jum_b103s2 = 0;
			$mean_b103s2 = round(($jum_b103s2/$jml_s2),2);
		}
		$b104s2 = mysql_query("SELECT tb_b.b104 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b104s2)>0) {
			while ($data_b104s2 = mysql_fetch_assoc($b104s2)) {
			$jum_b104s2 += $data_b104s2['b104'];
			$mean_b104s2 = round(($jum_b104s2/$jml_s2),2);
			}
		}else{
			$jum_b104s2 = 0;
			$mean_b104s2 = round(($jum_b104s2/$jml_s2),2);
		}
		$b105s2 = mysql_query("SELECT tb_b.b105 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b105s2)>0) {
			while ($data_b105s2 = mysql_fetch_assoc($b105s2)) {
			$jum_b105s2 += $data_b105s2['b105'];
			$mean_b105s2 = round(($jum_b105s2/$jml_s2),2);
			}
		}else{
			$jum_b105s2 = 0;
			$mean_b105s2 = round(($jum_b105s2/$jml_s2),2);
		}
		$b106s2 = mysql_query("SELECT tb_b.b106 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b106s2)>0) {
			while ($data_b106s2 = mysql_fetch_assoc($b106s2)) {
			$jum_b106s2 += $data_b106s2['b106'];
			$mean_b106s2 = round(($jum_b106s2/$jml_s2),2);
			}
		}else{
			$jum_b106s2 = 0;
			$mean_b106s2 = round(($jum_b106s2/$jml_s2),2);
		}
		$b107s2 = mysql_query("SELECT tb_b.b107 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
		if (mysql_num_rows($b107s2)>0) {
			while ($data_b107s2 = mysql_fetch_assoc($b107s2)) {
			$jum_b107s2 += $data_b107s2['b107'];
			$mean_b107s2 = round(($jum_b107s2/$jml_s2),2);
			}
		}else{
			$jum_b107s2 = 0;
			$mean_b107s2 = round(($jum_b107s2/$jml_s2),2);
		}

		//S3
		$b101s3 = mysql_query("SELECT tb_b.b101 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
		if (mysql_num_rows($b101s3)>0) {
			while ($data_b101s3 = mysql_fetch_assoc($b101s3)) {
			$jum_b101s3 += $data_b101s3['b101'];
			$mean_b101s3 = round(($jum_b101s3/$jml_s3),2);
			}
		}else{
			$jum_b101s3 = 0;
			$mean_b101s3 = round(($jum_b101s3/$jml_s3),2);
		}
		
		$b102s3 = mysql_query("SELECT tb_b.b102 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
		if (mysql_num_rows($b102s3)>0) {
			while ($data_b102s3 = mysql_fetch_assoc($b102s3)) {
			$jum_b102s3 += $data_b102s3['b102'];
			$mean_b102s3 = round(($jum_b102s3/$jml_s3),2);
			}
		}else{
			$jum_b102s3 = 0;
			$mean_b102s3 = round(($jum_b102s3/$jml_s3),2);
		}
		$b103s3 = mysql_query("SELECT tb_b.b103 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
		if (mysql_num_rows($b103s3)>0) {
			while ($data_b103s3 = mysql_fetch_assoc($b103s3)) {
			$jum_b103s3 += $data_b103s3['b103'];
			$mean_b103s3 = round(($jum_b103s3/$jml_s3),2);
			}
		}else{
			$jum_b103s3 = 0;
			$mean_b103s3 = round(($jum_b103s3/$jml_s3),2);
		}
		$b104s3 = mysql_query("SELECT tb_b.b104 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
		if (mysql_num_rows($b104s3)>0) {
			while ($data_b104s3 = mysql_fetch_assoc($b104s3)) {
			$jum_b104s3 += $data_b104s3['b104'];
			$mean_b104s3 = round(($jum_b104s3/$jml_s3),2);
			}
		}else{
			$jum_b104s3 = 0;
			$mean_b104s3 = round(($jum_b104s3/$jml_s3),2);
		}
		$b105s3 = mysql_query("SELECT tb_b.b105 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
		if (mysql_num_rows($b105s3)>0) {
			while ($data_b105s3 = mysql_fetch_assoc($b105s3)) {
			$jum_b105s3 += $data_b105s3['b105'];
			$mean_b105s3 = round(($jum_b105s3/$jml_s3),2);
			}
		}else{
			$jum_b105s3 = 0;
			$mean_b105s3 = round(($jum_b105s3/$jml_s3),2);
		}
		$b106s3 = mysql_query("SELECT tb_b.b106 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
		if (mysql_num_rows($b106s3)>0) {
			while ($data_b106s3 = mysql_fetch_assoc($b106s3)) {
			$jum_b106s3 += $data_b106s3['b106'];
			$mean_b106s3 = round(($jum_b106s3/$jml_s3),2);
			}
		}else{
			$jum_b106s3 = 0;
			$mean_b106s3 = round(($jum_b106s3/$jml_s3),2);
		}
		$b107s3 = mysql_query("SELECT tb_b.b107 FROM
						    `tb_b`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
		if (mysql_num_rows($b107s3)>0) {
			while ($data_b107s3 = mysql_fetch_assoc($b107s3)) {
			$jum_b107s3 += $data_b107s3['b107'];
			$mean_b107s3 = round(($jum_b107s3/$jml_s3),2);
			}
		}else{
			$jum_b107s3 = 0;
			$mean_b107s3 = round(($jum_b107s3/$jml_s3),2);
		}

?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Penilaian Pengalaman Belajar', 'S1', 'S2', 'S3'],
          ['Pembelajaran di kelas', <?php echo $mean_b101s1 ?>, <?php echo $mean_b101s2 ?>, <?php echo $mean_b101s3 ?>],
          ['Magang/kerja lapangan/praktikum', <?php echo $mean_b102s1 ?>, <?php echo $mean_b102s2 ?>, <?php echo $mean_b102s3 ?>],
          ['Pengabdian dan penjangkauan masyarakat',<?php echo $mean_b103s1 ?>, <?php echo $mean_b103s2 ?>, <?php echo $mean_b103s3 ?>],
          ['Pelaksanaan riset/penulisan skripsi', <?php echo $mean_b104s1 ?>, <?php echo $mean_b104s2 ?>, <?php echo $mean_b104s3 ?>],
          ['Organisasi kemahasiswaan', <?php echo $mean_b105s1 ?>, <?php echo $mean_b105s2 ?>,<?php echo $mean_b105s3 ?>],
          ['Kegiatan ekstrakurikuler', <?php echo $mean_b106s1 ?>,<?php echo $mean_b106s2 ?>, <?php echo $mean_b106s3 ?>],
          ['Rekreasi dan olahraga', <?php echo $mean_b107s1 ?>,<?php echo $mean_b107s2 ?>, <?php echo $mean_b107s3 ?>]
        ]);

        var options = {
          chart: {
            title: 'Penilaian Pengalaman Belajar',
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
			<header><h3 class="tabs_involved">Penilaian Pengalaman Belajar (Mean)</h3></header>
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
			 			<td>Total Responden S3</td>
			 		</tr>
			 		<tr>
			 			<td>Total Responden</td>
			 			<td><?php echo $jml_s1 ?></td>
			 			<td><?php echo $jml_s2 ?></td>
			 			<td><?php echo $jml_s3 ?></td>
			 		</tr>
			 		
			 	</table>
			</div>
		</div>
		</article>
		
<?php } ?>