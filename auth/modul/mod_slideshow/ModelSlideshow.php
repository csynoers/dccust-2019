<?php
    class ModelProdi extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }

        public function get_slideshow($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM prodi LEFT JOIN fakultas ON (fakultas.id_fakultas = prodi.id_fakultas) ORDER BY fakultas,prodi ASC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM prodi WHERE id_prodi='{$id}' ")['data'];

            }
            
        }
        
        public function get_fakultas()
        {
            return $this->db->get_select("SELECT * FROM fakultas ORDER BY fakultas ASC")['data'];
            
        }

        public function insert_prodi()
        {
            $table                  = 'prodi';
            $columnsArray           = [
                'id_fakultas'=> $this->post['fakultas'],
                'prodi'=> $this->post['prodi'],
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into prodi
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_prodi()
        {
            $table                  = 'prodi';
            $columnsArray           = [
                'id_fakultas'=> $this->post['fakultas'],
                'prodi'=> $this->post['prodi'],
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id_prodi'=> $this->post['id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set prodi
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        
        public function delete_prodi($id)
        {
            $table                  = 'prodi';
            $where                  = [
                'id_prodi'=> $id
            ];
            # delete set prodi
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
    }
    