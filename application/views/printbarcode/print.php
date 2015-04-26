<?php

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
$pdf->SetTitle('CU Graduation');
$pdf->SetSubject('barcode');
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
//var_dump($data);
if ($type == 1 || $type == 2) {
  foreach ($data as $d) {
    if ($type == 2 && ($d["group_id"] == 23 || $d["group_id"] == 36)) {
      $special_barcode = true;
    }
    if ($special_barcode == true) {
      $barcode_params = $pdf->serializeTCPDFtagParameters(array($d["barcode"], 'C128', '', '', 300, 30, 0.4, $style, 'L'));
    } else {
      $barcode_params = $pdf->serializeTCPDFtagParameters(array($d["barcode"], 'C128', '', '', 300, 30, 0.6, $style, 'L'));
    }
    $print_sid = substr($d["student_id"], 0, 3) . " " . substr($d["student_id"], 3, 5) . " " . substr($d["student_id"], 8, 2);
    $html .= '<tr width="100%" height="100%">
<td width="50%">
<b style="font-size:150pt;">' . $d["order"] . '</b><br><span style="font-size: 14pt;"><br>
' . $d["th_prefix"] . $d["th_firstname"] . " " . $d["th_lastname"] . " [" . $d["th_group_name"] . '] <br> 
' . $d["en_prefix"] . $d["en_firstname"] . " " . $d["en_lastname"] . " [" . $d["en_group_name"] . ']
</span>
</td>
<td width="50%">
<br><br><br>
<span style="line-height: 1%; color: #fff; "><br><tcpdf method="write1DBarcode" params="'.$barcode_params.'" />
..................................................................................................................</span>
<br><br><br><br><br><br>
<span style="font-size: 14pt;">นำบัตรนี้มาในวันซ้อมครั้งที่ 2 และวันรับจริง<br>หากมีปัญหาติดต่อ icc.cp.cu@gmail.com</span>
</td>
</tr>';
  }
} else if ($type == 3) {
  /*foreach ($batch_each as $batch_arr) {
    $b_id = $batch_arr[0];
    $b_num = $batch_arr[1];

    if (strlen($b_num) == 10) {
      $query = "SELECT tb_students.*,tb_groups.print_name FROM tb_students LEFT JOIN tb_groups ON tb_students.group_id=tb_groups.id WHERE tb_students.group_id=$b_id AND tb_students.sid='$b_num'";
    } else {
      $query = "SELECT tb_students.*,tb_groups.print_name FROM tb_students LEFT JOIN tb_groups ON tb_students.group_id=tb_groups.id WHERE tb_students.group_id=$b_id AND tb_students.ordinal=$b_num";
    }
    $rquery = $mysqli->query($query);

    if ($rquery->num_rows != 0) {
      $data = $rquery->fetch_array();
      if ($b_id == 23 || $b_id == 36) {
        $special_barcode = true;
      }*/
  //echo "</br></br>";
  foreach ($data as $d) {
      //var_dump($d);
      if ($d['special_barcode'] == true) {
        $barcode_params = $pdf->serializeTCPDFtagParameters(array($d["barcode"], 'C128', '', '', 300, 30, 0.4, $style, 'L'));
      } else {
        $barcode_params = $pdf->serializeTCPDFtagParameters(array($d["barcode"], 'C128', '', '', 300, 30, 0.6, $style, 'L'));
      }
      $print_sid = substr($d["student_id"], 0, 3) . " " . substr($d["student_id"], 3, 5) . " " . substr($d["student_id"], 8, 2);
      $html .= '<tr width="100%" height="100%">
<td width="50%">
<b style="font-size:150pt;">' . $d["order"] . '</b><br><span style="font-size: 14pt;"><br>
' . $d["th_prefix"] . $d["th_firstname"] . " " . $d["th_lastname"] . " [" . $d["th_group_name"] . '] <br> 
' . $d["en_prefix"] . $d["en_firstname"] . " " . $d["en_lastname"] . " [" . $d["en_group_name"] . ']
</span>
</td>
<td width="50%">
<br><br><br>
<span style="line-height: 1%; color: #fff; "><br><tcpdf method="write1DBarcode" params="'.$barcode_params.'" />
..................................................................................................................</span>
<br><br><br><br><br><br>
<span style="font-size: 14pt;">นำบัตรนี้มาในวันซ้อมครั้งที่ 2 และวันรับจริง<br>หากมีปัญหาติดต่อ icc.cp.cu@gmail.com</span>
</td>
</tr>';
  
  }
}
$html .= '</table>';


// output the HTML content
$pdf->writeHTML($html, false, false, true, false, 'C');

// ---------------------------------------------------------

//Close and output PDF document
//$pdf->Output('test-tcpdf.pdf', 'D');
$filename = ($type == 2 ? $sid : ($type == 3 ? "data" : sprintf("%02d %s", $group_id, $data[0]["th_group_name"]))) . ".pdf";
$pdf->Output($filename, 'I');

//============================================================+
// END OF FILE                             
?>