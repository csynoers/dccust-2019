<?php 
$alumni = mysql_query("SELECT *
FROM
    `alumni_daftar`
    INNER JOIN `fakultas` 
        ON (`alumni_daftar`.`fakultas` = `fakultas`.`id_fakultas`)
    INNER JOIN `prodi` 
        ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`) WHERE nim = '$_GET[nim]'");
$dalumni = mysql_fetch_assoc($alumni);
?>
<section id="featured">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
			  <div class="row" style="margin-bottom: 46px;">
				<div class="bawah">
					<center><h5><span style="color: #009a54;;" data-mce-mark="1">Data Alumni</span></h5></center>
				</div>
				<form method="post" action="emailpass.html" id="contactfrm" role="form">
				 <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <label for="name">Nomor Mahasiswa </label>
                            <input type="text" class="form-control" readonly="" name="nim" id="nim" placeholder="Masukkan Nomor Mahasiswa" title="" value="<?php echo $dalumni['nim'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Mahasiswa </label>
                            <input type="text" class="form-control" readonly="" name="nama" id="name" placeholder="Masukkan Nama Anda" title="" value="<?php echo $dalumni['nama_alumni'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="tahun_lulus">Tahun Lulus </label>
                            <input type="text" class="form-control" readonly="" name="tahun_lulus" id="tahun_lulus" placeholder="Masukkan Tahun Lulus *" title="" value="<?php echo $dalumni['tahun_lulus'] ?>">
                        </div>
                        <!-- <div class="form-group">
                            <label for="name">Jenjang </label>
                            <input type="text" class="form-control" readonly="" name="nama" id="name" placeholder="Masukkan Nama Anda" title="" value="<?php //echo $dalumni['jenjang'] ?>">
                        </div> -->
                        <div class="form-group">
                            <label for="name">Fakultas </label>
                            <input type="text" class="form-control" readonly="" name="fak" id="fak" placeholder="Fakultas" title="" value="<?php echo $dalumni['fakultas'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Program Studi </label>
                            <input type="text" class="form-control" readonly="" name="prodi" id="prodi" placeholder="Program Studi" title="" value="<?php echo $dalumni['prodi'] ?>">

                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP </label>
                            <input type="text" class="form-control" readonly="" name="no_hp" id="no_hp" placeholder="No. HP *" title="" value="<?php echo $dalumni['phone'] ?>">

                        </div>
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="text" class="form-control" readonly="" name="email" id="email" placeholder="Email * example@gmail.com" title="" value="<?php echo $dalumni['email'] ?>">

                        </div>
                        <div class="form-group">
                            <label for="alamat_domisli">Alamat Domisli </label>
                            <input type="text" class="form-control" readonly="" name="alamat_domisli" id="alamat_domisli" placeholder="alamat domisli *" title="" value="<?php echo $dalumni['alamat_domisli'] ?>">

                        </div>
                        <div class="form-group">
                            <label for="alamat_ktp">Alamat KTP </label>
                            <input type="text" class="form-control" readonly="" name="alamat_ktp" id="alamat_ktp" placeholder="Alamat KTP *" title="" value="<?php echo $dalumni['alamat_ktp'] ?>">

                        </div>
                    </div>
                    <div class="col-sm-6">
						<div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email Anda" title="" value="<?php echo $dalumni['email'] ?>">
                        </div>
                        <input type="hidden" name="nim" value="<?php echo $dalumni['nim'] ?>">
                        <button type="submit" class="btn btn-lg btn-primary">Kirim Password</button>
						<div class="result"></div>
                    </div>
</form>
			  </div>
			</div>
		</div>
</div>
</section>