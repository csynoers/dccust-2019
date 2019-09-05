<?php
  require_once('form_helper.php');
  # check last kuis
  # get id alumni
  $id_alumni= $_SESSION['idnya'];
  #cek data from last fill kuisioner

  if (check_data('tb_c',$id_alumni) > 0) {
    # code...
    header('Location:kuis_d.html');

  }
?>
<script>
  // (function(j){
  //   j('#c11').click(function(){
  //     j('#c2').hide();
  //   });
  // })(jQuery);
$(document).ready(function(){
  $('input:radio[name="c1"]').change(function(){
      if($(this).val() == 'c11'){
         $('[id=c2]').slice(0).prop("required", false);
         $('#c2').hide();
         // $("#b2333").slice(0).prop("required", true);

      }else{
        $('[id=c2]').slice(0).prop("required", true);
        $('#c2').show();

          $('input:radio[name="c2"]').change(function(){
          if($(this).val() == 'c25'){
           $("#c2lainnya").prop("required", true);
          }else{
            $("#c2lainnya").prop("value", '');
            $("#c2lainnya").prop("required", false);

          }
        });

      }
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
                     // echo "<a href='kuis_b.html'>Masa Transisi</a>";
                    echo "Masa Transisi";
                  }
                  echo "|";

                  // C
                  $cek = mysql_query("SELECT * FROM tb_c WHERE id_alumni = '$_SESSION[idnya]'");
                  if (mysql_num_rows($cek)>0) {
                      echo "Pekerjaan Sekarang";
                  }else{
                     echo "<a href='kuis_c.html'>Pekerjaan Sekarang</a>";
                     // echo "Pekerjaan Sekarang";
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
            <h5><span style="color: #009a54;;" data-mce-mark="1">C. PEKERJAAN SEKARANG</span></h5>
          </div>

          <form method="post" action="aksi_kuis_c.html" id="contactfrm" role="form">
            <?php
              $data_quest_c= array(
                '1' => 'C1. Apakah Anda bekerja saat ini (termasuk kerja sambilan dan wirausaha)? ',
                '2' => 'C2. Bagaimana  Anda menggambarkan kondisi Anda saat ini?',
                '3' => 'C3. Apakah Anda aktif mencari pekerjaan dalam 4 minggu terakhir? <small><i>Pilih satu jawaban</i></small>',
                '4' => 'C4. Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang? ',
                '5' => 'C5. Jika Anda menjalankan usaha sendiri, apa status usaha Anda saat ini? <small><i>Jawaban bisa lebih dari satu</i></small>',
                '6' => 'C6. Tempat Anda bekerja saat ini bergerak di bidang apa? ',
                '7' => 'C7. Kira-kira berapa pendapatan Anda setiap bulannya?',
                '8' => 'C8. Identitas Lembaga/Perusahaan',
              );

              $data_c1= array(
                '1' => 'Ya',
                '2' => 'Tidak',
              );

              $data_c2= array(
                '1' => 'Saya melanjutkan kuliah profesi atau pascasarjana',
                '2' => 'Saya sedang mencari pekerjaan',
                '3' => 'Saya sibuk dengan keluarga dan anak-anak',
                '4' => 'Saya sedang mempersiapkan pernikahan',
                '5' => 'Lainnya',
              );

              $data_c3= array(
                '1' => 'Tidak',
                '2' => 'Tidak, tapi saya sedang menunggu hasil lamaran kerja',
                '3' => 'Ya, saya akan mulai bekerja dalam 2 minggu ke depan',
                '4' => 'Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan',
                '5' => 'Lainnya',
              );

              $data_c4= array(
                '1' => 'Instansi pemerintah (termasuk BUMN)',
                '2' => 'Organisasi non-profit/Lembaga Swadaya Masyarakat',
                '3' => 'Perusahaan swasta/instansi',
                '4' => 'Wiraswasta/perusahaan sendiri',
                '5' => 'Lainnya',
              );

              $data_c5= array(
                '1' => 'Milik sendiri',
                '2' => 'Alih kontrak',
                '3' => 'Membuka cabang baru perusahaan tempat bekerja dulu',
                '4' => 'Bekerja di rumah/usaha online/industri rumah',
                '5' => 'Joint venture',
                '6' => 'Menjalankan usaha orang lain',
                '7' => 'Lainnya',
              );

              $data_c6= array(
                '1' => 'Pertanian, kehutanan, dan perikanan',
                '2' => 'Pertambangan dan penggalian',
                '3' => 'Industri pengolahan',
                '4' => 'Pengadaan listrik, gas, uap/air panas dan udara dingin',
                '5' => 'Pengadaan air, pengelolaan sampah dan daur ulang, pembuangan dan pembersihan limbah dan sampah',
                '6' => 'Konstruksi',
                '7' => 'Perdagangan besar dan eceran; reparasi dan perawatan mobil dan sepeda motor',
                '8' => 'Transportasi dan pergudangan',
                '9' => 'Penyediaan akomodasi dan penyediaan makan minum',
                '10' => 'Informasi dan komunikasi',
                '11' => 'Jasa keuangan dan asuransi',
                '12' => 'Real estat',
                '13' => 'Jasa profesional, ilmiah dan teknis',
                '14' => 'Jasa persewaan dan sewa guna usaha tanpa hak opsi, ketenagakerjaan, agen perjalanan dan penunjang usahalainnya',
                '15' => 'Administrasi pemerintahan, pertahanan dan jaminan sosial wajib',
                '16' => 'Jasa pendidikan',
                '17' => 'Jasa kesehatan dan kegiatan sosial',
                '18' => 'Kesenian, hiburan dan kebudayaan',
                '19' => 'Kegiatan jasa lainnya',
                '20' => 'Jasa perorangan yang melayani rumah tangga; kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan',
                '21' => 'Kegiatan badan internasional dan badan ekstra internasional lainnya',
              );

              $data_c6sub= array(
                '1' => array(
                  '1' => 'Pertanian tanaman, peternakan, perburuhan dan kegiatan terkait', 
                  '2' => 'Kehutanan dan penebangan kayu', 
                  '3' => 'Perikanan', 
                ),
                '2' => array(
                  '1' => 'Pertambangan batu bara dan lignit', 
                  '2' => 'Pertambangan minyak bumi dan gas alam dan panas bumi', 
                  '3' => 'Pertambangan bijih logam', 
                  '4' => 'Pertambangan dan penggalian lainnya', 
                  '5' => 'Jasa pertambangan', 
                ),
                '3' => array(
                  '1' => 'Industri makanan', 
                  '2' => 'Industri minuman', 
                  '3' => 'Industri pengolahan tembakau', 
                  '4' => 'Industri tekstil', 
                  '5' => 'Industri pakaian jadi', 
                  '6' => 'Industri kulit, barang dari kulit dan alas kaki', 
                  '7' => 'Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya', 
                  '8' => 'Industri kertas dan barang dari kertas', 
                  '9' => 'Industri pencetakan dan reproduksi media rekaman', 
                  '10' => 'Industri produk dari batu bara dan pengilangan minyak bumi', 
                  '11' => 'Industri bahan kimia dan barang dari bahan kimia', 
                  '12' => 'Industri farmasi, produk obat kimia dan obat tradisional', 
                  '13' => 'Industri karet, barang dari karet dan plastik', 
                  '14' => 'Industri barang galian bukan logam', 
                  '15' => 'Industri logam dasar', 
                  '16' => 'Industri barang logam, bukan mesin dan peralatannya', 
                  '17' => 'Industri komputer, barang elektronik dan optik', 
                  '18' => 'Industri peralatan listrik', 
                  '19' => 'Industri mesin dan perlengkapan ytdl', 
                  '20' => 'Industri kendaraan bermotor, trailer dan semi trailer', 
                  '21' => 'Industri alat angkutan lainnya', 
                  '22' => 'Industri furnitur', 
                  '23' => 'Industri pengolahan lainnya', 
                  '24' => 'Jasa reparasi dan pemasangan mesin dan peralatan', 
                ),
                '4' => array(
                  '1' => 'Pengadaan listrik, gas, uap/air panas dan udara dingin', 
                ),
                '5' => array(
                  '1' => 'Pengadaan air', 
                  '2' => 'Pengolahan limbah', 
                  '3' => 'Pengolahan sampah dan daur ulang', 
                  '4' => 'Jasa pembersihan dan pengelolaan sampah lainnya', 
                ),
                '6' => array(
                  '1' => 'Konstruksi gedung', 
                  '2' => 'Konstruksi bangunan sipil', 
                  '3' => 'Konstruksi khusus', 
                ),
                '7' => array(
                  '1' => 'Perdagangan, reparasi dan perawatan mobil dan sepeda motor', 
                  '2' => 'Perdagangan besar, bukan mobil dan sepeda motor', 
                  '3' => 'Perdagangan eceran, bukan mobil dan motor', 
                ),
                '8' => array(
                  '1' => 'Angkutan darat dan angkutan melalui saluran pipa', 
                  '2' => 'Angkutan air', 
                  '3' => 'Angkutan udara', 
                  '4' => 'Pergudangan dan jasa penunjang angkutan', 
                  '5' => 'Pos dan kurir', 
                ),
                '9' => array(
                  '1' => 'Penyediaan akomodasi', 
                  '2' => 'Penyediaan makanan dan minuman',
                ),
                '10' => array(
                  '1' => 'Penerbitan', 
                  '2' => 'Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan music', 
                  '3' => 'Penyiaran dan pemrograman', 
                  '4' => 'Telekomunikasi', 
                  '5' => 'Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu', 
                  '6' => 'Kegiatan jasa informasi', 
                ),
                '11' => array(
                  '1' => 'Jasa keuangan, bukan asuransi dan dana pension', 
                  '2' => 'Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib', 
                  '3' => 'Jasa penunjang jasa keuangan, asuransi dan dana pensiun', 
                ),
                '12' => array(
                  '1' => 'Real estat', 
                ),
                '13' => array(
                  '1' => 'Jasa hukum dan akuntansi', 
                  '2' => 'Kegiatan kantor pusat dan konsultasi manajemen', 
                  '3' => 'Jasa arsitektur dan teknik sipil; analisis dan uji teknis', 
                  '4' => 'Penelitian dan pengembangan ilmu pengetahuan', 
                  '5' => 'Periklanan dan penelitian pasar', 
                  '6' => 'Jasa profesional, ilmiah dan teknis lainnya',
                  '7' => 'Jasa kesehatan hewan', 
                ),
                '14' => array(
                  '1' => 'Jasa persewaan dan sewa guna usaha tanpa hak opsi', 
                  '2' => 'Jasa ketenagakerjaan', 
                  '3' => 'Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya', 
                  '4' => 'Jasa keamanan dan penyelidikan', 
                  '5' => 'Jasa untuk gedung dan pertamanan', 
                  '6' => 'Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya', 
                ),
                '15' => array(
                  '1' => 'Administrasi pemerintahan, pertahanan dan jaminan sosial wajib', 
                ),
                '16' => array(
                  '1' => 'Jasa pendidikan', 
                  '2' => 'Bimbingan belajar', 
                  '3' => 'Penelitian bidang pendidikan', 
                  '4' => 'Konsultan pendidikan', 
                  '5' => 'Motivator/ToT', 
                  '6' => 'Translator',
                ),
                '17' => array(
                  '1' => 'Jasa kesehatan manusia dan konsultan gizi', 
                  '2' => 'Jasa kesehatan jiwa/psikolog', 
                  '3' => 'Jasa kegiatan sosial di dalam panti', 
                  '4' => 'Jasa kegiatan sosial di luar panti', 
                ),
                '18' => array(
                  '1' => 'Kegiatan hiburan, kesenian dan kreativitas', 
                  '2' => 'Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya', 
                  '3' => 'Sastrawan dan seniman', 
                  '4' => 'Kurator', 
                  '5' => 'Kegiatan olahraga dan rekreasi lainnya', 
                ),
                '19' => array(
                  '1' => 'Kegiatan keanggotaan organisasi', 
                  '2' => 'Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga', 
                  '3' => 'Jasa desain (desainer) dan industri fashion', 
                  '4' => 'Chef', 
                ),
                '20' => array(
                  '1' => 'Jasa perorangan yang melayani rumah tangga', 
                  '2' => 'Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan', 
                ),
                '21' => array(
                  '1' => 'Kegiatan badan internasional dan badan ekstra internasional lainnya', 
                ),
              );

              $data_c7= array(
                '1' => '0 – Rp 2.500.000', 
                '2' => 'Rp 2.500.000 – Rp 5.000.000', 
                '3' => 'Rp 5.000.000 – Rp 7.000.000', 
                '4' => '> Rp 7.000.000',
              );

              $data_c8= array(
                '1'=>['type'=>'text','name'=>'nama_perusahaan','title'=>'Nama Perusahaan'],
                  ['type'=>'textarea','name'=>'alamat_perusahaan','title'=>'Alamat Perusahaan'],
                  ['type'=>'text','name'=>'nama_pimpinan','title'=>'Nama Pimpinan'],
                  ['type'=>'text','name'=>'kontak_person_pimpinan','title'=>'Kontak Person Pimpinan'],
                  ['type'=>'email','name'=>'email_pimpinan','title'=>'Email Pimpinan'],
              );

              echo open_div('col-sm-12 col-lg-12');
                echo open_div('col-sm-6 col-lg-6');
                for ($i=1; $i <= 5 ; $i++) {
                  echo open_div('col-sm-12 col-lg-12','c'.$i);
                    echo open_div('form-group');
                      echo label($data_quest_c[$i]);
                      if ($i=='1') {
                        #loop data_c1
                        for ($j=1; $j <= count($data_c1) ; $j++) {
                          echo radio_label('c1','c1'.$j,'c1'.$j,$data_c1[$j]);
                        }

                      }elseif ($i=='2') {
                        #loop data_c2
                        for ($j=1; $j <= count($data_c2) ; $j++) {
                          if ($j=='5') {
                            echo radio_label('c2','c2','c2'.$j,$data_c2[$j].text('c2lainnya','c2lainnya'));

                          }else{
                            echo radio_label('c2','c2','c2'.$j,$data_c2[$j]);

                          }
                        }

                      }elseif ($i=='3') {
                        #loop data_c3
                        for ($j=1; $j <= count($data_c3) ; $j++) {
                          if ($j=='5') {
                            echo radio_label('c3','c3','c3'.$j,$data_c3[$j].text('c3lainnya','c3lainnya'));

                          }else{
                            echo radio_label('c3','c3','c3'.$j,$data_c3[$j]);

                          }
                        }

                      }elseif ($i=='4') {
                        #loop data_c4
                        for ($j=1; $j <= count($data_c4) ; $j++) {
                          if ($j=='5') {
                            echo radio_label('c4','c4','c4'.$j,$data_c4[$j].text('c4lainnya','c4lainnya'));

                          }else{
                            echo radio_label('c4','c4','c4'.$j,$data_c4[$j]);

                          }
                        }

                      }elseif ($i=='5') {
                        #loop data_d3
                        for ($j=1; $j <= count($data_c5) ; $j++) {
                          if ($j=='7') {
                            echo checkbox('c5[]','c5','c5'.$j,$data_c5[$j].text('c5lainnya','c5lainnya'));

                          }else{
                            echo checkbox('c5[]','c5','c5'.$j,$data_c5[$j]);

                          }
                        }

                      }
                    echo close_div();
                  echo close_div();

                }
                echo close_div();

                echo open_div('col-sm-6 col-lg-6');
                for ($i=6; $i <= count($data_quest_c) ; $i++) {
                  echo open_div('col-sm-12 col-lg-12');
                    echo open_div('form-group','asda');
                      echo label($data_quest_c[$i]);
                      if ($i=='6') {
                        #loop data_c6
                        // echo count($data_c6);
                        // for ($j=1; $j <= count($data_c6) ; $j++) {
                        //   echo open_div('form-group');
                        //     echo label($data_c6[$j]);
                        //     for ($k=1; $k <= count($data_c6sub[$j]) ; $k++) {
                        //       $sub= $data_c6sub[$j][$k];
                        //       echo radio_label('c6','c6','c6'.$k.'sub'.$j,$sub);
                        //     }
                        //   echo close_div();
                        // }
                        ?>
                        <div class="form-group">
                          <label>Kategori</label>
                          <select id='kategori' name="kategori" onchange='kat()' required class="form-control">
                            <?php foreach ($data_c6 as $key => $value) {
                              ?>
                              <option value="<?php echo $key ?>"><?php echo $value;?></option>
                              <?php
                            } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Sub Kategori</label>
                          <select id='subkategori' name="c6" required class="form-control">
                            <option value ='0' selected> -- Pilih Sub Kategori -- </option>
                          </select>
                        </div>
                        <?php

                      }elseif ($i=='7') {
                        #loop data_c7
                        for ($j=1; $j <= count($data_c7) ; $j++) {
                          echo radio_label('c7','c7'.$j,'c7'.$j,$data_c7[$j]);
                        }

                      }elseif ($i=='8') {
                        echo open_div('identitas_lembaga');
                          foreach ($data_c8 as $key => $value_c8) {
                            echo open_div('form-group');
                              if ($value_c8['type']=='textarea') {
                                echo label($value_c8['title']);
                                echo input_textarea($rows='4',$name=$value_c8['name'],$value=null,$placeholder='Masukan '.$value_c8['title'].' *',$class=$value_c8['name'],$id=null,$required=true);
                              }else{
                                echo label($value_c8['title']);
                                echo input_type($type=$value_c8['type'],$name=$value_c8['name'],$value=null,$placeholder='Masukan '.$value_c8['title'].' *',$class=$value_c8['name'],$id=null,$required=true);
                              }
                            echo close_div();
                          }
                        echo close_div();
                        # code...
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
<script type="text/javascript">
  function kat() {

    var kat = $('select#kategori option:selected').val();

    $.ajax( {
      type: 'POST',
      url: 'joinc/subkategori.php',
      data: {kat:kat},

      success: function(data) {
        $('#subkategori').html(data);
      }
    } );
  }
</script>