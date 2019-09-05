<?php
	//load model Grafik
	require_once('model_grafik.php');

	// membuat model grafik baru dalam variabel $grafik
	$grafik= new Grafik();

		$s1 = mysql_query("SELECT * FROM
						    `tb_a`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1' ");
		$jml_s1 = mysql_num_rows($s1);
		$s2 = mysql_query("SELECT * FROM
						    `tb_a`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2' ");
		$jml_s2 = mysql_num_rows($s2);

		$jml_semua = $jml_s1+$jml_s2;
		

		$perempuan_s1 = mysql_query("SELECT * FROM
						    `tb_a`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1' AND tb_a.a2 = 'Perempuan'");
		$perempuan_jml_s1 = mysql_num_rows($perempuan_s1);
		$perempuan_s2 = mysql_query("SELECT * FROM
						    `tb_a`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2' AND tb_a.a2 = 'Perempuan'");
		$perempuan_jml_s2 = mysql_num_rows($perempuan_s2);

		$laki_s1 = mysql_query("SELECT * FROM
						    `tb_a`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1' AND tb_a.a2 = 'Laki-laki'");
		$laki_jml_s1 = mysql_num_rows($laki_s1);
		$laki_s2 = mysql_query("SELECT * FROM
						    `tb_a`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2' AND tb_a.a2 = 'Laki-laki'");
		$laki_jml_s2 = mysql_num_rows($laki_s2);


		$semua_perempuan = mysql_query("SELECT * FROM
						    `tb_a`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE tb_a.a2 = 'Perempuan'");
		$semua_perempuan_jml = mysql_num_rows($semua_perempuan);
		$semua_laki_laki = mysql_query("SELECT * FROM
						    `tb_a`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE tb_a.a2 = 'Laki-laki'");
		$semua_laki_laki_jml = mysql_num_rows($semua_laki_laki);



		$persens1 = ($perempuan_jml_s1/$jml_s1)*100;
		$persens2 = ($perempuan_jml_s2/$jml_s2)*100;

		$persens_laki_1 = ($laki_jml_s1/$jml_s1)*100;
		$persens_laki_2 = ($laki_jml_s2/$jml_s2)*100;

		$persen_semua_laki = ($semua_laki_laki_jml/$jml_semua)*100;
		$persen_semua_perempuan = ($semua_perempuan_jml/$jml_semua)*100;
				
?>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        // ["Perempuan", <?php echo round($persens1,2); ?>, "color: #2365D8"],
        // ["Laki-Laki", <?php echo round($persens2,2); ?>, "#b87333"]
		["Perempuan", <?php echo '20' ?>, "color: #2365D8"],
        ["Laki-Laki", <?php echo '40' ?>, "#b87333"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Proporsi Responden (%)",
        width: 900,
        height: 400,
        bar: {groupWidth: "90%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }

</script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChartlaki);
    function drawChartlaki() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["S1", <?php echo round($persens_laki_1,2); ?>, "color: #2365D8"],
        ["S2", <?php echo round($persens_laki_2,2); ?>, "#b87333"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Proporsi Responden Laki-laki (%)",
        width: 900,
        height: 400,
        bar: {groupWidth: "90%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values_laki"));
      chart.draw(view, options);
  }

</script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Jenis kelamin'],
          ['Laki-laki',     <?php echo '10' ?>],
          ['Perempuan',      <?php echo '20' ?>]
        ]);

        var options = {
          title: 'Jenis Kelamin'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Proporsi Responden (%)</h4>
		</div>
		 	<div id="columnchart_values" style="width: 900px; height: auto;"></div>
		 	<!-- <div id="columnchart_values_laki" style="width: 900px; height: auto;"></div> -->
		 	<div id="piechart" style="width: 900px; height: 500px;"></div>
			
		 	<table class="table">
		 		<tr>
		 			<td>Perempuan</td>
		 			<td>Total Responden S1</td>
		 			<td>Total Responden S2</td>
		 		</tr>
		 		<tr>
		 			<td>Total Responden</td>
		 			<td><?php echo $jml_s1 ?></td>
		 			<td><?php echo $jml_s2 ?></td>
		 		</tr>
		 		<tr>
		 			<td>Total Responden Perempuan</td>
		 			<td><?php echo $perempuan_jml_s1 ?></td>
		 			<td><?php echo $perempuan_jml_s2 ?></td>
		 		</tr>
		 		<tr>
		 			<td>Total Responden Perempuan (%)</td>
		 			<td><?php echo round($persens1,2)."%"; ?></td>
		 			<td><?php echo round($persens2,2)."%"; ?></td>
		 		</tr>
		 	</table>
		 	<table class="table">
		 		<tr>
		 			<td>Laki-laki</td>
		 			<td>Total Responden S1</td>
		 			<td>Total Responden S2</td>
		 		</tr>
		 		<tr>
		 			<td>Total Responden</td>
		 			<td><?php echo $jml_s1 ?></td>
		 			<td><?php echo $jml_s2 ?></td>
		 		</tr>
		 		<tr>
		 			<td>Total Responden Laki-laki</td>
		 			<td><?php echo $laki_jml_s1 ?></td>
		 			<td><?php echo $laki_jml_s2 ?></td>
		 		</tr>
		 		<tr>
		 			<td>Total Responden Laki-laki (%)</td>
		 			<td><?php echo round($persens_laki_1,2)."%"; ?></td>
		 			<td><?php echo round($persens_laki_2,2)."%"; ?></td>
		 		</tr>
		 	</table>
		</div>
	</div>
</div>