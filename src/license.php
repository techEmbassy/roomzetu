<?php 
require '../includes/License/SecurityRSA.php'; 
require '../includes/License/Base32.php'; 
 
ini_set('post_max_size', '60M');
require_once 'config.php';


$action = $_POST['action'];
switch ($action) {

     case 'auth_license':
        auth_license();
     break;
     case 'get_license':
         get_license();
     break;

     default:
     # code...
    // echo 9;
     break;
}

function get_license(){
    $company_id_ = $_POST['company_id_'];
    $billing_plan_id = $_POST['billing_plan_id'];
    $amount_paid = $_POST['amount_paid'];
    $number_of_days = $_POST['number_of_days'];
    $c= DB::queryFirstRow("SELECT * FROM company_tb WHERE id=%i", $company_id_);
    if(DB::count()<1){
        echo 'unknown company';
        return false;
    } 


    $key = generateKey();
    $encryptKey = encryptLicense($company_id_,$key);
    $data = array("company_id"=>$company_id_, "billing_plan_id"=>$billing_plan_id, "amount_paid"=>$amount_paid, "number_of_days"=>$number_of_days, "status"=>'active', "license"=>$encryptKey);

    DB::startTransaction();
    DB::update("billing_tb", array("status"=>"inactive"), "company_id=%i", $company_id_);
   $result = DB::insert("billing_tb", $data);

   if($result){
    echo  $key;
    DB::commit();
   }else{
    echo "fail";
    DB::rollback();
   }
    
    

}

function auth_license(){
    global $company_id;
    
    $now=date('Y-m-d H:i:s');
    $key1 = strtoupper ($_POST['key1']);
    $key2 = strtoupper ($_POST['key2']);
    $key3 = strtoupper ($_POST['key3']);
    $key4 = strtoupper ($_POST['key4']);
        
    $sub_license =  $key1.$key2.$key3.$key4;
    // $sub_license =  generateKey();


    $encryptKey = encryptLicense($company_id,$sub_license);

    DB::startTransaction();
    $where = new WhereClause('and');
    $where ->add("company_id=%i", $company_id);
    $where ->add("license=%s", $encryptKey);
    $where ->add("status=%s", 'active');

    $result = DB::queryFirstRow("SELECT id,billing_plan_id,number_of_days FROM billing_tb WHERE  %l", $where);
    if(DB::count()<1){
        DB::rollback();
        echo 'Wrong license';
        return false;
    }

    DB::update("billing_tb", array("used_at"=>$now), "id=%i", $result['id']);
    DB::update("billing_tb", array("status"=>"inactive"), "company_id=%i", $company_id);
    $counter = DB::affectedRows();
    if ($counter <1 ) {
        echo "fail";
        DB::rollback();
        return false;
    } 
    $billing_plan_id= $result['billing_plan_id'];
    $number_of_days= $result['number_of_days'];


    $company = DB::queryFirstRow("SELECT billing_plan,expiry_date FROM company_tb WHERE id=%i", $company_id);

    $expiry_date=$company['expiry_date'];
    $current_billing_plan_id=$company['billing_plan'];        
   
        
//      
    if($current_billing_plan_id==$billing_plan_id){
            
        if(strtotime($now)<strtotime($expiry_date)){
          $expiry_date = date('Y-m-d H:i:s', strtotime($expiry_date. ' + '.$number_of_days.' DAYS'));

        }else{
            $expiry_date = date('Y-m-d H:i:s', strtotime($now. ' + '.$number_of_days.' DAYS'));

        }
    }else{
        $expiry_date = date('Y-m-d H:i:s', strtotime($now. ' + '.$number_of_days.' DAYS')); 
    }

    $data=array("billing_plan"=>$billing_plan_id,"expiry_date"=>$expiry_date);
    
    DB::update('company_tb', $data, "id=%l", $company_id);
    $counter = DB::affectedRows();
    if ($counter > 0) {
        echo 'success';
        DB::commit();
    } else {
        echo "fail";
        DB::rollback();
    }
   
   
}



function encryptLicense($company_id,$license){

    $client_id = base_convert ( $company_id, 10, 2 );
    $text = $client_id . $license;

    $rsa = new SecurityRSA ();
    $b32 = new Base32 ();
    $n = 69834209;
	$e = 8945;
	$keys = array (
			$n,
			$e 
	);
    $b32->setCharset ( $b->csSafe );
	$encoded = $rsa->rsa_encrypt ( $text, $keys [1], $keys [0] );
    $key = $b32->fromString ( $encoded );
    return sha1($key);
}



function generateKey() {
    $possible = "0123456789ABCDEFGHIJ0123456789KLMNOPQRESTUVWXYZ"; // allowed chars in the license
     
    srand(time());

     $i = 0; 
     $license = "";    
     while ($i < 16) { 
      $char = substr($possible, rand(0, strlen($possible)-1), 1);
      if (!strstr($license, $char)) { 
       $license .= $char;
       $i++;
       }
      }
    
     return $license;
}