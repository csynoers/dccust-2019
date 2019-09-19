<?php
    class ControllerKarir
    {
        public function __construct($db_config){
			$this->Model 	= new ModelKarir($db_config);
			$this->aksi		= 'modul/mod_karir/ControllerKarir.php';
			$this->module 	= 'karir';

			# get parameter $_GET['act']
			switch ( empty($_GET['act']) ? NULL : $_GET['act'] ) {
				case 'add':
                    # view add form
                    $rows['jenis_lowongan']= $this->Model->get_jenis_lowongan();
                    $rows['spesialisasi_pekerjaan']= $this->Model->get_spesialisasi_pekerjaan();
                    $rows['tingkat_jabatan']= $this->Model->get_tingkat_jabatan();
                    $rows['penempatan']= $this->Model->get_propinsi();
                    
					include_once("modul/mod_karir/view_add.php");
					break;

				case 'edit':
					# view edit form
                    $rows['karir']= $this->Model->get_karir($_GET['id']);
                    $rows['jenis_lowongan']= $this->Model->get_jenis_lowongan();
                    $rows['spesialisasi_pekerjaan']= $this->Model->get_spesialisasi_pekerjaan();
                    $rows['tingkat_jabatan']= $this->Model->get_tingkat_jabatan();
                    $rows['penempatan']= $this->Model->get_propinsi();

					include_once("modul/mod_karir/view_edit_karir.php");
                    break;

				case 'store':
                    $this->Model->post= $_POST;
					if ( $_POST['operation']=='insert' ) {
						# insert
						if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                            $this->Model->post['gambar'] = img_resize($_FILES['gambar'],1024,'../joimg/karir/'); 
                            if ( $this->Model->post['gambar'] != 'error' ) {
    
                                if ( $this->Model->insert_karir() ) {
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
                            if ( $this->Model->insert_karir() ) {
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
                            $this->Model->post['gambar'] = img_resize($_FILES['gambar'],1024,'../joimg/karir/'); 
                            if ( $this->Model->post['gambar'] != 'error' ) {
                                $row= $this->Model->get_karir($_POST['id_karir'])[0];
                                if( ($row->gambar != '') && file_exists("../joimg/karir/{$row->gambar}") ){
                                    unlink("../joimg/karir/{$row->gambar}");
                                }
    
                                if ( $this->Model->update_karir() ) {
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
                            if ( $this->Model->update_karir() ) {
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
                    $row= $this->Model->get_karir($_GET['id'])[0];
                    if( ($row->gambar != '') && file_exists("../joimg/karir/{$row->gambar}") ){
                        unlink("../joimg/karir/{$row->gambar}");
                    }

                    if ( $this->Model->delete_karir($_GET['id']) ) {
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
					$rows= $this->Model->get_karir();
					include_once("modul/mod_karir/view_index.php");
					break;
			}
		}

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerKarir($db_config);
    
?>