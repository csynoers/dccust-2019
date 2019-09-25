<?php
    class ModelPesan extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }

        public function get_pesan($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,DATE_FORMAT(contact.tanggal, '%W,  %d %b %Y') AS tanggal_mod,SUBSTRING(contact.nama, 1, 50) AS nama_mod,IF(contact.dibaca='Yes','<span class=\"label label-default\">Sudah dibaca</span>','<span class=\'label label-info\'>Belum dibaca</span>') AS dibaca_mod FROM contact ORDER BY id DESC")['data'];
                
            } else {
                $this->read_pesan($id);
                return $this->db->get_select("SELECT *,DATE_FORMAT(contact.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM contact WHERE id='{$id}' ")['data'];

            }
            
        }

        // public function insert_fakultas()
        // {
        //     $table                  = 'fakultas';
        //     $columnsArray           = [
        //         'fakultas'=> $this->post['fakultas'],
        //     ];
        //     if ( ! empty($this->post['gambar']) ) {
        //         $columnsArray['gambar'] = $this->post['gambar']; 
        //     }
        //     $requiredColumnsArray   = array_keys($columnsArray);
            
        //     # insert into banner
        //     $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

        //     return ($insert=='success') ? TRUE : FALSE ;
        // }

        public function read_pesan($id)
        {
            $table                  = 'contact';
            $columnsArray           = [
                'dibaca'=> 'Yes',
            ];
            $where                  = [
                'id'=> $id
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set contact
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        // public function update_pesan()
        // {
        //     $table                  = 'contact';
        //     $columnsArray           = [
        //         'dibaca'=> $this->post['dibaca'],
        //     ];
        //     if ( ! empty($this->post['gambar']) ) {
        //         $columnsArray['gambar'] = $this->post['gambar']; 
        //     }
        //     $where                  = [
        //         'id'=> $this->post['id']
        //     ];
        //     $requiredColumnsArray   = array_keys($columnsArray);
            
        //     # update set contact
        //     $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

        //     return ($update=='success') ? TRUE : FALSE ;
        // }
        
        public function delete_pesan($id)
        {
            $table                  = 'contact';
            $where                  = [
                'id'=> $id
            ];
            # delete set contact
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
    }
    