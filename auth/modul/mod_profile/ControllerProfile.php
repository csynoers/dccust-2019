<?php
    class ControllerProfile
    {
        public function __construct($db_config){
			$this->Model 	= new ModelProfile($db_config);
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
							$this->Model->post['gambar'] = img_resize($_FILES['gambar'],1300,'../joimg/profile/'); 
							if ( $this->Model->post['gambar'] != 'error' ) {
								$row= $this->Model->get_profile()[0];
								if( ($row->gambar != '') && file_exists("../joimg/profile/{$row->gambar}") ){
									unlink("../joimg/profile/{$row->gambar}");
								}

								if ( $this->Model->update_profile() ) {
									# TRUE
									# location header
									echo "<script>alert('Data berhasil diubah'); window.history.go(-1);</script>";
									
								} else {
									# FALSE
									# location header
									echo "<script>alert('Data gagal diubah'); window.history.back();</script>";
	
								}

							} else {
								# FALSE
                                # location header
                                echo "<script>alert('Data gagal diupload'); window.history.back();</script>";
							}

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