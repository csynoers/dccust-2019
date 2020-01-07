<?php
    class Controller
    {
        public function __construct($db_config){
            $this->Model 	= new Model($db_config);
            $this->aksi		= 'modul/mod_data/Controller.php';
            $this->module 	= 'halaman_data';

            # get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {				
				default:
					# if action is null load view index
					include_once("modul/mod_data/view_index.php");
					break;
			}
        }
    }

    $load = new Controller($db_config);
    