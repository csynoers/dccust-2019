<?php
    class ModelFakultas extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }

        public function get_fakultas($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM fakultas ORDER BY id_fakultas DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM fakultas WHERE id_fakultas='{$id}' ")['data'];

            }
            
        }

        public function insert_fakultas()
        {
            $table                  = 'banner';
            $columnsArray           = [
                'judul'=> $this->post['judul'],
                'link'=> $this->post['link'],
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into banner
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_fakultas()
        {
            $table                  = 'banner';
            $columnsArray           = [
                'judul'=> $this->post['judul'],
                'link'=> $this->post['link'],
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id'=> $this->post['id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set banner
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        
        public function delete_fakultas($id)
        {
            $table                  = 'banner';
            $where                  = [
                'id'=> $id
            ];
            # delete set gbanneruest_book
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
    }
    