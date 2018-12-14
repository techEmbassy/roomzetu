<?php 

require_once 'config.php';

  $data = $_POST['result'];
  $tablname = $_POST['token'];
  $reference = $company_id;
  $reference_col_name = $_POST['col_name'];
 

if(isset($_POST['multiple'])){
  update_single($tablname, $data, $reference, $reference_col_name);
}


switch ($_POST['page']) {


    

    case 'lock-user':


         $data = $_POST['result'];
         $table = "users_tb";
         $ref = (int)$_POST['reference'];
         $col = " id=%i ";
        
        $data_ = json_decode($data, TRUE);

         //print_r($data_ );
         update_data($table, $data,$col ,$ref );

    break; 
    case 'new-property':
        
         $data = $_POST['result'];
         $table = "property_tb";
         $ref = (int)$_POST['reference'];
         $col = " id=%i ";
        
         update_data($table, $data,$col ,$ref );
        

        break;

    case 'company':
        
         $data = $_POST['result'];
         $table = "company_tb";
         $ref = (int)$company_id;
         $col = " id=%i ";

         update_data($table, $data,$col ,$ref );
        

        break;
    case 'locality':
         $data = $_POST['result'];
         $table = "property_tb";
         $ref = (int)$_POST['reference'];
         $col = " id=%i ";
       
         update_data($table, $data,$col ,$ref );

        break;
        case 'agent':
         $data = $_POST['result'];
         $table = "agent_tb";
         $ref = (int)$_POST['reference'];
         $col = " id=%i ";
       
         update_data($table, $data,$col ,$ref );

        break;

    case 'currency':
         $data = $_POST['result'];
         $table = "currency_tb";
         $ref = (int)$_POST['reference'];
         $col = " id=%i ";
       
         update_data($table, $data,$col ,$ref );

        break;

    case 'users':
         $data = $_POST['result'];
         $table = "users_tb";
         $ref = (int)$_POST['reference'];
         $col = " id=%i ";
       
         update_data($table, $data,$col ,$ref );

        break;

    case 'extras':
         $data = $_POST['result'];
         $table = "extras_tb";
         $ref = (int)$_POST['reference'];
         $col = " id=%i "; 
       
         update_data($table, $data,$col ,$ref );

        break;
    
    case 'booked room':
         $data = $_POST['result'];
         $table = "booking_rooms_tb";
         $ref = '';
         $col = " booking_id=".$_POST['booking_id']." && room_id=".$_POST['c_room_id']; 
       
         update_data($table, $data,$col ,$ref );

        break;

    case 'room_types':
         $data = $_POST['result'];
         $table = "room_types_tb";
         $ref = (int)$_POST['room_type_id'];
         $col = " id=%i "; 
       
         //print_r($data);
         //echo $ref ;
         update_data($table, $data,$col ,$ref );

        break;
    
    case 'invoice_template_tb':
        
         $data = $_POST['result'];
         $table = "invoice_template_tb";
        $ref = $reference;
         $col = " company_id=%i "; 
       
        
         //print_r($data);
         //echo $ref ;
         update_data($table, $data,$col ,$ref );

        
        break;
    
    case 'email_notification_template_tb':
         $data = $_POST['result'];
         $table = "email_notification_template_tb";
         $ref = (int)$_POST['id'];
         $col = " id=%i "; 
       
         //print_r($data);
         //echo $ref ;
         update_data($table, $data,$col ,$ref );

        break;
        
         case 'update_online_status':
         $data =array('logged' => date('Y-m-d H:i:s', strtotime('+5 minute')));
    $data= json_encode($data); 
         $table = "users_tb";
         $ref = (int)$user_id;
         $col = " id=%i "; 
       
//         print_r($data);
         //echo $ref ;
         update_data($table, $data,$col ,$ref );

        
        break;

         case 'native': 
         $data = $_POST['result'];
         $table = $_POST['table'];
         $ref = (int)$_POST['reference'];
         $col = " ".$_POST['col_id']."=%i "; 
       
         update_data($table, $data,$col ,$ref );
        
        
        
        break;//guests_tb
        
        case 'booking': 
         $data = $_POST['result'];
         $table = "booking_tb";
         $ref = (int)$_POST['reference'];
         $col = " id=%i "; 
       
         update_data($table, $data,$col ,$ref );
        
        
        
        break;//guests_tb
        
         case 'notice':
        global $user_id;
         $notice_id = $_POST['notice_id'];
         $table = "notice_tb";
         $ref = (int)$notice_id;
         $col = " id=%i ";
        
        $notices = DB::queryFirstRow("SELECT visible_to FROM $table WHERE id=$ref");
        
         
           $views=json_decode($notices['visible_to']);
        $new_views=array();
               if(in_array($user_id,$views)){
                   foreach($views as $v){
                       if($v!=$user_id){
                          array_push($new_views,$v);
                       }
                   }
                  
               } 
        
        
        
        
        $data=json_encode(array('visible_to'=>json_encode($new_views)));

         update_data($table, $data,$col ,$ref );
        

        break;
        
        
    default:
        


}




function update_data($table_, $data_array,$col_ ,$ref_){
    
      
        $data_ = json_decode($data_array, TRUE);
        
         $result = DB::update($table_, $data_, $col_, $ref_);
        

        if($result){
           echo "success";
          
        }

      
}

function update_single($table, $data, $ref, $col){
    
      
     //   $data = json_decode($data, TRUE);

     //   var_dump($data);
      //  print_r($data);
      $cond = "$col=%d";

      //  $result = DB::insert($tablname, $data);
        $result = DB::update($table, $data, $cond, $ref);

        if($result){
            echo "success";
        }

      
}







?>
