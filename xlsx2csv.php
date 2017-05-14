<?php 
/**
    Convert excel file to csv
*/
$excel_readers = array(
    'Excel5' , 
    'Excel2003XML' , 
    'Excel2007'
);
require_once('PHPExcel/PHPExcel.php');
$reader = PHPExcel_IOFactory::createReader('Excel5');
$reader->setReadDataOnly(true);
$path = 'xlsxToCsv/convertThisFile.xls';
$excel = $reader->load($path);
$writer = PHPExcel_IOFactory::createWriter($excel, 'CSV')
                                      ->setEnclosure('')
                                      ->setLineEnding("\r\n")
                                      ->setDelimiter(';');
;
$writer->save('xlsxToCsv/convertThisFile_converted.csv');

?>