<?php
include "../../../josys/koneksi.php";
# MENGAMBIL DATA DARI DATABASE MYSQL
if (isset($_GET['prodi'])) {
    $kuisc = mysql_query("SELECT *
                            FROM
                                `alumni_daftar`
                                INNER JOIN `prodi`
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                                INNER JOIN `tb_d`
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            WHERE alumni_daftar.prodi = '$_GET[prodi]' ORDER BY alumni_daftar.nim ASC");
}else{
    $kuisc = mysql_query("SELECT *
                            FROM
                                `alumni_daftar`
                                INNER JOIN `prodi`
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                                INNER JOIN `tb_d`
                                    ON (`tb_d`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            ORDER BY alumni_daftar.nim ASC");
}



/** Include PHPExcel */
require_once dirname(__FILE__) . '../../../../PHPExcel/Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$row = 2;

$objPHPExcel->createSheet(0);
$sheet1 = $objPHPExcel->getSheet(0)->setTitle('Hasil Tracer D');
$objPHPExcel->createSheet(1);
$sheet2 = $objPHPExcel->getSheet(1)->setTitle('Hasil Tracer D2');
$objPHPExcel->createSheet(2);
$sheet2 = $objPHPExcel->getSheet(2)->setTitle('Hasil Tracer D9');
// Tulis judul tabel
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'No.')
            ->setCellValue('B'.$row, 'NIM')
            ->setCellValue('C'.$row, 'Nama Alumni')
            ->setCellValue('D'.$row, 'D1')
            ->setCellValue('E'.$row, 'D3')
            ->setCellValue('F'.$row, 'D4')
            ->setCellValue('G'.$row, 'D5')
            ->setCellValue('H'.$row, 'D6')
            ->setCellValue('I'.$row, 'D7')
            ->setCellValue('J'.$row, 'D81')
            ->setCellValue('K'.$row, 'D82')
            ->setCellValue('L'.$row, 'D83')
            ->setCellValue('M'.$row, 'D84')
            ->setCellValue('N'.$row, 'D101')
            ->setCellValue('O'.$row, 'D102')
            ->setCellValue('P'.$row, 'D103')
            ->setCellValue('Q'.$row, 'D11')
            ->setCellValue('R'.$row, 'D12');

$nomor  = 1; // set nomor urut = 1;

$row++; // pindah ke row bawahnya. (ke row 2)

// lakukan perulangan untuk menuliskan data kuisc
while( $data = mysql_fetch_array($kuisc)){

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row,  $nomor )
            ->setCellValue('B'.$row, $data['nim'] )
            ->setCellValue('C'.$row, $data['nama_alumni'] )
            ->setCellValue('D'.$row, $data['d1'] )
            ->setCellValue('E'.$row, $data['d3'] )
            ->setCellValue('F'.$row, $data['d4'] )
            ->setCellValue('G'.$row, $data['d5'] )
            ->setCellValue('H'.$row, $data['d6'] )
            ->setCellValue('I'.$row, $data['d7'] )
            ->setCellValue('J'.$row, $data['d81'] )
            ->setCellValue('K'.$row, $data['d82'] )
            ->setCellValue('L'.$row, $data['d83'] )
            ->setCellValue('M'.$row, $data['d84'] )
            ->setCellValue('N'.$row, $data['d101'] )
            ->setCellValue('O'.$row, $data['d102'] )
            ->setCellValue('P'.$row, $data['d103'] )
            ->setCellValue('Q'.$row, $data['d11'] )
            ->setCellValue('R'.$row, $data['d12'] );

    $row++; // pindah ke row bawahnya ($row + 1)
    $nomor++;
}

$rowd2 = 2;
// Tulis judul tabel
$objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('A'.$rowd2, 'No.')
            ->setCellValue('B'.$rowd2, 'NIM')
            ->setCellValue('C'.$rowd2, 'Nama Alumni')
            ->setCellValue('D'.$rowd2, 'Pilihan');

$nomord2  = 1; // set nomor urut = 1;

$rowd2++; // pindah ke row bawahnya. (ke row 2)

$d2 = mysql_query("SELECT *
FROM
    `tb_d2`
    INNER JOIN `alumni_daftar`
        ON (`tb_d2`.`id_alumni` = `alumni_daftar`.`id_alumni`) ORDER BY alumni_daftar.nim ASC");

// lakukan perulangan untuk menuliskan data kuisc
while( $datad2 = mysql_fetch_array($d2)){

    $objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('A'.$rowd2,  $nomord2 )
            ->setCellValue('B'.$rowd2, $datad2['nim'] )
            ->setCellValue('C'.$rowd2, $datad2['nama_alumni'] )
            ->setCellValue('D'.$rowd2, $datad2['detail_d2'] );

    $rowd2++; // pindah ke row bawahnya ($row + 1)
    $nomord2++;
}


$rowd9 = 2;
// Tulis judul tabel
$objPHPExcel->setActiveSheetIndex(2)
            ->setCellValue('A'.$rowd9, 'No.')
            ->setCellValue('B'.$rowd9, 'NIM')
            ->setCellValue('C'.$rowd9, 'Nama Alumni')
            ->setCellValue('D'.$rowd9, 'Pilihan');

$nomord2  = 1; // set nomor urut = 1;

$rowd9++; // pindah ke row bawahnya. (ke row 2)

$d9 = mysql_query("SELECT *
FROM
    `tb_d9`
    INNER JOIN `alumni_daftar`
        ON (`tb_d9`.`id_alumni` = `alumni_daftar`.`id_alumni`) ORDER BY alumni_daftar.nim ASC");

// lakukan perulangan untuk menuliskan data kuisc
while( $datad9 = mysql_fetch_array($d9)){

    $objPHPExcel->setActiveSheetIndex(2)
            ->setCellValue('A'.$rowd9,  $nomord9 )
            ->setCellValue('B'.$rowd9, $datad9['nim'] )
            ->setCellValue('C'.$rowd9, $datad9['nama_alumni'] )
            ->setCellValue('D'.$rowd9, $datad9['detail_d2'] );

    $rowd9++; // pindah ke row bawahnya ($row + 1)
    $nomord9++;
}

$objPHPExcel->createSheet(3);
$sheet6 = $objPHPExcel->getSheet(3)->setTitle('Keterangan Kode');
$rowjwb = 2;
$objPHPExcel->setActiveSheetIndex(3)
            ->setCellValue('A'.$rowjwb, 'No.')
            ->setCellValue('B'.$rowjwb, 'Kode')
            ->setCellValue('C'.$rowjwb, 'Keterangan');

$nomorjwb  = 1;
$rowjwb++;
$jwb = mysql_query("SELECT * FROM jwb ORDER BY id_jwb ASC");

while( $datajwb = mysql_fetch_array($jwb)){

    $objPHPExcel->setActiveSheetIndex(3)
            ->setCellValue('A'.$rowjwb,  $nomorjwb )
            ->setCellValue('B'.$rowjwb, $datajwb['judul'] )
            ->setCellValue('C'.$rowjwb, $datajwb['jwb'] );

    $rowjwb++;
    $nomorjwb++;
}

$objPHPExcel->setActiveSheetIndex(0);



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

?>
