<?php
    class ModelBeasiswa extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_beasiswa($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,DATE_FORMAT(beasiswa.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM beasiswa ORDER BY id_beasiswa DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM beasiswa WHERE id_beasiswa='{$id}' ")['data'];

            }
            
        }
        
        public function get_header()
        {
            return $this->db->get_select("SELECT * FROM header WHERE id_header='15' AND aktif='Y'")['data'];
            
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
            
            # update set beasiswa
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

        public function insert_beasiswa()
        {
            $table                  = 'beasiswa';
            $columnsArray           = [
                'nama_beasiswa'=> $this->post['nama_beasiswa'],
                'seo_beasiswa'=> seo_title($this->post['nama_beasiswa']),
                'isi_beasiswa'=> $this->post['isi_beasiswa'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into beasiswa
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_beasiswa()
        {
            $table                  = 'beasiswa';
            $columnsArray           = [
                'nama_beasiswa'=> $this->post['nama_beasiswa'],
                'seo_beasiswa'=> seo_title($this->post['nama_beasiswa']),
                'isi_beasiswa'=> $this->post['isi_beasiswa'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id_beasiswa'=> $this->post['id_beasiswa']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set beasiswa
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        
        public function delete_beasiswa($id)
        {
            $table                  = 'beasiswa';
            $where                  = [
                'id_beasiswa'=> $id
            ];
            # delete set beasiswa
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
    }
    