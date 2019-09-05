<?php
  require_once('form_helper.php');
  // check last kuis
  // get id alumni
  $id_alumni= $_SESSION['idnya'];
  // cek data from last fill kuisioner

  if (check_data('tb_b',$id_alumni) > 0) {
    # code...
    header('Location:kuis_c.html');

  }
?>
<style type="text/css">
  .b24 > .radio{
    display: inline-block;
  }
</style>
<script>

$(document).ready(function(){
  $("#b23").hide();
  $('[id=b233]').slice(0).prop("required", false);
  $('[id=b2333]').slice(0).prop("disabled", true);
  $('[id=b234]').slice(0).prop("required", false);
  $('[id=b2347]').slice(0).prop("disabled", true);
  //if c23 is checked
  $('input:radio[name="b2"]').change(function(){
      if($(this).val() == 'b23'){
         // alert("test");
        $("#b23").show();
        $("#b231").slice(0).prop("required", true);
        $("#b232").slice(0).prop("required", true);
        $('[id=b233]').slice(0).prop("required", true);
        $('[id=b234]').slice(0).prop("required", true);

        $('input:radio[name="b233"]').change(function(){
            if($(this).val() == 'b233'){
               $('[id=b2333]').slice(0).prop("disabled", false);
               $("#b2333").slice(0).prop("required", true);
            }else{
              $('[id=b2333]').slice(0).prop("disabled", true);
              $("#b2333").slice(0).prop("value", '');
            }
        });

        $('input:radio[name="b234"]').change(function(){
            if($(this).val() == 'b237'){
               $('[id=b2347]').slice(0).prop("disabled", false);
               $("#b2347").slice(0).prop("required", true);
            }else{
              $('[id=b2347]').slice(0).prop("disabled", true);
              $("#b2347").slice(0).prop("value", '');
            }
        });


      }else{
        $("#b23").hide();
        $('[id=b233]').slice(0).prop("required", false);
        $('[id=b234]').slice(0).prop("required", false);
        $("#b231").slice(0).prop("required", false);
        $("#b232").slice(0).prop("required", false);

      }
  });

  $("#b913").prop('required',false);
    // $('').removeAttr('required');
    $("#hidec1").click(function(){
        $("#c2").hide();
        $("#c3").hide();
        $("#c4").hide();
        $("#c5").hide();
        $("#c6").hide();
        $("#c7").hide();
    });
    $("#showc11").click(function(){
        $("#c2").show();
        $("#c3").show();
        $("#c4").show();
        $("#c5").show();
        $("#c6").show();
        $("#c7").show();
    });
    $("#showc12").click(function(){
        $("#c2").show();
        $("#c3").show();
        $("#c4").show();
        $("#c5").show();
        $("#c6").show();
        $("#c7").show();
    });
    /* $("#hidec6").keypress(function(){
        $("#c8").hide();
    });*/

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
                     echo "<a href='kuis_b.html'>Masa Transisi</a>";
                    // echo "Masa Transisi";
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
                     // echo "<a href='kuis_e.html'>Kompetensi</a>";
                     echo "Kompetensi";
                  }
                ?>
                </span>
              </h4>
            </center>
          </div>

          <div class="bawah">
            <h5><span style="color: #009a54;;" data-mce-mark="1">B. Masa Transisi</span></h5>
          </div>

          <form method="post" action="aksi_kuis_b.html" id="contactfrm" role="form">
            <?php

              $data_options= array(
                '1' => 'Tidak sama sekali',
                '2' => 'Sangat Besar',
              );

              $data_quest_b=array(
                '1' => 'B1. Kapan Anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak dimasukkan.' ,
                '2' => 'B2. Apa alasan utama Anda tidak mencari pekerjaan setelah lulus kuliah?', 
                '3' => 'B3. Bagaimana cara Anda mencari pekerjaan tersebut? <small><i>Jawaban bisa lebih dari satu</i></small>', 
                '4' => 'B4. Berapa bulan waktu yang dihabiskan untuk memperoleh pekerjaan pertama?', 
                '5' => 'B5. Berapa perusahaan/instansi/institusi yang sudah Anda lamar (melalui surat atau e-mail) sebelum Anda memperoleh pekerjaan pertama?', 
                '6' => 'B6. Berapa banyak perusahaan/instansi/institusi yang merespons lamaran Anda?', 
                '7' => 'B7. Berapa banyak perusahaan/instansi/institusi yang mengundang Anda wawancara?', 
                '8' => 'B8. Bagaimana cara Anda mendapatkan pekerjaan pertama? <small><i>Hanya satu jawaban</i></small>', 
                '9' => 'B9. Berdasarkan persepsi Anda, seberapa pentingkah aspek aspek di bawah ini bagi perusahaan/instansi dalam melakukan penerimaan pegawai baru?', 
              );

              $data_b1= array(
                '1' => 'Bulan sebelum lulus',
                '2' => 'Bulan setelah lulus',
                '3' => 'Saya tidak mencari kerja',
              );

              $data_b2= array(
                '1' => 'Saya memiliki usaha',
                '2' => 'Saya sudah memperolah pekerjaan sebelum lulus',
                '3' => 'Saya melanjutkan kuliah',
                '4' => 'Saya melanjutkan usaha keluarga',
                '5' => 'Lainnya',
              );

              $data_b23= array(
                '1' => 'Jurusan Tempat Studi Lanjut:',
                '2' => 'Universitas Tempat Studi Lanjut:',
                '3' => 'Sumber biaya untuk studi lanjut?',
                '4' => 'Alasan studi lanjut di jurusan dan universitas tersebut?',
              );

              $data_b23_sub= array(
                '1' => array(
                  '' => '',
                ),
                '2' => array(
                  '' => '',
                ),
                '3' => array(
                  '1' => 'a. Pribadi',
                  '2' => 'b. Orang tua/keluarga',
                  '3' => 'c. Beasiswa, sebutkan beasiswa apa:',
                ),
                '4' => array(
                  '1' => 'a. Sama dengan universitas pada jenjang pendidikan sebelumnya',
                  '2' => 'b. Biaya studi lanjut yang murah, baik biaya kuliah maupun biaya hidup',
                  '3' => 'c. Memiliki relasi yang terkait pada tempat studi lanjut ',
                  '4' => 'd. Tempat studi lanjut memiliki kerja sama dengan pemberi beasiswa',
                  '5' => 'e. Aspek kualitas pendidikan yang diberikan bagus',
                  '6' => 'f. Jaminan peluang kerja & pengembangan diri yang disediakan',
                  '7' => 'g. Lainnya, tuliskan ',
                ),
              );

              $data_b3= array(
                '1' => 'Melalui iklan di koran/majalah,brosur',
                '2' => 'Melamar ke perusahaan tanpa mengetahui lowongan yang ada',
                '3' => 'Pergi ke bursa/pameran kerja',
                '4' => 'Mencari lewat internet/iklan online/milis',
                '5' => 'Dihubungi oleh perusahaan',
                '6' => 'menghubungi Kemnakertrans',
                '7' => 'Menghubungi agen tenaga kerja komerisal/swasta',
                '8' => 'Mendapatkan informasi dari pusat/kantor pengembangan karir fakultas/universitas',
                '9' => 'Menghubungi kantor kemahasiswaan/hubungi alumni',
                '10' => 'Membangun network sejak masih kuliah',
                '11' => 'Melalui relasi (mislanya dosen,orang tua, saudara, teman, dll.)',
                '12' => 'Membangun bisnis sendiri',
                '13' => 'Melalui penempatan kerja atau magang',
                '14' => 'Bekerja di tempat yang sama dengan tempat kerja semasa kuliah',
                '15' => 'Lainnya'
              );

              $data_b4= array(
                '1' => '0-3 bulan', 
                '2' => '4-6 bulan',
                '3' => '> 6 bulan',
              );

              $data_b5= array(
                '1' => 'Jumlah perusahaan/instansi/institusi',
              );

              $data_b6= array(
                '1' => 'Jumlah perusahaan/instansi/institusi',
              );

              $data_b7= array(
                '1' => 'Jumlah perusahaan/instansi/institusi',
              );

              $data_b8= array(
                '1' => 'Melalui iklan di koran/majalah, brosur',
                '2' => 'Melamar ke perusahaan tanpa mengetahui lowongan yang ada',
                '3' => 'Pergi ke bursa/pameran kerja',
                '4' => 'Mencari lewat internet/iklan online/milis',
                '5' => 'Dihubungi oleh perusahaan',
                '6' => 'Menghubungi Kemnakertrans',
                '7' => 'Menghubungi agen tenaga kerja komersial/swasta',
                '8' => 'Memperoleh informasi dari pusat/kantor pengembangan karir fakultas/universitas',
                '9' => 'Menghubungi kantor kemahasiswaan/hubungi alumni',
                '10' => 'Membangun network sejak masih kuliah',
                '11' => 'Melalui Relasi (misalnya dosen, orang tua, saudara, teman, dll.)',
                '12' => 'Membangun bisnis sendiri',
                '13' => 'Melalui penempatan kerja atau magang',
                '14' => 'Bekerja di tempat yang sama dengan tempat kerja semasa kuliah',
                '15' => 'Lainnya',
              );

              $data_b9= array(
                '1' => 'Program studi',
                '2' => 'Spesialisasi',
                '3' => 'IPK',
                '4' => 'Pengalaman kerja selaman kuliah',
                '5' => 'Reputasi dari perguruan tinggi',
                '6' => 'Pengalaman ke luar negeri (untuk bekerja atau magang)',
                '7' => 'Kemampuan bahasa inggris',
                '8' => 'Kemampuan bahasa asing lainnya',
                '9' => 'Pengoperasian computer',
                '10' => 'Pengalaman berorganisasi',
                '11' => 'Rekomendasi dari pihak ketiga',
                '12' => 'Kepribadian dan ketrampilan antar personal',
                '13' => 'Lainnya',
              );

              echo open_div('col-sm-12 col-lg-12');
                echo open_div('col-sm-6 col-lg-6');
                for ($i=1; $i <= 5 ; $i++) {
                  echo open_div('col-sm-12 col-lg-12');
                    echo open_div('form-group');
                      echo label($data_quest_b[$i]);
                      if ($i=='1') {
                        #loop data_b1
                        for ($j=1; $j <= count($data_b1) ; $j++) {
                          if (($j=='1') OR ($j=='2')) {
                            echo radio_label('b1','b1','b1'.$j,'Kira-kira');
                            echo select_option('b1'.$j,'b1'.$j,'12',$data_b1[$j]);

                           }else{
                            echo radio_label('b1','b1','b1'.$j,$data_b1[$j]);

                           } 
                        }

                      }elseif ($i=='2') {
                        #loop data_b2
                        for ($j=1; $j <= count($data_b2) ; $j++) { 
                          # radio($name,$id,$value,$label)
                          if ($j=='3') {
                            # code...
                            echo radio_label('b2','b2','b2'.$j,$data_b2[$j]);
                            echo open_div('col-sm-12 col-lg-12','b23');
                            for ($k=1; $k <= count($data_b23) ; $k++) {
                              echo open_div('form-group');
                                echo label($data_b23[$k]);
                                if ($k=='3') {
                                  for ($m=1; $m <= count($data_b23_sub[$k]) ; $m++) {
                                    if ($m=='3') {
                                      echo radio_label('b23'.$k,'b23'.$k,'b233'.$m,$data_b23_sub[$k][$m].text('b2333','b2333'));
                                    }else{
                                      echo radio_label('b23'.$k,'b23'.$k,'b23'.$m,$data_b23_sub[$k][$m]);

                                    }
                                  }

                                }elseif ($k=='4') {
                                  for ($m=1; $m <= count($data_b23_sub[$k]) ; $m++) {
                                    if ($m=='7') {
                                      echo radio_label('b23'.$k,'b23'.$k,'b234'.$m,$data_b23_sub[$k][$m].text('b2347','b2347'));
                                    }else{
                                      echo radio_label('b23'.$k,'b23'.$k,'b23'.$m,$data_b23_sub[$k][$m]);

                                    }
                                  }
                                
                                }else{
                                  echo text('b23'.$k,'b23'.$k);
                                  
                                }
                              echo close_div();
                            }
                            echo close_div();

                          }elseif ($j=='5') {
                            # code...
                            echo radio_label('b2','b2','b2'.$j,$data_b2[$j].text('b2lainnya','b2lainnya'));

                          }else{
                            echo open_div('b24');
                            echo radio_label('b2','b2','b2'.$j,$data_b2[$j]);
                            echo close_div();
                            
                          }

                        }

                      }elseif ($i=='3') {
                        #loop data_b3
                        for ($j=1; $j <= count($data_b3) ; $j++) {
                          if ($j=='15') {
                            # checkbox($name,$id,$value,$label,)
                            # text($name,$id='',$value='')
                            echo checkbox('b3[]','b3','b3'.$j,$data_b3[$j].text('b3lainnya','b3lainnya'));

                          }else{
                            # checkbox($name,$id,$value,$label,)
                            echo checkbox('b3[]','b3','b3'.$j,$data_b3[$j]);

                          }
                        }

                      }elseif ($i=='4') {
                        #loop data_b4
                        for ($j=1; $j <= count($data_b4) ; $j++) { 
                          # radio($name,$id,$value,$label)
                          echo radio_label('b4','b4','b4'.$j,$data_b4[$j]);

                        }

                      }elseif ($i=='5') {
                        #lop data_b5
                        for ($j=1; $j <= count($data_b5) ; $j++) {
                          // for ($k=1; $k <=3 ; $k++) { 
                            echo select_option('b5','b5','50',$data_b5[$j]);
                             
                           // } 
                        }

                      }
                    echo close_div();
                  echo close_div();

                }
                echo close_div();

                echo open_div('col-sm-6 col-lg-6');
                for ($i=6; $i <= count($data_quest_b) ; $i++) {
                  echo open_div('col-sm-12 col-lg-12');
                    echo open_div('form-group');
                      echo label($data_quest_b[$i]);
                      if ($i=='6') {
                        #lop data_b6
                        for ($j=1; $j <= count($data_b6) ; $j++) {
                          // for ($k=1; $k <=3 ; $k++) { 
                            echo select_option('b6','b6','50',$data_b6[$j]);
                             
                           // } 
                        }

                      }elseif ($i=='7') {
                        #lop data_b7
                        for ($j=1; $j <= count($data_b7) ; $j++) {
                          // for ($k=1; $k <=3 ; $k++) { 
                            echo select_option('b7','b7','50',$data_b7[$j]);
                             
                           // } 
                        }

                      }elseif ($i=='8') {
                        #loop data_b8
                        for ($j=1; $j <= count($data_b8) ; $j++) {
                          if ($j=='15') {
                            # checkbox($name,$id,$value,$label,)
                            # text($name,$id='',$value='')
                            echo radio_label('b8','b8','b8'.$j,$data_b8[$j].text('b8lainnya','b8lainnya'));

                          }else{
                            # checkbox($name,$id,$value,$label,)
                            echo radio_label('b8','b8','b8'.$j,$data_b8[$j]);

                          }
                        }

                      }elseif ($i=='9') {
                        #loop data_b9
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
                                // echo td(radio('b9','b9',$k));
                                echo td($k);
                              }
                            }
                          echo close_tr();

                          }else{
                            for ($j=1; $j <= count($data_b9) ; $j++) { 
                              echo open_tr();
                                echo td($j);
                                for ($k=1; $k <= 5 ; $k++) {
                                  echo td(radio('b9'.$j,'b9'.$j,$k)); 
                                }
                                if ($j=='13') {
                                  echo td($data_b9[$j].text('b9lainnya','b9lainnya'));  
                                }else{
                                  echo td($data_b9[$j]);
                                  
                                }
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
                <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit" onclick="">Lanjutkan</button>
              </div>
            </div>
            <div class="result"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  $(function() {
  $('[id=b913]').slice(0).prop("required", false);
});


// $("input").prop('required',true);
</script>