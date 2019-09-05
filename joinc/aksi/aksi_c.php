<?php
# get data from method $_POST or $_GET
function get($fill){
		$data= $_REQUEST[$fill];
		return $data;
}

function message($option,$data){
	echo "	<script>
					alert('Maaf Anda Belum $option Data $data.');
					window.history.go(-1);
				</script>
		";
}

# remove '-' last character -1
function remove($data){
	$value= rtrim($data,'-');
	return $value;
}

# cek c1 option
$c1= $_POST['c1'];

# if option c11
if ($c1=='c11') {
	# c3
	if(get('c3')!='c35'){#check if c35 not selected
		$data_c3= get('c3');

	}else{#check if c35 is selected
		$data_c3= get('c3lainnya');

	}

	# c4
	if(get('c4')!='c45'){#check if c45 not selected
		$data_c4= get('c4');

	}else{#check if c45 is selected
		$data_c4= get('c4lainnya');

	}

	# c6
	$data_c6= get('c6');

	# c7
	$data_c7= get('c7');

	# c8
	$data_c8= [
		'nama_perusahaan'=>get('nama_perusahaan'),
		'alamat_perusahaan'=>get('alamat_perusahaan'),
		'nama_pimpinan'=>get('nama_pimpinan'),
		'kontak_person_pimpinan'=>get('kontak_person_pimpinan'),
		'email_pimpinan'=>get('email_pimpinan'),
	];

	# c5
	if (get('c5')===NULL) {
		message('Memilih','C5');

	}elseif (get('c5')!==NULL){
		$value_c5= "";
		foreach (get('c5') as $key => $value) {
			$value_c5 .=$value.'-';

		}
		$result_c5= remove($value_c5);

		if ((substr($result_c5, -3)=='c57') AND (get('c5lainnya')!='')) {#if c57 is selected AND c5lainnya is true
			$data_c5= array(
				'sql'=> 'c5,c57',
				'val'=> '\''.rtrim($result_c5,'-c57').'\',\''.get('c5lainnya').'\'',  
			);

			#saved all input data in $data
			$data= array(
				'id_alumni'=> $_SESSION['idnya'],
				'c1' 	=> $c1,
				'c3' 	=> $data_c3,
				'c4'	=> $data_c4, 
				'c5'	=> $data_c5, 
				'c6'	=> $data_c6, 
				'c7'	=> $data_c7, 
				'c8'	=> json_encode($data_c8), 
			);

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// echo "ya";
			// die();

			$sql= $data['c5']['sql'];
			$val= $data['c5']['val'];

			mysql_query("INSERT INTO tb_c(id_alumni,c1,c3,c4,$sql,c6,c7,c8)
				VALUES('$data[id_alumni]','$data[c1]','$data[c3]','$data[c4]',$val,'$data[c6]','$data[c7]','$data[c8]')
			");

			header('Location:kuis_d.html');

		}elseif ((substr($result_c5, -3)!='c57') AND (get('c5lainnya')=='')) {#if c57 is not selected AND c5lainnya is false
			$data_c5= array(
				'sql'=> 'c5',
				'val'=> '\''.rtrim($result_c5).'\'',  
			);

			#saved all input data in $data
			$data= array(
				'id_alumni'=> $_SESSION['idnya'],
				'c1' 	=> $c1,
				'c3' 	=> $data_c3,
				'c4'	=> $data_c4, 
				'c5'	=> $data_c5, 
				'c6'	=> $data_c6, 
				'c7'	=> $data_c7, 
				'c8'	=> json_encode($data_c8), 
			);

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// echo "ya";
			// die();

			$sql= $data['c5']['sql'];
			$val= $data['c5']['val'];

			mysql_query("INSERT INTO tb_c(id_alumni,c1,c3,c4,$sql,c6,c7,c8)
				VALUES('$data[id_alumni]','$data[c1]','$data[c3]','$data[c4]',$val,'$data[c6]','$data[c7]','$data[c8]')
			");

			header('Location:kuis_d.html');

		}elseif ((get('c57')!==NULL) AND (get('c5lainnya')=='')) {
			message('Mengisi','C5 Lainnya');

		}elseif ((get('c57')===NULL) AND (get('c5lainnya')!='')) {
			message('Memilih','C5 Lainnya');

		}

	}


}elseif ($c1=='c12') {
	# c2
	if(get('c2')!='c25'){#check if c25 not selected
		$data_c2= get('c2');

	}else{#check if c25 is selected
		$data_c2= get('c2lainnya');

	}

	# c3
	if(get('c3')!='c35'){#check if c35 not selected
		$data_c3= get('c3');

	}else{#check if c35 is selected
		$data_c3= get('c3lainnya');

	}

	# c4
	if(get('c4')!='c45'){#check if c45 not selected
		$data_c4= get('c4');

	}else{#check if c45 is selected
		$data_c4= get('c4lainnya');

	}

	# c6
	$data_c6= get('c6');

	# c7
	$data_c7= get('c7');

	# c8
	$data_c8= [
		'nama_perusahaan'=>get('nama_perusahaan'),
		'alamat_perusahaan'=>get('alamat_perusahaan'),
		'nama_pimpinan'=>get('nama_pimpinan'),
		'kontak_person_pimpinan'=>get('kontak_person_pimpinan'),
		'email_pimpinan'=>get('email_pimpinan'),
	];
	
	# c5
	if (get('c5')===NULL) {
		message('Memilih','C5');

	}elseif (get('c5')!==NULL){
		$value_c5= "";
		foreach (get('c5') as $key => $value) {
			$value_c5 .=$value.'-';

		}

		$result_c5= remove($value_c5);
		// echo "$result_c5";

		if ((substr($result_c5, -3)=='c57') AND (get('c5lainnya')!='')) {#if c57 is selected AND c5lainnya is true
			$data_c5= array(
				'sql'=> 'c5,c57',
				'val'=> '\''.rtrim($result_c5,'-c57').'\',\''.get('c5lainnya').'\'',  
			);

			#saved all input data in $data
			$data= array(
				'id_alumni'=> $_SESSION['idnya'],
				'c1' 	=> $c1,
				'c2' 	=> $data_c2,
				'c3' 	=> $data_c3,
				'c4'	=> $data_c4, 
				'c5'	=> $data_c5, 
				'c6'	=> $data_c6, 
				'c7'	=> $data_c7,
				'c8' 	=> json_encode($data_c8), 
			);

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// echo "ya";
			// die();

			$sql= $data['c5']['sql'];
			$val= $data['c5']['val'];

			mysql_query("INSERT INTO tb_c(id_alumni,c1,c2,c3,c4,$sql,c6,c7,c8)
				VALUES('$data[id_alumni]','$data[c1]','$data[c2]','$data[c3]','$data[c4]',$val,'$data[c6]','$data[c7]','$data[c8]')
			");

			header('Location:kuis_d.html');

		}elseif ((substr($result_c5, -3)!='c57') AND (get('c5lainnya')=='')) {#if c57 is not selected AND c5lainnya is false
			// echo "$result_c5";
			$data_c5= array(
				'sql'=> 'c5',
				'val'=> '\''.$result_c5.'\'',  
			);

			#saved all input data in $data
			$data= array(
				'id_alumni'=> $_SESSION['idnya'],
				'c1' 	=> $c1,
				'c2' 	=> $data_c2,
				'c3' 	=> $data_c3,
				'c4'	=> $data_c4, 
				'c5'	=> $data_c5, 
				'c6'	=> $data_c6, 
				'c7'	=> $data_c7, 
				'c8'	=> json_encode($data_c8), 
			);

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// echo "ya";
			// die();

			$sql= $data['c5']['sql'];
			$val= $data['c5']['val'];

			mysql_query("INSERT INTO tb_c(id_alumni,c1,c2,c3,c4,$sql,c6,c7,c8)
				VALUES('$data[id_alumni]','$data[c1]','$data[c2]','$data[c3]','$data[c4]',$val,'$data[c6]','$data[c7]','$data[c8]')
			");

			header('Location:kuis_d.html');

		}elseif ((get('c57')!==NULL) AND (get('c5lainnya')=='')) {
			message('Mengisi','C5 Lainnya');

		}elseif ((get('c57')===NULL) AND (get('c5lainnya')!='')) {
			message('Memilih','C5 Lainnya');

		}

	}
}

?>