<?php 
ini_set('post_max_size', '60M');
require_once 'config.php';

$action = $_POST['action'];
switch ($action) {

     case 'extras_update_by_booking_id':

        $guests= $_POST['guests'];

        $booking_id= $_POST['booking_id'];

        $id= $_POST['id'];

        $data = array("total_guests"=>$guests);
        $result = DB::update("booking_extras_tb", $data, "id",$id);     

        
        $extras = DB::query("select * from booked_extras_v where booking_id=%i", $booking_id);

        echo json_encode($extras);


     break;

   case 'change_room_': 
   
       update_booked_room();
   break; 
    case 'delete booked room':
        delete_booked_room();
        break;

   case 'add_extras':
   
   echo json_encode(addExtrasForBooking());
      
   break;

   case 'add_extras':
   
   echo json_encode(addExtrasForBooking());
      
   break;

    case 'update_season':
       addSeason();
    break;
    case 'upload_plogo':
        upload_plogo();
        break;
       
        case 'upload_plogo_e':
        upload_plogoe();
        break;
    case 'upload_logo':
        upload_logo();
        break;
    case "add reservation":
        addReservation();
        break; 
    
    case "add guest":
        addguest();
        break;
    case "delete guest" :
    delete_guest();
    break;
    case "add payment":
        addPayment();
        break; 
    case "delete payment":
    delete_payment();
    break;
    case "change status":
        changeBookingStatus();
        break; 
    
    case "price rate":
        addPriceRate();
        break;
    
    case "update prices":
        updatePrice();
        break; 
    case "update standard prices":
        updateStandardPrice();
        break; 
    
    case "change room status":
        changeRoomStatus();
        break;

    case "add_agent_rate":
 
         $data = json_decode($_POST['data'], true);
        echo addSaveToTable("agent_rates_tb",$data);
    break;

    case "add_bed":
         global $company_id;
         $data = json_decode($_POST['data'], true);
         $data["company_id"]=$company_id;
        echo addSaveToTable("extra_beds_tb",$data);
    break;

    case "add_kid_rate":
           global $company_id;
           $data = json_decode($_POST['data'], true);
           $data["company_id"]=$company_id;
        echo addSaveToTable("kids_rates_tb", $data);

    break;

    case "upload_room_type_image":
        upload_room__type_image();
        break;

        case "update booking kids":
        update_booking_kids();
        break;

        case "update beds":
        update_beds();
        break;
    case "save invoice options":
        save_invoice_options();
        break; 
    
    case "get invoice options":
        get_invoice_options();
        break;

    case "add rooms":
    add_rooms();
    break;
    
    default:
        # code...
       // echo 9;
        break;
}


function add_rooms(){
    global $company_id;
    global $user_id;

    $booking_id= $_POST['booking_id'];
    $rooms = json_decode($_POST['rooms'], true);
    $meal_plan_per_day = json_decode($_POST['meal_plan_per_day']);
    $check_in_date =  $_POST['check_in_date'];
    $check_out_date =  $_POST['check_out_date'];
    // $aa=array();
    foreach($rooms as $room){
        $room['booking_id'] = $booking_id;
        
        $room['meal_plan_per_day']=json_encode(array());
         foreach ($meal_plan_per_day as $key => $value) {
           # code...
           //echo $key;
            //try{

                if($key==$room['booked_as']){
                   $room['meal_plan_per_day']=json_encode($value);

                 }

            //}catch(Exception $err){
                
                 if($key==$room['room_type_id']){
                   $room['meal_plan_per_day']=json_encode($value);

                 }

           // }

           
            
         }
        // print_r($room['meal_plan_per_day']);
        $room['booked_as']= ($room['booked_as'])? $room['booked_as']:0;
         $room['check_in_date'] = date('Y-m-d', strtotime($check_in_date));
         $room['check_out_date'] = date('Y-m-d', strtotime($check_out_date));
        save_data("booking_rooms_tb", json_encode($room));
       
    }
    // echo json_encode($aa);
    
}

function update_booked_room(){
    global $company_id;
    $record_id= $_POST['record_id'];
    $booking_id= $_POST['booking_id'];

    $property_id=$_POST['property_id'];
    $check_in= $_POST['check_in'];
    $check_out=$_POST['check_out'];
    $room_type_id=$_POST['room_type_id'];
    $room_id=$_POST['room_id'];
    $price_rate=$_POST['price_rate'];
    $price_name=$_POST['price_name'];
    $meal_plan=$_POST['meal_plan'];

    
     $booked_room = DB::query("select * from booked_rooms_v where id=%i", $record_id);

     $booking_record = DB::query("select * from booking_tb where id=%i", $booking_id);

     $booking_amount=$booking_record[0]['cost'];
     
     $price_per_night=$booked_room[0]['price_per_night'];

     $check_in_old=$booked_room[0]['check_in_date'];
     $check_out_old=$booked_room[0]['check_out_date'];

     $nights = (strtotime($check_out_old) - strtotime( $check_in_old)) / 3600 / 24;

     $amount_due_to_room=$price_per_night*$nights;

    // echo $booking_amount."-".$amount_due_to_room;

     $leveled_amount=$booking_amount - $amount_due_to_room;
     

     $nights_ = (strtotime($check_out) - strtotime( $check_in)) / 3600 / 24;
     $new_room_price=$price_rate*$nights_;
     $new_amount= $leveled_amount+ $new_room_price;

    // echo $new_amount;

     
    $data_booking_tb = array();
    $data_booking_tb['cost'] = $new_amount;
    
    $cond = "id=%i";
    
    echo DB::update("booking_tb", $data_booking_tb, $cond, $booking_id); 

    $data_booking_room_tb = array();
    
    $data_booking_room_tb['price_rate'] =  $price_name;
    $data_booking_room_tb['meal_plan'] = $meal_plan;
    $data_booking_room_tb['room_id'] = $room_id;
    $data_booking_room_tb['room_type_id'] =  $room_type_id;
    $data_booking_room_tb['property_id'] =  $property_id;
    $data_booking_room_tb['price_per_night'] = $price_rate;
    $data_booking_room_tb['check_in_date'] = date('Y-m-d', strtotime($check_in));
    $data_booking_room_tb['check_out_date'] = date('Y-m-d', strtotime($check_out));
    
    if($record_id == "0"){
        $data_booking_room_tb['booking_id'] =  $booking_id;
        echo DB::insert("booking_rooms_tb", $data_booking_room_tb);
    }
    else{
         echo DB::update("booking_rooms_tb",  $data_booking_room_tb, $cond, $record_id); 

    }

}

function delete_booked_room(){
    $id = $_POST['id'];
   echo DB::delete("booking_rooms_tb","id=%i",  $id); 

}
function addExtrasForBooking(){
    global $company_id;
    $booking_id= $_POST['booking_id'];
    $extra_id= $_POST['id'];
    $guests= $_POST['guests'];
    $unit_price= $_POST['unit_price'];

    $data = array("total_guests"=>$guests, "extra_id"=>$extra_id, "booking_id"=>$booking_id, "unit_price"=>$unit_price);
      
    DB::insert("booking_extras_tb", $data);

    $extras = DB::query("select * from booked_extras_v where booking_id=%i", $booking_id);

    return $extras;
    
}

function getTaxes(){

     global $company_id;
     $taxes =DB::query("SELECT taxes FROM invoice_template_tb WHERE company_id=%i ", $company_id );
    //echo "dd";
     return $taxes[0]["taxes"];
}

function upload_plogoe(){
    $filepath = "../img/settings/";    

    $logoname = basename($_FILES['p-logo-e']['name']);
    $logoname = time().str_replace(" ", "_", $logoname);   

    $tempfile = $_FILES['p-logo-e']['tmp_name'];

    $moved = move_uploaded_file($tempfile, $filepath.$logoname);

    if($moved){
        echo $logoname;
    }else{
        echo "failed";
    }
}
function upload_plogo(){
    $filepath = "../img/settings/";    

    $logoname = basename($_FILES['p-logo']['name']);
    $logoname = time().str_replace(" ", "_", $logoname);   

    $tempfile = $_FILES['p-logo']['tmp_name'];

    $moved = move_uploaded_file($tempfile, $filepath.$logoname);

    if($moved){
        echo $logoname;
    }else{
        echo "failed";
    }
}

function upload_logo(){
    $filepath = "../img/settings/";    

    $logoname = basename($_FILES['c-logo']['name']);
    $logoname = time().str_replace(" ", "_", $logoname);   

    $tempfile = $_FILES['c-logo']['tmp_name'];

    $moved = move_uploaded_file($tempfile, $filepath.$logoname);

    if($moved){
        echo $logoname;
    }else{
        echo "failed";
    }
}

function save_data($tablname, $data){    
      
        $data = json_decode($data, TRUE);    
        $result = DB::insert($tablname, $data);
          if($result){
            //echo "Saved";
        }
        return  $result;
}

function save_data_id($tablname, $data){   
      
        $data = json_decode($data, TRUE);
        $result = DB::insert($tablname, $data);
        return DB::insertId();
}

function generateRandomString() {
    
       $f1 = substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(1/strlen($x)) )),1,1);
       $n1 = substr(str_shuffle(str_repeat($x='0123456789', ceil(1/strlen($x)) )),1,1);
       $f2 = substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(1/strlen($x)) )),1,1);
    
    $ww=$f1.$n1.$f2;
    return $ww;
}



function addReservation(){
    global $company_id;
    global $user_id;
    
    $excluded_taxes=json_decode($_POST['excluded_taxes'],true);
    $main_data = json_decode($_POST['main_data'], true);
    $extras = json_decode($_POST['extras'], true);
    $guests = json_decode($_POST['guests'], true);
    $rooms = json_decode($_POST['rooms'], true);
    $meal_plan_per_day = json_decode($_POST['meal_plan_per_day']);
    
   // $children_rates = json_decode($_POST['children_rates'], true);
    
   // print_r($excluded_taxes);
    $total_paid = $main_data['total_paid'];
    $payment_method = $main_data['payment_method'];
    
    $main_data['company_id'] = $company_id;
    $main_data['prepared_by'] = $user_id;

    $main_data['children_rates']=$_POST['children_rates'];
    
    $main_data['invoice_payment_options'] =$_POST['invoice_payment_options'] ;          #invoice_payment_options: JSON.stringify(invoice_payment_options)


    $main_data['extra_beds']=$_POST['extra_bed'];

    
    $main_data['check_in_date'] = date('Y-m-d', strtotime($main_data['check_in_date']));
    $main_data['check_out_date'] = date('Y-m-d', strtotime($main_data['check_out_date']));

   
    //$main_data['company_id'] = $company_id;
    
    //save main data and return
    $booking_id = save_data_id("booking_tb", json_encode($main_data));
    
     $prefix= DB::queryFirstRow("SELECT prefix FROM invoice_template_v WHERE company_id=%i", $company_id);
    $p=$prefix['prefix'];
    $str = str_pad($booking_id, 4, 0, STR_PAD_LEFT);
    $invoice_no=$p.$str;
    //    
    $taxes = getTaxes();    
    $taxes_ = json_decode(getTaxes());
    $final_taxes = [];
    
    $k=0;
   foreach($taxes_ as $tax) { 
       $taxname = $tax->taxname;
       if (!in_array($taxname, $excluded_taxes)) {
            $final_taxes[] = $tax;
        }
       $k++;
   }
    
    $final_taxes = json_encode($final_taxes);
    print_r($final_taxes);    
    
    $br= generateRandomString().$booking_id;
   
  
    DB::update("booking_tb", array("booking_reference"=>$br,"invoice_no"=> $invoice_no, "taxes"=>$final_taxes), "id=%i", $booking_id);
    
    //add payments
    if($total_paid !="" || $total_paid <=0){
        global $user_id;
        $payment = array("booking_id"=>$booking_id, "amount"=>$total_paid,"recordedby"=>$user_id,"payment_method"=>$payment_method);
        save_data("booking_payment", json_encode($payment));
    }
    //save rooms
    print_r($meal_plan_per_day);

    foreach($rooms as $room){
        $room['booking_id'] = $booking_id;
        
        $room['meal_plan_per_day']=json_encode(array());
         foreach ($meal_plan_per_day as $key => $value) {
           # code...
           //echo $key;
            //try{

                if($key==$room['booked_as']){
                   $room['meal_plan_per_day']=json_encode($value);

                 }

            //}catch(Exception $err){
                
                 if($key==$room['room_type_id']){
                   $room['meal_plan_per_day']=json_encode($value);

                 }

           // }

           
            
         }
        // print_r($room['meal_plan_per_day']);

         $room['check_in_date'] = date('Y-m-d', strtotime($main_data['check_in_date']));
         $room['check_out_date'] = date('Y-m-d', strtotime($main_data['check_out_date']));
        save_data("booking_rooms_tb", json_encode($room));
    }
    
    //save extras
    foreach($extras as $xtra){
        $xtra['booking_id'] = $booking_id;
        save_data("booking_extras_tb", json_encode($xtra));
    }
     
    //save guests
    foreach($guests as $guest){
        $guest['booking_id'] = $booking_id;
        $guest['company_id'] = $company_id;
        save_data("guests_tb", json_encode($guest));
    }
    
    $response = array();
    $response['booking_name'] = $main_data['booking_name'] == ""? "Not specified" : $main_data['booking_name'];
    $response['booking_id'] = $booking_id;
   // echo json_encode($response);
    
    
    
}


function addSaveToTable($table, $data){
     
     return save_data($table, json_encode($data));   
}


// function addguest(){
//     global $company_id;
//     $guests = json_decode($_POST['guests'], true);
//      foreach($guests as $guest){
       
//         $guest['company_id'] = $company_id;
//         save_data("guests_tb", json_encode($guest));
//     }
// }

function addPayment(){
    global $user_id;
    
    $booking_id = $_POST['booking_id'];  
    $payment_id =$_POST['payment_id'];
    $p = array();
    
    $p['date_paid'] =  $_POST['date'] == "" ? date("Y-m-d") : date("Y-m-d", strtotime($_POST['date']));
   
    $p['booking_id'] = $booking_id;
    $p['recordedby'] = $user_id;
    $p['amount'] = $_POST['amount'];
    $p['payment_method'] = $_POST['payment_method'];
    $p['payment_comments'] = $_POST['payment_comments'];
    $p['payment_reference'] = $_POST['payment_reference'];

    if($payment_id == "0"){
    
    //save from here
    $id = save_data_id("booking_payment", json_encode($p));
    }
    else{
    $id = $payment_id;
    DB::update("booking_payment", $p, "id=%i", $payment_id);
        
    }

    $payment = DB::queryFirstRow("select * from booking_payment where id = %i", $id);
    $payment['date_paid'] =  date("d M Y", strtotime($payment['date_paid']));
  
    echo json_encode($payment);
    //echo "hello";
}

function delete_payment(){
    //$booking_id = $_POST['booking_id'];
    $id = $_POST['id'];
    DB::delete("booking_payment", "id=%i", $id);
    echo 1;
}


function addguest(){
    global $company_id;
    
    $booking_id = $_POST['booking_id'];  
    $id = $_POST['guest_id'];
    $gt = array();
    
    $gt['booking_id'] = $booking_id;
    $gt['company_id'] = $company_id;
    $gt['name'] = $_POST['name'];
    $gt['email'] = $_POST['email'];
    $gt['phone'] = $_POST['phone'];
    $gt['id_number'] = $_POST['id_number'];
    $gt['year_of_birth'] = $_POST['year_of_birth'];
   

    if($id != "0"){
     DB::update("guests_tb", $gt,'guest_id=%i', $id);   
    }else{
    //save from here
    $id = save_data_id("guests_tb", json_encode($gt));
    }
    $gt['id'] =  $id;
    echo json_encode($gt);
    //echo "hello";
}
function delete_guest(){
    $id = $_POST['id'];
    echo DB::delete("guests_tb", "guest_id=%i", $id);
//    echo 1;
}



function changeBookingStatus(){
    $booking_id = $_POST['booking_id'];
    $status = $_POST['status'];
    
    $s = array();
    $s['booking_status'] = $status;
    
    $cond = "id=%i";
    
    echo DB::update("booking_tb", $s, $cond, $booking_id);
    //echo  $status;
}


function addSeason(){
    $id = $_POST['id'];
    global $company_id;
   

    $period = json_decode($_POST['period'], true);
    $data=array();
    $data['company_id'] = $company_id;
   

    $data=array_merge($data,$period);

    if($id == "0"){
        
        $id = save_data_id("seasons_tb", json_encode($data));
        echo $id;
    }
    else{
        $cond = "id=%i";
        DB::update("seasons_tb", $data, $cond , $id);

       

        
    }
}


function addPriceRate(){
    $id = $_POST['id'];
    global $company_id;
    $property_id=$_POST['property_id'];
    
    $pr = json_decode($_POST['price_rate'], true);
    $period = json_decode($_POST['period'], true);

    $pr['company_id'] = $company_id;
    $pr['property_id'] = $property_id;

    $pr=array_merge($pr,$period);

    print_r($pr);
    if($id == "0"){
        
        $price_id = save_data_id("price_rates_tb", json_encode($pr));
        
    }
    else{
        $cond = "id=%i";
        $price_id = $id;
        DB::update("price_rates_tb", $pr, $cond , $id);

       

        
    }
}

function updatePrice(){
    global $company_id;
    $property_id= $_POST['property_id'];
    
    $amount = json_decode($_POST['amount'], true);
    //$amount = $_POST['amount'];
    $pr_id = $_POST['price_rate_id'];
    $rt_id = $_POST['room_type_id'];
    $pid = $_POST['price_id'];

    echo $pid;
    
    if($pid == '0'){
       // $data = array("company_id"=>$company_id, "property_id"=>$property_id, "price_rate_id"=>$pr_id, "roomtype_id"=>$rt_id,  "amount"=>$amount);
       $data = array("company_id"=>$company_id, "property_id"=>$property_id, "price_rate_id"=>$pr_id, "roomtype_id"=>$rt_id);
       $data=array_merge($data,$amount);
       DB::insert("room_type_prices", $data);
    }
    else{
       //$data = array("amount"=>$amount);
       DB::update("room_type_prices", $amount, "id=%i", $pid);  
    }
}

function updateStandardPrice(){
    global $company_id;
    
       $amount = json_decode($_POST['amount'], true);
       //$amount = $_POST['amount'];
  
       $rt_id = $_POST['room_type_id'];
   
    
       //$data = array("price_per_night"=>$amount);
       DB::update("room_types_tb", $amount, "id=%i", $rt_id);  
    
}

function upload_room__type_image(){
    $filepath = "../img/roomtypes/";    

    $picture_name = basename($_FILES['uploadFile']['name']);
    $picture_name = time().str_replace(" ", "_", $picture_name);   

    $tempfile = $_FILES['uploadFile']['tmp_name'];

    $moved = move_uploaded_file($tempfile, $filepath.$picture_name);

    if($moved){
        echo $picture_name;
    }else{
        echo "failed";
    }
}

function changeRoomStatus(){
    global $company_id;
    $room_id = $_POST['room_id'];
    $status = $_POST['status'];
    
    $data = array("room_status"=>$status);

    if(isset($_POST['period'])){
    $period = json_decode($_POST['period'], true);
    $data=array_merge($data,$period);


    }else{
     
    $period = array("start_date"=>'0000-00-00',"end_date"=>'0000-00-00');;
    $data=array_merge($data,$period);

    }
    $cond = "id=%i";
    $ref = $room_id;
    
    DB::update("room_tb", $data, $cond, $ref);
    echo 1;
    
}

function update_booking_kids(){
    $booking_id = $_POST['booking_id'];
    $kids = $_POST['kids'];
    DB::update("booking_tb", array("children_rates"=>$kids), "id=%i", $booking_id);
    echo 1;
}

function update_beds(){
    $booking_id = $_POST['booking_id'];
    $beds = $_POST['beds'];
    DB::update("booking_tb", array("extra_beds"=>$beds), "id=%i", $booking_id);
    echo 1;
}

function get_invoice_options(){
    global $company_id;
    $booking_id = $_POST['id'];
    $b = DB::queryFirstRow("select * from booking_tb where id=%i", $booking_id);
    $inv = DB::queryFirstRow("select * from invoice_template_tb where company_id=%i", $company_id);
    //booking options
    $discount = $b['discount'];
    $b_taxes = json_decode($b['taxes'],true);
    $b_payment_options = $b['invoice_payment_options']==""?array() : json_decode($b['invoice_payment_options'], true);
    
    //main arrays
    $taxes = json_decode($inv['taxes'],true);
    if(count($taxes) < 1){
        if(count($b_taxes) > 0){
            $taxes = $b_taxes;
        }
        else{
           $taxes =""; 
        }
        
        
    }
    else{
        //main array should be the combination of the two arrays
        if(count($b_taxes)>0){
           foreach($b_taxes as $bt){
               if(array_search($b_taxes, $taxes) > -1){
                   array_push($taxes, $bt);
}
           } 
        }
//        $taxes = array_merge($taxes,$b_taxes);
//        $taxes = array_map("unserialize", array_unique(array_map("serialize", $taxes)));
    }
        
     $pmo = $inv['payments'];
     $pmo = str_replace('"[', "[", $pmo);
     $pmo = str_replace(']"', "]", $pmo);
     $pmo = str_replace('\"', '"', $pmo);
    $payments = json_decode($pmo,true);

    
    if(count($payments) < 1){
        if(count($b_payment_options) > 0){
            $payment = $b_payment_options;
        }
        else{
           $payments ="[]"; 
        }
    }
    else{
//main array should be the combination of the two arrays
        if(count($b_payment_options) > 0 && array_search($b_payment_options, $payments) >-1){
                array_push($payments, $b_payment_options);
        }

    }
    
    echo json_encode(array("taxes"=>$taxes, "payments"=>$payments, "discount"=>$discount, "b_taxes"=>$b_taxes,"b_payment_options"=>$b_payment_options));
}
function save_invoice_options(){
    
    $booking_id = $_POST['id'];
    $taxes = $_POST['taxes'];
    $payments = $_POST['po'];
    $discount = $_POST['discount'];
    
    DB::update("booking_tb", array("discount"=>$discount,"taxes"=>$taxes, "invoice_payment_options"=>$payments), "id=%i", $booking_id);
    echo 1;
}
