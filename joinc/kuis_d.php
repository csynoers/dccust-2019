<?php
  require_once('form_helper.php');
  // check last kuis
  // get id alumni
  $id_alumni= $_SESSION['idnya'];
  // cek data from last fill kuisioner

  if (check_data('tb_d',$id_alumni) > 0) {
    # code...
    header('Location:kuis_e.html');

  }
?>
<script>
$(document).ready(function(){
    $("#hided1").click(function(){
        $("#d2").hide();
    });
    $("#showd1").click(function(){
        $("#d2").show();
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
                     echo "<a href='kuis_d.html'>Keselarasan Vertikal & Horizontal</a>";
                     // echo "Keselarasan Vertikal & Horizontal";
                  }
                  echo "|";

                  // E
                  $cek = mysql_query("SELECT * FROM tb_e WHERE id_alumni = '$_SESSION[idnya]'");
                  if (mysql_num_rows($cek)>0) {
                      echo "Kompetensi";
                  }else{
                     // echo "<a href='kuis_e.html'>Kompetensi</a>";
                     echo "Kompetensi";
                  }
                ?>
                </span>
              </h4>
            </center>
          </div>

          <div class="bawah">
            <h5><span style="color: #009a54;;" data-mce-mark="1">D. KESELARASAN VERTIKAL & HORIZONTAL</span></h5>
          </div>

          <form method="post" action="aksi_kuis_d.html" id="contactfrm" role="form">
            <?php
              $data_options= array(
                '1' => 'Tidak sama sekali',
                '2' => 'Sangat erat',
              );
              $data_quest_d= array(
                '1' => 'D1 Seberapa erat hubungan antara bidang studi dengan pekerjaan Anda? ', 
                '2' => 'D2 Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?', 
                '3' => 'D3 Jika menurut Anda pekerjaan Anda saat ini tidak sesuai dengan pendidikan Anda, mengapa Anda mengambilnya? <small><i>Jawaban bisa lebih dari satu.</i></small> ', 
              );

              $data_d1= array(
                '1' => 'Hubungan bidang studi dengan pekerjaan',
              );

              $data_d2= array(
                '1' => 'Setingkat lebih tinggi',
                '2' => 'Tingkat yang sama',
                '3' => 'Setingkat lebih rendah',
                '4' => 'Tidak perlu pendidikan tinggi',
              );

              $data_d3= array(
                '1' => 'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.',
                '2' => 'Saya belum mendapatkan pekerjaan yang lebih sesuai.',
                '3' => 'Di pekerjaan ini saya memperoleh prospek karir yang baik.',
                '4' => 'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.',
                '5' => 'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.',
                '6' => 'Saya dapat memperoleh pendapatn yang lebih tinggi di pekerjaan ini.',
                '7' => 'Pekerjaan saya saat ini lebih aman/terjamin/secure',
                '8' => 'Pekerjaan saya saat ini lebih menarik',
                '9' => 'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.',
                '10' => 'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.',
                '11' => 'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.',
                '12' => 'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.',
                '13' => 'Lainnya',
              );

              echo open_div('col-sm-12 col-lg-12');
                echo open_div('col-sm-6 col-lg-6');
                for ($i=1; $i <= 2 ; $i++) {
                  echo open_div('col-sm-12 col-lg-12');
                    echo open_div('form-group');
                      echo label($data_quest_d[$i]);
                      if ($i=='1') {
                        echo open_table();
                        for ($j=1; $j <= 3 ; $j++) {
                          if ($j=='1') {
                            echo open_tr();
                            for ($k=1; $k <= count($data_options) ; $k++) { 
                              echo th($data_options[$k],'4');

                            }
                            echo close_tr();

                          }elseif ($j=='2') {
                            echo open_tr();
                            for ($k=0; $k <= 6 ; $k++) { 
                              if (($k=='0') OR ($k=='6')) {
                                echo td();

                              }else{
                                echo td($k);

                              }
                            }
                            echo close_tr();

                          }else{
                            for ($k=1; $k <= count($data_d1) ; $k++) { 
                              echo open_tr();
                                echo td($k);
                                for ($m=1; $m <= 5 ; $m++) { 
                                  echo td(radio('d1'.$k,'d1'.$k,$m));
                                }
                                echo td($data_d1[$k]);
                              echo close_tr();
                            }
                          }

                        }
                        echo close_table();

                      }elseif ($i=='2') {
                        #loop data_d2
                        for ($j=1; $j <= count($data_d2) ; $j++) {
                          echo radio_label('d2','d2',$j,$data_d2[$j]);
                        }

                      }
                    echo close_div();
                  echo close_div();

                }
                echo close_div();

                echo open_div('col-sm-6 col-lg-6');
                for ($i=3; $i <= count($data_quest_d) ; $i++) {
                  echo open_div('col-sm-12 col-lg-12');
                    echo open_div('form-group');
                      echo label($data_quest_d[$i]);
                      if ($i=='3') {
                        #loop data_d3
                        for ($j=1; $j <= count($data_d3) ; $j++) {
                          if ($j=='13') {
                            echo checkbox('d3[]','d3','d3'.$j,$data_d3[$j].text('d3lainnya','d3lainnya'));

                          }else{
                            echo checkbox('d3[]','d3','d3'.$j,$data_d3[$j]);

                          }
                        }

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