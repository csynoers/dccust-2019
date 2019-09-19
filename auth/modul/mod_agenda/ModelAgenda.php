<?php
    class ModelAgenda extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_agenda($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,DATE_FORMAT(agenda.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM agenda ORDER BY id_agenda DESC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM agenda WHERE id_agenda='{$id}' ")['data'];

            }
            
        }
        
        public function get_header()
        {
            return $this->db->get_select("SELECT * FROM header WHERE id_header='4' AND aktif='Y'")['data'];
            
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
            
            # update set agenda
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

        public function insert_agenda()
        {
            $table                  = 'agenda';
            $columnsArray           = [
                'nama_agenda_ina'=> $this->post['nama_agenda_ina'],
                'seo_ina'=> seo_title($this->post['nama_agenda_ina']),
                'tema_agenda_ina'=> $this->post['tema_agenda_ina'],
                'waktu'=> $this->post['waktu'],
                'peserta'=> $this->post['peserta'],
                'lokasi'=> $this->post['lokasi'],
                'isi_agenda_ina'=> $this->post['isi_agenda_ina'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into agenda
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_agenda()
        {
            $table                  = 'agenda';
            $columnsArray           = [
                'nama_agenda_ina'=> $this->post['nama_agenda_ina'],
                'seo_ina'=> seo_title($this->post['nama_agenda_ina']),
                'tema_agenda_ina'=> $this->post['tema_agenda_ina'],
                'waktu'=> $this->post['waktu'],
                'peserta'=> $this->post['peserta'],
                'lokasi'=> $this->post['lokasi'],
                'isi_agenda_ina'=> $this->post['isi_agenda_ina'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id_agenda'=> $this->post['id_agenda']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set agenda
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        
        public function delete_agenda($id)
        {
            $table                  = 'agenda';
            $where                  = [
                'id_agenda'=> $id
            ];
            # delete set agenda
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
    }
    