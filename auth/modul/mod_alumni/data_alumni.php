<?php
	include_once '../../../josys/dbHelper.php';
	$db            = new dbHelper();

	$aksi          ="modul/mod_alumni/aksi_alumni.php";
	$module        ="alumni";

    $query          ='SELECT alumni_daftar.id_alumni,alumni_daftar.nim,alumni_daftar.nama_alumni,alumni_daftar.tahun_lulus,alumni_daftar.prodi,prodi.prodi FROM alumni_daftar,prodi WHERE prodi.id_prodi=alumni_daftar.prodi ';
    $like           = '';
    $column_order   = array('alumni_daftar.id_alumni', 'alumni_daftar.nim','alumni_daftar.nama_alumni','alumni_daftar.tahun_lulus','prodi.prodi'); //set column field database for datatable orderable
    $column_search  = array('alumni_daftar.id_alumni','alumni_daftar.nim','alumni_daftar.nama_alumni','alumni_daftar.tahun_lulus','alumni_daftar.prodi','prodi.prodi'); //set column field database for datatable searchable 
	
    // generate like condition for search
    $i              = 0;
    foreach ($column_search as $item)
    { // loop column
        if ($_POST['search']['value']) { // if datatable send POST for search
            $like .= $i==0 ? ' AND (' : null ;
            $like .= $item.' LIKE \'%'.str_replace("'", "\'", $_POST['search']['value']).'%\'';
            $like .= count($column_search) - 1 == $i ? ')' : ' OR ';
        }else{ // if datatable not send POST for search
            $like .='';
        }
        $i++;
    }
    $query .= $like;
    // generate like condition for search

    // sorting
    $query .= isset($_POST["order"])? 'ORDER BY '.$column_order[$_POST['order'][0]['column']].' '.$_POST['order']['0']['dir'].' LIMIT ' : 'ORDER BY alumni_daftar.id_alumni DESC LIMIT '; ; 
    // sorting

    // limit
    $query .= $_POST['length'] != -1 ? $_POST['start'].','.$_POST['length'] : null;
    // limit

    $list = $db->get_select($query);
    $count_all= $db->get_select("SELECT alumni_daftar.id_alumni,alumni_daftar.nim,alumni_daftar.nama_alumni,alumni_daftar.tahun_lulus,alumni_daftar.prodi,prodi.prodi FROM alumni_daftar,prodi WHERE prodi.id_prodi=alumni_daftar.prodi $like");
    $data = array();
    $no = $_POST['start'];
    foreach ($list['data'] as $alumni) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $alumni->nim;
        $row[] = $alumni->nama_alumni;
        $row[] = $alumni->tahun_lulus;
        $row[] = $alumni->prodi;
        // $row[] = str_replace("'", ' ', "fdsfdsf'sdfsdf");
        $row[] = '
			<a href="?module='.$module.'&act=edit&id='.$alumni->id_alumni.'">
		    						<input type="image" src="images/icn_edit.png" title="Edit">
		    					</a> &nbsp;&nbsp;&nbsp;&nbsp;

		    					<a href="'.$aksi.'?module='.$module.'&act=hapus&id='.$alumni->id_alumni.'" onclick="return confirm(\'Apakah anda yakin menghapus data ini?\');">
		    						<input type="image" src="images/icn_trash.png" title="Trash">
		    					</a>
        ';

        $data[] = $row;
    }

    $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => count($count_all['data']),
                    "recordsFiltered" => count($count_all['data']),
                    "data" => $data,
            );
    //output to json format
    echo json_encode($output);
    // echo json_encode($list);
?>