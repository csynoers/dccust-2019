<?php

		$aksi="modul/mod_banner/aksi_banner.php";
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:

				function view_banner(){
					$result = mysql_query("SELECT * FROM banner ORDER BY id ASC");
					while($row=mysql_fetch_assoc($result))
						$data[]=$row;
						return $data;
				}

				//get data view banner
				$banner= view_banner();

				// load view banner
				require_once('view_banner.php');

			break; 
			case"edit":

				function edit_banner($id){
					$slideshow = mysql_query("SELECT * FROM banner WHERE id='{$id}'");
					$g=mysql_fetch_assoc($slideshow);
					return $g;
				}

				//get data edit banner where id selected
				$g= edit_banner($_GET[id]);

				// load view edit banner
				require_once('view_edit_banner.php');
			
			break; 
		}	