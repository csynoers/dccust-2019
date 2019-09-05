<?php
$data= array(
	'id_alumni' => $_SESSION['idnya'],

	'a11' => $_POST['a11'],
	'a12' => $_POST['a12'],
	'a13' => $_POST['a13'],
	'a14' => $_POST['a14'],
	'a15' => $_POST['a15'],
	'a16' => $_POST['a16'],
	'a17' => $_POST['a17'],

	'a21' => $_POST['a21'],
	'a22' => $_POST['a22'],
	'a23' => $_POST['a23'],
	'a24' => $_POST['a24'],
	'a25' => $_POST['a25'],
	'a26' => $_POST['a26'],
	'a26isi' => $_POST['a26isi'],

	'a31' => $_POST['a31'],
	'a32' => $_POST['a32'],
	'a33' => $_POST['a33'],
	'a34' => $_POST['a34'],
	'a35' => $_POST['a35'],
	'a36' => $_POST['a36'],
	'a37' => $_POST['a37'],
	'a38' => $_POST['a38'],
	'a39' => $_POST['a39'],
	'a310' => $_POST['a310'],
	'a311' => $_POST['a311'],
	'a312' => $_POST['a312'],
	'a312isi' => $_POST['a312isi'],
);
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();
// session_start();
mysql_query("INSERT INTO tb_a (
	id_alumni,
	a1_1,
	a1_2,
	a1_3,
	a1_4,
	a1_5,
	a1_6,
	a1_7,

	a2_1,
	a2_2,
	a2_3,
	a2_4,
	a2_5,
	a2_6,
	a2_6_isi,

	a3_1,
	a3_2,
	a3_3,
	a3_4,
	a3_5,
	a3_6,
	a3_7,
	a3_8,
	a3_9,
	a3_10,
	a3_11,
	a3_12,
	a3_12_isi
) VALUES (
	'$data[id_alumni]',
	'$data[a11]',
	'$data[a12]',
	'$data[a13]',
	'$data[a14]',
	'$data[a15]',
	'$data[a16]',
	'$data[a17]',

	'$data[a21]',
	'$data[a22]',
	'$data[a23]',
	'$data[a24]',
	'$data[a25]',
	'$data[a26]',
	'$data[a26isi]',

	'$data[a31]',
	'$data[a32]',
	'$data[a33]',
	'$data[a34]',
	'$data[a35]',
	'$data[a36]',
	'$data[a37]',
	'$data[a38]',
	'$data[a39]',
	'$data[a310]',
	'$data[a311]',
	'$data[a312]',
	'$data[a312isi]'
)");



header('Location:kuis_b.html');

?>
