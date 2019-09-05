<?php 
session_start();

	class Akun_User{
		//atribut user (database)
		public $id_alumni = null;
		public $nama = null;
		public $username = null;
		public $password = null;
		public $isi_alumni_ina = null;
		public $isi_alumni_en = null;
		public $tanggal = null;
		public $gambar = null;
		public $id_session = null;

		//variabel operasional
		public $status_login = null;
		public $jumlah_login = null;
		public $hasil_registrasi = null;


		public function __construct($data=array()){
			if(isset($data['id_alumni'])) $this->id_alumni = (int) $data['id_alumni'];
			if(isset($data['nama'])) $this->nama = $data['nama'];
			if(isset($data['username'])) $this->username = $data['username'];
			if(isset($data['password'])) $this->password = $data['password'];
			if(isset($data['isi_alumni_ina'])) $this->isi_alumni_ina = $data['isi_alumni_ina'];
			if(isset($data['isi_alumni_en'])) $this->isi_alumni_en = $data['isi_alumni_en'];
			if(isset($data['tanggal'])) $this->tanggal = $data['tanggal'];
			if(isset($data['gambar'])) $this->gambar = $data['gambar'];
			if(isset($data['id_session'])) $this->id_session = $data['id_session'];
		}

		public function simpanNilai($parameter){
			$this->__construct($parameter);
		}

		public static function cekStatusLogin(){
			
			$cekLogin=FALSE;
				if(isset($_SESSION['login_status']) && $_SESSION['login_status'] == TRUE){
					$sessionId = session_id();

					$koneksi = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
					$sql = "SELECT * from alumni_daftar WHERE username = :username AND id_session = :id_session LIMIT 1";
					$st = $koneksi->prepare($sql);
					$st->bindValue(":username", $_SESSION['username'], PDO::PARAM_STR);
					$st->bindValue(":id_session", $sessionId , PDO::PARAM_STR);
					$st->execute();
					$hasil = $st->fetch();
					$koneksi = null;
					$cekLogin = isset($hasil['id']) && !is_null($hasil['id']) && !empty($hasil['id']) ? TRUE : FALSE ;					
				}
				else{
					$cekLogin = FALSE;
				}
			return $cekLogin;
		}

		public static function ambilAkunUserBySessionId($session_id){
			$koneksi = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$sql = "SELECT * from user WHERE id_session = :id_session LIMIT 1";
			$st = $koneksi->prepare($sql);
			$st->bindValue(":id_session", $session_id, PDO::PARAM_STR);
			$st->execute();
			$hasil = $st->fetch();
			$koneksi = null;
			if($hasil) return new Akun_User($hasil);			
		}

		public function cekPasswordSunting(){
			$koneksi = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$sql = "SELECT * from alumni_daftar WHERE id_alumni = :id LIMIT 1";
			$st = $koneksi->prepare($sql);
			$st->bindValue(":id", $this->id_alumni, PDO::PARAM_INT);			
			$st->execute();
			$cekDb = $st->fetch();
			$cekPassword = FALSE;			

			if(crypt($this->password, $cekDb['password']) == $cekDb['password']){
				$cekPassword = TRUE;			
			}else{
				$cekPassword = FALSE;			
			}
			return $cekPassword;
		}

		public function suntingAkun(){
			//memeriksa apakah objek yang akan diproses memiliki id
			if(is_null($this->id_alumni)) trigger_error("Pesan error -> Akun_User::suntingAkun(): Mencoba untuk menambah objek kedalam database namun sudah memiliki ID (to $this->id_alumni). <br> Harap sampaikan pesan error ini kepada Jogjasite untuk tindak lebih lanjut", E_USER_ERROR);
			
			$salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        	$this->password = crypt($this->password, $salt);

			//Menyunting kategori kedalam database
			$koneksi = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
			$sql = "UPDATE alumni_daftar SET password = :password,
											 username = :username,
											 nama = :nama,
											 isi_alumni_ina = :isi_alumni_ina,
											 isi_alumni_en = :isi_alumni_en,
									   WHERE id_alumni = :id";
			$st = $koneksi->prepare($sql);
			$st->bindValue(":id", $this->id_alumni, PDO::PARAM_INT);		   			
		    $st->bindValue(":nama", $this->nama, PDO::PARAM_STR);		   
		    $st->bindValue(":username", $this->username, PDO::PARAM_STR);		   
		    $st->bindValue(":password", $this->password, PDO::PARAM_STR);		   
		    $st->bindValue(":isi_alumni_ina", $this->isi_alumni_ina, PDO::PARAM_STR);		   
		    $st->bindValue(":isi_alumni_en", $this->isi_alumni_en, PDO::PARAM_STR);		   
			$st->execute();
			$hasilDb = $st->rowCount();
			$koneksi = null;
			return $hasilDb;			
		}

	 	public function login(){

			$koneksi = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$sql = "SELECT * from alumni_daftar WHERE username = :username LIMIT 1";
			$st = $koneksi->prepare($sql);
			$st->bindValue(":username", $this->username, PDO::PARAM_STR);			
			$st->execute();
			$cekDb = $st->fetch();

			if(crypt($this->password, $cekDb['password']) != $cekDb['password']){
				$this->status_login = FALSE;
			}else{
				$this->status_login = TRUE;

				session_regenerate_id();
				$this->id_session = session_id();

				//mengisi session				
				$_SESSION['username'] = $this->username;
				$_SESSION['login_status'] = TRUE;

				$sql = "UPDATE alumni_daftar SET id_session = :id_session WHERE id_alumni = :id LIMIT 1";
				$st = $koneksi->prepare($sql);
				$st->bindValue(":id", $cekDb['id_alumni'], PDO::PARAM_INT);			
				$st->bindValue(":id_session", $this->id_session, PDO::PARAM_STR);			
				$st->execute();
				$koneksi = null;
			}
			return $this->status_login;
	 	}

	 	public function logout(){
	 		$koneksi = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$sql = "UPDATE alumni_daftar SET id_session = :id_session WHERE username = :username LIMIT 1";
			$st = $koneksi->prepare($sql);
			$st->bindValue(":id_session", "OFF", PDO::PARAM_STR);			
			$st->bindValue(":username", $_SESSION['username'], PDO::PARAM_STR);			
			$st->execute();
			$koneksi = null;
			session_destroy();
	 	}

	 	public function registerUser(){
	 		if(!is_null($this->id_alumni)) trigger_error("Pesan error -> Akun_User::registerUser(): Mencoba untuk menambah objek kedalam database namun sudah memiliki ID (to $this->id). <br> Harap sampaikan pesan error ini kepada Jogjasite untuk tindak lebih lanjut", E_USER_ERROR);

	 		//menghilangkan extra space
	 		$this->username = trim($this->username);

	 		//memeriksa username
	 			$koneksi = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
				$sql = "SELECT * from alumni_daftar WHERE username = :username";
				$st = $koneksi->prepare($sql);
				$st->bindValue(":username", $this->username, PDO::PARAM_STR);				
				$st->execute();
				$cekUsername = $st->fetchAll();
				$koneksi = null;

			if(count($cekUsername) > 0){
				$this->hasil_registrasi = FALSE;
			}else{
 					$salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        			$this->password = crypt($this->password, $salt);		

			//Memasukan data kedalam database
				$koneksi = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
				$sql = "INSERT INTO alumni_daftar (username,
												  nama,
												  password,
												  isi_alumni_ina,
												  isi_alumni_en,
												  gambar,
												  tanggal
												  )												  
		                             VALUES( :username,
											   :nama,
											  :password,
											  :isi_alumni_ina,
											  :isi_alumni_en,
											  :gambar,
											  :tanggal)";
			   $st = $koneksi->prepare($sql);		   		   		   
			   $st->bindValue(":username", $this->username, PDO::PARAM_STR);
			   $st->bindValue(":nama", $this->nama, PDO::PARAM_STR);
			   $st->bindValue(":password", $this->password, PDO::PARAM_STR);			   
			   $st->bindValue(":gambar", $this->gambar, PDO::PARAM_STR);			   
			   $st->bindValue(":isi_alumni_ina", $this->isi_alumni_ina, PDO::PARAM_STR);			   
			   $st->bindValue(":isi_alumni_en", $this->isi_alumni_en, PDO::PARAM_STR);			   
			   $st->bindValue(":tanggal", $this->tanggal, PDO::PARAM_STR);
			   $st->execute();
			   $this->id_alumni = $koneksi->lastInsertId();		   
			   $koneksi = null;

			   return (array("hasilOperasi" => $this->id_alumni));
			}
	 	}



	}

 ?>