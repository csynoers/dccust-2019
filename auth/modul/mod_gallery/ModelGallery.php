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
                return $this->db->get_select("SELECT * FROM galeri WHERE id_album='{$_GET['parent']}' ORDER BY id_galeri DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM galeri WHERE id_galeri='{$id}' ")['data'];

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

        public function insert_album()
        {
            $table                  = 'album';
            $columnsArray           = [
                'nama'=> $this->post['nama'],
                'seo'=> seo_title($this->post['nama']),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into album
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }
        public function insert_foto()
        {
            $table                  = 'galeri';
            $columnsArray           = [
                'nama'=> $this->post['nama'],
                'id_album'=> $this->post['id_album'],
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into galeri
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
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

        public function update_album()
        {
            $table                  = 'album';
            $columnsArray           = [
                'nama'=> $this->post['nama'],
                'seo'=> seo_title($this->post['nama']),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id_album'=> $this->post['id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set album
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        public function update_foto()
        {
            $table                  = 'galeri';
            $columnsArray           = [
                'nama'=> $this->post['nama'],
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id_galeri'=> $this->post['id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set galeri
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
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

        public function delete_album($id)
        {
            # cek count rows of foto with this id album
            $row_count_foto = count($this->db->select('galeri',['id_album'=>$id])['data']);
            if ( $row_count_foto > 0 ) {
                return FALSE ;
            } else {
                $table                  = 'album';
                $where                  = [
                    'id_album'=> $id
                ];
                # delete set album
                $delete= $this->db->delete($table, $where)['status'];
        
                return ($delete=='success') ? TRUE : FALSE ;
            }
            
        }
        public function delete_foto($id)
        {
            $table                  = 'galeri';
            $where                  = [
                'id_galeri'=> $id
            ];
            # delete set galeri
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
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
    }
    