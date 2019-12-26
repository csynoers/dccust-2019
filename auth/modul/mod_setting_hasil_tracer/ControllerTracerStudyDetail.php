<?php
    class ControllerTracerStudyCategory
    {
        public function __construct($db_config){
			$this->Model 	= new ModelTracerStudyDetail($db_config);
			$this->aksi		= 'modul/mod_setting_hasil_tracer/ControllerTracerStudyDetail.php';
			$this->module 	= 'setting-hasil-tracer';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'add':
					# view add form
					$kategori= $this->Model->get_tracer_studies();
					include_once("modul/mod_setting_hasil_tracer/view_add.php");
					break;

				case 'edit':
					# view edit form
					$rows= $this->Model->get_settings($_GET['id']);
					include_once("modul/mod_setting_hasil_tracer/view_edit.php");
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
					include_once("modul/mod_setting_hasil_tracer/view_index.php");
					break;
			}
		}

		public function checkbox_category($checked=NULL)
		{			
			$checkbox = '';
			$this->Model->where = "WHERE ts.tracer_study_date='{$_GET['tahun']}' AND ts.tracer_study_parent='0' ";
			foreach ($this->Model->get_tracer_studies() as $key => $value) {
				if ( $value->rows_child > 0 ) {
					$child_html = "";
					$this->Model->where = "WHERE ts.tracer_study_date='{$_GET['tahun']}' AND ts.tracer_study_parent='{$value->tracer_study_id}' ";
					foreach ($this->Model->get_tracer_studies() as $key_child => $value_child) {
						$checked_status = NULL;
						if ( $checked ) {
							if ( in_array($value_child->tracer_study_id,$checked) ) {
								$checked_status= 'checked';
							}	
						}

						$child_html .= "
							<li>
								<div class='checkbox'>
									<label><input {$checked_status} name='tracer_study_id[]' type='checkbox' value='{$value_child->tracer_study_id}'>".strip_tags($value_child->tracer_study_title)."</label>
								</div>
							</li>
						";
					}
					$checkbox .= "
					<li>
						<div class='checkbox'>
							<label>".strip_tags($value->tracer_study_title)."</label>
							<ul>{$child_html}</ul>
						</div>
					</li>
					";
				} else {
					$checked_status = NULL;
					if ( $checked ) {
						if ( in_array($value->tracer_study_id,$checked) ) {
							$checked_status= 'checked';
						}	
					}
					$checkbox .= "
					<li>
						<div class='checkbox'>
							<label><input {$checked_status} name='tracer_study_id[]' type='checkbox' value='{$value->tracer_study_id}'>".strip_tags($value->tracer_study_title)."</label>
						</div>
					</li>
					";
				}
				
			}
			return "<ul>{$checkbox}</ul>";
		}

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerTracerStudyCategory($db_config);
    
?>