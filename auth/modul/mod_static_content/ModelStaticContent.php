<?php
    class ModelStaticContent extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_static_content($id)
        {
            return $this->db->get_select(" SELECT * FROM modul WHERE id_modul='{$id}' ")['data'];           
        }

        public function update_static_content()
        {
            $table                  = 'modul';
            $columnsArray           = [
                'nama_modul_ina'=> $this->post['nama_modul_ina'],
                'static_content_ina'=> $this->post['static_content_ina'],
                'tanggal'=> date('Y-m-d'),
            ];

            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }

            if ( ! empty($this->post['extra']) ) {
                $columnsArray['extra'] = $this->post['extra']; 
            }
            
            $where                  = [
                'id_modul'=> $this->post['id_modul']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set profile
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

    }
    