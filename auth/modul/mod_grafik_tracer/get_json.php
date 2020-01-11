<?php
    require_once "../../../josys/koneksi.php";
	require_once "../../../josys/dbHelper.php";
	require_once "Model.php";
    
    class Controller
    {
        public function __construct($db_config){
            $this->Model 	= new Model($db_config);
            if ( ! empty($_GET['formType']) && ! empty($_GET['cart']) ) {
                // $dynamicFunction = $_GET['formType'] .'_' .$_GET['cart'] ;
                $this->{$_GET['formType'] .'_' .$_GET['cart']}();
            }
        }

        /* ==================== START FORM TYPE MULTIPLE RADIO BUTTON ==================== */
        public function multiple_radio_button_table()
        {
            $rows = [];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                $value->countmean = $value->countadd/$value->countnumber;
                $value->roundcountmean = round($value->countmean,1);

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    (object) ['v'=>$value->roundcountmean,'f'=> "{$value->roundcountmean}"]
                ];
            }
            echo json_encode($rows);
        }
        public function multiple_radio_button_pie_chart()
        {
            $rows = [];
            $rows[]= ['Pertanyaan','Mean'];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                $value->countmean = $value->countadd/$value->countnumber;
                $value->roundcountmean = round($value->countmean,1);

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    $value->roundcountmean
                ];
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>$rows
            ]);
        }
        public function multiple_radio_button_donut_chart()
        {
            $rows = [];
            $rows[]= ['Pertanyaan','Mean'];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                $value->countmean = $value->countadd/$value->countnumber;
                $value->roundcountmean = round($value->countmean,1);

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    $value->roundcountmean
                ];
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>$rows
            ]);
        }
        public function multiple_radio_button_column_chart()
        {
            $rows = [];
            $heads = [];
            $rows[] = 'Mean';
            $heads[] = 'Rata-Rata';
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                $value->countmean = $value->countadd/$value->countnumber;
                $value->roundcountmean = round($value->countmean,1);

                // setrows
                $rows[] = $value->roundcountmean;
                $heads[] = $value->tracer_study_detail_title;
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>[$heads,$rows]
            ]);
        }
        public function multiple_radio_button_bar_chart()
        {
            $rows = [];
            $heads = [];
            $rows[] = 'Mean';
            $heads[] = 'Rata-Rata';
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                $value->countmean = $value->countadd/$value->countnumber;
                $value->roundcountmean = round($value->countmean,1);

                // setrows
                $rows[] = $value->roundcountmean;
                $heads[] = $value->tracer_study_detail_title;
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>[$heads,$rows]
            ]);
        }
        /* ==================== END FORM TYPE MULTIPLE RADIO BUTTON ==================== */
        
        /* ==================== START FORM TYPE SINGLE RADIO BUTTON ==================== */
        public function single_radio_button_table()
        {
            $rows = [];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->valueAnswer = $valueAnswer;
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    (object) ['v'=>$value->roundcountmean,'f'=> "{$value->roundcountmean} Bulan"]
                ];
            }
            echo json_encode($rows);
        }
        public function single_radio_button_pie_chart()
        {
            $rows = [];
            $rows[]= ['Pertanyaan','Mean'];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    $value->roundcountmean
                ];
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>$rows
            ]);
        }
        public function single_radio_button_donut_chart()
        {
            $rows = [];
            $rows[]= ['Pertanyaan','Mean'];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    $value->roundcountmean
                ];
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>$rows
            ]);
        }
        public function single_radio_button_column_chart()
        {
            $rows = [];
            $heads = [];
            $rows[] = 'Mean';
            $heads[] = 'Rata-Rata';
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = $value->roundcountmean;
                $heads[] = $value->tracer_study_detail_title;
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>[$heads,$rows]
            ]);
        }
        public function single_radio_button_bar_chart()
        {
            $rows = [];
            $heads = [];
            $rows[] = 'Mean';
            $heads[] = 'Rata-Rata';
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = $value->roundcountmean;
                $heads[] = $value->tracer_study_detail_title;
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>[$heads,$rows]
            ]);
        }
        /* ==================== END FORM TYPE SINGLE RADIO BUTTON ==================== */

        /* ==================== START FORM TYPE CHECKBOX ==================== */
        public function checkbox_table()
        {
            $rows = [];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->valueAnswer = $valueAnswer;
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    (object) ['v'=>$value->roundcountmean,'f'=> "{$value->roundcountmean}"]
                ];
            }
            echo json_encode($rows);
        }
        public function checkbox_pie_chart()
        {
            $rows = [];
            $rows[]= ['Pertanyaan','Mean'];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    $value->roundcountmean
                ];
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>$rows
            ]);
        }
        public function checkbox_donut_chart()
        {
            $rows = [];
            $rows[]= ['Pertanyaan','Mean'];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    $value->roundcountmean
                ];
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>$rows
            ]);
        }
        public function checkbox_column_chart()
        {
            $rows = [];
            $heads = [];
            $rows[] = 'Mean';
            $heads[] = 'Rata-Rata';
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = $value->roundcountmean;
                $heads[] = $value->tracer_study_detail_title;
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>[$heads,$rows]
            ]);
        }
        public function checkbox_bar_chart()
        {
            $rows = [];
            $heads = [];
            $rows[] = 'Mean';
            $heads[] = 'Rata-Rata';
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = $value->roundcountmean;
                $heads[] = $value->tracer_study_detail_title;
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>[$heads,$rows]
            ]);
        }
        /* ==================== END FORM TYPE CHECKBOX ==================== */

        /* ==================== START FORM TYPE NUMBER ==================== */
        public function input_number_table()
        {
            $rows = [];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->valueAnswer = $valueAnswer;
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    (object) ['v'=>$value->roundcountmean,'f'=> "{$value->roundcountmean}"]
                ];
            }
            echo json_encode($rows);
        }
        public function input_number_pie_chart()
        {
            $rows = [];
            $rows[]= ['Pertanyaan','Mean'];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    $value->roundcountmean
                ];
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>$rows
            ]);
        }
        public function input_number_donut_chart()
        {
            $rows = [];
            $rows[]= ['Pertanyaan','Mean'];
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = [
                    $value->tracer_study_detail_title,
                    $value->roundcountmean
                ];
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>$rows
            ]);
        }
        public function input_number_column_chart()
        {
            $rows = [];
            $heads = [];
            $rows[] = 'Mean';
            $heads[] = 'Rata-Rata';
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = $value->roundcountmean;
                $heads[] = $value->tracer_study_detail_title;
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>[$heads,$rows]
            ]);
        }
        public function input_number_bar_chart()
        {
            $rows = [];
            $heads = [];
            $rows[] = 'Mean';
            $heads[] = 'Rata-Rata';
            $this->Model->id= $_GET['idSetting'];
            foreach ($this->Model->get_settings() as $key => $value) {
                $value->option_implode = implode(',',json_decode($value->options));
                $option_setting = $value->option_implode;
            }
            $this->Model->id= $option_setting;
            foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                $value->tracer_study_title = strip_tags($value->tracer_study_title);
                $value->tracer_study_desc = strip_tags($value->tracer_study_desc);

                $this->Model->id= $value->tracer_study_detail_id;
                $value->countadd = 0;
                $value->countnumber = 0;
                foreach ($this->Model->get_multiple_radio_button() as $keyAnswer => $valueAnswer) {
                    $value->countnumber += 1;
                    $value->countadd += $valueAnswer->answer;                            
                }
                if ( $value->countadd > 0 ) {
                    $value->countmean = $value->countadd/$value->countnumber;
                    $value->roundcountmean = round($value->countmean,1);
                } else {
                    $value->countmean = 0;
                    $value->roundcountmean = 0;
                }

                // setrows
                $rows[] = $value->roundcountmean;
                $heads[] = $value->tracer_study_detail_title;
            }
            echo json_encode([
                "title"=>$_GET['title'],
                "rows"=>[$heads,$rows]
            ]);
        }
        /* ==================== END FORM TYPE NUMBER ==================== */
        
    }

    $load = new Controller($db_config);
    
    
    // echo '<pre>';
    // print_r($load);
    // echo '</pre>';