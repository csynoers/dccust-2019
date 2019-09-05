<?php
include "../../../josys/koneksi.php";
function jwb($field,$table,$where,$where_fill){
        $sql = mysql_fetch_assoc(mysql_query("SELECT $field FROM $table WHERE $where = '".strip_tags($where_fill)."'"));
        return $sql[$field];
}

# MENGAMBIL DATA DARI DATABASE MYSQL
if (isset($_GET['prodi'])) {
    $kuisc = mysql_query("SELECT *
                            FROM
                                `alumni_daftar`
                                INNER JOIN `prodi`
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                                INNER JOIN `tb_c`
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            WHERE alumni_daftar.prodi = '$_GET[prodi]' ORDER BY alumni_daftar.nim ASC");
}else{
    $kuisc = mysql_query("SELECT *
                            FROM
                                `alumni_daftar`
                                INNER JOIN `prodi`
                                    ON (`alumni_daftar`.`prodi` = `prodi`.`id_prodi`)
                                INNER JOIN `tb_c`
                                    ON (`tb_c`.`id_alumni` = `alumni_daftar`.`id_alumni`)
                            ORDER BY alumni_daftar.nim ASC");
}



/** Include PHPExcel */
require_once dirname(__FILE__) . '../../../../PHPExcel/Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$row = 2;

$objPHPExcel->createSheet(0);
$sheet1 = $objPHPExcel->getSheet(0)->setTitle('Hasil Tracer C');
$objPHPExcel->createSheet(1);
$sheet2 = $objPHPExcel->getSheet(1)->setTitle('Hasil Tracer C2');
$objPHPExcel->createSheet(2);
$sheet2 = $objPHPExcel->getSheet(2)->setTitle('Hasil Tracer C3');
$objPHPExcel->createSheet(3);
$sheet2 = $objPHPExcel->getSheet(3)->setTitle('Hasil Tracer C10');
$objPHPExcel->createSheet(4);
$sheet2 = $objPHPExcel->getSheet(4)->setTitle('Hasil Tracer C12');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'No.')
            ->setCellValue('B'.$row, 'NIM')
            ->setCellValue('C'.$row, 'Nama Alumni')
            ->setCellValue('D'.$row, jwb('jwb','jwb','judul','c1'))
            ->setCellValue('F'.$row, jwb('jwb','jwb','judul','c4'))
            ->setCellValue('G'.$row, jwb('jwb','jwb','judul','c5'))
            ->setCellValue('H'.$row, jwb('jwb','jwb','judul','c6'))
            ->setCellValue('I'.$row, jwb('jwb','jwb','judul','c7'))
            ->setCellValue('J'.$row, jwb('jwb','jwb','judul','c8'))
            ->setCellValue('K'.$row, jwb('jwb','jwb','judul','c9'))
            ->setCellValue('L'.$row, jwb('jwb','jwb','judul','c11'))
            ->setCellValue('M'.$row, jwb('jwb','jwb','judul','c131'))
            ->setCellValue('N'.$row, jwb('jwb','jwb','judul','c132'))
            ->setCellValue('O'.$row, jwb('jwb','jwb','judul','c133'))
            ->setCellValue('P'.$row, jwb('jwb','jwb','judul','c134'))
            ->setCellValue('Q'.$row, jwb('jwb','jwb','judul','c135'))
            ->setCellValue('R'.$row, jwb('jwb','jwb','judul','c136'))
            ->setCellValue('S'.$row, jwb('jwb','jwb','judul','c137'))
            ->setCellValue('T'.$row, jwb('jwb','jwb','judul','c14'));

$nomor  = 1; // set nomor urut = 1;

$row++; // pindah ke row bawahnya. (ke row 2)

// lakukan perulangan untuk menuliskan data kuisc
while( $data = mysql_fetch_array($kuisc)){
    $objPHPExcel->setActiveSheetIndex(0)
             ->setCellValue('A'.$row,  $nomor )
            ->setCellValue('B'.$row, $data['nim'] )
            ->setCellValue('C'.$row, $data['nama_alumni'] )
            ->setCellValue('D'.$row, jwb('jwb','jwb','judul',$data['c1']) )
            ->setCellValue('F'.$row, $data['c4'] )
            ->setCellValue('G'.$row, jwb('c5bulan','tb_c','id_alumni',$data['id_alumni']).'-'.jwb('jwb','jwb','judul',$data['c51']))
            ->setCellValue('H'.$row, jwb('c6','tb_c','id_alumni',$data['id_alumni']) )
            ->setCellValue('I'.$row, jwb('c7','tb_c','id_alumni',$data['id_alumni']) )
            ->setCellValue('J'.$row, jwb('jwb','jwb','judul', $data['c8']) )
            ->setCellValue('K'.$row, jwb('jwb','jwb','judul', $data['c9']) )
            ->setCellValue('L'.$row, jwb('c11','tb_c','id_alumni',$data['id_alumni']) )
            ->setCellValue('M'.$row, jwb('c131','tb_c','id_alumni',$data['id_alumni']) )
            ->setCellValue('N'.$row, jwb('c132','tb_c','id_alumni',$data['id_alumni']) )
            ->setCellValue('O'.$row, jwb('c133','tb_c','id_alumni',$data['id_alumni']) )
            ->setCellValue('P'.$row, jwb('c134','tb_c','id_alumni',$data['id_alumni']) )
            ->setCellValue('Q'.$row, jwb('c135','tb_c','id_alumni',$data['id_alumni']) )
            ->setCellValue('R'.$row, jwb('c136','tb_c','id_alumni',$data['id_alumni']) )
            ->setCellValue('S'.$row, jwb('c137','tb_c','id_alumni',$data['id_alumni']) )
            ->setCellValue('T'.$row, jwb('c14','tb_c','id_alumni',$data['id_alumni']) );
    // $objPHPExcel->setActiveSheetIndex(0)
    //          ->setCellValue('A'.$row,  $nomor )
    //         ->setCellValue('B'.$row, $data['nim'] )
    //         ->setCellValue('C'.$row, $data['nama_alumni'] )
    //         ->setCellValue('D'.$row, $data['c1'] )
    //         ->setCellValue('E'.$row, $data['c1bulan'] )
    //         ->setCellValue('F'.$row, $data['c4'] )
    //         ->setCellValue('G'.$row, $data['c51'] )
    //         ->setCellValue('H'.$row, $data['c5bulan'] )
    //         ->setCellValue('I'.$row, $data['c6'] )
    //         ->setCellValue('J'.$row, $data['c7'] )
    //         ->setCellValue('K'.$row, $data['c8'] )
    //         ->setCellValue('L'.$row, $data['c9'] )
    //         ->setCellValue('M'.$row, $data['c11'] )
    //         ->setCellValue('N'.$row, $data['c131'] )
    //         ->setCellValue('O'.$row, $data['c132'] )
    //         ->setCellValue('P'.$row, $data['c133'] )
    //         ->setCellValue('Q'.$row, $data['c134'] )
    //         ->setCellValue('R'.$row, $data['c135'] )
    //         ->setCellValue('S'.$row, $data['c136'] )
    //         ->setCellValue('T'.$row, $data['c137'] )
    //         ->setCellValue('U'.$row, $data['c14'] );

    $row++; // pindah ke row bawahnya ($row + 1)
    $nomor++;
}

$rowc2 = 2;
// Tulis judul tabel
$objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('A'.$rowc2, 'No.')
            ->setCellValue('B'.$rowc2, 'NIM')
            ->setCellValue('C'.$rowc2, 'Nama Alumni')
            ->setCellValue('D'.$rowc2, 'Pilihan');

$nomorc2  = 1; // set nomor urut = 1;

$rowc2++; // pindah ke row bawahnya. (ke row 2)

$c2 = mysql_query("SELECT *
FROM
    `tb_c2`
    INNER JOIN `alumni_daftar`
        ON (`tb_c2`.`id_alumni` = `alumni_daftar`.`id_alumni`) ORDER BY alumni_daftar.nim ASC");

// lakukan perulangan untuk menuliskan data kuisc
while( $datac2 = mysql_fetch_array($c2)){

    $objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('A'.$rowc2,  $nomorc2 )
            ->setCellValue('B'.$rowc2, $datac2['nim'] )
            ->setCellValue('C'.$rowc2, $datac2['nama_alumni'] )
            ->setCellValue('D'.$rowc2, jwb('jwb','jwb','judul',$datac2['detail_c2']) );

    $rowc2++; // pindah ke row bawahnya ($row + 1)
    $nomorc2++;
}



$rowc3 = 2;
$objPHPExcel->setActiveSheetIndex(2)
            ->setCellValue('A'.$rowc3, 'No.')
            ->setCellValue('B'.$rowc3, 'NIM')
            ->setCellValue('C'.$rowc3, 'Nama Alumni')
            ->setCellValue('D'.$rowc3, 'Pilihan');

$nomorc3  = 1;
$rowc3++;
$c3 = mysql_query("SELECT *
FROM
    `tb_c3`
    INNER JOIN `alumni_daftar`
        ON (`tb_c3`.`id_alumni` = `alumni_daftar`.`id_alumni`) ORDER BY alumni_daftar.nim ASC");

while( $datac3 = mysql_fetch_array($c3)){

    $objPHPExcel->setActiveSheetIndex(2)
            ->setCellValue('A'.$rowc3,  $nomorc3 )
            ->setCellValue('B'.$rowc3, $datac3['nim'] )
            ->setCellValue('C'.$rowc3, $datac3['nama_alumni'] )
            ->setCellValue('D'.$rowc3, jwb('jwb','jwb','judul',$datac3['detail_c3']) );

    $rowc3++;
    $nomorc3++;
}

$rowc10 = 2;
$objPHPExcel->setActiveSheetIndex(3)
            ->setCellValue('A'.$rowc10, 'No.')
            ->setCellValue('B'.$rowc10, 'NIM')
            ->setCellValue('C'.$rowc10, 'Nama Alumni')
            ->setCellValue('D'.$rowc10, 'Pilihan');

$nomorc10  = 1;
$rowc10++;
$c10 = mysql_query("SELECT *
FROM
    `tb_c10`
    INNER JOIN `alumni_daftar`
        ON (`tb_c10`.`id_alumni` = `alumni_daftar`.`id_alumni`) ORDER BY alumni_daftar.nim ASC");

while( $datac10 = mysql_fetch_array($c10)){

    $objPHPExcel->setActiveSheetIndex(3)
            ->setCellValue('A'.$rowc10,  $nomorc10 )
            ->setCellValue('B'.$rowc10, $datac10['nim'] )
            ->setCellValue('C'.$rowc10, $datac10['nama_alumni'] )
            ->setCellValue('D'.$rowc10, jwb('jwb','jwb','judul',$datac10['detail_c10']) );

    $rowc10++;
    $nomorc10++;
}

$rowc12 = 2;
$objPHPExcel->setActiveSheetIndex(4)
            ->setCellValue('A'.$rowc12, 'No.')
            ->setCellValue('B'.$rowc12, 'NIM')
            ->setCellValue('C'.$rowc12, 'Nama Alumni')
            ->setCellValue('D'.$rowc12, 'Pilihan');

$nomorc12  = 1;
$rowc12++;
$c12 = mysql_query("SELECT *
FROM
    `tb_c12`
    INNER JOIN `alumni_daftar`
        ON (`tb_c12`.`id_alumni` = `alumni_daftar`.`id_alumni`) ORDER BY alumni_daftar.nim ASC");

while( $datac12 = mysql_fetch_array($c12)){

    $objPHPExcel->setActiveSheetIndex(4)
            ->setCellValue('A'.$rowc12,  $nomorc12 )
            ->setCellValue('B'.$rowc12, $datac12['nim'] )
            ->setCellValue('C'.$rowc12, $datac12['nama_alumni'] )
            ->setCellValue('D'.$rowc12, jwb('jwb','jwb','judul',$datac12['detail_c12']) );

    $rowc12++;
    $nomorc12++;
}

$objPHPExcel->createSheet(5);
$sheet6 = $objPHPExcel->getSheet(5)->setTitle('Keterangan Kode');
$rowjwb = 2;
$objPHPExcel->setActiveSheetIndex(5)
            ->setCellValue('A'.$rowjwb, 'No.')
            ->setCellValue('B'.$rowjwb, 'Kode')
            ->setCellValue('C'.$rowjwb, 'Keterangan');

$nomorjwb  = 1;
$rowjwb++;
$jwb = mysql_query("SELECT * FROM jwb ORDER BY id_jwb ASC");

while( $datajwb = mysql_fetch_array($jwb)){

    $objPHPExcel->setActiveSheetIndex(5)
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
