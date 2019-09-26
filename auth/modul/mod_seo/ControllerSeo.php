<?php
    class ControllerSeo
    {
        public function __construct($db_config){
			$this->Model 	= new ModelSeo($db_config);
			$this->aksi		= 'modul/mod_seo/ControllerSeo.php';
            
            $this->url          = new stdClass(); 
            $this->url->module 	= $_GET['module'];
            $this->url->data     = empty($_GET['data']) ? NULL : $_GET['data'] ;
            $this->url->act     = empty($_GET['act']) ? NULL : $_GET['act'] ;

			# get parameter $_GET['act']
			switch ( $this->url->act ) {
                case 'store':
                    # store data
                    $this->store();					
					break;
				
				default:
					# if action is null load view index 
                    $rows= $this->Model->{'get_'.$this->url->module}($_GET['id']);
					include_once("modul/mod_{$this->url->module}/view_edit".(empty($this->url->data) ? NULL : '_'.$this->url->data ).".php");
					break;
			}
        }

        /* filter store method */
        public function store()
        {
            return ($_POST['operation']=='insert') ? $this->insert() : $this->update() ;
        }

        /* update method */
        public function update()
        {
            $this->Model->post= $_POST;
            if ( $this->Model->update_seo() ) {
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
	
	$load= new ControllerSeo($db_config);
    
?>