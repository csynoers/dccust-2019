<?php 
	//mengambiil file yang berisi konfigurasi global untuk situs
	//berlaku disemua direktori, isi:
	//- definisi tag PHP
	//- username, password dan nama database
	//- timezone yang digunakan
	//- konfigurasi error php
	//- dan konfigurasi lainnya yang bisa di tambahkan di file tersebut
	require_once ("../josys/koneksi.php");

	//mengambil file yang diperlukan untuk operasional website
	require_once ("Akun_User.php");
	ini_set("display_errors", false);

	

	//memeriksa status login
	$statusLogin = Akun_User::cekStatusLogin();

	// jika kondisi login salah username atau password
	if($statusLogin == FALSE){
		if(isset($_POST['login'])){
				$hasilLogin = 0;
				if(isset($_POST['login']) == "login"){

						$login = new Akun_User;
						$login->simpanNilai($_POST);						
						$hasilLogin = $login->login() == TRUE ? 1 : 0;						
					}
					
					$header = $hasilLogin == 1 ? "../login-dccustjogja.html" : "../" ;
					//echo $hasilLogin;exit();
					
					//echo "<script>window.location.href='index.php?proses=login&ho=$hasilLogin'</script>";			
					//header("Location: index.php?proses=login&ho=$hasilLogin");
					//exit();					
			}
			
	}elseif((isset($_GET['logout']) && $_GET['logout'] == "logout") && $statusLogin == TRUE){		
		Akun_User::logout();
		$header="../home-dccustjogja.html";
		echo "<script>window.location.href='/'</script>";exit();		
	}
	
	header("Location: $header");

	//mengambil file yang berisi tag body dan tag html lainnya yang diperlukan
	//include("joinc/body-template.php");

	//mengambil footer 
	
	

 ?>