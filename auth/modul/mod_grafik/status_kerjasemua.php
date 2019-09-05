<?php
  //load model Grafik
  require_once('model_grafik.php');

  // inisialisasi class model
  $grafik= new Grafik();

  // get name of program study
  $program_study= $grafik->get_prodi($_GET['prodi']);

  $prodi= $program_study[0]->prodi;

  $data= $grafik->get_status_kerja($_GET['prodi']);

  function persen($data,$option){
    $count="";
    foreach ($data as $key => $value) {
      $value->c1==$option? $count_add= 1 : $count_add= 0; 
      $count += $count_add;
    }
    $persen= ($count/count($data))*100;
    return round($persen,2);
    // return $count;
  }

  function jumlah($data,$option){
    $count="";
    foreach ($data as $key => $value) {
      $value->c1==$option? $count_add= 1 : $count_add= 0; 
      $count += $count_add;
    }

    return $count;
  }

  $c11= persen($data,'c11');
  $c12= persen($data,'c12');

  $count_c11= jumlah($data,'c11');
  $count_c12= jumlah($data,'c12');
  // echo "<pre>";
  // print_r($data); 
  // echo "</pre>"; 
?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Status Kerja Program Studi <?php echo $prodi ?>'],
          ['Bekerja',     <?php echo $c11 ?>],
          ['Tidak Bekerja',<?php echo $c12 ?>]
        ]);

        var options = {
          title: 'Status Kerja Saat Ini Program Studi <?php echo $prodi ?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

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
      <h4>Status Kerja Saat Ini Program Studi <?php echo $prodi ?></h4>
    </div>
    <div class="panel-body">
      <div id="piechart" class="chart"></div>
      <br>
      <!-- <div align="center"><img src="../img/index.png"></div> -->
      <br>
      <table class="table">
        <tr>
          <td></td>
          <td>Total Responden Program Studi <?php echo $prodi ?></td>
          <td>Status Bekerja</td>
          <td>Tidak Bekerja</td>
        </tr>
        <tr>
          <td>Total Responden</td>
          <td><?php echo count($data)  ?></td>
          <td><?php echo $count_c11  ?></td>
          <td><?php echo $count_c12  ?></td>

        </tr>
        
      </table>
      
    </div>
  </div>
</div>