<?php
    class ModelSlideshow extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }

        public function get_sosial($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,SUBSTRING(sosial.nama, 1, 40) AS nama_mod,SUBSTRING(sosial.link, 1, 40) AS link_mod,DATE_FORMAT(sosial.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM sosial ORDER BY id DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM sosial WHERE id='{$id}' ")['data'];

            }
            
        }

        public function insert_sosial()
        {
            $table                  = 'sosial';
            $columnsArray           = [
                'nama'=> $this->post['nama'],
                'link'=> $this->post['link'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into sosial
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_sosial()
        {
            $table                  = 'sosial';
            $columnsArray           = [
                'nama'=> $this->post['nama'],
                'link'=> $this->post['link'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id'=> $this->post['id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set sosial
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        
        public function delete_sosial($id)
        {
            $table                  = 'sosial';
            $where                  = [
                'id'=> $id
            ];
            # delete set sosial
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
    }
    