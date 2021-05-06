<?php
//Configure the directory where you have the dompdf
include_once LIBRARY."dompdf/autoload.inc.php";

use Dompdf\Dompdf;

//$dompdf = new dompdf();
//$dompdf = new DOMPDF();

$dompdf = new Dompdf();

$dompdf->loadHtml('Hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');


$dompdf->set_option('isHtml5ParserEnabled', true);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>