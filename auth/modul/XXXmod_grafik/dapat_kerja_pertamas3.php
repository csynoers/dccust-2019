<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>
<?php 
          $s3 = mysql_query("SELECT * FROM
                                  `tb_c`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3' ");
          $jml_s3 = mysql_num_rows($s3);
          

          //S3
          $c91s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c91' AND alumni_daftar.jenjang = 'S3'");
          $jum_c91s3 = mysql_num_rows($c91s3);
          $persen_c91s3 = round(($jum_c91s3/$jml_s3)*100,2);
          $c92s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c92' AND alumni_daftar.jenjang = 'S3'");
          $jum_c92s3 = mysql_num_rows($c92s3);
          $persen_c92s3 = round(($jum_c92s3/$jml_s3)*100,2);
          $c93s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c93' AND alumni_daftar.jenjang = 'S3'");
          $jum_c93s3 = mysql_num_rows($c93s3);
          $persen_c93s3 = round(($jum_c93s3/$jml_s3)*100,2);
          $c94s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c94' AND alumni_daftar.jenjang = 'S3'");
          $jum_c94s3 = mysql_num_rows($c94s3);
          $persen_c94s3 = round(($jum_c94s3/$jml_s3)*100,2);
          $c95s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c95' AND alumni_daftar.jenjang = 'S3'");
          $jum_c95s3 = mysql_num_rows($c95s3);
          $persen_c95s3 = round(($jum_c95s3/$jml_s3)*100,2);
          $c96s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c96' AND alumni_daftar.jenjang = 'S3'");
          $jum_c96s3 = mysql_num_rows($c96s3);
          $persen_c96s3 = round(($jum_c96s3/$jml_s3)*100,2);
          $c97s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c97' AND alumni_daftar.jenjang = 'S3'");
          $jum_c97s3 = mysql_num_rows($c97s3);
          $persen_c97s3 = round(($jum_c97s3/$jml_s3)*100,2);
          $c98s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c98' AND alumni_daftar.jenjang = 'S3'");
          $jum_c98s3 = mysql_num_rows($c98s3);
          $persen_c98s3 = round(($jum_c98s3/$jml_s3)*100,2);
          $c99s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c99' AND alumni_daftar.jenjang = 'S3'");
          $jum_c99s3 = mysql_num_rows($c99s3);
          $persen_c99s3 = round(($jum_c99s3/$jml_s3)*100,2);
          $c910s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c910' AND alumni_daftar.jenjang = 'S3'");
          $jum_c901s3 = mysql_num_rows($c910s3);
          $persen_c910s3 = round(($jum_c910s3/$jml_s3)*100,2);
          $c911s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c911' AND alumni_daftar.jenjang = 'S3'");
          $jum_c911s3 = mysql_num_rows($c911s3);
          $persen_c911s3 = round(($jum_c911s3/$jml_s3)*100,2);
          $c912s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c912' AND alumni_daftar.jenjang = 'S3'");
          $jum_c912s3 = mysql_num_rows($c912s3);
          $persen_c912s3 = round(($jum_c912s3/$jml_s3)*100,2);
          $c913s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c913' AND alumni_daftar.jenjang = 'S3'");
          $jum_c913s3 = mysql_num_rows($c913s3);
          $persen_c913s3 = round(($jum_c913s3/$jml_s3)*100,2);
          $c914s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c914' AND alumni_daftar.jenjang = 'S3'");
          $jum_c914s3 = mysql_num_rows($c914s3);
          $persen_c914s3 = round(($jum_c914s3/$jml_s3)*100,2);
          $c915s3 = mysql_query("SELECT *
                    FROM
                        `jogjaval_fountain`.`alumni_daftar`
                        INNER JOIN `jogjaval_fountain`.`tb_c` 
                            ON (`alumni_daftar`.`id_alumni` = `tb_c`.`id_alumni`) WHERE tb_c.`c9` = 'c915' AND alumni_daftar.jenjang = 'S3'");
          $jum_c915s3 = mysql_num_rows($c915s3);
          $persen_c915s3 = round(($jum_c915s3/$jml_s3)*100,2);
?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Cara Memperoleh Pekerjaan Pertama S3', 'S3'],
          ['Melalui iklan di koran/majalah, brosur', <?php echo $persen_c91s3 ?>],
          ['Melamar melalui perusahaan tanpa mengetahui lowongan yang ada', <?php echo $persen_c92s3 ?>],
          ['Pergi ke bursa/pameran kerja', <?php echo $persen_c93s3 ?>],
          ['Mencari lewat internet/iklan online/milis', <?php echo $persen_c94s3 ?>],
          ['Dihubungi oleh perusahaan', <?php echo $persen_c95s3 ?>],
          ['Menghubungi Kemnakertrans', <?php echo $persen_c96s3 ?>],
          ['Menghubungi agen tenaga kerja komersial/swasta', <?php echo $persen_c97s3 ?>],
          ['Memperoleh informasi dari pusat/kantor pengembang karir fakultas/universitas', <?php echo $persen_c98s3 ?>],
          ['Menghubungi kantor kemahaiswaan/hubungan alumni', <?php echo $persen_c99s3 ?>],
          ['Membangun network sejak masih kuliah', <?php echo $persen_c910s3 ?>],
          ['Melalui relasi (misalnya dosen, orangtua, saudara, teman, dll)', <?php echo $persen_c911s3 ?>],
          ['Membangun bisnis sendiri', <?php echo $persen_c912s3 ?>],
          ['Melalui penempatan kerja atau magang', <?php echo $persen_c913s3 ?>],
          ['Bekerja di tempat yang sama dengan tempat kerja semasa kuliah', <?php echo $persen_c914s3 ?>],
          ['Lainnya', <?php echo $persen_c915s3 ?>]
        ]);

        var options = {
          title: 'Cara Memperoleh Pekerjaan Pertama S3',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Cara Memperoleh Pekerjaan Pertama S3',
                   subtitle: 'Cara Memperoleh Pekerjaan Pertama S3' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'S3'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
<style>.ui-widget-header{background:none;border:none;}</style>
		<article class="module width_full">
			<header><h3 class="tabs_involved">Cara Memperoleh Pekerjaan Pertama S3 (%)</h3></header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			 	<div id="top_x_div" style="width: 900px; height: 500px;"></div>
			 	<br>
			 	<!-- <div align="center"><img src="../img/index.png"></div> -->
			 	<br>
			 	<table class="table">
			 		<tr>
			 			<td></td>
			 			<td>Total Responden S3</td>
			 		</tr>
			 		<tr>
			 			<td>Total Responden</td>
			 			<td><?php echo $jml_s3  ?></td>
			 		</tr>
			 		
			 	</table>
			</div>
		</div>
		</article>
		
<?php } ?>