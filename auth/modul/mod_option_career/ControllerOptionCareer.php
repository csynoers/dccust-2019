<?php
    class ControllerOptionCareer
    {
        public function __construct($db_config){
			$this->Model 	= new ModelOptionCareer($db_config);
			$this->aksi		= 'modul/mod_option_career/ControllerOptionCareer.php';
			$this->module 	= 'option_career';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'add':
					# view add form
					include_once("modul/mod_kerjasama/view_add.php");
					break;

				case 'edit':
					# view edit form
					$rows= $this->Model->get_kerjasama($_GET['id']);
					include_once("modul/mod_kerjasama/view_edit_kerjasama.php");
                    break;

				case 'store':
                    $this->Model->post= $_POST;
					if ( $_POST['operation']=='insert' ) {
						# insert
						if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                            $this->Model->post['gambar'] = img_resize($_FILES['gambar'],200,'../joimg/ourclient/'); 
                            if ( $this->Model->post['gambar'] != 'error' ) {
    
                                if ( $this->Model->insert_kerjasama() ) {
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
                            if ( $this->Model->insert_kerjasama() ) {
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
                            $this->Model->post['gambar'] = img_resize($_FILES['gambar'],200,'../joimg/ourclient/'); 
                            if ( $this->Model->post['gambar'] != 'error' ) {
                                $row= $this->Model->get_kerjasama($_POST['id_agenda'])[0];
                                if( ($row->gambar != '') && file_exists("../joimg/ourclient/{$row->gambar}") ){
                                    unlink("../joimg/ourclient/{$row->gambar}");
                                }
    
                                if ( $this->Model->update_kerjasama() ) {
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
                            if ( $this->Model->update_kerjasama() ) {
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
                    $row= $this->Model->get_kerjasama($_GET['id'])[0];
                    if( ($row->gambar != '') && file_exists("../joimg/ourclient/{$row->gambar}") ){
                        unlink("../joimg/ourclient/{$row->gambar}");
                    }

                    if ( $this->Model->delete_kerjasama($_GET['id']) ) {
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
                    $rows=[];
                    $rows['jenis_lowongan']= $this->Model->get_jenis_lowongan();
                    $rows['spesialisasi_pekerjaan']= $this->Model->get_spesialisasi_pekerjaan();
                    $rows['tingkat_jabatan']= $this->Model->get_tingkat_jabatan();
                    $rows['penempatan']= $this->Model->get_propinsi();
                    echo '<pre>';
                    print_r($rows);
                    echo '</pre>';
					include_once("modul/mod_option_career/view_index.php");
					break;
			}
		}

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerOptionCareer($db_config);
    
?>