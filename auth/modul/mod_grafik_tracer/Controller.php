<?php
    class Controller
    {
        public function __construct($db_config){
            $this->Model 	= new Model($db_config);
            $this->aksi		= 'modul/mod_grafik_tracer/Controller.php';
            $this->module 	= 'grafik-tracer';

            # get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
                case 'prodiAll':
                    $rows = $this->respon_rate();
                    include_once("modul/mod_grafik_tracer/view_respone_rate_tsust.php");
                    break;

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
        public function respon_rate()
        {
            $rows = [];
            $rows['data'] = $this->Model->get_select("SELECT f.id_fakultas,ad.fakultas ,f.fakultas ,( SELECT COUNT(*) FROM alumni_daftar AS ad_1 WHERE ad_1.prodi=ad.prodi ) AS total_alumni_fakultas FROM alumni_daftar AS ad LEFT JOIN fakultas AS f ON f.id_fakultas=ad.fakultas WHERE ad.tahun_lulus='2017' GROUP BY ad.fakultas ORDER BY f.fakultas ASC")['data'];
            foreach ($rows['data'] as $key => $value) {
                $value->total_alumni_tracer = $this->count_alumni_fill($value->id_fakultas);
                $value->respone_rate_value = round(($value->total_alumni_tracer/$value->total_alumni_fakultas)*100, 2);
                $value->respone_rate_text = $value->respone_rate_value.'%';
            }
            return $rows['data'];
        }
        public function count_alumni_fill($fakultas)
        {
            return count($this->Model->get_select("SELECT ta.nim FROM tracer_answers AS ta LEFT JOIN alumni_daftar AS ad ON ad.nim=ta.nim WHERE ta.tracer_type='tracer_study' AND ad.tahun_lulus='{$_GET['tahun']}' AND ad.fakultas='{$fakultas}' GROUP BY ta.nim")['data']);
        }
    }

    $load = new Controller($db_config);
    