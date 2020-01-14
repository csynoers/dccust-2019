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
                    $statikRespon = $this->statik_respons();
					include_once("modul/mod_grafik_tracer/view_index.php");
					break;
			}
        }
        public function statik_respons()
        {
            $rows = [];
            $rows['prodi'] = $this->Model->get_select("SELECT prodi FROM `prodi` WHERE `id_prodi`={$_GET['prodi']} ")['data'][0]->prodi;
            $rows['jumlah_populasi_target'] = $this->Model->get_select("SELECT COUNT(*) AS total FROM alumni_daftar WHERE alumni_daftar.prodi='{$_GET['prodi']}' AND alumni_daftar.tahun_lulus='{$_GET['tahun']}' ")['data'][0]->total;
            $rows['subjek'] = $rows['jumlah_populasi_target'];
            $rows['responden'] = count( $this->Model->get_select("SELECT tracer_answers.nim FROM tracer_answers LEFT JOIN alumni_daftar ON alumni_daftar.nim=tracer_answers.nim WHERE tracer_answers.tracer_type='tracer_study' AND alumni_daftar.tahun_lulus='2017' AND alumni_daftar.prodi='27' GROUP BY alumni_daftar.nim ")['data'] );
            $rows['grass_respon_rate_text']     = "({$rows['responden']}/{$rows['jumlah_populasi_target']})*100%";
            $rows['grass_respon_rate_value']    = round( ($rows['responden']/$rows['jumlah_populasi_target'])*100 ,2);
            $rows['nett_respon_rate_text']      = $rows['grass_respon_rate_text'];
            $rows['nett_respon_rate_value']     = $rows['grass_respon_rate_value'];
            
            return (object) $rows;
        }
    }

    $load = new Controller($db_config);
    