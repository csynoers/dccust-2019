<?php
    class ModelKarir extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_karir($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,DATE_FORMAT(karir.deadline, '%W,  %d %b %Y') AS deadline_mod FROM karir JOIN spesialis ON karir.id_spes = spesialis.id_spes ORDER BY id_karir DESC")['data'];
            } else {
                return $this->db->get_select("SELECT * FROM karir WHERE id_karir='{$id}' ")['data'];

            }
            
        }

        public function insert_karir()
        {
            $table                  = 'karir';
            $columnsArray           = [
                'judul_karir'=> $this->post['judul_karir'],
                'seo_ina'=> seo_title($this->post['judul_karir']),
                'perusahaan_karir'=> $this->post['perusahaan_karir'],
                'jenis_lowongan'=> $this->post['jenis_lowongan'],
                'id_spes'=> $this->post['id_spes'],
                'tingkat_jabatan'=> $this->post['tingkat_jabatan'],
                'lokasi'=> $this->post['lokasi'],
                'deadline'=> $this->post['deadline'],
                'isi_karir'=> $this->post['isi_karir'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into karir
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_karir()
        {
            $table                  = 'karir';
            $columnsArray           = [
                'judul_karir'=> $this->post['judul_karir'],
                'seo_ina'=> seo_title($this->post['judul_karir']),
                'perusahaan_karir'=> $this->post['perusahaan_karir'],
                'jenis_lowongan'=> $this->post['jenis_lowongan'],
                'id_spes'=> $this->post['id_spes'],
                'tingkat_jabatan'=> $this->post['tingkat_jabatan'],
                'lokasi'=> $this->post['lokasi'],
                'deadline'=> $this->post['deadline'],
                'isi_karir'=> $this->post['isi_karir'],
                'tanggal'=> date('Y-m-d'),
            ];
            if ( ! empty($this->post['gambar']) ) {
                $columnsArray['gambar'] = $this->post['gambar']; 
            }
            $where                  = [
                'id_karir'=> $this->post['id_karir']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set karir
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }
        
        public function delete_karir($id)
        {
            $table                  = 'karir';
            $where                  = [
                'id_karir'=> $id
            ];
            # delete set karir
            $delete= $this->db->delete($table, $where)['status'];
    
            return ($delete=='success') ? TRUE : FALSE ;
        }

        # get data jenis lowongan
        function get_jenis_lowongan(){
			return $this->db->get_select("SELECT * FROM jenis_lowongan ORDER BY name ASC")['data'];
        }

        # get data spesialisasi
		function get_spesialisasi_pekerjaan(){
			return $this->db->get_select("SELECT * FROM spesialis ORDER BY id_spes ASC")['data'];
        }
        
        # get data tingkat_jabatan
		function get_tingkat_jabatan(){
			return $this->db->get_select("SELECT * FROM tingkat_jabatan ORDER BY name ASC")['data'];
        }
        
        # get data propinsi
		function get_propinsi(){
			return $this->db->get_select("SELECT * FROM propinsi ORDER BY propinsi_name ASC")['data'];
		}
    }
    