<?php 
	//load model Grafik
	require_once('model_grafik.php');

	// inisialisasi class model
	$grafik= new Grafik();

	// get name of program study
	$program_study= $grafik->get_prodi($_GET['prodi']);

	$prodi= $program_study[0]->prodi;

	$data= $grafik->get_tempat_kerja($_GET['prodi']);

	function persen($data,$kunci){
		$count="";
		foreach ($data as $key => $value) {
	   		if ($kunci=='c4lain') {
	   			(($value->c4=='c41') OR ($value->c4=='c42') OR ($value->c4=='c43') OR ($value->c4=='c44'))? $count_add=0 : $count_add=1;
	   		}else{
	   			$value->c4==$kunci? $count_add=1 : $count_add=0;
	   		}
		   	$count += $count_add; 
		}

		$get_persen= ($count/count($data))*100;

		return round($get_persen,2);
	}

	// echo "<pre>";
	// print_r(persen($data,'c4lain')); 
	// echo "</pre>";
	// echo "<pre>";
	// print_r($data); 
	// echo "</pre>";
	$c41= persen($data,'c41');
	$c42= persen($data,'c42');
	$c43= persen($data,'c43');
	$c44= persen($data,'c44');
	$c45= persen($data,'c4lain');
?>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Jenjang', 'Instansi pemerintah (termasuk BUMN)', 'Organisasi Non Profit/lembaga Swadaya Masyarakat','Perusahaan swasta/instansi', 'Wiraswasta/perusahaan sendiri', 'Lainnya'],
      ['Jenis Perusahaan', <?php echo $c41 ?>, <?php echo $c42 ?>, <?php echo $c43 ?>, <?php echo $c44 ?>, <?php echo $c45 ?>],
    ]);

    var options = {
      chart: {
        title: 'Jenis organisasi tempat bekerja saat ini',
        subtitle: '',
      }
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
			<h4>Jenis organisasi tempat bekerja saat ini Program Studi <?php echo $prodi ?></h4>
		</div>
		<div class="panel-body">
	        <div id="columnchart_material" class="chart"></div>
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