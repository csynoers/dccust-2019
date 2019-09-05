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
						    `tb_a`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1' ");
		$jml_s1 = mysql_num_rows($s1);
		$s2 = mysql_query("SELECT * FROM
						    `tb_a`
						    INNER JOIN `alumni_daftar` 
						        ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2' ");
		$jml_s2 = mysql_num_rows($s2);

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
		$persens1 = ($laki_jml_s1/$jml_s1)*100;
		$persens2 = ($laki_jml_s2/$jml_s2)*100;
?>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["S1", <?php echo round($persens1,2); ?>, "color: #2365D8"],
        ["S2", <?php echo round($persens2,2); ?>, "#b87333"]
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
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }

 </script>
<style>.ui-widget-header{background:none;border:none;}</style>
		<article class="module width_full">
			<header><h3 class="tabs_involved">Proporsi Responden Laki-laki (%)</h3></header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			 	<div id="columnchart_values" style="width: 900px; height: auto;"></div>
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
			 		<tr>
			 			<td>Total Responden Laki-laki</td>
			 			<td><?php echo $laki_jml_s1 ?></td>
			 			<td><?php echo $laki_jml_s2 ?></td>
			 		</tr>
			 		<tr>
			 			<td>Total Responden Laki-laki (%)</td>
			 			<td><?php echo round($persens1,2)."%"; ?></td>
			 			<td><?php echo round($persens2,2)."%"; ?></td>
			 		</tr>
			 	</table>
			</div>
		</div>
		</article>
		
<?php } ?>