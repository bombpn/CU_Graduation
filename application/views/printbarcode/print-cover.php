<?php

//============================================================+
// Data Initialization

include("db.php");
$mysqli = connectDB();

$query = "SELECT * FROM tb_groups";
$rquery = $mysqli->query($query);
$i = 0;
while ($g_data[$i] = $rquery->fetch_array()) {
  $i++;
}
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

class MYPDF extends TCPDF {

    //Page header
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Intania Computer Club');
$pdf->SetTitle('พิธีพระราชทานปริญญาบัตร จุฬาลงกรณ์มหาวิทยาลัย');
$pdf->SetSubject('บัตรยืนยันตัวสำหรับบัณฑิต');
$pdf->SetKeywords('');

// remove default header/footer
$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(0, 0, 0);

//set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(TRUE, 0);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
//$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('thsarabun', '', 16);

// add a page
$pdf->AddPage();

$style = array(
    'position' => 'C',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => 'C',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    //'bgcolor' => array(128,128,128),
    'text' => false,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
//$pdf->write1DBarcode('5231001321', 'C128', '', '', 300, 25, 0.8, $style, 'N');

// create some HTML content


$html = '
<style>
  td { border-bottom: 1px solid #999; height: 7.425cm; line-height: 1em; margin-top: 100px; }
  .inside { width: 100%; }
  .inside td { height: auto; }
</style>
<table>';
foreach ($g_data as $data) {
  $query = "SELECT * FROM tb_students WHERE group_id=" . $data["id"];
  $rquery = $mysqli->query($query);
  //$n = 0;
  $n = $rquery->num_rows;
  //$n = $n[0];
  $html .= '<tr width="100%" height="100%"><td width="50%"><br><br><br><b style="font-size: 70pt;">' . $data["id"] . '</b><br>
<b style="font-size: 20pt;">' . $data["print_name"] . '</b><br><br>ซ้อมครั้งที่ 1: ' . $data["rehearsal1_date"] . '<br><span style="font-size: 30pt;">' . $n . ' คน</span>
</td>
<td width="50%">
</td>
</tr>';
}
$html .= '</table>';


// output the HTML content
$pdf->writeHTML($html, false, false, true, false, 'C');

// ---------------------------------------------------------

//Close and output PDF document
//$pdf->Output('test-tcpdf.pdf', 'D');
$pdf->Output('cover.pdf', 'I');

//============================================================+
// END OF FILE                             
?>