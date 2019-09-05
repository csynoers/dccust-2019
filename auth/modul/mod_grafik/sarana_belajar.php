<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>
<?php 
          $s1 = mysql_query("SELECT * FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1' ");
          $jml_s1 = mysql_num_rows($s1);
          $s2 = mysql_query("SELECT * FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2' ");
          $jml_s2 = mysql_num_rows($s2);
          $s3 = mysql_query("SELECT * FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3' ");
          $jml_s3 = mysql_num_rows($s3);

          //S1

          $b91s1 = mysql_query("SELECT tb_b.b91 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
          if (mysql_num_rows($b91s1)>0) {
               while ($data_b91s1 = mysql_fetch_assoc($b91s1)) {
               $jum_b91s1 += $data_b91s1['b91'];
               $mean_b91s1 = round(($jum_b91s1/$jml_s1),2);
               }
          }else{
               $jum_b91s1 = 0;
               $mean_b91s1 = round(($jum_b91s1/$jml_s1),2);
          }
          $b92s1 = mysql_query("SELECT tb_b.b92 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
          if (mysql_num_rows($b92s1)>0) {
               while ($data_b92s1 = mysql_fetch_assoc($b92s1)) {
               $jum_b92s1 += $data_b92s1['b92'];
               $mean_b92s1 = round(($jum_b92s1/$jml_s1),2);
               }
          }else{
               $jum_b92s1 = 0;
               $mean_b92s1 = round(($jum_b92s1/$jml_s1),2);
          }
          $b93s1 = mysql_query("SELECT tb_b.b93 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
          if (mysql_num_rows($b93s1)>0) {
               while ($data_b93s1 = mysql_fetch_assoc($b93s1)) {
               $jum_b93s1 += $data_b93s1['b93'];
               $mean_b93s1 = round(($jum_b93s1/$jml_s1),2);
               }
          }else{
               $jum_b93s1 = 0;
               $mean_b93s1 = round(($jum_b93s1/$jml_s1),2);
          }
          $b94s1 = mysql_query("SELECT tb_b.b94 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
          if (mysql_num_rows($b94s1)>0) {
               while ($data_b94s1 = mysql_fetch_assoc($b94s1)) {
               $jum_b94s1 += $data_b94s1['b94'];
               $mean_b94s1 = round(($jum_b94s1/$jml_s1),2);
               }
          }else{
               $jum_b94s1 = 0;
               $mean_b94s1 = round(($jum_b94s1/$jml_s1),2);
          }
          $b95s1 = mysql_query("SELECT tb_b.b95 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
          if (mysql_num_rows($b95s1)>0) {
               while ($data_b95s1 = mysql_fetch_assoc($b95s1)) {
               $jum_b95s1 += $data_b95s1['b95'];
               $mean_b95s1 = round(($jum_b95s1/$jml_s1),2);
               }
          }else{
               $jum_b95s1 = 0;
               $mean_b95s1 = round(($jum_b95s1/$jml_s1),2);
          }
          $b96s1 = mysql_query("SELECT tb_b.b96 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
          if (mysql_num_rows($b96s1)>0) {
               while ($data_b96s1 = mysql_fetch_assoc($b96s1)) {
               $jum_b96s1 += $data_b96s1['b96'];
               $mean_b96s1 = round(($jum_b96s1/$jml_s1),2);
               }
          }else{
               $jum_b96s1 = 0;
               $mean_b96s1 = round(($jum_b96s1/$jml_s1),2);
          }
          $b97s1 = mysql_query("SELECT tb_b.b97 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
          if (mysql_num_rows($b97s1)>0) {
               while ($data_b97s1 = mysql_fetch_assoc($b97s1)) {
               $jum_b97s1 += $data_b97s1['b97'];
               $mean_b97s1 = round(($jum_b97s1/$jml_s1),2);
               }
          }else{
               $jum_b97s1 = 0;
               $mean_b97s1 = round(($jum_b97s1/$jml_s1),2);
          }
          
          $b98s1 = mysql_query("SELECT tb_b.b98 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
          if (mysql_num_rows($b98s1)>0) {
               while ($data_b98s1 = mysql_fetch_assoc($b98s1)) {
               $jum_b98s1 += $data_b98s1['b98'];
               $mean_b98s1 = round(($jum_b98s1/$jml_s1),2);
               }
          }else{
               $jum_b98s1 = 0;
               $mean_b98s1 = round(($jum_b98s1/$jml_s1),2);
          }
          $b99s1 = mysql_query("SELECT tb_b.b99 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
          if (mysql_num_rows($b99s1)>0) {
               while ($data_b99s1 = mysql_fetch_assoc($b99s1)) {
               $jum_b99s1 += $data_b99s1['b99'];
               $mean_b99s1 = round(($jum_b99s1/$jml_s1),2);
               }
          }else{
               $jum_b99s1 = 0;
               $mean_b99s1 = round(($jum_b99s1/$jml_s1),2);
          }
          $b910s1 = mysql_query("SELECT tb_b.b910 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
          if (mysql_num_rows($b910s1)>0) {
               while ($data_b910s1 = mysql_fetch_assoc($b910s1)) {
               $jum_b910s1 += $data_b910s1['b910'];
               $mean_b910s1 = round(($jum_b910s1/$jml_s1),2);
               }
          }else{
               $jum_b910s1 = 0;
               $mean_b910s1 = round(($jum_b910s1/$jml_s1),2);
          }
          $b911s1 = mysql_query("SELECT tb_b.b911 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S1'");
          if (mysql_num_rows($b911s1)>0) {
               while ($data_b911s1 = mysql_fetch_assoc($b911s1)) {
               $jum_b911s1 += $data_b911s1['b911'];
               $mean_b911s1 = round(($jum_b911s1/$jml_s1),2);
               }
          }else{
               $jum_b911s1 = 0;
               $mean_b911s1 = round(($jum_b911s1/$jml_s1),2);
          }
          

          //S2
          $b91s2 = mysql_query("SELECT tb_b.b91 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
          if (mysql_num_rows($b91s2)>0) {
               while ($data_b91s2 = mysql_fetch_assoc($b91s2)) {
               $jum_b91s2 += $data_b91s2['b91'];
               $mean_b91s2 = round(($jum_b91s2/$jml_s2),2);
               }
          }else{
               $jum_b91s2 = 0;
               $mean_b91s2 = round(($jum_b91s2/$jml_s2),2);
          }
          $b92s2 = mysql_query("SELECT tb_b.b92 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
          if (mysql_num_rows($b92s2)>0) {
               while ($data_b92s2 = mysql_fetch_assoc($b92s2)) {
               $jum_b92s2 += $data_b92s2['b92'];
               $mean_b92s2 = round(($jum_b92s2/$jml_s2),2);
               }
          }else{
               $jum_b92s2 = 0;
               $mean_b92s2 = round(($jum_b92s2/$jml_s2),2);
          }
          $b93s2 = mysql_query("SELECT tb_b.b93 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
          if (mysql_num_rows($b93s2)>0) {
               while ($data_b93s2 = mysql_fetch_assoc($b93s2)) {
               $jum_b93s2 += $data_b93s2['b93'];
               $mean_b93s2 = round(($jum_b93s2/$jml_s2),2);
               }
          }else{
               $jum_b93s2 = 0;
               $mean_b93s2 = round(($jum_b93s2/$jml_s2),2);
          }
          $b94s2 = mysql_query("SELECT tb_b.b94 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
          if (mysql_num_rows($b94s2)>0) {
               while ($data_b94s2 = mysql_fetch_assoc($b94s2)) {
               $jum_b94s2 += $data_b94s2['b94'];
               $mean_b94s2 = round(($jum_b94s2/$jml_s2),2);
               }
          }else{
               $jum_b94s2 = 0;
               $mean_b94s2 = round(($jum_b94s2/$jml_s2),2);
          }
          $b95s2 = mysql_query("SELECT tb_b.b95 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
          if (mysql_num_rows($b95s2)>0) {
               while ($data_b95s2 = mysql_fetch_assoc($b95s2)) {
               $jum_b95s2 += $data_b95s2['b95'];
               $mean_b95s2 = round(($jum_b95s2/$jml_s2),2);
               }
          }else{
               $jum_b95s2 = 0;
               $mean_b95s2 = round(($jum_b95s2/$jml_s2),2);
          }
          $b96s2 = mysql_query("SELECT tb_b.b96 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
          if (mysql_num_rows($b96s2)>0) {
               while ($data_b96s2 = mysql_fetch_assoc($b96s2)) {
               $jum_b96s2 += $data_b96s2['b96'];
               $mean_b96s2 = round(($jum_b96s2/$jml_s2),2);
               }
          }else{
               $jum_b96s2 = 0;
               $mean_b96s2 = round(($jum_b96s2/$jml_s2),2);
          }
          $b97s2 = mysql_query("SELECT tb_b.b97 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
          if (mysql_num_rows($b97s2)>0) {
               while ($data_b97s2 = mysql_fetch_assoc($b97s2)) {
               $jum_b97s2 += $data_b97s2['b97'];
               $mean_b97s2 = round(($jum_b97s2/$jml_s2),2);
               }
          }else{
               $jum_b97s2 = 0;
               $mean_b97s2 = round(($jum_b97s2/$jml_s2),2);
          }
          
         
          $b98s2 = mysql_query("SELECT tb_b.b98 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
          if (mysql_num_rows($b98s2)>0) {
               while ($data_b98s2 = mysql_fetch_assoc($b98s2)) {
               $jum_b98s2 += $data_b98s2['b98'];
               $mean_b98s2 = round(($jum_b98s2/$jml_s2),2);
               }
          }else{
               $jum_b98s2 = 0;
               $mean_b98s2 = round(($jum_b98s2/$jml_s2),2);
          }
          $b99s2 = mysql_query("SELECT tb_b.b99 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
          if (mysql_num_rows($b99s2)>0) {
               while ($data_b99s2 = mysql_fetch_assoc($b99s2)) {
               $jum_b99s2 += $data_b99s2['b99'];
               $mean_b99s2 = round(($jum_b99s2/$jml_s2),2);
               }
          }else{
               $jum_b99s2 = 0;
               $mean_b99s2 = round(($jum_b99s2/$jml_s2),2);
          }
          $b910s2 = mysql_query("SELECT tb_b.b910 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
          if (mysql_num_rows($b910s2)>0) {
               while ($data_b910s2 = mysql_fetch_assoc($b910s2)) {
               $jum_b910s2 += $data_b910s2['b910'];
               $mean_b910s2 = round(($jum_b910s2/$jml_s2),2);
               }
          }else{
               $jum_b910s2 = 0;
               $mean_b910s2 = round(($jum_b910s2/$jml_s2),2);
          }
          $b911s2 = mysql_query("SELECT tb_b.b911 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S2'");
          if (mysql_num_rows($b911s2)>0) {
               while ($data_b911s2 = mysql_fetch_assoc($b911s2)) {
               $jum_b911s2 += $data_b911s2['b911'];
               $mean_b911s2 = round(($jum_b911s2/$jml_s2),2);
               }
          }else{
               $jum_b911s2 = 0;
               $mean_b911s2 = round(($jum_b911s2/$jml_s2),2);
          }

          //S3
          $b91s3 = mysql_query("SELECT tb_b.b91 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
          if (mysql_num_rows($b91s3)>0) {
               while ($data_b91s3 = mysql_fetch_assoc($b91s3)) {
               $jum_b91s3 += $data_b91s3['b91'];
               $mean_b91s3 = round(($jum_b91s3/$jml_s3),2);
               }
          }else{
               $jum_b91s3 = 0;
               $mean_b91s3 = round(($jum_b91s3/$jml_s3),2);
          }
          
          $b92s3 = mysql_query("SELECT tb_b.b92 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
          if (mysql_num_rows($b92s3)>0) {
               while ($data_b92s3 = mysql_fetch_assoc($b92s3)) {
               $jum_b92s3 += $data_b92s3['b92'];
               $mean_b92s3 = round(($jum_b92s3/$jml_s3),2);
               }
          }else{
               $jum_b92s3 = 0;
               $mean_b92s3 = round(($jum_b92s3/$jml_s3),2);
          }
          $b93s3 = mysql_query("SELECT tb_b.b93 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
          if (mysql_num_rows($b93s3)>0) {
               while ($data_b93s3 = mysql_fetch_assoc($b93s3)) {
               $jum_b93s3 += $data_b93s3['b93'];
               $mean_b93s3 = round(($jum_b93s3/$jml_s3),2);
               }
          }else{
               $jum_b93s3 = 0;
               $mean_b93s3 = round(($jum_b93s3/$jml_s3),2);
          }
          $b94s3 = mysql_query("SELECT tb_b.b94 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
          if (mysql_num_rows($b94s3)>0) {
               while ($data_b94s3 = mysql_fetch_assoc($b94s3)) {
               $jum_b94s3 += $data_b94s3['b94'];
               $mean_b94s3 = round(($jum_b94s3/$jml_s3),2);
               }
          }else{
               $jum_b94s3 = 0;
               $mean_b94s3 = round(($jum_b94s3/$jml_s3),2);
          }
          $b95s3 = mysql_query("SELECT tb_b.b95 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
          if (mysql_num_rows($b95s3)>0) {
               while ($data_b95s3 = mysql_fetch_assoc($b95s3)) {
               $jum_b95s3 += $data_b95s3['b95'];
               $mean_b95s3 = round(($jum_b95s3/$jml_s3),2);
               }
          }else{
               $jum_b95s3 = 0;
               $mean_b95s3 = round(($jum_b95s3/$jml_s3),2);
          }
          $b96s3 = mysql_query("SELECT tb_b.b96 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
          if (mysql_num_rows($b96s3)>0) {
               while ($data_b96s3 = mysql_fetch_assoc($b96s3)) {
               $jum_b96s3 += $data_b96s3['b96'];
               $mean_b96s3 = round(($jum_b96s3/$jml_s3),2);
               }
          }else{
               $jum_b96s3 = 0;
               $mean_b96s3 = round(($jum_b96s3/$jml_s3),2);
          }
          $b97s3 = mysql_query("SELECT tb_b.b97 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
          if (mysql_num_rows($b97s3)>0) {
               while ($data_b97s3 = mysql_fetch_assoc($b97s3)) {
               $jum_b97s3 += $data_b97s3['b97'];
               $mean_b97s3 = round(($jum_b97s3/$jml_s3),2);
               }
          }else{
               $jum_b97s3 = 0;
               $mean_b97s3 = round(($jum_b97s3/$jml_s3),2);
          }
          $b98s3 = mysql_query("SELECT tb_b.b98 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
          if (mysql_num_rows($b98s3)>0) {
               while ($data_b98s3 = mysql_fetch_assoc($b98s3)) {
               $jum_b98s3 += $data_b98s3['b98'];
               $mean_b98s3 = round(($jum_b98s3/$jml_s3),2);
               }
          }else{
               $jum_b98s3 = 0;
               $mean_b98s3 = round(($jum_b98s3/$jml_s3),2);
          }
          $b99s3 = mysql_query("SELECT tb_b.b99 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
          if (mysql_num_rows($b99s3)>0) {
               while ($data_b99s3 = mysql_fetch_assoc($b99s3)) {
               $jum_b99s3 += $data_b99s3['b99'];
               $mean_b99s3 = round(($jum_b99s3/$jml_s3),2);
               }
          }else{
               $jum_b99s3 = 0;
               $mean_b99s3 = round(($jum_b99s3/$jml_s3),2);
          }
          $b910s3 = mysql_query("SELECT tb_b.b910 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
          if (mysql_num_rows($b910s3)>0) {
               while ($data_b910s3 = mysql_fetch_assoc($b910s3)) {
               $jum_b910s3 += $data_b910s3['b910'];
               $mean_b910s3 = round(($jum_b910s3/$jml_s3),2);
               }
          }else{
               $jum_b910s3 = 0;
               $mean_b910s3 = round(($jum_b910s3/$jml_s3),2);
          }
          $b911s3 = mysql_query("SELECT tb_b.b911 FROM
                                  `tb_b`
                                  INNER JOIN `alumni_daftar` 
                                      ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`) WHERE alumni_daftar.`jenjang` ='S3'");
          if (mysql_num_rows($b911s3)>0) {
               while ($data_b911s3 = mysql_fetch_assoc($b911s3)) {
               $jum_b911s3 += $data_b911s3['b911'];
               $mean_b911s3 = round(($jum_b911s3/$jml_s3),2);
               }
          }else{
               $jum_b911s3 = 0;
               $mean_b911s3 = round(($jum_b911s3/$jml_s3),2);
          }


?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Pendapat Tentang Sarana Perkuliahan', 'S1', 'S2', 'S3'],
          ['Perpustakaan', <?php echo $mean_b91s1 ?>, <?php echo $mean_b91s2 ?>, <?php echo $mean_b91s3 ?>],
          ['Teknologi informasi dan komunikasi', <?php echo $mean_b92s1 ?>, <?php echo $mean_b92s2 ?>, <?php echo $mean_b92s3 ?>],
          ['Modul belajar',<?php echo $mean_b93s1 ?>, <?php echo $mean_b93s2 ?>, <?php echo $mean_b93s3 ?>],
          ['Ruang belajar', <?php echo $mean_b94s1 ?>, <?php echo $mean_b94s2 ?>, <?php echo $mean_b94s3 ?>],
          ['Laboratorium', <?php echo $mean_b95s1 ?>, <?php echo $mean_b95s2 ?>,<?php echo $mean_b95s3 ?>],
          ['Variasi mata kuliah yang ditawarkan', <?php echo $mean_b96s1 ?>,<?php echo $mean_b96s2 ?>, <?php echo $mean_b96s3 ?>],
          ['Akomodasi', <?php echo $mean_b97s1 ?>,<?php echo $mean_b97s2 ?>, <?php echo $mean_b97s3 ?>],
          ['Kantin ', <?php echo $mean_b98s1 ?>,<?php echo $mean_b98s2 ?>, <?php echo $mean_b98s3 ?>],
          ['Pusat kegiatan mahasiswa dan fasilitasnya, ruang rekreasi', <?php echo $mean_b99s1 ?>,<?php echo $mean_b99s2 ?>, <?php echo $mean_b99s3 ?>],
          ['Fasilitas layanan kesehatan', <?php echo $mean_b910s1 ?>,<?php echo $mean_b910s2 ?>, <?php echo $mean_b910s3 ?>],
          ['Lainnya', <?php echo $mean_b911s1 ?>,<?php echo $mean_b911s2 ?>, <?php echo $mean_b911s3 ?>]
        ]);

        var options = {
          chart: {
            title: 'Pendapat Tentang Sarana Perkuliahan',
            subtitle: '',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, options);
      }
    </script>
<style>.ui-widget-header{background:none;border:none;}</style>
		<article class="module width_full">
			<header><h3 class="tabs_involved">Pendapat Tentang Sarana Perkuliahan (Mean)</h3></header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			 	<div id="barchart_material" style="width: 900px; height: 500px;"></div>
			 	<br>
			 	<div align="center"><img src="../img/index.png"></div>
			 	<br>
			 	<table class="table">
			 		<tr>
			 			<td></td>
			 			<td>Total Responden S1</td>
			 			<td>Total Responden S2</td>
			 			<td>Total Responden S3</td>
			 		</tr>
			 		<tr>
			 			<td>Total Responden</td>
			 			<td><?php echo $jml_s1 ?></td>
			 			<td><?php echo $jml_s2 ?></td>
			 			<td><?php echo $jml_s3 ?></td>
			 		</tr>
			 		
			 	</table>
			</div>
		</div>
		</article>
		
<?php } ?>