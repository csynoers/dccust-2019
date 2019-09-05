<?php
  require_once('form_helper.php');
  // check last kuis
  // get id alumni
  $id_alumni= $_SESSION['idnya'];
  // cek data from last fill kuisioner

  if (check_data('tb_a',$id_alumni) > 0) {
    # code...
    header('Location:kuis_b.html');

  }
?>
<section id="featured">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="row" style="margin-bottom: 46px;">
          <div class="bawah">
            <center><h3><span style="color: #009a54;;" data-mce-mark="1">Kuesioner</span></h3></center>
          </div>

          <div class="bawah">
              <center><h4><span style="color: #009a54;;" data-mce-mark="1">
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
                      echo "<a href='kuis_a.html'>Metode Pembelajaran</a>";
                      // echo "Metode Pembelajaran";
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
                     // echo "<a href='kuis_e.html'>Kompetensi</a>";
                     echo "Kompetensi";
                  }
                ?>
              </span></h4></center>
          </div>

          <div class="bawah">
            <h5><span style="color: #009a54;;" data-mce-mark="1">A. METODE PEMBELAJARAN</span></h5>
          </div>

          <form method="post" action="aksi_kuis_a.html" id="contactfrm" role="form">
            <!-- A1 -->
            <div class="col-sm-12 col-lg-12">
              <div class="form-group" id="a1">
                <label for="name">A1. Menurut Anda seberapa besar penggunaan metode pembelajaran di bawah ini pada program studi anda?</label>
                <table class="table table-striped table-condensed table-hover">
                  <thead>
                    <tr>
                      <th colspan="4">Tidak sama sekali</th>
                      <th colspan="4">Sangat besar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="width: 45px;"></td>
                      <td style="width: 45px;">1</td>
                      <td style="width: 45px;">2</td>
                      <td style="width: 45px;">3</td>
                      <td style="width: 45px;">4</td>
                      <td style="width: 45px;">5</td>
                      <td></td>
                    </tr>
                    <?php
                      $data_a1= array(
                                '1' => 'Perkuliahan',
                                '2' => 'Demonstrasi (Peragaan)',
                                '3' => 'Partisipasi dalam proyek riset', 
                                '4' => 'Magang', 
                                '5' => 'Praktikum kerja lapangan',
                                '6' => 'Diskusi',
                                '7' => 'Penugasan berbasis proyek'
                                );
                      for ($i=1; $i <= count($data_a1) ; $i++) { 
                        echo  "<tr>";
                          echo "<td>$i</td>";
                          for ($x = 1; $x <= 5; $x++) {
                            // radio('name','id','value');
                            echo "<td>".radio('a1'.$i,'a11',$x)."</td>";
                          }
                          echo "<td><label>$data_a1[$i]</label></td>"; 
                        echo "</tr>";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- A2 -->
            <div class="col-sm-12 col-lg-12">
              <div class="form-group" id="a2">
                <label for="name">A2. Bagaimana penilaian Anda mengenai suasana akademik di bawah ini?</label>
                <table class="table table-striped table-condensed table-hover">
                  <thead>
                    <tr>
                      <th colspan="4">Tidak sama sekali</th>
                      <th colspan="4">Sangat besar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="width: 45px;"></td>
                      <td style="width: 45px;">1</td>
                      <td style="width: 45px;">2</td>
                      <td style="width: 45px;">3</td>
                      <td style="width: 45px;">4</td>
                      <td style="width: 45px;">5</td>
                      <td></td>
                    </tr>
                    <?php
                      $data_a2= array(
                                '1' => 'Kesempatan untuk berinteraksi dengan dosen-dosen di luar jadwal kuliah',
                                '2' => 'Pembimbingan akademik',
                                '3' => 'Kesempatan berpartisipasi dalam penelitian dan pengabdian masyarakat', 
                                '4' => 'Keikutsertaan dalam lembaga kemahasiswaan dan unit kegiatan mahasiswa (UKM)', 
                                '5' => 'Kesempatan untuk memasuki dan menjadi bagian dari jejaring ilmiah profesional',
                                '6' => 'Lainya'
                                );
                      for ($i=1; $i <= count($data_a2) ; $i++) { 
                        echo  "<tr>";
                          echo "<td>$i</td>";
                          for ($x = 1; $x <= 5; $x++) {
                            // radio('name','id','value');
                            echo "<td>".radio('a2'.$i,'a21',$x)."</td>";
                          }
                          echo "<td>
                                  <label>$data_a2[$i]</label>";
                                  if($i=='6'){
                                    echo '&nbsp;&nbsp;&nbsp;'.text('a26isi','a26isi');
                                  }
                          echo "</td>"; 
                        echo "</tr>";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- A3 -->
            <div class="col-sm-12 col-lg-12">
                <div class="form-group" id="a3">
                  <label for="name">A3. Bagaimana penilaian Anda terhadap kondisi fasilitas belajar di bawah ini? </label>
                  <table class="table table-striped table-condensed table-hover">
                    <thead>
                      <tr>
                        <th colspan="4">Tidak sama sekali</th>
                        <th colspan="4">Sangat besar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="width: 45px;"></td>
                        <td style="width: 45px;">1</td>
                        <td style="width: 45px;">2</td>
                        <td style="width: 45px;">3</td>
                        <td style="width: 45px;">4</td>
                        <td style="width: 45px;">5</td>
                        <td></td>
                      </tr>
                      <?php
                      $data_a3= array(
                                '1' => 'Perpustakaan',
                                '2' => 'Teknologi Informasi dan Komunikasi',
                                '3' => 'Modul belajar', 
                                '4' => 'Ruang belajar', 
                                '5' => 'Laboratorium',
                                '6' => 'Fasilitas ibadah',
                                '7' => 'Asrama mahasiswa',
                                '8' => 'Kantin',
                                '9' => 'Pusat kegiatan mahasiswa dan fasilitasnya, ruang rekreasi',
                                '10' => 'Fasilitas layanan kesehatan',
                                '11' => 'Fasilitas olahraga dan seni',
                                '12' => 'Lainya',
                                );
                      for ($i=1; $i <= count($data_a3) ; $i++) { 
                        echo  "<tr>";
                          echo "<td>$i</td>";
                          for ($x = 1; $x <= 5; $x++) {
                            // radio('name','id','value');
                            echo "<td>".radio('a3'.$i,'a31',$x)."</td>";
                          }
                          echo "<td>
                                  <label>$data_a3[$i]</label>";
                                  if($i=='12'){
                                    echo '&nbsp;&nbsp;&nbsp;'.text('a312isi','a312isi');
                                  }
                          echo "</td>"; 
                        echo "</tr>";
                      }
                    ?>
                    </tbody>
                  </table>
                </div>
            </div>

            <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">Lanjutkan</button>
            <div class="result"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
$(document).ready(function(){
  $('#a26isi').prop("disabled", true);
  $('#a312isi').prop("disabled", true);
  $('input:radio[name="a26"]').slice(0).prop("required", false);
  $('input:radio[name="a312"]').slice(0).prop("required", false);

  $('input:radio[name="a26"]').change(function(){
    if ($(this).is(':checked')) {
        // append goes here
        $('#a26isi').prop("disabled", false);
        $('#a26isi').prop("required", true);
    }
  });

  $('input:radio[name="a312"]').change(function(){
    if ($(this).is(':checked')) {
        // append goes here
        $('#a312isi').prop("disabled", false);
        $('#a312isi').prop("required", true);
    }
  });

});
</script>