<?php
    class ControllerHome
    {
        public function __construct($db_config){
			$this->Model 	= new ModelHome($db_config);
			$this->aksi		= 'modul/mod_home/ControllerHome.php';
			$this->module 	= 'halaman_home';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'store':
					if ( $_POST['operation']=='insert' ) {
						# insert

					} else {
						# update
						$this->Model->post= $_POST;
						if ( $this->Model->update_halaman_home() ) {
							# TRUE
							# location header
							echo "<script>alert('Data berhasil diubah'); window.history.go(-1);</script>";
							
						} else {
							# FALSE
							# location header
							echo "<script>alert('Data gagal diubah'); window.history.back();</script>";
						}

					}
					
					break;
				
				default:
					# if action is null load view index
					$rows= $this->Model->get_halaman_home();
					include_once("modul/mod_home/view_index.php");
					break;
			}
		}

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerHome($db_config);