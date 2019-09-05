<?php
    include 'captcha.php';
    $captcha1 = new mathcaptcha();
    $captcha1->generatekode();
?>
<script type='text/javascript'>
	function refresh_Captcha(){
		var img = document.images['captcha_img'];
		img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
	}
</script>
<section id="featured">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
			  <div class="row" style="margin-bottom: 46px;">
				<div class="bawah">
					<center><h5><span style="color: #009a54;;" data-mce-mark="1">Cek Alumni</span></h5></center>
				</div>
				  <form method="post" action="daftaralumni" id="contactfrm" role="form">

                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <label for="name">Nomor Mahasiswa </label>
                            <input type="text" class="form-control" required="" name="nim" id="nim" placeholder="Masukkan Nomor Mahasiswa" title="">
                        </div>
                        <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">Cek</button>
                    </div>
                    <div class="col-sm-6">
                        <!-- <div class="form-group">
                            <label for="email">Perhatian !!!</label>
                            <p>Apabila anda merasa sebagai alumni UST, tetapi NIM anda tidak terdaftar harap hubungi admin DCC UST </p>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Mahasiswa </label>
                            <input type="text" class="form-control" required="" name="nama" id="name" placeholder="Masukkan Nama Anda" title="">
                        </div>
                        <div class="form-group">
                            <label for="name">Jenjang </label>
                            <select name="jen" class="form-control">
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Fakultas </label>
                            <input type="text" class="form-control" required="" name="fak" id="fak" placeholder="Fakultas" title="">
                        </div>
                        <div class="form-group">
                            <label for="name">Program Studi </label>
                            <input type="text" class="form-control" required="" name="prodi" id="prodi" placeholder="Program Studi" title="">
                        </div>
                        <div class="form-group">
                            <label for="name">Angkatan </label>
                            <input type="text" class="form-control" required="" name="angk" id="angk" placeholder="Angkatan" title="">
                        </div>
                    </div>
                    <div class="col-sm-6">
						<div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" required="" name="email" id="email" placeholder="Masukkan Email Anda" title="">
                        </div>
						<div class="form-group">
                            <label for="name">Phone</label>
                            <input type="text" class="form-control" required="" name="phone" id="phone" placeholder="Masukkan hp/Telp Anda" title="">
                        </div>
						<div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" required="" name="username" id="username" placeholder="Masukkan Username" title="">
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" class="form-control" required="" name="password" id="password" placeholder="Ketik Password Anda" title="">
                        </div>
                        <div class="form-group">
                            <label for="name">Re-Password</label>
                            <input type="password" class="form-control" required="" name="repass" id="repass" placeholder="Ketik Ulang Password Anda" title="">
                        </div>
                        <div class="form-group">
                        <label>Isikan Captcha :</label>
                        <?php $captcha1->showcaptcha();
                        echo "<input style='border: 1px solid  #DDD; width:40px;' type=text name='kode' maxlength=6><input type=hidden name=rahasia value='".$_SESSION['kode']."'>";?>
                    </div> -->
                        
                        <div class="result"></div>
                    </div>
                </form>	
			  </div>
			</div>
		</div>
</div>
</section>