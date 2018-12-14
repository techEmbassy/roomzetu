<?php $title="payment method"; 
include('includes/header.php');

    
    if(isset($_POST['amount']) && $_POST['amount']!=""
                   &&isset($_POST['period']) && $_POST['period']!=""
                    &&isset($_POST['bill_id']) && $_POST['bill_id']!="")
                   {
    
    $amount=$_POST['amount'];
    $period=$_POST['period'];
    $billing_plan_id=$_POST['bill_id'];
    $tablname='billing_tb'; 
                   
    
      $company = DB::queryFirstRow("SELECT billing_plan,expiry_date FROM company_tb WHERE id=%i", $company_id);

    $expiry_date=$company['expiry_date'];
               $current_billing_plan_id=$company['billing_plan'];        
                       
     $now=date('Y-m-d H:i:s');
        
//      
   if($current_billing_plan_id==$billing_plan_id){
            
                       if(strtotime($now)<strtotime($expiry_date)){
          $expiry_date = date('Y-m-d H:i:s', strtotime($expiry_date. ' + '.$period.' month'));

        }else{
                $expiry_date = date('Y-m-d H:i:s', strtotime($now. ' + '.$period.' month'));

        }
        }else{
           $expiry_date = date('Y-m-d H:i:s', strtotime($now. ' + '.$period.' month')); 
        }
                       
                       
                       
                       
                       
    $data=array("company_id"=>$company_id,"amount"=>$amount,"number_of_months"=>$period,"billing_plan_id"=>$billing_plan_id);

        $save = DB::insert($tablname, $data);
    
    
       $data=array("billing_plan"=>$billing_plan_id,"expiry_date"=>$expiry_date);
    
     $result = DB::update('company_tb', $data, "id=%l", $company_id);
    if($result){
        header( "Location: success.php?v=success&p=$period" );
         }else{
        header( "Location: success.php?v=fail" );
    }
                   }else{
                       header( "Location: success.php?v=fail" );
                   }
?>
