<?php
    class ModelSeo extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }

        public function get_seo($id)
        {
            return $this->db->get_select("SELECT * FROM modul WHERE id_modul='{$id}' ")['data'];            
        }

        public function update_seo()
        {
            $table                  = 'modul';
            $columnsArray           = [
                'static_content_en'=> $this->post['static_content_en'],
            ];
            $where                  = [
                'id_modul'=> $this->post['id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set modul
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
    }
    