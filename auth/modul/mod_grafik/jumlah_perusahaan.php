<?php
  //load model Grafik
  require_once('model_grafik.php');

  // membuat model karir baru dalam variabel $karir
  $grafik= new Grafik();

  // get name of program study
  $program_study= $grafik->get_prodi($_GET['prodi']);

  $prodi= $program_study[0]->prodi;

  $data= $grafik->get_jumlah_perusahaan($_GET['prodi']);

  function median($data,$fields){
    $count= count($data);
    $modulus= $count%2;
    $data_push= "";
    foreach ($data as $key => $value) {
      $data_push .= $value->$fields.',';
    }
    
    $remove_last_char_data_push= rtrim($data_push,", ");
    $data_in_array= explode(',',$remove_last_char_data_push);

    // sorting data
    asort($data_in_array);

    if ($modulus > 0) {#data ganjil
      $index_data= count($data)/2;
      $ab= array_values($data_in_array);
      $median= $ab[$index_data];
    }else{#data genap
      $index_data1= (count($data)-1)/2;
      $index_data2= count($data)/2;
      $ab= array_values($data_in_array);
      $median= round((($ab[$index_data1]+$ab[$index_data2])/2),2);
    }
    // $ab= array_values($data_in_array);
    return $median;    
    // return $data_in_array;    
  }

  // echo "<pre>";
  // print_r($data);
  // echo "</pre>";

  // echo "<pre>";
  // print_r(median($data,'b5'));
  // echo "</pre>";
  $b5= median($data,'b5');
  $b6= median($data,'b6');
  $b7= median($data,'b7');

?>

<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Jurusan', 'Perusahaan yang dilamar', 'Perusahaan yang merespon lamaran', 'Perusahaan yang mengundang wawancara'],
      ['<?php echo "$prodi" ?>', <?php echo $b5 ?>, <?php echo $b6 ?>, <?php echo $b7 ?>],
    ]);

    console.log(data);
    var options = {
      chart: {
        title: 'Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara',
        subtitle: 'Program Studi <?php echo $prodi ?>',
      },

    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

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
      <h4>Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara Program Studi <?php echo $prodi ?></h4>
    </div>
    <div class="panel-body">
      
      <div id="columnchart_material" class="chart"></div>
      <hr>
      <table class="table">
        <tr>
          <td></td>
          <td>Total Responden Program Studi <?php echo $prodi ?></td>
        </tr>
        <tr>
          <td>Total Responden</td>
          <td><?php echo count($data)  ?></td>
        </tr>
        
      </table>
    </div>
  </div>
</div>