<?php
    class Controller
    {
        public function __construct($db_config){
            $this->Model 	= new Model($db_config);
            $this->aksi		= 'modul/mod_grafik_tracer/Controller.php';
            $this->module 	= 'grafik-tracer';

            # get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
                   	
				default:
                    # if action is null load view index
                    $this->Model->id= $_GET['id'];
                    $option_setting = "";
                    foreach ($this->Model->get_settings() as $key => $value) {
                        $value->option_implode = implode(',',json_decode($value->options));
                        $option_setting = $value->option_implode;
                    }
                    $this->Model->id= $option_setting;
                    $rows_tr_pertanyaan = "";
                    $tracer_study_form_type = "";
                    foreach ($this->Model->get_pertanyaan_form_type() as $key => $value) {
                        $value->number = $key+1;
                        $tracer_study_form_type = $value->tracer_study_form_type;
                        $value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
                        $value->tracer_study_title = strip_tags($value->tracer_study_title);
                        $value->tracer_study_desc = strip_tags($value->tracer_study_desc);
                        switch ($value->tracer_study_form_type) {
                            case 'single_radio_button':
                                $value->tracer_study_form_type= 'Radio button';
                                $value->keterangan_jawaban = 'Jawaban 1 pilihan';
                                break;
                            case 'multiple_radio_button':
                                $value->tracer_study_form_type= 'Multiple radio button';
                                $value->keterangan_jawaban = 'Range antara 1-5';
                                break;
                            case 'checkbox':
                                $value->tracer_study_form_type= 'Checkbox';
                                $value->keterangan_jawaban = 'Jawaban Bisa > 1 pilihan';
                                break;
                            case 'input_number':
                                $value->tracer_study_form_type= 'Input number';
                                $value->keterangan_jawaban = 'Jawaban hanya Angka';
                                break;
                            
                            default:
                                # code...
                                break;
                        }

                        $rows_tr_pertanyaan .= "
                            <tr>
                                <td>{$value->number}</td>
                                <td>{$value->tracer_study_detail_title}</td>
                                <td>{$value->tracer_study_form_type}</td>
                                <td>{$value->keterangan_jawaban}</td>
                            </tr>
                        ";
                    }

					include_once("modul/mod_grafik_tracer/view_index.php");
					break;
			}
        }
    }

    $load = new Controller($db_config);
    