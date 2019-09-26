<?php
    class ModelSlideshow extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }

        public function get_slideshow($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,SUBSTRING(slide.judul_ina, 1, 40) AS judul_ina_mod,SUBSTRING(slide.link, 1, 40) AS link_mod,DATE_FORMAT(slide.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM slide ORDER BY id DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM slide WHERE id='{$id}' ")['data'];

            }
            
        }

        public function insert_slideshow()
        {
            $table                  = 'slide';
            $columnsArray           = [
                'judul_ina'=> $this->post['judul_ina'],
                'link'=> $this->post['link'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into slide
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_slideshow()
        {
            $table                  = 'slide';
            $columnsArray           = [
                'judul_ina'=> $this->post['judul_ina'],
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
            
            # update set slide
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        
        public function delete_slideshow($id)
        {
            $table                  = 'slide';
            $where                  = [
                'id'=> $id
            ];
            # delete set slide
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
    }
    