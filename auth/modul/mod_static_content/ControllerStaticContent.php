<?php
    class ControllerStaticContent
    {
        public function __construct($db_config){
			$this->Model 	= new ModelStaticContent($db_config);
			$this->aksi		= 'modul/mod_static_content/ControllerStaticContent.php';
            $this->module 	= 'static_content';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'store':
					if ( $_POST['operation']=='insert' ) {
						# insert

					} else {
						# update
                        $this->Model->post= $_POST;
                        if ( ! empty($_FILES['gambar']['tmp_name']) ) {
							$this->Model->post['gambar'] = img_resize($_FILES['gambar'],1300,'../joimg/statik/'); 
							if ( $this->Model->post['gambar'] != 'error' ) {
								$row= $this->Model->get_static_content($_POST['id_modul'])[0];
								if( ($row->gambar != '') && file_exists("../joimg/statik/{$row->gambar}") ){
									unlink("../joimg/statik/{$row->gambar}");
								}

								if ( $this->Model->update_static_content() ) {
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
                            if ( $this->Model->update_static_content() ) {
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
					$rows= $this->Model->get_static_content($_GET['id']);
					include_once("modul/mod_static_content/view_index.php");
					break;
			}
		}

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerStaticContent($db_config);