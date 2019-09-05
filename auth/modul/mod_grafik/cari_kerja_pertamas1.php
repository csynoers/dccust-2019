<?php
  //load model Grafik
  require_once('model_grafik.php');

  // membuat model karir baru dalam variabel $karir
  $grafik= new Grafik();

  // get name of program study
  $program_study= $grafik->get_prodi($_GET['prodi']);

  $prodi= $program_study[0]->prodi;

  // get data mencari pekerjaan
  $data= $grafik->get_mencari_pekerjaan($_GET['prodi']);

  function persen($data,$kunci){
    $count="";
    foreach ($data as $key => $value) {
       $explode       = explode('+', $value->b3);
       $count_explode = count($explode);

       if (count($count_explode)>1) {
          $b3      = explode('-', $explode[0]);
          $b3lain  = $explode[1];
          in_array($kunci,$b3)? $count_add = 2 : $count_add = 1 ;

       }else{
          $b3      = explode('-', $explode[0]);
          in_array($kunci,$b3)? $count_add = 1 : $count_add = 0 ;

       }

       $count += $count_add;
    }

    $get_persen= ($count/count($data))*100;

    return round($get_persen,2);
  }

  $b31= persen($data,'b31');
  $b32= persen($data,'b32');
  $b33= persen($data,'b33');
  $b34= persen($data,'b34');
  $b35= persen($data,'b35');
  $b36= persen($data,'b36');
  $b37= persen($data,'b37');
  $b38= persen($data,'b38');
  $b39= persen($data,'b39');
  $b310= persen($data,'b310');
  $b311= persen($data,'b311');
  $b312= persen($data,'b312');
  $b313= persen($data,'b313');
  $b314= persen($data,'b314');
  $b315= persen($data,'b315');

?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Cara Mencari Pekerjaan Pertama', 'Program Studi '+'<?php echo $prodi ?>'],
          ['Melalui iklan di koran/majalah, brosur', '<?php echo $b31 ?>'],
          ['Melamar ke perusahaan tanpa mengetahui lowongan yang ada', '<?php echo $b32 ?>'],
          ['Pergi ke bursa/pameran kerja', '<?php echo $b33 ?>'],
          ['Mencari lewat internet/iklan online/milis', '<?php echo $b34 ?>'],
          ['Dihubungi oleh perusahaan', '<?php echo $b35 ?>'],
          ['Menghubungi Kemnakertrans', '<?php echo $b36 ?>'],
          ['Menghubungi agen tenaga kerja komersial/swasta', '<?php echo $b37 ?>'],
          ['Mendapatkan informasi dari pusat/kantor pengembang karir fakultas/universitas', '<?php echo $b38 ?>'],
          ['Menghubungi kantor kemahasiswaan/hubungan alumni', '<?php echo $b39 ?>'],
          ['Membangun network sejak masih kuliah', '<?php echo $b310 ?>'],
          ['Melalui relasi (misalnya dosen, orangtua, saudara, teman, dll)', '<?php echo $b311 ?>'],
          ['Membangun bisnis sendiri', '<?php echo $b312 ?>'],
          ['Melalui penempatan kerja atau magang', '<?php echo $b313 ?>'],
          ['Bekerja di tempat yang sama dengan tempat kerja semasa kuliah', '<?php echo $b314 ?>'],
          ['Lainnya', '<?php echo $b315 ?>'],
        ]);

        var options = {
          title: 'Cara Mencari Pekerjaan Pertama',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Cara Mencari Pekerjaan Pertama',
                   subtitle: 'Program Studi '+ '<?php echo $prodi ?>' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: '%'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" },
          // hAxis.direction: 1,
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        data.sort({ column: 1 });
        chart.draw(data, options);
      };
    </script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAnnotations);

function drawAnnotations() {
       var data = google.visualization.arrayToDataTable([
          ['Element', 'Percentage', {type: 'string', role: 'annotation'}, {type: 'string', role: 'annotation'}],
          ['Melalui iklan di koran/majalah, brosur', <?php echo $b31 ?>, '<?php echo $b31 ?>', '%'],
          ['Melamar ke perusahaan tanpa mengetahui lowongan yang ada', <?php echo $b32 ?>, '<?php echo $b32 ?>', '%'],
          ['Pergi ke bursa/pameran kerja', <?php echo $b33 ?>, '<?php echo $b33 ?>', '%'],
          ['Mencari lewat internet/iklan online/milis', <?php echo $b34 ?>, '<?php echo $b34 ?>', '%'],
          ['Dihubungi oleh perusahaan', <?php echo $b35 ?>, '<?php echo $b35 ?>', '%'],
          ['Menghubungi Kemnakertrans', <?php echo $b36 ?>, '<?php echo $b36 ?>', '%'],
          ['Menghubungi agen tenaga kerja komersial/swasta', <?php echo $b37 ?>, '<?php echo $b37 ?>', '%'],
          ['Mendapatkan informasi dari pusat/kantor pengembang karir fakultas/universitas', <?php echo $b38 ?>, '<?php echo $b38 ?>', '%'],
          ['Menghubungi kantor kemahasiswaan/hubungan alumni', <?php echo $b39 ?>, '<?php echo $b39 ?>', '%'],
          ['Membangun network sejak masih kuliah', <?php echo $b310 ?>, '<?php echo $b310 ?>', '%'],
          ['Melalui relasi (misalnya dosen, orangtua, saudara, teman, dll)', <?php echo $b311 ?>, '<?php echo $b311 ?>', '%'],
          ['Membangun bisnis sendiri', <?php echo $b312 ?>, '<?php echo $b312 ?>', '%'],
          ['Melalui penempatan kerja atau magang', <?php echo $b313 ?>, '<?php echo $b313 ?>', '%'],
          ['Bekerja di tempat yang sama dengan tempat kerja semasa kuliah', <?php echo $b314 ?>, '<?php echo $b314 ?>', '%'],
          ['Lainnya', <?php echo $b315 ?>, '<?php echo $b315 ?>', '%'],
      ]);
      var options = {
        title: 'Cara Mencari Pekerjaan Pertama',
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
        // hAxis: {
        //   title: 'Total Population',
        //   minValue: 0,
        // },
        vAxis: {
          title: 'Cara Mencari Pekerjaan Pertama'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
</script>
<style type="text/css">
.chart {
  width: 100%; 
  min-height: 800px;
}
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4>Cara Mencari Pekerjaan Pertama (%) Program Studi <?php echo $prodi ?></h4>
    </div>
    <div class="panel-body">
      <!-- <div id="top_x_div" class="chart"></div> -->
		 	<div id="chart_div" class="chart"></div>
		 	<br>
		 	<!-- <div align="center"><img src="../img/index.png"></div> -->
		 	<br>
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