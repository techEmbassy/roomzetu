<?php 

require_once 'config.php';

switch($_POST['page']){

case 'signup':
    
    $data = $_POST['result'];
    $tablname = "users_tb";


    $obj = json_decode($data);
    DB::query("SELECT * FROM {$tablname} WHERE email=%s",  $obj->email);
    $counter = DB::count();
    if($counter==0){

    $data = json_decode($data, TRUE);

    $data['password']=sha1($obj->password);
    
    $data= json_encode($data);
    echo save_data($tablname, $data);
     
    }else{

        $result=DB::query("SELECT * FROM {$tablname} WHERE email=%s AND company_id=%i",  $obj->email,0);
        $counter1 = DB::count();
   
       if($counter1){
         
         DB::update($tablname, array('password' => $obj->password ), "id=%?", $result[0]['id']);

         echo $result[0]['id'];//

        }else{

           echo 0;///email already in use
        }
    }

    
    
    break;

case 'company-signup':
    
    $user_id=$_POST['user_id'];
    $data = $_POST['result'];
    $tablname = "company_tb";
    $tablname2 = "users_tb";
     $time_zone="timezone";   

        
     $data = json_decode($data, TRUE);

    $data= $data+array( 'billing_plan'=>1,'expiry_date' => date('Y-m-d H:i:s', strtotime('+14 day')));
    $data= json_encode($data);   
        
        
    $res=DB::query("SELECT * FROM {$tablname2} WHERE id=%s",  $user_id);
    $counter = DB::count();

    if($counter){//user_id exists
    
   //$data = json_decode($data, TRUE);

    $obj = json_decode($data);

    DB::query("SELECT * FROM {$tablname} WHERE email=%s",  $obj->email);
    $counter2 = DB::count();


    if($counter2==0){//company_email  unique

    DB::query("SELECT * FROM {$tablname2} WHERE id = %i AND company_id = %i", $user_id,0);
    $counter3 = DB::count();    

    if($counter3){//company is not yet assined to user  

    $company_id=save_data($tablname, $data);
        
        
     $property_data= array('property_name'=>'Main_property',
                            'company_id'=>$company_id,
                           'country'=>$obj->country,
                           'address'=>$obj->address,
                           'email'=>$obj->email,
                           'phone'=>$obj->phone,
                           'manager_id'=> $user_id,
                           'time_zone'=>$time_zone,
                           'main'=>'yes'
                          );   
    
    $property_id=save_data('property_tb', json_encode($property_data));
        
         $currency_data= array(
                            'company_id'=>$company_id,
                            'currency'=>'US Dollars',
                           'symbol'=>'$',
                           'iso'=>'USD',
                           'rate'=>'1'
                           
                          );   
    
    $currency_id=save_data('currency_tb', json_encode($currency_data));
    
               $invoice_data= array(
                            'company_id'=>$company_id
                          
                          );   
    
    $invoice_id=save_data('invoice_template_tb', json_encode($invoice_data));
    
         $hotel_policy= array(
                            'company_id'=>$company_id,
                          // 'user_id'=> $user_id,
            // 'property_id'=>$property_id,
             'holding_period'=>7,
             'policy'=>''
                           
                          );
        $hotel_policy_id=save_data('hotel_policy_tb', json_encode($hotel_policy));
   
    DB::update($tablname2, array('company_id' =>$company_id ), "id=%?", $user_id);

    session_start();
    $_SESSION['login']["user_id"]= $user_id;
    $_SESSION['login']["company_id"]= $company_id;
    $_SESSION['login']["user_name"]= $res[0]['name'];
    $_SESSION['login']["role"]= $res[0]['role'];
     $_SESSION['login']["property_id"]=0;

    $_SESSION['flag']["first_time"]= 1;
    
    echo 1;
    
    
    $data = json_decode($data, TRUE);
    $company_name=$data['company_name'];
    $email=$data['email'];
    $phone=$data['phone'];
    $website=$data['website'];
    $country=$data['country'];
    $address=$data['address'];
    
    

    $u_name=$res[0]['name'];
    $u_email=$res[0]['email'];

    $subject="Roomzetu Account Registration";
    //            $message="<html><body style='background-color:#eee;'><br><div style='widith:500px; margin:auto; background-color:white; padding:20px;'>";
    $message="<p><strong>Dear ".$u_name.",</strong><br> Thank You for signing up. </p>";

    $message.="<p>We are absolutely thrilled that you have decided to create an account with Roomzetu, We just want you to know that if you ever need to contact us, feel free to do so at<br> support@laceltech.com </p>";

    $message.="<p>To get started login and create properties, roomtypes, respective rooms, rates and policies before you can make reservations. </p>";



    //             $message.="<p>The Lacel team<br> https://www.roomzetu.com</p><hr>";
    //            
    //            
    //            $message.="</div></body></html>";

    $message =  makeGenericEmail($message);

    $headers = 'From: Roomzetu <support@laceltech.com> '."\r\n"; 
    $headers .= 'Reply-to: noreply'."\r\n";  
    $headers  .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


    mail($u_email.','.$email, $subject, $message, $headers);  
    
        $subject1="New Account created";
        $message1="<html><body style='background-color:#eee;'><br><div style='widith:500px; margin:auto; background-color:white; padding:20px;'>";
        $message1.="<p>A new account has been created with the following details <hr></p>";

        $cell1='width:200px; padding:5px;font-weight:bold;border:0px solid #AAA';
        $cell2='width:300px; padding:5px;border:0px solid #AAA; border-left:none';



        $message1.= "<table>";

        $message1.="<tr><td  style='$cell1'>Name:</td><td  style='$cell2'>$u_name</td></tr>";
        $message1.="<tr><td  style='$cell1'>Company Name:</td><td  style='$cell2'>$company_name</td></tr>"; 
        $message1.="<tr><td  style='$cell1'>Company Email:</td><td  style='$cell2'>$email</td></tr>";     
        $message1.="<tr><td  style='$cell1'>Company Phone:</td><td  style='$cell2'>$phone</td></tr>"; 
        $message1.="<tr><td  style='$cell1'>Company website:</td><td  style='$cell2'>$website</td></tr>"; 
        $message1.="<tr><td  style='$cell1'>Company Address:</td><td  style='$cell2'>$address</td></tr>"; 
        $message1.="<tr><td  style='$cell1'>Country:</td><td  style='$cell2'>$country</td></tr>"; 

        $message1.= "</table>";
        $message1.= "<p>The lacel Team</p>";


        $message1.="</div></body></html>";

        $headers = 'From: Roomzetu Website  '."\r\n"; 
        $headers1 .= 'Reply-to: noreply'."\r\n";  
        $headers1  .= 'MIME-Version: 1.0' . "\r\n";
        $headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


        mail('support@laceltech.com,info@laceltech.com', $subject1, $message1, $headers1);  
        
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     
     }else{

     echo "company is yet assigned to user ";

    }
    


    }else{

      echo "Company Email Already Used ".$obj->email;

    }

    }else{


       echo "user_id doesnt exists ";
    }
    
    
    break;


    case 'properties-add';
      $data = $_POST['result'];

     $data = json_decode($data, TRUE);

     

    $data= $data+array("company_id"=>$company_id);
    $data= json_encode($data);

    // print_r($data);
     $property_id= save_data('property_tb', $data);
        
       
        echo $property_id;

    break;

    case 'locality-currency';

    $data = $_POST['result'];
    $data = json_decode($data, TRUE);

    $data= $data+array("company_id"=>$company_id);
    $data= json_encode($data);

    // print_r($data);
     echo save_data('currency_tb', $data);

    break;


    case 'users';

    $data = $_POST['result'];
    $data = json_decode($data, TRUE);

    $data= $data+array("company_id"=>$company_id);
    $password=$data['password'];
     $data['password']=sha1($password);
     
     
     $email=$data['email'];
     $u_name=$data['name'];
     
    $data= json_encode($data);

    //print_r($data);
     echo save_data('users_tb', $data);  
        
        $subject="Welcome to Roomzetu RPM";

        $message="<p><strong>Hello ".$u_name.",</strong> </p>";
        $message.="<p>An account has been created using this email on Roomzetu. Below is your password, use it to login to your new account.</p>";
        $message.="<p>PASSWORD: <strong>  ".$password."</strong></p>";
        $message.="<p style='color:#555; font-size:10pt'>If you did not create this account, please ignore this email or reply to let us know.</p>";
        //$message.="</div>";

        $message = makeGenericEmail($message); 
        
        $headers = 'From: Roomzetu <support@laceltech.com> '."\r\n"; 
        $headers .= 'Reply-to: noreply'."\r\n";  
        $headers  .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


        mail($email, $subject, $message, $headers);
        
    break;

    case 'extras':

    $data = $_POST['result'];
    $data = json_decode($data, TRUE);

    $data= $data+array("company_id"=>$company_id);
    $data= json_encode($data);

    // print_r($data);
     echo save_data('extras_tb', $data);

    break;


    case 'room_types':

    $data = $_POST['result'];
    $data = json_decode($data, TRUE);

    if(isset($_POST['id']) && $POST['id'] !=0){
        $id = $_POST['id'];
        echo DB::update("room_types_tb", $data, "id=%i", $id);
       //echo $id;
    }
    else{
    $data["company_id"]=$company_id;
    /* $data= json_encode($data);
    print_r($data); */
     echo DB::insert('room_types_tb', $data);
    }
    break;

    case 'rooms':

    $data = $_POST['result'];
    $data = json_decode($data, TRUE);

         //foreach($data as $d){
        
        DB::insert('room_tb', $data);
        $room_id = DB::insertId();
 echo $room_id;

       
    //}
   // $data= $data+array("company_id"=>$company_id);
    //$data= json_encode($data);

    ///print_r($data);
     

    break;
        
        case "update room":
        $id = $_POST['id'];
        $data = json_decode($_POST['result'], true);

        DB::update("room_tb", $data, "id=%i", $id);
        echo 1;
        break;

    case 'agent_tb':

    $data = $_POST['result'];
    $data = json_decode($data, TRUE);

    $data["company_id"]=$company_id;
    $data= json_encode($data);
       
        
        
    // print_r($data);
     echo save_data('agent_tb', $data);

    break;
    
    case 'notice_tb':

    $data = $_POST['result'];
    $data = json_decode($data, TRUE);

    $data["company_id"]=$company_id;
        
        
    
       
         $users = DB::query("SELECT id FROM users_tb WHERE company_id=$company_id");
        $views=array();
        foreach($users as $u){
            array_push($views,$u['id']);
        }
        $data["visible_to"]=json_encode($views);
        $data= json_encode($data);
//     print_r($data);
     echo save_data('notice_tb', $data);

    break;
    
    case 'email_notification_template_tb':

    $data = $_POST['result'];
    $data = json_decode($data, TRUE);

    $data["company_id"]=$company_id;
    $data= json_encode($data);
       
        
        
//     print_r($data);
     echo save_data('email_notification_template_tb', $data);

    break;
   

        
        
    case 'password_recovery':

        if(isset($_POST['email']) && $_POST['email']!=""){
        $email = $_POST['email'];

        //             $email='alex@lacel.com';

        $u=DB::query("SELECT * FROM users_tb WHERE email=%s",  $email);
        $counter = DB::count();

        if($counter!=0){

        //                $digits = 4;
        //$ra= rand(pow(10, $digits-1), pow(10, $digits)-1);

        $ra=uniqid(); 



       DB::update('users_tb', array('password_recovery'=>$ra), 'email=%s',$email );

       
        $u_name=$u[0]['name'];
        $subject="PASSWORD RECOVERY";
        $message="";
        $message.="<p><strong>Dear ".$u_name.",</strong> </p>";

        $message.="<p>You recently requested to reset your password for roomzetu account. Click the link below to reset it.</p>";


        $message.="<a style='text-decoration:none;' href='https://www.app.roomzetu.com/password-recovery.php?token=$ra'><div style='background-color:#d35400;padding:8px 15px;'><strong style='color:white;'>Reset your Password</strong>       </div></a><br>";
        $message.="<p><strong>NOTE: </strong>This link can only be used once.</p>";
        $message.="<p style='color:#888; font-size:10pt'>If you didnot request a password reset, please ignore this email or reply to let us know</p>";


        $message.="<p>Thanks<br>lacel team</p><hr>";


//        $message.="</div></body></html>";

        $message = makeGenericEmail($message);
            
        $headers = 'From: Roomzetu <support@laceltech.com> '."\r\n"; 
        $headers .= 'Reply-to: noreply'."\r\n";  
        $headers  .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        
        mail($email, $subject, $message, $headers);
            
          
        
        echo 1;

    }
      
//     
     
 }
else{
     echo "email not set";
 }
      
 break;
        
        
         case 'password_update':
        if(isset($_POST['password_token']) && $_POST['password_token']!=""
           && isset($_POST['password']) && $_POST['password']!=""){
            $password_token=$_POST['password_token'];
            $password=$_POST['password'];
            
     $ra=uniqid(); 
            DB::startTransaction();
           DB::update('users_tb', array('password'=>sha1($password),'password_recovery'=>$ra), 'password_recovery=%s',$password_token );
           
           
        $counter = DB::affectedRows();
        if ($counter > 0) {
          echo 'success';
          DB::commit();
        } else {
          echo "fail";
          DB::rollback();
        }
                   
                   
           
           
        }
        break;
    
    
}

function save_data($tablname, $data){
        
        $data = json_decode($data, TRUE);
      
        $result = DB::insert($tablname, $data);
      
        return DB::insertId();
}


?>

