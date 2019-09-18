<?php
    class ModelArtikel extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_artikel($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,DATE_FORMAT(artikel.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM artikel ORDER BY id_artikel DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM artikel WHERE id_artikel='{$id}' ")['data'];

            }
            
        }
        
        public function get_header()
        {
            return $this->db->get_select("SELECT * FROM header WHERE id_header='6' AND aktif='Y'")['data'];
            
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

        public function insert_artikel()
        {
            $table                  = 'artikel';
            $columnsArray           = [
                'nama_artikel'=> $this->post['nama_artikel'],
                'seo_artikel'=> seo_title($this->post['nama_artikel']),
                'isi_artikel'=> $this->post['isi_artikel'],
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

        public function update_artikel()
        {
            $table                  = 'artikel';
            $columnsArray           = [
                'nama_artikel'=> $this->post['nama_artikel'],
                'seo_artikel'=> seo_title($this->post['nama_artikel']),
                'isi_artikel'=> $this->post['isi_artikel'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id_artikel'=> $this->post['id_artikel']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set artikel
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        
        public function delete_artikel($id)
        {
            $table                  = 'artikel';
            $where                  = [
                'id_artikel'=> $id
            ];
            # delete set artikel
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
    }
    