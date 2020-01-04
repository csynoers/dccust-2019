<?php
	//load model Grafik
	require_once('model_grafik.php');

	// membuat model karir baru dalam variabel $karir
	$grafik= new Grafik();

	// get name of program study
	$program_study= $grafik->get_prodi($_GET['prodi']);

	$prodi= $program_study[0]->prodi;

	$data= $grafik->get_aspek_pembelajaran($_GET['prodi']);

	$count_data= count($data);

	function mean($data,$field){
		$count="";
		foreach ($data as $key => $value) {
			$count += $value->$field;
		}

		$mean= ($count/count($data));

		return round($mean,2);

	}
	// get mean Perkuliahan
	$mean_a1= mean($data,'a1_1');
	// get mean Demonstrasi (peragaan)
	$mean_a2= mean($data,'a1_2');
	// get mean Partisipasi dalam proyek riset
	$mean_a3= mean($data,'a1_3');
	// get mean Magang
	$mean_a4= mean($data,'a1_4');
	// get mean Praktikum/kerja lapangan
	$mean_a5= mean($data,'a1_5');
	// get mean Diskusi
	$mean_a6= mean($data,'a1_6');
	// get mean Penugasan Berbasis Proyek
	$mean_a7= mean($data,'a1_7');

?>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAnnotations);

function drawAnnotations() {
		var data = google.visualization.arrayToDataTable([
		  ['Pembelajaran', 'Mean', {type: 'string', role: 'annotation'}],
		  ['Perkuliahan', <?php echo $mean_a1 ?>, '<?php echo $mean_a1 ?>'],
		  ['Demonstrasi (peragaan)', <?php echo $mean_a2 ?>, '<?php echo $mean_a2 ?>'],
		  ['Partisipasi dalam proyek riset',<?php echo $mean_a3 ?>, '<?php echo $mean_a3 ?>'],
		  ['Magang', <?php echo $mean_a4 ?>, '<?php echo $mean_a4 ?>'],
		  ['Praktikum/kerja lapangan', <?php echo $mean_a5 ?>, '<?php echo $mean_a5 ?>'],
		  ['Diskusi', <?php echo $mean_a6 ?>, '<?php echo $mean_a6 ?>'],
		  ['Penugasan Berbasis Proyek', <?php echo $mean_a7 ?>, '<?php echo $mean_a7 ?>'],
		]);
      var options = {
        title: 'Penekanan Aspek Pembelajaran (Mean)',
        chartArea: {width: '50%'},
        annotations: {
          alwaysOutside: true,
          textStyle: {
            fontSize: 12,
            auraColor: 'none',
            color: '#555'
          },
          boxStyle: {
            stroke: '#ccc',
            strokeWidth: 1,
            gradient: {
              color1: '#f3e5f5',
              color2: '#f3e5f5',
              x1: '0%', y1: '0%',
              x2: '100%', y2: '100%'
            }
          }
        },
        hAxis: {
          title: 'Options',
          minValue: 0,
        },
        vAxis: {
          title: 'Pembelajaran'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      data.sort({ column: 1,desc: true });
      chart.draw(data, options);
    }
</script>
<style type="text/css">
.chart {
  width: 100%; 
  min-height: 450px;
}
</style>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Penekanan Aspek Pembelajaran (Mean) Program Studi <?php echo $program_study[0]->prodi ?></h4>
		</div>
		<div class="panel-body">
		 	<div id="chart_div" class="chart"></div>
		 	<hr>
		 	<div align="center"><img src="../img/index.png"></div>
		 	<br>
		 	<table class="table">
		 		<tr>
		 			<td></td>
		 			<td>Total Responden Program Studi <?php echo $program_study[0]->prodi ?></td>
		 		</tr>
		 		<tr>
		 			<td>Total Responden</td>
		 			<td><?php echo $count_data ?></td>
		 		
		 	</table>
			
		</div>
	</div>
</div>