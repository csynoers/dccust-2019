<?php
  // check last kuis
  // get id alumni
  $id_alumni= $_SESSION['idnya'];

  # cek data from last fill kuisioner
  $rows= $db->get_select("SELECT id_alumni FROM biodata WHERE id_alumni='{$id_alumni}'");

  if ( count($rows['data']) > 0) {
    # code...
    header('Location:kuis_a.html');

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
<script>
$(document).ready(function() {
    $("#negara").change(function() {
        var negara =$(this).val();
        var dataString = 'negara='+negara;
        $.ajax({
            type: "POST",
            url: "http://localhost/9_SEPT_2016/tracerust/joinc/getkota.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#kota").html(html);
            }
        });
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
            <center><h4><span style="color: #009a54;;" data-mce-mark="1">
                <?php
                  // bidata
                  $cek = $db->get_select("SELECT * FROM biodata WHERE id_alumni = '$_SESSION[idnya]'");
                  if ( count($cek['data']) >0) {
                      echo "Biodata";
                  }else{
                      echo "<a href='kuesioner.html'>Biodata</a>";
                      // echo "Biodata";
                  }
                  echo "|";

                  // A
                  $cek = $db->get_select("SELECT * FROM tb_a WHERE id_alumni = '$_SESSION[idnya]'");
                  if ( count($cek['data'])>0) {
                      echo "Metode Pembelajaran";
                  }else{
                      // echo "<a href='kuis_a.html'>Metode Pembelajaran</a>";
                      echo "Metode Pembelajaran";
                  }
                  echo "|";

                  // B
                  $cek = $db->get_select("SELECT * FROM tb_b WHERE id_alumni = '$_SESSION[idnya]'");
                  if ( count($cek['data'])>0) {
                      echo "Masa Transisi";
                  }else{
                     // echo "<a href='kuis_b.html'>Masa Transisi</a>";
                    echo "Masa Transisi";
                  }
                  echo "|";

                  // C
                  $cek = $db->get_select("SELECT * FROM tb_c WHERE id_alumni = '$_SESSION[idnya]'");
                  if ( count($cek['data'])>0) {
                      echo "Pekerjaan Sekarang";
                  }else{
                     // echo "<a href='kuis_c.html'>Pekerjaan Sekarang</a>";
                     echo "Pekerjaan Sekarang";
                  }
                  echo "|";

                  // D
                  $cek = $db->get_select("SELECT * FROM tb_d WHERE id_alumni = '$_SESSION[idnya]'");
                  if ( count($cek['data'])>0) {
                      echo "Keselarasan Vertikal & Horizontal";
                  }else{
                     // echo "<a href='kuis_d.html'>Keselarasan Vertikal & Horizontal</a>";
                     echo "Keselarasan Vertikal & Horizontal";
                  }
                  echo "|";

                  // E
                  $cek = $db->get_select("SELECT * FROM tb_e WHERE id_alumni = '$_SESSION[idnya]'");
                  if ( count($cek['data'])>0) {
                      echo "Kompetensi";
                  }else{
                     // echo "<a href='kuis_e.html'>Kompetensi</a>";
                     echo "Kompetisi";
                  }
                ?>
            </span></h4></center>
        </div>

        <div class="bawah">
          <h5><span style="color: #009a54;;" data-mce-mark="1">BIODATA</span></h5>
        </div>
        <?php
          $a = $db->get_select("SELECT a.nama_alumni, a.nim, a.tahun_lulus, a.email, p.prodi,p.id_prodi
                                                    FROM alumni_daftar a LEFT JOIN prodi p
                                                    ON  a.prodi = p.id_prodi
                                                    WHERE a.id_alumni = '$_SESSION[idnya]'")['data'][0];
         ?>
        <form method="post" action="aksi_biodata.html" id="contactfrm" role="form">
          <input type="hidden" name="prodi_id" value="<?php echo $a->id_prodi?>">
          <div class="col-sm-6 col-lg-6">
            <div class="form-group">
              <label for="name">1. Nama</label>
              <input type="text" class="form-control" name="nama" readonly value="<?php echo $a->nama_alumni; ?>">
            </div>

            <div class="form-group">
              <label for="name">3. Tahun Lulus</label>
              <input type="text" class="form-control" name="th_lulus" readonly value="<?php echo $a->tahun_lulus; ?>">
            </div>

            <div class="form-group">
              <label for="name">5. Nomor HP</label>
              <input type="telp" maxlength="15" class="form-control" name="no_hp" placeholder="081234567890" required>
            </div>

            <div class="form-group">
              <label for="name">7. Alamat Domisili</label>
              <textarea name="almt_domisili" class="form-control" rows="4" cols="30" placeholder="Masukan alamat domisili ..." required></textarea>
            </div>
          </div>
          <div class="col-sm-6 col-lg-6">
              <div class="form-group">
                <label for="name">2. NIM</label>
                <input type="text" class="form-control" name="nim" readonly value="<?php echo $a->nim; ?>">
              </div>
              <div class="form-group">
                <label for="name">4. Program Studi</label>
                <input type="text" class="form-control" name="prodi" readonly value="<?php echo $a->prodi; ?>">
              </div>
              <div class="form-group">
                <label for="name">6. Email</label>
                <input type="text" class="form-control" name="email" required value="<?php echo $a->email; ?>">
              </div>
              <div class="form-group">
                <label for="name">8. Alamat KTP</label>
                <textarea name="almt_ktp" class="form-control" rows="4" cols="30" placeholder="Masukan alamat sesuai ktp ..." required></textarea>
              </div>
              <button name="submit" type="submit" class="btn btn-lg btn-primary pull-right" id="submit">Lanjutkan</button>
          </div>
        </form>

          </div>
      </div>
    </div>
  </div>
</section>