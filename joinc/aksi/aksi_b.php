<?php
function get($fill){
	$data= $_REQUEST[$fill];

	// if (empty($data)) {
	// 	$result= 'NULL';
	// }else{
	// 	$result= $data;
	// }
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
#data_b1
if (get('b1')=='b11') {
	$data_b1= get('b1').'-'.get('b11');

}elseif (get('b1')=='b12') {
	$data_b1= get('b1').'-'.get('b12');

}elseif (get('b1')=='b13') {
	$data_b1= get('b1');

}

#data b2
if (get('b2')=='b23') {
	#data b233
	if (get('b233')=='b2333') {
		$data_b233= get('b2333');
	}else{
		$data_b233= get('b233');
	}
	#data b234
	if (get('b234')=='b2347') {
		$data_b234= get('b2347');

	}else{
		$data_b234= get('b234');
		
	}

	$data_b2= array(
		'id_alumni' => $_SESSION['idnya'],
		'b23'  => get('b2'),
		'b231' => get('b231'),
		'b232' => get('b232'),
		'b233' => $data_b233,
		'b234' => $data_b234,
	);

}elseif ((get('b2')=='b25') AND (get('b2lainnya')!=NULL)) {
	$data_b2= get('b2lainnya');

}elseif((get('b2')=='b25') AND (get('b2lainnya')==NULL)){
	message('Mengisi ','B2 Lainnya');
	die();

}elseif((get('b2')!='b25') AND (get('b2lainnya')!=NULL)){
	message('Memilih ','B2 Lainnya');
	die();

}else{
	$data_b2= get('b2');
}

#data b3
if (get('b3')==NULL) {
	#message b3 is null in here
	message('Memilih ', 'B3');
	die();

}else{#if b3 not null
	#get data b3 is selected
	$value_b3="";

	foreach (get('b3') as $key => $value) {
		$value_b3 .= $value.'-';

	}

	$result_b3= remove($value_b3);

	if ((substr($result_b3,-4)==='b315') AND (get('b3lainnya')!=NULL)) {
		$data_b3= rtrim($result_b3,'-b315').'+'.get('b3lainnya');
		// echo "$data_b3"; 
	}elseif ((substr($result_b3,-4)!=='b315') AND (get('b3lainnya')==NULL)) {
		$data_b3= $result_b3;
	}elseif ((substr($result_b3,-4)!=='b315') AND (get('b3lainnya')!=NULL)) {
		message('Memilih', 'B3 Lainnya');
		die();
	}elseif ((substr($result_b3,-4)==='b315') AND (get('b3lainnya')==NULL)) {
		message('Mengisi', 'B3 Lainnya');
		die();
	}

}


#data b4
$data_b4= get('b4');

#data b5
$data_b5= get('b5');

#data b6
$data_b6= get('b6');

#data b7
$data_b7= get('b7');

#data b8
if (get('b8')!='b815') {# if b8 not selected
	$data_b8= get('b8');

}else{
	$data_b8= get('b8lainnya');
}

#get b913
if (empty($_REQUEST['b913'])) {
	$get_b913= '';
}else{
	$get_b913= get('b913');
}

#data b9
$get_b9= array(
	'1'  => get('b91') , 
	'2'  => get('b92') , 
	'3'  => get('b93') , 
	'4'  => get('b94') , 
	'5'  => get('b95') , 
	'6'  => get('b96') , 
	'7'  => get('b97') , 
	'8'  => get('b98') , 
	'9'  => get('b99') , 
	'10' => get('b910') , 
	'11' => get('b911') , 
	'12' => get('b912') , 
	'13' => $get_b913 , 
);

if ( isset($_REQUEST['b913']) AND isset($_REQUEST['b9lainnya'])) {
	$data_b9= implode($get_b9, '-').'+'.get('b9lainnya');

}elseif (empty($_REQUEST['b913']) AND empty($_REQUEST['b9lainnya']) ){
	$data_b9= rtrim(implode($get_b9, '-'),-1);

}
// elseif ((get('b913')==NULL) AND (get('b9lainnya')!=NULL) ){
// 	message('Memilih ','B9 Lainnya');

// }elseif ((get('b913')!=NULL) AND (get('b9lainnya')==='') ){
	// if (get('b9lainnya')==='') {
		// message('Mengisi ','B9 Lainnya');
	// }
// }
// var_dump(get('b9lainnya'));
// elseif (empty(var)) {
// 	# code...
// }


$data = array(
	'id_alumni' => $_SESSION['idnya'],
	'b1' => $data_b1 ,
	'b2' => get('b2') ,
	'b3' => $data_b3 ,
	'b4' => $data_b4 ,
	'b5' => $data_b5 ,
	'b6' => $data_b6 ,
	'b7' => $data_b7 ,
	'b8' => $data_b8 , 
	'b9' => $data_b9 , 
);

echo "<pre>";
print_r($data);
echo "</pre>";
// die();
if ($data['b2']==='b23') {
	mysql_query("INSERT INTO `tb_b`(`id_alumni`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`) VALUES ('$data[id_alumni]','$data[b1]','$data[b2]','$data[b3]','$data[b4]','$data[b5]','$data[b6]','$data[b7]','$data[b8]','$data[b9]')");
	mysql_query("INSERT INTO `tb_b23`(`id_alumni`, `b231`, `b232`, `b233`, `b234`) VALUES ('$data_b2[id_alumni]','$data_b2[b231]','$data_b2[b232]','$data_b2[b233]','$data_b2[b234]')");
	header('Location:kuis_c.html');
}else{
	mysql_query("INSERT INTO `tb_b`(`id_alumni`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`) VALUES ('$data[id_alumni]','$data[b1]','$data[b2]','$data[b3]','$data[b4]','$data[b5]','$data[b6]','$data[b7]','$data[b8]','$data[b9]')");
	header('Location:kuis_c.html');
}
// header('Location:kuis_c.html');
?>