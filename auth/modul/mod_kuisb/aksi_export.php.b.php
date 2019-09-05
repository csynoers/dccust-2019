<?php
include "../../../josys/koneksi.php";


# MENGAMBIL DATA DARI DATABASE MYSQL
if (isset($_GET['prodi'])) {
    $kuisb = mysql_query("SELECT *
                            FROM
                                `alumni_daftar`
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                                INNER JOIN `tb_b` 
                                    ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                    WHERE alumni_daftar.prodi = '$_GET[prodi]' ORDER BY alumni_daftar.nim ASC");
}else{
    $kuisb = mysql_query("SELECT *
                            FROM
                                `alumni_daftar`
                                INNER JOIN `prodi` 
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                                INNER JOIN `tb_b` 
                                    ON (`tb_b`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                        ORDER BY alumni_daftar.nim ASC");
}

/** Include PHPExcel */
require_once dirname(__FILE__) . '../../../../PHPExcel/Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Admin")
							->setLastModifiedBy("Admin")
							->setTitle("Data Hasil Tracer Study B")
							->setSubject("Hasil")
							->setDescription("Data Hasil Tracer Study B")
							->setKeywords("Data Hasil Tracer Study B")
							->setCategory("Umum");
// mulai dari baris ke 2
$row = 2;

// Tulis judul tabel
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'No.')
            ->setCellValue('B'.$row, 'NIM')
            ->setCellValue('C'.$row, 'Nama Alumni')
            ->setCellValue('D'.$row, 'B1')
            ->setCellValue('E'.$row, 'B2')
            ->setCellValue('F'.$row, 'B3')
            ->setCellValue('G'.$row, 'B4 MASUK')
            ->setCellValue('H'.$row, 'B4 LULUS')
            ->setCellValue('I'.$row, 'B4 A')
            ->setCellValue('J'.$row, 'B51')
            ->setCellValue('K'.$row, 'B52')
            ->setCellValue('L'.$row, 'B53')
            ->setCellValue('M'.$row, 'B54')
            ->setCellValue('N'.$row, 'B55')
            ->setCellValue('O'.$row, 'B56')
            ->setCellValue('P'.$row, 'B6')
            ->setCellValue('Q'.$row, 'B71')
            ->setCellValue('R'.$row, 'B72')
            ->setCellValue('S'.$row, 'B73')
            ->setCellValue('T'.$row, 'B74')
            ->setCellValue('U'.$row, 'B75')
            ->setCellValue('V'.$row, 'B76')
            ->setCellValue('W'.$row, 'B81')
            ->setCellValue('X'.$row, 'B82')
            ->setCellValue('Y'.$row, 'B83')
            ->setCellValue('Z'.$row, 'B84')
            ->setCellValue('AA'.$row, 'B85')
            ->setCellValue('AB'.$row, 'B86')
            ->setCellValue('AC'.$row, 'B91')
            ->setCellValue('AD'.$row, 'B92')
            ->setCellValue('AE'.$row, 'B93')
            ->setCellValue('AF'.$row, 'B94')
            ->setCellValue('AG'.$row, 'B95')
            ->setCellValue('AH'.$row, 'B96')
            ->setCellValue('AI'.$row, 'B97')
            ->setCellValue('AJ'.$row, 'B98')
            ->setCellValue('AK'.$row, 'B99')
            ->setCellValue('AL'.$row, 'B910')
            ->setCellValue('AM'.$row, 'B911')
            ->setCellValue('AN'.$row, 'B101')
            ->setCellValue('AO'.$row, 'B102')
            ->setCellValue('AP'.$row, 'B103')
            ->setCellValue('AQ'.$row, 'B104')
            ->setCellValue('AR'.$row, 'B105')
            ->setCellValue('AS'.$row, 'B106')
            ->setCellValue('AT'.$row, 'B107');

$nomor 	= 1; // set nomor urut = 1;

$row++; // pindah ke row bawahnya. (ke row 2)

// lakukan perulangan untuk menuliskan data kuisb
while( $data = mysql_fetch_array($kuisb)){
	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row,  $nomor )
            ->setCellValue('B'.$row, $data['nim'] )
            ->setCellValue('C'.$row, $data['nama_alumni'] )
            ->setCellValue('D'.$row, $data['b1'] )
            ->setCellValue('E'.$row, $data['b2'] )
            ->setCellValue('F'.$row, $data['b3'] )
            ->setCellValue('G'.$row, $data['b4masuk'] )
            ->setCellValue('H'.$row, $data['b4lulus'] )
            ->setCellValue('I'.$row, $data['b4a'] )
            ->setCellValue('J'.$row, $data['b51'] )
            ->setCellValue('K'.$row, $data['b52'] )
            ->setCellValue('L'.$row, $data['b53'] )
            ->setCellValue('M'.$row, $data['b54'] )
            ->setCellValue('N'.$row, $data['b55'] )
            ->setCellValue('O'.$row, $data['b56'] )
            ->setCellValue('P'.$row, $data['b6'] )
            ->setCellValue('Q'.$row, $data['b71'] )
            ->setCellValue('R'.$row, $data['b72'] )
            ->setCellValue('S'.$row, $data['b73'] )
            ->setCellValue('T'.$row, $data['b74'] )
            ->setCellValue('U'.$row, $data['b75'] )
            ->setCellValue('V'.$row, $data['b76'] )
            ->setCellValue('W'.$row, $data['b81'] )
            ->setCellValue('X'.$row, $data['b82'] )
            ->setCellValue('Y'.$row, $data['b83'] )
            ->setCellValue('Z'.$row, $data['b84'] )
            ->setCellValue('AA'.$row, $data['b85'] )
            ->setCellValue('AB'.$row, $data['b86'] )
            ->setCellValue('AC'.$row, $data['b91'] )
            ->setCellValue('AD'.$row, $data['b92'] )
            ->setCellValue('AE'.$row, $data['b93'] )
            ->setCellValue('AF'.$row, $data['b94'] )
            ->setCellValue('AG'.$row, $data['b95'] )
            ->setCellValue('AH'.$row, $data['b96'] )
            ->setCellValue('AI'.$row, $data['b97'] )
            ->setCellValue('AJ'.$row, $data['b98'] )
            ->setCellValue('AK'.$row, $data['b99'] )
            ->setCellValue('AL'.$row, $data['b910'] )
            ->setCellValue('AM'.$row, $data['b911'] )
            ->setCellValue('AN'.$row, $data['b101'] )
            ->setCellValue('AO'.$row, $data['b102'] )
            ->setCellValue('AP'.$row, $data['b103'] )
            ->setCellValue('AQ'.$row, $data['b104'] )
            ->setCellValue('AR'.$row, $data['b105'] )
            ->setCellValue('AS'.$row, $data['b106'] )
			->setCellValue('AT'.$row, $data['b107'] );

	$row++; // pindah ke row bawahnya ($row + 1)
	$nomor++;
}

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Data Hasil Tracer Study B');

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