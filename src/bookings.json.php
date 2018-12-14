<?php
include 'config.php';

if(isset($_GET['property_id']) && isset($_GET['room_type_id']) ){
    global $company_id;
    $property_id=$_GET['property_id'];
    
    $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
  if(!$property_id==0){
     $where->add("property_id=%s", $property_id);
    }
    
if($_GET['room_type_id']!=0){
    $room_type_id=$_GET['room_type_id'];
$where->add("room_type_id=%s",$room_type_id);
 
 $bookings =  DB::query("SELECT * FROM booking_tb WHERE %l ", $where);

}else{
    

    $bookings =  DB::query("SELECT * FROM booking_tb WHERE %l ", $where);
}

}

$response = array();

$response['success'] = 1;
$response['result'] = array();

//$id = 0;

foreach($bookings as $b){
    $a=array();
    
    $class = "";
    switch($b['booking_status']){
        case "confirmed":
            $class="event-success";
            break;
        case "cancelled":
            $class="event-danger";
            break; 
        
        case "check-in":
            $class="event-warning";
            break;
        
        default:
            $class="";
            break;
            
            
    }
    $id=$b['id'];
    $names = get_booking_source($id, $b['booking_source'], $b['agent_id']);
    $a['id'] = $id;
    $a['title'] = $names;
    $a['url'] = "#booking-details";
    $a['class'] = "$class";
    $a['start'] = strtotime($b['check_in_date'])."000";
    $a['end'] = strtotime($b['check_out_date'])."000";
 
    $id ++;
    array_push($response['result'], $a);
}

echo json_encode($response);


//echo $_GET['property_id'];

//"success": 1,
//	"result": [
//		{
//			"id": "293",
//			"title": "This is warning class event with very long title to check how it fits to evet in day view",
//			"url": "http://www.example.com/",
//			"class": "event-warning",
//			"start": "1362938400000",
//			"end":   "1363197686300"1498953600
//		},
?>
