<?php
	require_once "../../../josys/koneksi.php";
    require_once "../../../josys/dbHelper.php";
    class Model extends dbHelper
    {
        public function get_setting()
        {
            return $this->get_select("SELECT * FROM settings WHERE settings.id='{$_GET['idsetting']}' ")['data'];
        }

        public function get_setting_implode()
        {
            $where_in = "";
            foreach ($this->get_setting() as $key => $value) {
                $where_in = implode(',', json_decode($value->options));
            }
            return $where_in;    
        }

        public function get_tracer_studies($id=NULL)
        {
            if ($id) {
                return $this->get_select("SELECT * FROM tracer_studies WHERE tracer_study_id='{$id}' ")['data'];
            } else {
                return $this->get_select("SELECT * FROM tracer_studies WHERE tracer_study_id IN({$this->get_setting_implode()}) ")['data'];
            }
        }

        public function get_tracer_studies_detail($tracerStudyId=NULL)
        {
            if ( $tracerStudyId ) {
                return $this->get_select("SELECT * FROM `tracer_studies_detail` WHERE 1 AND tracer_study_id={$tracerStudyId} ")['data'];
            } else {
                return $this->get_select("SELECT * FROM `tracer_studies_detail` WHERE 1 ")['data'];
            }
            
        }

        public function get_tracer_studies_detail_implode($tracerStudyId)
        {
            $data= [];
            foreach ($this->get_tracer_studies_detail($tracerStudyId) as $key => $value) {
                $data[] = $value->tracer_study_detail_id;
            }
            return implode(',', $data);
        }

        public function get_header_dinamyc()
        {
            $data = [];
            foreach ($this->get_tracer_studies() as $key => $value) {
                $value->tracer_study_title = strip_tags($value->tracer_study_title); 
                if ( ! $value->tracer_study_desc ) {
                    $value->tracer_study_desc = '<em>' .strip_tags( $this->get_tracer_studies( $value->tracer_study_parent )[0]->tracer_study_desc ) .'</em>';
                }
                switch ($value->tracer_study_form_type) {
                    case 'multiple_radio_button':
                        $value->column = 2;
                        $value->column_fill = ['tracer_study_detail_title'=>'Pertanyaan','answer'=>'Jawaban'];
                        break;
                    
                    default:
                        $value->column = 1;
                        $value->column_fill = ['answer' => 'Jawaban'];
                        break;
                }

                $data[] = $value;
            }
            return $data;
        }

        public function get_rows()
        {
            if (isset($_POST['prodi'])) {
                $rows = $this->get_select("
                    SELECT *
                    FROM tracer_studies AS ts 
                        INNER JOIN tracer_studies_detail AS tsd
                            ON tsd.tracer_study_id=ts.tracer_study_id
                        INNER JOIN tracer_answers AS ta
                            ON ta.question_id=tsd.tracer_study_detail_id
                        LEFT JOIN alumni_daftar AS ad
                            ON ad.nim=ta.nim
                        LEFT JOIN prodi AS p
                            ON p.id_prodi=ad.prodi
                    WHERE ts.tracer_study_id IN ({$this->get_setting_implode()}) AND ad.prodi='{$_POST['prodi']}' AND ad.tahun_lulus='{$_GET['tahun']}' GROUP BY ta.nim
                ");
            }else{
                $rows = $this->get_select("
                    SELECT *
                    FROM tracer_studies AS ts 
                        INNER JOIN tracer_studies_detail AS tsd
                            ON tsd.tracer_study_id=ts.tracer_study_id
                        INNER JOIN tracer_answers AS ta
                            ON ta.question_id=tsd.tracer_study_detail_id
                        LEFT JOIN alumni_daftar AS ad
                            ON ad.nim=ta.nim
                        LEFT JOIN prodi AS p
                            ON p.id_prodi=ad.prodi
                    WHERE ts.tracer_study_id IN ({$this->get_setting_implode()}) AND ad.tahun_lulus='{$_GET['tahun']}' GROUP BY ta.nim
                ");
            }
            return $rows['data'];
        }

        public function get_tracer_answers($nim,$questionId)
        {
            return $this->get_select("SELECT * FROM tracer_answers AS ta LEFT JOIN tracer_studies_detail AS tsd ON tsd.tracer_study_detail_id=ta.question_id  WHERE ta.nim='{$nim}' AND ta.question_id IN ({$questionId}) ")['data'];
        }
    }
    
    $db = new Model($db_config);

	if ( count( $db->get_setting() ) > 0 ) {
        $th= [];
        foreach ($db->get_header_dinamyc() as $key => $value) {
            $th[]= "<th>{$value->tracer_study_title}<br>{$value->tracer_study_desc}</th>";
        }
        $th= implode('',$th);         

        $tr= [];
        $no=1;
        foreach ($db->get_rows() as $key => $value) {
            $tdDynamic = [];
            foreach ($db->get_header_dinamyc() as $key_header => $value_header) {
                $tableTr = [];
                foreach ($db->get_tracer_answers( $value->nim, $db->get_tracer_studies_detail_implode($value_header->tracer_study_id) ) as $key_answer => $value_answer) {
                    $tableTd = [];
                    $tableTdHeader = [];
                    foreach ($value_header->column_fill as $key_column_fill => $value_column_fill) {
                        $tableTdHeader[] = "<th>{$value_column_fill}</th>";
                    }
                    $tableTr[] = '<tr>' .implode('',$tableTdHeader) .'</tr>';
                    foreach ($value_header->column_fill as $key_column_fill => $value_column_fill) {
                        $tableTd[] = "<td>{$value_answer->$key_column_fill}</td>";
                    }
                    $tableTr[] = '<tr>' .implode('',$tableTd) .'</tr>';
                    
                }
                $tableTr = implode('',$tableTr);
                $tdDynamic[] = "
                    <td><table border='1'>{$tableTr}</table></td>
                ";
            }
            // echo '<pre>';
            // print_r( $tdDynamic );
            // echo '</pre>';
            $tdDynamic = implode('',$tdDynamic);
            // echo '<pre>';
            // print_r( $tdDynamic );
            // echo '</pre>';

            $td= [];
            $td[]= "<td>{$no}</td>";
            $td[]= "<td>{$value->nim}</td>";
            $td[]= "<td>{$value->nama_alumni}</td>";
            $td[]= "<td>{$value->prodi}</td>";
            $td[]= "<td>{$value->tahun_lulus}</td>";
            $td[]= $tdDynamic;
            $td= implode('',$td);
            $tr[]= "<tr>{$td}</tr>";
            $no++;
        }
        $tr= implode('',$tr);
	}
?>
<table border="1">
	<!-- title -->
	<tr>
		<td style="text-align: center;">
			<h1 style="margin: 0.5rem;text-transform: uppercase;">HASIL TRACER</h1>
			<h2 style="margin: 0.5rem;text-transform: uppercase;"><?= $_GET['title'] ?></h2>
		</td>
	</tr>

	<!-- rows content -->
	<tr>
		<td>
			<table border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Alumni</th>
                        <th>Prodi</th>
                        <th>Tahun Lulus</th>
                        <?= $th ?>
                    </tr>
                </thead>
                <tbody>
                    <?= $tr ?>
                </tbody>
			</table>
		</td>
	</tr>
</table>