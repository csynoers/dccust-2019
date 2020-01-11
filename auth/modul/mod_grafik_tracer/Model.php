<?php
    class Model extends dbHelper
    {
        public $id = NULL;
        
        public function get_data()
        {
            if ( $this->id ) {
                $rows = $this->get_select("SELECT * FROM `settings` WHERE 1 AND id='{$this->id}' ")['data'];
            } else {
                $rows = $this->get_select("SELECT * FROM `settings` WHERE 1 ")['data'];
            }
            return $rows;
        }

        public function get_settings()
        {
            if ( $this->id ) {
                $rows = $this->get_select("SELECT * FROM `settings` WHERE 1 AND id='{$this->id}' ")['data'];
            } else {
                $rows = $this->get_select("SELECT * FROM `settings` WHERE 1 ")['data'];
            }
            return $rows;
        }

        public function get_pertanyaan_form_type()
        {
            if ( $this->id ) {
                $rows = $this->get_select("SELECT * FROM tracer_studies_detail AS tsd LEFT JOIN tracer_studies AS ts ON ts.tracer_study_id=tsd.tracer_study_id WHERE tsd.tracer_study_detail_id IN({$this->id}) ORDER BY ts.tracer_study_form_type ASC")['data'];
            } else {
                $rows = $this->get_select("SELECT * FROM `settings` WHERE 1 ")['data'];
            }
            return $rows;
        }
        public function get_multiple_radio_button()
        {
            if ( $this->id ) {
                $rows = $this->get_select("SELECT * FROM tracer_answers AS ta LEFT JOIN alumni_daftar AS ad ON ad.nim=ta.nim WHERE 1 AND ta.question_id IN({$this->id}) AND ad.tahun_lulus='2017' AND ad.prodi='27' ")['data'];
            } else {
                $rows = $this->get_select("SELECT * FROM `settings` WHERE 1 ")['data'];
            }
            return $rows;
        }

        public function store_data()
        {

        }

        public function delete_data()
        {
            
        }
    }
    