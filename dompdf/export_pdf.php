<?php 

require_once 'autoload.inc.php';
require_once '../src/config.php';

use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();
//def();
//$dompdf->loadHtml('hello world');
$dompdf->set_option('isHtml5ParserEnabled', true);
//$dompdf->set_option("DOMPDF_ENABLE_CSS_FLOAT", true);

include('../includes/invoice.php');
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('a4', 'portrait');


// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("$invoice_title-$invoice_number-{$bill_address['name']}", array("Attachment"=>0));

?>