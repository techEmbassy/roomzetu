<?php

include '../src/get_report_data.php';

$products=array();
$tok="";
switch ($_GET['tok']) {
    case 'csv_revenue':
        $csv_name='Revenue-report';
        $products=get_revenue_data()['tableData'];
//         echo json_encode(get_revenue_data());
      
        
        break;
    case 'csv_guests':
       
        $csv_name='Guests-report';
        $products=get_guests_data()["tableData"];
        break;
    
    case 'csv_reservations':
        $csv_name='Reservations-report';
        $products=get_reservations_data()["tableData"];
//         echo json_encode(get_revenue_data());
      
        
        break;
        
    default:
        break;
}

function array2csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');
   fputcsv($df, array_keys(reset($array)));
   foreach ($array as $row) {
      fputcsv($df, $row);
   }
   fclose($df);
   return ob_get_clean();
}

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}
  download_send_headers($csv_name . date("Y-m-d") . ".csv");
echo array2csv($products);

die();

?>

    <!--<h1>Exported</h1>-->
