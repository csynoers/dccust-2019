<?php
    class ModelContent extends dbHelper
    {
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
    
    /* ==================== START SEO (Search Engine Optimization) ==================== */
        public function seo()
        {
            return [
                'title'         => $this->db->get_select("SELECT static_content_en FROM modul WHERE id_modul='90' ")['data'][0]->static_content_en,
                'description'   => $this->db->get_select("SELECT static_content_en FROM modul WHERE id_modul='92' ")['data'][0]->static_content_en,
                'keywords'      => $this->db->get_select("SELECT static_content_en FROM modul WHERE id_modul='91' ")['data'][0]->static_content_en
            ];
        }
    /* ==================== START SEO (Search Engine Optimization) ==================== */

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

    /* ==================== START PAGE : KARIR ==================== */
        public function karir_detail_header()
        {
            return $this->db->get_select("SELECT * FROM header where id_header='7'")['data'];
        }
        public function karir_detail($id)
        {
            return $this->db->get_select("SELECT *,DATE_FORMAT(karir.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM karir LEFT JOIN propinsi ON propinsi.propinsi_id=karir.lokasi WHERE id_karir='{$id}'")['data'];
        }
    /* ==================== END PAGE : KARIR ==================== */

    /* ==================== START PAGE : TRACER STUDY ==================== */
        public function cek_biodata($id)
        {
            return $this->db->get_select("SELECT id_alumni FROM biodata WHERE id_alumni='{$id}'")['data'];
        }
        public function get_biodata($id)
        {
            return $this->db->get_select("SELECT a.nama_alumni, a.nim, a.tahun_lulus, a.email, p.prodi,p.id_prodi
                FROM alumni_daftar a LEFT JOIN prodi p
                ON  a.prodi = p.id_prodi
            WHERE a.id_alumni = '{$id}'")['data'];
        }
        public function biodata_insert()
        {
            // create validation if string there a single quote
            $string			= ($this->post['nama']);
            $cek 			= strpos($string, '\'');
            if ( $cek != '' ) {
                $nama_alumni= str_replace('\'', "\'", $string);
            }else{
                $nama_alumni= $string;
            }
            // end validation if string there a single quote
            $domisili	= htmlentities($this->post['almt_domisili']);
            $ktp		= htmlentities($this->post['almt_ktp']);

            # initialize parameter insert biodata
            $table = 'biodata';
            $columnsArray = [
                'id_alumni' => $_SESSION['idnya'],
                'nama' => $nama_alumni,
                'nim' => $this->post['nim'],
                'th_lulus' => $this->post['th_lulus'],
                'prodi' => $this->post['prodi_id'],
                'no_hp' => $this->post['no_hp'],
                'email' => $this->post['email'],
                'almt_domisili' => $domisili,
                'almt_ktp' => $ktp,
            ];
            $requiredColumnsArray= array_keys($columnsArray);

            # insert
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray);
            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function get_tracer_study($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,(SELECT COUNT(t_mod.tracer_study_id) FROM tracer_studies AS t_mod WHERE t_mod.tracer_study_parent=t.tracer_study_id) AS child_count FROM tracer_studies AS t WHERE t.tracer_study_parent=0 ")['data'];
            } else {
                return $this->db->get_select("SELECT *,(SELECT COUNT(t_mod.tracer_study_id) FROM tracer_studies AS t_mod WHERE t_mod.tracer_study_parent=t.tracer_study_id) AS child_count FROM tracer_studies AS t WHERE t.tracer_study_parent='{$id}' ")['data'];
            }
            
            // $rows= $this->Model->db->get_select("SELECT *,(SELECT COUNT(t_mod.tracer_study_id) FROM tracer_studies AS t_mod WHERE t_mod.tracer_study_parent=t.tracer_study_id) AS child_count FROM tracer_studies AS t WHERE t.tracer_study_parent=0 AND t.tracer_study_sort=14")['data'];
        }
        public function get_tracer_study_detail($id)
        {
            return $this->db->get_select("SELECT * FROM tracer_studies_detail WHERE tracer_study_id='{$id}'")['data'];
        }
        public function get_tracer_events($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM tracer_events")['data'];
            } else {
                return $this->db->get_select("SELECT * FROM tracer_events WHERE tracer_study_detail_id='{$id}' ")['data'];
            }
            
        }
        public function kuesioner_insert()
        {
            # initialize parameter insert tracer_answers
            $table = 'tracer_answers';
            foreach ($this->post as $key => $value) {    
                $this->db->insert($table, $value, array_keys($value) );
            }
            // return ($insert=='success') ? TRUE : FALSE ;
            return TRUE ;
        }
        public function get_tracer_answers($nim,$type)
        {
            return $this->db->get_select("SELECT * FROM `tracer_answers` WHERE nim='{$nim}' AND tracer_type='{$type}' GROUP BY nim ")['data'];
        }
    /* ==================== END PAGE : TRACER STUDY ==================== */

    /* ==================== START PAGE : PROGRAM ==================== */
        public function program_header()
        {
            return $this->db->get_select("SELECT * FROM header WHERE id_header='14' ")['data'];
        }
        public function program($id)
        {
            return $this->db->get_select("SELECT * FROM program WHERE id_program='$id' ")['data'];
        }
    /* ==================== END PAGE : PROGRAM ==================== */
        public function event_header()
        {
            return $this->db->get_select("SELECT * FROM header where id_header='4'")['data'];
        }
        public function event()
        {
            return $this->db->get_select("SELECT *,DATE_FORMAT(agenda.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM agenda order by id_agenda DESC")['data'];
        }
        public function event_detail($id)
        {
            return $this->db->get_select("SELECT *,DATE_FORMAT(agenda.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM agenda where id_agenda='{$id}'")['data'];
        }
        public function publication_header()
        {
            return $this->db->get_select("SELECT * FROM header where id_header='6'")['data'];
        }
        public function publication()
        {
            return $this->db->get_select("SELECT *,DATE_FORMAT(artikel.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM artikel order by id_artikel DESC")['data'];
        }
        public function publication_detail($id)
        {
            return $this->db->get_select("SELECT *,DATE_FORMAT(artikel.tanggal, '%W,  %d %b %Y') AS tanggal_mod FROM artikel where id_artikel='{$id}'")['data'];
        }
    /* ==================== START PAGE : INFO ==================== */
    
    /* ==================== END PAGE : INFO ==================== */

    /* ==================== START PAGE : BEASISWA ==================== */
        public function beasiswa_header()
        {
            return $this->db->get_select("SELECT * FROM header where id_header='15'")['data'];
        }
        public function beasiswa()
        {
            return $this->db->get_select("SELECT *,SUBSTRING(beasiswa.isi_beasiswa, 1, 250) AS isi_beasiswa_mod FROM beasiswa order by id_beasiswa DESC")['data'];
        }
        public function beasiswa_detail($id)
        {
            return $this->db->get_select("SELECT * FROM beasiswa where id_beasiswa='{$id}'")['data'];
        }
    /* ==================== END PAGE : BEASISWA ==================== */

    /* ==================== START PAGE : GALERI ==================== */
        public function album_header()
        {
            return $this->db->get_select("SELECT * FROM header WHERE id_header='9' ")['data'];
        }
        public function album()
        {
            return $this->db->get_select("SELECT * FROM album order by id_album DESC")['data'];
        }
        public function video_header()
        {
            return $this->db->get_select("SELECT * FROM header where id_header='9'")['data'];
        }
        public function video()
        {
            return $this->db->get_select("SELECT * FROM video order by id DESC")['data'];
        }
        public function galeri_header()
        {
            return $this->db->get_select("SELECT * FROM header where id_header='9'")['data'];
        }
        public function galeri($id)
        {
            return $this->db->get_select("SELECT * FROM galeri WHERE id_album = '{$id}' order by id_album DESC")['data'];
        }
    /* ==================== END PAGE : GALERI ==================== */

    /* ==================== START PAGE : KONTAK ==================== */
        public function buku_tamu_header()
        {
            return $this->db->select('header',array('id_header'=> '16'))['data'][0];
        }
        public function buku_tamu()
        {
            return $this->db->select('guest_book',array('status'=> '1'))['data'];
        }
        public function buku_tamu_insert()
        {
            $table                  = 'guest_book';
            $columnsArray           = [
                'name'=> htmlspecialchars($_POST['name']),
                'email'=> strip_tags($_POST['email']),
                'message_fill'=> htmlspecialchars($_POST['message_fill']),
                'status' => '0'
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into guest_book
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }
        public function contact()
        {
            return $this->db->get_select("SELECT * FROM modul WHERE id_modul='7'")['data'];
        }
        public function contact_insert()
        {
            $table                  = 'contact';
            $columnsArray           = [
                'nama'=> trim($_POST['nama']),
                'email'=> trim($_POST['email']),
                'phone'=> trim($_POST['phone']),
                'subject' => trim($_POST['subject']),
                'message' => trim($_POST['message']),
                'tanggal' => date('Y-m-d h:i:s'),
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into contact
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }
    /* ==================== END PAGE : KONTAK ==================== */

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
    