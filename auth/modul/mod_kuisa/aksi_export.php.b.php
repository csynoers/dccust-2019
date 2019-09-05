<?php
include "../../../josys/koneksi.php";


# MENGAMBIL DATA DARI DATABASE MYSQL
if (isset($_GET['prodi'])) {
      $kuisa = mysql_query("SELECT *
                                    FROM
                                        `alumni_daftar`
                                        INNER JOIN `prodi` 
                                            ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                                        INNER JOIN `tb_a` 
                                            ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                              WHERE alumni_daftar.prodi = '$_GET[prodi]' ORDER BY alumni_daftar.nim ASC");
}else{
      $kuisa = mysql_query("SELECT *
                                    FROM
                                        `alumni_daftar`
                                        INNER JOIN `prodi` 
                                            ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                                        INNER JOIN `tb_a` 
                                            ON (`tb_a`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                                    ORDER BY alumni_daftar.nim ASC");
}

/** Include PHPExcel */
require_once dirname(__FILE__) . '../../../../PHPExcel/Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Admin")
							->setLastModifiedBy("Admin")
							->setTitle("Data Hasil Tracer Study A")
							->setSubject("Hasil")
							->setDescription("Data Hasil Tracer Study A")
							->setKeywords("Data Hasil Tracer Study A")
							->setCategory("Umum");
// mulai dari baris ke 2
$row = 2;

// Tulis judul tabel
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'No.')
            ->setCellValue('B'.$row, 'NIM')
            ->setCellValue('C'.$row, 'Nama Alumni')
            ->setCellValue('D'.$row, 'Jenis Kelamin')
            ->setCellValue('E'.$row, 'Alamat Asal')
            ->setCellValue('F'.$row, 'Alamat Sekarang')
            ->setCellValue('G'.$row, 'No. Telp')
            ->setCellValue('H'.$row, 'E-mail');

$nomor 	= 1; // set nomor urut = 1;

$row++; // pindah ke row bawahnya. (ke row 2)

// lakukan perulangan untuk menuliskan data kuisa
while( $data = mysql_fetch_array($kuisa)){
	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row,  $nomor )
            ->setCellValue('B'.$row, $data['nim'] )
            ->setCellValue('C'.$row, $data['a1'] )
            ->setCellValue('D'.$row, $data['a2'] )
            ->setCellValue('E'.$row, $data['a3'] )
            ->setCellValue('F'.$row, $data['a4'] )
            ->setCellValue('G'.$row, $data['a5'] )
            ->setCellValue('H'.$row, $data['a6'] );
			
	$row++; // pindah ke row bawahnya ($row + 1)
	$nomor++;
}

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Data Hasil Tracer Study A');

// Set sheet yang aktif adalah index pertama, jadi saat dibuka akan langsung fokus ke sheet pertama
$objPHPExcel->setActiveSheetIndex(0);




// Simpan ke Excel 2007
/* $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('data.xlsx'); */

// Simpan ke Excel 2003
/* $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('data.xls'); */


// Download (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="data.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 

$objWriter->save('php://output');
/*header('location:javascript:history.go(-1)');*/
exit;


/* 
// Download (Excel2003)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="data.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 

$objWriter->save('php://output');
exit;
 */
?>