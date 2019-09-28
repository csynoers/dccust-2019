<?php
    class ModelContent extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
    /* ==================== START PAGE : HOME ==================== */
        public function home_slide()
        {
            return $this->db->get_select("SELECT * FROM slide order by id DESC")['data'];
        }
        public function home_welcome()
        {
            return $this->db->get_select("SELECT nama_modul_ina,static_content_ina FROM modul where id_modul = '94'")['data'];
        }
        public function home_karir()
        {
            return $this->db->get_select("SELECT *,DATE_FORMAT(karir.tanggal, '%W,  %d %b %Y') AS tanggal_mod,DATE_FORMAT(karir.deadline, '%W,  %d %b %Y') AS deadline_mod,IFNULL(karir.gambar,'karir_00.jpg') FROM karir LEFT JOIN propinsi ON propinsi.propinsi_id=karir.lokasi ORDER BY karir.id_karir DESC LIMIT 5")['data'];
        }
        public function home_agenda()
        {
            return $this->db->get_select("SELECT * FROM agenda order by id_agenda DESC LIMIT 5")['data'];
        }
        public function home_kerjasama()
        {
            return $this->db->get_select("SELECT * FROM sajian order by id_sajian DESC LIMIT 12")['data'];
        }
        public function home_sidebar_user($id)
        {
            return $this->db->get_select("SELECT * FROM alumni_daftar WHERE id_session = '{$id}'")['data'];
        }
        public function home_sidebar_alamat()
        {
            return $this->db->get_select("SELECT * FROM modul WHERE id_modul='7'")['data'];
        }
        public function home_sidebar_banner()
        {
            return $this->db->get_select("SELECT * FROM banner order by id DESC")['data'];
        }
        public function home_sidebar_sosmed()
        {
            return $this->db->get_select("SELECT * FROM sosial order by nama DESC")['data'];
        }
        public function statistik()
        {
            $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
            $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
            $waktu   = time(); // 
          
            // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
            $s = $this->db->get_select("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
            // Kalau belum ada, simpan data user tersebut ke database
            if( count($s['data']) == 0){
              $this->db->get_select("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
            } 
            else{
              $this->db->get_select("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
            }
          
            $pengunjung       = count($this->db->get_select("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip")['data']);
            $totalpengunjung  = $this->db->get_select("SELECT COUNT(hits) AS counts FROM statistik")['data'][0]; 
            $hits             = $this->db->get_select("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")['data'][0]; 
            $totalhits        = $this->db->get_select("SELECT SUM(hits) AS sums FROM statistik")['data'][0]; 
            $tothitsgbr       = $this->db->get_select("SELECT SUM(hits) AS sums FROM statistik")['data'][0]; 
            $bataswaktu       = time() - 300;
            $pengunjungonline = count($this->db->get_select("SELECT * FROM statistik WHERE online > '$bataswaktu'")['data']);
          
            $path = "joinc/counter/";
            $ext = ".png";
          
            $tothitsgbr = sprintf("%06d", $tothitsgbr->sums);
            for ( $i = 0; $i <= 9; $i++ ){
              $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
            }
          
            return "
            <table width='100%' style='border:1px dotted #cccccc;'>
            <tr>
                <td width='69'><img src='img/chart/06.png' style='width: 13px;'> Today</td>
                <td width='17'>: <b>$pengunjung</b></td>
                <td width='66'><img src='img/chart/06.png' style='width: 13px;'> Visitor</td>
                <td width='20'>: <b>$totalpengunjung->counts</b></td>
            </tr>
            <tr>
                <td><img src='img/chart/02.png' style='width: 13px;'>Hits Today</td>
                <td>: <b>$hits->hitstoday</b></td>
                <td><img src='img/chart/04.png' style='width: 13px;'>Online</td>
                <td>: <b>$pengunjungonline</b></td>
            </tr>
            <tr>
                <td><img src='img/chart/03.png' style='width: 13px;'>Total Hits</td>
                <td>: <b>$totalhits->sums</b></td>
            </tr>
            </table>
            ";
        }
    /* ==================== END PAGE : HOME ==================== */

    /* ==================== START PAGE : PROFIL ==================== */
        public function profile()
        {
            return $this->db->get_select("SELECT * FROM profile WHERE id_profile='9' ")['data'];
        }
    /* ==================== END PAGE : PROFIL ==================== */

    /* ==================== START PAGE : PROGRAM ==================== */
        public function program_header()
        {
            return $this->db->get_select("SELECT * FROM header where id_header='14' ")['data'];
        }
        public function program($id)
        {
            return $this->db->get_select("SELECT * FROM program where id_program='$id' ")['data'];
        }
    /* ==================== END PAGE : PROGRAM ==================== */

    /* ==================== START PAGE : KARIR ==================== */
    /* ==================== END PAGE : KARIR ==================== */

        public function insert_tracer_studies()
        {
            $table                  = 'tracer_studies';
            $columnsArray           = [
                'tracer_study_sort'=> $this->post['tracer_study_sort'],
                'tracer_study_title'=> $this->post['tracer_study_title'],
                'tracer_study_desc'=> $this->post['tracer_study_desc'],
                'tracer_study_parent'=> $this->post['tracer_study_parent']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into tracer_studies
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_tracer_studies()
        {
            $table                  = 'tracer_studies';
            $columnsArray           = [
                'tracer_study_sort'=> $this->post['tracer_study_sort'],
                'tracer_study_title'=> $this->post['tracer_study_title'],
                'tracer_study_desc'=> $this->post['tracer_study_desc'],
                'tracer_study_parent'=> $this->post['tracer_study_parent']
            ];
            $where                  = [
                'tracer_study_id'=> $this->post['tracer_study_id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set tracer_studies
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

        public function delete_tracer_studies()
        {

        }
    }
    