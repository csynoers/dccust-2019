<?php
    class ModelProgram extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_program($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,DATE_FORMAT(program.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM program ORDER BY id_program DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM program WHERE id_program='{$id}' ")['data'];

            }
            
        }
        
        public function get_header()
        {
            return $this->db->get_select("SELECT * FROM header WHERE id_header='14' AND aktif='Y'")['data'];
            
        }

        public function update_header()
        {
            $table                  = 'header';
            $columnsArray           = [
                'nama_header_ina'=> $this->post['nama_header_ina'],
                'isi_header_ina'=> $this->post['isi_header_ina'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id_header'=> $this->post['id_header']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set artikel
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

        public function insert_program()
        {
            $table                  = 'program';
            $columnsArray           = [
                'nama_program'=> $this->post['nama_program'],
                'seo_program'=> seo_title($this->post['nama_program']),
                'isi_program'=> $this->post['isi_program'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into artikel
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_program()
        {
            $table                  = 'program';
            $columnsArray           = [
                'nama_program'=> $this->post['nama_program'],
                'seo_program'=> seo_title($this->post['nama_program']),
                'isi_program'=> $this->post['isi_program'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id_program'=> $this->post['id_program']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set program
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        
        public function delete_program($id)
        {
            $table                  = 'program';
            $where                  = [
                'id_program'=> $id
            ];
            # delete set program
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
    }
    