<?php
    //load model Grafik
    require_once('model_grafik.php');

    // membuat model karir baru dalam variabel $karir
    $grafik= new Grafik();

    // get name of program study
    $program_study= $grafik->get_prodi($_GET['prodi']);

    $prodi= $program_study[0]->prodi;

    // count total prodi
    $count_total_prodi= $grafik->count_populasi_target($_GET['prodi']);

    $data= $grafik->get_kompetensi($_GET['prodi']);

    //persentase respon
    $persentase_respon= (count($data)/count($count_total_prodi))*100;

    function mean($data,$quest,$fields){
        $count= "";
        foreach ($data as $key => $value) {
            $fields_in_array= explode('-', $value->$fields);
            $count += $fields_in_array[$quest];
        }

        $mean= ($count/count($data));

        return round($mean,2);
    }

    $chart11=mean($data,'0','e1'); 
    $chart12=mean($data,'1','e1'); 
    $chart13=mean($data,'2','e1'); 
    $chart14=mean($data,'3','e1'); 
    $chart15=mean($data,'4','e1'); 
    $chart16=mean($data,'5','e1'); 
    $chart17=mean($data,'6','e1'); 
    $chart18=mean($data,'7','e1'); 
    $chart19=mean($data,'8','e1'); 
    $chart110=mean($data,'9','e1'); 
    $chart111=mean($data,'10','e1'); 
    $chart112=mean($data,'11','e1'); 
    $chart113=mean($data,'12','e1'); 
    $chart114=mean($data,'13','e1'); 
    $chart115=mean($data,'14','e1'); 
    $chart116=mean($data,'15','e1'); 
    $chart117=mean($data,'16','e1'); 
    $chart118=mean($data,'17','e1'); 
    $chart119=mean($data,'18','e1'); 
    $chart120=mean($data,'19','e1'); 
    $chart121=mean($data,'20','e1'); 
    $chart122=mean($data,'21','e1'); 
    $chart123=mean($data,'22','e1'); 
    $chart124=mean($data,'23','e1'); 
    $chart125=mean($data,'24','e1'); 
    $chart126=mean($data,'25','e1'); 
    $chart127=mean($data,'26','e1');

    $chart21=mean($data,'0','e2'); 
    $chart22=mean($data,'1','e2'); 
    $chart23=mean($data,'2','e2'); 
    $chart24=mean($data,'3','e2'); 
    $chart25=mean($data,'4','e2'); 
    $chart26=mean($data,'5','e2'); 
    $chart27=mean($data,'6','e2'); 
    $chart28=mean($data,'7','e2'); 
    $chart29=mean($data,'8','e2'); 
    $chart210=mean($data,'9','e2'); 
    $chart211=mean($data,'10','e2'); 
    $chart212=mean($data,'11','e2'); 
    $chart213=mean($data,'12','e2'); 
    $chart214=mean($data,'13','e2'); 
    $chart215=mean($data,'14','e2'); 
    $chart216=mean($data,'15','e2'); 
    $chart217=mean($data,'16','e2'); 
    $chart218=mean($data,'17','e2'); 
    $chart219=mean($data,'18','e2'); 
    $chart220=mean($data,'19','e2'); 
    $chart221=mean($data,'20','e2'); 
    $chart222=mean($data,'21','e2'); 
    $chart223=mean($data,'22','e2'); 
    $chart224=mean($data,'23','e2'); 
    $chart225=mean($data,'24','e2'); 
    $chart226=mean($data,'25','e2'); 
    $chart227=mean($data,'26','e2');  
?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Aspek Kompetensi', 'Kompetensi Yang Dikuasai','Kompetensi Yang Diperlukan'],
          ['Pengetahuan di bidang atau disiplin ilmu anda', <?php echo $chart11 ?>, <?php echo $chart21 ?>],
          ['Pengetahuan di luar bidang atau disiplin ilmu anda', <?php echo $chart12 ?>, <?php echo $chart22 ?>],
          ['Pengetahuan umum', <?php echo $chart13 ?>, <?php echo $chart23 ?>],
          ['Keterampilan menggunakan internet', <?php echo $chart14 ?>, <?php echo $chart24 ?>],
          ['Keterampilan mengoperasikan komputer', <?php echo $chart15 ?>, <?php echo $chart25 ?>],
          ['Berpikir kritis', <?php echo $chart16 ?>, <?php echo $chart26 ?>],
          ['Keterampilan melakukan riset', <?php echo $chart17 ?>, <?php echo $chart27 ?>],
          ['Kemampuan beradaptasi', <?php echo $chart18 ?>, <?php echo $chart28 ?>],
          ['Kemampuan belajar', <?php echo $chart19 ?>, <?php echo $chart29 ?>],
          ['Kemampuan berkomunikasi', <?php echo $chart110 ?>, <?php echo $chart210 ?>],
          ['Kemampuan bekerja di bawah tekanan', <?php echo $chart111 ?>, <?php echo $chart211 ?>],
          ['Keterampilan manajemen waktu', <?php echo $chart112 ?>, <?php echo $chart212 ?>],
          ['Keterampilan bekerja secara mandiri', <?php echo $chart113 ?>, <?php echo $chart213 ?>],
          ['Bekerja dalam tim/bekerjasama dengan orang lain', <?php echo $chart114 ?>, <?php echo $chart214 ?>],
          ['Kemampuan dalam memecahkan masalah', <?php echo $chart115 ?>, <?php echo $chart215 ?>],
          ['Keterampilan melakukan negosiasi', <?php echo $chart116 ?>, <?php echo $chart216 ?>],
          ['Kemampuan analisis', <?php echo $chart117 ?>, <?php echo $chart217 ?>],
          ['Sikap toleransi', <?php echo $chart118 ?>, <?php echo $chart218 ?>],
          ['Loyalitas dan integritas', <?php echo $chart119 ?>, <?php echo $chart219 ?>],
          ['Bekerja dengan orang yang berbeda budaya maupun latar belakang', <?php echo $chart120 ?>, <?php echo $chart220 ?>],
          ['Kepemimpinan', <?php echo $chart121 ?>, <?php echo $chart221 ?>],
          ['Kemampuan dalam memegang tanggungjawab', <?php echo $chart122 ?>, <?php echo $chart222 ?>],
          ['Kemampuan berinisiasi/Inisiatif', <?php echo $chart123 ?>, <?php echo $chart223 ?>],
          ['Kemampuan mengembangkan manajemen proyek/program', <?php echo $chart124 ?>, <?php echo $chart224 ?>],
          ['Kemampuan untuk mempresentasikan ide/produk/laporan', <?php echo $chart125 ?>, <?php echo $chart225 ?>],
          ['Kemampuan dalam menulis laporan, memo dan dokumen', <?php echo $chart126 ?>, <?php echo $chart226 ?>],
          ['Kemampuan untuk terus belajar sepanjang hayat', <?php echo $chart127 ?>, <?php echo $chart227 ?>],
        ]);


        var options = {
          title: 'Kompetensi',
          hAxis: {title: 'Mean Rata-Rata',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 1,maxValue:5,title:'Kompetensi'},
          orientation: 'horizontal',
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        data.sort({ column: 0 });
        chart.draw(data, options);
      }
</script>
<style type="text/css">
.chart {
  width: 100%; 
  min-height: 700px;
}
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>Program Studi <?php echo $program_study[0]->prodi ?> </h4>
        </div>    
        <div class="panel-body">
            <div id="chart_div" class="chart"></div>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <tr class="info">
                        <th></th>
                        <th>Program Studi <?php echo $program_study[0]->prodi ?></th>
                        <th>Persentase Respon</th>
                    </tr>
                    <tr class="info">
                        <td>Total Responden Kompetensi</td>
                        <td><?php echo count($data) ?></td>
                        <td><?php echo round($persentase_respon,2) ?> %</td>
                    </tr>
                </table>
            </div>
            
        </div>
    </div>
</div>