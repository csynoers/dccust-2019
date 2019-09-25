<?php
    session_start();
    if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
        echo "
            <link href='css/screen.css' rel='stylesheet' type='text/css'>
            <link href='css/reset.css' rel='stylesheet' type='text/css'>
            <center>
                Anda harus login dulu <br>
                <a href=index.php><b>LOGIN</b></a>
            </center>
       ";
    }
    else{
        require_once "../josys/koneksi.php";
        require_once "../josys/dbHelper.php";
        
        class ModelAjaxData extends dbHelper
        {
            public function __construct($db_config){
                $this->db= new dbHelper($db_config);

                $this->check_requirement();
            }

            protected function check_requirement()
            {
                if ( empty($_GET['data']) ) {
                    echo json_encode(['error'=>'HTTP Request variables not found']);

                } else {
                    if ( ! method_exists($this, 'data_'.$_GET['data']) ) {
                        echo json_encode(['error'=>"Method data_{$_GET['data']}() not found"]);

                    } else {
                        echo $this->{'data_'.$_GET['data']}();

                    }
                    
                }

            }

            /* ========== START LOAD SERVER SIDE DATA PESAN ==========*/
            protected function data_pesan()
            {
                # default query
                $query 	= "SELECT *,DATE_FORMAT(contact.tanggal, '%W,  %d %b %Y') AS tanggal_mod,SUBSTRING(contact.nama, 1, 50) AS nama_mod,IF(contact.dibaca='Yes','<span class=\"label label-default\">Sudah dibaca</span>','<span class=\'label label-info\'>Belum dibaca</span>') AS dibaca_mod FROM contact WHERE 1=1 ";

                # set column field database for datatable orderable
                $column_order   = [
                    'id',
                    'tanggal',
                    'nama',
                    'email',
                ];

                # set column field database for datatable searchable 
                $column_search  = [
                    'tanggal',
                    'nama',
                    'email',
                ]; 

                # generate like condition for search
                $like           = '';
                $i              = 0;
                foreach ($column_search as $item)
                { # loop column
                    if ( ! empty($_POST['search']['value']) ) { # if datatable send POST for search
                        $like .= $i==0 ? ' AND (' : null ;
                        $like .= $item.' LIKE \'%'.str_replace("'", "\'", $_POST['search']['value']).'%\'';
                        $like .= count($column_search) - 1 == $i ? ') ' : ' OR ';
                    }else{ # if datatable not send POST for search
                        $like .='';
                    }
                    $i++;
                }
                $query .= $like;

                # sorting
                $query .= isset($_POST["order"])? 'ORDER BY '.$column_order[$_POST['order'][0]['column']].' '.$_POST['order']['0']['dir'] : "ORDER BY {$column_order[0]} DESC"; 

                # limit
                $limit = (
                        empty($_POST['length'])
                            ? 10 
                            : (
                                ($_POST['length'] != 1)
                                    ? ($_POST['start']).','.($_POST['length'])
                                    : null
                            ) ) ;

                # collect data from tables (PDO)
                $result = $this->db->get_select("$query LIMIT {$limit}")['data'];
                $records_total = count( $this->db->get_select("{$query}")['data'] );

                # create variabel for save data from push with foreach
                $data= []; 
                # ceate number
                $no = (empty($_REQUEST["start"])? 1 : ( ($_REQUEST["start"]==0) ? 1 : $_REQUEST["start"]+1 ) );

                foreach ($result as $key => $value)
                {
                    $data[]= array(
                        $no,
                        $value->tanggal_mod,
                        $value->nama,
                        $value->email,
                        $value->dibaca_mod,
                        "
                        <a href='?module={$_GET['data']}&act=edit&id={$value->id}'>
                            <i class='fa fa-eye-slash' aria-hidden='true' title='View this message'></i>
                        </a> &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='?module={$_GET['data']}&act=delete&id={$value->id}' onclick=\"return confirm('Apakah anda yakin menghapus data ini?')\">
                            <i class='fa fa-trash' aria-hidden='true' title='Delete this message'></i>
                        </a>
                        ",
                    );
                    $no++;
                }

                $output = array(
                    "draw"				=>	empty($_POST["draw"]) ? 'empty' : $_POST["draw"] ,
                    "recordsTotal"		=> 	$records_total,
                    "recordsFiltered"	=>	$records_total,
                    "data"				=>	$data,
                    "query"             =>  $query." LIMIT $limit",
                    "console_log"       =>  $_SESSION,
                );
                return json_encode($output,JSON_PRETTY_PRINT);
            }
            /* ========== END LOAD SERVER SIDE DATA PESAN ==========*/
        }

        header('Content-type: application/json; charset=utf-8');
        $load = new ModelAjaxData($db_config);
    }

