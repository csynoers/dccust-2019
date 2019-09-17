<?php
    class ControllerProfile
    {
        public function __construct($db_config){
			$this->Model 	= new ModelProfile($db_config);
			// $this->Helper 	= new Helper();
			$this->aksi		= 'modul/mod_profile/ControllerProfile.php';
            $this->module 	= 'profile';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'store':
					if ( $_POST['operation']=='insert' ) {
						# insert

					} else {
						# update
                        $this->Model->post= $_POST;
                        if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                            echo jancuk();
                            echo '<pre>';
                            var_dump($_FILES['gambar']['tmp_name']);
                            // print_r($this->Model->post);
                            echo '</pre>';
                            die();

                        } else {
                            if ( $this->Model->update_profile() ) {
                                # TRUE
                                # location header
                                echo "<script>alert('Data berhasil diubah'); window.history.go(-1);</script>";
                                
                            } else {
                                # FALSE
                                # location header
                                echo "<script>alert('Data gagal diubah'); window.history.back();</script>";

                            }

                        }						

					}
					
					break;
				
				default:
					# if action is null load view index
					$rows= $this->Model->get_profile();
					include_once("modul/mod_profile/view_index.php");
					break;
			}
		}

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerProfile($db_config);