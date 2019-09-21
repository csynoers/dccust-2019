<?php
    class ControllerGallery
    {
        public function __construct($db_config){
			$this->Model 	= new ModelGallery($db_config);
            $this->aksi		= 'modul/mod_gallery/ControllerGallery.php';
            
            $this->url          = new stdClass(); 
			$this->url->module 	= $_GET['module'];
            $this->url->data 	= $_GET['data'];
            $this->url->act     = empty($_GET['act']) ? NULL : $_GET['act'] ; 

			# get parameter $_GET['act']
			switch ( $this->url->act ) {
				case 'add':
					# view add form
					$this->add();
					break;

				case 'edit':
					# view edit form
					$this->edit();
                    break;

				case 'store':
                    # store data
                    $this->store();
					break;

				case 'delete':
                    # delete this
                    $this->delete();
					break;
				
				default:
                    # if action is null load view index 
                    $this->index();
					break;
			}
		}

        /* index method */
        public function index()
        {
            $rows= $this->Model->{'get_'.$this->url->data}();
            include_once("modul/mod_gallery/view_index_{$this->url->data}.php");
        }

        /* form add */
        public function add()
        {
            include_once("modul/mod_gallery/view_add_{$this->url->data}.php");
        }
        
        /* form edit */
        public function edit()
        {
            $rows= $this->Model->{'get_'.$this->url->data}($_GET['id']);
            include_once("modul/mod_gallery/view_edit_{$this->url->data}.php");
        }

        /* filter store method */
        public function store()
        {
            return ($_POST['operation']=='insert') ? $this->insert() : $this->update() ;
        }

        /* insert method */
        public function insert()
        {
            $this->Model->post= $_POST;

            if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                $this->Model->post['gambar'] = img_resize($_FILES['gambar'],200,'../joimg/ourclient/'); 
                if ( $this->Model->post['gambar'] != 'error' ) {

                    if ( $this->Model->{'insert_'.$this->url->data}() ) {
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
                if ( $this->Model->{'insert_'.$this->url->data}() ) {
                    # TRUE
                    # location header
                    echo "<script>alert('Data berhasil ditambahkan'); window.history.go(-2);</script>";
                    
                } else {
                    # FALSE
                    # location header
                    echo "<script>alert('Data gagal ditambahkan'); window.history.back();</script>";

                }

            }
        }

        /* update method */
        public function update()
        {
            $this->Model->post= $_POST;
            $function= 'update_'.$this->url->data;
            if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                $this->Model->post['gambar'] = img_resize($_FILES['gambar'],200,'../joimg/ourclient/'); 
                if ( $this->Model->post['gambar'] != 'error' ) {
                    $row= $this->Model->get_kerjasama($_POST['id_agenda'])[0];
                    if( ($row->gambar != '') && file_exists("../joimg/ourclient/{$row->gambar}") ){
                        unlink("../joimg/ourclient/{$row->gambar}");
                    }

                    if ( $this->Model->$function() ) {
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
                if ( $this->Model->$function() ) {
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

        public function delete()
        {
            // $row= $this->Model->get_kerjasama($_GET['id'])[0];
            // if( ($row->gambar != '') && file_exists("../joimg/ourclient/{$row->gambar}") ){
            //     unlink("../joimg/ourclient/{$row->gambar}");
            // }

            $function= 'delete_'.$this->url->data;
            if ( $this->Model->$function($_GET['id']) ) {
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
		// public function __call($method, $args)
		// {
		//   $this->c->$method($args[0]);
		// }
	}
	
	$load= new ControllerGallery($db_config);
    
?>