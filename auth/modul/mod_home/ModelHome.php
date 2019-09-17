<?php
    class ModelHome extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_halaman_home()
        {
            return $this->db->get_select(" SELECT * FROM modul WHERE id_modul='94' ")['data'];           
        }

        public function update_halaman_home()
        {
            $table                  = 'modul';
            $columnsArray           = [
                'static_content_ina'=> $this->post['static_content_ina'],
            ];
            $where                  = [
                'id_modul'=> $this->post['id_modul']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set modul
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

    }
    