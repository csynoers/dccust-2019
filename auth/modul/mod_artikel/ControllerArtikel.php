<?php
    class ControllerArtikel
    {
        public function __construct($db_config){
			$this->Model 	= new ModelArtikel($db_config);
			$this->aksi		= 'modul/mod_artikel/ControllerArtikel.php';
			$this->module 	= 'artikel';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'add':
					# view add form
					include_once("modul/mod_artikel/view_add.php");
					break;

				case 'edit':
					# view edit form
					$rows= $this->Model->get_artikel($_GET['id']);
					include_once("modul/mod_artikel/view_edit_artikel.php");
                    break;
                    
				case 'update_header':
					# view edit header
					$rows= $this->Model->get_header();
					include_once("modul/mod_artikel/view_edit_header.php");
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
                            $this->Model->post['gambar'] = img_resize($_FILES['gambar'],1024,'../joimg/artikel/'); 
                            if ( $this->Model->post['gambar'] != 'error' ) {
    
                                if ( $this->Model->insert_artikel() ) {
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
                            if ( $this->Model->insert_artikel() ) {
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
                            $this->Model->post['gambar'] = img_resize($_FILES['gambar'],1300,'../joimg/artikel/'); 
                            if ( $this->Model->post['gambar'] != 'error' ) {
                                $row= $this->Model->get_artikel($_POST['id_artikel'])[0];
                                if( ($row->gambar != '') && file_exists("../joimg/artikel/{$row->gambar}") ){
                                    unlink("../joimg/artikel/{$row->gambar}");
                                }
    
                                if ( $this->Model->update_artikel() ) {
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
                            if ( $this->Model->update_artikel() ) {
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
                    $row= $this->Model->get_artikel($_GET['id'])[0];
                    if( ($row->gambar != '') && file_exists("../joimg/artikel/{$row->gambar}") ){
                        unlink("../joimg/artikel/{$row->gambar}");
                    }

                    if ( $this->Model->delete_artikel($_GET['id']) ) {
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
					$rows= $this->Model->get_artikel();
					include_once("modul/mod_artikel/view_index.php");
					break;
			}
		}

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerArtikel($db_config);
    
?>