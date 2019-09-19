<?php
    class ControllerAgenda
    {
        public function __construct($db_config){
			$this->Model 	= new ModelAgenda($db_config);
			$this->aksi		= 'modul/mod_Agenda/ControllerAgenda.php';
			$this->module 	= 'agenda';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'add':
					# view add form
					include_once("modul/mod_agenda/view_add.php");
					break;

				case 'edit':
					# view edit form
					$rows= $this->Model->get_agenda($_GET['id']);
					include_once("modul/mod_agenda/view_edit_agenda.php");
                    break;
                    
				case 'update_header':
					# view edit header
					$rows= $this->Model->get_header();
					include_once("modul/mod_agenda/view_edit_header.php");
					break;
                
                case 'store_header':
                    # update header
                    $this->Model->post= $_POST;
                    if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                        $this->Model->post['gambar'] = img_resize($_FILES['gambar'],1300,'../joimg/header_image/'); 
                        if ( $this->Model->post['gambar'] != 'error' ) {
                            $row= $this->Model->get_header()[0];
                            if( ($row->gambar != '') && file_exists("../joimg/header_image/{$row->gambar}") ){
                                unlink("../joimg/header_image/{$row->gambar}");
                            }

                            if ( $this->Model->update_header() ) {
                                # TRUE
                                # location header
                                echo "<script>alert('Data berhasil diubah'); window.history.go(-1);</script>";
                                
                            } else {
                                # FALSE
                                # location header
                                echo "<script>alert('Data gagal diubah'); window.history.back();</script>";

                            }

                        } else {
                            # FALSE
                            # location header
                            echo "<script>alert('Data gagal diupload'); window.history.back();</script>";
                        }

                    } else {
                        if ( $this->Model->update_header() ) {
                            # TRUE
                            # location header
                            echo "<script>alert('Data berhasil diubah'); window.history.go(-1);</script>";
                            
                        } else {
                            # FALSE
                            # location header
                            echo "<script>alert('Data gagal diubah'); window.history.back();</script>";

                        }

                    }
					break;

				case 'store':
                    $this->Model->post= $_POST;
					if ( $_POST['operation']=='insert' ) {
						# insert
						if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                            $this->Model->post['gambar'] = img_resize($_FILES['gambar'],1024,'../joimg/event/'); 
                            if ( $this->Model->post['gambar'] != 'error' ) {
    
                                if ( $this->Model->insert_agenda() ) {
                                    # TRUE
                                    # location header
                                    echo "<script>alert('Data berhasil ditambahkan'); window.history.go(-2);</script>";
                                    
                                } else {
                                    # FALSE
                                    # location header
                                    echo "<script>alert('Data gagal ditambahkan'); window.history.back();</script>";
    
                                }
    
                            } else {
                                # FALSE
                                # location header
                                echo "<script>alert('Data gagal diupload'); window.history.back();</script>";
                            }
    
                        } else {
                            if ( $this->Model->insert_agenda() ) {
                                # TRUE
                                # location header
                                echo "<script>alert('Data berhasil ditambahkan'); window.history.go(-2);</script>";
                                
                            } else {
                                # FALSE
                                # location header
                                echo "<script>alert('Data gagal ditambahkan'); window.history.back();</script>";
    
                            }
    
                        }

					} else {
						# update
						if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                            $this->Model->post['gambar'] = img_resize($_FILES['gambar'],1024,'../joimg/event/'); 
                            if ( $this->Model->post['gambar'] != 'error' ) {
                                $row= $this->Model->get_beasiswa($_POST['id_agenda'])[0];
                                if( ($row->gambar != '') && file_exists("../joimg/event/{$row->gambar}") ){
                                    unlink("../joimg/event/{$row->gambar}");
                                }
    
                                if ( $this->Model->update_agenda() ) {
                                    # TRUE
                                    # location header
                                    echo "<script>alert('Data berhasil diubah'); window.history.go(-2);</script>";
                                    
                                } else {
                                    # FALSE
                                    # location header
                                    echo "<script>alert('Data gagal diubah'); window.history.back();</script>";
    
                                }
    
                            } else {
                                # FALSE
                                # location header
                                echo "<script>alert('Data gagal diupload'); window.history.back();</script>";
                            }
    
                        } else {
                            if ( $this->Model->update_agenda() ) {
                                # TRUE
                                # location header
                                echo "<script>alert('Data berhasil diubah'); window.history.go(-2);</script>";
                                
                            } else {
                                # FALSE
                                # location header
                                echo "<script>alert('Data gagal diubah'); window.history.back();</script>";
    
                            }
    
                        }

					}
					
					break;

				case 'delete':
                    # delete this
                    $row= $this->Model->get_beasiswa($_GET['id'])[0];
                    if( ($row->gambar != '') && file_exists("../joimg/beasiswa/{$row->gambar}") ){
                        unlink("../joimg/beasiswa/{$row->gambar}");
                    }

                    if ( $this->Model->delete_beasiswa($_GET['id']) ) {
                        # TRUE
                        # location header
                        echo "<script>alert('Data berhasil dihapus'); window.history.go(-1);</script>";
                        
                    } else {
                        # FALSE
                        # location header
                        echo "<script>alert('Data gagal dihapus'); window.history.back();</script>";

                    }
					break;
				
				default:
					# if action is null load view index 
					$rows= $this->Model->get_agenda();
					include_once("modul/mod_agenda/view_index.php");
					break;
			}
		}

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerAgenda($db_config);
    
?>