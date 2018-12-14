<?php 
$header = "";
$yr = $_POST['year'];
$mon = $_POST['month'];
$page = $_POST['batch'];

//$days =  date('t',strtotime("$yr-$mon-01"));
$header= "<tr><th>Room Type</th><th width='1px'>Room</th>";

if($page == 1){
 $count = 15;
    $init = 1;
}

else {
    $count= 31;
    $init = 16;
}


    $dates = array();
for($i= $init; $i <= $count; $i++){
    
    $D = date('D', strtotime("$yr-$mon-$i"));
    $d = date('d', strtotime("$yr-$mon-$i"));
    $m = date('m', strtotime("$yr-$mon-$i"));
    $date = date('D, d F Y', strtotime("$yr-$mon-$i"));
    if(checkdate($mon, $i, $yr) == true){//date is valid
         $header.="<th width='50px' title='$date' data-date=\"$yr-$m-$d\">$D<span>$d</span></th>";
        array_push($dates,"$yr-$mon-$i");
      }
    
   
}
$header .="</tr>";

$response = array();
$response['date'] = date('M Y', strtotime("$yr-$mon-01"));
$response['header'] = $header;
$response['dates'] = $dates;

echo json_encode($response);
?>
