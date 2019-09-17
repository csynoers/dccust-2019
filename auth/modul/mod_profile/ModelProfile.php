<?php
    class ModelProfile extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_profile()
        {
            return $this->db->get_select(" SELECT * FROM profile WHERE id_profile='9' ")['data'];           
        }

        public function update_profile()
        {
            $table                  = 'profile';
            $columnsArray           = [
                'nama_profile_ina'=> $this->post['nama_profile_ina'],
                'isi_profile_ina'=> $this->post['isi_profile_ina'],
                'visi_profile_ina'=> $this->post['visi_profile_ina'],
                'misi_profile_ina'=> $this->post['misi_profile_ina'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            
            $where                  = [
                'id_profile'=> $this->post['id_profile']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set profile
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

    }
    