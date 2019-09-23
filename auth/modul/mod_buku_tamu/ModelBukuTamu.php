<?php
    class ModelBukuTamu extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_header($id)
        {
            return $this->db->get_select("SELECT * FROM header WHERE id_header='{$id}' AND aktif='Y'")['data'];
            
        }

        public function get_buku_tamu($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,SUBSTRING(guest_book.message_fill, 1, 75) AS message_fill_mod,DATE_FORMAT(guest_book.date_send, '%W,  %d %b %Y') AS date_send_mod, IF(guest_book.status='1','Y','N') AS status_mod FROM  guest_book ORDER BY id DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT *,DATE_FORMAT(guest_book.date_send, '%W,  %d %b %Y') AS date_send_mod FROM guest_book WHERE id='{$id}' ")['data'];

            }
            
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
            
            # update set header
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

        public function update_buku_tamu()
        {
            $table                  = 'guest_book';
            $columnsArray           = [
                'status'=> $this->post['status'],
            ];
            $where                  = [
                'id'=> $this->post['id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set guest_book
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        
        public function delete_guest_book($id)
        {
            $table                  = 'guest_book';
            $where                  = [
                'id'=> $id
            ];
            # delete set guest_book
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
    }
    