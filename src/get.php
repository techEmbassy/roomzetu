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


    case 'get_one_row':
        get_one_row($id);
        break;

    case 'get_all_rows':
        get_all_rows($table, $reference, $col_name);
        break; 

    case 'dash notices':
     global $user_id;
    $notices = DB::query("SELECT * FROM $table WHERE company_id=%i ORDER BY created DESC", $reference);
        $v_notices=array();
        foreach($notices as $n){
            
           $views=json_decode($n['visible_to']);
               if(in_array($user_id,$views)){
                   array_push($v_notices,$n);
               } 
        }
    echo json_encode($v_notices);
    
    break;
    
    case 'get_extras':
     
    $extras = DB::query("SELECT * FROM extras_tb WHERE company_id=%i", $reference);
    echo json_encode($extras);
    
    break;
    case 'get_users':
       
        $users = DB::query("SELECT * FROM users_tb WHERE company_id=%s", $company_id);

        foreach ($users as  $value) {
            $name=$value['name'];
            $id=$value['id'];
            echo"<option value=\"$id\">{$name}</option>";
        }

        break;

    case 'get_users_table':
        
         $property_id= $_GET['property_id'];
         $where=new WhereClause("and");
  $where->add("company_id=%s",$company_id);
  if(!$property_id==0){
     $where->add("property_id=%s",$property_id);
    }
       
        $users = DB::query("SELECT * FROM users_tb WHERE %l", $where);
        
        
         $res=array();
        foreach($users as $u){
            $remd= (strtotime($u['logged'])-strtotime(date('Y-m-d H:i:s')))/86400;
             $u['status']= $remd>=0 ?'online':'offline';
        
        array_push($res, $u);
        
    }
        
        echo json_encode($res);

        break;

    case 'get_currencies':

         $cond = "company_id=%i";
         $table="currency_tb";
         $ref=$company_id;//from session

         $result = DB::query("SELECT * FROM $table WHERE $cond", $ref);
         echo json_encode($result);
       
        break;

    case 'get_company_info':
         // echo $company_id;
         $result = DB::queryFirstRow("SELECT * FROM company_tb WHERE id=%i", $company_id);
         echo json_encode($result);
        
       break;

   case 'get_properties':
         // echo $company_id;
         $cond = "company_id=%i";

         $properties = DB::query("SELECT * FROM property_tb WHERE $cond", $reference);
         echo json_encode($properties);
        
       break;

   case 'get_room_types':
        
//         $cond = "company_id=%i";
        $where = new WhereClause('and');
        $where ->add("company_id=%i", $reference);
        if(isset($_GET['property_id']) && $_GET['property_id'] !=""){
        $property_id = $_GET['property_id'];
        //                        echo $property_id;

        $where ->add("property_id=%i", $property_id);

        }

         $room_types = DB::query("SELECT * FROM rooms_property_v WHERE %l", $where);
         $rt = array();
        foreach($room_types as $room ){
            $_rooms = DB::query("select id, room_name from room_tb where room_type_id = %i", $room['room_type_id']);
            $room['rooms'] = $_rooms;
            array_push($rt, $room);
                    }
         echo json_encode($rt);
        
       break;


   case 'get_rooms':

         $room_id=$_GET['room_id'];
         $cond = "room_type_id=%i";

         $room_types = DB::query("SELECT * FROM rooms_property_v WHERE $cond", $room_id);
         echo json_encode($room_types);
        
       break; 

    case 'get_room_numbers':

         $room_type_id=$_GET['room_type_id'];
         $cond = "room_type_id=%i";

         $rooms = DB::query("SELECT * FROM room_tb WHERE $cond", $room_type_id);
         
         echo json_encode($rooms);
        
       break;  
     case 'get_notices':

        $user_id=$_GET['user_id'];
         $cond = "company_id=%i";

         $rooms = DB::query("SELECT * FROM notice_tb WHERE $cond AND user_id=$user_id", $reference);
         echo json_encode($rooms);
        
       break; 
    
//    case 'get_notices1':
//
//        $property_id=$_GET['property'];
//          $where ->add("company_id=%i",  $reference);
//    if(!$property_id==0){
//     $where->add("property_id=%s",$property_id);
//    }
//
//         $rooms = DB::query("SELECT * FROM notice_tb WHERE %l ",  $where);
//         echo json_encode($rooms);
//        
//       break;
        
         case "property_timezones":
        $cond = "$col_name=%s";
        $property = DB::query("SELECT * FROM $table WHERE $cond", $reference);
        
        $p_tz=array();
    $defualttimezone= date_default_timezone_get();
        
    foreach($property as $p){

       date_default_timezone_set($p['time_zone']);
        $p['timenow']=date('H:i');
        array_push($p_tz, $p);
        
    }
        date_default_timezone_set($defualttimezone);
        echo json_encode($p_tz);
        break;

    default:
        # code...
        break;
}


function get_one_row($id){
    $company = DB::queryFirstRow("SELECT * FROM company_tb WHERE id=%s", $id);
    echo json_encode($company);
}

function get_all_rows($table, $reference, $col_name){

    $cond = "$col_name=%s";

    $company = DB::query("SELECT * FROM $table WHERE $cond", $reference);
    echo json_encode($company);
}




?>
