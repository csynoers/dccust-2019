<?php
    class ControllerBukuTamu
    {
        public function __construct($db_config){
			$this->Model 	= new ModelBukuTamu($db_config);
			$this->aksi		= 'modul/mod_buku_tamu/ControllerBukuTamu.php';
            
            $this->url          = new stdClass(); 
            $this->url->module 	= $_GET['module'];
            $this->url->data     = empty($_GET['data']) ? NULL : $_GET['data'] ;
            $this->url->act     = empty($_GET['act']) ? NULL : $_GET['act'] ;
            
            $this->config       = new stdClass();
            $this->config->img  = [
                'header'=> [
                    'max-width'=> 1300,
                    'dir'=> '../joimg/header_image/',
                ],
            ];

			# get parameter $_GET['act']
			switch ( $this->url->act ) {
				case 'edit':
                    # view edit form
                    $this->edit();
                    break;

                case 'store':
                    # store data
                    $this->store();					
					break;

				case 'delete':
                    # delete this
                    $this->delete();
					break;
				
				default:
					# if action is null load view index 
					$rows= $this->Model->{'get_'.$this->url->module}();
					include_once("modul/mod_{$this->url->module}/view_index.php");
					break;
			}
        }

        /* form edit */
        public function edit()
        {
            $rows= $this->Model->{'get_'.(empty($this->url->data) ? 'buku_tamu' : $this->url->data )}($_GET['id']);
            include_once("modul/mod_{$this->url->module}/view_{$this->url->act}".(empty($this->url->data) ? NULL : "_{$this->url->data}" ).".php");
        }

        /* filter store method */
        public function store()
        {
            return ($_POST['operation']!='update') ? $this->insert() : $this->update() ;
        }

        /* update method */
        public function update()
        {
            $this->Model->post= $_POST;
            
            if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                $this->Model->post['gambar'] = img_resize($_FILES['gambar'],$this->config->img[$this->url->data]['max-width'],$this->config->img[$this->url->data]['dir']); 
                if ( $this->Model->post['gambar'] != 'error' ) {
                    $row= $this->Model->{'get_'.(empty($this->url->data)? $this->url->module : $this->url->data )}($_POST['id'])[0];
                    if( ($row->gambar != '') && file_exists($this->config->img[$this->url->data]['dir'].$row->gambar) ){
                        unlink($this->config->img[$this->url->data]['dir'].$row->gambar);
                    }

                    if ( $this->Model->{'update_'.(empty($this->url->data)? $this->url->module : $this->url->data )}() ) {
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
                if ( $this->Model->{'update_'.(empty($this->url->data)? $this->url->module : $this->url->data )}() ) {
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

        public function delete()
        {
            if ( $this->Model->{'delete_'.$this->url->data}($_GET['id']) ) {
                # TRUE
                # location header
                echo "<script>alert('Data berhasil dihapus'); window.history.go(-1);</script>";
                
            } else {
                # FALSE
                # location header
                echo "<script>alert('Data gagal dihapus'); window.history.back();</script>";

            }
        }

		// fake "extends C" using magic function
		public function __call($method, $args)
		{
		  $this->c->$method($args[0]);
		}
	}
	
	$load= new ControllerBukuTamu($db_config);
    
?>