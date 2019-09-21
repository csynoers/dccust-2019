<?php
    class ModelGallery extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }

        public function get_album($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,(SELECT COUNT(galeri.id_galeri) FROM galeri WHERE galeri.id_album=album.id_album) AS counts FROM album ORDER BY id_album DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM album WHERE id_album='{$id}' ")['data'];

            }
            
        }
        public function get_foto($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM album ORDER BY id_album DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM album WHERE id_album='{$id}' ")['data'];

            }
            
        }
        public function get_video($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,DATE_FORMAT(video.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM video ORDER BY id DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM video WHERE id='{$id}' ")['data'];

            }
            
        }

        public function insert_video()
        {
            $table                  = 'video';
            $columnsArray           = [
                'judul'=> $this->post['judul'],
                'video'=> $this->post['video'],
                'tanggal'=> date('Y-m-d'),
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into video
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_video()
        {
            $table                  = 'video';
            $columnsArray           = [
                'judul'=> $this->post['judul'],
                'video'=> $this->post['video'],
                'tanggal'=> date('Y-m-d'),
            ];
            $where                  = [
                'id'=> $this->post['id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set video
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

        public function delete_video($id)
        {
            $table                  = 'video';
            $where                  = [
                'id'=> $id
            ];
            # delete set video
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
        
        public function get_kerjasama($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,DATE_FORMAT(sajian.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM sajian ORDER BY id_sajian DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM sajian WHERE id_sajian='{$id}' ")['data'];

            }
            
        }

        public function insert_kerjasama()
        {
            $table                  = 'sajian';
            $columnsArray           = [
                'nama_sajian_ina'=> $this->post['nama_sajian_ina'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into sajian
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_kerjasama()
        {
            $table                  = 'sajian';
            $columnsArray           = [
                'nama_sajian_ina'=> $this->post['nama_sajian_ina'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id_sajian'=> $this->post['id_sajian']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set sajian
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
    }
    