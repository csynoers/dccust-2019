<?php
    class ControllerPesan
    {
        public function __construct($db_config){
			$this->Model 	= new ModelPesan($db_config);
			$this->aksi		= 'modul/mod_pesan/ControllerPesan.php';
            
            $this->url          = new stdClass(); 
            $this->url->module 	= $_GET['module'];
            $this->url->data     = empty($_GET['data']) ? NULL : $_GET['data'] ;
            $this->url->act     = empty($_GET['act']) ? NULL : $_GET['act'] ;
            
            $this->config       = new stdClass();
            $this->config->img  = [
                // 'banner'=> [
                //     'max-width'=> 512,
                //     'dir'=> '../joimg/banner/',
                // ],
            ];

			# get parameter $_GET['act']
			switch ( $this->url->act ) {
				case 'add':
                    # view add form
                    $this->add();
                    break;

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

        /* form add */
        public function add()
        {
            include_once("modul/mod_{$this->url->module}/view_{$this->url->act}".(empty($this->url->data) ? NULL : "_{$this->url->data}" ).".php");
        }

        /* form edit */
        public function edit()
        {
            $rows= $this->Model->{'get_'.(empty($this->url->data) ? $this->url->module : $this->url->data )}($_GET['id']);
            include_once("modul/mod_{$this->url->module}/view_{$this->url->act}".(empty($this->url->data) ? NULL : "_{$this->url->data}" ).".php");
        }

        /* filter store method */
        public function store()
        {
            return ($_POST['operation']=='insert') ? $this->insert() : $this->update() ;
        }

        /* insert method */
        public function insert()
        {
            $this->Model->post= $_POST;

            if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                $this->Model->post['gambar'] = img_resize($_FILES['gambar'],$this->config->img[(empty($this->url->data)? $this->url->module : $this->url->data )]['max-width'],$this->config->img[(empty($this->url->data)? $this->url->module : $this->url->data )]['dir']); 
                if ( $this->Model->post['gambar'] != 'error' ) {

                    if ( $this->Model->{'insert_'.(empty($this->url->data)? $this->url->module : $this->url->data )}() ) {
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
                if ( $this->Model->{'insert_'.(empty($this->url->data)? $this->url->module : $this->url->data )}() ) {
                    # TRUE
                    # location header
                    echo "<script>alert('Data berhasil ditambahkan'); window.history.go(-2);</script>";
                    
                } else {
                    # FALSE
                    # location header
                    echo "<script>alert('Data gagal ditambahkan'); window.history.back();</script>";

                }

            }
        }

        /* update method */
        public function update()
        {
            $this->Model->post= $_POST;
            
            if ( ! empty($_FILES['gambar']['tmp_name']) ) {
                $this->Model->post['gambar'] = img_resize($_FILES['gambar'],$this->config->img[(empty($this->url->data)? $this->url->module : $this->url->data )]['max-width'],$this->config->img[(empty($this->url->data)? $this->url->module : $this->url->data )]['dir']); 
                if ( $this->Model->post['gambar'] != 'error' ) {
                    $row= $this->Model->{'get_'.(empty($this->url->data)? $this->url->module : $this->url->data )}($_POST['id'])[0];
                    if( ($row->gambar != '') && file_exists($this->config->img[(empty($this->url->data)? $this->url->module : $this->url->data )]['dir'].$row->gambar) ){
                        unlink($this->config->img[(empty($this->url->data)? $this->url->module : $this->url->data )]['dir'].$row->gambar);
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
            if ( in_array((empty($this->url->data)? $this->url->module : $this->url->data ),array_keys($this->config->img)) ) {
                $row= $this->Model->{'get_'.(empty($this->url->data)? $this->url->module : $this->url->data )}($_GET['id'])[0];                
            }
            if ( $this->Model->{'delete_'.(empty($this->url->data)? $this->url->module : $this->url->data )}($_GET['id']) ) {
                if ( in_array((empty($this->url->data)? $this->url->module : $this->url->data ),array_keys($this->config->img)) ) {
                    if( ($row->gambar != '') && file_exists($this->config->img[(empty($this->url->data)? $this->url->module : $this->url->data )]['dir'].$row->gambar) ){
                        unlink($this->config->img[(empty($this->url->data)? $this->url->module : $this->url->data )]['dir'].$row->gambar);
                    }
                    
                }
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
	
	$load= new ControllerPesan($db_config);
    
?>