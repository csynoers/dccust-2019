<?php
    class ControllerSettingGrafikTracer
    {
        public function __construct($db_config){
			$this->Model 	= new ModelSettingGrafikTracer($db_config);
			$this->aksi		= 'modul/mod_setting_grafik_tracer/Controller.php';
			$this->module 	= 'setting-grafik-tracer';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'add':
					# view add form
					$kategori= $this->Model->get_tracer_studies();
					include_once("modul/mod_setting_grafik_tracer/view_add.php");
					break;

				case 'edit':
					# view edit form
					$rows= $this->Model->get_settings($_GET['id']);
					include_once("modul/mod_setting_grafik_tracer/view_edit.php");
					break;

				case 'store':
					if ( $_POST['operation']=='insert' ) {
						# insert
						$this->Model->post= $_POST;
						if ( $this->Model->insert_settings() ) {
							# TRUE
							# location header
							echo "<script>alert('Data berhasil ditambahkan'); window.history.go(-2);</script>";
							
						} else {
							# FALSE
							# location header
							echo "<script>alert('Data gagal ditambahkan'); window.history.back();</script>";
						}

					} else {
						# update
						$this->Model->post= $_POST;
						if ( $this->Model->update_settings() ) {
							# TRUE
							# location header
							echo "<script>alert('Data berhasil diubah'); window.history.go(-2);</script>";
							
						} else {
							# FALSE
							# location header
							echo "<script>alert('Data gagal diubah'); window.history.back();</script>";
						}

					}
					
					break;

				case 'delete':
					# code...
					break;
				
				default:
					# if action is null load view index
					$rows= $this->Model->get_settings();
					include_once("modul/mod_setting_grafik_tracer/view_index.php");
					break;
			}
		}

		public function checkbox_category($checked=NULL)
		{
			$formType = [
				'single_radio_button' => 'Radio button',
				'multiple_radio_button' => 'Multiple radio button',
				'checkbox' => 'Checkbox',
				'input_number' => 'Input number',
			];			
			$checkbox = '';
			$this->Model->where = "WHERE ts.tracer_study_date='{$_GET['tahun']}' AND ts.tracer_study_parent='0' ";
			foreach ($this->Model->get_tracer_studies() as $key => $value) {
				$value->tracer_study_title = strip_tags($value->tracer_study_title);
				if ( $value->rows_child > 0 ) {
					$child_html = "";
					$this->Model->where = "WHERE ts.tracer_study_date='{$_GET['tahun']}' AND ts.tracer_study_parent='{$value->tracer_study_id}' ";
					foreach ($this->Model->get_tracer_studies() as $key_child => $value_child) {
						$value_child->tracer_study_title = strip_tags($value_child->tracer_study_title)." <span class='text-muted'>(Form Type : {$formType[ $value_child->tracer_study_form_type ]})</span>";
						$child_html .= "
							<li>
								<label>{$value_child->tracer_study_title}</label>
								".$this->checkbox_category_detail($value_child->tracer_study_id,$checked)."
							</li>
						";
					}
					$checkbox .= "
					<li>
						<label>{$value->tracer_study_title}</label>
						<ul>{$child_html}</ul>
					</li>
					";
				} else {
					$value->tracer_study_title = strip_tags($value->tracer_study_title)." <span class='text-muted'>(Form Type : {$formType[ $value->tracer_study_form_type ]})</span>";
					$checkbox .= "
					<li>
						<label>{$value->tracer_study_title}</label>
						".$this->checkbox_category_detail($value->tracer_study_id,$checked)."
					</li>
					";
				}
				
			}
			return "<ul>{$checkbox}</ul>";
		}

		public function checkbox_category_detail($tracerStudyId,$checked=NULL){
			$html = "";
			foreach ( $this->Model->get_tracer_studies_detail($tracerStudyId,$_GET['tahun']) as $key => $value) {
				$value->tracer_study_detail_title = strip_tags($value->tracer_study_detail_title);
				$value->checked_status = NULL;
				
				if ( $checked ) {
					if ( in_array($value->tracer_study_detail_id,$checked) ) {
						$value->checked_status = 'checked';
					}	
				}

				$html .= "
					<li>
						<div class='checkbox'>
							<label><input {$value->checked_status} name='tracer_study_detail_id[]' type='checkbox' value='{$value->tracer_study_detail_id}'>{$value->tracer_study_detail_title}</label>
						</div>
					</li>
				";
			}

			return "<ul>{$html}</ul>";
		}

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerSettingGrafikTracer($db_config);
    
?>