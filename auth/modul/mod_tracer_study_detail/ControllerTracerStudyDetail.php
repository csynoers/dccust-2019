<?php
    class ControllerTracerStudyCategory
    {
        public function __construct($db_config){
			$this->Model 	= new ModelTracerStudyDetail($db_config);
			$this->aksi		= 'modul/mod_tracer_study_detail/ControllerTracerStudyDetail.php';
			$this->module 	= 'tracer-study-detail';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'add':
					# view add form
					$kategori= $this->Model->get_tracer_studies();
					include_once("modul/mod_tracer_study_detail/view_add.php");
					break;

				case 'edit':
					# view edit form
					$kategori= $this->Model->get_tracer_studies();
					$rows= $this->Model->get_tracer_studies_detail($_GET['id']);
					include_once("modul/mod_tracer_study_detail/view_edit.php");
					break;

				case 'store':
					if ( $_POST['operation']=='insert' ) {
						# insert
						$this->Model->post= $_POST;
						if ( $this->Model->insert_tracer_studies_detail() ) {
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
						if ( $this->Model->update_tracer_studies_detail() ) {
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
					$rows= $this->Model->get_tracer_studies_detail();
					include_once("modul/mod_tracer_study_detail/view_index.php");
					break;
			}
		}

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerTracerStudyCategory($db_config);
    
?>