<?php 
/*fetch all rooms from all branches. whether boooked or not*/
require_once 'meekrodb.php';
DB::$user = 'root';
DB::$password = 'root';
DB::$dbName = 'reservations_db';

//some constants
//session_start();


//$company_id = $_SESSION['login']["company_id"];
$company_id =$_POST['company_id'];



$token = $_POST['token'];
switch($token){
        
    case "free rooms":
        get_free_rooms();
//        echo $company_id;
        break;
    
  
    
    case "roomtypes":
        get_room_types();

        break; 
    
    
    case "extras":
        get_extras();
        break;
    
    case "add reservation":
        addReservation();
        break;
    
   
   
        default :
        //echo "error uknown";
        // get_reservations();
        break;
}




function get_free_rooms(){
    /*available rooms for new reservation*/
    
   $company_id =$_POST['company_id'];
    $property_id_ = $_POST['property_id'];
    
    //get all room types
    
    
     $s = new WhereClause('and');
    $s -> add("company_id = %i", $company_id);
    if(!$property_id==0){
      $s -> add("property_id = %i", $property_id_);
    }
    
    if(isset($_POST['room_type_id']) && $_POST['room_type_id'] !="0"){
        $room_type_id = $_POST['room_type_id'];
          $s -> add("id = %i", $room_type_id); 
        
    }
    
     $roomtypes = DB::query("SELECT * FROM room_types_tb WHERE  %s", $s);
    
//    if(isset($_POST['room_type_id']) && $_POST['room_type_id'] !="0"){
//         $room_type_id = $_POST['room_type_id'];
//        
//         $roomtypes = DB::query("SELECT * FROM room_types_tb WHERE company_id=%s AND id=%i AND property_id = %i", $company_id, $room_type_id, $property_id_);
//    }
//   else{
//       
//        $roomtypes = DB::query("SELECT * FROM room_types_tb WHERE company_id=%s AND property_id= %s", $company_id, $property_id_);
//   }
    
    $check_in = /*"2017-07-8";//*/date('Y-m-d', strtotime($_POST['check_in']));
    $check_out = /*"2017-07-30";//*/date('Y-m-d', strtotime($_POST['check_out']));
    
    $availableRooms = array();
    
    /*fixing the dates  */
    
    foreach($roomtypes as $roomtype){
      
        $roomtypearray = array();
        $roomtypeId = $roomtype['id'];
        $roomtypePrice= $roomtype['price_per_night'];
        $roomtypearray ["id"] = $roomtypeId;
        $roomtypearray ["name"] = $roomtype['name'];
        $roomtypearray ["number_of_beds"] = $roomtype['number_of_beds'];
        $roomtypearray ["bed_size"] = $roomtype['bed_size'];
        $roomtypearray ["maximum_guests_adults"] = $roomtype['maximum_guests_adults'] ==NULL? "n/a" : $roomtype['maximum_guests_adults'];
        $roomtypearray ["maximum_guests_children"] = $roomtype['maximum_guests_children']===NULL ? "n/a" : $roomtype['maximum_guests_children'];
        $roomtypearray ["check_in"] = $check_in;
        $roomtypearray ["check_out"] = $check_out;
        
        $roomtypearray["specifications"] = $roomtype['specifications'];
        $roomtypearray["property_id"] = $roomtype['property_id'];
          $roomtypearray["property_name"] = getPropertyName($roomtype['property_id']);
        
        
        //get free rooms        
        
        
        $today = date("Y-m-d");
        //booking status missing
        
//        $freerooms = DB::query("select room_id, room_name from booked_rooms_v where room_type_id=$roomtypeId and (((check_out_date < %s and check_in_date >= '$today')  or (check_in_date > %s and check_in_date >= '$today') or check_in_date=%s)) group by room_id",  $check_in, $check_out,'1970-01-01'); and(booking_status='cancelled' or booking_status='checkout'or booking_status='nd')
        
        
//        $where = new whereClause('and');
//        
//        $subor = $where->addClause("or");
//        
//        $whereand = $subor->addClause('and');
//        $sub  = $whereand->addClause('or');
//        $sub -> add('check_in_date > %s', $check_out);
//        $sub -> add('check_out_date < %s', $check_in);
//        
//        $whereand -> add('check_in_date>=%s',$today);
//        $sub = $whereand->addClause('or');
//        $sub -> add('booking_status=%s', "cancelled");
//        $sub -> add('booking_status=%s', "checkout");
//        
        
        
        
//        $freerooms = DB::query("select room_id, room_name,check_in_date,check_out_date from booked_rooms_v where room_type_id=$roomtypeId and ( check_out_date <= DATE('$check_in') ) group by room_id ");
//        
        /// check_in_date >= DATE('$check_out') AND 
         $rm_ids = DB::query("select id,room_name from room_tb where room_type_id=$roomtypeId");
         
        
        
        
         $freerooms = array();
        foreach($rm_ids as $rm_id){
            $r=$rm_id['id'];
            $rname=$rm_id['room_name'];
            
              $rms = DB::query("select check_in_date,check_out_date from booked_rooms_v where room_id=$r && check_out_date>='$today'  order by check_in_date");
            
              $status='free';
             foreach($rms as $rm){
                 $check_in_db=$rm['check_in_date'];
                 $check_out_db=$rm['check_out_date'];
                 if($check_in_db<=$check_in && $check_out_db>=$check_out){
                      $status='1';
                 }else if($check_in_db>=$check_in && $check_out_db<=$check_out){
                      $status='2';
                 }else if($check_in_db<= $check_in && $check_out_db >$check_in){
                      $status='3';
                 }else if($check_in_db< $check_out && $check_out_db >=$check_out){
                      $status='4';
                 }
//                 else if($rm['booking_status'] !='cancelled'){
//                     
//                 }
                     
             }
            if($status=='free'){
                array_push( $freerooms,$rm_id);
            }

            
//            
        }
      
        
        
        
        
        $rooms = array();
        foreach($freerooms as $freeroom){
            $r = array();
            $r['id']=$freeroom['id'];            
            $r['name']=$freeroom['room_name'];
            array_push($rooms, $r);
        }
        $roomtypearray["rooms"] = $rooms;
        
        //get room prices
         $roomprices = DB::query("SELECT * FROM room_prices_view WHERE room_type_id=%s",$roomtypeId);
       
        //adding the standard price to the array first
        $prices = array(array("id"=>"0", "label"=>"Standard Price", "amount"=>$roomtypePrice));
            
        foreach($roomprices as $price){
            $p = array();
            $p['id']=$price['price_id'];            
            $p['label']=strtoupper($price['price_label']);            
            $p['amount']=$price['value'];
            array_push($prices, $p);
        }
        
        $roomtypearray["prices"] = $prices;
        
        //add to main array
        if(sizeof($rooms) > 0){
         array_push($availableRooms, $roomtypearray);
        }
    }
    
    echo json_encode($availableRooms);
//    echo json_encode($freero);
    //echo $check_in." - ".$check_out; 
}



 


function get_room_types(){
    $company_id =$_POST['company_id'];
    $property_id = $_POST['property_id'];
     echo json_encode(DB::query("SELECT * FROM room_types_tb WHERE property_id=%i", $property_id));
    
}


function get_extras(){
    $company_id =$_POST['company_id'];
     echo json_encode(DB::query("SELECT * FROM extras_tb WHERE company_id=%i", $company_id));
    
}





function getPropertyName($id){
    $p = DB::query("SELECT * FROM property_tb WHERE id = %i", $id);
    return $p[0]['property_name'];
}


function save_data($tablname, $data){    
      
        $data = json_decode($data, TRUE);    
        $result = DB::insert($tablname, $data);
          if($result){
            //echo "Saved";
        }
}

function save_data_id($tablname, $data){   
      
        $data = json_decode($data, TRUE);
        $result = DB::insert($tablname, $data);
        return DB::insertId();
}

function addReservation(){
    $company_id =$_POST['company_id'];
    global $user_id;
    
    $main_data = json_decode($_POST['main_data'], true);
    $extras = json_decode($_POST['extras'], true);
    $guests = json_decode($_POST['guests'], true);
    $rooms = json_decode($_POST['rooms'], true);
    $total_paid = $main_data['total_paid'];
    $payment_method = $main_data['payment_method'];
    
    $main_data['company_id'] = $company_id;
    $main_data['check_in_date'] = date('Y-m-d', strtotime($main_data['check_in_date']));
    $main_data['check_out_date'] = date('Y-m-d', strtotime($main_data['check_out_date']));
//    $main_data['company_id'] = $company_id;
    
    //save main data and return
    $booking_id = save_data_id("booking_tb", json_encode($main_data));
     
    //add payments
    if($total_paid !=""){
        global $user_id;
        $payment = array("booking_id"=>$booking_id, "amount"=>$total_paid,"recordedby"=>$user_id,"payment_method"=>$payment_method);
        save_data("booking_payment", json_encode($payment));
    }
    //save rooms
    foreach($rooms as $room){
        $room['booking_id'] = $booking_id;
        save_data("booking_rooms_tb", json_encode($room));
    }
    
    //save extras
    foreach($extras as $xtra){
        $xtra['booking_id'] = $booking_id;
        save_data("booking_extras_tb", json_encode($xtra));
    }
     
    //save guests
    $email_list=array();
    $phone_list=array();
    $name_list=array();
    foreach($guests as $guest){
        array_push($email_list,$guest['email']);
        array_push($phone_list,$guest['phone']);
        array_push($name_list,$guest['name']);
        $guest['booking_id'] = $booking_id;
        $guest['company_id'] = $company_id;
        save_data("guests_tb", json_encode($guest));
    }
    
    $response = array();

    echo $booking_id;
    
   
     if(count($email_list)>0){
         $company_email= DB::queryFirstRow("SELECT email FROM company_tb WHERE id=%i", $company_id);
    $company_email=$company_email['email'];
    
    
         
    $email_list= implode(",",$email_list);
        
         $headers = 'From: Resevations system <'.$company_email.'> '."\r\n";  
                        $headers .= 'Reply-to: Resevations system <'.$company_email.'> '."\r\n";  
                        $headers  .= 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
       
                        $subject= 'BOOKING DETAILS RECEIVED ';
 
          $cell1='width:200px; padding:5px;font-weight:bold;border:0px solid #AAA';
                $cell2='width:300px; padding:5px;border:0px solid #AAA; border-left:none';
                 
         
            $admin_body = "<html><body>";
                      
                      $admin_body = "<p>Booking Confirmation: <b>".$booking_id."</b></p>";
    $admin_body = "<p>Dear, Name<br><t>We have recieved your resevation request.<br> The rooms will be held for the next 7 days awaiting payment to  confrim the booking and failure to confirm with the payment, your reserved rooms will be released and they will be available for other gueststo book. Below are the reservation details. 
    </p>";

         $check_in_date=$main_data['check_in_date'];
         $check_out_date=$main_data['check_out_date'];
         $cost=$main_data['cost'];
         
                        $admin_body .= "<table>";
                      
                        $admin_body .= "<tr><td style='$cell1'>Booked On:</td><td style='$cell2'>".date('d, M Y')."</td></tr>"; 
                        $admin_body .= "<tr><td style='$cell1'>Check-In date:</td><td style='$cell2'>".$check_in_date."</td></tr>";
                        $admin_body .= "<tr><td style='$cell1'>Check-Out date:</td><td style='$cell2'>".$check_out_date."</td></tr>";
                        $admin_body .= "<tr><td style='$cell1'>Number of Guests:</td><td style='$cell2'>".count($guests)."</td></tr>";
                        $admin_body .= "<tr><td style='$cell1'>Total Rooms:</td><td style='$cell2'>".count($rooms)."</td></tr>";
                       
                        $admin_body .= "<tr><td style='$cell1'>Total Costs:</td><td style='$cell2'>".$cost."</td></tr>";
                        
               
                        
                        $admin_body .= "</table>";

                          $admin_body .= "<p><b>NOTE:</b> PLEASE MAKE THE PAYMENT WITHIN THE NEXT 7 DAYS TO AVOID BOOKING CANCELLATION/ROOMS RELEASE</p>";
                         $admin_body .= "<br><p>If you have any inquiries regarding this reservation, please feel free to contact us through
                         <br>Toll free: +23567777366
                         <br>customer service: info@laceltech.com</p>";
                          $admin_body .= "<br><p>Yours sincerely,<br> Reservation hotel</p>";
                         $admin_body .= "</html></body>";

//echo $admin_body;

        
          mail($email_list,  $subject, $admin_body, $headers);
         
         
            $headers1 = 'From: Resevations system  '."\r\n";  
//                        $headers1 .= 'Reply-to: Resevations system <info@laceltech.com> '."\r\n";  
                        $headers1  .= 'MIME-Version: 1.0' . "\r\n";
                        $headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
       
                        $subject1= 'BOOKING REQUEST NOTIFICATION ';
  
         
         
          $admin_body1 = "<html><body>";
                      
                      $admin_body1 = "<p>RoomYo Booking Request: <b>B0002</b></p>";
    $admin_body1 = "<p>Dear, Hotel Name Reservations Team<br><t>You have received a reservation request from the system.<br> Please get in touch with the client to ensure the payment is made. Below are details of the booking request
    </p>";

                        $admin_body1 .= "<table>";
                      
                        $admin_body .= "<tr><td style='$cell1'>Booked On:</td><td style='$cell2'>".date('d, M Y')."</td></tr>"; 
                        $admin_body .= "<tr><td style='$cell1'>Check-In date:</td><td style='$cell2'>".$check_in_date."</td></tr>";
                        $admin_body .= "<tr><td style='$cell1'>Check-Out date:</td><td style='$cell2'>".$check_out_date."</td></tr>";
                        $admin_body .= "<tr><td style='$cell1'>Number of Guests:</td><td style='$cell2'>".count($guests)."</td></tr>";
                        $admin_body .= "<tr><td style='$cell1'>Total Rooms:</td><td style='$cell2'>".count($rooms)."</td></tr>";
                       
                        $admin_body1 .= "<tr><td style='$cell1'>Email:</td><td style='$cell2'>".$email_list."</td></tr>";
                        $admin_body1 .= "<tr><td style='$cell1'>Contact:</td><td style='$cell2'>".$phone_list."</td></tr>";
                        $admin_body .= "<tr><td style='$cell1'>Names:</td><td style='$cell2'>".$name_list."</td></tr>";
                        
               
                        
                        $admin_body1 .= "</table>";

  $admin_body1 .= "<p><b>NOTE:</b> PLEASE GET IN TOUCH WITH THE CLIENT TO CONFIRM PAYMENT AS THE ROOMS WILL BE RELEASED AUTOMATICALLY BY THE SYSTEM</p>";
 $admin_body1 .= "<br><p><hr></p>";
  $admin_body1 .= "<br><p>RoomYo Reservations System | https://www.roomyo.com | Lacel Technologies Ltd</p>";
                         $admin_body1 .= "</html></body>";
         
         
         
         
         
        
          mail($company_email,  $subject1, $admin_body1, $headers1);
         
         
     
     }
////    
    
}


?>
