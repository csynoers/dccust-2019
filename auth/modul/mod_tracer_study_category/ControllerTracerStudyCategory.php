<?php
    class ControllerTracerStudyCategory
    {
        public function __construct($db_config){
			$this->Model 	= new ModelTracerStudyCategory($db_config);
			$this->aksi		= 'modul/mod_tracer_study_category/ControllerTracerStudyCategory.php';
			$this->module 	= 'tracer-study-category';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'add':
					# view add form
					$this->parent 			= empty($_GET['parent']) ? 0 : $_GET['parent'] ;
					include_once("modul/mod_tracer_study_category/view_add.php");
					break;

				case 'edit':
					# view edit form
					$this->parent 			= empty($_GET['parent']) ? 0 : $_GET['parent'] ;
					$rows= $this->Model->get_tracer_studies($_GET['id']);
					include_once("modul/mod_tracer_study_category/view_edit.php");
					break;

				case 'store':
					if ( $_POST['operation']=='insert' ) {
						# insert
						$this->Model->post= $_POST;
						if ( $this->Model->insert_tracer_studies() ) {
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
						if ( $this->Model->update_tracer_studies() ) {
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
					$this->parent 			= empty($_GET['parent']) ? 0 : $_GET['parent'] ; 
					$this->Model->parent_id = $this->parent;
					$rows= $this->Model->get_tracer_studies();
					include_once("modul/mod_tracer_study_category/view_index.php");
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