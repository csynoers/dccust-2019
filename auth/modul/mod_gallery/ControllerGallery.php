<?php
    class ControllerKerjasama
    {
        public function __construct($db_config){
			$this->Model 	= new ModelKerjasama($db_config);
            $this->aksi		= 'modul/mod_gallery/ControllerGallery.php';
            
            $this->url          = new stdClass(); 
			$this->url->module 	= $_GET['module'];
            $this->url->data 	= $_GET['data'];
            $this->url->act     = empty($_GET['act']) ? NULL : $_GET['act'] ; 

			# get parameter $_GET['act']
			switch ( $this->url->act ) {
				case 'add':
					# view add form
					include_once("modul/mod_kerjasama/view_add.php");
					break;

				case 'edit':
					# view edit form
					$rows= $this->Model->get_kerjasama($_GET['id']);
					include_once("modul/mod_kerjasama/view_edit_kerjasama.php");
                    break;

				case 'store':
                    $this->Model->post= $_POST;
					if ( $_POST['operation']=='insert' ) {
						# insert
						if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                            $this->Model->post['gambar'] = img_resize($_FILES['gambar'],200,'../joimg/ourclient/'); 
                            if ( $this->Model->post['gambar'] != 'error' ) {
    
                                if ( $this->Model->insert_kerjasama() ) {
                                    # TRUE
                                    # location header
                                    echo "<script>alert('Data berhasil ditambahkan'); window.history.go(-2);</script>";
                                    
                                } else {
                                    # FALSE
                                    # location header
                                    echo "<script>alert('Data gagal ditambahkan'); window.history.back();</script>";
    
                                }
    
                            } else {
                                # FALSE
                                # location header
                                echo "<script>alert('Data gagal diupload'); window.history.back();</script>";
                            }
    
                        } else {
                            if ( $this->Model->insert_kerjasama() ) {
                                # TRUE
                                # location header
                                echo "<script>alert('Data berhasil ditambahkan'); window.history.go(-2);</script>";
                                
                            } else {
                                # FALSE
                                # location header
                                echo "<script>alert('Data gagal ditambahkan'); window.history.back();</script>";
    
                            }
    
                        }

					} else {
						# update
						if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                            $this->Model->post['gambar'] = img_resize($_FILES['gambar'],200,'../joimg/ourclient/'); 
                            if ( $this->Model->post['gambar'] != 'error' ) {
                                $row= $this->Model->get_kerjasama($_POST['id_agenda'])[0];
                                if( ($row->gambar != '') && file_exists("../joimg/ourclient/{$row->gambar}") ){
                                    unlink("../joimg/ourclient/{$row->gambar}");
                                }
    
                                if ( $this->Model->update_kerjasama() ) {
                                    # TRUE
                                    # location header
                                    echo "<script>alert('Data berhasil diubah'); window.history.go(-2);</script>";
                                    
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
                            if ( $this->Model->update_kerjasama() ) {
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
					
					break;

				case 'delete':
                    # delete this
                    $row= $this->Model->get_kerjasama($_GET['id'])[0];
                    if( ($row->gambar != '') && file_exists("../joimg/ourclient/{$row->gambar}") ){
                        unlink("../joimg/ourclient/{$row->gambar}");
                    }

                    if ( $this->Model->delete_kerjasama($_GET['id']) ) {
                        # TRUE
                        # location header
                        echo "<script>alert('Data berhasil dihapus'); window.history.go(-1);</script>";
                        
                    } else {
                        # FALSE
                        # location header
                        echo "<script>alert('Data gagal dihapus'); window.history.back();</script>";

                    }
					break;
				
				default:
                    # if action is null load view index 
                    $this->index();
					include_once("modul/mod_kerjasama/view_index.php");
					break;
			}
		}

        /* index method */
        public function index_album()
        {
            
        }
        public function index_foto()
        {

        }
        public function index_video()
        {

        }

        /* filter store method */
        public function store($namespace)
        {
            $function = $namespace;
            return ($_POST['operation']=='insert') ? $this->insert_album() : $this->update_album() ;
        }
        public function store_foto()
        {
            return ($_POST['operation']=='insert') ? $this->insert_foto() : $this->update_foto() ;
        }
        public function store_video()
        {
            return ($_POST['operation']=='insert') ? $this->insert_foto() : $this->update_foto() ;
        }

        /* insert method */

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerKerjasama($db_config);
    
?>