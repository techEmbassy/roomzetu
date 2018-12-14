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
        
    case 'allRoomsCount':
        $property_id=$_GET['property'];
        $where = new WhereClause('and');
        $where ->add("company_id=%i", $company_id);
        if(!$property_id==0){
        $where->add("property_id=%s",$property_id);
        }
        $rooms = DB::query("SELECT * FROM rooms_types_v WHERE %l ", $where);

        $rooms_dsit = DB::query("SELECT DISTINCT room_type_id FROM rooms_types_v WHERE %l ", $where);


        $where = new WhereClause('and');
        $today = date("Y-m-d");
        $where ->add("company_id=%i", $company_id);
        if(!$property_id==0){
        $where->add("property_id=%s",$property_id);
        }
        $where -> add("DATE(check_in_date)<=DATE(%s)", $today);
        $where -> add("DATE(check_out_date)>=DATE(%s)", $today);

        $s=$where->addClause("or");
        $s -> add("booking_status=%s", "confirmed");
        $s -> add("booking_status=%s", "check-in");
        $o_rooms = DB::query("SELECT room_id FROM booked_rooms_v WHERE %l Group by room_id", $where);

        $broken_rooms=0;

        foreach($rooms_dsit as $room){
        $roomtypeId=$room['room_type_id'];

        $b_rooms =  DB::query("select id,room_name,room_status,start_date,end_date from room_tb where room_type_id=$roomtypeId AND room_status = 'broken' ");

        $rstatus=$b_rooms[0]['room_status'];
        $rstart_date=$b_rooms[0]['start_date'];
        $rend_date=$b_rooms[0]['end_date'];

        $rend_date=date_create($rend_date);
        date_add($rend_date,date_interval_create_from_date_string("1 day"));
        $rend_date = date_format($rend_date,"Y-m-d");

        if(!($today >= $start_date && $rend_date> $today )){

        $broken_rooms =$broken_rooms+1;
        }

        }

        $o=array();
        $o['rooms']=count($rooms);
        $o['o_rooms']=count($o_rooms);
        $o['av_rooms']=count($rooms)-(count($o_rooms)+ $broken_rooms);

        echo json_encode($o);
        
         
    break;
        
    case 'check_in_today':
     
        //check in today
        $property_id=$_GET['property'];
        
        $where = new WhereClause("and");
        $where -> add("company_id=%i", $company_id);
        


        if(!$property_id==0){
        $where->add("property_id=%s",$property_id);
        }
        $today = date("Y-m-d");
        $where -> add("DATE(check_in_date)=DATE(%s)", $today);
        $s=$where->addClause("or");
        $s -> add("booking_status=%s", "confirmed");
        $s -> add("booking_status=%s", "check-in");

        $rvs = DB::query("SELECT * FROM booking_tb where %l", $where);

        $rms = array();
        $rms['type']=array();
        $rms['name']=array();


        foreach($rvs as $rv){

            $b_id = $rv['id'];
            $a_id = $rv['agent_id'];
            $s = $rv['booking_source'];
            $name__ = get_booking_source($b_id,$s, $a_id);
            $rooms = DB::query("select room_type_id, room_type_name,count(room_id) as total_rooms  from booked_rooms_v where booking_id=%s Group by room_type_id", $b_id);
            $r = array();

            foreach($rooms as $room){
            array_push($r, $room['room_type_name']." (". $room['total_rooms'].")"); 

            }
            array_push( $rms['type'], implode(",", $r));
            array_push( $rms['name'], $name__);
        }

        $h=array();
        for($i=0;$i<count($rms['type']); $i++)  {
        $u= array();

        $u['type']=$rms['type'][$i];
        $u['name']=$rms['name'][$i];

        array_push($h, $u);

        }           
        $o=array();
        $o['rvs']=$h;
        $o['ct']=count($rvs);

        echo json_encode($o);

    break; 
    
    case 'in_house_guests':
     
  //in_house_guests
     
         $property_id=$_GET['property'];

        $where = new WhereClause("and");
        $where -> add("company_id=%i", $company_id);
                             

    if(!$property_id==0){
     $where->add("property_id=%s",$property_id);
    }
            $today = date("Y-m-d");
            $where -> add("DATE(check_in_date)<=DATE(%s)", $today);
            $where -> add("DATE(check_out_date)>=DATE(%s)", $today);
            $s=$where->addClause("or");
            $s -> add("booking_status=%s", "confirmed");
            $s -> add("booking_status=%s", "check-in");

                                $trvs = DB::query("SELECT * FROM booking_tb where %l", $where);
        
       
          $trv=array();
    
    foreach($trvs as $r){
        $b_id = $r['id'];
       $a_id = $r['agent_id'];
        $s = $r['booking_source'];
        
         
        $r['check_out_date']=date("D, d M Y", strtotime( $r['check_out_date']));
        $r['check_out_date2']=date("d M", strtotime( $r['check_out_date']));
        $r['name__']= get_booking_source($b_id,$s, $a_id);
       
        array_push($trv, $r);
       
        
    }
        $o=array();
        $o['guests_data']=$trv;
        $o['ct']=count($trvs);
        
echo json_encode($o);
    
    break;
        
        
    
   
   

case 'all_reservations':
        $property_id=$_GET['property'];
            
                        $today = date("Y-m-d");

                                $where = new WhereClause("and");
                                $where -> add("company_id=%i", $company_id);
        
              if(!$property_id==0){
     $where->add("property_id=%s",$property_id);
    }
                                $where -> add("DATE(check_in_date)<=DATE(%s)", $today);
                                $where -> add("DATE(check_out_date)>=DATE(%s)", $today);

                                $s=$where->addClause("or");
                                $s -> add("booking_status=%s", "confirmed");
                                $s -> add("booking_status=%s", "check-in");

                                $trvs = DB::query("SELECT * FROM booking_tb where %l", $where);
                       
        
       break;


   case 'holding period':
        
     $holding_p = DB::query("SELECT holding_period FROM hotel_policy_tb WHERE company_id=%i", $company_id);   
  
     $bookings = DB::query("SELECT id,booking_date FROM booking_tb WHERE company_id=%i AND booking_status=%s",$company_id,'unconfirmed');
    
//      print_r($bookings);
     $email_list=array();
    
    foreach($bookings as $b){
        $b_date=$b['booking_date'];
        $b_id=$b['id'];
        //$b_pid=$b['property_id'];
        
        $h_remd= (strtotime(date('Y-m-d H:i:s'))-(strtotime($b_date)))/86400;
        
        foreach($holding_p as $h){
         $h_p=$h['holding_period'];
         //$h_pid=$h['property_id'];
           // if($h_pid==$b_pid){
        if($h_remd>=$h_p){
                DB::update('booking_tb', array('booking_status'=>'cancelled'),'id=%l', $b_id);
                  
                   $e_guest = DB::queryFirstRow("SELECT email FROM guests_tb WHERE booking_id=%i",$b_id);
                   
        array_push($email_list,$e_guest['email']);
                   
        } 
            //}
    }
        
        
    }
    
if(count($email_list) > 0){
    $co= DB::queryFirstRow("SELECT email FROM company_tb WHERE id=%i", $company_id);
    $company_email=$co['email'];
    $company_name=$co['company_name'];
    $company_logo=$co['logo'];
    $company_address=$co['address'];
    $company_phone=$co['phone'];
    
    
    $email_list= implode(",",$email_list);
    $headers = 'From: '.$company_name.' <'.$company_email.'> '."\r\n";  
                        $headers .= 'Reply-to: RoomZetu <'.$company_email.'> '."\r\n";  
                        $headers  .= 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
       
  $subject= 'Room Booking Last Notification ';
  $admin_body = "<p>Your reserved Rooms have been released after expiration of the 7 days holding period policy without payment. Please Call the booking office to re-initiate your booking.</p>
  <p>Thank You</p>";
    
 $admin_body = makeEmail($admin_body, $company_name, $company_email, $company_phone,$company_logo,$company_address);
        
  mail($email_list,  $subject, $admin_body, $headers);
     

}
   
        
break;
        
        
        
        
    default:
        # code...
        break;
}



/*

$bookings = DB::query("SELECT * FROM booking_tb WHERE %l ORDER BY  id DESC",$where);

     foreach($bookings as $b){
        $booking = array();
        $id = $b['id'];
        //if(!is_null($id)){
         $guests = DB::query("select * from guests_tb where booking_id=%s", $id);
         $payment = DB::query("select * from booking_payment where booking_id=%s", $id);

         $extras = DB::query("select * from booked_extras_v where booking_id=%s", $id);
         $rooms = DB::query("select * from booked_rooms_v where booking_id=%s", $id);
         $agent_id=$b['agent_id'];
         $agent = DB::queryFirstRow("select * from agent_tb where id=%s",$agent_id );
         $total_paid =0;
         $payments = array();

         foreach($payment as $p){
             $p['date_paid'] = date("d M Y", strtotime($p['date_paid']));
             $total_paid = $total_paid + $p['amount'];
             array_push($payments, $p);
         }
            //$guests
//        $b['agent_id']
            $booking["id"] = $id;
            $booking["source"] = get_booking_source($id, $b['booking_source'],  $b['agent_id']);
            $booking["check_in_date"] = date('d M, Y', strtotime($b['check_in_date']));
            $booking["check_out_date"] = date('d M, Y', strtotime($b['check_out_date']));
            $booking["booking_period"] = (strtotime($b['check_out_date'])<strtotime(date("Y-m-d")))?'past':'future';
            $booking["nights"] = (strtotime($b['check_out_date']) - strtotime($b['check_in_date'])) / 3600 / 24;
            $booking["guests"] = $guests;
            $booking["cost"] = $b['cost'];
            $booking["discount"] = $b['discount'];
            $booking["total_paid"] = $total_paid;
            $booking["payments"] = $payments;
            $booking["rooms"] = $rooms;
            $booking["extras"] = $extras;

            $booking["taxes"] = json_decode($b['taxes'],true);
            $booking["booking_reference"] = $b['booking_reference'];
            $booking["booking_name"] = $b['booking_name'];
            $booking["invoice_no"] = $b['invoice_no'];
            $booking["property_id"] = $b['property_id'];
            $booking["property_name"] = getPropertyName($b['property_id']);
            $booking["booking_date"] = date('d M, Y', strtotime($b['booking_date']));
            $booking["booking_source"] = $b['booking_source'];
            $booking["message"] = $b['description'];
            $booking["no_guests"] = $b['no_guests'];
            $booking["status"] = $b['booking_status'];
            $booking["agent"] = $agent;

        ///}

        array_push($response, $booking);
    }
    
    */