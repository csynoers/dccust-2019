<?php
    //load model Grafik
    require_once('model_grafik.php');

    // inisialisasi class model
    $grafik= new Grafik();

    // get name of program study
    $program_study= $grafik->get_prodi($_GET['prodi']);

    $prodi= $program_study[0]->prodi;

    $data= $grafik->get_tingkat_pendidikan($_GET['prodi']);

    function persen($data,$kunci){
    	$count="";
    	foreach ($data as $key => $value) {
    		$value->d2==$kunci? $count_add=1: $count_add=0;
    		$count += $count_add;
    	}
    	$get_persen= ($count/count($data))*100;
    	return round($get_persen,2);
    }

    $d21= persen($data,'1');
    $d22= persen($data,'2');
    $d23= persen($data,'3');
    $d24= persen($data,'4');
?>
<script type="text/javascript">
google.charts.load("current", {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Element", "Percentage", { role: "style" } ],
    ["Setingkat lebih tinggi", <?php echo $d21 ?>, "#b87333"],
    ["Tingkat yang sama", <?php echo $d22 ?>, "silver"],
    ["Setingkat Lebih Rendah", <?php echo $d23 ?>, "gold"],
    ["Tidak perlu pendidikan tinggi", <?php echo $d24 ?>, "color: #e5e4e2"]
  ]);

  var view = new google.visualization.DataView(data);
  view.setColumns([0, 1,
                   { calc: "stringify",
                     sourceColumn: 1,
                     type: "string",
                     role: "annotation" },
                   2]);

  var options = {
    title: "Tingkat pendidikan yang paling tepat/sesuai untuk pekerjaan saat ini",
    // width: 600,
    // height: 400,
    bar: {groupWidth: "95%"},
    legend: { position: "none" },
  };
  var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
  chart.draw(view, options);
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
			<h4>Tingkat Pendidikan Yang Paling Sesuai Untuk Pekerjaan Program Studi <?php echo $prodi ?></h4>
		</div>
		<div class="panel-body">
	        <div id="columnchart_values" class="chart"></div>
	        <hr>
	        <table class="table">
	          <tr>
	            <td></td>
	            <td>Total Responden Program Studi <?php echo $prodi ?></td>
	            <!-- <td>Total Responden S2</td> -->
	          </tr>
	          <tr>
	            <td>Total Responden</td>
	            <td><?php echo count($data)  ?></td>
	            <!-- <td><?php echo $jml_s2  ?></td> -->
	          </tr>
	          
	        </table>
			
		</div>
	</div>
</div>