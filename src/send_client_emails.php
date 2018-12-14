<?php 
require_once 'config.php';

global $company_id;
global $user_id;
$booking_id = $_POST['booking_id'];

//get company details
$result = DB::queryFirstRow("SELECT  * FROM company_tb WHERE id=%i", $company_id);
$company_name=$result["company_name"];
$company_email=$result["email"];
$company_logo=$result["logo"];
$company_address=$result["address"];
$company_phone=$result["phone"];
//$company_email=$result["email"];

//get guest details
$result_got = DB::queryFirstRow("SELECT name, email FROM guests_tb WHERE booking_id=%i", $booking_id);
$guest_name=$result_got["name"];
$guest_email=$result_got["email"];



//$mail = new PHPMailer;

//From email address and name
//$mail->From = $company_email;
//$mail->FromName = $company_name;

//to address and Name
$receiver_email = $_POST['receiver_email'];
//$guest_name = $_POST[''];
//$mail->addAddress($receiver_mail, $guest_name);

//Cc Company email
//$mail->addCC($company_email, $company_name);
//$mail->addBCC($company_email, $company_name);

//Address to which recepient should reply
//$mail ->addReplyTo($company_email, "Reply");

//send mail
//$mail->isHTML(true);

//$mail->Subject=$_POST['subject'];;
$subject=$_POST['subject'];;

$body = $_POST['body'];

if(isset($_POST['should_attach_invoice'])&& $_POST['should_attach_invoice']=="yes"){
   //add invoice link to body
   $invoice  = "<br><br><p><a href='https://app.roomzetu.com/invoice/$booking_id' style='padding:8px 20px;border:1px solid #aaa;border-radius:4px;'><img src='https://app.roomzetu.com/img/pdf.png'/> INVOICE</a></p>";

   $body.=$invoice;
}
//$mail->Body=$body;

    $message =  makeEmail($body,$company_name, $company_email, $company_phone, $company_logo, $company_address);

    $headers = 'From: '.$company_name.' <'.$company_email.'> '."\r\n"; 
    $headers .= 'Reply-to: noreply'."\r\n";  
    $headers  .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


     

if( mail($receiver_email, $subject, $message, $headers)){
    echo "Mail Not Sent - There is an error";
}
else{
    echo "Email successfully Sent";
}

//print_r($message);
?>
