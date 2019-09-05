<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>
    <?php 
    $s2 = mysql_query("SELECT * FROM
                                  `tb_c`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2' ");
    $jml_s2 = mysql_num_rows($s2);

    $c442 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '42' AND alumni_daftar.jenjang = 'S2'");
    $jmlc442 = mysql_num_rows($c442);
    if ($jmlc442>0) {
     while ($dc442 = mysql_fetch_assoc($c442)) {
      $totc442 += $dc442['c4']; 
    }
    $ratc442 = $totc442/$jmlc442;
    }else{
      $ratc442 = 0;
    }

    $c443 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '43' AND alumni_daftar.jenjang = 'S2'");
    $jmlc443 = mysql_num_rows($c443);
    if ($jmlc443>0) {
     while ($dc443 = mysql_fetch_assoc($c443)) {
      $totc443 += $dc443['c4']; 
    }
    $ratc443 = $totc443/$jmlc443;
    }else{
      $ratc443 = 0;
    }
    $c444 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '44' AND alumni_daftar.jenjang = 'S2'");
    $jmlc444 = mysql_num_rows($c444);
    if ($jmlc444>0) {
     while ($dc444 = mysql_fetch_assoc($c444)) {
      $totc444 += $dc444['c4']; 
    }
    $ratc444 = $totc444/$jmlc444;
    }else{
      $ratc444 = 0;
    }
    $c445 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '45' AND alumni_daftar.jenjang = 'S2'");
    $jmlc445 = mysql_num_rows($c445);
    if ($jmlc445>0) {
     while ($dc445 = mysql_fetch_assoc($c445)) {
      $totc445 += $dc445['c4']; 
    }
    $ratc445 = $totc445/$jmlc445;
    }else{
      $ratc445 = 0;
    }

        $c642 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '42' AND alumni_daftar.jenjang = 'S2'");
    $jmlc642 = mysql_num_rows($c642);
    if ($jmlc642>0) {
     while ($dc642 = mysql_fetch_assoc($c642)) {
      $totc642 += $dc642['c6']; 
    }
    $ratc642 = $totc642/$jmlc642;
    }else{
      $ratc642 = 0;
    }

    $c643 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '43' AND alumni_daftar.jenjang = 'S2'");
    $jmlc643 = mysql_num_rows($c643);
    if ($jmlc643>0) {
     while ($dc643 = mysql_fetch_assoc($c643)) {
      $totc643 += $dc643['c6']; 
    }
    $ratc643 = $totc643/$jmlc643;
    }else{
      $ratc643 = 0;
    }
    $c644 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '44' AND alumni_daftar.jenjang = 'S2'");
    $jmlc644 = mysql_num_rows($c644);
    if ($jmlc644>0) {
     while ($dc644 = mysql_fetch_assoc($c644)) {
      $totc644 += $dc644['c6']; 
    }
    $ratc644 = $totc644/$jmlc644;
    }else{
      $ratc644 = 0;
    }
    $c645 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '45' AND alumni_daftar.jenjang = 'S2'");
    $jmlc645 = mysql_num_rows($c645);
    if ($jmlc645>0) {
     while ($dc645 = mysql_fetch_assoc($c645)) {
      $totc645 += $dc645['c6']; 
    }
    $ratc645 = $totc645/$jmlc645;
    }else{
      $ratc645 = 0;
    }

        $c742 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '42' AND alumni_daftar.jenjang = 'S2'");
    $jmlc742 = mysql_num_rows($c742);
    if ($jmlc742>0) {
     while ($dc742 = mysql_fetch_assoc($c742)) {
      $totc742 += $dc742['c7']; 
    }
    $ratc742 = $totc742/$jmlc742;
    }else{
      $ratc742 = 0;
    }

    $c743 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '43' AND alumni_daftar.jenjang = 'S2'");
    $jmlc743 = mysql_num_rows($c743);
    if ($jmlc743>0) {
     while ($dc743 = mysql_fetch_assoc($c743)) {
      $totc743 += $dc743['c7']; 
    }
    $ratc743 = $totc743/$jmlc743;
    }else{
      $ratc743 = 0;
    }
    $c744 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '44' AND alumni_daftar.jenjang = 'S2'");
    $jmlc744 = mysql_num_rows($c744);
    if ($jmlc744>0) {
     while ($dc744 = mysql_fetch_assoc($c744)) {
      $totc744 += $dc744['c7']; 
    }
    $ratc744 = $totc744/$jmlc744;
    }else{
      $ratc744 = 0;
    }
    $c745 = mysql_query("SELECT *
                            FROM
                                `tb_c`
                                INNER JOIN `alumni_daftar` 
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                            WHERE alumni_daftar.prodi = '45' AND alumni_daftar.jenjang = 'S2'");
    $jmlc745 = mysql_num_rows($c745);
    if ($jmlc745>0) {
     while ($dc745 = mysql_fetch_assoc($c745)) {
      $totc745 += $dc745['c7']; 
    }
    $ratc745 = $totc745/$jmlc745;
    }else{
      $ratc745 = 0;
    }

    
  
    ?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Jurusan', 'Perusahaan yang dilamar', 'Perusahaan yang merespon lamaran', 'Perusahaan yang mengundang wawancara'],
          ['Magister Manajemen', <?php echo $ratc442 ?>, <?php echo $ratc642 ?>, <?php echo $ratc742 ?>],
          ['Magister Manajemen Pendidikan', <?php echo $ratc443 ?>, <?php echo $ratc643 ?>, <?php echo $ratc743 ?>],
          ['Magister Penelitian dan Evaluasi Pendidikan', <?php echo $ratc444 ?>, <?php echo $ratc644 ?>, <?php echo $ratc744 ?>],
          ['Magister Pendidikan Bahasa Inggris', <?php echo $ratc445 ?>, <?php echo $ratc645 ?>, <?php echo $ratc745 ?>]
        ]);

        var options = {
          chart: {
            title: 'Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
<style>.ui-widget-header{background:none;border:none;}</style>
		<article class="module width_full">
			<header><h3 class="tabs_involved">Jumlah Perusahaan Yang Dilamar, Merespon, Dan Mengundang Wawancara</h3></header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			 	<div id="columnchart_material" style="width: 100%; height: 500px;"></div>
			 	<br>
			 	<br>
			 	<table class="table">
			 		<tr>
			 			<td></td>
			 			<td>Total Responden S2</td>
  		 		</tr>
			 		<tr>
			 			<td>Total Responden</td>
			 			<td><?php echo $jml_s2  ?></td>
			 		</tr>
			 		
			 	</table>
			</div>
		</div>
		</article>
		
<?php } ?>