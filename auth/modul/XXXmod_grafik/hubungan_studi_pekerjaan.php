<?php
    //load model Grafik
    require_once('model_grafik.php');

    // inisialisasi class model
    $grafik= new Grafik();

    // get name of program study
    $program_study= $grafik->get_prodi($_GET['prodi']);

    $prodi= $program_study[0]->prodi;

    $data= $grafik->get_hubungan_studi_pekerjaan($_GET['prodi']);
?>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Percentage", { role: "style" } ],
        ["1", 8.94, "#b5eecb"],
        ["2", 10.49, "#9e8fde"],
        ["3", 19.30, "#fdda16"],
        ["4", 21.45, "color: #54575a"],
        ["5", 21.45, "color: #8a9ea1"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Hubungan bidang studi dengan pekerjaan",
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
			<h4>Hubungan antara bidang studi dengan pekerjaan Program Studi <?php echo $prodi ?></h4>
		</div>
		<div class="panel-body">
	        <div id="columnchart_values"></div>
	        <center><span><h4>1= Tidak sama sekali s/d 5= Sangat erat</h4></span></center>
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