<?php
/*fetch all rooms from all branches. whether boooked or not*/
require_once 'config.php';


$token = $_POST['token'];
switch($token){
   case 'get_extras_by_bid':
   $booking_id=$_POST['booking_id'];
   $extras = DB::query("select * from booked_extras_v where booking_id=%i", $booking_id);


   echo json_encode($extras);
   break;

   case 'get_taxes_by_bid':
   $booking_id=$_POST['booking_id'];
   $taxes = DB::query("select taxes from booking_tb where id=%i", $booking_id);

   
   echo json_encode(json_decode($taxes[0]["taxes"],true));
   break;
    case "get_rooms_":

      get_roomsA();

    break;

    case "seasons":
     get_seasons();
    break;

    case "load_prices":
       load_prices();
    break;

    case "free rooms":
        get_free_rooms();
        break;

    case "change free rooms":
        change_free_rooms();
        break;

        case "change free check-in-out":
        change_check_in_out();
        break;

    case "properties":
        get_company_properties();
        break;

    case "roomtypes":
        get_room_types();
        break;
    case "roomtype":
        get_room_type();
        break;

    case "agents":
        get_agents();
        break;
    case "extras":
        get_extras();
        break;

    case "reservations":
        get_reservations();
        break;
    case "get_all_invoicess":
        get_invoices();
        break;

    case "booking":
        getBooking();
        break;

    case "one_reservations":
        get_one_reservations();
        break;

    case "chart":
        getChartData();

        break;
    case "chart free rooms":
        getChartData_freeRooms();

        break;

    case "all rooms":
        getAllRooms();

        break;

    case "prices":
        getPricesData();

        break;
    case "standardprices":
        getStandardPricesData();

        break;

    case "invoice":
        getInvoice();

        break;

    case "invoice_temp":
        getInvoiceTemp();

        break;

    case "email_template":
        getTemplate();

        break;

        /* Wed 09/May/2018 */
    case "get agent bookings":
        getAgentBookings();

        break;


    case "get room allocation":
        getRoomAllocation();

        break;

    case "get_taxes" :

         getTaxes();
    break;

    case "get_taxes_4_selection" :

    print_r(getTaxes());
         
   // echo json_encode(getTaxes());
    break;

case "get_extras" :

echo json_encode(getExtras());
break;

     case "get_agent_rates":

        echo json_encode(getAgentRates());

     break;

     case "get_extra_bed":

        echo json_encode(getExtraBed());

     break;

     case "get_kids_rates" :

        echo json_encode(getKidsRates());
     break;


     case "get_all_invoices" :

        echo json_encode(getInvoiceData());
     break;

//     case "update_kids_rates":
////        echo json_encode(getKidsRates());
//        echo UpdateKidsRates();
//     break;



default :
echo "error uknown token :". $token;
// get_reservations();
break;
}


function getKidsRates(){
     global $company_id;
     //$property_id =$_POST['property_id'];
     $rates =DB::query("SELECT * FROM kids_rates_tb WHERE company_id='$company_id' AND status !='deleted' ");
    
     return $rates;

}

//function UpdateKidsRates(){
//     global $company_id;
//     $newrate =$_POST['newrate'];
////     $rates =DB::query("SELECT * FROM kids_rates_tb WHERE company_id='$company_id' AND status !='deleted' ");
//    
//     return $newrate . 'and' . $company_id;
//
//}

 function getAgentRates(){

     $property_id = $_POST['property_id'];
     $rates =DB::query("SELECT * FROM agent_rates_tb WHERE property_id=%i AND status!='deleted' ", $property_id );
    
     return $rates;


}

 function getExtraBed(){
     global $company_id;
     
     //$property_id = $_POST['property_id'];
     $extrabeds =DB::query("SELECT * FROM extra_beds_tb WHERE company_id=%i AND status!='deleted' ", $company_id );
    
     return $extrabeds;


}


function getInvoiceData(){
    global $company_id;
    
    //$property_id = $_POST['property_id'];
    $invoices =DB::query("SELECT * FROM booking_tb WHERE company_id=%i AND booking_status!='confirmed' ", $company_id );
   
    return $invoices;


}




 function getExtras(){

     global $company_id;
     $extras =DB::query("SELECT * FROM extras_tb WHERE company_id=%i ", $company_id );
    //echo "dd";
     return $extras;


}

function getTaxesBYB(){

     global $company_id;
     $taxes =DB::query("SELECT taxes FROM invoice_template_tb WHERE company_id=%i ", $company_id );
    //echo "dd";
     return $taxes[0]["taxes"];


}

function getTaxes(){

     global $company_id;
     $taxes =DB::query("SELECT taxes FROM invoice_template_tb WHERE company_id=%i ", $company_id );
    //echo "dd";
     return $taxes[0]["taxes"];


}


function get_roomsA(){

    global $company_id;

    $roomtypeId = $_POST['roomtypeId'];
     $check_in = $_POST['checkIn'];
    $check_out = $_POST['checkOut'];

     $check_in = /*"2017-07-8";//*/date('Y-m-d', strtotime($check_in));
    $check_out = /*"2017-07-30";//*/date('Y-m-d', strtotime($check_out));
    
    $rm_ids =DB::query("SELECT * FROM room_tb WHERE room_type_id=%i ", $roomtypeId );


   $today = date("Y-m-d");
        //booking status missing


         $freerooms = array();
        foreach($rm_ids as $rm_id){
            $r=$rm_id['id'];
            $rname=$rm_id['room_name'];
            $rstatus=$rm_id['room_status'];
            $rstart_date=$rm_id['start_date'];
            $rend_date=$rm_id['end_date'];

            $rend_date=date_create($rend_date);
             date_add($rend_date,date_interval_create_from_date_string("1 day"));
             $rend_date = date_format($rend_date,"Y-m-d");

              $rms = DB::query("select check_in_date,check_out_date,booking_status from booked_rooms_v where room_id=$r && check_out_date>='$today' && booking_status != 'cancelled' && booking_status != 'deleted' order by check_in_date");

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

              if($rstatus=="broken"){
                 
                if($rstart_date <= $check_in && $rend_date >=$check_out){
                      $status='5';

                 }
                 //echo $rstart_date."<=".$check_in." ,". $rend_date.">=".$check_out."  ". $status." 1:</br>";
                  
             }
            if($status=='free'){
                array_push( $freerooms,$rm_id);
            }

//
        }



  
    echo json_encode($freerooms);

}

function getRoomAllocation(){
    global $company_id;
    
    $data =DB::query("SELECT * FROM company_tb WHERE id=%i ", $company_id );
  
    echo json_encode($data[0]);

}

function load_prices(){
    global $company_id;
    $roomtypeId = $_POST['roomtypeId'];
    $meal_plan = $_POST['meal_plan'];
    $check_in = $_POST['checkIn'];
    $check_out = $_POST['checkOut'];
    
    $property_id=$_POST['property_id'];

    $high_array =DB::query("SELECT * FROM seasons_tb WHERE company_id=%s AND property_id=%i AND season=%s ", $company_id,$property_id,"high" );
    $low_array =DB::query("SELECT * FROM seasons_tb WHERE company_id=%s AND property_id=%i AND season=%s ", $company_id,$property_id,"low" );


    $seasons= array("high"=>$high_array,"low"=>$low_array);


    
    $room_standard_prices = DB::query("SELECT * FROM room_types_tb WHERE id=%i",$roomtypeId);
    
    $room_special_prices = DB::query("SELECT * FROM room_prices_view WHERE room_type_id=%i",$roomtypeId);

   // $room_agent_prices = DB::query("SELECT * FROM agent_price_rates_v WHERE room_type_id=%i",$roomtypeId);

    $room_agent_prices = DB::query("SELECT * FROM agent_rates_tb WHERE property_id=%i AND status!='deleted' ",$property_id);

    
    //print_r($room_special_prices);
   

    $check_in = /*"2017-07-8";//*/date('Y-m-d', strtotime($check_in));
    $check_out = /*"2017-07-30";//*/date('Y-m-d', strtotime($check_out));
         
        $h_check_in_flag=0;
        $h_check_out_flag=0;

         $l_check_in_flag=0;
        $l_check_out_flag=0;
        $days_in_high_check_in=0;
        $days_in_high_check_out=0;

        $high_start_array=array();
        $high_end_array=array();;

            foreach($seasons["high"] as $high){


              $high_start= (date('Y', strtotime($check_in)))."-".date('m-d', strtotime($high["start_date"]));
              $high_end= (date('Y', strtotime($check_in)))."-".date('m-d', strtotime($high["end_date"]))  ;

               $high_start = /*"2017-07-8";//*/date('Y-m-d', strtotime($high_start));
               $high_end = /*"2017-07-30";//*/date('Y-m-d', strtotime($high_end));
             // $days_in_high_check_in=date_diff($check_in,$high_end);
             // $days_in_high_check_out=date_diff($check_,$high_end);
    
                if($high_start<= $check_in && $high_end >= $check_in ){
                    $h_check_in_flag=1;
                     array_push($high_end_array,$high_end);
                }

               $high_start= (date('Y', strtotime($check_out)))."-".date('m-d', strtotime($high["start_date"])) ;
               $high_end= (date('Y', strtotime($check_out)))."-".date('m-d', strtotime($high["end_date"]))  ;

               $high_start = /*"2017-07-8";//*/date('Y-m-d', strtotime($high_start));
               $high_end = /*"2017-07-30";//*/date('Y-m-d', strtotime($high_end));

                if($high_start<= $check_out && $high_end >= $check_out ){
                    $h_check_out_flag=1;
                    array_push($high_start_array,$high_start);
                }
            }

         $low_start_array=array();
        $low_end_array=array();;

        foreach($seasons["low"] as $low){

           // $low_start= $low["start_date"];
            //$low_end= $low["end_date"];

             $low_start= date('Y', strtotime($check_in))."-".date('m-d', strtotime($low["start_date"])) ;
              $low_end= date('Y', strtotime($check_in))."-".date('m-d', strtotime($low["end_date"]))  ;

               $low_start = /*"2017-07-8";//*/date('Y-m-d', strtotime($low_start));
               $low_end = /*"2017-07-30";//*/date('Y-m-d', strtotime($low_end));

             if($low_start<= $check_in && $low_end >= $check_in ){  
                    $l_check_in_flag=1; 
                    array_push($low_end_array,$low_end);           
             }
            

             $low_start= $low["start_date"];
            $low_end= $low["end_date"];

             $low_start= date('Y', strtotime($check_out))."-".date('m-d', strtotime($low["start_date"])) ;
              $low_end= date('Y', strtotime($check_out))."-".date('m-d', strtotime($low["end_date"]))  ;

               $low_start = /*"2017-07-8";//*/date('Y-m-d', strtotime($low_start));
               $low_end = /*"2017-07-30";//*/date('Y-m-d', strtotime($low_end));
             if($low_start<= $check_out && $low_end >= $check_out ){   
                     $l_check_out_flag=1; 
                    array_push($low_start_array,$low_start);    
             }
            
        }
        
        
       
         if($h_check_in_flag==1 && $h_check_out_flag==1 ){
            //high season

           switch($meal_plan){
             
             case "FB":

             $roomtypePrice= $room_standard_prices[0]["price_per_night"];
             
              $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
               $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value' );

            
                echo json_encode($prices);

             break;

             case "HB":

             $roomtypePrice= $room_standard_prices[0]["amount_H_HB"];
             //echo $room_special_prices[0]["value_H_HB"];
             $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
             $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value_H_HB' );
            
                echo json_encode($prices);

             break;
             
             case "BB":

             $roomtypePrice = $room_standard_prices[0]["amount_H_BB"];
             //echo $room_special_prices[0]["value_H_HB"];
              $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
              $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value_H_BB' );

             
               echo json_encode($prices);

             break;


           }



         }else if($l_check_in_flag==1 && $h_check_out_flag==1){

             $days_in_high=0;
             $days_in_low=0;

            foreach($low_end_array as $low_end_){
                  
                 $check_in = date('Y-m-d', strtotime($check_in));
                 $low_end_ = date('Y-m-d', strtotime($low_end_));
               
                $diff= abs(strtotime($low_end_) - strtotime($check_in));
                
                $years =floor($diff/(365*60*60*24));
                $months =floor(($diff- $years*(365*60*60*24))/(30*60*60*24));
                $days= floor(($diff- $years*(365*60*60*24) - $months*(30*60*60*24))/(60*60*24) );
                $days_in_low=$days+1;
                 //echo $days." ".$check_in." ". $high_end_;

             }

             foreach($high_start_array as $high_start_){
                  
                 $check_out = date('Y-m-d', strtotime($check_out));
                 $high_start_ = date('Y-m-d', strtotime($high_start_));
               
                $diff= abs(strtotime($check_out) - strtotime($high_start_));
                
                $years =floor($diff/(365*60*60*24));
                $months =floor(($diff- $years*(365*60*60*24))/(30*60*60*24));
                $days= floor(($diff- $years*(365*60*60*24) - $months*(30*60*60*24))/(60*60*24) );
                $days_in_high=$days;
                 //echo $days." ".$check_in." ". $high_end_;

             }
          
             $total_days =$days_in_low +$days_in_high;

             switch($meal_plan){
             
             case "FB":
              
               $roomtypePrice= $room_standard_prices[0]["price_per_night"] *($days_in_high/$total_days) + $room_standard_prices[0]["amount_L_FB"] * ($days_in_low/$total_days);
             
              $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
              $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value',$days_in_low,$days_in_high);

            

              echo json_encode($prices);

             break;

             case "HB":

              $roomtypePrice= (($room_standard_prices[0]["amount_L_HB"] *($days_in_low/$total_days)  +  $room_standard_prices[0]["amount_H_HB"] *($days_in_high/$total_days)));
             //echo $room_special_prices[0]["value_H_HB"];
             $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
             $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value_M_HB',$days_in_low,$days_in_high );
            
                echo json_encode($prices);

             break;
             
             case "BB":

              $roomtypePrice= (($room_standard_prices[0]["amount_L_BB"] *($days_in_low/$total_days)  +  $room_standard_prices[0]["amount_H_BB"] *($days_in_high/$total_days)));
             //echo $room_special_prices[0]["value_H_HB"];
             $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
             $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value_M_HB' ,$days_in_low,$days_in_high);
            
                echo json_encode($prices);

             break;


           }


         }
         else if($h_check_in_flag==1 && $l_check_out_flag==1){
            //low season
             //$days_in_high=date_diff($check_in,$high_end);
             //$days_in_low=date_diff($high_end,$check_out);

             $days_in_high=0;
             $days_in_low=0;

            foreach($high_end_array as $high_end_){
                  
                 $check_in = date('Y-m-d', strtotime($check_in));
                 $high_end_ = date('Y-m-d', strtotime($high_end_));
               
                $diff= abs(strtotime($high_end_) - strtotime($check_in));
                
                $years =floor($diff/(365*60*60*24));
                $months =floor(($diff- $years*(365*60*60*24))/(30*60*60*24));
                $days= floor(($diff- $years*(365*60*60*24) - $months*(30*60*60*24))/(60*60*24) );
                $days_in_high=$days +1;
                 //echo " ".$days." ".$check_in." ". $high_end_ ."</br>";

             }

             foreach($low_start_array as $low_start_){
                  
                 $check_out = date('Y-m-d', strtotime($check_out));
                 $low_start_ = date('Y-m-d', strtotime($low_start_));
               
                $diff= abs(strtotime($check_out) - strtotime($low_start_));
                
                $years =floor($diff/(365*60*60*24));
                $months =floor(($diff- $years*(365*60*60*24))/(30*60*60*24));
                $days= floor(($diff- $years*(365*60*60*24) - $months*(30*60*60*24))/(60*60*24) );
                $days_in_low=$days;
                 // echo " ".$days." ".$check_out." ". $low_start_;

             }


           $total_days= $days_in_high+$days_in_low;
            //echo $days_in_high ." ".$days_in_low;

            //print_r( $low_start_array);
            
             switch($meal_plan){
             
             case "FB":
              
              $roomtypePrice= $room_standard_prices[0]["price_per_night"] *($days_in_high/$total_days) + $room_standard_prices[0]["amount_L_FB"] * ($days_in_low/$total_days);
             
              $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
              $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value',$days_in_low,$days_in_high);

            //echo $room_standard_prices[0]["price_per_night"] *($days_in_high/$total_days) + $room_standard_prices[0]["amount_L_FB"] * ($days_in_low/$total_days). "=".$roomtypePrice;

             echo json_encode($prices);

             break;

             case "HB":

              $roomtypePrice= (($room_standard_prices[0]["amount_H_HB"]*($days_in_high/$total_days) +  $room_standard_prices[0]["amount_L_HB"] *($days_in_low/$total_days)));
             //echo $room_special_prices[0]["value_H_HB"];
             $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
             $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value_M_HB',$days_in_low,$days_in_high );
            
                echo json_encode($prices);

             break;
             
             case "BB":
             $roomtypePrice= (($room_standard_prices[0]["amount_H_BB"]*($days_in_high/$total_days)  +  $room_standard_prices[0]["amount_L_BB"] *($days_in_low/$total_days)));
             //echo $room_special_prices[0]["value_H_HB"];
             $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
             $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value_H_HB',$days_in_low,$days_in_high );
            
                echo json_encode($prices);

             break;


           }


         }else {
            //low season

             switch($meal_plan){
             
              case "FB":

             $roomtypePrice= $room_standard_prices[0]["price_per_night"];
             
              $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
               $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value' );

            
                echo json_encode($prices);

             break;

             case "HB":

             $roomtypePrice= $room_standard_prices[0]["amount_H_HB"];
             //echo $room_special_prices[0]["value_H_HB"];
             $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
             $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value_H_HB' );
            
                echo json_encode($prices);

             break;
             
             case "BB":

             $roomtypePrice = $room_standard_prices[0]["amount_H_BB"];
             //echo $room_special_prices[0]["value_H_HB"];
              $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));
              $prices= nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,'value_H_BB' );

             
               echo json_encode($prices);

             break;


           }

   


         }



        //adding the standard price to the array first
       //$prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Standard Price", "amount"=>$roomtypePrice));

     /*  foreach($roomprices as $price){
            $p = array();

            $p['cat']='guest';
            $p['id']=$price['price_id'];
            $p['label']=strtoupper($price['price_label']);
            $p['amount']=$price['value'];
            array_push($prices, $p);
        }
        /*
         $agentroomprices = DB::query("SELECT * FROM agent_price_rates_v WHERE room_type_id=%s",$roomtypeId);

        foreach($agentroomprices as $price){
            $p = array();

            $p['cat']=$price['agent_id'];
            $p['id']=$price['agent_id'];
            $p['label']= 'Agent - '.strtoupper($price['agent_name']).' ($'. round($price['agent_price'], 1).')';
            $p['amount']= round($price['agent_price'],1);
            array_push($prices, $p);
        }

        $roomtypearray["prices"] = $prices;*/

        //alert($roomtypeId);


}

function nonstandard($prices,$room_special_prices,$room_agent_prices,$roomtypePrice,$amount_string ,$days_in_low=0,$days_in_high=0/*'value_H_HB'*/ ){

              
              
              foreach($room_agent_prices as $price){
                   $p = array();
                   //$price['agent_rate'] rate_code
                   /*$agent_price=((100-$price['agent_rate'])/100)*$roomtypePrice;

                   $p['cat']=$price['agent_id'];
                   $p['id']=$price['agent_id'];
                   $p['label']= 'Agent - '.strtoupper($price['agent_name']).' ($'. round($agent_price, 1).')';
                   $p['amount']= round($agent_price,1);
                   array_push($prices, $p);*/

                  $agent_price=((100-$price['discount'])/100)*$roomtypePrice;

                   $p['cat']=$price['id'];
                   $p['id']=$price['id'];
                   $p['label']= strtoupper($price['rate_code'])."-".$price['discount']." ".' ($'. round($agent_price, 1).')';
                   $p['amount']= round($agent_price,1);
                   array_push($prices, $p);


                }

               
                foreach($room_special_prices as $price){
                $p = array();

                $p['cat']='guest';
                $p['id']=$price['price_id'];
                $p['label']=strtoupper($price['price_label']);
                
                if($days_in_low==0 &&$days_in_high==0){

                  $p['amount']=$price[$amount_string];
                
                }else if($days_in_low >0 &&$days_in_high==0){

                     $p['amount']=$price[$amount_string];

                }else if($days_in_low ==0 &&$days_in_high >0){
                     $p['amount']=$price[$amount_string];

                }else{

                   
                         $p['amount']=floor(($price[str_replace("_M_", "_H_", $amount_string)] * abs($days_in_high) +
                     $price[str_replace("_M_", "_L_", $amount_string)] * abs($days_in_low))/ ($days_in_low+$days_in_high)) ;

                }


                if($p['amount']!=0){

                   array_push($prices, $p);

                }
               

                
               }
                return $prices;
}

function change_check_in_out(){
    /*available rooms for new reservation*/

    global $company_id;
    $booking_id = $_POST['booking_id'];

///print_r($_POST['booking_id']);

    $s = new WhereClause('and');
    $s -> add("company_id = %i", $company_id);
//

    

    $check_in = /*"2017-07-8";//*/date('Y-m-d', strtotime($_POST['check_in']));
    $check_out = /*"2017-07-30";//*/date('Y-m-d', strtotime($_POST['check_out']));

    $availableRooms = array();

    $booking = DB::query("SELECT * FROM booking_tb WHERE  id=%l", $booking_id);

    

   
     $s -> add("id = %i",  $booking[0]['room_type_id']);
//

     $roomtypes = DB::query("SELECT * FROM room_types_tb WHERE  %s ", $s);
    /*fixing the dates  */

    foreach($roomtypes as $roomtype){


        $roomtypeId = $roomtype['id'];



        //get free rooms


        $today = date("Y-m-d");
        //booking status missing

//
         $rm_ids = DB::query("select * from room_tb where room_type_id=$roomtypeId ");




        /*foreach($rm_ids as $rm_id){
            $r=$rm_id['id'];
            $rname=$rm_id['room_name'];

              $rms = DB::query("select check_in_date,check_out_date,booking_status from booked_rooms_v where room_id=$r && check_out_date>='$today' && booking_status != 'cancelled' && booking_id !=$booking_id order by check_in_date");

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

                array_push($availableRooms, $rm_id['id']);
            }

        }*/

         $freerooms = array();
        foreach($rm_ids as $rm_id){
            $r=$rm_id['id'];
            $rname=$rm_id['room_name'];
            $rstatus=$rm_id['room_status'];
            $rstart_date=$rm_id['start_date'];
            $rend_date=$rm_id['end_date'];

            $rend_date=date_create($rend_date);
             date_add($rend_date,date_interval_create_from_date_string("1 day"));
             $rend_date = date_format($rend_date,"Y-m-d");

              $rms = DB::query("select check_in_date,check_out_date,booking_status from booked_rooms_v where room_id=$r && check_out_date>='$today' && booking_status != 'cancelled' && booking_status != 'deleted' order by check_in_date");

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

              if($rstatus=="broken"){
                 
                if($rstart_date <= $check_in && $rend_date >=$check_out){
                      $status='5';

                 }
                 //echo $rstart_date."<=".$check_in." ,". $rend_date.">=".$check_out."  ". $status." 1:</br>";
                  
             }
            if($status=='free'){
                array_push( $availableRooms,$rm_id["id"]);//$rm_id['id']
            }




//
        }


    }

     $bookedRooms = DB::query("SELECT room_id FROM booking_rooms_tb WHERE  booking_id=%l", $booking_id);

    $result=1;
    foreach($bookedRooms as $b){
        $id=$b['room_id'];
        //echo $id;//in_array($id,$freerooms);
        if(in_array($id,$availableRooms)){
            
        }else{

          $result=0;

        }
    }

    if($result==1){
       $t= DB::update("booking_tb", array("check_in_date"=>$check_in,"check_out_date"=> $check_out), "id=%i", $booking_id);

    }
        echo $result;
         // echo json_encode($availableRooms);
          // echo json_encode($bookedRooms);



}
function change_free_rooms(){
    /*available rooms for new reservation*/

    global $company_id;
    $property_id_ = $_POST['property_id'];

    //get all room types


     $s = new WhereClause('and');
    $s -> add("company_id = %i", $company_id);
    if($property_id_!=0){
      $s -> add("property_id = %i", $property_id_);
    }



    if(isset($_POST['room_type_id']) && $_POST['room_type_id'] !="0"){
        $room_type_id = $_POST['room_type_id'];
          $s -> add("id = %i", $room_type_id);

    }

     $roomtypes = DB::query("SELECT * FROM room_types_tb WHERE  %s", $s);

    $bId=$_POST['booking_id'];
    $booking = DB::queryFirstRow("SELECT * FROM booking_tb WHERE id=%l",$bId);

    $check_in = /*"2017-07-8";//*/date('Y-m-d', strtotime($booking['check_in_date']));
    $check_out = /*"2017-07-30";//*/date('Y-m-d', strtotime($booking['check_out_date']));

  //echo $check_out ;
    $availableRooms = array();

    /*fixing the dates  */

    foreach($roomtypes as $roomtype){

        $roomtypearray = array();
        $roomtypeId = $roomtype['id'];



        //get free rooms


        $today = date("Y-m-d");
        //booking status missing

//
         $rm_ids = DB::query("select * from room_tb where room_type_id='$roomtypeId' ");


        $freerooms = array();
        foreach($rm_ids as $rm_id){
            $r=$rm_id['id'];
            $rname=$rm_id['room_name'];
            $rstatus=$rm_id['room_status'];
            $rstart_date=$rm_id['start_date'];
            $rend_date=$rm_id['end_date'];

            $rend_date=date_create($rend_date);
             date_add($rend_date,date_interval_create_from_date_string("1 day"));
             $rend_date = date_format($rend_date,"Y-m-d");

              $rms = DB::query("select check_in_date,check_out_date,booking_status from booked_rooms_v where room_id=$r && check_out_date>='$today' && booking_status != 'cancelled' && booking_status != 'deleted' order by check_in_date");

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

              if($rstatus=="broken"){
                 
                if($rstart_date <= $check_in && $rend_date >=$check_out){
                      $status='5';

                 }
                 //echo $rstart_date."<=".$check_in." ,". $rend_date.">=".$check_out."  ". $status." 1:</br>";
                  
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



        //add to main array
        if(sizeof($rooms) > 0){
         array_push($availableRooms, $roomtypearray);
        }
    }

    echo json_encode($availableRooms);

}
function get_free_rooms(){
    /*available rooms for new reservation*/

    global $company_id;
    $property_id_ = $_POST['property_id'];

    //get all room types


     $s = new WhereClause('and');
    $s -> add("company_id = %i", $company_id);
    if(!$property_id_==0){
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

       
        $rm_used=str_replace(array('[',']'),'',$roomtype['used_as']);
        
        if(preg_match('/\\d/',$rm_used)>0){ 
            
             $roomtypearray ["used_as"] = DB::query("SELECT * FROM room_types_tb WHERE  id IN (".$rm_used.")");
        }else{

            $roomtypearray ["used_as"] ="";
        }

        $roomtypearray["specifications"] = $roomtype['specifications'];
        $roomtypearray["property_id"] = $roomtype['property_id'];
        $roomtypearray["property_name"] = getPropertyName($roomtype['property_id']);


        //get free rooms


        $today = date("Y-m-d");
        //booking status missing

//
         $rm_ids = DB::query("select id,room_name,room_status,start_date,end_date from room_tb where room_type_id=$roomtypeId ");
         //AND room_status !='broken'




         $freerooms = array();
        foreach($rm_ids as $rm_id){
            $r=$rm_id['id'];
            $rname=$rm_id['room_name'];
            $rstatus=$rm_id['room_status'];
            $rstart_date=$rm_id['start_date'];
            $rend_date=$rm_id['end_date'];

            $rend_date=date_create($rend_date);
             date_add($rend_date,date_interval_create_from_date_string("1 day"));
             $rend_date = date_format($rend_date,"Y-m-d");
             $rms = array();
             if(strtotime($check_out) <= strtotime($today)){
               $rms = DB::query("select check_in_date,check_out_date,booking_status from booked_rooms_v where room_id=$r && check_out_date <= '$today' && booking_status != 'cancelled' && booking_status != 'deleted' order by check_in_date");
             }else{
                           $rms = DB::query("select check_in_date,check_out_date,booking_status from booked_rooms_v where room_id=$r && check_out_date>='$today' && booking_status != 'cancelled' && booking_status != 'deleted' order by check_in_date");
             }
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

              if($rstatus=="broken"){
                 
                if($rstart_date <= $check_in && $rend_date >=$check_out){
                      $status='5';

                 }
                 //echo $rstart_date."<=".$check_in." ,". $rend_date.">=".$check_out."  ". $status." 1:</br>";
                  
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
        $prices = array(array("cat"=>'guest',"id"=>"0", "label"=>"Rack Rate", "amount"=>$roomtypePrice));

        foreach($roomprices as $price){
            $p = array();

            $p['cat']='guest';
            $p['id']=$price['price_id'];
            $p['label']=strtoupper($price['price_label']);
            $p['amount']=$price['value'];
            array_push($prices, $p);
        }
         $agentroomprices = DB::query("SELECT * FROM agent_price_rates_v WHERE room_type_id=%s",$roomtypeId);

        foreach($agentroomprices as $price){
            $p = array();

            $p['cat']=$price['agent_id'];
            $p['id']=$price['agent_id'];
            $p['label']= 'Agent - '.strtoupper($price['agent_name']).' ($'. round($price['agent_price'], 1).')';
            $p['amount']= round($price['agent_price'],1);
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

function get_seasons(){
    global $company_id;
    $property_id=$_POST['property_id'];

    $high_array =DB::query("SELECT * FROM seasons_tb WHERE company_id=%s AND property_id=%i AND season=%s ", $company_id,$property_id,"high" );
    $low_array =DB::query("SELECT * FROM seasons_tb WHERE company_id=%s AND property_id=%i AND season=%s ", $company_id,$property_id,"low" );

    echo json_encode(array("high"=>$high_array,"low"=>$low_array));

    //return array("high"=>$high_array,"low"=>$low_array);

}
function get_company_properties(){
    global $company_id;
    echo json_encode(DB::query("SELECT * FROM property_tb WHERE company_id=%s", $company_id));

}
function getInvoice(){
      global $company_id;
//     $id=$_POST['id'];

     echo json_encode(DB::query("SELECT * FROM invoice_template_tb WHERE company_id=%i", $company_id));
 }
function  getTemplate(){
      global $company_id;


    $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
     if(isset($_POST['id'])){
         $id=$_POST['id'];
    $where->add("id= %s", $id);
    }

    if(isset($_POST['template_type'])){
         $template_type=$_POST['template_type'];
    $where->add("template_type= %s", $template_type);
    }


     echo json_encode(DB::query("SELECT * FROM email_notification_template_tb WHERE %l ", $where));
 }
function getInvoiceTemp(){
      global $company_id;
     $id=$_POST['id'];

    $policy = DB::queryFirstRow("SELECT policy FROM hotel_policy_tb WHERE company_id=%i", $company_id);
    $inv= DB::query("SELECT * FROM invoice_template_v WHERE company_id=%i", $company_id);

    $invoice=array();


    foreach($inv as $i){
        $i['due_date']=date('d M Y', strtotime(" + $i[due_date] days "));
        $i['policy']=$policy['policy'];
        array_push($invoice, $i);
    }


   echo json_encode($invoice);

 }
function get_room_types(){
    global $company_id;
    $property_id = $_POST['property_id'];
     echo json_encode(DB::query("SELECT * FROM room_types_tb WHERE property_id=%i", $property_id));

}

function get_room_type(){
    global $company_id;
    $id = $_POST['room_type_id'];
     echo json_encode(DB::queryFirstRow("SELECT * FROM room_types_tb WHERE id=%i", $id));

}

function get_agents(){
    global $company_id;
     echo json_encode(DB::query("SELECT * FROM agent_tb WHERE company_id=%i", $company_id));

}
function get_extras(){
    global $company_id;
     echo json_encode(DB::query("SELECT * FROM extras_tb WHERE company_id=%i", $company_id));

}
function get_one_reservations(){
    //echo "8";
    global $company_id;
    $response = array();


    $booking_id = $_POST['booking_id'];
   // $rt_id = $_POST['room_type_id'];

    $where = new WhereClause('and');
    $where -> add("id = %s", $booking_id);






    $bookings = DB::query("SELECT * FROM booking_tb WHERE %l",$where);

     foreach($bookings as $b){
        $booking = array();
        $id = $b['id'];
        //if(!is_null($id)){
         $guests = DB::query("select * from guests_tb where booking_id=%s", $id);
         $payment = DB::query("select * from booking_payment where booking_id=%s", $id);
         $extras = DB::query("select * from booked_extras_v where booking_id=%s", $id);
         $rooms = DB::query("select * from booked_rooms_v where booking_id=%s", $id);
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
         
   
        ///}

        array_push($response, $booking);
    }
    echo json_encode($response);



}


function get_reservations(){
    //echo "8";
    global $company_id;
    $response = array();

    $filter = $_POST['filter'];
    $p_id = $_POST['property_id'];
   // $rt_id = $_POST['room_type_id'];

    $where = new WhereClause('and');
    $where -> add("company_id = %s", $company_id);
     if(!$p_id==0){
     $where -> add("property_id = %i", $p_id);
    }

//    $where -> add("room_type_id = %i", $rt_id);
    $today = "";

    switch($filter){
        case "today":
            $t = date('Y-m-d');
            $where -> add("DATE(booking_date) = %s", $t);
            $where->add("booking_status != 'deleted'");
            break;
        case "cancelled":
             $where -> add("booking_status = %s", 'cancelled');

            break;
        case "confirmed":
             $where -> add("booking_status = %s", 'confirmed');

            break;
        case "unconfirmed":
             $where -> add("booking_status = %s", 'unconfirmed');

            break;
        case "check-in":
             $where -> add("booking_status = %s", 'check-in');

            break;
        case "deleted":
             $where -> add("booking_status = %s", 'deleted');
            break;
        case "all":
             $where -> add("booking_status != %s", 'deleted');
            break;
        
        case "check_in_today":
//            echo 9;
            $today = date("Y-m-d");
            $where -> add("DATE(check_in_date)=DATE(%s)", $today);
            $s=$where->addClause("or");
            $s -> add("booking_status=%s", "confirmed");
            $s -> add("booking_status=%s", "check-in");
            break;
            
        case "in_house_guests":
             $today = date("Y-m-d");
           $where -> add("DATE(check_in_date)<=DATE(%s)", $today);
            $where -> add("DATE(check_out_date)>=DATE(%s)", $today);
            $s=$where->addClause("or");
            $s -> add("booking_status=%s", "confirmed");
            $s -> add("booking_status=%s", "check-in");
            break;
    }


    $bookings = DB::query("SELECT * FROM booking_tb WHERE %l ORDER BY  id DESC",$where);
     $room_types=DB::query("SELECT * FROM room_types_tb WHERE company_id=%i", $company_id);

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
            //$b['agent_id']
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
            $booking["room_types"]=$room_types;

            $booking["extra_beds"]=$b['extra_beds'];

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
            $booking["internal_comments"] = $b['comments'];
            $booking["no_guests"] = $b['no_guests'];
            $booking["status"] = $b['booking_status'];
            $booking["agent"] = $agent;
 
            ///new added by ibra
            $booking["children_rates"] = $b['children_rates'];
            // $booking["extra_beds"] = array();

        ///}

        array_push($response, $booking);
    }
    echo json_encode($response);


}


function get_invoices(){
    //echo "8";
    global $company_id;
    $response = array();

    $filter = $_POST['filter'];
    $p_id = $_POST['property_id'];
   // $rt_id = $_POST['room_type_id'];

    $where = new WhereClause('and');
    $where -> add("company_id = %s", $company_id);
     if(!$p_id==0){
     $where -> add("property_id = %i", $p_id);
    }

//    $where -> add("room_type_id = %i", $rt_id);
    $today = "";

    switch($filter){
        
        case "all":
              $where -> add("booking_status = %s", 'confirmed');
            break;
        
    }


    $bookings = DB::query("SELECT * FROM booking_tb WHERE %l ORDER BY  id DESC",$where);
     $room_types=DB::query("SELECT * FROM room_types_tb WHERE company_id=%i", $company_id);

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
            //$b['agent_id']
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
            $booking["room_types"]=$room_types;

            $booking["extra_beds"]=$b['extra_beds'];

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
            $booking["internal_comments"] = $b['comments'];
            $booking["no_guests"] = $b['no_guests'];
            $booking["status"] = $b['booking_status'];
            $booking["agent"] = $agent;
 
            ///new added by ibra
            $booking["children_rates"] = $b['children_rates'];
            // $booking["extra_beds"] = array();

        ///}

        array_push($response, $booking);
    }
    echo json_encode($response);


}



function getBooking(){
    
    global $company_id;
    $id = $_POST['booking_id'];
    $where = new WhereClause('and');
    $where->add("id=%i", $id);
    
    $b = DB::queryFirstRow("SELECT * FROM booking_tb WHERE %l ORDER BY  id DESC",$where);
    $room_types=DB::query("SELECT * FROM room_types_tb WHERE company_id=%i", $company_id);

    
        $booking = array();
        $id = $b['id'];
        //if(!is_null($id)){
         $guests = DB::query("select * from guests_tb where booking_id=%i", $id);
         $payment = DB::query("select * from booking_payment where booking_id=%i", $id);

         $extras = DB::query("select * from booked_extras_v where booking_id=%i", $id);
         $rooms = DB::query("select * from booked_rooms_v where booking_id=%i", $id);

        

         $agent_id=$b['agent_id'];
         $agent = DB::queryFirstRow("select * from agent_tb where id=%i",$agent_id );
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
            $booking["room_types"]=$room_types;

            $booking["extra_beds"]=$b['extra_beds'];

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
            $booking["internal_comments"] = $b['comments'];
            $booking["no_guests"] = $b['no_guests'];
            $booking["status"] = $b['booking_status'];
            $booking["agent"] = $agent;
 
            ///new added by ibra
            $booking["children_rates"] = $b['children_rates'];
            // $booking["extra_beds"] = array();

    
    echo json_encode($booking);

}




 function getChartData(){
    /*room chart*/
    global $company_id;
    $pid = $_POST['property_id'];
    $response = array();


  $where=new WhereClause("and");
      $where->add("company_id=%s",$company_id);
  if(!$pid==0){
     $where->add("property_id=%s",$pid);
    }
     //get all roomtypes for property
    $roomtype = DB::query("SELECT * FROM room_types_tb WHERE %l", $where);
    foreach($roomtype as $rt){
        $roomTypeArray = array();
        $roomTypeArray['room_type_name'] = $rt['name'];
        $roomTypeArray['rooms'] = array();

        $rooms = DB::query("SELECT * FROM room_tb WHERE room_type_id = %s", $rt['id']);
        foreach($rooms as $r){
            /*get all dates on which this room has been booked*/
            $dates = DB::query("SELECT * FROM booked_rooms_v WHERE room_id = %s  && booking_status != 'cancelled'&& booking_status != 'deleted'", $r['id']);
            $roomsArray =  array();

            $roomsArray['room'] = $r['room_name'];
            $roomsArray['dates'] = array();


            foreach($dates as $d){
                $datesArray = array();
               
                $rend_date= date('Y-m-d', strtotime('-1 day', strtotime($d['check_out_date'])));
                $nights = round((strtotime($d['check_out_date']) - strtotime( $rend_date))/3600/24);
                $datesArray['checkIn'] = $d['check_in_date'];
                $datesArray['checkOut'] = $d['check_out_date'];
                $datesArray['nights'] = $nights;
                $datesArray['name'] = get_booking_source($d['booking_id'], "", $d['agent_id']);
                $datesArray['status'] = $d['booking_status'];
                $datesArray['booking_id'] = $d['booking_id'];

               array_push($roomsArray['dates'], $datesArray);

            }

            array_push($roomTypeArray['rooms'], $roomsArray);

        }

        array_push($response, $roomTypeArray);
    }

    echo json_encode($response);

}


function getChartData_freeRooms(){
    /*available rooms for new reservation*/

    global $company_id;
    $property_id_ = $_POST['property_id'];

     $dates = json_decode($_POST['dates'], true);

    //get all room types


     $s = new WhereClause('and');
    $s -> add("company_id = %i", $company_id);
    if(!$property_id_==0){
      $s -> add("property_id = %i", $property_id_);
    }



    if(isset($_POST['room_type_id']) && $_POST['room_type_id'] !="0"){
        $room_type_id = $_POST['room_type_id'];
          $s -> add("id = %i", $room_type_id);

    }

     $roomtypes = DB::query("SELECT * FROM room_types_tb WHERE  %s", $s);

//

//    $check_in = "2018-05-05";//*/ //date('Y-m-d', strtotime($_POST['check_in']));
//    $check_out = "2018-06-06";//*/ //date('Y-m-d', strtotime($_POST['check_out']));

    $availableRooms = array();

    /*fixing the dates  */

    foreach($roomtypes as $roomtype){

        $roomtypearray = array();
        $roomtypeId = $roomtype['id'];

        $roomtypearray ["name"] = $roomtype['name'];


        //get free rooms


        $today = date("Y-m-d");
        //booking status missing

//
         $rm_ids = DB::query("select id,room_name,room_status,start_date,end_date from room_tb where room_type_id=$roomtypeId ");


        $freeroomsdates = array();
        foreach($dates as $onedate){
           $onedate= date('Y-m-d', strtotime($onedate));
         $freerooms = array();
        foreach($rm_ids as $rm_id){
            $r=$rm_id['id'];
            $rname=$rm_id['room_name'];
            $rstatus=$rm_id['room_status'];
            $rstart_date=$rm_id['start_date'];
            $rend_date=$rm_id['end_date'];

             $rend_date=date_create($rend_date);
             date_add($rend_date,date_interval_create_from_date_string("1 day"));
             $rend_date = date_format($rend_date,"Y-m-d");

              $rms = DB::query("select check_in_date,check_out_date,booking_status from booked_rooms_v where room_id=$r && booking_status != 'cancelled' && booking_status != 'deleted' order by check_in_date");

            $status='free';
             foreach($rms as $rm){
                 $check_in_db=$rm['check_in_date'];
                 $check_out_db=$rm['check_out_date'];
                 if($check_in_db<= $onedate && $check_out_db >$onedate){
                      $status='3';
                 }else if($check_in_db== $onedate){
                      $status='4';
                 }


             }

             if($rstatus=="broken"){
              
                if($rstart_date <= $onedate && $rend_date >$onedate){
                      $status='5';
                 }else if($rstart_date== $onedate){
                      $status='6';
                 }
                  
             }
            if($status=='free'){
                array_push( $freerooms,$rm_id);
            }

        }
      array_push( $freeroomsdates,json_encode(count($freerooms)));

        }
        $roomtypearray["rooms"] = $freeroomsdates;

        //add to main array
//        if(sizeof($rooms) > 0){
         array_push($availableRooms, $roomtypearray);
//        }
    }

    echo json_encode($availableRooms);

    //echo $check_in." - ".$check_out;
}






function getPricesData(){
    global $company_id;
   $property_id =$_POST['property_id'];


   $response = array();

    $prices = DB::query("SELECT * FROM price_rates_tb WHERE company_id = %i AND property_id =%i ORDER BY id DESC", $company_id, $property_id);
    foreach($prices as $p){

        $where = new WhereClause('and');
        $where -> add("company_id = %i", $company_id);
        $where -> add("property_id = %i", $property_id);
        $where -> add("price_rate_id = %i", $p['id']);

         $pricesArray = array();
         $pricesArray['id']=$p['id'];
         $pricesArray['price_name']= strtoupper($p['price_name']);
         $pricesArray['description']=$p['description'];
         $pricesArray['start_date']=$p['start_date'];
         $pricesArray['end_date']=$p['end_date'];
         $pricesArray['date_created']= date("d M Y", strtotime($p['date_created']));
         $pricesArray['prices'] = array();
         $pricesArray['prices'] = DB::query("SELECT * FROM room_price_rate_v WHERE %l", $where);

         array_push($response, $pricesArray);
    }

    echo json_encode($response);
}

function getStandardPricesData(){
    global $company_id;
    $property_id =$_POST['property_id'];


   $response = array();

    $prices = DB::query("SELECT * FROM  room_types_tb WHERE company_id = %i AND  property_id=%i ", $company_id,$property_id);


    echo json_encode($prices);
}

function getAllRooms(){
    global $company_id;
//  global $property_id;

    $property_id = $_POST['property_id'];
    $rt_id = $_POST['room_type_id'];

    $where = new WhereClause('and');
    $where -> add("company_id = %i", $company_id);
    if(!$property_id==0){
      $where -> add("property_id = %i", $property_id);
    }


    if($rt_id != "0"){

          $where -> add("id = %i", $rt_id);

    }
    $roomtypes = DB::query("SELECT * FROM room_types_tb WHERE %l", $where);
    $rooms = array();
    foreach($roomtypes as $rt){

        $room = array();
        $room['room_type_id'] = $rt['id'];
        $room['room_type_name'] = $rt['name'];
        $room['room_count'] = 1;
        $room['rooms'] = array();

        $roomsarray = DB::query("SELECT * FROM room_tb WHERE room_type_id = %i", $rt['id']);

        foreach($roomsarray as $a){
            $r = array();
            $r['id'] = $a['id'];
            $r['name'] = $a['room_name'];
            $r['status'] = $a['room_status'];
             $r['occupied'] = getOccupied($a['id']);
            $r['start_date'] = $a['start_date'];
            $r['end_date'] = $a['end_date'];
            if($r['status']=='broken'){
             
             $date=date_create($a['end_date']);
             date_add($date,date_interval_create_from_date_string("1 day"));
            $r['next_date'] = date_format($date,"D, d M Y");

            }else{

           
            $r['next_date'] = getNextDate($a['id']);
            }
           
           
            array_push($room['rooms'], $r);
        }

       // $room['rooms'] = array(array("name"=>"A", "status"=>"okay", "occupied"=>"no", "next_date"=>"5 July 2017"));

        array_push($rooms, $room);
    }

    echo json_encode($rooms);
}



function getPropertyName($id){
    $p = DB::query("SELECT * FROM property_tb WHERE id = %i", $id);
    return $p[0]['property_name'];
}


function getOccupied($room_id){
    /*check if room is booked with in today */

    $today = date('Y-m-d');
    $w = new WhereClause('and');
    $w -> add("room_id=%i", $room_id);
    $w -> add("DATE(check_in_date) <= DATE(%s)", $today);
    $w -> add("DATE(check_out_date) >= DATE(%s)", $today);
    $w->add("booking_status != 'cancelled' && booking_status != 'deleted'");

    $s = $w->addClause('or');
    $s -> add("booking_status = %s", 'confirmed');
    $s -> add("booking_status = %s", 'check-in');

    $c = DB::query("SELECT * FROM booked_rooms_v WHERE %l", $w);
    return count($c) > 0 ? "yes" : "no";
}

function getNextDate($room_id){
    /*date when room is occupied next*/

    $today = date('Y-m-d');
    $w = new WhereClause('and');
    $w -> add("room_id=%i", $room_id);
    $w -> add("DATE(check_in_date) > DATE(%s)", $today);
    $w->add("booking_status != 'cancelled' && booking_status != 'deleted'");


    $s = $w->addClause('or');
    $s -> add("booking_status = %s", 'confirmed');
    $s -> add("booking_status = %s", 'check-in');

    $nextDate = "---";

    $c = DB::query("SELECT * FROM booked_rooms_v WHERE %l LIMIT 1", $w);
    if(count($c) > 0){
    $nextDate = date("D, d M Y", strtotime($c[0]['check_in_date']));
    }

    return $nextDate;
}

/* Wed 9/May/2018 */
function getAgentBookings(){
    $agent_id = $_POST['id'];
    $bookings = DB::query("select * from booking_tb where agent_id = %i order by booking_date desc", $agent_id);
    $arr = array();
    foreach ($bookings as $booking) {
      $booking['beautiful_date'] = date("d M Y", strtotime($booking['booking_date']));
      array_push($arr, $booking);
    }
    echo json_encode($arr);
}


?>

