<?php
// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "
		<link href='style.css' rel='stylesheet' type='text/css'>
 		<center>
 			Untuk mengakses modul, Anda harus login <br>
  			<a href=../../index.php><b>LOGIN</b></a>
  		</center>
  		";
}
else {
	// load model dbhelper
	// include "../josys/dbHelper.php";

	//load model Grafik
	require_once('model_grafik.php');

	// membuat model karir baru dalam variabel $karir
	$grafik= new Grafik();

	//name of program study
	$program_study= $grafik->get_prodi($_GET['prodi']);

	//jumlah populasi target
	$count_populasi_target= count($grafik->count_populasi_target($_GET['prodi']));

	//jumlah responden statik respon TSUST
	$count_responden_status_respon= count($grafik->count_responden_status_respon($_GET['prodi']));

	$tahun=date('Y');
	$tahun2 = $tahun-2;
	$tahun1 = $tahun-1;
	$tahunts = $tahun2."-".$tahun1;

	?>
	<style type="text/css" title="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
	$(document).ready( function () {
	     var oTable = $('#example').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );		
	} );
	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Statik respons TSUST Program Studi <?php echo $program_study[0]->prodi ?> tahun <?php echo $tahun ?></h4>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered table-hover">
			  <tbody>
			    <tr>
			      <td align="center">Kriteria </td>
			      <td colspan="2" align="center">Program Studi <?php echo $program_study[0]->prodi ?></td>
			    </tr>
			    <tr>
			      <td>Jumlah Populasi Target </td>
			      <td colspan="2" align="center"><?php echo $count_populasi_target ?></td>
			    </tr>
			    <tr>
			      <td>Undelivered</td>
			      <td align="center" align="center">0</td>
			      <td align="center">0%</td>
			    </tr>
			    <tr>
			      <td>Subjek</td>
			      <td align="center"><?php echo $count_populasi_target ?></td>
			      <td align="center">100%</td>
			      
			    </tr>
			    <tr>
			      <td>Responden</td>
			      <td align="center" colspan="2"><?php echo $count_responden_status_respon ?></td>
			    </tr>
			    <tr>
			      <td>Grass Respone Rate</td>
			      <td align="center"><?php echo "(".$count_responden_status_respon."/".$count_populasi_target.")*100%" ?></td>
			      <td align="center">
			      <?php
			      $grass_percentage = ($count_responden_status_respon/$count_populasi_target)*100;
			      echo round($grass_percentage,2)."%";
			      ?>
			      </td>
			      
			    </tr>
			    <tr>
			      <td>Nett Respone Rate</td>
			      <td align="center"><?php echo "(".$count_responden_status_respon."/".$count_populasi_target.")*100%" ?></td>
			      <td align="center">
			      <?php
			      $nett_percentage = ($count_responden_status_respon/$count_populasi_target)*100;
			      echo round($nett_percentage,2)."%";
			      ?>
			      </td>
			      
			    </tr>
			  </tbody>
			</table>		
		</div>
	</div>
</div>
		
		<?php
	}
?>