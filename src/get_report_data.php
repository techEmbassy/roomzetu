<?php 

require_once 'config.php';

$table = (isset($_GET['table']) ? $_GET['table'] : "");
//$token =  (isset($_GET['token']) ? $_GET['token'] : "");
$col_name = (isset($_GET['col_name']) ? $_GET['col_name'] : "");
$reference = (isset($company_id) ? $company_id : "");



$id = $company_id;


//$company_id = $company_id;
 
//echo $id;

$token="";
switch ($_GET['token']) {
         case 'get_revenue_data':
        echo json_encode(get_revenue_data());
        break;
    
    case 'get_guests_data':
        echo json_encode(get_guests_data());
        break;
    
    case 'get_agents_data':
       echo json_encode(get_agents_data());
        break; 
    
    case 'get_reservations_data':
       echo json_encode( get_reservations_data());
        break; 
    
    case 'get_extras_data':
       
        echo json_encode(get_extras_data());
        break;
    
    case 'get_accomodations_data':
        echo json_encode(get_accomodations_data());
        break;
        
      //start from here  
    case 'get_overview_data':
        
        $overviewData=array();
        $overviewData['revenue_data']=array();
        $overviewData['guests_data']=array();
        $overviewData['reservations_data']=array();
        $overviewData['agents_data']=array();
        $overviewData['accomodations_data']=array();
        //$overviewData['top_room_types_data']=array();
        
       
       

        
       $a=$n=$ar=$gu=$aag=array();
        $ar=get_overview_revenue_data()['graphData']['amount'];
        array_push($overviewData['revenue_data'], 
                    
                array_slice( get_overview_revenue_data()['graphData']['amount'],  -5),
                array_slice( get_overview_revenue_data()['graphData']['labels'],  -5),
                $ar);
        
        $gu=get_overview_guests_data()['graphData']['amount'];
        array_push($overviewData['guests_data'], 
                    array_slice( get_overview_guests_data()['graphData']['amount'],  -5), 
                    array_slice( get_overview_guests_data()['graphData']['labels'], -5),
                  $gu); 
        
        $aag=get_overview_reservations_data()['graphData']['amount'];
        array_push($overviewData['reservations_data'], 
                    array_slice( get_overview_reservations_data()['graphData']['amount'],  -5), 
                    array_slice( get_overview_reservations_data()['graphData']['labels'], -5),
                  $aag);
           
        
       $a=array_slice( get_agents_data()['graphData']['amount'], 0, 5);
       $n=array_slice( get_agents_data()['graphData']['labels'], 0, 5);
        for($i=0;$i<count($a);$i++){ 
            $u=array();
            $u['label']=$n[$i];
            $u['amount']=$a[$i];
            
            array_push($overviewData['agents_data'], $u);
        }
        
        
        
//       $a=array_slice( get_accomodations_data()['graphData']['amount'], 0, 5);
//       $n=array_slice( get_accomodations_data()['graphData']['labels'], 0, 5);
//        for($i=0;$i<count($a);$i++){ 
//            $u=array();
//            $u['label']=$n[$i];
//            $u['amount']=$a[$i]; 
//            array_push($overviewData['accomodations_data'], $u);
//        }
         
      
        $overviewData['top_room_types_data']=get_top_room_types_data(); 
        
        // $overviewData['extras_data']= get_extras_data(); 
//         $overviewData['accomodations_data']= get_accomodations_data();
//                   
            echo json_encode($overviewData);
      
        break;
        
        
        default:
        # code...
        break;
}

function get_revenue_data(){
    
    global $company_id;
 $propertyId= $_GET['property'];
    $period=get_period($_GET['period']);
    $startDate=$period[0];
    $endDate=$period[1];
    
    if($_GET['period']=="specificdate"){
       $endDate= $startDate=date('Y-m-d', strtotime($_GET['pd']));
       
    } 
    if($_GET['period']=="date_range"){
         $startDate=date('Y-m-d', strtotime($_GET['startdate']));
       $endDate= date('Y-m-d', strtotime($_GET['enddate']));
        
       
    }
    
    
  $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
  $where->add("DATE(date_paid) >= %s", $startDate);
  $where->add("DATE(date_paid) <= %s", $endDate);
  $where->add("booking_status != 'cancelled' && booking_status != 'deleted'");
    
    if(!$propertyId==0){
     $where->add("property_id=%s",$propertyId);
    }
    
    
    switch($_GET['period']){
            case "this_today":
            
            
            
             $where->add("DAY(date_paid) = %s", date('d'));
             $where->add("MONTH(date_paid) = %s", date('m'));

            $revenueChart=  DB::query("SELECT SUM(amount) AS amount, HOUR(date_paid) AS `hour` FROM payment_v WHERE %l GROUP BY HOUR(date_paid)",$where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<24; $i++){
                    

                    $amount=0;       
            $monthword =date("H:i",  strtotime("1990-01-01 $i:00:00"));//start from here
                   $pos = get_index($revenueChart,'hour', $i);


                    if($pos != -1){            
                       $amount=$revenueChart[$pos]['amount'];
                    }
                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
            
            
                }
              //$chartData= $revenueChart;
            
            
            break;
            
           case "this_month":
            $where->add("MONTH(date_paid) = %s", date('m'));
              $where->add("YEAR(date_paid) = %s", date('Y'));
            $revenueChart=  DB::query("SELECT SUM(amount) AS amount, DAY(date_paid) AS `day` FROM payment_v WHERE %l GROUP BY DAY(date_paid)", $where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=1; $i<=date('t', time()); $i++){

                    $amount=0;        
                    $monthword =str_pad($i,2,'0',STR_PAD_LEFT);

                    $pos = get_index($revenueChart,'day', $i);


                    if($pos != -1){            
                        $amount=$revenueChart[$pos]['amount'];
                    }

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);

                                    }
            
            
               // $chartData=$revenueChart;

            
            break;
            
            case "this_year":
           $where->add("YEAR(date_paid) = %s", date('Y'));
                         $revenueChart=  DB::query("SELECT SUM(amount) AS amount, MONTH(date_paid) AS `month` FROM payment_v WHERE %l GROUP BY MONTH(date_paid)", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=1; $i<=12; $i++){

                    $amount=0;        
                    $monthword = date('M', strtotime("01-$i-1990"));

                    $pos = get_index($revenueChart,'month', $i);


                    if($pos != -1){            
                        $amount=$revenueChart[$pos]['amount'];
                    }

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
   
            break;
            
            case "lifetime":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT SUM(amount) AS amount, MONTH(date_paid)AS `month`, date_paid FROM payment_v WHERE %l GROUP BY MONTH(date_paid)+ '.'+ YEAR(date_paid) ORDER BY date_paid ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['date_paid']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
            
        case "specificdate":
// $where->add("DATE(date_paid) = %s", $_GET['pd']);
          // $sdate= date('Y-m-d',strtotime($_GET['pd']));
            
            $revenueChart=  DB::query("SELECT SUM(amount) AS amount, HOUR(date_paid) AS `hour` FROM payment_v WHERE %l  GROUP BY HOUR(date_paid)",$where);
            
//             $revenueChart=  DB::query("SELECT SUM(amount) AS amount, HOUR(date_paid) AS `hour` FROM payment_vf WHERE DATE(date_paid) =DATE(%s) AND company_id='$company_id' AND property_id='$propertyId'  GROUP BY HOUR(date_paid)",$sdate);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=1; $i<=24; $i++){
                    

                    $amount=0;       
            $monthword =date("H:i",  strtotime("1990-01-01 $i:00:00"));//start from here
                   $pos = get_index($revenueChart,'hour', $i);


                    if($pos != -1){            
                       $amount=$revenueChart[$pos]['amount'];
                    }
                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
            
            
                }
              //$chartData= $revenueChart;
            
            
            break; 
            
                case "date_range":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT SUM(amount) AS amount, MONTH(date_paid)AS `month`, date_paid FROM payment_v WHERE %l GROUP BY MONTH(date_paid)+ '.'+ YEAR(date_paid) ORDER BY date_paid ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['date_paid']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
            
        default:
            break;
            
            
    }
    
   
    $revenueData = DB::query("SELECT 0 AS NO, name AS `NAME`,property_name AS `PROPERTY NAME`,booking_status AS `STATUS`,booking_source AS `SOURCE`, agent_name AS `AGENT NAME`, amount AS `AMOUNT`, payment_method ,booking_date AS `BOOKING DATE`, date_paid AS `DATE_PAID`,date_recorded AS `DATE RECORDED`,recordedby AS `Recorded_By`  FROM payment_v WHERE %l ORDER BY date_paid DESC ", $where);
    
    $revenueTable=array();
    
    $i=0;
    foreach($revenueData as $r){
        $r['DATE_PAID']=date('d M Y h:i a', strtotime( $r['DATE_PAID']));
        $r['BOOKING DATE']=date('d M Y h:i a', strtotime( $r['BOOKING DATE']));
        $r['DATE RECORDED']=date('d M Y h:i a', strtotime( $r['DATE RECORDED']));
        $r['NO']=$i+1;
        $r['NAME']=ucfirst($r['NAME']);
        $r['AGENT NAME']=ucfirst($r['AGENT NAME']);
        array_push($revenueTable, $r);
        $i++;
    }
   
   
    
    
     $response=array();
    $response["tableData"]=$revenueTable;
    $response["graphData"]=$chartData;
    
//    echo json_encode($response);
     return ($response);
  
}



function get_index($arr,$key, $value){
    $position = 0;
    
    foreach($arr as $a){
        
        if($a[$key] == $value){
            return $position;
        }
        
        $position++;
    }
    
    return -1;
    
}



function get_period($period){
    $y=date('Y');
    $m=date('m');
    $d=date('d');
    $ldm=date('t', time()); //last day of month
    switch($period){
        case "this_today":
                
               $startDate= "$y-$m-$d"; 
             $endDate= "$y-$m-$d ";
            break;
            
        case "this_month":
                $startDate="01-$m-$y 00:00:00";
                $endDate="$ldm-$m-$y 23:59:59";
            break;
            
        case "this_year":
        $startDate="01-01-$y 00:00:00";
            $endDate="31-12-$y 23:59:59";     
            break;
        
           
            
        
 
            default:
            $startDate="01-$m-$y 00:00:00";
                $endDate="$ldm-$m-$y 23:59:59";
            break;
            
    }
    
    return array($startDate,$endDate);
    
}

function get_guests_data(){
     global $company_id;
    $propertyId= $_GET['property'];
    $period=get_period($_GET['period']);
    $startDate=$period[0];
    $endDate=$period[1];
    
    if($_GET['period']=="specificdate"){
       $endDate= $startDate=date('Y-m-d', strtotime($_GET['pd']));
       
    } 
    if($_GET['period']=="date_range"){
         $startDate=date('Y-m-d', strtotime($_GET['startdate']));
       $endDate= date('Y-m-d', strtotime($_GET['enddate']));
        
       
    }
    
    
  $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
  if(!$propertyId==0){
     $where->add("property_id=%s",$propertyId);
    }
  $where->add("DATE(booking_date) >= %s", $startDate);
  $where->add("DATE(booking_date) <= %s", $endDate);
    $where->add("booking_status != 'cancelled' && booking_status != 'deleted'");
    
    
    
    
  switch($_GET['period']){
            case "this_today":
            
            
            
             $where->add("DAY(booking_date) = %s", date('d'));
             $where->add("MONTH(booking_date) = %s", date('m'));
            $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, HOUR(booking_date) AS `hour` FROM guest_property_v WHERE %l GROUP BY HOUR(booking_date)",$where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<24; $i++){
                    

                    $amount=0;       
            $monthword =date("H:i",  strtotime("1990-01-01 $i:00:00"));//start from here
                   $pos = get_index($revenueChart,'hour', $i);


                    if($pos != -1){            
                       $amount=$revenueChart[$pos]['amount'];
                    }
                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
            
            
                }
              //$chartData= $revenueChart;
            
            
            break;
            
           case "this_month":
            $where->add("MONTH(booking_date) = %s", date('m'));
              $where->add("YEAR(booking_date) = %s", date('Y'));
            $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, DAY(booking_date) AS `day` FROM guest_property_v WHERE %l GROUP BY DAY(booking_date)", $where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=1; $i<=date('t', time()); $i++){

                    $amount=0;        
                    $monthword =str_pad($i,2,'0',STR_PAD_LEFT);

                    $pos = get_index($revenueChart,'day', $i);


                    if($pos != -1){            
                        $amount=$revenueChart[$pos]['amount'];
                    }

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);

                                    }
            
            
               // $chartData=$revenueChart;

            
            break;
            
            case "this_year":
           $where->add("YEAR(booking_date) = %s", date('Y'));
                         $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, MONTH(booking_date) AS `month` FROM guest_property_v WHERE %l GROUP BY MONTH(booking_date)", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=1; $i<=12; $i++){

                    $amount=0;        
                    $monthword = date('M', strtotime("01-$i-1990"));

                    $pos = get_index($revenueChart,'month', $i);


                    if($pos != -1){            
                        $amount=$revenueChart[$pos]['amount'];
                    }

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
   
            break;
            
            case "lifetime":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, MONTH(booking_date)AS `month`, booking_date FROM guest_property_v WHERE %l GROUP BY MONTH(booking_date)+ '.'+ YEAR(booking_date) ORDER BY booking_date ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['booking_date']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
            
        case "specificdate":
// $where->add("DATE(date_paid) = %s", $_GET['pd']);
           $sdate= date('Y-m-d',strtotime($_GET['pd']));
            
            $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, HOUR(booking_date) AS `hour` FROM guest_property_v WHERE %l  GROUP BY HOUR(booking_date)",$where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=1; $i<=24; $i++){
                    

                    $amount=0;       
            $monthword =date("H:i",  strtotime("1990-01-01 $i:00:00"));//start from here
                   $pos = get_index($revenueChart,'hour', $i);


                    if($pos != -1){            
                       $amount=$revenueChart[$pos]['amount'];
                    }
                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
            
            
                }
              //$chartData= $revenueChart;
            
            
            break; 
            
                case "date_range":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, MONTH(booking_date)AS `month`, booking_date FROM guest_property_v WHERE %l GROUP BY MONTH(booking_date)+ '.'+ YEAR(booking_date) ORDER BY booking_date ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['booking_date']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
//            
        default:
            break;
            
            
    }
    $revenueData = DB::query("SELECT 0 AS NO, name AS NAME,phone AS PHONE, email AS EMAIL, year_of_birth AS `AGE`, property_name AS `PROPERTY NAME`,booking_date AS `BOOKING DATE` FROM guest_property_v WHERE %l ORDER BY  `BOOKING DATE` ASC ", $where);

    
    $revenueTable=array();
    $i=0;
    foreach($revenueData as $r){
        $r['BOOKING DATE']=date('d/m/Y h:i a', strtotime( $r['BOOKING DATE']));
        $r['NO']=$i+1;
         $r['NAME']=ucfirst($r['NAME']);
         $r['PROPERTY NAME']=ucfirst($r['PROPERTY NAME']);
         $r['AGE']=date('Y')-$r['AGE'];
        array_push($revenueTable, $r);
        $i++;
        
    }
   

     $response=array();
    $response["graphData"]=$chartData;
    $response["tableData"]= $revenueTable;
    
//    echo json_encode($response);
     return ($response);
  
}

function get_agents_data(){
     global $company_id;
    //$propertyId= $_GET['property'];
    $period=get_period($_GET['period']);
    $startDate=$period[0];
    $endDate=$period[1];
    
    if($_GET['period']=="specificdate"){
       $endDate= $startDate=date('Y-m-d', strtotime($_GET['pd']));
       
    } 
    if($_GET['period']=="date_range"){
         $startDate=date('Y-m-d', strtotime($_GET['startdate']));
       $endDate= date('Y-m-d', strtotime($_GET['enddate']));
        
       
    }
    
    
  $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
 // $where->add("property_id=%s",$propertyId);
 $where->add("DATE(booking_date) >= %s", $startDate); 
     $where->add("DATE(booking_date) <= %s", $endDate);
    $where->add("booking_status != 'cancelled' && booking_status != 'deleted'");
    
    
    
  switch($_GET['period']){
             case "this_today":

             $where->add("DAY(booking_date) = %s", date('d'));
             $where->add("MONTH(booking_date) = %s", date('m'));
           $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM agent_booking_v WHERE %l GROUP BY agent_id",$where);
            break;
            
        
            
           case "this_month":
            $where->add("MONTH(booking_date) = %s", date('m'));
            $where->add("YEAR(booking_date) = %s", date('Y'));
            $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM agent_booking_v WHERE %l GROUP BY agent_id",$where);
 
            break;
             case "this_year":
           $where->add("YEAR(booking_date) = %s", date('Y'));
                         $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM agent_booking_v WHERE %l GROUP BY agent_id",$where);
 
   
            break;
            
            case "lifetime":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

              $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM agent_booking_v WHERE company_id='$company_id'  GROUP BY agent_id");

            break;
            
        case "specificdate":
// $where->add("DATE(date_paid) = %s", $_GET['pd']);
           $sdate= date('Y-m-d',strtotime($_GET['pd']));
            
            $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM agent_booking_v  WHERE %l  GROUP BY agent_id",$where);
            
             
            
            
            break; 
            
                case "date_range":
          
          
           $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM agent_booking_v WHERE %l  GROUP BY agent_id",$where);
                      
            break;
   
//            
        default:
            break;
            
            
    }
     
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();
  $revenueTable=array();
    
 
    foreach($revenueChart as $r){
        
        $r['name']=ucfirst($r['name']);
        array_push($revenueTable, $r);
       
    }


                for( $i=0; $i<=count($revenueTable)-1; $i++){

                        $amount=$revenueTable[$i]['amount'];
                   $monthword =$revenueTable[$i]['name'];;

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);

                                    }
    
    
            
            
            
   
     $response=array();
    $response["graphData"]=$chartData;
    
    
    
//    echo json_encode($response);
     return ($response);
  
}

function get_reservations_data(){
     global $company_id;
    $propertyId= $_GET['property'];
    $period=get_period($_GET['period']);
    $startDate=$period[0];
    $endDate=$period[1];
    
    if($_GET['period']=="specificdate"){
       $endDate= $startDate=date('Y-m-d', strtotime($_GET['pd']));
       
    } 
    if($_GET['period']=="date_range"){
         $startDate=date('Y-m-d', strtotime($_GET['startdate']));
       $endDate= date('Y-m-d', strtotime($_GET['enddate']));
        
       
    }
    
    
  $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
 if(!$propertyId==0){
     $where->add("property_id=%s",$propertyId);
    }
 $where->add("DATE(booking_date) >= %s", $startDate); 
    $where->add("DATE(booking_date) <= %s", $endDate);
    $where->add("booking_status != 'cancelled' && booking_status != 'deleted'");
    
    
    
  switch($_GET['period']){
            case "this_today":
            
            
            
             $where->add("DAY(booking_date) = %s", date('d'));
             $where->add("MONTH(booking_date) = %s", date('m'));
            $revenueChart=  DB::query("SELECT COUNT(id) AS amount, HOUR(booking_date) AS `hour` FROM booking_tb WHERE %l GROUP BY HOUR(booking_date) ORDER BY booking_date ASC",$where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<24; $i++){
                    

                    $amount=0;       
            $monthword =date("H:i",  strtotime("1990-01-01 $i:00:00"));//start from here
                   $pos = get_index($revenueChart,'hour', $i);


                    if($pos != -1){            
                       $amount=$revenueChart[$pos]['amount'];
                    }
                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
            
            
                }
              //$chartData= $revenueChart;
            
            
            break;
            
           case "this_month":
            $where->add("MONTH(booking_date) = %s", date('m'));
            $where->add("YEAR(booking_date) = %s", date('Y'));
            $revenueChart=  DB::query("SELECT COUNT(id) AS amount, DAY(booking_date) AS `day` FROM booking_tb WHERE %l GROUP BY DAY(booking_date)", $where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=1; $i<=date('t', time()); $i++){

                    $amount=0;        
                    $monthword =str_pad($i,2,'0',STR_PAD_LEFT);

                    $pos = get_index($revenueChart,'day', $i);


                    if($pos != -1){            
                        $amount=$revenueChart[$pos]['amount'];
                    }

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);

                                    }

            
            
               // $chartData=$revenueChart;

            
            break;
            
            case "this_year":
           $where->add("YEAR(booking_date) = %s", date('Y'));
                         $revenueChart=  DB::query("SELECT COUNT(id) AS amount, MONTH(booking_date) AS `month` FROM booking_tb WHERE %l GROUP BY MONTH(booking_date)", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=1; $i<=12; $i++){

                    $amount=0;        
                    $monthword = date('M', strtotime("01-$i-1990"));

                    $pos = get_index($revenueChart,'month', $i);


                    if($pos != -1){            
                        $amount=$revenueChart[$pos]['amount'];
                    }

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
   
            break;
            
            case "lifetime":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT COUNT(id) AS amount, MONTH(booking_date) AS `month`, booking_date FROM booking_tb WHERE %l GROUP BY MONTH(booking_date)+ '.'+ YEAR(booking_date) ORDER BY booking_date ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['booking_date']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
            
        case "specificdate":
// $where->add("DATE(date_paid) = %s", $_GET['pd']);
           $sdate= date('Y-m-d',strtotime($_GET['pd']));
            
            $revenueChart=  DB::query("SELECT COUNT(id) AS amount, HOUR(booking_date) AS `hour` FROM booking_tb WHERE %l  GROUP BY HOUR(booking_date)",$where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=1; $i<=24; $i++){
                    

                    $amount=0;       
            $monthword =date("H:i",  strtotime("1990-01-01 $i:00:00"));//start from here
                   $pos = get_index($revenueChart,'hour', $i);


                    if($pos != -1){            
                       $amount=$revenueChart[$pos]['amount'];
                    }
                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
            
            
                }
              //$chartData= $revenueChart;
            
            
            break; 
            
                case "date_range":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT COUNT(id) AS amount, MONTH(booking_date)AS `month`, booking_date FROM booking_tb WHERE %l GROUP BY MONTH(booking_date)+ '.'+ YEAR(booking_date) ORDER BY booking_date ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['booking_date']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
//            
        default:
            break;
            
            
    }
    
    $revenueData = DB::query("SELECT 0 AS NO, check_in_date AS `CHECK IN DATE`, check_out_date AS `CHECK OUT DATE`, cost AS `COST`,description AS `DESCRIPTION`,booking_status AS `STATUS`,booking_source AS SOURCE, total_paid AS `TOTAL PAID`,booking_date AS `BOOKING DATE` FROM booking_tb WHERE %l ORDER BY  booking_date DESC ", $where);

    
    $revenueTable=array();
    $i=0;
    foreach($revenueData as $r){
        $r['BOOKING DATE']=date('d/m/Y h:i a', strtotime( $r['BOOKING DATE']));
        $r['CHECK IN DATE']=date('d/m/Y h:i a', strtotime( $r['CHECK IN DATE']));
        $r['CHECK OUT DATE']=date('d/m/Y h:i a', strtotime( $r['CHECK OUT DATE']));
         $r['NO']=$i+1;
        array_push($revenueTable, $r);
        $i++;
    }


 $bookings = DB::query("SELECT * FROM booking_tb WHERE %l",$where);
 $booking_array=array();
foreach($bookings as $b){
  $rooms = DB::query("select * from booked_rooms_v where booking_id=%s", $b['id']);
  $b["nights"] = (strtotime($b['check_out_date']) - strtotime($b['check_in_date'])) / 3600 / 24;
   $b['bed_nights']=$b["nights"]*$b["no_guests"];
    $b['room_nights']=$b["nights"]* count($rooms);
        $b['booking_date']=date("d M Y", strtotime( $b['booking_date']));
       $b['check_in_date']=date("d M Y", strtotime( $b['check_in_date']));
        $b['check_out_date']=date("d M Y", strtotime( $b['check_out_date']));
        array_push($booking_array, $b);
        
    }

     $response=array();
    $response["graphData"]=$chartData;
    $response["tableData"]= $revenueTable;
    $response["bookings"]=  $booking_array;
    
//    echo json_encode($response);
     return ($response);
    
  
}


function get_accomodations_data(){
     global $company_id;
    $propertyId= $_GET['property'];
    $period=get_period($_GET['period']);
    $startDate=$period[0];
    $endDate=$period[1];
    
    if($_GET['period']=="specificdate"){
       $endDate= $startDate=date('Y-m-d', strtotime($_GET['pd']));
       
    } 
    if($_GET['period']=="date_range"){
         $startDate=date('Y-m-d', strtotime($_GET['startdate']));
       $endDate= date('Y-m-d', strtotime($_GET['enddate']));
        
       
    }
    
    
  $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
 if(!$propertyId==0){
     $where->add("property_id=%s",$propertyId);
    }
 $where->add("DATE(booking_date) >= %s", $startDate); 
     $where->add("DATE(booking_date) <= %s", $endDate);
    $where->add("booking_status != 'cancelled' && booking_status != 'deleted'");
    
    
    
  switch($_GET['period']){
          
          case "this_today":

             $where->add("DAY(booking_date) = %s", date('d'));
             $where->add("MONTH(booking_date) = %s", date('m'));
           $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM room_types_booking_v WHERE %l GROUP BY room_type_id",$where);
            break; 
          
             case "this_month":
            $where->add("MONTH(booking_date) = %s", date('m'));
            $where->add("YEAR(booking_date) = %s", date('Y'));
            $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM room_types_booking_v WHERE %l GROUP BY room_type_id",$where);
   
          
          case "this_year":
           $where->add("YEAR(booking_date) = %s", date('Y'));
                         $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM room_types_booking_v WHERE %l GROUP BY room_type_id",$where);

            break;
            
            case "lifetime":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

              $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM room_types_booking_v WHERE %l  GROUP BY room_type_id", $where);

            break;
            
        case "specificdate":
// $where->add("DATE(date_paid) = %s", $_GET['pd']);
           $sdate= date('Y-m-d',strtotime($_GET['pd']));
            
            $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM room_types_booking_v  WHERE %l  GROUP BY room_type_id",$where);     
            
            break; 
            
                case "date_range":
          
          
           $revenueChart=  DB::query("SELECT COUNT(booking_id) AS amount, name FROM room_types_booking_v WHERE %l  GROUP BY room_type_id",$where);
                      
            break;
   
//            
        default:
            break;
            
            
    }
     
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){

                        $amount=$revenueChart[$i]['amount'];
                   $monthword =$revenueChart[$i]['name'];;

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);

                                    }
            
            
            
   
     $response=array();
    $response["graphData"]=$chartData;
    
//    echo json_encode($response);
     return ($response);
  
}


function get_extras_data(){
    
     global $company_id;
    $propertyId= $_GET['property'];
    $period=get_period($_GET['period']);
    $startDate=$period[0];
    $endDate=$period[1];
    
    if($_GET['period']=="specificdate"){
       $endDate= $startDate=date('Y-m-d', strtotime($_GET['pd']));
       
    } 
    if($_GET['period']=="date_range"){
         $startDate=date('Y-m-d', strtotime($_GET['startdate']));
       $endDate= date('Y-m-d', strtotime($_GET['enddate']));
        
       
    }
    
    
  $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
  if(!$propertyId==0){
     $where->add("property_id=%s",$propertyId);
    }
 $where->add("DATE(booking_date) >= %s", $startDate); 
     $where->add("DATE(booking_date) <= %s", $endDate);
    $where->add("booking_status != 'cancelled' && booking_status != 'deleted'");
    
    
    
  switch($_GET['period']){
             case "this_today":

             $where->add("DAY(booking_date) = %s", date('d'));
             $where->add("MONTH(booking_date) = %s", date('m'));
           $revenueChart=  DB::query("SELECT SUM(total_guests) AS amount, extra_name FROM booked_extras_v WHERE %l GROUP BY extra_id",$where);
            break;    
            
           case "this_month":
            $where->add("MONTH(booking_date) = %s", date('m'));
            $where->add("YEAR(booking_date) = %s", date('Y'));
            $revenueChart=  DB::query("SELECT SUM(total_guests) AS amount, extra_name FROM booked_extras_v WHERE %l GROUP BY extra_id",$where);
 
            break;
             case "this_year":
           $where->add("YEAR(booking_date) = %s", date('Y'));
                         $revenueChart=  DB::query("SELECT SUM(total_guests) AS amount, extra_name FROM booked_extras_v WHERE %l GROUP BY extra_id",$where);

            break;
            
            case "lifetime":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

              $revenueChart=  DB::query("SELECT SUM(total_guests) AS amount, extra_name FROM booked_extras_v WHERE %l  GROUP BY extra_id", $where);

            break;
            
        case "specificdate":
// $where->add("DATE(date_paid) = %s", $_GET['pd']);
           $sdate= date('Y-m-d',strtotime($_GET['pd']));
            
            $revenueChart=  DB::query("SELECT SUM(total_guests) AS amount, extra_name FROM booked_extras_v  WHERE %l  GROUP BY extra_id",$where);     
            
            break; 
            
                case "date_range":
          
          
           $revenueChart=  DB::query("SELECT SUM(total_guests) AS amount, extra_name FROM booked_extras_v WHERE %l  GROUP BY extra_id",$where);
                      
            break;
   
//            
        default:
            break;
            
            
    }
     
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();



                for( $i=0; $i<=count($revenueChart)-1; $i++){

                        $amount=$revenueChart[$i]['amount'];
                   $monthword =$revenueChart[$i]['extra_name'];;

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);

                                    }
            
            
            
   
     $response=array();
    $response["graphData"]=$chartData;
    
   // echo json_encode($response);
  return ($response);
}

function get_top_room_types_data(){
    
     global $company_id;
    $propertyId= $_GET['property'];
    $period=get_period($_GET['period']);
    $startDate=$period[0];
    $endDate=$period[1];
    
    if($_GET['period']=="specificdate"){
       $endDate= $startDate=date('Y-m-d', strtotime($_GET['pd']));
       
    } 
    if($_GET['period']=="date_range"){
         $startDate=date('Y-m-d', strtotime($_GET['startdate']));
       $endDate= date('Y-m-d', strtotime($_GET['enddate']));
        
       
    }
    
    
  $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
   if(!$propertyId==0){
     $where->add("property_id=%s",$propertyId);
    }
 $where->add("DATE(booking_date) >= %s", $startDate); 
     $where->add("DATE(booking_date) <= %s", $endDate);
    
    
    
    
  switch($_GET['period']){
             case "this_today":

             $where->add("DAY(booking_date) = %s", date('d'));
             $where->add("MONTH(booking_date) = %s", date('m'));
           $revenueChart=  DB::query("SELECT SUM(total_amount) AS amount, COUNT(booking_id) AS bookings, name FROM room_type_revenue WHERE %l GROUP BY room_type_id ORDER BY COUNT(booking_id) DESC",$where);
            break;    
            
           case "this_month":
            $where->add("MONTH(booking_date) = %s", date('m'));
            $where->add("YEAR(booking_date) = %s", date('Y'));
            $revenueChart=  DB::query("SELECT SUM(total_amount) AS amount, COUNT(booking_id) AS bookings, name FROM room_type_revenue WHERE %l GROUP BY room_type_id ORDER BY COUNT(booking_id) DESC",$where);
 
            break;
             case "this_year":
           $where->add("YEAR(booking_date) = %s", date('Y'));
                         $revenueChart=  DB::query("SELECT SUM(total_amount) AS amount,COUNT(booking_id) AS bookings, name FROM room_type_revenue WHERE %l GROUP BY room_type_id ORDER BY COUNT(booking_id) DESC",$where);

            break;
            
            case "lifetime":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

              $revenueChart=  DB::query("SELECT SUM(total_amount) AS amount,COUNT(booking_id) AS bookings, name FROM room_type_revenue WHERE %l  GROUP BY room_type_id ORDER BY COUNT(booking_id) DESC", $where);

            break;
            
        case "specificdate":
// $where->add("DATE(date_paid) = %s", $_GET['pd']);
           //$sdate= date('Y-m-d',strtotime($_GET['pd']));
            
            $revenueChart=  DB::query("SELECT SUM(total_amount) AS amount,COUNT(booking_id) AS bookings, name FROM room_type_revenue  WHERE %l  GROUP BY room_type_id ORDER BY COUNT(booking_id) DESC",$where);     
            
            break; 
            
                case "date_range":
          
          
           $revenueChart=  DB::query("SELECT SUM(total_amount) AS amount,COUNT(booking_id) AS bookings, name FROM room_type_revenue WHERE %l  GROUP BY room_type_id ORDER BY COUNT(booking_id) DESC",$where);
                      
            break;
   
//            
        default:
            break;
            
            
    }
     
             
            
        $revenueTable=array();
    
 
    foreach($revenueChart as $r){
        
        $r['name']=ucfirst($r['name']);
        array_push($revenueTable, $r);
       
    }     
            
   
     $response=array();
    $response["graphData"]= $revenueTable;
    
   // echo json_encode($response);
  return ($response);
}



function get_overview_revenue_data(){
    
    global $company_id;
 $propertyId= $_GET['property'];
    $period=get_period($_GET['period']);
    $startDate=$period[0];
    $endDate=$period[1];
    
    if($_GET['period']=="specificdate"){
       $endDate= $startDate=date('Y-m-d', strtotime($_GET['pd']));
       
    } 
    if($_GET['period']=="date_range"){
         $startDate=date('Y-m-d', strtotime($_GET['startdate']));
       $endDate= date('Y-m-d', strtotime($_GET['enddate']));
        
       
    }
    
    
  $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
  $where->add("DATE(date_paid) >= %s", $startDate);
  $where->add("DATE(date_paid) <= %s", $endDate);
    
    if(!$propertyId==0){
     $where->add("property_id=%s",$propertyId);
    }
    
    
    switch($_GET['period']){
            case "this_today":
            
            
            
             $where->add("DAY(date_paid) = %s", date('d'));
             $where->add("MONTH(booking_date) = %s", date('m'));
            $revenueChart=  DB::query("SELECT SUM(amount) AS amount, HOUR(date_paid) AS `hour` FROM payment_v WHERE %l GROUP BY HOUR(date_paid)",$where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();
       
           
                 for( $i=0; $i<count($revenueChart); $i++){ 
                $d=$revenueChart[$i]['hour'];
                 $monthword =date("H:i",  strtotime("1990-01-01 $d:00:00"));//start from here

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
              //$chartData= $revenueChart;
            
            
            break;
            
           case "this_month":
            $where->add("MONTH(date_paid) = %s", date('m'));
            $where->add("YEAR(booking_date) = %s", date('Y'));
            $revenueChart=  DB::query("SELECT SUM(amount) AS amount, DAY(date_paid) AS `day` FROM payment_v WHERE %l GROUP BY DAY(date_paid)", $where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


               
            
            for( $i=0; $i<count($revenueChart); $i++){ 
                 $monthword = $revenueChart[$i]['day']; 

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            
               // $chartData=$revenueChart;

            
            break;
            
            case "this_year":
           $where->add("YEAR(date_paid) = %s", date('Y'));
                         $revenueChart=  DB::query("SELECT SUM(amount) AS amount, MONTH(date_paid) AS `month` FROM payment_v WHERE %l GROUP BY MONTH(date_paid)", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                      
                   
                for( $i=0; $i<count($revenueChart); $i++){ 
                 $m = $revenueChart[$i]['month']; 
                     $monthword = date('M', strtotime("01-$m-1990"));

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            break;
            
            case "lifetime":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT SUM(amount) AS amount, MONTH(date_paid)AS `month`, date_paid FROM payment_v WHERE %l GROUP BY MONTH(date_paid)+ '.'+ YEAR(date_paid) ORDER BY date_paid ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['date_paid']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
            
        case "specificdate":
// $where->add("DATE(date_paid) = %s", $_GET['pd']);
           $sdate= date('Y-m-d',strtotime($_GET['pd']));
            
            $revenueChart=  DB::query("SELECT SUM(amount) AS amount, HOUR(date_paid) AS `hour` FROM payment_v WHERE %l  GROUP BY HOUR(date_paid)",$sdate);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();
  for( $i=0; $i<count($revenueChart); $i++){ 
                $d=$revenueChart[$i]['hour'];
                 $monthword =date("H:i",  strtotime("1990-01-01 $d:00:00"));//start from here

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
              //$chartData= $revenueChart;
            
              //$chartData= $revenueChart;
              //$chartData= $revenueChart;
            
            
            break; 
            
                case "date_range":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT SUM(amount) AS amount, MONTH(date_paid)AS `month`, date_paid FROM payment_v WHERE %l GROUP BY MONTH(date_paid)+ '.'+ YEAR(date_paid) ORDER BY date_paid ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['date_paid']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
            
        default:
            break;
            
            
    }
    
   
    $revenueData = DB::query("SELECT  0 AS N_0,  UPPER(name) AS `Name`,property_name AS `Property Name`,booking_status AS `Status`,booking_source AS `Source`, UPPER(agent_name) AS `Agent Name`, amount ,booking_date, date_paid ,date_recorded  FROM payment_v WHERE %l ORDER BY date_paid ASC ", $where);
    
    $revenueTable=array();
    
    $i=0;
    foreach($revenueData as $r){
        $r['date_paid']=date('d/m/Y h:i a', strtotime( $r['date_paid']));
        $r['N_0']=$i+1;
        array_push($revenueTable, $r);
        $i++;
    }
   
   
    
    
     $response=array();
    $response["tableData"]=$revenueTable;
    $response["graphData"]=$chartData;
    
//    echo json_encode($response);
     return ($response);
  
}
function get_overview_guests_data(){
     global $company_id;
    $propertyId= $_GET['property'];
    $period=get_period($_GET['period']);
    $startDate=$period[0];
    $endDate=$period[1];
    
    if($_GET['period']=="specificdate"){
       $endDate= $startDate=date('Y-m-d', strtotime($_GET['pd']));
       
    } 
    if($_GET['period']=="date_range"){
         $startDate=date('Y-m-d', strtotime($_GET['startdate']));
       $endDate= date('Y-m-d', strtotime($_GET['enddate']));
        
       
    }
    
    
  $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
  if(!$propertyId==0){
     $where->add("property_id=%s",$propertyId);
    }
  $where->add("DATE(booking_date) >= %s", $startDate);
  $where->add("DATE(booking_date) <= %s", $endDate);
    
    
    
    
  switch($_GET['period']){
            case "this_today":
            
            
            
             $where->add("DAY(booking_date) = %s", date('d'));
             $where->add("MONTH(booking_date) = %s", date('m'));
            $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, HOUR(booking_date) AS `hour` FROM guest_property_v WHERE %l GROUP BY HOUR(booking_date)",$where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


//       
          for( $i=0; $i<count($revenueChart); $i++){ 
               
                   $d=$revenueChart[$i]['hour'];
                 $monthword =date("H:i",  strtotime("1990-01-01 $d:00:00"));//start from here

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
              //$chartData= $revenueChart;
            
            
            break;
            
           case "this_month":
            $where->add("MONTH(booking_date) = %s", date('m'));
            $where->add("YEAR(booking_date) = %s", date('Y'));
            $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, DAY(booking_date) AS `day` FROM guest_property_v WHERE %l GROUP BY DAY(booking_date)", $where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


           for( $i=0; $i<count($revenueChart); $i++){ 
                 $monthword = $revenueChart[$i]['day']; 

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            
            
               // $chartData=$revenueChart;

            
            break;
            
            case "this_year":
           $where->add("YEAR(booking_date) = %s", date('Y'));
                         $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, MONTH(booking_date) AS `month` FROM guest_property_v WHERE %l GROUP BY MONTH(booking_date)", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


             for( $i=0; $i<count($revenueChart); $i++){ 
                 $m = $revenueChart[$i]['month']; 
                     $monthword = date('M', strtotime("01-$m-1990"));

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
   
            break;
            
            case "lifetime":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, MONTH(booking_date)AS `month`, booking_date FROM guest_property_v WHERE %l GROUP BY MONTH(booking_date)+ '.'+ YEAR(booking_date) ORDER BY booking_date ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['booking_date']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
            
        case "specificdate":
// $where->add("DATE(date_paid) = %s", $_GET['pd']);
           $sdate= date('Y-m-d',strtotime($_GET['pd']));
            
            $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, HOUR(booking_date) AS `hour` FROM guest_property_v WHERE %l  GROUP BY HOUR(booking_date)",$sdate);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


            for( $i=0; $i<count($revenueChart); $i++){ 
               
                   $d=$revenueChart[$i]['hour'];
                 $monthword =date("H:i",  strtotime("1990-01-01 $d:00:00"));//start from here

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
              //$chartData= $revenueChart;
            
            
            break; 
            
                case "date_range":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT COUNT(guest_id) AS amount, MONTH(booking_date)AS `month`, booking_date FROM guest_property_v WHERE %l GROUP BY MONTH(booking_date)+ '.'+ YEAR(booking_date) ORDER BY booking_date ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['booking_date']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
//            
        default:
            break;
            
            
    }
    $revenueData = DB::query("SELECT 0 AS No, UPPER(name) AS Name,phone AS Phone, email AS Email, year_of_birth AS `Year Of Birth`, property_name AS Property,booking_date AS `Date Booked` FROM guest_property_v WHERE %l ORDER BY  `Date Booked` ASC ", $where);

    
    $revenueTable=array();
    $i=0;
    foreach($revenueData as $r){
        $r['Date Booked']=date('d/m/Y h:i a', strtotime( $r['Date Booked']));
        $r['No']=$i+1;
        array_push($revenueTable, $r);
        $i++;
        
    }
   

     $response=array();
    $response["graphData"]=$chartData;
    $response["tableData"]= $revenueTable;
    
//    echo json_encode($response);
     return ($response);
  
}

function get_overview_reservations_data(){
     global $company_id;
    $propertyId= $_GET['property'];
    $period=get_period($_GET['period']);
    $startDate=$period[0];
    $endDate=$period[1];
    
    if($_GET['period']=="specificdate"){
       $endDate= $startDate=date('Y-m-d', strtotime($_GET['pd']));
       
    } 
    if($_GET['period']=="date_range"){
         $startDate=date('Y-m-d', strtotime($_GET['startdate']));
       $endDate= date('Y-m-d', strtotime($_GET['enddate']));
        
       
    }
    
    
  $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
 if(!$propertyId==0){
     $where->add("property_id=%s",$propertyId);
    }
 $where->add("DATE(booking_date) >= %s", $startDate); 
    $where->add("DATE(booking_date) <= %s", $endDate);
    
    
    
    
  switch($_GET['period']){
            case "this_today":
            
            
            
             $where->add("DAY(booking_date) = %s", date('d'));
             $where->add("MONTH(booking_date) = %s", date('m'));
            $revenueChart=  DB::query("SELECT COUNT(id) AS amount, HOUR(booking_date) AS `hour` FROM booking_tb WHERE %l GROUP BY HOUR(booking_date) ORDER BY booking_date ASC",$where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();

 for( $i=0; $i<count($revenueChart); $i++){ 
                   $d=$revenueChart[$i]['hour'];
                 $monthword =date("H:i",  strtotime("1990-01-01 $d:00:00"));//start from here

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
              //$chartData= $revenueChart;
            
            
            break;
            
           case "this_month":
            $where->add("MONTH(booking_date) = %s", date('m'));
            $where->add("YEAR(booking_date) = %s", date('Y'));
            $revenueChart=  DB::query("SELECT COUNT(id) AS amount, DAY(booking_date) AS `day` FROM booking_tb WHERE %l GROUP BY DAY(booking_date)", $where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();

for( $i=0; $i<count($revenueChart); $i++){ 
                 $monthword = $revenueChart[$i]['day']; 

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            
               // $chartData=$revenueChart;

            
            break;
            
            case "this_year":
           $where->add("YEAR(booking_date) = %s", date('Y'));
                         $revenueChart=  DB::query("SELECT COUNT(id) AS amount, MONTH(booking_date) AS `month` FROM booking_tb WHERE %l GROUP BY MONTH(booking_date)", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


              for( $i=0; $i<count($revenueChart); $i++){ 
                 $m = $revenueChart[$i]['month']; 
                     $monthword = date('M', strtotime("01-$m-1990"));

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
   
            break;
            
            case "lifetime":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT COUNT(id) AS amount, MONTH(booking_date) AS `month`, booking_date FROM booking_tb WHERE %l GROUP BY MONTH(booking_date)+ '.'+ YEAR(booking_date) ORDER BY booking_date ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['booking_date']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
            
        case "specificdate":
// $where->add("DATE(date_paid) = %s", $_GET['pd']);
           $sdate= date('Y-m-d',strtotime($_GET['pd']));
            
            $revenueChart=  DB::query("SELECT COUNT(id) AS amount, HOUR(booking_date) AS `hour` FROM booking_tb WHERE %l  GROUP BY HOUR(booking_date)",$where);
            
             $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


            for( $i=0; $i<count($revenueChart); $i++){ 
                   $d=$revenueChart[$i]['hour'];
                 $monthword =date("H:i",  strtotime("1990-01-01 $d:00:00"));//start from here

                   // $monthword =str_pad($m,2,'0',STR_PAD_LEFT);
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
              //$chartData= $revenueChart;
            
            break; 
            
                case "date_range":
                       //$where->add("YEAR(date_paid) = %s", date('Y'));

             $revenueChart=  DB::query("SELECT COUNT(id) AS amount, MONTH(booking_date)AS `month`, booking_date FROM booking_tb WHERE %l GROUP BY MONTH(booking_date)+ '.'+ YEAR(booking_date) ORDER BY booking_date ASC", $where);

                $chartData=array();
                $chartData['labels'] = array();
                $chartData['amount'] = array();


                for( $i=0; $i<=count($revenueChart)-1; $i++){                 
                    $monthword = date('M-Y', strtotime($revenueChart[$i]['booking_date']) );       
                    $amount=$revenueChart[$i]['amount'];
                    

                    array_push($chartData['labels'], $monthword);
                    array_push($chartData['amount'], $amount);
                }
            
            break;
//            
        default:
            break;
            
            
    }
    
    $revenueData = DB::query("SELECT room_type_id, check_in_date, check_out_date, price_rate, cost,description,booking_status,booking_source,agent_id,total_paid,booking_date FROM booking_tb WHERE %l ORDER BY  booking_date ASC ", $where);

    
    $revenueTable=array();
    
    foreach($revenueData as $r){
        $r['booking_date']=date('d/m/Y h:i a', strtotime( $r['booking_date']));
        array_push($revenueTable, $r);
        
    }

     $response=array();
    $response["graphData"]=$chartData;
    $response["tableData"]= $revenueData;
    
//    echo json_encode($response);
     return ($response);
    
  
}
