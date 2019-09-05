<?php
$data_d3= "";
if (!empty($_POST['d3'])) {
    foreach($_POST['d3'] as $check) {
        $data_d3 .= $check.'-';
    }
    //last value d3
	$last_val_d3= substr(rtrim($data_d3,'-'), -4);
	if ($last_val_d3=='d313') {#if last value = d313
	    $result_d3= rtrim($data_d3,'-d313-');

	}else{#if last value tidak sama dengan d313
		$result_d3= rtrim($data_d3,'-');
	}

    $data = array(
		'id_alumni'	=> $_SESSION['idnya'],
		'd11' 		=> $_POST['d11'], 
		'd2' 		=> $_POST['d2'], 
		'd3' 		=> $result_d3, 
	);

	if ($last_val_d3 != 'd313') {
	    mysql_query("INSERT INTO tb_d(id_alumni,d11,d2,d3)
						VALUES('$data[id_alumni]','$data[d11]','$data[d2]','$data[d3]')");
	    header('Location:kuis_e.html');
	}

}else{
	echo "	<script>
				alert('Maaf Anda Belum Memilih Data D3.');
				window.history.go(-1);
			</script>
	";

}

if (($last_val_d3 =='d313') AND empty($_POST['d3lainnya'])){
	echo "	<script>
				alert('Maaf Anda Belum Mengisi Data D3 Lainnya.');
				window.history.go(-1);
			</script>
	";

}elseif (($last_val_d3 != 'd313') AND !empty($_POST['d3lainnya'])) {
	echo "	<script>
				alert('Maaf Anda Belum Memilih Data D3 Lainnya.');
				window.history.go(-1);
			</script>
	";

}elseif (isset($_POST['d3lainnya'])) {
	$d313= $_POST['d3lainnya'];
	$data = array(
		'id_alumni'	=> $_SESSION['idnya'],
		'd11' 		=> $_POST['d11'], 
		'd2' 		=> $_POST['d2'], 
		'd3' 		=> $result_d3,
		'd313' 		=> $d313, 
	);

	if ($data['d313']!='') {
		mysql_query("INSERT INTO tb_d(id_alumni,d11,d2,d3,d313)
						VALUES('$data[id_alumni]','$data[d11]','$data[d2]','$data[d3]','$data[d313]')");
		header('Location:kuis_e.html');

	}

}

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

?>