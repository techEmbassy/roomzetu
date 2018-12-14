<?php 
require_once 'config.php';

global $company_id;
// get company details
$result = DB::queryFirstRow("SELECT company_name, email FROM company_tb WHERE id=%i", $company_id);
$company_name=$result[company_name];
$company_email=$result[email];

//get template body   
$temp_id = (isset($_GET['temp_id']) ? $_GET['temp_id'] : "0");  
     $template1= DB::queryFirstRow("SELECT template_body FROM email_notification_template_tb WHERE company_id=%i AND id=%i ", $company_id, $temp_id);
$template=$template1[template_body];


$booking_status=  (isset($_GET['booking_status']) ? $_GET['booking_status'] : "");
$check_in_date=  (isset($_GET['check_in_date']) ? $_GET['check_in_date'] : "");
$check_out_date= (isset($_GET['check_out_date']) ? $_GET['check_out_date'] : "");
$cost=  (isset($_GET['cost']) ? $_GET['cost'] : "");
$booking_date=  (isset($_GET['booking_date']) ? $_GET['booking_date'] : "");
$guest_name= (isset($_GET['guest_name']) ? $_GET['guest_name'] : "");
$guest_no=  (isset($_GET['guest_no']) ? $_GET['guest_no'] : "");
$guest_email= (isset($_GET['guest_email']) ? $_GET['guest_email'] : "");
$room_type= (isset($_GET['room_type']) ? $_GET['room_type'] : "");




 $cell1='width:200px; padding:5px;font-weight:bold;border:1px solid #AAA';
$cell2='width:300px; padding:5px;border:1px solid #AAA; border-left:none';
                    

                    //send mails here.
                        //to admin
                        $headers = 'From: '.$company_name.' <'.$company_email.'> '."\r\n";  
                        $headers .= 'Reply-to: '. $company_name.' <'.$company_email.'> '."\r\n";  
                        $headers  .= 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 

                        
                        $admin_body = "<html><body>";
                        

                       $admin_body .= "<p>Hey $guest_name,</p></br>";

$tt="";
    if(isset($_GET['email_type'])){
        $subject= $company_name.': RESERVATION DETAILS';
         $admin_body .= "<p>  Thank you for choosing to stay with us at <b>$company_name</b>. The following are details of your reservation:</p></br>";
        $totalPaid=$_GET['totalPaid'];
        $balance=$_GET['balance'];
        
       $tt= "<tr><td style='$cell1'>Total Paid</td><td style='$cell2'>$totalPaid</td></tr><tr><td style='$cell1'>Balance</td><td style='$cell2'>$balance</td></tr>";
    }
       else{
        $subject= $company_name.': RESERVATION CONFIRMATION';
         $admin_body .= "<p>  Thank you for booking with us at <b>$company_name</b>. </br> We look forward to hosting you and below are the details for your reservation:</p></br>";
    }


  $admin_body .=  $template;
                      
                       
                        $admin_body .= "<br><table>";

                      
//                        $admin_body .= "<tr><td style='$cell1'>Confirmation Number:</td><td style='$cell2'>$booking_id</td></tr>"; 
                        $admin_body .= "<tr><td style='$cell1'>Reservation Status:</td><td style='$cell2'>$booking_status</td></tr>"; 
                        $admin_body .= "<tr><td style='$cell1'>Name</td><td style='$cell2'>$guest_name</td></tr>"; 
                        $admin_body .= "<tr><td style='$cell1'>Number of Guests</td><td style='$cell2'>$guest_no</td></tr>"; 
                        $admin_body .= "<tr><td style='$cell1'>Accommodations</td><td style='$cell2'>$room_type</td></tr>";
                        $admin_body .= "<tr><td style='$cell1'>Cost</td><td style='$cell2'>$cost</td></tr>$tt";
                        $admin_body .= "<tr><td style='$cell1'>Booking_date</td><td style='$cell2'>$booking_date</td></tr>";
                        $admin_body .= "<tr><td style='$cell1'>Check-in date</td><td style='$cell2'>$check_in_date</td></tr>";
                        $admin_body .= "<tr><td style='$cell1'>Check-out date</td><td style='$cell2'>$check_out_date</td></tr>";
                        
                      
                        $admin_body .= "</table>";
$admin_body .= "<p>Yours sincerely,</p>";
$admin_body .= "<p></p>";
$admin_body .= "<p>$company_name</p>";
$admin_body .= "<hr>";
$admin_body .= "<p>Sent from <a href='http://www.roomzetu.com'>Roomzetu PRM</a> - Powered by Lacel Technologies Ltd</p>";
                     

                        $admin_body .= "</html></body>";
                        
                      //echo $admin_body;

                         
                  if(mail($guest_email,  $subject, $admin_body, $headers))
                  {
    echo "success";
}

//                    
                          
//      echo "Message accepted";              
            
        ?>
