<?php
session_start();
// error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<link href='style.css' rel='stylesheet' type='text/css'>
	<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
	include_once "../../../josys/koneksi.php";
	include_once "../../../josys/dbHelper.php";
	include_once "../../../josys/library.php";
	include_once "../../../josys/fungsi_seo.php";
	include_once "../../../josys/fungsi_indotgl.php";
	include_once "../../../josys/rand_uspas.php";
	include_once "../../../josys/excel_reader2.php";
	
	$db= new dbHelper($db_config);

	$tipe_file = $_FILES['fileexcel']['type'];
	if ($tipe_file != "application/vnd.ms-excel")
	{
		?>
    <script>window.alert("Upload Gagal, Pastikan File yang di Upload bertipe *.xls");
        window.location=("../../media.php?module=alumni&j=<?php echo $jen ?>")</script>;
    <?php die();}

	$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['tmp_name']);
	
	$fak = $db->get_select("SELECT * FROM prodi INNER JOIN fakultas ON (fakultas.id_fakultas = prodi.id_fakultas) WHERE id_prodi = '{$_POST["prodi"]}' ");
	$fakultas = $fak['data'][0]->id_fakultas;

	foreach ($data->sheets as $key_sheets => $value_sheets )
	{
		if ( $key_sheets == 0 )
		{
			foreach ($value_sheets['cells'] as $key_cells => $value_cells)
			{
				if ( $key_cells != 1 )
				{
					$nim 			= $value_cells[1];

					// create validation if string there a single quote
					$string			= $value_cells[2];
					$cek 			= strpos($string, '\'');
					if ($cek!='') {
						$nama_alumni= str_replace('\'', "\'", $string);
					}else{
						$nama_alumni= $string;
					}
					// end validation if string there a single quote

					$randompass= generateRandomPass(7, 1);
					
					$table = 'alumni_daftar';
					$columnsArray = [
						'nim' => $nim,
						'nama_alumni' => $nama_alumni,
						'fakultas' => $fakultas,
						'prodi' => $_POST["prodi"],
						'password' => md5($randompass),
						're_password' => $randompass
					];
					if ( ! empty($value_cells[3]) ) $columnsArray['tahun_lulus']=$value_cells[3];
					if ( ! empty($value_cells[4]) ) $columnsArray['email']=$value_cells[4];
					if ( ! empty($value_cells[5]) ) $columnsArray['phone']=$value_cells[5];
					// print_r(json_encode($value_cells));

					$db->insert($table, $columnsArray, array_keys($columnsArray));
																
				}
			}
		}
	}
	
	header('location:../../media.php?module=alumni&j='.$_POST['jenjang']);

}
?>
