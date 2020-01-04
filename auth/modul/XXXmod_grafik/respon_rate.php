<?php
	// load model dbhelper
	// require_once "../josys/dbHelper.php";

	//load model Grafik
	require_once('model_grafik.php');

	// membuat model karir baru dalam variabel $karir
	$grafik= new Grafik();

	// get data fakultas
	$fakultas= $grafik->get_data_fakultas();

	// $count= array('10','20','30');
	// $count_add="";
	// foreach ($count as $key => $value) {
	// 	$count_add += $value;
	// }
	// echo "$count_add";
	// $count_fakultas= $grafik->count_all_prodi_in_fakultas('247');
	// var_dump($count_fakultas);

	$tahun=date('Y');
	$tahun2 = $tahun-2;
	$tahun1 = $tahun-1;
	$tahunts = $tahun2."-".$tahun1;
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Respone Rate TSUST <?php echo $tahun ?></h4>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered table-hover">
			  <tbody>
			    <tr>
			      <td align="center" rowspan="2">Fakultas</td>
			    </tr>
			     <tr>
			      <td align="center">TSUST <?php echo $tahun ?></td>
			    </tr>

			    <?php 
			    foreach ($fakultas as $key => $value) {
			    	echo "
				    <tr>
				      <td>$value->fakultas</td>
				      <td align='center'>";
				      	$count_fakultas= $grafik->count_all_prodi_in_fakultas($value->id_fakultas);
				      	$count_fill_quest= $grafik->count_fill_prodi_in_fakultas($value->id_fakultas);
					    $respon_percentage= ($count_fill_quest/$count_fakultas)*100;
					    echo round($respon_percentage,2)."%";
				    echo "
				      </td>
				     
				    </tr>
			    	";
			    }
			    ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>