<?php
    session_start();
    include_once('../../josys/koneksi.php');
    include_once("../../josys/dbHelper.php"); #inlcude database helper

    class Model extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }

        public function get_alumni_daftar($id_session)
        {
            return $this->db->get_select("SELECT * FROM alumni_daftar WHERE id_session='{$id_session}' ")['data'];
        }

        public function store_alumni_daftar($id_alumni){
            $table                  = 'alumni_daftar';
            $columnsArray           = [
                'id_session'=> '0',
            ];
            $where                  = [
                'id_alumni'=> $id_alumni
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set alumni daftar
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
    }

    class Controller
    {
        public $db_config;
        public function __construct($db_config){
            $this->db_config= $db_config;
            $this->Model 	= new Model($this->db_config);
            
            foreach ($this->Model->get_alumni_daftar( session_id() ) as $key => $value) {
                if ( $this->Model->store_alumni_daftar( $value->id_alumni ) ) {
                    session_regenerate_id();
                    header('location:index.php'); 
                }
            }
        }

    }
    $load= new Controller($db_config);
?>
