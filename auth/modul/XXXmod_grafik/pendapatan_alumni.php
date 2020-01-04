<?php
    //load model Grafik
    require_once('model_grafik.php');

    // inisialisasi class model
    $grafik= new Grafik();

    // get name of program study
    $program_study= $grafik->get_prodi($_GET['prodi']);

    $prodi= $program_study[0]->prodi;

    $data= $grafik->get_pendapatan($_GET['prodi']);

    function persen($data,$kunci){
        $count="";
        foreach ($data as $key => $value) {
            $count_add= $value->c7==$kunci? $count_add=1: $count_add=0;
            $count += $count_add;
        }
        $persen= ($count/count($data))*100;

        return round($persen,2);
    }

    $c71= persen($data,'c71');
    $c72= persen($data,'c72');
    $c73= persen($data,'c73');
    $c74= persen($data,'c74');
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
?>
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<script type="text/javascript">
google.charts.load("current", {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Element", "Percentage", { role: "style" } ],
    ["0 - Rp 2.500.000", <?php echo "$c71" ?>, "#b87333"],
    ["Rp 2.500.000 - Rp 5.000.000", <?php echo "$c72" ?>, "silver"],
    ["Rp 5.000.000 - Rp 7.000.000", <?php echo "$c73" ?>, "gold"],
    ['> Rp 7.000.000', <?php echo "$c74" ?>, "color: #e5e4e2"]
  ]);

  var view = new google.visualization.DataView(data);
  view.setColumns([0, 1,
                   { calc: "stringify",
                     sourceColumn: 1,
                     type: "string",
                     role: "annotation" },
                   2]);

  var options = {
    title: "Pendapatan Alumni Dalam Persen(%)",
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
            <h4>Pendapatan Alumni Setiap Bulan Program Studi <?php  echo $prodi ?></h4>
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