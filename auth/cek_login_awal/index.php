<?php 
	//mengambiil file yang berisi konfigurasi global untuk situs
	//berlaku disemua direktori, isi:
	//- definisi tag PHP
	//- username, password dan nama database
	//- timezone yang digunakan
	//- konfigurasi error php
	//- dan konfigurasi lainnya yang bisa di tambahkan di file tersebut
	require_once ("../../josys/koneksi.php");

	//mengambil file yang diperlukan untuk operasional website
	require_once ("Akun_User.php");


	

	//memeriksa status login
	$statusLogin = Akun_User::cekStatusLogin();

	// kondisi jika sudah login
	if($statusLogin == TRUE && !isset($_GET['logout'])){
		//mengambil menu top bar
		require_once("joinc/top-bar.php");
		require_once("joinc/sidebar-menu.php");
		require_once("joinc/konten-baru.php");	
		require_once("joinc/footer-template.php");
	}elseif(isset($_GET['aksi']) && $_GET['aksi'] == "daftarBaru" && $statusLogin == FALSE){
		require_once("joinc/signup.php");
	}

	// jika kondisi login salah username atau password
	elseif($statusLogin == FALSE){

			if(isset($_GET['signUp'])){
				$hasilLogin = 0;
				if(isset($_GET['signUp']) == "signup"){

					$daftar = new Akun_User;
					$daftar->simpanNilai($_POST);
					$hasilDaftar = $daftar->registerUser();

					if(is_numeric($hasilDaftar['hasilOperasi'])){
						$dataArray[] = array();
						$dataArray['username'] = $daftar->username;
						$dataArray['password'] = $_POST['password'];

						$login = new Akun_User;
						$login->simpanNilai($dataArray);
						$hasilLogin = $login->login() == TRUE ? 1 : 0;
					}			

					header("Location: index.php?proses=login&ho=$hasilLogin");
					exit();
				}
			}elseif(isset($_POST['login'])){
				$hasilLogin = 0;
				if(isset($_POST['login']) == "login"){

						$login = new Akun_User;
						$login->simpanNilai($_POST);
						$hasilLogin = $login->login() == TRUE ? 1 : 0;
					}
					
					//echo $hasilLogin;exit();
					echo "<script>window.location.href='index.php?proses=login&ho=$hasilLogin'</script>";			
					//header("Location: index.php?proses=login&ho=$hasilLogin");
					exit();					
			}

		require_once("joinc/login.php");

	}elseif((isset($_GET['logout']) && $_GET['logout'] == "logout") && $statusLogin == TRUE){
		Akun_User::logout();
		header("Location: index.php");
	}
	

	//mengambil file yang berisi tag body dan tag html lainnya yang diperlukan
	//include("joinc/body-template.php");

	//mengambil footer 
	
	

 ?>