<?php
    class ModelSettingGrafikTracer extends dbHelper
    {
        public $where=NULL;
        public function __construct($db_config){
            $this->db= new dbHelper($db_config);
        }
        
        public function get_settings($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT * FROM settings WHERE settings.category='setting-grafik-tracer' ORDER BY settings.title ASC")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM settings WHERE settings.id='{$id}' ")['data'];

            }
            
        }

        public function insert_settings()
        {
            $table                  = 'settings';
            $columnsArray           = [
                'title'=> $this->post['title'],
                'options'=> json_encode($_POST['tracer_study_detail_id']),
                'category'=> 'setting-grafik-tracer',
                'setting_date'=> $this->post['tahun'],
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # insert into settings
            $insert= $this->db->insert($table, $columnsArray, $requiredColumnsArray)['status'];

            return ($insert=='success') ? TRUE : FALSE ;
        }

        public function update_settings()
        {
            $table                  = 'settings';
            $columnsArray           = [
                'title'=> $this->post['title'],
                'options'=> json_encode($_POST['tracer_study_detail_id']),
            ];
            $where                  = [
                'id'=> $this->post['id']
            ];
            $requiredColumnsArray   = array_keys($columnsArray);
            
            # update set settings
            $update= $this->db->update($table, $columnsArray, $where, $requiredColumnsArray)['status'];

            return ($update=='success') ? TRUE : FALSE ;
        }

        public function delete_tracer_studies_detail()
        {

        }

        # kategori
        public function get_tracer_studies($id=NULL)
        {
            if ( empty($id) ) {
                return $this->db->get_select("SELECT *,(SELECT COUNT(*) FROM tracer_studies AS tsmod WHERE tsmod.tracer_study_parent=ts.tracer_study_id) AS rows_child FROM tracer_studies AS ts {$this->where} ORDER BY tracer_study_sort")['data'];
                // return $this->db->get_select("SELECT *,(SELECT COUNT(tracer_study_id) FROM tracer_studies AS t_mod WHERE t_mod.tracer_study_parent=t.tracer_study_id) AS childs FROM tracer_studies AS t HAVING childs=0 ORDER BY t.tracer_study_sort")['data'];
                
            } else {
                return $this->db->get_select("SELECT * FROM tracer_studies WHERE tracer_study_id='{$id}' ")['data'];

            }
            
        }

        # get data tracer studi detail

        public function get_tracer_studies_detail($tracerStudyId,$tahun)
        {
            return $this->db->get_select("SELECT * FROM `tracer_studies_detail` WHERE 1 AND tracer_study_id='{$tracerStudyId}' AND tracer_study_detail_date='{$tahun}' ")['data'];
        }
    }
    