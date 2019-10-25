<?php
include_once "../../josys/koneksi.php";
include_once "../../josys/dbHelper.php";

$db = new dbHelper($db_config);

function anti_injection($data){
	$filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
	return $filter;
}

$email = anti_injection($_POST['username']);
$pass   = anti_injection(md5($_POST['password']));

$rows= $db->get_select("SELECT * FROM alumni_daftar WHERE email='$email' AND password='$pass'");

// Apabila username dan password ditemukan
if ( count($rows['data']) > 0){
	session_start();
	$_SESSION['idnya']= $rows['data'][0]->id_alumni;
	$_SESSION['rowuser']= $rows['data'][0];

	# initialize parameters update 
	$table="alumni_daftar";
	$columnsArray=[
		"id_session" => session_id()
	];
	$where=[
		"email"=>$email
	];
	$requiredColumnsArray=["id_session"];

	# update session id
	$db->update($table, $columnsArray, $where, $requiredColumnsArray);
	header('location:home-dccustjogja.html');
}
else{
	?>
		<script type="text/javascript">
			alert("Login gagal mohon masukkan username dan password yg benar");
		</script>
		<meta http-equiv="refresh" content="0; url=home-dccustjogja.html">
	<?php
  
}