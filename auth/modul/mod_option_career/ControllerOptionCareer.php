<?php
    class ControllerOptionCareer
    {
        public function __construct($db_config){
			$this->Model 	= new ModelOptionCareer($db_config);
			$this->aksi		= 'modul/mod_option_career/ControllerOptionCareer.php';
			$this->module 	= 'option_career';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'add_jenis_lowongan':
					# view add form
					include_once("modul/mod_option_career/view_add_jenis_lowongan.php");
					break;
				case 'add_spesialisasi_pekerjaan':
					# view add form
					include_once("modul/mod_option_career/view_add_spesialisasi_pekerjaan.php");
					break;
				case 'add_tingkat_jabatan':
					# view add form
					include_once("modul/mod_option_career/view_add_tingkat_jabatan.php");
					break;
				case 'add_penempatan':
					# view add form
					include_once("modul/mod_option_career/view_add_penempatan.php");
					break;

				case 'edit_jenis_lowongan':
					# view edit form
					$row= $this->Model->get_jenis_lowongan($_GET['id'])[0];
					include_once("modul/mod_option_career/view_edit_jenis_lowongan.php");
                    break;
				case 'edit_spesialisasi_pekerjaan':
					# view edit form
					$row= $this->Model->get_spesialisasi_pekerjaan($_GET['id'])[0];
					include_once("modul/mod_option_career/view_edit_spesialisasi_pekerjaan.php");
                    break;
				case 'edit_tingkat_jabatan':
					# view edit form
					$row= $this->Model->get_tingkat_jabatan($_GET['id'])[0];
					include_once("modul/mod_option_career/view_edit_tingkat_jabatan.php");
                    break;
				case 'edit_penempatan':
					# view edit form
					$row= $this->Model->get_penempatan($_GET['id'])[0];
					include_once("modul/mod_option_career/view_edit_penempatan.php");
                    break;

                case 'store_jenis_lowongan':
                    # insert/update jenis_lowongan
                    $this->store_jenis_lowongan();					
					break;
                case 'store_spesialisasi_pekerjaan':
                    # insert/update spesialisasi_pekerjaan
                    $this->store_spesialisasi_pekerjaan();					
					break;
                case 'store_tingkat_jabatan':
                    # insert/update tingkat_jabatan
                    $this->store_tingkat_jabatan();					
					break;
                case 'store_penempatan':
                    # insert/update penempatan
                    $this->store_penempatan();					
					break;

				case 'delete_jenis_lowongan':
                    # delete jenis_lowongan
                    $this->delete_jenis_lowongan();
					break;
				case 'delete_spesialisasi_pekerjaan':
                    # delete spesialisasi_pekerjaan
                    $this->delete_spesialisasi_pekerjaan();
					break;
				case 'delete_tingkat_jabatan':
                    # delete tingkat_jabatan
                    $this->delete_tingkat_jabatan();
					break;
				case 'delete_penempatan':
                    # delete penempatan
                    $this->delete_penempatan();
					break;
				
				default:
                    # if action is null load view index
                    $this->index();
					break;
			}
        }
        
        public function index()
        {
            $rows=[];
            $rows['jenis_lowongan']= $this->Model->get_jenis_lowongan();
            $rows['spesialisasi_pekerjaan']= $this->Model->get_spesialisasi_pekerjaan();
            $rows['tingkat_jabatan']= $this->Model->get_tingkat_jabatan();
            $rows['penempatan']= $this->Model->get_penempatan();

            include_once("modul/mod_option_career/view_index.php");
        }

        # insert/update rows[jenis_lowongan,spesialisasi_pekerjaan,tingkat_jabatan,penempatan]
        public function store_jenis_lowongan()
        {
            $this->Model->post= $_POST;
            if ( $_POST['operation']=='insert' ) {
                # insert
                if ( $this->Model->insert_jenis_lowongan() ) {
                    # TRUE
                    # location header
                    echo "<script>alert('Data berhasil ditambahkan'); window.history.go(-2);</script>";
                    
                } else {
                    # FALSE
                    # location header
                    echo "<script>alert('Data gagal ditambahkan'); window.history.back();</script>";

                }

            } else {
                # update
                if ( $this->Model->update_jenis_lowongan() ) {
                    # TRUE
                    # location header
                    echo "<script>alert('Data berhasil diubah'); window.history.go(-2);</script>";
                    
                } else {
                    # FALSE
                    # location header
                    echo "<script>alert('Data gagal diubah'); window.history.back();</script>";

                }

            }
        }
        public function store_spesialisasi_pekerjaan()
        {
            $this->Model->post= $_POST;
            if ( $_POST['operation']=='insert' ) {
                # insert
                if ( $this->Model->insert_spesialisasi_pekerjaan() ) {
                    # TRUE
                    # location header
                    echo "<script>alert('Data berhasil ditambahkan'); window.history.go(-2);</script>";
                    
                } else {
                    # FALSE
                    # location header
                    echo "<script>alert('Data gagal ditambahkan'); window.history.back();</script>";

                }

            } else {
                # update
                if ( $this->Model->update_spesialisasi_pekerjaan() ) {
                    # TRUE
                    # location header
                    echo "<script>alert('Data berhasil diubah'); window.history.go(-2);</script>";
                    
                } else {
                    # FALSE
                    # location header
                    echo "<script>alert('Data gagal diubah'); window.history.back();</script>";

                }

            }
        }
        public function store_tingkat_jabatan()
        {
            $this->Model->post= $_POST;
            if ( $_POST['operation']=='insert' ) {
                # insert
                if ( $this->Model->insert_tingkat_jabatan() ) {
                    # TRUE
                    # location header
                    echo "<script>alert('Data berhasil ditambahkan'); window.history.go(-2);</script>";
                    
                } else {
                    # FALSE
                    # location header
                    echo "<script>alert('Data gagal ditambahkan'); window.history.back();</script>";

                }

            } else {
                # update
                if ( $this->Model->update_tingkat_jabatan() ) {
                    # TRUE
                    # location header
                    echo "<script>alert('Data berhasil diubah'); window.history.go(-2);</script>";
                    
                } else {
                    # FALSE
                    # location header
                    echo "<script>alert('Data gagal diubah'); window.history.back();</script>";

                }

            }
        }
        public function store_penempatan()
        {
            $this->Model->post= $_POST;
            if ( $_POST['operation']=='insert' ) {
                # insert
                if ( $this->Model->insert_penempatan() ) {
                    # TRUE
                    # location header
                    echo "<script>alert('Data berhasil ditambahkan'); window.history.go(-2);</script>";
                    
                } else {
                    # FALSE
                    # location header
                    echo "<script>alert('Data gagal ditambahkan'); window.history.back();</script>";

                }

            } else {
                # update
                if ( $this->Model->update_penempatan() ) {
                    # TRUE
                    # location header
                    echo "<script>alert('Data berhasil diubah'); window.history.go(-2);</script>";
                    
                } else {
                    # FALSE
                    # location header
                    echo "<script>alert('Data gagal diubah'); window.history.back();</script>";

                }

            }
        }

        # delete rows[jenis_lowongan,spesialisasi_pekerjaan,tingkat_jabatan,penempatan]
        public function delete_jenis_lowongan()
        {
            if ( $this->Model->delete_jenis_lowongan($_GET['id']) ) {
                # TRUE
                # location header
                echo "<script>alert('Data berhasil dihapus'); window.history.go(-1);</script>";
                
            } else {
                # FALSE
                # location header
                echo "<script>alert('Data gagal dihapus'); window.history.back();</script>";

            }
        }
        public function delete_spesialisasi_pekerjaan()
        {
            if ( $this->Model->delete_spesialisasi_pekerjaan($_GET['id']) ) {
                # TRUE
                # location header
                echo "<script>alert('Data berhasil dihapus'); window.history.go(-1);</script>";
                
            } else {
                # FALSE
                # location header
                echo "<script>alert('Data gagal dihapus'); window.history.back();</script>";

            }
        }
        public function delete_tingkat_jabatan()
        {
            if ( $this->Model->delete_tingkat_jabatan($_GET['id']) ) {
                # TRUE
                # location header
                echo "<script>alert('Data berhasil dihapus'); window.history.go(-1);</script>";
                
            } else {
                # FALSE
                # location header
                echo "<script>alert('Data gagal dihapus'); window.history.back();</script>";

            }
        }
        public function delete_penempatan()
        {
            if ( $this->Model->delete_penempatan($_GET['id']) ) {
                # TRUE
                # location header
                echo "<script>alert('Data berhasil dihapus'); window.history.go(-1);</script>";
                
            } else {
                # FALSE
                # location header
                echo "<script>alert('Data gagal dihapus'); window.history.back();</script>";

            }
        }

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerOptionCareer($db_config);
    
?>