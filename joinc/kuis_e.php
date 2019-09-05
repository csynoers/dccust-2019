<?php require_once('form_helper.php');
  $id_alumni= $_SESSION['idnya'];
  // cek data from last fill kuisioner

  if (check_data('tb_e',$id_alumni) > 0) {
    # code...
    header('Location:selesai.html');

  }
 ?>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("#a8ln").hide();
        $("#a9ln").hide();
    });
    $("#show").click(function(){
        $("#a8ln").show();
        $("#a9ln").show();
    });
});
</script>
<section id="featured">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="row" style="margin-bottom: 46px;">
          <div class="bawah">
            <center><h3><span style="color: #009a54;;" data-mce-mark="1">Kuesioner</span></h3></center>
          </div>
          
          <div class="bawah">
            <center>
              <h4>
                <span style="color: #009a54;;" data-mce-mark="1">
                <?php
                  // bidata
                  $cek = mysql_query("SELECT * FROM biodata WHERE id_alumni = '$_SESSION[idnya]'");
                  if (mysql_num_rows($cek) >0) {
                      echo "Biodata";
                  }else{
                      // echo "<a href='kuesioner.html'>Biodata</a>";
                      echo "Biodata";
                  }
                  echo "|";

                  // A
                  $cek = mysql_query("SELECT * FROM tb_a WHERE id_alumni = '$_SESSION[idnya]'");
                  if (mysql_num_rows($cek)>0) {
                      echo "Metode Pembelajaran";
                  }else{
                      // echo "<a href='kuis_a.html'>Metode Pembelajaran</a>";
                      echo "Metode Pembelajaran";
                  }
                  echo "|";

                  // B
                  $cek = mysql_query("SELECT * FROM tb_b WHERE id_alumni = '$_SESSION[idnya]'");
                  if (mysql_num_rows($cek)>0) {
                      echo "Masa Transisi";
                  }else{
                     // echo "<a href='kuis_b.html'>Masa Transisi</a>";
                    echo "Masa Transisi";
                  }
                  echo "|";

                  // C
                  $cek = mysql_query("SELECT * FROM tb_c WHERE id_alumni = '$_SESSION[idnya]'");
                  if (mysql_num_rows($cek)>0) {
                      echo "Pekerjaan Sekarang";
                  }else{
                     // echo "<a href='kuis_c.html'>Pekerjaan Sekarang</a>";
                     echo "Pekerjaan Sekarang";
                  }
                  echo "|";

                  // D
                  $cek = mysql_query("SELECT * FROM tb_d WHERE id_alumni = '$_SESSION[idnya]'");
                  if (mysql_num_rows($cek)>0) {
                      echo "Keselarasan Vertikal & Horizontal";
                  }else{
                     // echo "<a href='kuis_d.html'>Keselarasan Vertikal & Horizontal</a>";
                     echo "Keselarasan Vertikal & Horizontal";
                  }
                  echo "|";

                  // E
                  $cek = mysql_query("SELECT * FROM tb_e WHERE id_alumni = '$_SESSION[idnya]'");
                  if (mysql_num_rows($cek)>0) {
                      echo "Kompetensi";
                  }else{
                     echo "<a href='kuis_e.html'>Kompetensi</a>";
                     // echo "Kompetensi";
                  }
                ?>
                </span>
              </h4>
            </center>
          </div>

          <div class="bawah">
            <h5><span style="color: #009a54;;" data-mce-mark="1">E. KOMPETENSI</span></h5>
          </div>

          <form method="post" action="aksi_kuis_e.html" id="contactfrm" role="form">
            <?php
              $data_options= array(
                '1' => 'Sangat rendah',
                '2' => 'Sangat Tinggi',
              );
              $data_quest_e= array(
                '1' => 'E1 Pada saat lulus, pada tingkat mana kompetensi di bawah ini Anda kuasai? (A) ', 
                '2' => 'E2 Pada saat ini, pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan?', 
              );

              $data_e1= array(
                '1' => 'Pengetahuan di bidang atau disiplin ilmu anda',
                '2' => 'Pengetahuan di luar bidang atau disiplin ilmu anda',
                '3' => 'Pengetahuan umum',
                '4' => 'Keterampilan menggunakan internet',
                '5' => 'Keterampilan mengoperasikan komputer',
                '6' => 'Berpikir kritis',
                '7' => 'Keterampilan melakukan riset',
                '8' => 'Kemampuan beradaptasi',
                '9' => 'Kemampuan belajar',
                '10' => 'Kemampuan berkomunikasi',
                '11' => 'Kemampuan bekerja di bawah tekanan',
                '12' => 'Keterampilan manajemen waktu',
                '13' => 'Keterampilan bekerja secara mandiri',
                '14' => 'Bekerja dalam tim/bekerjasama dengan orang lain',
                '15' => 'Kemampuan dalam memecahkan masalah',
                '16' => 'Keterampilan melakukan negosiasi',
                '17' => 'Kemampuan analisis',
                '18' => 'Sikap toleransi',
                '19' => 'Loyalitas dan integritas',
                '20' => 'Bekerja dengan orang yang berbeda budaya maupun latar belakang',
                '21' => 'Kepemimpinan',
                '22' => 'Kemampuan dalam memegang tanggungjawab',
                '23' => 'Kemampuan berinisiasi/Inisiatif',
                '24' => 'Kemampuan mengembangkan manajemen proyek/program',
                '25' => 'Kemampuan untuk mempresentasikan ide/produk/laporan',
                '26' => 'Kemampuan dalam menulis laporan, memo dan dokumen',
                '27' => 'Kemampuan untuk terus belajar sepanjang hayat',
              );

              $data_e2= array(
                '1' => 'Pengetahuan di bidang atau disiplin ilmu anda',
                '2' => 'Pengetahuan di luar bidang atau disiplin ilmu anda',
                '3' => 'Pengetahuan umum',
                '4' => 'Keterampilan menggunakan internet',
                '5' => 'Keterampilan mengoperasikan komputer',
                '6' => 'Berpikir kritis',
                '7' => 'Keterampilan melakukan riset',
                '8' => 'Kemampuan beradaptasi',
                '9' => 'Kemampuan belajar',
                '10' => 'Kemampuan berkomunikasi',
                '11' => 'Kemampuan bekerja di bawah tekanan',
                '12' => 'Keterampilan manajemen waktu',
                '13' => 'Keterampilan bekerja secara mandiri',
                '14' => 'Bekerja dalam tim/bekerjasama dengan orang lain',
                '15' => 'Kemampuan dalam memecahkan masalah',
                '16' => 'Keterampilan melakukan negosiasi',
                '17' => 'Kemampuan analisis',
                '18' => 'Sikap toleransi',
                '19' => 'Loyalitas dan integritas',
                '20' => 'Bekerja dengan orang yang berbeda budaya maupun latar belakang',
                '21' => 'Kepemimpinan',
                '22' => 'Kemampuan dalam memegang tanggungjawab',
                '23' => 'Kemampuan berinisiasi/Inisiatif',
                '24' => 'Kemampuan mengembangkan manajemen proyek/program',
                '25' => 'Kemampuan untuk mempresentasikan ide/produk/laporan',
                '26' => 'Kemampuan dalam menulis laporan, memo dan dokumen',
                '27' => 'Kemampuan untuk terus belajar sepanjang hayat',
              );

              echo open_div('col-sm-12 col-lg-12');
                echo open_div('col-sm-6 col-lg-6');
                for ($i=1; $i <= 1 ; $i++) {
                  echo open_div('col-sm-12 col-lg-12');
                    echo open_div('form-group');
                      echo label($data_quest_e[$i]);
                      if ($i=='1') {
                        #loop data_e1
                        echo open_table();
                        for ($j=1; $j <= 3 ; $j++) { 
                          echo open_tr();
                          #for th
                          if ($j=='1') {
                            for ($k=1; $k <= count($data_options) ; $k++) { 
                              echo th($data_options[$k],'4');

                            }
                          echo close_tr();

                          }elseif($j=='2'){
                          echo open_tr();
                          #for
                            for ($k=0; $k <= 6 ; $k++) { 
                              if (($k=='0') OR ($k=='6')) {
                                echo td();
                              }else{
                                // echo td(radio('e1','e1',$k));
                                echo td($k);
                              }
                            }
                          echo close_tr();

                          }else{
                            for ($j=1; $j <= count($data_e1) ; $j++) { 
                              echo open_tr();
                                echo td($j);
                                for ($k=1; $k <= 5 ; $k++) {
                                  echo td(radio('e1'.$j,'e1',$k)); 
                                }
                                echo td($data_e1[$j]);
                              echo close_tr();
                            }
                          }
                        }
                        echo close_table();
                      }
                    echo close_div();
                  echo close_div();

                }
                echo close_div();

                echo open_div('col-sm-6 col-lg-6');
                for ($i=2; $i <= count($data_quest_e) ; $i++) {
                  echo open_div('col-sm-12 col-lg-12');
                    echo open_div('form-group');
                      echo label($data_quest_e[$i]);
                      if ($i=='2') {
                        #loop data_e2
                        echo open_table();
                        for ($j=1; $j <= 3 ; $j++) { 
                          echo open_tr();
                          #for th
                          if ($j=='1') {
                            for ($k=1; $k <= count($data_options) ; $k++) { 
                              echo th($data_options[$k],'4');

                            }
                          echo close_tr();

                          }elseif($j=='2'){
                          echo open_tr();
                          #for
                            for ($k=0; $k <= 6 ; $k++) { 
                              if (($k=='0') OR ($k=='6')) {
                                echo td();
                              }else{
                                // echo td(radio('e2','e2',$k));
                                echo td($k);
                              }
                            }
                          echo close_tr();

                          }else{
                            for ($j=1; $j <= count($data_e2) ; $j++) { 
                              echo open_tr();
                                echo td($j);
                                for ($k=1; $k <= 5 ; $k++) {
                                  echo td(radio('e2'.$j,'e2',$k)); 
                                }
                                echo td($data_e2[$j]);
                              echo close_tr();
                            }
                          }
                        }
                        echo close_table();
                      }
                    echo close_div();
                  echo close_div();
                }
                echo close_div();
              echo close_div();
            ?>
            <div class="col-sm-12 col-lg-12">
              <div class="col-sm-12 col-lg-12">
                <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">Lanjutkan</button>
              </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</section>