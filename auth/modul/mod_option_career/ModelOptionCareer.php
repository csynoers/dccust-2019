<?php
    class ModelOptionCareer extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }     
        
        # get data jenis lowongan
        function get_jenis_lowongan($id=NULL){
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM jenis_lowongan ORDER BY name ASC")['data'];
            } else {
                return $this->db->get_select("SELECT * FROM jenis_lowongan WHERE id='{$id}' ")['data'];

            }
        }
        # get data spesialisasi
		function get_spesialisasi_pekerjaan($id=NULL){
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM spesialis ORDER BY id_spes ASC")['data'];
            } else {
                return $this->db->get_select("SELECT * FROM spesialis WHERE id_spes='{$id}' ")['data'];

            }
        }        
        # get data tingkat_jabatan
		function get_tingkat_jabatan($id=NULL){
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM tingkat_jabatan ORDER BY name ASC")['data'];
            } else {
                return $this->db->get_select("SELECT * FROM tingkat_jabatan WHERE id='{$id}' ")['data'];

            }
        }        
        # get data penempatan
		function get_penempatan($id=NULL){
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM propinsi ORDER BY propinsi_name ASC")['data'];
            } else {
                return $this->db->get_select("SELECT * FROM propinsi WHERE propinsi_id='{$id}' ")['data'];

            }
        }

        # insert jenis lowongan
        public function insert_jenis_lowongan()
        {
            $table                  = 'jenis_lowongan';
            $columnsArray           = [
                'name'=> $this->post['name'],
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into jenis_lowongan
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }
        # insert spesialisasi pekerjaan
        public function insert_spesialisasi_pekerjaan()
        {
            $table                  = 'spesialis';
            $columnsArray           = [
                'nama_spes'=> $this->post['nama_spes'],
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into spesialis
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }
        # insert tingkat jabatan
        public function insert_tingkat_jabatan()
        {
            $table                  = 'tingkat_jabatan';
            $columnsArray           = [
                'name'=> $this->post['name'],
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into tingkat_jabatan
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }
        # insert penempatan
        public function insert_penempatan()
        {
            $table                  = 'propinsi';
            $columnsArray           = [
                'propinsi_name'=> $this->post['propinsi_name'],
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into propinsi
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        # update jenis lowongan
        public function update_jenis_lowongan()
        {
            $table                  = 'jenis_lowongan';
            $columnsArray           = [
                'name'=> $this->post['name'],
            ];
            $where                  = [
                'id'=> $this->post['id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set jenis_lowongan
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        # update spesialisasi pekerjaan
        public function update_spesialisasi_pekerjaan()
        {
            $table                  = 'spesialis';
            $columnsArray           = [
                'nama_spes'=> $this->post['nama_spes'],
            ];
            $where                  = [
                'id_spes'=> $this->post['id_spes']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set spesialis
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        # update tingkat jabatan
        public function update_tingkat_jabatan()
        {
            $table                  = 'tingkat_jabatan';
            $columnsArray           = [
                'name'=> $this->post['name'],
            ];
            $where                  = [
                'id'=> $this->post['id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set tingkat_jabatan
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        # update penempatan
        public function update_penempatan()
        {
            $table                  = 'propinsi';
            $columnsArray           = [
                'propinsi_name'=> $this->post['propinsi_name'],
            ];
            $where                  = [
                'propinsi_id'=> $this->post['propinsi_id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set propinsi
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

        # delete jenis lowongan 
        public function delete_jenis_lowongan($id)
        {
            $table                  = 'jenis_lowongan';
            $where                  = [
                'id'=> $id
            ];
            # delete rows jenis_lowongan
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
        # delete spesialisasi pekerjaan 
        public function delete_spesialisasi_pekerjaan($id)
        {
            $table                  = 'spesialis';
            $where                  = [
                'id_spes'=> $id
            ];
            # delete rows spesialis
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
        # delete tingkat jabatan
        public function delete_tingkat_jabatan($id)
        {
            $table                  = 'tingkat_jabatan';
            $where                  = [
                'id'=> $id
            ];
            # delete rows tingkat_jabatan
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }
        # delete penempatan
        public function delete_penempatan($id)
        {
            $table                  = 'propinsi';
            $where                  = [
                'propinsi_id'=> $id
            ];
            # delete rows propinsi
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }

    }
    