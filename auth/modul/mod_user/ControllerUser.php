<?php
    class ControllerUser
    {
        public function __construct($db_config){
			$this->Model 	= new ModelUser($db_config);
			$this->aksi		= 'modul/mod_user/ControllerUser.php';
            
            $this->url          = new stdClass(); 
            $this->url->module 	= $_GET['module'];
            $this->url->act     = empty($_GET['act']) ? NULL : $_GET['act'] ;

			# get parameter $_GET['act']
			switch ( $this->url->act ) {
                case 'store':
                    # store data
                    $this->store();					
					break;
				
				default:
					# if action is null load view index 
                    $rows= $this->Model->{'get_'.$this->url->module}();
					include_once("modul/mod_{$this->url->module}/view_edit.php");
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
            if ( $_POST['password'] == $_POST['re_password']) {
                $this->Model->post= $_POST;
                if ( $this->Model->update_user() ) {
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
                echo "<script>alert('Password tidak sama'); window.history.back();</script>";
            }
            
        }
	}
	
	$load= new ControllerUser($db_config);
    
?>